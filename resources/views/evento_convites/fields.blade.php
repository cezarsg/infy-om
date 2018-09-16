<!-- Quemconvida Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quemconvida', 'Quemconvida:') !!}
    {!! Form::text('quemconvida', null, ['class' => 'form-control']) !!}
</div>

<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Mensagem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mensagem', 'Mensagem:') !!}
    {!! Form::text('mensagem', null, ['class' => 'form-control']) !!}
</div>

<!-- Fotocaminho Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fotocaminho', 'Fotocaminho:') !!}
    {!! Form::text('fotocaminho', null, ['class' => 'form-control']) !!}
</div>

<!-- Idevento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idevento', 'Idevento:') !!}
    {!! Form::number('idevento', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('eventoConvites.index') !!}" class="btn btn-default">Cancel</a>
</div>
