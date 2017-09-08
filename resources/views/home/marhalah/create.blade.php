
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
                <h5>Marhalah Perlombaan  </small></h5>
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
              {!! Form::open(['url' => 'operator_registrasi/marhalah']) !!}
                  @include('home.marhalah.form', ['submitButtonText' => 'Tambah Marhalah'])
              {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection








@section('script')



@stop



