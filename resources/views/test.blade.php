<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/aiz-core.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css')}}">
    <title>Document</title>
</head>

<body>
    <div id="list-example" class="list-group">
        <a class="list-group-item list-group-item-action" href="#list-item-1">Item 1</a>
        <a class="list-group-item list-group-item-action" href="#list-item-2">Item 2</a>
        <a class="list-group-item list-group-item-action" href="#list-item-3">Item 3</a>
        <a class="list-group-item list-group-item-action" href="#list-item-4">Item 4</a>
    </div>
    <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
        <h4 id="list-item-1">Item 1</h4>
        <p>...</p>
        <h4 id="list-item-2">Item 2</h4>
        <p>...</p>
        <h4 id="list-item-3">Item 3</h4>
        <p>...</p>
        <h4 id="list-item-4">Item 4</h4>
        <p>...</p>
    </div>


</body>
<script src="{{ asset('js/jquery.min.js')}}"></script>
<script src="{{asset('public/assets/js/vendors.js')}}"></script>
<script src="{{asset('assets/js/aiz-core.js')}}"></script>
<script>
    $('#spy').scrollspy({
        target: '#navbar-example2'
    })
</script>

</html>
