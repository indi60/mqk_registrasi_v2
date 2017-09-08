@if (isset($bidang_lomba))
    {!! Form::hidden('id_bidang_lomba', $bidang_lomba->id_bidang_lomba) !!}
@endif

@if ($errors->any())
    <div class="form-group {{ $errors->has('bidang_lomba') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('bidang_lomba', 'Nama Bidang Lomba:', ['class' => 'control-label']) !!}
    {!! Form::text('bidang_lomba', null, ['class' => 'form-control']) !!}
    @if ($errors->has('bidang_lomba'))
        <span class="help-block">{{ $errors->first('bidang_lomba') }}</span>
    @endif
</div>


<div class="form-group" style="text-align: right;">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>
