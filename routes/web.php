<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Config\NewsController;
use App\Http\Controllers\Site\ProduitController;
use App\Http\Controllers\Config\ConfigController;
use App\Http\Controllers\Site\CommandeController;
use App\Http\Controllers\Site\HomeSiteController;
use App\Http\Controllers\Users\AdresseController;
use App\Http\Controllers\Users\ChariotController;
use App\Http\Controllers\Membres\ClientController;
use App\Http\Controllers\Site\CategorieController;
use App\Http\Controllers\Admin\AdminSiteController;
use App\Http\Controllers\Admin\operation\OperationController;
use App\Http\Controllers\Admin\stock\StockController;
use App\Http\Controllers\Membres\PartenaireController;
use App\Http\Controllers\Membres\FournisseurController;
use App\Http\Controllers\Promotion\PromotionController;
use App\Http\Controllers\System\SystemController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Routes propres

// Route::get('register', [ClientController::class, 'index'])->name('clients');
Route::get('artisan/{query}', function ($query) {
    Artisan ::call($query);
    $output = Artisan::output();
    return  $output;
});
Auth::routes();

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('staff', [UserController::class, 'index'])->name('staff');
    Route::post('store-staff', [UserController::class, 'store'])->name('staff.store');
    Route::get('create-staff', [UserController::class, 'create'])->name('staff.create');
    Route::get('delete-staff/{id}', [UserController::class, 'destroy'])->name('staff.delete');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::get('update-profile', [UserController::class, 'profile_update'])->name('user.profile');
    Route::post('update-profile-me', [UserController::class, 'profile_update_me'])->name('update.profile');

    // Fournisseurs
    Route::get('fournisseurs', [FournisseurController::class, 'index'])->name('fournisseurs');
    Route::get('partenaires', [PartenaireController::class, 'index'])->name('partenaires');
    Route::get('clients', [ClientController::class, 'index'])->name('clients');
    Route::post('create-fournisseurs', [FournisseurController::class, 'store'])->name('fournisseurs.store');
    Route::post('create-partenaires', [PartenaireController::class, 'store'])->name('partenaires.store');
    Route::post('create-clients', [ClientController::class, 'store'])->name('clients.store');
    Route::post('update-fournisseurs', [FournisseurController::class, 'update'])->name('fournisseurs.update');
    Route::post('update-partenaires', [PartenaireController::class, 'update'])->name('partenaires.update');
    Route::post('update-clients', [ClientController::class, 'update'])->name('clients.update');
    Route::get('delete-fournisseur/{id}', [FournisseurController::class, 'destroy'])->name('fournisseurs.delete');
    Route::get('delete-partenaire/{id}', [PartenaireController::class, 'destroy'])->name('partenaires.delete');
    Route::get('detete-client/{id}', [ClientController::class, 'destroy'])->name('clients.delete');
    Route::post('edit-client', [ClientController::class, 'edit'])->name('clients.edit');
    Route::post('add-fournisseur', [FournisseurController::class, 'edit'])->name('fournisseurs.edit');
    Route::post('add-partenaire', [PartenaireController::class, 'edit'])->name('partenaires.edit');
    Route::get('creation-produit', [ProduitController::class, 'create'])->name('produit');
    Route::get('all-produit', [ProduitController::class, 'index'])->name('produits');
    Route::post('create-produit', [ProduitController::class, 'store'])->name('produit.store');
    Route::post('update-produit', [ProduitController::class, 'update'])->name('produit.update');
    Route::post('show-produit', [ProduitController::class, 'edit'])->name('produit.details.info');
    Route::get('delete-produit/{id}', [ProduitController::class, 'destroy'])->name('produit.delete');
    Route::get('charriot/{id}', [ChariotController::class, 'show'])->name('produit.cart');
    Route::get('charriot-info', [ChariotController::class, 'create'])->name('produit.cart.info');
    Route::post('charriot-add', [ChariotController::class, 'store'])->name('produit.cart.add');
    Route::get('charriot-all', [ChariotController::class, 'index'])->name('produit.cart.all');
    Route::post('commande-send', [CommandeController::class, 'store'])->name('produit.comande.send');
    Route::get('commande-check', [CommandeController::class, 'create'])->name('produit.comande.index');
    Route::get('commande-buy', [CommandeController::class, 'buy'])->name('produit.comande.buy');
    Route::get('commande-accept/{id}', [CommandeController::class, 'acceptCommande'])->name('produit.comande.accept');
    Route::get('commande-annuler/{id}', [CommandeController::class, 'annulerCommande'])->name('produit.comande.annuler');
    Route::get('commande-delete/{id}', [CommandeController::class, 'destroy'])->name('produit.comande.delete');
    Route::get('delete-produit-panier/{id}', [ChariotController::class, 'destroy'])->name('produit.cart.delete');
    Route::post('create-adresse', [AdresseController::class, 'store'])->name('adresse.store');
    Route::post('editer-adresse', [AdresseController::class, 'edit'])->name('adresse.edit');
    Route::post('editer-mon-adresse', [AdresseController::class, 'editer'])->name('adresse.editer');
    Route::get('delete-adresse/{id}', [AdresseController::class, 'destroy'])->name('adresse.delete');
    Route::get('all-categories', [CategorieController::class, 'index'])->name('categories');
    Route::get('/produitCategorie', [CategorieController::class, 'create'])->name('categories.exists');
    Route::post('/modifier-Categorie', [CategorieController::class, 'update'])->name('categories.update');
    Route::post('/Categorie-modifier', [CategorieController::class, 'edit'])->name('categories.update.call');
    Route::post('/detail', [CategorieController::class, 'edit'])->name('categories.details');
    Route::post('/visible', [CategorieController::class, 'visible'])->name('categories.visible');
    Route::post('/categorie-config', [CategorieController::class, 'store'])->name('categories.config');
    Route::get('commade', [CommandeController::class, 'index'])->name('commades');
    Route::post('commade-accept', [CommandeController::class, 'show'])->name('commade.show');
    Route::get('/admin', [AdminSiteController::class, 'index'])->name('admin.site');
    Route::get('/configuration-de-news', [NewsController::class, 'index_config'])->name('news.config');
    Route::post('/creation-de-news', [NewsController::class, 'store'])->name('news.config.store');
    Route::get('/autres-config', [ConfigController::class, 'autres_index'])->name('autres.config');
    Route::post('/autres-update-config', [ConfigController::class, 'autres_index_update'])->name('autres.config.update');
    Route::get('/apropos-config', [ConfigController::class, 'apropos_index'])->name('apropos.config');
    Route::get('/update-config', [ConfigController::class, 'apropos_index'])->name('apropos.config.update');
    Route::get('/promition-produit', [PromotionController::class, 'index'])->name('promition.produit.index');
    Route::post('/promition-store', [PromotionController::class, 'store'])->name('promition.produit.store');
    Route::get('/admin-entreprise', [ConfigController::class, 'EntrepriseConfig'])->name('admin.entreprise.config');

    // Configuration du systeme
    Route::get('/admin-system', [SystemController::class, 'AccesSystem'])->name('admin.system');
    Route::get('/admin-matiere-premiere', [SystemController::class, 'createMatierePremiere'])->name('admin.create.matiere.premiere');
    Route::get('/admin-produit-fini', [SystemController::class, 'createProduitFini'])->name('admin.create.produit.fini');
    Route::get('/admin-matiere-consommable', [SystemController::class, 'createMatiereConsommable'])->name('admin.create.matiere.consommable');
    Route::get('/admin-equipement', [SystemController::class, 'createEquipement'])->name('admin.create.equipement');
    Route::get('/admin-charges', [SystemController::class, 'createCharges'])->name('admin.create.charge');
    Route::get('/admin-stock-produit-fini', [StockController::class, 'listProduitFini'])->name('admin.stock.produit.fini');
    Route::get('/admin-stock-matiere-consommable', [StockController::class, 'listMatiereConsommable'])->name('admin.stock.matiere.consommable');
    Route::get('/admin-stock-matiere-premiere', [StockController::class, 'listMatierePremiere'])->name('admin.stock.matiere.premiere');
    //Nouvelle operation
    Route::get('/admin-operation-achat', [OperationController::class, 'achat'])->name('admin.operation.achat');
    Route::get('/admin-operation-transformation', [OperationController::class, 'transformation'])->name('admin.operation.transformation');
    Route::get('/admin-operation-vente', [OperationController::class, 'vente'])->name('admin.operation.vente');
});

