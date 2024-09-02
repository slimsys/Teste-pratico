@extends('layouts.admin')

@section('pageTitle')
<h1><i class="fa-solid fa-gauge-high me-3"></i>Dashboard</h1>
@endsection

@section('content')

<div class="container mt-5" id="dashboard_div">
	<div class="row gx-1 text-center">
		<div class="col-6">
			<h3>Número de Usuários</h3>
			<h6>{{ $users }}</h6>
		</div>

		<div class="col-6">
			<h3>Número de Veículos</h3>
			<h6>{{ $vehicles }}</h6>
		</div>

		<div class="col-6 mt-5">
			<h3>Usuários Deletados</h3>
			<h6>{{ $deleted_users }}</h6>
		</div>

		<div class="col-6 mt-5">
			<h3>Veículos Deletados</h3>
			<h6>{{ $deleted_vehicles }}</h6>
		</div>
</div>

@endsection