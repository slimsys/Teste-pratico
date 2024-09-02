@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique seu e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Um novo e-mail foi enviado para você!') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor, verifique seu e-mail.') }}
                    <br>
                    {{ __('Caso não tenha recebido um') }}, <a href="{{ route('verification.resend') }}">{{ __('Clique aqui') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
