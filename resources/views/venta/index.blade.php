@extends('layouts.app')

@section('template_title')
    Compras
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <h3 id="card_title">
                                {{ __('Compras') }}
                            </h3>

                             <div class="float-right">
                                <a href="{{ route('ventas.create') }}" class="btn btn-success float-right"  data-placement="left">
                                  {{ __('Crear compra') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <p>{{ $message }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($message = Session::get('warning'))
                    <div class="alert alert-warning alert-dismissible fade show">
                        <p>{{ $message }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Producto</th>
										<th>Cantidad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ventas as $venta)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $venta->producto->nombre }}</td>
											<td>{{ $venta->cantidad }}</td>

                                            <td>
                                                <form action="{{ route('ventas.destroy',$venta->id) }}" method="GET">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ventas.show',$venta->id) }}"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ventas.edit',$venta->id) }}">Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ventas->links() !!}
            </div>
        </div>
    </div>
@endsection
