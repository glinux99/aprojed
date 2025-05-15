@extends('layouts.app')
@section('content')
<div class="aiz-main-content">
    <div class="px-15px px-lg-25px">
        <div class="aiz-titlebar text-left mt-2 mb-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h3">__("Configuration de la page d'avant propos")</h1>
                </div>
                <div class="col-md-6 text-md-right">
                    <a href="{{ route('staff.create')}}" class="btn btn-circle btn-info">
                        <span>__("Voir toutes les pages")</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="">
            <form class="form form-horizontal mar-top" action="{{ route('autres.config.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="nav">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">__("Presentation de l'Entreprise")</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">__("Equipe de direction")</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">__("Culture et valeurs")</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">__("Autres affaires")</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row gutters-5">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0 h6">__("Presentation "){{ Config('app.name')}}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <textarea class="aiz-text-editor" name="presentation"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row gutters-5">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0 h6">__("Information sur l'equipe de direction")</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="row gutters-5">
                                                @if (count($users))
                                                @foreach ($users as $user)

                                                <div class="col-auto w-140px w-lg-200px">
                                                    <div class="aiz-file-box">
                                                        <div class="dropdown-file">
                                                            <a class="dropdown-link" data-toggle="dropdown">
                                                                <i class="la la-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="javascript:void(0)" class="dropdown-item" onclick="detailsInfo(this)" data-id="1317">
                                                                    <i class="las la-eye mr-2"></i>
                                                                    <span>__("Desactiver vue")</span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item confirm-alert" data-href="{{ route('staff.delete', [$user->id])}}" data-target="#delete-modal">
                                                                    <i class="las la-trash mr-2"></i>
                                                                    <span>__('Supprimer')</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="card card-file aiz-uploader-select c-default" title="">
                                                            <div class="card-file-thumb">
                                                                @if($user->images)
                                                                <img src="{{ asset('storage/'.$user->images)}}" class="w-100">
                                                                @else
                                                                <img src="{{ asset('assets/img/default.png')}}" class="w-100">
                                                                @endif
                                                            </div>
                                                            <div class="card-body ">
                                                                <h6 class="d-flex">
                                                                    <span class="text-truncate title">{{ $user->name}} - {{ $user->poste}}</span>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @else
                                                <div class="card-body">
                                                    <p class="text-center">__("Aucune donnee")</p>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="aiz-pagination mt-3">
                                                <nav>
                                                    {{ $users->links()}}
                                                </nav>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="row gutters-5">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0 h6">__("Culture et Valeurs de "){{ Config('app.name')}}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <textarea class="aiz-text-editor" name="culture"></textarea>
                                            </div>
                                        </div>
                                    </div>
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
            </form>
        </div>

    </div>

</div><!-- .aiz-main-content -->

<!-- Modal -->
<div id="delete-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">__("Confirmation de suppression")</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1">__("Voulez-vous vraiment supprimer ce membre?")</p>
                <button type="button" class="btn btn-link mt-2" data-dismiss="modal">__("Annuler")</button>
                <a href="" class="btn btn-primary mt-2 comfirm-link" id="supp" data-id="">__("Supprimer")</a>
            </div>
        </div>
    </div>
</div>
@endsection
