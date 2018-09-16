<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Sobrenome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sobrenome', 'Sobrenome:') !!}
    {!! Form::text('sobrenome', null, ['class' => 'form-control']) !!}
</div>

<!-- Sexo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sexo', 'Sexo:') !!}
    {!! Form::text('sexo', null, ['class' => 'form-control']) !!}
</div>

<!-- Dtnascimento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dtnascimento', 'Dtnascimento:') !!}
    {!! Form::date('dtnascimento', null, ['class' => 'form-control']) !!}
</div>

<!-- Idcidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idcidade', 'Idcidade:') !!}
    {!! Form::number('idcidade', null, ['class' => 'form-control']) !!}
</div>

<!-- Fotodestaquecaminho Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fotodestaquecaminho', 'Fotodestaquecaminho:') !!}
    {!! Form::text('fotodestaquecaminho', null, ['class' => 'form-control']) !!}
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

<!-- Idusuario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idusuario', 'Idusuario:') !!}
    {!! Form::number('idusuario', null, ['class' => 'form-control']) !!}
</div>

<!-- Ativo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ativo', 'Ativo:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('ativo', false) !!}
        {!! Form::checkbox('ativo', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('consumidors.index') !!}" class="btn btn-default">Cancel</a>
</div>
