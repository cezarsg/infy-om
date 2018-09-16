<!-- Idanunciante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idanunciante', 'Idanunciante:') !!}
    {!! Form::number('idanunciante', null, ['class' => 'form-control']) !!}
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

<!-- Idstatus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idstatus', 'Idstatus:') !!}
    {!! Form::number('idstatus', null, ['class' => 'form-control']) !!}
</div>

<!-- Idramonegocio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idramonegocio', 'Idramonegocio:') !!}
    {!! Form::number('idramonegocio', null, ['class' => 'form-control']) !!}
</div>

<!-- Estabelecimentoproprio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estabelecimentoproprio', 'Estabelecimentoproprio:') !!}
    {!! Form::text('estabelecimentoproprio', null, ['class' => 'form-control']) !!}
</div>

<!-- Qtdemaximapessoasporevento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qtdemaximapessoasporevento', 'Qtdemaximapessoasporevento:') !!}
    {!! Form::number('qtdemaximapessoasporevento', null, ['class' => 'form-control']) !!}
</div>

<!-- Informacoesimportantes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('informacoesimportantes', 'Informacoesimportantes:') !!}
    {!! Form::text('informacoesimportantes', null, ['class' => 'form-control']) !!}
</div>

<!-- Fotodestaquecaminho Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fotodestaquecaminho', 'Fotodestaquecaminho:') !!}
    {!! Form::text('fotodestaquecaminho', null, ['class' => 'form-control']) !!}
</div>

<!-- Score Field -->
<div class="form-group col-sm-6">
    {!! Form::label('score', 'Score:') !!}
    {!! Form::number('score', null, ['class' => 'form-control']) !!}
</div>

<!-- Idusuario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idusuario', 'Idusuario:') !!}
    {!! Form::number('idusuario', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('anuncios.index') !!}" class="btn btn-default">Cancel</a>
</div>
