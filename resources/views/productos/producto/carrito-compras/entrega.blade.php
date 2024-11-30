@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Progreso de pasos -->
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100">Paso 2: Entrega</div>
    </div>

    <!-- Paso 2: Entrega -->
    <div class="mt-5">
        <h2>Elige un tipo de entrega</h2>
        <div class="list-group">
            <a href="#" class="list-group-item" data-toggle="modal" data-target="#modalDomicilio">Envío a domicilio</a>
            <a href="#" class="list-group-item">Envío en fecha programada</a>
            <a href="#" class="list-group-item">Retira tu pedido</a>
        </div>
    </div>

    <!-- Modal Envío a Domicilio -->
    <div class="modal fade" id="modalDomicilio" tabindex="-1" role="dialog" aria-labelledby="modalDomicilioLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDomicilioLabel">Datos de Envío a Domicilio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('continuar.pago') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>
                        <div class="form-group">
                            <label for="instrucciones">Instrucciones adicionales</label>
                            <textarea class="form-control" id="instrucciones" name="instrucciones"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Continuar a Pago</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
