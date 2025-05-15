<?php

namespace App\Http\Controllers\Config;

use App\Models\Images;
use App\Models\Actualite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Actualite::join('images', 'actualite_id', 'actualites.id')->with('user')->paginate(10);
        return view('site.news', ['news' => $news]);
    }
    public function index_config()
    {
        return view('config.news');
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
        $request['user_id'] = Auth::user()->id;
        $actualite = Actualite::create($request->except(['_token', 'images']));
        if ($request->file('images') != '') {
            foreach ($request->file('images') as $index => $image) {
                $imageSave = new Images;
                $file = Str::random(5);
                $ext = $image->getClientOriginalExtension();
                $fileName = $file . '.' . $ext;
                $path = $image->storeAs(
                    'images/Actualites',
                    $fileName,
                    'public'
                );
                $imageSave->images = $path;
                $imageSave->actualite_id = $actualite->id;
                //$imageSaveCat->save();
                $imageSave->save();
            }
        } else {
            $imageSave = new Images;
            $imageSave->actualite_id = $actualite->id;
            $imageSave->save();
        }
        return NewsController::index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentNews = Actualite::where('actualites.id', $id)->join('images', 'actualite_id', 'actualites.id')
            ->with('user')
            ->first();

        $news = Actualite::join('images', 'actualite_id', 'actualites.id')->with('user')->paginate(10);
        return view('site.newsdetails', ['news' => $news, 'currentNews' => $currentNews]);
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
        $images = Images::where('actualite_id', $id)->get();
        foreach ($images as $image) {
            Storage::disk('public')->delete($image->images);
        }
        Images::where('actualite_id', $id)->delete();
    }
}
