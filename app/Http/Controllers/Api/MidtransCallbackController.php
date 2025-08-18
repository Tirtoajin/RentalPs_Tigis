<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Notifications\BookingConfirmed;

class MidtransCallbackController extends Controller
{
    public function handle(Request $request)
    {
        Log::info('--- Midtrans Notification Received ---');
        Log::info('Payload:', $request->all());

        $transactionStatus = $request->input('transaction_status');
        $fraudStatus = $request->input('fraud_status');
        $orderId = $request->input('order_id');

        if (!$orderId || !$transactionStatus) {
            Log::error('Missing order_id or transaction_status.');
            return response()->json(['message' => 'Invalid payload'], 400);
        }

        $orderIdParts = explode('-', $orderId);
        $bookingId = $orderIdParts[1] ?? null;

        if (!$bookingId) {
            Log::error('Could not parse Booking ID from Order ID.');
            return response()->json(['message' => 'Invalid Order ID format'], 400);
        }

        $booking = Booking::find($bookingId);

        if (!$booking) {
            Log::error("Booking with ID {$bookingId} not found.");
            return response()->json(['message' => 'Booking not found'], 404);
        }

        // Hanya proses jika statusnya masih 'unpaid'
        if ($booking->status !== 'unpaid') {
            Log::info("Booking ID {$bookingId} has already been processed. Status: {$booking->status}.");
            return response()->json(['message' => 'Booking already processed.']);
        }

        try {
            if (($transactionStatus == 'capture' || $transactionStatus == 'settlement') && $fraudStatus == 'accept') {

                // Gunakan DB Transaction untuk memastikan semua proses berhasil
                DB::transaction(function () use ($booking) {
                    $booking->status = 'confirmed';
                    $booking->save();
                    Log::info("SUCCESS: Booking ID {$booking->id} status updated to 'confirmed'.");
                });

                // Kirim notifikasi SETELAH transaksi database berhasil
                $booking->user->notify(new BookingConfirmed($booking));
                Log::info("Notification sent for Booking ID {$booking->id}.");

            } else if (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
                $booking->status = 'cancelled';
                $booking->save();
                Log::info("SUCCESS: Booking ID {$booking->id} status updated to 'cancelled'.");
            }

        } catch (\Exception $e) {
            Log::error('Error processing Midtrans notification for Booking ID ' . $bookingId . ': ' . $e->getMessage());
            return response()->json(['message' => 'Internal Server Error'], 500);
        }

        return response()->json(['message' => 'Notification handled successfully.']);
    }
}
