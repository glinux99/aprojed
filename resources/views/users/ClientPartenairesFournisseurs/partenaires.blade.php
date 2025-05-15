@extends('layouts.autres')
@section('titre')
__("Configuration")
@endsection
@section('button-add')
<a href="" class="btn btn-circle btn-info" data-target="#fournisseurs-modal" data-toggle="modal">
    <span>__("Ajouter un partenaire")</span>
</a>
@endsection
@section('titre-actuel')
__("Fournisseur")
@endsection
@section('url')
{{ route('partenaires.store')}}
@endsection
@section('url-update')
{{ route('partenaires.update')}}
@endsection
@section('delete-link')
delete-paternaire/
@endsection
@section('ajax-modif')
{{ route('partenaires.edit')}}
@endsection
@section('titre-modal')
__("Ajouter un Partenaire")
@endsection
