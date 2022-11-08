<div class="box box-info p-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Producto') }}
            {!! Form::select('producto_id', $array, $selected, ['class' => 'form-control' . ($errors->has('producto_id') ? ' is-invalid' : '')]) !!}
            {!! $errors->first('producto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::number('cantidad', $venta->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="{{ route("ventas.index") }}" class="btn btn-danger">Volver</a>
    </div>
</div>
