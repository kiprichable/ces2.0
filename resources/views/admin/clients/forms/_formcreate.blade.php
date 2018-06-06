<div class="panel-body">
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('first_name', 'First name', ['class' => 'control-label']) !!}
            {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('first_name'))
                <p class="help-block">
                    {{ $errors->first('first_name') }}
                </p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('last_name', 'Last name', ['class' => 'control-label']) !!}
            {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('last_name'))
                <p class="help-block">
                    {{ $errors->first('last_name') }}
                </p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
            {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('phone'))
                <p class="help-block">
                    {{ $errors->first('phone') }}
                </p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
            {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('email'))
                <p class="help-block">
                    {{ $errors->first('email') }}
                </p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('city', 'City', ['class' => 'control-label']) !!}
            {!! Form::text('city', old('city'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('city'))
                <p class="help-block">
                    {{ $errors->first('city') }}
                </p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('state', 'state', ['class' => 'control-label']) !!}
            {!! Form::text('state', old('state'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('state'))
                <p class="help-block">
                    {{ $errors->first('state') }}
                </p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('other_family', 'other_family', ['class' => 'control-label']) !!}
            {!! Form::select('other_family', $options,old('other_family'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('other_family'))
                <p class="help-block">
                    {{ $errors->first('other_family') }}
                </p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('other_family_names', 'other_family_names', ['class' => 'control-label']) !!}
            {!! Form::text('other_family_names', old('other_family_names'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('other_family_names'))
                <p class="help-block">
                    {{ $errors->first('other_family_names') }}
                </p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('age', 'age', ['class' => 'control-label']) !!}
            {!! Form::number('age',old('age'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('age'))
                <p class="help-block">
                    {{ $errors->first('age') }}
                </p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('veteran', 'veteran', ['class' => 'control-label']) !!}
            {!! Form::select('veteran', $options,old('veteran'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('veteran'))
                <p class="help-block">
                    {{ $errors->first('veteran') }}
                </p>
            @endif
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('dd214', 'dd214', ['class' => 'control-label']) !!}
            {!! Form::text('dd214',old('dd214'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('dd214'))
                <p class="help-block">
                    {{ $errors->first('dd214') }}
                </p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('last_place_residence', 'last_place_residence', ['class' => 'control-label']) !!}
            {!! Form::select('last_place_residence',$residences,old('last_place_residence'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('last_place_residence'))
                <p class="help-block">
                    {{ $errors->first('last_place_residence') }}
                </p>
            @endif
        </div>
    </div>

</div>