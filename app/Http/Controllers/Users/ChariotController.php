<?php

namespace App\Http\Controllers\Users;

use App\Models\Images;
use App\Models\Adresse;
use App\Models\Chariot;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ChariotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chartInfo = Chariot::join('produits', 'produits.id', 'chariots.produit_id')
            ->select('chariots.*', 'produits.*', 'chariots.id AS chariot_id', 'chariots.qte AS chariot_qte')
            ->where('chariots.users_id', Auth::user()->id)->get();
        return view('site.cart_all', ['chartInfo' => $chartInfo]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adresse = Adresse::where('users_id', Auth::user()->id)->get();
        return view('site.cart_info', ['adresses' => $adresse]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chariot = Chariot::create($request->only(['qte', 'produit_id', 'users_id']));
        $imageproduit = Produit::join('images', 'produits.id', 'produit_id')
            ->where('produit_id', $request->produit_id)->first();
        $chariot->images = $imageproduit->images;
        $chariot->qte = $request->qte;
        $chariot->save();
        $count = Chariot::where('users_id', Auth::user()->id)->count() ?? 0;
        Session()->put('cart-count', $count);
        if (Chariot::where('users_id', Auth::user()->id)->count() == 1) $reload = true;
        else $reload = false;
        return response()->json([
            'count' => $count,
            'reload' => $reload
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produit = Produit::find($id);
        $images = Images::where('produit_id', $id)->first();
        return view('site.cart', ['produit' => $produit, 'image' => $images->images]);
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
        Chariot::find($id)->delete();
        $count = Chariot::where('users_id', Auth::user()->id)->count() ?? 0;
        Session()->put('cart-count', $count);
        return redirect()->route('produit.cart.all');
    }
}
