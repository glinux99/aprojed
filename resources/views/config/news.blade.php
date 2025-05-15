@extends('layouts.app')
@section('content')
<div class="aiz-main-content">
    <div class="px-15px px-lg-25px">
        <div class="aiz-titlebar text-left mt-2 mb-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h3">__("Publier une information")</h1>
                </div>
                <div class="col-md-6 text-md-right">
                    <a href="{{ route('staff.create')}}" class="btn btn-circle btn-info">
                        <span>__("Voir toutes les pages")</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="">
            <form class="form form-horizontal mar-top" action="{{ route('news.config.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
                @csrf
                <div class="row gutters-5">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">__("Information sur la page")</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">__("Titre de la page") <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="title" placeholder="__('Titre de la page')" onchange="update_sku()" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">__("Categorie") <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="categorie" placeholder="__('Titre de la page')" onchange="update_sku()" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">__("Images")</h5>
                            </div>
                            <div class="card-body">
                                <label class="col-from-label">__("Images descriptives") <span class="text-danger">*</span></label>
                                <div class="">
                                    <input type="file" class="form-control" name="images[]" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">__("Description de la page")</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea class="aiz-text-editor" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="Third group">
                                <button type="submit" name="button" value="unpublish" class="btn btn-primary action-btn">__("Enregistrer")</button>
                            </div>
                            <div class="btn-group" role="group" aria-label="Second group">
                                <button type="submit" name="button" value="publish" class="btn btn-success action-btn">__("Enregistrer et publier")</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div><!-- .aiz-main-content -->
@endsection
