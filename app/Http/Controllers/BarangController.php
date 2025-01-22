<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Menampilkan dashboard
    public function index()
    {
        $barangMasuk = Barang::where('tipe', 'masuk')->orderBy('created_at', 'desc')->get();
        $barangKeluar = Barang::where('tipe', 'keluar')->orderBy('created_at', 'desc')->get();
        $riwayat = Barang::all();

        return view('dashboard', compact('barangMasuk', 'barangKeluar', 'riwayat'));
    }

            // Form Barang Masuk
        public function formMasuk()
        {
            return view('barang.form', ['tipe' => 'masuk']);
        }

        // Form Barang Keluar
        public function formKeluar()
        {
            return view('barang.form', ['tipe' => 'keluar']);
        }

        // Simpan Barang Masuk
        public function storeMasuk(Request $request)
        {
            $request->validate([
                'nama_barang' => 'required|string|max:255',
                'nama_supplier' => 'required|string|max:255',
                'jumlah' => 'required|integer|min:1',
            ]);

            Barang::create([
                'nama_barang' => $request->nama_barang,
                'nama_supplier' => $request->nama_supplier,
                'jumlah' => $request->jumlah,
                'tipe' => 'masuk',
            ]);

            return redirect()->route('dashboard')->with('success', 'Barang masuk berhasil ditambahkan!');
        }

        // Simpan Barang Keluar
        public function storeKeluar(Request $request)
        {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'nama_supplier' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'nama_supplier' => $request->nama_supplier,
            'jumlah' => $request->jumlah,
            'tipe' => 'keluar',
        ]);

        return redirect()->route('dashboard')->with('success', 'Barang keluar berhasil ditambahkan!');
    }
}
