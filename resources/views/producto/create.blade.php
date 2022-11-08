@extends('layouts.app')

@section('template_title')
    Crear Producto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row mx-lg-4 mx-1 my-lg-3">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Crear Producto</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('productos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('producto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