// Routes sur le site
Route::get('/', [HomeSiteController::class, 'index'])->name('index');
Route::get('/details-produit/{id}', [HomeSiteController::class, 'details'])->name('produit.details');
Route::post('/details-produits', [HomeSiteController::class, 'details_posts'])->name('produit.details.post');
Route::get('/produit/{id}/categorie/', [HomeSiteController::class, 'produitCat'])->name('produit.categorie');
Route::get('/details-de-news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/produit', [HomeSiteController::class, 'produit'])->name('home.produit');
Route::get('/actualite', [NewsController::class, 'index'])->name('news.all');
Route::get('/contact', [HomeSiteController::class, 'contact'])->name('contact');
Route::get('apropos', [HomeSiteController::class, 'apropos'])->name('apropos');
Route::get('/categories', [HomeSiteController::class, 'categories'])->name('categories.all');
// Essaies
Route::get('/test', function () {
    return view('test');
});
// Route::get('/test/{id}', [CategorieController::class, 'show'])->name('categories.details');
Route::get('/links', function () {
    Artisan::call('storage:link');
});
Route::get('/migration', function () {
    Artisan::call('migrate:refresh --seed');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/{lang?}', function ($lang = null) {

//     if (isset($lang) && in_array($lang, config('app.available_locales'))) {
//         app()->setLocale($lang);
//     }
//     // langue
//     return view('welcome');
// });
Route::get('langue/{lang}', function ($lang) {

     $locale = $lang;
        if (in_array($locale, ['en', 'fr', 'sw'])) {
            Session ::put('locale', $locale);
            App::setLocale($locale);
        }
        return redirect()->back();
})->name('locale.change');
