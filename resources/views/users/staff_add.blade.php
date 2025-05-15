@extends('layouts.app')
@section('content')
<div class="aiz-main-content">
    <form action="{{ route('staff.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="px-15px px-lg-25px">

            <div class="aiz-titlebar text-left mt-2 mb-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="h3">{{__("Configuration d'un nouvel agent")}}</h1>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <a href="{{ route('staff')}}" class="btn btn-circle btn-info">
                            <span>{{__("Tous les agents")}}</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header row gutters-5">
                            <div class="col text-center text-md-left">
                                <h5 class="mb-md-0 h6">{{__("Information sur l'agent")}}</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">{{__('Nom')}}</label>
                                        <input type="text" class="form-control" name="name" id=""
                                            aria-describedby="helpId" placeholder="{{__('Nom de l\'agent')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">{{__('Adresse E-mail')}}</label>
                                        <input type="text" class="form-control" name="email" id=""
                                            autocomplete="new-password" aria-describedby="helpId"
                                            placeholder="{{__('adresse email de l\'agent')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">{{__('Mot de passe')}}</label>
                                        <input type="text" class="form-control" name="password" id=""
                                            aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">{{__('Numero Tel')}}</label>
                                        <input type="numero" class="form-control" name="numero" id=""
                                            aria-describedby="helpId">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">{{__('Image')}}</label>
                                        <input type="file" class="form-control" name="images" id=""
                                            aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">{{__('Dossiers')}}</label>
                                        <input type="file" class="form-control" name="docs" id=""
                                            aria-describedby="helpId" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__("A propos de l'agent")}}</label>
                                        <div class="col-md-12">
                                            <textarea class="aiz-text-editor" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header row gutters-5">
                            <div class="col text-center text-md-left">
                                <h5 class="mb-md-0 h6">{{__("Information supplementaire")}}</h5>
                            </div>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-12 col-lg-12 col-6">
                                <div class="form-group">
                                    <label class="form-check-label" for="admin">
                                       {{ __("Descritpion du poste dans l'entreprise")}}
                                    </label>
                                    <input type="text" name="poste" id="" class="form-control"
                                        placeholder="{{__('Description du poste')}}">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" id="admin" value="admin"
                                        onclick="checked('admin');">
                                    <label class="form-check-label" for="admin">
                                       {{ __("Admin")}}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" id="agent" value="caissier"
                                        checked>
                                    <label class="form-check-label" for="agent">
                                   {{     __("Agent")}}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-6">
                                <div class="form-group" id="permissions">
                                    <label for="inputrole" class="control-label">{{__("Permissions de l'agent")}}</label>
                                    <div class="">
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
                <div class="btn-group" role="group" aria-label="Second group">
                    <button type="submit" name="button" value="Enregistrer"
                        class="btn btn-success action-btn">{{__("Enregistrer")}}</button>
                </div>
            </div>
        </div>
    </form>
</div>
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

<!-- Mes scripts -->
<!-- <script>
    function imageDelete(el) {
        $('#supp').attr('href', `xxxx`);
    }
</script> -->
<script type="text/javascript">
    function detailsInfo(e) {
        $('#info-modal-content').html('<div class="c-preloader text-center absolute-center"><i class="las la-spinner la-spin la-3x opacity-70"></i></div>');
        var id = $(e).data('id')
        $('#info-modal').modal('show');
        $.post('https://demo.activeitzone.com/ecommerce/admin/uploaded-files/file-info', {
            _token: AIZ.data.csrf,
            id: id
        }, function(data) {
            $('#info-modal-content').html(data);
            // console.log(data);
        });
    }

    function copyUrl(e) {
        var url = $(e).data('url');
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(url).select();
        try {
            document.execCommand("copy");
            AIZ.plugins.notify('success', "__('Lien a été copié en cache')");
        } catch (err) {
            AIZ.plugins.notify('danger', "__('Oooh!, desolé, le lien ne peut être copié')");
        }
        $temp.remove();
    }

    function sort_uploads(el) {
        $('#sort_uploads').submit();
    }
</script>

<script type="text/javascript">
    if ($('#lang-change').length > 0) {
        $('#lang-change .dropdown-menu a').each(function() {
            $(this).on('click', function(e) {
                e.preventDefault();
                var $this = $(this);
                var locale = $this.data('flag');
                $.post('https://demo.activeitzone.com/ecommerce/language', {
                    _token: 'VcC75XFcLdImwXoDnbMCfttESQJI5hJX7gAFOYGF',
                    locale: locale
                }, function(data) {
                    location.reload();
                });

            });
        });
    }

    function menuSearch() {
        var filter, item;
        filter = $("#menu-search").val().toUpperCase();
        items = $("#main-menu").find("a");
        items = items.filter(function(i, item) {
            if ($(item).find(".aiz-side-nav-text")[0].innerText.toUpperCase().indexOf(filter) > -1 && $(item).attr('href') !== '#') {
                return item;
            }
        });

        if (filter !== '') {
            $("#main-menu").addClass('d-none');
            $("#search-menu").html('')
            if (items.length > 0) {
                for (i = 0; i < items.length; i++) {
                    const text = $(items[i]).find(".aiz-side-nav-text")[0].innerText;
                    const link = $(items[i]).attr('href');
                    $("#search-menu").append(`<li class="aiz-side-nav-item"><a href="${link}" class="aiz-side-nav-link"><i class="las la-ellipsis-h aiz-side-nav-icon"></i><span>${text}</span></a></li`);
                }
            } else {
                $("#search-menu").html(`<li class="aiz-side-nav-item"><span	class="text-center text-muted d-block">Nothing found</span></li>`);
            }
        } else {
            $("#main-menu").removeClass('d-none');
            $("#search-menu").html('')
        }
    }
</script>
@endsection
