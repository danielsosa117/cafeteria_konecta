@extends('layouts.app')

@section('template_title')
    Actualizar Compra
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row mx-lg-4 mx-1 my-lg-3">
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Actualizar Compra</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ventas.update', $venta->id) }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('venta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
