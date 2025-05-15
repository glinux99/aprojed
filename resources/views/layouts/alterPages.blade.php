@extends('layouts.app')
@section('content')
<div class="aiz-main-content">
    <div class="px-15px px-lg-25px">

        <div class="aiz-titlebar text-left mt-2 mb-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h3">@yield('add-title')</h1>
                </div>
                <div class="col-md-6 text-md-right">
                    @yield('button-add')
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">@yield('tout')</h5>
                </div>
            </div>
            <div class="card-body">
                <table class="table  mb-0">
                    <thead>
                        @yield('table-header')
                    </thead>
                    <tbody>
                        @yield('table-body')
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div><!-- .aiz-main-content -->

<!-- Tax Add Modal -->
<div id="add-tax" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header bord-btm">
                <h4 class="modal-title h6">__("Ajouter une nouvelle taxe")</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <form class="form-horizontal" action="{{route('add.impot')}}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <div class=" row">
                            <label class="col-sm-3 control-label" for="name">
                                __("Nom de la taxe")
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="__('Nom de la taxe')" id="name" name="name" class="form-control" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-styled btn-base-3" data-dismiss="modal">
                        __("Fermer")
                    </button>
                    <button type="submit" class="btn btn-primary btn-styled btn-base-1">
                        __("Enregistrer")
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- delete Modal -->
<div id="delete-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">__("Confirmation de suppression")</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1">__("Etes-vous sur de supprimer ceci?")</p>
                <button type="button" class="btn btn-link mt-2" data-dismiss="modal">__("Annuler")</button>
                <a href="" id="delete-link" class="btn btn-primary mt-2">__("Supprimer")</a>
            </div>
        </div>
    </div>
</div><!-- /.modal -->

<!-- Tax update Modal -->
<div id="update-tax" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header bord-btm">
                <h4 class="modal-title h6">__("Editer une taxe")</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <form class="form-horizontal" action="https://demo.activeitzone.com/ecommerce/admin/tax" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <div class=" row">
                            <label class="col-sm-3 control-label" for="name">
                                __("Nom de la taxe")
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="__('Nom de la taxe')" id="name" name="name" class="form-control" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-styled btn-base-3" data-dismiss="modal">
                        __("Fermer")
                    </button>
                    <button type="submit" class="btn btn-primary btn-styled btn-base-1">
                        __("Enregistrer")
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
