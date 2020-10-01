<div class="col-md-12">
    <div class="form-group row {{ ( $errors->has($id) ? 'has-error' : '' ) }}">
        <label class="col-md-2 control-label" for="label{{$id}}">{{$label}}:</label>
        <div class="col-md-10">
            {!! Form::text($id, null, ( isset($attributes) ? array_merge(['class' => 'form-control', 'id' => $id, 'name' => $id], $attributes)
                                                                       : ['class' => 'form-control', 'id' => $id, 'name' => $id])) !!}
        </div>
        @if( $errors->has($id) )
            <span class="help-block">{{$errors->first($id)}}</span>
        @endif
    </div>
</div>