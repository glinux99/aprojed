<?php

namespace App\Http\Controllers\Membres;

use Alert;
use App\Models\User;
use App\Models\Images;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type', 'fournisseurs')->join('images', 'users.id', 'user_id')
            ->select('users.*', 'users.id AS membre_id', 'images.*')->paginate(10);
        return view('users.ClientPartenairesFournisseurs.fournisseurs', ['users' => $users]);
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
        $type = "fournisseurs";
        $mbr = User::create($request->except(['_token', 'images', 'documents', 'type']))->assignRole('fournisseur');
        $mbr->type = $type;
        if ($request->file('images')) {
            foreach ($request->file('images') as $index => $image) {
                $imageSave = new Images;
                $file = Str::random(5);
                $ext = $image->getClientOriginalExtension();
                $fileName = $file . '.' . $ext;
                $path = $image->storeAs(
                    'images/' . $type,
                    $fileName,
                    'public'
                );
                $imageSave->images = $path;
                $imageSave->user_id = $mbr->id;
                $imageSave->save();
            }
        } else {
            $imageSave = new Images;
            $imageSave->user_id = $mbr->id;
            $imageSave->save();
        }
        if ($request->documents) {
            foreach ($request->documents as $index => $image) {
                $imageSave = new Images;
                $file = Str::random(5);
                $ext = $image->getClientOriginalExtension();
                $fileName = $file . '.' . $ext;
                $path = $image->storeAs(
                    'documents/' . $type,
                    $fileName,
                    'public'
                );
                $imageSave->documents = $path;
                $imageSave->fournisseur_id = $mbr->id;
                $imageSave->save();
            }
        }
        $mbr->save();
        return redirect()->route($type);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
        $data = User::where('users.id', $request->id)->join('images', 'images.user_id', 'users.id')->first();
        return response()->json(
            $data
        );
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
        $type = "fournisseurs";
        $mbr = User::where('id', $request->id)->first();
        $mbr->update($request->except(['_token', 'images', 'documents', 'type']));
        if ($request->file('images')) {
            foreach ($request->file('images') as $index => $image) {
                $imageSave = new Images;
                $file = Str::random(5);
                $ext = $image->getClientOriginalExtension();
                $fileName = $file . '.' . $ext;
                $path = $image->storeAs(
                    'images/' . $type,
                    $fileName,
                    'public'
                );
                $imageSave->images = $path;
                $imageSave->user_id = $mbr->id;
                $imageSave->save();
                FournisseurController::delete($mbr->id);
            }
        }
        if ($request->documents) {
            foreach ($request->documents as $index => $image) {
                $imageSave = new Images;
                $file = Str::random(5);
                $ext = $image->getClientOriginalExtension();
                $fileName = $file . '.' . $ext;
                $path = $image->storeAs(
                    'documents/' . $type,
                    $fileName,
                    'public'
                );
                $imageSave->documents = $path;
                $imageSave->fournisseur_id = $mbr->id;
                $imageSave->save();
            }
        }
        $mbr->save();
        return redirect()->route($type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FournisseurController::delete($id);
        User::find($id)->delete();
        return \redirect()->route('fournisseurs');
    }
    public function delete($id)
    {
        $images = Images::where('user_id', $id)->get();
        foreach ($images as $image) {
            Storage::disk('public')->delete($image->images);
        }
        Images::where('user_id', $id)->delete();
    }
}
