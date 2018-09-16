<!-- Idorcamento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idorcamento', 'Idorcamento:') !!}
    {!! Form::number('idorcamento', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipomensagem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipomensagem', 'Tipomensagem:') !!}
    {!! Form::text('tipomensagem', null, ['class' => 'form-control']) !!}
</div>

<!-- Idpergunta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idPergunta', 'Idpergunta:') !!}
    {!! Form::number('idPergunta', null, ['class' => 'form-control']) !!}
</div>

<!-- Dt. Inclusão Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Dt. Inclusão', 'Dt. Inclusão:') !!}
    {!! Form::date('Dt. Inclusão', null, ['class' => 'form-control']) !!}
</div>

<!-- Mensagem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mensagem', 'Mensagem:') !!}
    {!! Form::text('mensagem', null, ['class' => 'form-control']) !!}
</div>

<!-- Incluidapor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('incluidapor', 'Incluidapor:') !!}
    {!! Form::text('incluidapor', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orcamentoMensagens.index') !!}" class="btn btn-default">Cancel</a>
</div>
