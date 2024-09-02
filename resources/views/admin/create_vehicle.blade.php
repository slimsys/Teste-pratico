@extends('layouts.admin')

@section('pageTitle')
<h1>Adicionar Veículo</h1>
@endsection

@section('content')

<div class="container">
	<form action="{{ route('admin.vehicles.store') }}" method="POST">

		@csrf

		<div class="row">
			<div class="col-6"	>
				<label for="marca">Marca: </label>
				<input required type="text" id="marca" name="marca" class="form-control @if($errors->has('marca')) is-invalid @endif" placeholder="Digite a marca do veículo..." value="{{ old('marca') }}">

				<div class="invalid-feedback">
					{{ $errors->first('marca') }}
				</div>
			</div>

			<div class="col-6">
				<label for="modelo">Modelo: </label>
				<input required type="text" id="modelo" name="modelo" class="form-control @if($errors->has('modelo')) is-invalid @endif" placeholder="Digite o modelo do veículo..." value="{{ old('modelo') }}">

				<div class="invalid-feedback">
					{{ $errors->first('modelo') }}
				</div>
			</div>

			<div class="col-6 mt-3">
				<label for="placa">Placa: </label>
				<input required type="text" id="placa" name="placa" class="form-control @if($errors->has('placa')) is-invalid @endif" placeholder="Digite a placa do veículo..." value="{{ old('placa') }}">

				<div class="invalid-feedback">
					{{ $errors->first('placa') }}
				</div>
			</div>

			<div class="col-6 mt-3">
				<label for="renavam">Renavam: </label>
				<input required type="text" id="renavam" name="renavam" class="form-control @if($errors->has('renavam')) is-invalid @endif" placeholder="Digite o renavam do veículo..." value="{{ old('renavam') }}">
				
				<div class="invalid-feedback">
					{{ $errors->first('renavam') }}
				</div>
			</div>

			<div class="col-12 mt-3">
				<label for="ano">Ano: </label>
				<input required type="number" id="ano" name="ano" class="form-control @if($errors->has('ano')) is-invalid @endif" placeholder="2024" value={{ old('ano') }}>
				<div class="invalid-feedback">
					{{ $errors->first('ano') }}
				</div>
			</div>
		</div>

		
		<div class="row mt-4">
			<div class="col-12">
				<label for="proprietario">Usuário (Opcional):</label>
				<select class="form-select" id="proprietario" name="proprietario">
					<option disabled selected value>Selecione um nome</option>
					@foreach($users as $user)
					<option value="{{ $user->id }}">{{ $user->name }}</option>
					@endforeach
				</select>
			</div>

		</div>
		
		<div class="row">
			<div class="col-12 mt-5">
				<button type="submit" class="btn btn-primary w-100">Cadastrar</button>
			</div>
		</div>
		</div>

	</form>
</div>

@endsection