@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Progreso de pasos -->
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Paso 3: Pago</div>
    </div>

    <!-- Paso 3: Pago -->
    <div class="mt-5">
        <h2>Confirma tu Pago</h2>
        <form action="{{ route('carrito.procesar') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Confirmar Compra</button>
        </form>
    </div>
</div>
@endsection
