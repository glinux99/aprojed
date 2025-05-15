@extends('layouts.app')
@section('content')
<div class="aiz-main-content">
    <div class="px-15px px-lg-25px">

        <div class="aiz-titlebar text-left mt-2 mb-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h3">{{__("Staff Configuration")}}</h1>
                </div>
                <div class="col-md-6 text-md-right">
                    <a href="{{ route('staff.create')}}" class="btn btn-circle btn-info">
                        <span>{{__("Ajouter un Agent")}}</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">{{__("Agent actuel")}}</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row gutters-5">
                    @if (count($users))
                    @foreach ($users as $user)

                    <div class="col-auto w-140px w-lg-250px">
                        <div class="aiz-file-box">
                            <div class="dropdown-file">
                                <a class="dropdown-link" data-toggle="dropdown">
                                    <i class="la la-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item" onclick="detailsInfo(this)" data-id="1317">
                                        <i class="las la-info-circle mr-2"></i>
                                        <span>{{__("Details infos")}}</span>
                                    </a>
                                    <a href="javascript:void(0)" class="dropdown-item" onclick="copyUrl(this)" data-url="link">
                                        <i class="las la-clipboard mr-2"></i>
                                        <span>{{__('Copier le lien')}}</span>
                                    </a>
                                    <a href="javascript:void(0)" class="dropdown-item confirm-alert" data-href="{{ route('staff.delete', [$user->id])}}" data-target="#delete-modal">
                                        <i class="las la-trash mr-2"></i>
                                        <span>{{__('Supprimer ce membre')}}</span>
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
                                        <span class="text-truncate title">{{ $user->name}} - admin</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="card-body">
                        <p class="text-center">{{__("Aucune donnee")}}</p>
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
            AIZ.plugins.notify('success', "__('Lien a ete copie en cache')");
        } catch (err) {
            AIZ.plugins.notify('danger', "__('Oooh!, desole, le lien ne peut etre copie')");
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
