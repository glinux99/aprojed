@section('titre-modal')
{{__("Ajouter un Client")}}
@endsection



@extends('layouts.autres')
@section('titre')
{{__("Configuration")}}
@endsection
@section('button-add')
<a href="" class="btn btn-circle btn-info" data-target="#fournisseurs-modal" data-toggle="modal">
    <span>{{__("Ajouter un client")}}</span>
</a>
@endsection
@section('titre-actuel')
{{__("Client")}}
@endsection
@section('url')
{{ route('clients.store')}}
@endsection
@section('url-update')
{{ route('clients.update')}}
@endsection
@section('delete-link')
delete-client/
@endsection
@section('ajax-modif')
{{ route('clients.edit')}}
@endsection
@section('titre-modal')
{{__("Ajouter un Client")
}}@endsection
