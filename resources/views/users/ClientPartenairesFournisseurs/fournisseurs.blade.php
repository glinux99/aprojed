@extends('layouts.autres')
@section('titre')
__("Configuration")
@endsection
@section('button-add')
<a href="" class="btn btn-circle btn-info" data-target="#fournisseurs-modal" data-toggle="modal">
    <span>__("Ajouter un fournisseur")</span>
</a>
@endsection
@section('titre-actuel')
__("Fournisseur")
@endsection
@section('url')
{{ route('fournisseurs.store')}}
@endsection
@section('url-update')
{{ route('fournisseurs.update')}}
@endsection
@section('delete-link')
delete-fournisseur/
@endsection
@section('ajax-modif')
{{ route('fournisseurs.edit')}}
@endsection
@section('titre-modal')
__("Ajouter un Fournisseur")
@endsection
