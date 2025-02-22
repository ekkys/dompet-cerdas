<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wallets = Wallet::all();
        return view('user.wallet.index', compact('wallets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('user.wallet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['jumlah' => str_replace(['.', ','], '', $request->jumlah)]); // Bersihkan format sebelum validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
        ]);

        Wallet::create($request->all());

        return redirect()->route('wallets.index')->with('success', 'Dompet berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wallet $wallet)
    {
        return view('user.wallet.edit', compact('wallet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wallet $wallet)
    {

        $request->merge(['jumlah' => str_replace(['.', ','], '', $request->jumlah)]);

        $request->validate([
            'name' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
        ]);

        $jumlah = (int) $request->jumlah;
        $wallet->update(['name' => $request->name, 'jumlah' => $jumlah]);

        return redirect()->route('wallets.index')->with('success', 'Dompet berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wallet $wallet)
    {
        $wallet->delete();
        return redirect()->route('wallets.index')->with('success', 'Dompet berhasil dihapus!');
    }
}
