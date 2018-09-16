<!-- Descricaoservico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descricaoservico', 'Descricaoservico:') !!}
    {!! Form::text('descricaoservico', null, ['class' => 'form-control']) !!}
</div>

<!-- Idservico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idservico', 'Idservico:') !!}
    {!! Form::number('idservico', null, ['class' => 'form-control']) !!}
</div>

<!-- Idstatus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idstatus', 'Idstatus:') !!}
    {!! Form::number('idstatus', null, ['class' => 'form-control']) !!}
</div>

<!-- Idevento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idevento', 'Idevento:') !!}
    {!! Form::number('idevento', null, ['class' => 'form-control']) !!}
</div>

<!-- Idanuncio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idanuncio', 'Idanuncio:') !!}
    {!! Form::number('idanuncio', null, ['class' => 'form-control']) !!}
</div>

<!-- Dtvalidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dtvalidade', 'Dtvalidade:') !!}
    {!! Form::date('dtvalidade', null, ['class' => 'form-control']) !!}
</div>

<!-- Dt. Inclusão Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Dt. Inclusão', 'Dt. Inclusão:') !!}
    {!! Form::date('Dt. Inclusão', null, ['class' => 'form-control']) !!}
</div>

<!-- Dtresposta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dtresposta', 'Dtresposta:') !!}
    {!! Form::date('dtresposta', null, ['class' => 'form-control']) !!}
</div>

<!-- Dt. Alteração Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Dt. Alteração', 'Dt. Alteração:') !!}
    {!! Form::date('Dt. Alteração', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orcamentos.index') !!}" class="btn btn-default">Cancel</a>
</div>
