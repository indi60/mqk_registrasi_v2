@if (isset($babak))
    {!! Form::hidden('id_babak', $babak->id_babak) !!}
@endif

@if ($errors->any())
    <div class="form-group {{ $errors->has('nama_babak') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nama_babak', 'Nama Babak:', ['class' => 'control-label']) !!}
    {!! Form::text('nama_babak', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nama_babak'))
        <span class="help-block">{{ $errors->first('nama_babak') }}</span>
    @endif
</div>


<div class="form-group" style="text-align: right;">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>
