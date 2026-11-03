<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index()
    {
        $title = "Belajar Laravel asik asik";
        return view('belajar', compact('title'));
    }

    public function tambah()
    {
        $title = "Tambah-tambahan";
        return view('tambah', compact('title'));
    }

    public function actionTambah(Request $request)
    {
        // $request = new Request();
        $title = "Tambah-tambahan";
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');
        $jumlah = $angka1 + $angka2;
        return view('tambah', compact('jumlah', 'title'));
    }

    public function kurang()
    {
        $title = "Pengurangan";
        return view('kurang', compact('title'));
    }
    public function kali()
    {
        $title = "Perkalian";
        return view('kali', compact('title'));
    }
    public function bagi()
    {
        $title = "Pembagian";
        return view('bagi', compact('title'));
    }
}
