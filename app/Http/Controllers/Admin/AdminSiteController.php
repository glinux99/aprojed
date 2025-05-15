<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Site\HomeSiteController;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

            return view('admin.admin', [
                'produits' => $produits,
                'data' => $data,
                'dataCategorie' => $dataCategorie,
                'dataCategorieData' => $dataCategorieData,
                'dataCategorieBuy' => $dataCategorieBuy,
                'dataCategorieBuyData' => $dataCategorieBuyData
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
