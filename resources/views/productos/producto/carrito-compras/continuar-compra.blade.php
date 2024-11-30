@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Progreso de pasos -->
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">Paso 1: Carro</div>
    </div>

    <!-- Paso 1: Carro -->
    <div class="mt-5">
        <h2>Carro de compras</h2>
        <form action="{{ route('continuar.entrega') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Continuar a Entrega</button>
        </form>
    </div>
</div>
@endsection
