<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device--width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<title>Form Input Resep</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>/froala_editor.css">
	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>/froala_style.css">

	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>/plugins/code_view.css">
	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>/plugins/draggable.css">
	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>//plugins/colors.css">
	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>/plugins/emoticons.css">
	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>/plugins/image_manager.css">
	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>/plugins/image.css">
	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>/plugins/line_breaker.css">
	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>/plugins/table.css">
	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>/plugins/char_counter.css">
	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>/plugins/video.css">
	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>/plugins/fullscreen.css">
	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>/plugins/file.css">
	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>/plugins/quick_insert.css">
	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>/plugins/help.css">
	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>/third_party/spell_checker.css">
	<link rel="stylesheet" href="<?= URL::to('/css_froala'); ?>/plugins/special_characters.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
	<style>
		body {
		text-align: center;
		}

		div#editor {
		width: 100%;
		margin: auto;
		text-align: left;
		}

		.ss {
		background-color: red;
		}
	</style>
</head>
</head>
<body>
	<div class="container pt-4 bg-white">
		<div class="row">
			<div class="col-md-10">
				
				<h1>Perbarui Resep</h1>
				<hr>
				<form action="{{ route('resep.update',$resep->id) }}" method="POST">
				@csrf
				@method('PUT')
					<div class="form-group">
						<label for="judul">Judul Resep</label>
						<input type="text" class="form-control" id="judul" name="judul" value="{{$resep->judul}}">
						@error('judul')
							<div class="text-danger">{{$message}}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="gambar">Gambar Makanan</label>
						<input type="text" class="form-control" id="gambar" name="gambar" value="{{$resep->gambar}}">
						@error('gambar')
							<div class="text-danger">{{$message}}</div>
						@enderror
					</div>
                    <div class="form-group">
						<label for="bahan">Bahan - bahan</label>
						<textarea class="form-control" id="bahan" rows="15" name="bahan">{{$resep->bahan}}</textarea>
						@error('bahan')
							<div class="text-danger">{{$message}}</div>
						@enderror
					</div>
                    <div class="form-group">
						<label for="alat">Alat - alat</label>
						<textarea class="form-control" id="alat" rows="5" name="alat">{{$resep->alat}}</textarea>
						@error('alat')
							<div class="text-danger">{{$message}}</div>
						@enderror
					</div>
                    <div class="form-group">
						<label for="langkah">Langkah - langkah</label>
						<textarea class="form-control" id="langkah" rows="5" name="langkah">{{$resep->langkah}}</textarea>
						@error('langkah')
							<div class="text-danger">{{$message}}</div>
						@enderror
					</div>
					<a class="btn btn-success mb-2" href="{{ route('resep.index') }}">Kembali</a>
					<button type="submit" class="btn btn-primary mb-2">Daftarkan Resep</button>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.2.7/purify.min.js"></script>

	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/froala_editor.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/align.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/char_counter.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/code_beautifier.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/code_view.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/colors.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/draggable.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/emoticons.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/entities.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/file.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/font_size.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/font_family.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/fullscreen.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/image.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/image_manager.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/line_breaker.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/inline_style.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/link.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/lists.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/paragraph_format.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/paragraph_style.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/quick_insert.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/quote.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/table.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/save.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/url.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/video.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/help.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/print.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/third_party/spell_checker.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/special_characters.min.js"></script>
	<script type="text/javascript" src="<?= URL::to('/js_froala'); ?>/plugins/word_paste.min.js"></script>

	<script>
		(function () {
		new FroalaEditor("#bahan, #alat, #langkah")
		})()
	</script>
</body>
</html>