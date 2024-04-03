<?php

namespace App\Controllers;
use App\Models\Produk;
class Home extends BaseController
{
    public function index()
    {
        $produks = new Produk();
        $produk = $produks->findAll();
        $data = [
            'produk' => $produk,
        ];
        return view('welcome_message', $data);
    }

    public function create()
    {
        $produks = new Produk();
        $data = [
            'NamaProduk' => $this->request->getVar('nama'),
            'Harga' => $this->request->getVar('harga'),
            'Stok' => $this->request->getVar('stok'),
        ];
        $produks->save($data);
        return redirect()->to('/');
    }
    public function edit($id)
    {
        $produks = new Produk();

        $editP = $produks->where(['ProdukID'=> $id])->first();
         $produk = $produks->findAll();
        $data = [
            'produk' => $produk,
            'editP' => $editP,
        ];
        return view('welcome_message', $data);
    }

    public function update($id)
    {
        $produks = new Produk();

        $data = [
            'ProdukID' => $id,
            'NamaProduk' => $this->request->getVar('nama'),
            'Harga' => $this->request->getVar('harga'),
            'Stok' => $this->request->getVar('stok'),
        ];
        $produks->save($data);
        return redirect()->to('/');
    }
}
