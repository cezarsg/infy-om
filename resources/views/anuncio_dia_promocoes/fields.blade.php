<!-- Idanuncio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idanuncio', 'Idanuncio:') !!}
    {!! Form::number('idanuncio', null, ['class' => 'form-control']) !!}
</div>

<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Descricao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descricao', 'Descricao:') !!}
    {!! Form::text('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Datainicial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dataInicial', 'Datainicial:') !!}
    {!! Form::date('dataInicial', null, ['class' => 'form-control']) !!}
</div>

<!-- Datafinal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dataFinal', 'Datafinal:') !!}
    {!! Form::date('dataFinal', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('anuncioDiaPromocoes.index') !!}" class="btn btn-default">Cancel</a>
</div>
