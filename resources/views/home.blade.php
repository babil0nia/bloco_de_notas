@extends('layouts.main_layout')
@section('content')

    @include('top_bar')

    <div class="container mt-5">
        <div class="text-center">
            <h1>Bem-vindo ao Bloco de Notas</h1>
            <p class="lead">Crie e organize suas anotações com facilidade.</p>
        </div>

        @php
            $notas = $notas ?? collect();
        @endphp

        @if (count($notes) == 0)
            <div class="alert alert-warning text-center" role="alert">
                <h4 class="alert-heading">Você não tem nenhuma nota criada!</h4>
                <p>Clique no botão abaixo para criar sua primeira nota.</p>
                <a href="{{ route('new') }}" class="btn btn-success">Criar Nota</a>
            </div>
        @else
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Suas Notas</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Título</th>
                                <th>Data de Criação</th>
                                <th>Texto</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notes as $note)
                                @include('note')
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        <a href="{{ route('new') }}" class="btn btn-primary">Criar Nova Nota</a>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
