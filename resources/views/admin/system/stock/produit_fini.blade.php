@extends('layouts.stock')
@section('title1')
__("Produit fini")
@stop
@section('modal-1')
{{ route('admin.create.produit.fini')}}
@stop
@section('btn-a')
un Produit fini
@stop
