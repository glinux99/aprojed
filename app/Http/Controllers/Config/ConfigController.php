<?php

namespace App\Http\Controllers\Config;

use App\Models\User;
use App\Models\Images;
use App\Models\ConfigSite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
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
    public function autres_index()
    {
        $configs = ConfigSite::find(1);
        return view('config.autres', ['config' => $configs]);
    }
    public function autres_index_update(Request $request)
    {
        $count = ConfigSite::all()->count();
        if ($count >= 10) ConfigSite::truncate();
        if (!$count) {
            $config = ConfigSite::create($request->except(['_token', 'pub_images', 'center_images']));
            if ($request->file('images') != '') {
                foreach ($request->file('images') as $index => $image) {
                    $imageSave = new Images;
                    $file = Str::random(5);
                    $ext = $image->getClientOriginalExtension();
                    $fileName = $file . '.' . $ext;
                    $path = $image->storeAs(
                        'images/config',
                        $fileName,
                        'public'
                    );
                    $imageSave->images = $path;
                    $imageSave->config_id = $config->id;
                    $imageSave->save();
                }
            } else {
                $imageSave = new Images;
                $imageSave->config_id = $config->id;
                $imageSave->save();
            }
        } else {
            $config = ConfigSite::find(1);
            $config->update($request->except(['_token', 'pub_images', 'center_images']));
            if ($request->file('images') != '') {
                foreach ($request->file('images') as $index => $image) {
                    $imageSave = new Images;
                    $file = Str::random(5);
                    $ext = $image->getClientOriginalExtension();
                    $fileName = $file . '.' . $ext;
                    $path = $image->storeAs(
                        'images/config',
                        $fileName,
                        'public'
                    );
                    $imageSave->images = $path;
                    $imageSave->config_id = $config->id;
                    $imageSave->save();
                }
                ConfigController::delete($config->id);
            }
        }
        if ($request->file('pub_images') != '') {
            $imgdel = Images::where('pub_images', 1)->get();
            foreach ($imgdel as $image) {
                Storage::disk('public')->delete($image->images);
                $image->delete();
            }
            foreach ($request->file('pub_images') as $index => $image) {
                $imageSave = new Images;
                $file = Str::random(5);
                $ext = $image->getClientOriginalExtension();
                $fileName = $file . '.' . $ext;
                $path = $image->storeAs(
                    'images/publicite',
                    $fileName,
                    'public'
                );
                $imageSave->images = $path;
                $imageSave->pub_images = 1;
                $imageSave->save();
            }
        }
        if ($request->file('center_images') != '') {
            $imgdel = Images::where('center_images', 1)->get();
            foreach ($imgdel as $image) {
                Storage::disk('public')->delete($image->images);
                $image->delete();
            }
            foreach ($request->file('center_images') as $index => $image) {
                $imageSave = new Images;
                $file = Str::random(5);
                $ext = $image->getClientOriginalExtension();
                $fileName = $file . '.' . $ext;
                $path = $image->storeAs(
                    'images/publicite',
                    $fileName,
                    'public'
                );
                $imageSave->images = $path;
                $imageSave->center_images = 1;
                $imageSave->save();
            }
        }
        return redirect()->route('admin.site');
    }
    public function apropos_index()
    {
        $users = User::role('staff')->paginate(10);
        return view('config.apropos', ['users' => $users]);
    }

    public function EntrepriseConfig()
    {
        // config(['app.name' => "AFRICAN BRAND 2"]);
        // Artisan::call('env:set app_name Example');
        // Artisan::call('config:cache');
        $config = ConfigSite::find(1);
        return view('config.entreprise', ['config' => $config]);
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
    public function delete($id)
    {
        $images = Images::where('config_id', $id)->get();
        foreach ($images as $image) {
            Storage::disk('public')->delete($image->images);
        }
        Images::where('config_id', $id)->delete();
    }
}
