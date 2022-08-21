<?php

namespace App\Http\Controllers;
use App\Models\Produk;

class ProdukController extends Controller {
    function index(){
        $data['list_products'] = Produk::all();
        return view('produk.index', $data);
    }
    function create(){
        return view('produk.create');
    }
    function store(){
        $pc = new Produk;
        $pc->nama = request('nama');
        $pc->stok = request('stok');
        $pc->harga = request('harga');
        $pc->berat = request('berat');
        $pc->deskripsi = request('deskripsi');
        $pc->save();

        return redirect('admin/products/pc')->with('success', 'Data Berhasil ditambahkan');
    }
    function show(Produk $pc){
        $data['produk'] = $pc;
        return view('produk.show', $data);
    }
    function edit(Produk $pc){
        $data['produk'] = $pc;
        return view('produk.edit', $data);
    }
    function update(Produk $pc){
        $pc->nama = request('nama');
        $pc->stok = request('stok');
        $pc->harga = request('harga');
        $pc->berat = request('berat');
        $pc->deskripsi = request('deskripsi');
        $pc->save();

        return redirect('admin/products/pc')->with('success', 'Data Berhasil diubah');
    }
    function destroy(Produk $pc){
        $pc->delete();

        return redirect('admin/products/pc')->with('danger', 'Data Berhasil dihapus');
    }
}