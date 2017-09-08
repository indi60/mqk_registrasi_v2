@extends('layouts.app_admin')



@section('css')

@stop

@section('title', 'MQKN-2017')

@section('content')
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Daftar Peserta Lolos Verifikasi  </small></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>

                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
              {!! Form::open(['url' => 'operator_registrasi/rekapitulasi_peserta/filter',  'class' => 'form-horizontal']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">


            <div class="hr-line-dashed"></div>




                    @if ($errors->any())
                      <div class="form-group {{ $errors->has('kafilah_id') ? 'has-error' : 'has-success' }}">
                    @else
                      <div class="form-group">
                    @endif
                      <label class="col-sm-2 control-label">Kafilah</label>
                      <div class="col-sm-5">
                      {!! Form::select('kafilah_id',$list_kafilah, null, ['placeholder' => 'Semua Kafilah','class' => 'form-control']) !!}
                      </div>
                      @if ($errors->has('kafilah_id'))
                          <span class="help-block">{{ $errors->first('kafilah_id') }}</span>
                      @endif
                    </div>

                    










                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-white" type="submit">Batal</button>
                        <button class="btn btn-primary" type="submit">Lihat Rekapitulasi Peserta</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection








@section('script')


<script>

$(function() {
  //$( "#tgl_lahir" ).datepicker();
  $('#tanggal').datepicker({ dateFormat: "yy-mm-dd", changeMonth: true,
          changeYear: true, yearRange: '2010:2020', defaultDate: ''
      });
});
</script>

@stop
