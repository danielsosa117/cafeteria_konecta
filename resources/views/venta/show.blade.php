@extends('layouts.app')

@section('template_title')
    {{ $venta->id ?? 'Show Venta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <h3 id="card_title">
                                {{ __('Compras'). ": ". $venta->id }}
                            </h3>

                             <div class="float-right">
                                <a href="{{ route('ventas.create') }}" class="btn btn-success float-right"  data-placement="left">
                                  {{ __('Crear compra') }}
                                </a>
                              </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Producto Id:</strong>
                            {{ $venta->producto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $venta->cantidad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
