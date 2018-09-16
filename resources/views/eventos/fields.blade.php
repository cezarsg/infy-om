<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Idtipoevento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idtipoevento', 'Idtipoevento:') !!}
    {!! Form::number('idtipoevento', null, ['class' => 'form-control']) !!}
</div>

<!-- Idtemaestabelecimento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idtemaestabelecimento', 'Idtemaestabelecimento:') !!}
    {!! Form::number('idtemaestabelecimento', null, ['class' => 'form-control']) !!}
</div>

<!-- Descricao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descricao', 'Descricao:') !!}
    {!! Form::text('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Eventofechado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eventofechado', 'Eventofechado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('eventofechado', false) !!}
        {!! Form::checkbox('eventofechado', '1', null) !!} 1
    </label>
</div>

<!-- Dtevento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dtevento', 'Dtevento:') !!}
    {!! Form::date('dtevento', null, ['class' => 'form-control']) !!}
</div>

<!-- Horaevento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('horaevento', 'Horaevento:') !!}
    {!! Form::text('horaevento', null, ['class' => 'form-control']) !!}
</div>

<!-- Unicodia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unicodia', 'Unicodia:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('unicodia', false) !!}
        {!! Form::checkbox('unicodia', '1', null) !!} 1
    </label>
</div>

<!-- Dteventotermino Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dteventotermino', 'Dteventotermino:') !!}
    {!! Form::date('dteventotermino', null, ['class' => 'form-control']) !!}
</div>

<!-- Nrconvidados Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nrconvidados', 'Nrconvidados:') !!}
    {!! Form::number('nrconvidados', null, ['class' => 'form-control']) !!}
</div>

<!-- Nrpessoasesperado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nrpessoasesperado', 'Nrpessoasesperado:') !!}
    {!! Form::number('nrpessoasesperado', null, ['class' => 'form-control']) !!}
</div>

<!-- Urllistapresentes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('urllistapresentes', 'Urllistapresentes:') !!}
    {!! Form::text('urllistapresentes', null, ['class' => 'form-control']) !!}
</div>

<!-- Vlrorcamento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vlrorcamento', 'Vlrorcamento:') !!}
    {!! Form::number('vlrorcamento', null, ['class' => 'form-control']) !!}
</div>

<!-- Urlcompraingressos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('urlcompraingressos', 'Urlcompraingressos:') !!}
    {!! Form::text('urlcompraingressos', null, ['class' => 'form-control']) !!}
</div>

<!-- Faixaetariainicial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('faixaetariainicial', 'Faixaetariainicial:') !!}
    {!! Form::number('faixaetariainicial', null, ['class' => 'form-control']) !!}
</div>

<!-- Faixaetariafinal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('faixaetariafinal', 'Faixaetariafinal:') !!}
    {!! Form::number('faixaetariafinal', null, ['class' => 'form-control']) !!}
</div>

<!-- Genero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('genero', 'Genero:') !!}
    {!! Form::text('genero', null, ['class' => 'form-control']) !!}
</div>

<!-- Idgrau Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idgrau', 'Idgrau:') !!}
    {!! Form::number('idgrau', null, ['class' => 'form-control']) !!}
</div>

<!-- Guiadeeventos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('guiadeeventos', 'Guiadeeventos:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('guiadeeventos', false) !!}
        {!! Form::checkbox('guiadeeventos', '1', null) !!} 1
    </label>
</div>

<!-- Dtprazomaxconfconvite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dtprazomaxconfconvite', 'Dtprazomaxconfconvite:') !!}
    {!! Form::date('dtprazomaxconfconvite', null, ['class' => 'form-control']) !!}
</div>

<!-- Idconsumidor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idconsumidor', 'Idconsumidor:') !!}
    {!! Form::number('idconsumidor', null, ['class' => 'form-control']) !!}
</div>

<!-- Idstatus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idstatus', 'Idstatus:') !!}
    {!! Form::number('idstatus', null, ['class' => 'form-control']) !!}
</div>

<!-- Endereco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('endereco', 'Endereco:') !!}
    {!! Form::text('endereco', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>

<!-- Cep Field -->
<div class="form-group col-sm-6">
    {!! Form::label('CEP', 'Cep:') !!}
    {!! Form::text('CEP', null, ['class' => 'form-control']) !!}
</div>

<!-- Complemento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('complemento', 'Complemento:') !!}
    {!! Form::text('complemento', null, ['class' => 'form-control']) !!}
</div>

<!-- Bairro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bairro', 'Bairro:') !!}
    {!! Form::text('bairro', null, ['class' => 'form-control']) !!}
</div>

<!-- Cidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cidade', 'Cidade:') !!}
    {!! Form::text('cidade', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Dt. Inclusão Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Dt. Inclusão', 'Dt. Inclusão:') !!}
    {!! Form::date('Dt. Inclusão', null, ['class' => 'form-control']) !!}
</div>

<!-- Dt. Alteração Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Dt. Alteração', 'Dt. Alteração:') !!}
    {!! Form::date('Dt. Alteração', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('eventos.index') !!}" class="btn btn-default">Cancel</a>
</div>
