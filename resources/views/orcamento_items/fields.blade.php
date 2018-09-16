<!-- Idorcamento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idorcamento', 'Idorcamento:') !!}
    {!! Form::number('idorcamento', null, ['class' => 'form-control']) !!}
</div>

<!-- Descricao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descricao', 'Descricao:') !!}
    {!! Form::text('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantidade', 'Quantidade:') !!}
    {!! Form::number('quantidade', null, ['class' => 'form-control']) !!}
</div>

<!-- Vlrunitario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vlrunitario', 'Vlrunitario:') !!}
    {!! Form::number('vlrunitario', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orcamentoItems.index') !!}" class="btn btn-default">Cancel</a>
</div>
