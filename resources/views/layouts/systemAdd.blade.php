@extends('layouts.system')
@section('content')
<div class="aiz-main-content">
    <div class="px-15px px-lg-25px">


        <div class="aiz-titlebar text-left mt-2 mb-3">
            <h5 class="mb-0 h6"> {{ __("Ajouter une nouvelle matiere premiere")</h5>
        </div>
        <div class="">
            <form class="form form-horizontal mar-top" action="{{ route('produit.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
                @csrf
                <div class="row gutters-5">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6"> {{ __("Information sur la matiere premiere")</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label"> {{ __("Designation") <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" placeholder="__(' Nom du produit')" onchange="update_sku()" required>
                                    </div>
                                </div>
                                <div class="form-group row" id="brand">
                                    <label class="col-md-3 col-from-label"> {{ __("Marque")</label>
                                    <div class="col-md-8">
                                        <select class="form-control selectcategorie" name="categorie" id="brand_id" data-live-search="true">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label"> {{ __("Type d'embalage")</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="unite" placeholder="Unit (e.g. KG, Pc etc)" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label"> {{ __("Unite par defaut")</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="unite" placeholder="Unit (e.g. KG, Pc etc)" required>
                                    </div>
                                </div>
                                @yield('compte')
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label"> {{ __("Sous compte") <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" placeholder="__(' Nom du produit')" onchange="update_sku()" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6"> {{ __("Description de la matiere premiere")</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label"> {{ __("La description")</label>
                                    <div class="col-md-8">
                                        <textarea class="aiz-text-editor" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Product Shipping Cost</h5>
                    </div>
                    <div class="card-body">

                    </div>
                </div>-->

                    </div>

                    <div class="col-12">
                        <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="Third group">
                                <button type="submit" name="button" value="unpublish" class="btn btn-primary action-btn"> {{ __("Enregistrer et Acheter")</button>
                            </div>
                            <div class="btn-group" role="group" aria-label="Second group">
                                <button type="submit" name="button" value="publish" class="btn btn-success action-btn"> {{ __("Enregistrer")</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div><!-- .aiz-main-content -->
@endsection
