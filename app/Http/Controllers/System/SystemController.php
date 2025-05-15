<?php

namespace App\Http\Controllers\System;

use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Site\HomeSiteController;

class SystemController extends Controller
{
    public function AccesSystem()
    {
        $config = new HomeSiteController;
        $config->config();
        $user = User::find(Auth::id());
        if ($user->hasRole('client')) {
            return redirect()->route('index');
        } else if ($user->hasRole('admin')) {
            $produit = Produit::count();
            $categorie = Categorie::count();
            $user = User::count();
            $vente = Commande::where('status', '1')->count();
            $attentes = Commande::where('status', '0')->count();
            $totalVentes = Commande::count();
            $dataCategorie = array();
            $donne = Categorie::all();
            $dataCategorieData = array();
            $dataCategorieBuy = array();
            $dataCategorieBuyData = array();
            $buy = Categorie::leftjoin('produits', 'categorie', 'categories.id')
                ->join('commandes', 'produits.id', 'commandes.produit_id')
                ->select('categories.*')->groupby('categories.id')->distinct()->get();
            // dd($buy);
            foreach ($buy as $data) {
                array_push($dataCategorieBuy, $data->name);
            }
            foreach ($buy as $data) {
                array_push($dataCategorieBuyData, $data->nombre_prod);
            }
            foreach ($donne as $data) {
                array_push($dataCategorieData, $data->nombre_prod);
            }
            foreach ($donne as $data) {
                array_push($dataCategorie, $data->name);
            }
            $produits = Produit::join('images', 'produit_id', 'produits.id')->groupBy('produit_id')->paginate(20);
            $data = array(
                "ventes" =>
                $vente,
                "produit" => $produit,
                "categorie" => $categorie,
                'membre' => $user,
                'attentes' => $attentes,
                'totalVentes' => $totalVentes
            );
            // dd($dataCategorieData);
            return view('admin.system', [
                'produits' => $produits,
                'data' => $data,
                'dataCategorie' => $dataCategorie,
                'dataCategorieData' => $dataCategorieData,
                'dataCategorieBuy' => $dataCategorieBuy,
                'dataCategorieBuyData' => $dataCategorieBuyData
            ]);
        }
    }
    public function createMatierePremiere()
    {
        return view('admin.system.matiere_premiere');
    }
    public function createProduitFini()
    {
        return view('admin.system.produit_fini');
    }
    public function createMatiereConsommable()
    {
        return view('admin.system.matiere_consommable');
    }
    public function createEquipement()
    {
        return view('admin.system.equipement');
    }
    public function createCharges()
    {
        return view('admin.system.charges', ['charges' => [1, 3, 3]]);
    }
}
