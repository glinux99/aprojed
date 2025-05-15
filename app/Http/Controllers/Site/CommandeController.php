<?php

namespace App\Http\Controllers\Site;

use App\Models\Chariot;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function commandeClient($status)
    {
        $commande = Commande::join('users', 'users.id', 'commandes.users_id')
            ->join('produits', 'produits.id', 'commandes.produit_id')
            ->select('commandes.*', 'produits.*', 'users.*', 'users.name AS username', 'produits.name AS produit_name', 'commandes.id AS commande_id')
            ->where('status', $status)
            ->get();
        return $commande;
    }
    public function index()
    {
        $commandes = CommandeController::commandeClient("0");
        // dd($commandes[0]->remise);
        $commandesaccepte = CommandeController::commandeClient("1");
        $commandesannnuler = CommandeController::commandeClient("2");
        return view(
            'produits.demande',
            [
                'commandes' => $commandes,
                'commandesaccepte' => $commandesaccepte,
                'commandesannuler' => $commandesannnuler
            ]
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commande = Commande::where('users_id', Auth::user()->id)
            ->join('produits', 'produits.id', 'produit_id')
            ->select('produits.*', 'commandes.*', 'commandes.qte AS commande_qte')
            ->where('status', '0')
            ->paginate(10);
        return view('site.commande_attente', ['commandes' => $commande]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chariots = Chariot::where('users_id', Auth::user()->id)->get();
        $commande_send = "african-brand-cmd-" . Str::random(8);
        foreach ($chariots as $chariot) {
            if ($request->adresse_id == "locale") {
                $commande = Commande::create($request->except('_token', 'adresse_id'));
            } else {
                $commande = Commande::create($request->except('_token'));
            }
            $prod = Produit::find($chariot->produit_id);
            $remise = (float)$prod->prix;
            if ($prod->remise != 0) {
                $remise = (float)$prod->prix - ((float)($prod->remise) * (float)$prod->prix / 100);
            }
            // dd($remise);
            $prix = (float)$remise * (float)$chariot->qte;
            $commande->users_id = Auth::user()->id;
            $commande->qte = $chariot->qte;
            $commande->produit_id = $chariot->produit_id;
            $commande->images = $chariot->images;
            $commande->commande_id = $commande_send;
            $commande->total = $prix;
            $commande->status = 0;
            $commande->save();
            $chariot->delete();
        }
        $home = new HomeSiteController;
        $home->config();
        return redirect()->route('produit.comande.index');
    }
    public function acceptCommande($id)
    {
        $commande = Commande::find($id);
        $prod = Produit::find($commande->produit_id);
        if ((float)$prod->qte < (float)$commande->qte) {
            Session()->put('alert-session', "error-produit");
            return redirect()->route('commades');
        }
        $prod->update(['qte' => (float) $prod->qte - (float) $commande->qte]);
        $commande->status = 1;
        $commande->save();
        Session()->put('alert-session', "commande-valide");
        return redirect()->route('commades');
    }
    public function annulerCommande($id)
    {
        $commande = Commande::find($id);
        $commande->status = 2;
        $prod = Produit::find($commande->produit_id);
        $prod->update(['qte' => (float) $prod->qte + (float)$commande->qte]);
        $commande->save();
        return redirect()->route('commades');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $commandes = Commande::join('users', 'users.id', 'commandes.users_id')
            ->join('produits', 'produits.id', 'commandes.produit_id')
            ->select('commandes.*', 'produits.*', 'users.*', 'users.name AS username', 'produits.name AS produit_name', 'commandes.id AS commandeId', 'commandes.qte AS commande_qte', 'produits.qte AS produit_qte')
            ->where('commandes.id', $request->id)
            ->first();
        return response()->json(['count' => $request->id, 'commandes' => $commandes]);
    }
    public function buy()
    {
        $commande = Commande::where('users_id', Auth::user()->id)
            ->join('produits', 'produits.id', 'produit_id')
            ->select('produits.*', 'commandes.*', 'commandes.qte AS commande_qte')
            ->where('status', '1')
            ->paginate(10);
        return view('site.achat', ['commandes' => $commande]);
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
        Commande::find($id)->delete();
        // Alert::toast('Your Post as been submited!', 'success');
        return redirect()->route('commades');
    }
}
