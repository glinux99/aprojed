<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Inertia\Inertia;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'published_articles' => Article::where('publicate', 1)->count(),
            'unpublished_articles' => Article::where('publicate', 0)->count(),
        ];

        // Generate data for the article publication chart
        $articlePublications = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $count = Article::where('publicate', 1)->whereDate('created_at', $date->toDateString())->count();
            $articlePublications[] = [
                'date' => $date->format('Y-m-d'),
                'count' => $count,
            ];
        }

        $chartData = [
            'labels' => array_column($articlePublications, 'date'),
            'datasets' => [
            'label' => 'Articles publiés par jour', 'data' => array_column($articlePublications, 'count'), 'backgroundColor' => 'rgba(54, 162, 235, 0.2)', 'borderColor' => 'rgba(54, 162, 235, 1)', 'borderWidth' => 1,
            ]
        ];

        $recentArticles = Article::where('publicate', 1)
            ->with('user', 'category')
            ->latest()
            ->take(3)
            ->get();

        $recentUsers = User::latest()->take(3)->get();

        return Inertia::render('Dashboard', [
            'stats' => $stats,
            'recentArticles' => $recentArticles,
            'chartData' => $chartData,
            'recentUsers' => $recentUsers,
        ]);
    }
}
