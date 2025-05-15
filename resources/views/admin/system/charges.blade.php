@extends('layouts.system')
@section('content')
<div class="aiz-main-content">
    <div class="px-15px px-lg-25px">

        <div class="aiz-titlebar text-left mt-2 mb-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h3">{{__("Charges Configuration")}}</h1>
                </div>
                <div class="col-md-6 text-md-right">
                    <a href="#" class=" btn btn-circle btn-info" data-target="#new-charges-modal" data-toggle="modal">
                        <span>{{__(" Ajouter une charge")}}</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">{{__("Charges actuel")}}</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row gutters-5">
                    @if (count($charges))
                    @foreach ($charges as $charge)
                    <!-- ici -->
                    @endforeach
                    @else
                    <div class="card-body">
                        <p class="text-center">{{__("Aucune donnee")}}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div><!-- .aiz-main-content -->
<div id="delete-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">{{__("Confirmation de suppression")}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1">{{__("Voulez-vous vraiment supprimer ce membre?")}}</p>
                <button type="button" class="btn btn-link mt-2" data-dismiss="modal">{{__("Annuler")}}</button>
                <a href="" class="btn btn-primary mt-2 comfirm-link" id="supp" data-id="">{{__("Supprimer")}}</a>
            </div>
        </div>
    </div>
</div>
<div id="info-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-right">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h6">File Info</h5>
                <button type="button" class="close" data-dismiss="modal">
                </button>
            </div>
            <div class="modal-body c-scrollbar-light position-relative" id="info-modal-content">
                <div class="c-preloader text-center absolute-center">
                    <i class="las la-spinner la-spin la-3x opacity-70"></i>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
