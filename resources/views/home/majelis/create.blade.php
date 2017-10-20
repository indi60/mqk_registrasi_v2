
@extends('layouts.app_admin')



@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link href="{{ asset('css/plugins/clockpicker/clockpicker.css') }} " rel="stylesheet">
@stop

@section('title', 'MQKN-2017')

@section('content')
<br>
<div class="row">
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Majelis Perlombaan  </small></h5>
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
              {!! Form::open(['url' => 'operator_registrasi/majelis', 'class' => 'form-horizontal']) !!}
                  @include('home.majelis.form', ['submitButtonText' => 'Tambah Majelis'])
              {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection








@section('script')

<!-- Data picker -->

<script src="{{ asset('js/plugins/clockpicker/clockpicker.js') }}"></script>

<script>

$(function() {
  //$( "#tgl_lahir" ).datepicker();
  $('#tanggal').datepicker({ dateFormat: "yy-mm-dd", changeMonth: true,
          changeYear: true, yearRange: '2010:2020', defaultDate: ''
      });
});
</script>

<!-- Page-Level Scripts -->
<script>
    $(document).ready(function(){

      $(".tanggal").change(function() {
        var d = new Date($(".tanggal").val());
        var days = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];


        document.getElementById("hari").value = days[d.getDay()];
      });

      $('.clockpicker').clockpicker();






    });

</script>



@stop



