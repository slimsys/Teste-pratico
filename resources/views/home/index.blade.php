@extends('layouts.app')


@section('content')

<div class="container">
	<div class="row mt-5">
		<div class="col-12 text-center">
			<h1>Seja bem vindo, {{ $user->name }}!</h1>
			<h5>Essa é sua lista de carros:</h5>
		</div>

		<div class="col-12 mt-5 text-center">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Modelo</th>
						<th>Marca</th>
						<th>Placa</th>
						<th>Renavam</th>
						<th>Ano</th>
					</tr>
				</thead>

				<tbody>
					@foreach($user->vehicles as $vehicle)
					<tr>
						<td class="font-weight-bold">#{{ $vehicle->id }}</td>
						<td>{{ $vehicle->modelo }}</td>
						<td>{{ $vehicle->marca }}</td>
						<td>{{ $vehicle->placa }}</td>
						<td>{{ $vehicle->renavam }}</td>
						<td>{{ $vehicle->ano }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	</div>
</div>

@endsection