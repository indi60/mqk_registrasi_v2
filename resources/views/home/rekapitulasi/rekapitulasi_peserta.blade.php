@extends('layouts.app_admin')



@section('css')

@stop

@section('title', 'MQKN-2017')

@section('content')

<div class="row" align="center">
    <div class="col-lg-12">
      <h2><b>DAFTAR PESERTA LOLOS VERIFIKASI KAFILAH {{ strtoupper($nama_kafilah)}}</b></h2>
    </div>
  </div>
<div class="row">
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Daftar Peserta Lolos Verifikasi Kafilah {{$nama_kafilah}} </h5>
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


        <div class="ibox-content">

            <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-peserta" >
        <thead>
        <tr>
            <th>No</th>
            <th>No Peserta</th>
            <th>Nama</th>
            <th>Tgl Lahir</th>
            <th>Marhalah</th>
            <th>Bidang/Majelis</th>
            <th>Putra/Putri</th>

        </tr>
        </thead>
        <tbody>

          <?php
          $no=1;
          foreach ($peserta as $row): ?>
            <tr>
              <td>{{$no++}}</td>
              <td>{{$row->no_peserta}}</td>
              
              <td>{{$row->nama_lengkap}}</td>
              <td>{{date_format(date_create($row->tgl_lahir),'d M Y')}}</td>
              <td>{{$row->marhalah_peserta->marhalah}}</td>
              <td>{{$row->bidang_lomba_peserta->bidang_lomba}}</td>
              <td>
                @if($row->jenis_kelamin == 'pria')
                Putra
                @else
                Putri
                @endif
              </td>
            </tr>
          <?php endforeach; ?>


        </tbody>

        </table>
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
            pageLength: 5,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'transportasi_kedatangan'},
                {extend: 'pdf', title: 'transportasi_kedatangan'},
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

<script>

$(function() {
  //$( "#tgl_lahir" ).datepicker();
  $('#tanggal').datepicker({ dateFormat: "yy-mm-dd", changeMonth: true,
          changeYear: true, yearRange: '2010:2020', defaultDate: ''
      });
});
</script>

@stop
