<div class="col-md-6">
    <div class="form-group row {{ ( $errors->has($id) ? 'has-error' : '' ) }}">
        <label class="col-md-4 control-label" for="label{{$id}}">{{$label}}:</label>
        <div class="col-md-8">
            {!! Form::checkbox($id, 'true', null, ( isset($attributes) ? array_merge(['id' => $id, 'name' => $id], $attributes) :
                                                                                     ['id' => $id, 'name' => $id]))
            !!}
        </div>
        @if( $errors->has($id) )
            <span class="help-block">{{$errors->first($id)}}</span>
        @endif
    </div>
</div>
