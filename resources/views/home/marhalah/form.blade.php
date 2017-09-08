@if (isset($marhalah))
    {!! Form::hidden('id_marhalah', $marhalah->id_marhalah) !!}
@endif

@if ($errors->any())
    <div class="form-group {{ $errors->has('marhalah') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('marhalah', 'Nama Marhalah:', ['class' => 'control-label']) !!}
    {!! Form::text('marhalah', null, ['class' => 'form-control']) !!}
    @if ($errors->has('marhalah'))
        <span class="help-block">{{ $errors->first('marhalah') }}</span>
    @endif
</div>


<div class="form-group" style="text-align: right;">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>
