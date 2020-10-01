<div class="col-md-6">
    <div class="form-group row {{ ( $errors->has($id) ? 'has-error' : '' ) }}">
        <label class="col-md-4 control-label" for="label{{$id}}">{{$label}}:</label>
        <div class="col-md-8">
            {!! Form::text($id, null, ( isset($attributes) ? array_merge(['class' => 'form-control', 'id' => $id, 'name' => $id], $attributes) :
                                                                         ['class' => 'form-control', 'id' => $id, 'name' => $id, 'size' => 40, 'maxlength' => 40]))
            !!}
        </div>
        @if( $errors->has($id) )
            <span class="help-block">{{$errors->first($id)}}</span>
        @endif
    </div>
</div>
