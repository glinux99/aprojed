<!doctype html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="/">
    <meta name="file-base-url" content="/">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" href="{{asset('uploads/all/4xnLnzEeu3dFKDGSBMlvLXPLGXFdHEkvqBSZREmO.png')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/aiz-core.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css')}}">
    <style>
        body {
            font-size: 12px;
        }
    </style>
    <script>
        var AIZ = AIZ || {};
        AIZ.local = {
            nothing_selected: 'Nothing selected',
            nothing_found: 'Nothing found',
            choose_file: 'Choose file',
            file_selected: 'File selected',
            files_selected: 'Files selected',
            add_more_files: 'Add more files',
            adding_more_files: 'Adding more files',
            drop_files_here_paste_or: 'Drop files here, paste or',
            browse: 'Browse',
            upload_complete: 'Upload complete',
            upload_paused: 'Upload paused',
            resume_upload: 'Resume upload',
            pause_upload: 'Pause upload',
            retry_upload: 'Retry upload',
            cancel_upload: 'Cancel upload',
            uploading: 'Uploading',
            processing: 'Processing',
            complete: 'Complete',
            file: 'File',
            files: 'Files',
        }
    </script>

</head>

<body>
    <div class="aiz-main-wrapper d-flex">
        <div class="flex-grow-1">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script>
        $(".toggle-password").on('click', function() {
            $(this).toggleClass("la-eye la-eye-slash");
            var input = $($(this).attr("data-name"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
</body>

</html>
