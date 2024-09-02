@extends('layouts.admin')

@section('pageTitle')
<h1>Gerenciar Veículos</h1>
@endsection

@section('content')

<div class="container-fluid px-5">
	<div class="col-12 text-end">
		<a href="{{ route('admin.vehicles.create') }}" class="btn btn-primary btn-lg">Adicionar Veículo</a>
	</div>

	<div class="col-12 mt-4">
		<table class="table table-stripped table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Placa</th>
					<th>Renavam</th>
					<th>Ano</th>
					<th>Proprietário</th>
					<th>Modificar</th>
				</tr>
			</thead>

			<tbody>
				@foreach($vehicles as $vehicle)
				<tr>
					<td>{{ $vehicle->id }}</td>
					<td>{{ $vehicle->marca }}</td>
					<td>{{ $vehicle->modelo }}</td>
					<td>{{ $vehicle->placa }}</td>
					<td>{{ $vehicle->renavam }}</td>
					<td>{{ $vehicle->ano }}</td>
					<td>@if($vehicle->user) {{ $vehicle->user->name }} @endif</td>
					<td>
						@if($vehicle->deleted_at == NULL)
						<a href="{{ route('admin.vehicles.edit', $vehicle->id) }}" class="btn btn-warning">Editar</a>

						<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_{{$vehicle->id}}">
						  Excluir
						</button>

						<div class="modal fade" id="modal_{{$vehicle->id}}" tabindex="-1" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Veículo <span class="font-weight-bold">#{{ $vehicle->id }}</span></h1>
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      </div>
						      <div class="modal-body">
						        Tem certaza que deseja excluir este veículo?
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
						        <form action="{{ route('admin.vehicles.destroy', $vehicle->id) }}" method="POST">
						        	@method('DELETE')
						        	@csrf
						        	<button type="submit" class="btn btn-danger">Excluir</button>
						        </form>
						      </div>
						    </div>
						  </div>
						</div>
						@else

						<a href="#" class="btn btn-primary">Restaurar</a>

						@endif

					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection