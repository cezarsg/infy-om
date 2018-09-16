<!-- Razaosocial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('razaosocial', 'Razaosocial:') !!}
    {!! Form::text('razaosocial', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomefantasia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomefantasia', 'Nomefantasia:') !!}
    {!! Form::text('nomefantasia', null, ['class' => 'form-control']) !!}
</div>

<!-- Cnpj Field -->
<div class="form-group col-sm-6">
    {!! Form::label('CNPJ', 'Cnpj:') !!}
    {!! Form::text('CNPJ', null, ['class' => 'form-control']) !!}
</div>

<!-- Cpf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('CPF', 'Cpf:') !!}
    {!! Form::text('CPF', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefone', 'Telefone:') !!}
    {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
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

<!-- Facebook Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facebook', 'Facebook:') !!}
    {!! Form::text('facebook', null, ['class' => 'form-control']) !!}
</div>

<!-- Linkedin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('linkedin', 'Linkedin:') !!}
    {!! Form::text('linkedin', null, ['class' => 'form-control']) !!}
</div>

<!-- Instagram Field -->
<div class="form-group col-sm-6">
    {!! Form::label('instagram', 'Instagram:') !!}
    {!! Form::text('instagram', null, ['class' => 'form-control']) !!}
</div>

<!-- Twitter Field -->
<div class="form-group col-sm-6">
    {!! Form::label('twitter', 'Twitter:') !!}
    {!! Form::text('twitter', null, ['class' => 'form-control']) !!}
</div>

<!-- Pinterest Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pinterest', 'Pinterest:') !!}
    {!! Form::text('pinterest', null, ['class' => 'form-control']) !!}
</div>

<!-- Idusuarioanunciante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idusuarioanunciante', 'Idusuarioanunciante:') !!}
    {!! Form::number('idusuarioanunciante', null, ['class' => 'form-control']) !!}
</div>

<!-- Dtinclusao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dtinclusao', 'Dtinclusao:') !!}
    {!! Form::date('dtinclusao', null, ['class' => 'form-control']) !!}
</div>

<!-- Dtalteracao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dtalteracao', 'Dtalteracao:') !!}
    {!! Form::date('dtalteracao', null, ['class' => 'form-control']) !!}
</div>

<!-- Ativo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ativo', 'Ativo:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('ativo', false) !!}
        {!! Form::checkbox('ativo', '1', null) !!} 1
    </label>
</div>

<!-- Aprovado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aprovado', 'Aprovado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('aprovado', false) !!}
        {!! Form::checkbox('aprovado', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('anunciantes.index') !!}" class="btn btn-default">Cancel</a>
</div>
