<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Menampilkan daftar semua testimoni.
     */
    public function index()
    {
        $testimonials = Testimonial::with('user')->latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Menyetujui sebuah testimoni.
     */
    public function approve(Testimonial $testimonial)
    {
        $testimonial->is_approved = true;
        $testimonial->save();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil disetujui.');
    }

    /**
     * Menghapus sebuah testimoni.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
