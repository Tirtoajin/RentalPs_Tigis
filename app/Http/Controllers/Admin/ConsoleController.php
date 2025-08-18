<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Console;

class ConsoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consoles = Console::all();
        return view('admin.consoles.index', compact('consoles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.consoles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_per_hour' => 'required|integer|min:0',
            'price_per_day' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Console::create($request->all());
        return redirect()->route('admin.consoles.index')->with('success', 'Konsol berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Console $console)
    {
        // Biasanya tidak digunakan untuk halaman admin, bisa dikosongkan atau redirect.
        return redirect()->route('admin.consoles.edit', $console);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Console $console)
    {
        return view('admin.consoles.edit', compact('console'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Console $console)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_per_hour' => 'required|integer|min:0',
            'price_per_day' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $console->update($request->all());
        return redirect()->route('admin.consoles.index')->with('success', 'Data konsol berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Console $console)
    {
        $console->delete();
        return redirect()->route('admin.consoles.index')->with('success', 'Data konsol berhasil dihapus.');
    }
}
