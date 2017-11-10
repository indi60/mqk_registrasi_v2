@extends('layouts.public')



@section('css')
<style type="text/css">
  h2 {
  text-align: center;
}

table caption {
  padding: .5em 0;
  font-size: 24px;
}

@media screen and (max-width: 767px) {
  table caption {
    border-bottom: 1px solid #ddd;
  }
}

.p {
  text-align: center;
  padding-top: 140px;
  font-size: 14px;
}
</style>
@stop


@section('content')
<h2>{{$list_peserta[0]->majelis->bidang_lomba_majelis->bidang_lomba}} - 
          {{$list_peserta[0]->majelis->marhalah_majelis->marhalah}} - 
          {{$list_peserta[0]->majelis->babak->nama_babak}} -
          @if($jenis_kelamin=='pria')Putra @else Putri @endif</h2>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
          <caption class="text-center">
          </caption>
          <thead>
            <tr>
              <th>No</th>
              <th>Kafilah</th>
              <th>No Peserta</th>
              <th>Nama</th>
              <th>Nilai</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=1;
            foreach ($list_peserta as $row): ?>
            @if($row->peserta->jenis_kelamin == $jenis_kelamin)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$row->peserta->kafilah->nama_kafilah}}</td>
                <td>{{$row->peserta->no_peserta}}</td>
                <td>{{$row->peserta->nama_lengkap}}</td>
                <td>{{ $row->nilai_total }}</td>
              </tr>
            @endif  
            <?php endforeach; ?>
            
          </tbody>
          <tfoot>
            <tr>
              <td colspan="5" class="text-center">SUMBER DATA: PUSAT INFORMASI MQK</td>
            </tr>
          </tfoot>
        </table>
      </div><!--end of .table-responsive-->
    </div>
  </div>
</div>



@endsection








@section('script')

<script type="text/javascript">
  window.setInterval(function(){
          window.location.reload();
  }, 10000);

  
</script>

@stop


