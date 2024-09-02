@extends('layouts.admin')

@section('pageTitle')
<h1>Gerenciar Usuários</h1>
@endsection

@section('content')

<div class="container-fluid px-5 mt-5">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>E-Mail</th>
				<th>Telefone</th>
				<th>CPF</th>
				<th>N° Veículos</th>
			</tr>
		</thead>

		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->phone }}</td>
				<td>{{ $user->cpf }}</td>
				
				<td>
					@if(!count($user->vehicles()->get()))
					<button type="button" disabled class="btn btn-secondary">Visualizar (0)</button>
					@else

						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_cars_{{$user->id}}">
						  Visualizar ({{ count($user->vehicles()->get() )}})
						</button>

						<div class="modal fade" id="modal_cars_{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      
						      <div class="modal-header">
						        
						        <h1 class="modal-title fs-5" id="exampleModalLabel">Carros associados ao usuário #{{$user->id}}</h1>
						        
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      
						      </div>
						      
						      <div class="modal-body text-left">
						        <ol class="list-group list-group-numbered">
						        	@foreach($user->vehicles()->get() as $vehicle)
						        	<li class="list-group-item d-flex justify-items-between">
						        		{{$vehicle->modelo}}
						        		<span class="ms-auto">
						        			<a href="{{ route('admin.vehicles.edit', $vehicle->id) }}">
						        				Editar
						        			</a>
						        		</span>
						        	</li>
						        	@endforeach
						        </ol>
						      
						      </div>
						      
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
						        	Fechar
						        </button>
						      </div>
						    
						    </div>
						  </div>
						</div>


					@endif
				</td>
				
				<td>
					<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_{{$user->id}}">
					  Excluir
					</button>

					<div class="modal fade" id="modal_{{$user->id}}" tabindex="-1" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir usuário <span class="font-weight-bold">#{{ $user->id }}</span></h1>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>
					      <div class="modal-body">
					        Tem certaza que deseja excluir este usuário? Por segurança, ele continuará armazenado no banco de dados.
					      </div>
					      <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
					        	@method('DELETE')
					        	@csrf
					        	<div class="form-check my-4">
					        		<input id="delete_vehicles_{{$user->id}}" type="checkbox" name="delete_vehicles" class="form-check-input" checked>
					        		
					        		<label for="delete_vehicles_{{$user->id}}" class="form-check-label">Deletar veículos associados</label>
					        	</div>

						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

					        	<button type="submit" class="btn btn-danger">Excluir</button>
						      </div>
						  </form>
						</div>
					  </div>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection