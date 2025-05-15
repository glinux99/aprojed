<?php

namespace App\Http\Controllers\Admin\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function listMatierePremiere()
    {
        return view('admin.system.stock.matiere_premiere', ['charges' => [1, 2, 3]]);
    }
    public function listMatiereConsommable()
    {
        return view('admin.system.stock.matiere_consommable', ['charges' => [1, 2, 3]]);
    }
    public function listProduitFini()
    {
        return view('admin.system.stock.produit_fini', ['charges' => [1, 2, 3]]);
    }
}
