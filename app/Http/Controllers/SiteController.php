<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $recentActivities = Article::with('category')->where('publicate', 1)->latest()->take(3)->get();
         $siteSettings= Setting::first();
        return view("home", ['recentActivities' => $recentActivities,'siteSettings'=>$siteSettings]);
    }
     public function about(){
        // On récupère tous les utilisateurs qui ne sont pas de simples 'utilisateurs' pour les afficher comme membres de l'équipe.
        $teamMembers = User::where('role', '!=', 'user')->where('role', '!=', 'admin')->orderBy('name')->get();
         $siteSettings= Setting::first();
        return view("about", ['teamMembers' => $teamMembers,'siteSettings'=>$siteSettings]);
    }

     public function contact(){
        $siteSettings= Setting::first();
        return view("contact", ['siteSettings'=>$siteSettings]);
    }
    public function activities()
    {
        $activities = Article::with('user', 'category', 'documents')->where('publicate', 1)->latest()->paginate(9);

        $categories = Category::withCount(['articles' => function ($query) {
            $query->where('publicate', 1);
        }])
        ->orderBy('name')
        ->get();
         $siteSettings= Setting::first();
        return view("activities", [
            'activities' => $activities,
            'categories' => $categories,'siteSettings'=>$siteSettings
        ]);
    }

    public function showActivity(Article $article)
    {
        if (!$article->publicate) {
            abort(404);
        }
         $siteSettings= Setting::first();
        $article->load('user', 'category', 'documents');
        return view("activity-detail", ['activity' => $article,'siteSettings'=>$siteSettings]);
    }
}
