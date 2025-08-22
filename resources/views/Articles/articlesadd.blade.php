<!DOCTYPE html>
<!--
Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CKEditor Sample</title>
	<script src="{{ asset('assets/ckeditor/ckeditor.js')}}"></script>
	<script src="{{asset('assets/ckeditor/samples/js/sample.js')}}"></script>
	<link rel="stylesheet" href="{{asset('assets/ckeditor/samples/css/samples.css')}}">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Try the latest sample of CKEditor 4 and learn more about customizing your WYSIWYG editor with endless possibilities.">
</head>
<body id="main">



<main>
	<div class="adjoined-top">
		<div class="grid-container">
			<div class="content grid-width-100">
				<h1>Editeur de Texte Personnaliser!</h1>

			</div>
		</div>
	</div>
	<div class="adjoined-bottom m-2" style="margin: 20px">
		<form action="{{ route('articles.store') }}" method="POST" style="margin-top: 2em;">
			@csrf
            <input type="text" name="editor" hidden value="1">
            <input type="text" name="id" hidden value="{{$id}}">
			<textarea name="content" id="editor" value={{ $contents}}>
                {{$contents ?? '	<h1>Bonjour!</h1>
				<p>Pour l\'assistance <a href="tel:+243970912428">glinux99</a>.</p>'}}

			</textarea>

			<div style="display: flex; align-items: end; justify-content: end;">
                <button type="submit" class="button-a button-a-background" style="border: none; cursor: pointer; margin-top: 1.5em;">Sauvegarder le contenu</button>
            </div>
		</form>
	</div>
</main>

<footer class="footer-a grid-container">
	<div class="grid-container">

		<p class="grid-width-100" id="copy">
			Copyright &copy; 2003-2025, <a class="samples" href="#">DK</a> All rights reserved.
		</p>
	</div>
</footer>
<script>
	initSample();
</script>

</body>
</html>
