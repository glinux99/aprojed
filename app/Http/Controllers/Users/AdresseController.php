<?php

namespace App\Http\Controllers\Users;

use Exception;
use App\Models\Adresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdresseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $adresse = Adresse::create($request->except(['_token', 'users_id']));
        $adresse->users_id = Auth::user()->id;
        $adresse->save();
        return redirect()->route('produit.cart.info');
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
    public function edit(Request $request)
    {
        $adresse = Adresse::find($request->id);
        return response()->json($adresse);
    }
    public function editer(Request $request)
    {
        $adresse = Adresse::find($request->adresse_id);
        $adresse->update($request->except('_token'));
        return redirect()->route('produit.cart.info');
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
        // Ce code permet de desable la contrainte foreign key
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        } catch (Exception $exc) {
            DB::statement('PRAGMA foreign_keys = OFF');
        }
        Adresse::find($id)->delete();
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        } catch (Exception $exc) {
            DB::statement('PRAGMA foreign_keys = OFF');
        }
        return redirect()->route('produit.cart.info');
    }
}
