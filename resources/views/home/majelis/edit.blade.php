@extends('layouts.app_admin')



@section('css')

@stop

@section('title', 'MQKN-2017')

@section('content')
<br>
<div class="row">
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Majelis  </small></h5>
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
              {!! Form::model($majelis, ['method' => 'PATCH', 'class'=>'form-horizontal', 'action' => ['MajelisController@update', $majelis->id_majelis]]) !!}
            @include('home.majelis.form', ['submitButtonText' => 'Update Majelis'])
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

