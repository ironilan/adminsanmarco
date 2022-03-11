@extends('layouts.dashboard')

@section('contenido')

<section class="container p-4">
	<div class="row card mb-4 p-4">
		<h2>Cargar categorias excel</h2>
		<form action="{{ route('admin.import.categorias') }}" method="post" enctype="multipart/form-data">
			@csrf
			@if (Session::has('message'))
			<div class="alert alert-success">
				<p class="m-0 p-0">{{Session::get('message')}}</p>
			</div>
			@endif
			<div class="form-group mb-4">
				
				<input type="file" name="file" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Cargar</button>
		</form>
	</div>

	<div class="row card mb-4 p-4">
		<h2>Cargar subcategorias excel</h2>
		<form action="{{ route('admin.import.subcategorias') }}" method="post" enctype="multipart/form-data">
			@csrf
			@if (Session::has('message'))
			<div class="alert alert-success">
				<p class="m-0 p-0">{{Session::get('message')}}</p>
			</div>
			@endif
			<div class="form-group mb-4">
				
				<input type="file" name="file" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Cargar</button>
		</form>
	</div>

	<div class="row card mb-4 p-4">
		<h2>Cargar productos excel</h2>
		<form action="{{ route('admin.import.productos') }}" method="post" enctype="multipart/form-data">
			@csrf
			@if (Session::has('message'))
			<div class="alert alert-success">
				<p class="m-0 p-0">{{Session::get('message')}}</p>
			</div>
			@endif
			<div class="form-group mb-4">
				
				<input type="file" name="file" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Cargar</button>
		</form>
	</div>
</section>
@endsection