@extends('layouts.system')
@section('content')
<div class="aiz-main-content">
    <div class="px-15px px-lg-25px">


        <div class="aiz-titlebar text-left mt-2 mb-3">
            <h5 class="mb-0 h6">{{__("Ajouter une nouvelle matiere premiere")}}</h5>
        </div>
        <div class="">
            <form class="form form-horizontal mar-top" action="{{ route('produit.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
                @csrf
                <div class="row gutters-5">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">{{__("Information sur la matiere premiere")}}</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">{{__("Designation") }}<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" placeholder="__(' Nom du produit')" onchange="update_sku()" required>
                                    </div>
                                </div>
                                <div class="form-group row" id="brand">
                                    <label class="col-md-3 col-from-label">{{__("Marque")}}</label>
                                    <div class="col-md-8">
                                        <select class="form-control selectcategorie" name="categorie" id="brand_id" data-live-search="true">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">{{__("Type d'embalage")}}</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="unite" placeholder="Unit (e.g. KG, Pc etc)" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">{{__("Unite par defaut")}}</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="unite" placeholder="Unit (e.g. KG, Pc etc)" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">{{__("Sous compte")}} <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" placeholder="__(' Nom du produit')" onchange="update_sku()" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">{{__("Description de la matiere premiere")}}</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">{{__("La description")}}</label>
                                    <div class="col-md-8">
                                        <textarea class="aiz-text-editor" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">{{__("Images du produit")}}</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="signinSrEmail">{{__("Image de la galerie")}} <small>(600x600)</small></label>
                                    <div class="col-md-8">
                                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                            <input type="file" name="images[]" id="" class="form-control" multiple>
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                        <small class="text-muted">__("Ces images sont visibles dans la galerie de la page de détails du produit. Utilisez des images de taille 600x600.")</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="signinSrEmail">{{__("Vignette")}} <small>(300x300)</small></label>
                                    <div class="col-md-8">
                                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                            <input type="file" name="vignette" id="" class="form-control">
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                        <small class="text-muted text-justify">{{__("Cette image est visible dans toutes les boîtes de produits. Utilisez une image de taille 300 x 300. Gardez un espace vide autour de l'objet principal de votre image car nous avons dû recadrer certains bords dans différents appareils pour le rendre réactif.")}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="Third group">
                                <button type="submit" name="button" value="unpublish" class="btn btn-primary action-btn">{{__("Enregistrer et Acheter")}}</button>
                            </div>
                            <div class="btn-group" role="group" aria-label="Second group">
                                <button type="submit" name="button" value="publish" class="btn btn-success action-btn">{{__("Enregistrer")}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div><!-- .aiz-main-content -->
@endsection
