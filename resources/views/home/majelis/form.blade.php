

@if (isset($majelis))
    {!! Form::hidden('id_majelis', $majelis->id_majelis) !!}
@endif

	@if ($errors->any())
      <div class="form-group {{ $errors->has('bidang_lomba_id') ? 'has-error' : 'has-success' }}">
    @else
      <div class="form-group">
    @endif
      <label class="col-sm-4 control-label"> Bidang Lomba</label>
      <div class="col-sm-8">
      {!! Form::select('bidang_lomba_id',$list_bidang_lomba, null, ['placeholder' => 'Pilih Bidang Lomba','class' => 'form-control', 'disabled'=>'disabled']) !!}
      </div>
      @if ($errors->has('bidang_lomba_id'))
          <span class="help-block">{{ $errors->first('bidang_lomba_id') }}</span>
      @endif
    </div>


	@if ($errors->any())
      <div class="form-group {{ $errors->has('marhalah_id') ? 'has-error' : 'has-success' }}">
    @else
      <div class="form-group">
    @endif
      <label class="col-sm-4 control-label">Marhalah</label>
      <div class="col-sm-8">
      {!! Form::select('marhalah_id',$list_marhalah, null, ['placeholder' => 'Pilih Marhalah','class' => 'form-control', 'disabled'=>'disabled' ]) !!}
      </div>
      @if ($errors->has('marhalah_id'))
          <span class="help-block">{{ $errors->first('marhalah_id') }}</span>
      @endif
    </div>

    @if ($errors->any())
      <div class="form-group {{ $errors->has('babak_id') ? 'has-error' : 'has-success' }}">
    @else
      <div class="form-group">
    @endif
      <label class="col-sm-4 control-label">Babak</label>
      <div class="col-sm-8">
      {!! Form::select('babak_id',$list_babak, null, ['placeholder' => 'Pilih Babak','class' => 'form-control', 'disabled'=>'disabled' ]) !!}
      </div>
      @if ($errors->has('babak_id'))
          <span class="help-block">{{ $errors->first('babak_id') }}</span>
      @endif
    </div>

    @if ($errors->any())
      <div class="form-group {{ $errors->has('pria_wanita') ? 'has-error' : 'has-success' }}">
    @else
      <div class="form-group">
    @endif
      <label class="col-sm-4 control-label">Putra / Putri</label>
      <div class="col-sm-8">
      {!! Form::select('pria_wanita', ['pria' => 'Putra', 'wanita' => 'Putri'], null, ['placeholder' => 'Pilih Putra atau Putri', 'class' => 'form-control', 'disabled'=>'disabled' ]) !!}
      </div>
      @if ($errors->has('pria_wanita'))
          <span class="help-block">{{ $errors->first('pria_wanita') }}</span>
      @endif
    </div>

    

    @if ($errors->any())
      <div class="form-group {{ $errors->has('dewan_hakim_1') ? 'has-error' : 'has-success' }}">
    @else
      <div class="form-group">
    @endif
      <label class="col-sm-4 control-label">Dewan Hakim I</label>
      <div class="col-sm-8">
      {!! Form::select('dewan_hakim_1',$list_dewan_hakim, null, ['placeholder' => 'Pilih Dewan Hakim I','class' => 'form-control']) !!}
      </div>
      @if ($errors->has('dewan_hakim_1'))
          <span class="help-block">{{ $errors->first('dewan_hakim_1') }}</span>
      @endif
    </div>

    @if ($errors->any())
      <div class="form-group {{ $errors->has('dewan_hakim_2') ? 'has-error' : 'has-success' }}">
    @else
      <div class="form-group">
    @endif
      <label class="col-sm-4 control-label">Dewan Hakim II</label>
      <div class="col-sm-8">
      {!! Form::select('dewan_hakim_2',$list_dewan_hakim, null, ['placeholder' => 'Pilih Dewan Hakim II','class' => 'form-control']) !!}
      </div>
      @if ($errors->has('dewan_hakim_2'))
          <span class="help-block">{{ $errors->first('dewan_hakim_2') }}</span>
      @endif
    </div>

    @if ($errors->any())
      <div class="form-group {{ $errors->has('dewan_hakim_3') ? 'has-error' : 'has-success' }}">
    @else
      <div class="form-group">
    @endif
      <label class="col-sm-4 control-label">Dewan Hakim III</label>
      <div class="col-sm-8">
      {!! Form::select('dewan_hakim_3',$list_dewan_hakim, null, ['placeholder' => 'Pilih Dewan Hakim III','class' => 'form-control']) !!}
      </div>
      @if ($errors->has('dewan_hakim_3'))
          <span class="help-block">{{ $errors->first('dewan_hakim_3') }}</span>
      @endif
    </div>

    @if ($errors->any())
      <div class="form-group {{ $errors->has('panitera_1') ? 'has-error' : 'has-success' }}">
    @else
      <div class="form-group">
    @endif
      <label class="col-sm-4 control-label">Panitera I</label>
      <div class="col-sm-8">
      {!! Form::select('panitera_1',$list_panitera, null, ['placeholder' => 'Pilih Panitera I','class' => 'form-control']) !!}
      </div>
      @if ($errors->has('panitera_1'))
          <span class="help-block">{{ $errors->first('panitera_1') }}</span>
      @endif
    </div>

    @if ($errors->any())
      <div class="form-group {{ $errors->has('panitera_2') ? 'has-error' : 'has-success' }}">
    @else
      <div class="form-group">
    @endif
      <label class="col-sm-4 control-label">Panitera II</label>
      <div class="col-sm-8">
      {!! Form::select('panitera_2',$list_panitera, null, ['placeholder' => 'Pilih Panitera II','class' => 'form-control']) !!}
      </div>
      @if ($errors->has('panitera_2'))
          <span class="help-block">{{ $errors->first('panitera_2') }}</span>
      @endif
    </div>



<div class="form-group" style="text-align: center;">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>
