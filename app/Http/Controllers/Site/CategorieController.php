<?php

namespace App\Http\Controllers\Site;

use Exception;
use App\Models\Images;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::join('images', 'categorie_id', 'categories.id')->paginate(10);
        return view('produits.categorie', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = [];

        if ($request->input('q')) {
            $search = $request->q;
            $data = Categorie::select("id", "name")
                ->where('name', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($data);
    }
    public function visible(Request $request)
    {
        $categorie = Categorie::find($request->id);
        if ($categorie->visible != "0") $categorie->visible = "0";
        else $categorie->visible = "1";
        $categorie->save();
        return response()->json(['id' => $request->id, 'visible' => $categorie->visible]);
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
        $cat_id = Categorie::create(['name' => $request->name, 'nombre_prod' => 1]);
        if ($request->file('images') != '') {
            $imageSave = new Images;
            $image = $request->file('images');
            $file = Str::random(5);
            $ext = $image->getClientOriginalExtension();
            $fileName = $file . '.' . $ext;
            $path2 = $image->storeAs(
                'images/categorie',
                $fileName,
                'public'
            );
            $imageSave->images = $path2;
            $imageSave->categorie_id = $cat_id->id;
            $imageSave->save();
        }
        Session()->put('alert-session', "categorie-save");
        return redirect()->route('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = Categorie::where('categories.id', $request->id)
            ->join('images', 'categories.id', 'categorie_id')
            ->first();
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
        try {
            $categorie = Categorie::find($request->id);
            // dd($request->id);
            $categorie->update($request->except(['_token', 'nombre_prod']));
            if ($request->file('images')) {
                $image = $request->file('images');
                $imageSave = Images::where('categorie_id', $request->id)->first();
                Storage::disk('public')->delete($imageSave->images);
                $file = Str::random(5);
                $ext = $image->getClientOriginalExtension();
                $fileName = $file . '.' . $ext;
                $path = $image->storeAs(
                    'images/categorie',
                    $fileName,
                    'public'
                );
                $imageSave->images = $path;
                $imageSave->categorie_id = $categorie->id;
                $imageSave->save();
            }
            Session()->put('alert-session', "categorie-update");
        } catch (Exception $exc) {
            Session()->put('alert-session', "error");
        }
        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Session()->put('alert-session', "categorie-delete");
    }
}
