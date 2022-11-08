@extends('layouts.app')

@section('template_title')
    Productos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mx-lg-4 mx-1 my-lg-3">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <h3 id="card_title">
                                {{ __('Producto') }}
                            </h3>

                             <div class="float-right">
                                <a href="{{ route('productos.create') }}" class="btn btn-success float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre</th>
										<th>Referencia</th>
										<th>Precio</th>
										<th>Peso</th>
										<th>Categoria</th>
										<th>Stock</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $producto->nombre }}</td>
											<td>{{ $producto->referencia }}</td>
											<td>{{ $producto->precio }}</td>
											<td>{{ $producto->peso }}</td>
											<td>{{ $producto->categoria }}</td>
											<td>{{ $producto->stock }}</td>

                                            <td>
                                                <form action="{{ route('productos.destroy',$producto->id) }}" method="GET">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('productos.show',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $productos->links() !!}
            </div>
        </div>
    </div>
@endsection
