<?php

namespace App\Http\Controllers\Site;

use App\Models\Images;
use App\Models\Chariot;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $produits = Produit::join('images', 'produit_id', 'produits.id')->groupBy('produit_id')->paginate(10);
        return view('produits.produits', ['produits' => $produits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produits.nouvel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produit = Produit::create($request->except(['_token', 'images', 'video', 'vignette']));
        $cat = ucwords($request->categorie);
        $categorie = Categorie::where('id', $request->categorie)->first();
        // Creation d'une nouvelle categorie;
        if ($categorie == null) {
            $cat_id = Categorie::create(['name' => $cat, 'nombre_prod' => 1]);
            $imageSaveCat = new Images;
            $produit->categorie = $cat_id->id;
            $produit->save();
            $imageSaveCat->categorie_id = $cat_id->id;
            $imageSaveCat->save();
            $catno = false;
        } else {
            $imageSaveCat = Images::where('categorie_id', $categorie->id);
            $produit->categorie = $categorie->id;
            $produit->save();
            $categorie->nombre_prod = 1 + (int)$categorie->nombre_prod;
            $categorie->save();
            $catno = true;
        }
        if ($request->file('images') != '') {
            foreach ($request->file('images') as $index => $image) {
                $imageSave = new Images;
                $file = Str::random(5);
                $ext = $image->getClientOriginalExtension();
                $fileName = $file . '.' . $ext;
                $path = $image->storeAs(
                    'images/produits',
                    $fileName,
                    'public'
                );
                $path2 = $image->storeAs(
                    'images/categorie',
                    $fileName,
                    'public'
                );
                $imageSave->images = $path;
                $imageSave->produit_id = $produit->id;
                if (!$catno) {
                    $imageSaveCat->images = $path2;
                    $imageSaveCat->save();
                }
                $imageSave->save();
            }
        } else {
            $imageSave = new Images;
            $imageSave->produit_id = $produit->id;
            $imageSave->save();
        }
        if ($request->file('video')) {
            foreach ($request->video as $index => $image) {
                $imageSave = new Images;
                $file = Str::random(5);
                $ext = $image->getClientOriginalExtension();
                $fileName = $file . '.' . $ext;
                $path = $image->storeAs(
                    'videos/produits',
                    $fileName,
                    'public'
                );
                $imageSave->video = $path;
                $imageSave->produit_id = $produit->id;
                $imageSave->save();
            }
        }
        Session()->put('alert-session', "produit-save");
        return redirect()->route('produits')->with('success', "produit");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = Produit::find($id)
        //     ->join('images', 'produits.id', 'produit_id')
        //     ->first();
        // dd($data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = Produit::where('produits.id', $request->id)
            ->join('images', 'produits.id', 'produit_id')->first();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $produit = Produit::find($request->id);
        $produit->update($request->except(['_token']));
        if ($request->file('images') != '') {
            foreach ($request->file('images') as $index => $image) {
                $images = Images::where('produit_id', $produit->id)->get();
                foreach ($images as $image) {
                    Storage::disk('public')->delete($image->images);
                }
                Images::where('produit_id', $produit->id)->delete();
                $imageSave = new Images;
                $file = Str::random(5);
                $ext = $image->getClientOriginalExtension();
                $fileName = $file . '.' . $ext;
                $path = $image->storeAs(
                    'images/produits',
                    $fileName,
                    'public'
                );
                $imageSave->images = $path;
                $imageSave->produit_id = $produit->id;
                $imageSave->save();
            }
        } else {
            $imageSave = new Images;
            $imageSave->produit_id = $produit->id;
            $imageSave->save();
        }
        if ($request->file('video')) {
            foreach ($request->video as $index => $image) {
                $imageSave = new Images;
                $file = Str::random(5);
                $ext = $image->getClientOriginalExtension();
                $fileName = $file . '.' . $ext;
                $path = $image->storeAs(
                    'videos/produits',
                    $fileName,
                    'public'
                );
                $imageSave->video = $path;
                $imageSave->produit_id = $produit->id;
                $imageSave->save();
            }
        }
        Session()->put('alert-session', 'produit-update');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        } catch (Exception $exc) {
            DB::statement('PRAGMA foreign_keys = OFF');
        }
        $images = Images::where('produit_id', $id)->get();
        $produit = Produit::findOrfail($id);
        $categorie = Categorie::where('id', $produit->categorie)->first();
        $categorie->nombre_prod = 1 - (int)$categorie->nombre_prod;
        if ((int)$categorie->nombre_prod <= 0) $categorie->delete();
        foreach ($images as $image) {
            Storage::disk('public')->delete($image->images);
        }
        Images::where('produit_id', $id)->delete();
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        } catch (Exception $exc) {
            DB::statement('PRAGMA foreign_keys = ON');
        }
        Session()->put('alert-session', "produit-delete");
        return redirect()->route('produits');
    }
}
