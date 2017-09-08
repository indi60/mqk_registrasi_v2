@extends('layouts.app_admin')

@section('css')

<style>
.quick-search-form .form-control {
height: 35px;
padding: 8px 15px;
color: #a4a4a4;   /* change  color of text to be typed inside search box */
font-size: 13px;
line-height: 20px;
background-color: transparent;
border: 1px solid #ccc;
border-radius: 0!important;
-webkit-box-shadow: none;
box-shadow: none;
}



.btn-custom {
color: ##FFFFFF;            
background-color: #7bae23;   /* change  button color */
border-radius: 0!important;    /* button border radius */
padding: 6px 10px;              /* Button size change*/

}

.btn-custom:hover{
background-color:#9AC94B; /* change  button color on hover */
border-radius: 0!important;

}


.custom-glyph-color{
    color:#fff;       /* change  magnifying glass color in  button */
}

.custom-glyph-color:hover{
    color:#b1b1b1;         /* change  magnifying glass color in  button on mouse hover */
}



  

</style>
@stop

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center m-t-lg">
                            <h1 style="padding-bottom: 15px;">
                                Masukkan No Registrasi
                            </h1>
                            
                            <form class="form-inline quick-search-form" role="form" action="{{url('operator_registrasi/cari_no_registrasi')}}" method="post">
                             {{ csrf_field() }}
                            <div class="form-group">
                                    <input type="text" name="no_registrasi" class="form-control" placeholder="Nomor Registrasi">
                            </div>
                            <button type="submit" id="quick-search" class="btn btn-custom"><span class="glyphicon glyphicon-search custom-glyph-color"></span></button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
