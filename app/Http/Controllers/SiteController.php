<?php

namespace App\Http\Controllers;

use App\Models\Partner;
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
          $partners = Partner::all();

        return view("home", ['recentActivities' => $recentActivities,'siteSettings'=>$siteSettings, "partners"=>$partners]);
    }
     public function about(){
        // On récupère tous les utilisateurs qui ne sont pas de simples 'utilisateurs' pour les afficher comme membres de l'équipe.
        $roleOrder = [
            'Directeur exécutif',
            'Admin/As programme',
            'Logisticien comptable',
            'Superviseur protection de l’enfant',
            'Communication/As log',
            'Superviseur santé et Genre',
            'Réceptionniste',
            'EDUCATION APROJED',
            'Directeur des écoles',
            'Gestionnaire comptable',
            'CRSclaire Aprojed',
            'CENTRE D’APPRENTISSAGE PROFETIONNEL (CAP)',
            'Superviseur psycho-social',
            'GRH CAP Aprojed',
            'Superviseur formateur CAP',
            'Formateur log CAP',
            'ANTENNE APROJED',
            'Chef d’antenne BUVIRA',
            'Chef d’antenne MUGUNGA',
            'Chef d’antenne KAYNA',
            'editor',
            'user',
            'admin',
        ];

        $teamMembers = User::whereNotIn('role', ['user', 'admin'])
                            ->orderByRaw("FIELD(role, '" . implode("','", $roleOrder) . "')")
                            ->get();
         $siteSettings= Setting::first();
          $partners = Partner::all();
        return view("about", ['teamMembers' => $teamMembers,'siteSettings'=>$siteSettings, "partners"=>$partners]);
    }

     public function contact(){
        $siteSettings= Setting::first();
         $partners = Partner::all();
        return view("contact", ['siteSettings'=>$siteSettings, "partners"=>$partners]);
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
          $partners = Partner::all();
        return view("activities", [
            'activities' => $activities,
            'categories' => $categories,'siteSettings'=>$siteSettings, "partners"=>$partners
        ]);
    }

    public function showActivity(Article $article)
    {
        if (!$article->publicate) {
            abort(404);
        }
        $siteSettings= Setting::first();
        $partners = Partner::all();
        $article->load('user', 'category', 'documents');
        $recentActivities = Article::where('publicate', 1)
                                   ->where('id', '!=', $article->id)
                                   ->latest()
                                   ->take(5)
                                   ->get();

        return view("activity-detail", ['activity' => $article, 'siteSettings' => $siteSettings, "partners" => $partners, 'recentActivities' => $recentActivities]);
    }
}
