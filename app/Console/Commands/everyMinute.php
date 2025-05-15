<?php

namespace App\Console\Commands;

use App\Models\Produit;
use App\Models\Promotion;
use Illuminate\Console\Command;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'promotion:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $promotions = Promotion::where('deadline', '<=', \Carbon\Carbon::now()->toDateString())->get();
        foreach ($promotions as $promotion) {
            $produit = Produit::findOrfail($promotion->produit_id);
            $produit->update(['remise' => 0]);
        }
        Promotion::where('deadline', '<=', \Carbon\Carbon::now()->toDateString())->delete();
        echo "execute";
    }
}
