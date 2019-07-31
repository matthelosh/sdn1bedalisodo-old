<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Siswa</title>
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
	<link rel="stylesheet" href="{{ url('css/tes.css') }}">
	<style>
		body, html{
			font-family: 'Nunito', sans-serif;
			padding: 0;
			margin: 0;
		}
		.wrapper{
			position: relative;
		}
		nav {
			width: 100%;
			height: 50px;
			background: #789756;
			color: #efefef;
		}
		ul{
			margin: 0;
		}
		.ul-nav li{
			display: inline-block;
			line-height: 50px;
			margin: auto 10px;
			/*padding: auto 10px;*/
		}
		.ul-nav li a {
			display: block;
			color: #eeeeee;
			padding: 0 10px;
			box-sizing: border-box;
		}
		.ul-nav li a:hover {
			background: orangered;
			color: #efefef;
		}
		#add-siswa{
			display:none;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<nav>
			<ul class="ul-nav">
				<li class="nav-item">
					<a href="#add-siswa">Tambah Siswa</a>
				</li>
				<li class="nav-item">
					<a href="#data-siswa">Data Siswa</a>
				</li>
			</ul>
		</nav>
		<aside></aside>
		<div id="main-content">
			<div id="data-siswa">
				<h3>Data Siswa</h3>
			</div>
			<div id="add-siswa">
				<h3>Tambah Siswa</h3>
			</div>
		</div>
	</div>
	
	<script src="{{ url('js/app.js') }}" type="text/javascript">
		
	</script>
	<script>
		$(document).ready(function(){
			$('a').on('click', function(e){
				e.preventDefault();
				var href = $(this).prop("href");
				alert(href)
			})
		});
	</script>
</body>
</html>