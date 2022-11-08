@extends('layouts.app')

@section('template_title')
    {{ $producto->nombre ?? 'Ver Producto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <h3 id="card_title">
                                {{ __('Producto'). ": " . $producto->nombre }}
                            </h3>

                             <div class="float-right">
                                <a href="{{ route('productos.index') }}" class="btn btn-primary float-right"  data-placement="left">
                                  {{ __('Volver') }}
                                </a>
                              </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $producto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Referencia:</strong>
                            {{ $producto->referencia }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $producto->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Peso:</strong>
                            {{ $producto->peso }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $producto->categoria }}
                        </div>
                        <div class="form-group">
                            <strong>Stock:</strong>
                            {{ $producto->stock }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
