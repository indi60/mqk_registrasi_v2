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
                <h5>Edit Peserta Majelis  </small></h5>
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

              <div class="row" style="padding: 10px;">
                <div class="col-lg-2" style="padding-bottom: 10px;">
                  <p style="font-size: 1.2vw;font-weight: bold;"> Bidang Lomba </p> 

                  <p style="font-size: 1.2vw;font-weight: bold;"> Marhalah </p>
                  <p style="font-size: 1.2vw;font-weight: bold;"> Babak </p>
                  <p style="font-size: 1.2vw;font-weight: bold;"> Token </p>
                </div>
                <div class="col-lg-1" style="padding-bottom: 10px;">
                  <p style="font-size: 1.2vw;font-weight: bold;"> : </p> 

                  <p style="font-size: 1.2vw;font-weight: bold;"> : </p>
                  <p style="font-size: 1.2vw;font-weight: bold;"> : </p>
                  <p style="font-size: 1.2vw;font-weight: bold;"> : </p>
                </div>
                <div class="col-lg-6">
                  <p style="font-size: 1.2vw;font-weight: bold;"> {{$list_peserta[0]->majelis->bidang_lomba_majelis->bidang_lomba}} </p>
                  <p style="font-size: 1.2vw;font-weight: bold;"> {{$list_peserta[0]->majelis->marhalah_majelis->marhalah}} </p>
                  <p style="font-size: 1.2vw;font-weight: bold;"> {{$list_peserta[0]->majelis->babak->nama_babak}} </p>
                  <p style="font-size: 1.2vw;font-weight: bold;"> {{$list_peserta[0]->majelis->token}} </p>

                </div>
              </div>


                  <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-peserta" >
        <thead>
        <tr>
            <th>No</th>
            <th>No Peserta</th>
            <th>No Urut</th>
            <th>Kafilah</th>
            <th>Jenis Kelamin</th>
            @if($list_peserta[0]->jenis_lomba=='individu')
            <th>Nama Lengkap</th>
            <th>Asal Pesantren</th>
            
            @endif

            <th>Nilai Hakim I</th>
            <th>Nilai Hakim II</th>
            <th>Nilai Hakim III</th>
            <th>Nilai Total</th>

            @if($list_peserta[0]->majelis->bidang_lomba_id == 13 || $list_peserta[0]->majelis->bidang_lomba_id == 12)
            <th>Jumlah Menang</th>
            @endif

            
            @if($list_peserta[0]->majelis->babak->nama_babak == 'Penyisihan')
            <th style="min-width:100px">Aksi</th>
            @endif
        </tr>
        </thead>
        <tbody>

          <?php
          $no=1;
          foreach ($list_peserta as $row): ?>
            <tr>
              <td>{{$no++}}</td>
              <td>{{$row->no_peserta}}</td>
              <td style="text-align: center;">

                <a href="#" class="testEdit" data-type="text" data-column="no_urut"  data-url="{{url('operator_registrasi/no_urut_update/'.$row->id_majelis_peserta)}}" data-pk="{{$row->id_majelis_peserta}}" data-title="Ubah No Urut" data-name="no_urut">{{$row->no_urut}}</a>

              </td>
              <td>{{$row->peserta->kafilah->nama_kafilah}}</td>
              <td>

              @if($row->peserta->jenis_kelamin == 'pria')
              Putra
              @else
              Putri
              @endif
              </td>
              @if($row->jenis_lomba=='individu')
              <td>
                {{$row->peserta->nama_lengkap}}
              </td>
              <td>
                {{$row->peserta->nama_pesantren}}
              </td>
             @endif
             <td style="text-align: center;">
               {{$row->nilai[0]}}
             </td>
             <td style="text-align: center;">
               {{$row->nilai[1]}}
             </td>
             <td style="text-align: center;">
               {{$row->nilai[2]}}
             </td>
             <td style="text-align: center;">
               {{ $row->nilai[0]+$row->nilai[1]+$row->nilai[2] }}
             </td>
             @if($list_peserta[0]->majelis->bidang_lomba_id == 13 || $list_peserta[0]->majelis->bidang_lomba_id == 12)
             <td style="text-align: center;">
               {{$row->jumlah_menang}}
             </td>
             @endif

              @if($list_peserta[0]->majelis->babak->nama_babak == 'Penyisihan')
              <td> 
              @if(!$row->masuk_final)  
              <a class="btn btn-xs btn-info" href="{{ URL::to('operator_registrasi/masuk_final/'.$row->no_peserta.'/'.$row->majelis_id) }}"><i class="fa fa-plus fa-fw"></i> Masuk Babak Final</a> 
              @else
              <span class="btn btn-xs btn-success" href="{{ URL::to('operator_registrasi/masuk_final/'.$row->no_peserta.'/'.$row->majelis_id) }}"><i class="fa fa-check fa-fw"></i> Sudah Masuk Final</span> 
              @endif
              </td>
              @endif
            </tr>
          <?php endforeach; ?>

        </tbody>

        </table>
            </div>
        </div>
    </div>
</div>
@endsection








@section('script')

<script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>

<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>



<!-- Page-Level Scripts -->
<script>
    $(document).ready(function(){
        $('.dataTables-peserta').DataTable({
            pageLength: 40,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'daftar_majelis'},
                {extend: 'pdf', title: 'daftar_majelis'},
                {extend: 'print',
                 customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ]

        });



    });

</script>

<script>

$(function() {
  //$( "#tgl_lahir" ).datepicker();
  $('#tanggal').datepicker({ dateFormat: "yy-mm-dd", changeMonth: true,
          changeYear: true, yearRange: '2010:2020', defaultDate: ''
      });
});
</script>


<script>
         $.fn.editable.defaults.mode = 'topup';
         $(document).ready(function() {
             $('.testEdit').editable({
                 params: function(params) {
                     // add additional params from data-attributes of trigger element
                     params.name = $(this).editable().data('name');
                     return params;
                 },
                 error: function(response, newValue) {
                     if(response.status === 500) {
                         return 'Server error. Check entered data.';
                     } else {
                         return response.responseText;
                         // return "Error.";
                     }
                 }
             });
         });
         </script>
<script>
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
</script>         

@stop

