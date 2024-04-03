<?php

namespace App\Models;

use CodeIgniter\Model;

class Produk extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'ProdukID';
    protected $allowedFields    = ['ProdukID', 'NamaProduk', 'Harga', 'Stok',];
    protected $useTimestamps = true;
  
}
