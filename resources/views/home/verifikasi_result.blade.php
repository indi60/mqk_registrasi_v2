@extends('layouts.app_admin')

@section('css')

<style>
.error-404 {
  margin: 0 auto;
  text-align: center;
}
.error-404 .error-code {
  bottom: 60%;
  color: #4686CC;
  font-size: 96px;
  line-height: 100px;
  font-weight: bold;
}
.error-404 .error-desc {
  font-size: 12px;
  color: #647788;
}
.error-404 .m-b-10 {
  margin-bottom: 10px!important;
}
.error-404 .m-b-20 {
  margin-bottom: 20px!important;
}
.error-404 .m-t-20 {
  margin-top: 20px!important;
}



  

</style>
@stop

@section('title', 'Hasil Verifikasi')

@section('content')

<div class="error-404">
    <div class="error-code m-b-10 m-t-20">YES <i class="fa fa-warning"></i></div>
    <h2 class="font-bold">Proses Verifikasi Selesai.</h2>

    <div class="error-desc">
        
        <div><br/>
            <!-- <a class=" login-detail-panel-button btn" href="http://vultus.de/"> -->
            <a href="{{ url('operator_registrasi/dashboard') }}" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span> Go back to Homepage</a>
        </div>
    </div>
</div>

@endsection



@section('script')


@stop

