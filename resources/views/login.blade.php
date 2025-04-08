@extends('layouts.main_layout')
@section('content')
    <div class="formulario">
        <div class="">
            <form action="/loginCriado" method="post" novalidate>
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Endereço de email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Seu email" value="{{ old('email') }}" required>
                    <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com
                        ninguém.</small>
                    {{-- erro --}}
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <div class="input-group">
                    <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha"
                         value="{{ old('senha') }}" required>
                         <button type="button" class="btn btn-outline-secondary" id="toggleSenha">
                            👁️
                        </button>
                    </div>
                    {{-- erro --}}
                    @error('senha')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Concordo com os termos de uso.</label>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>

            {{-- login invalido --}}
            @if (session('loginError'))
                <div class="alert alert-danger text-center"></div>
                {{ session('loginError') }}
            @endif

        </div>
        <div class="">
            <img class="imagem" src="{{ asset('imagem_login.jpg') }}" alt="imagem">
        </div>
    </div>
@endsection
