@extends('layouts.public')



@section('css')
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
@stop

@section('title', 'MQKN-2017')

@section('content')

<div class="row" align="center">
    <div class="col-lg-12">
      <h2><b>MAJELIS MQK N 2017</b></h2>
    </div>
  </div>
<div class="row">
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Majelis</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>

                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>

        <div class="">
              


        <div class="ibox-content">
        <div class="row">
        <div class="col-lg-12">
              <div class="tombol-nav">
                
                  <p align="right"><strong> Jumlah Majelis: {{ $jumlah_majelis }} </strong></p>
            </div>

            </div>  

        </div>  

        <div class="row">
        <div class="col-lg-12">
          
          <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-peserta" >
                        <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Lomba</th>
                                <th style="text-align: center;">Marhalah</th>
                                <th style="text-align: center;">Babak</th>
                                <th style="text-align: center;">Tanggal</th>
                                <th style="text-align: center;">Hari</th>
                                
                                <th style="text-align: center;">Dewan Hakim <br>I</th>
                                <th style="text-align: center;">Dewan Hakim <br>II</th>
                                <th style="text-align: center;">Dewan Hakim <br>III</th>
                                <th style="text-align: center;">Panitera <br>I</th>
                                <th style="text-align: center;">Panitera <br>II</th>
                                
                                <th style="text-align: center;">Peserta</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                          <?php 
                          $i=0;
                          foreach($majelis_list as $row): ?>
                            <tr class="">
                                <td>{{ ++$i }}</td>
                                <td>{{ $row->bidang_lomba_majelis->bidang_lomba }}</td>
                                <td>{{ $row->marhalah_majelis->marhalah }}</td>
                                <td>{{ $row->babak->nama_babak }}</td>
                                <td>{{ $row->tanggal }}</td>
                                <td>{{ $row->hari }}</td>
                                
                                <td>
                                @if(isset($row->dewan_hakim_1_majelis))
                                {{ $row->dewan_hakim_1_majelis->nama_lengkap }}
                                @endif
                                </td>
                                <td>
                                @if(isset($row->dewan_hakim_2_majelis))
                                {{ $row->dewan_hakim_2_majelis->nama_lengkap }}
                                @endif
                                </td>
                                <td>
                                @if(isset($row->dewan_hakim_3_majelis))
                                {{ $row->dewan_hakim_3_majelis->nama_lengkap }}
                                @endif
                                </td>
                                <td>
                                @if(isset($row->panitera_1_majelis))
                                {{ $row->panitera_1_majelis->nama_lengkap }}
                                @endif
                                </td>
                                <td>
                                @if(isset($row->panitera_2_majelis))
                                {{ $row->panitera_2_majelis->nama_lengkap }}
                                @endif
                                </td>
                                
                                <td width="200px" style="text-align: center;">
                                  
                                  <a class="btn btn-xs btn-success" href="{{ URL::to('majelis/list_peserta/'.$row->id_majelis) }}"><i class="fa fa-eye fa-fw"></i> ({{$row->jumlah_peserta}}) Peserta</a>
                                  
                                </td>
                            </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>

                    
            </div>
        </div>
        </div>
        

            

        </div>
    </div>
</div>
</div>

<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      <h3 class="modal-title" id="lineModalLabel">My Modal</h3>
    </div>
    <div class="modal-body">

            <!-- content goes here -->
            <form action="upload_peserta" class="dropzone" id="my-dropzone2" enctype="multipart/form-data">

              <div class="modal-body">
                  <input type="hidden" name="id_peserta" id="id_peserta" value=""/>
              </div>
                <div class="fallback">
                  {{csrf_field()}}
                    <input name="file" type="file" multiple />
                </div>
            </form>

    </div>
    <div class="modal-footer">
      <div class="btn-group btn-group-justified" role="group" aria-label="group button">
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
        </div>

      </div>
    </div>
  </div>
  </div>
</div>




@endsection








@section('script')
<script src="{{ asset('admin/js/plugins/dataTables/datatables.min.js') }}"></script>




<!-- Page-Level Scripts -->
<script>
    $(document).ready(function(){
        $('.dataTables-peserta').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'daftar_majelis'},
                {extend: 'pdf', orientation: 'landscape', title: 'daftar_majelis'},
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

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link href="{{ asset('admin/css/plugins/clockpicker/clockpicker.css') }} " rel="stylesheet">
<script src="{{ asset('admin/js/plugins/clockpicker/clockpicker.js') }}"></script>

<script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>

<script>

$(function() {
  //$( "#tgl_lahir" ).datepicker();
  $('#tanggal').datepicker({ dateFormat: "yy-mm-dd", changeMonth: true,
          changeYear: true, yearRange: '2010:2020', defaultDate: ''
      });
});
</script>




@stop


