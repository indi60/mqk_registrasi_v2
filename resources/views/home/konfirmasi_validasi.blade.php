@extends('layouts.app_admin')

@section('css')

<style>

#sticky {
    padding: 0.5ex;
    
    
    
    border-radius: 0.5ex;
}

#sticky.stick {
    margin-top: 0 !important;
    position: fixed;
    top: 0;
    z-index: 10000;
    border-radius: 0 0 0.5em 0.5em;
}


       ::-moz-selection {
                background: #b3d4fc;
                text-shadow: none;
            }

            ::selection {
                background: #b3d4fc;
                text-shadow: none;
            }

            html,
            input {
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            }



            h1 span {
                color: #bbb;
            }

            h3 {
                margin: 1.5em 0 0.5em;
            }


            .container_2 {
                padding-top: 20px;
                max-width: 380px;
                _width: 380px;
                margin: 0 auto;
            }

          

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
<div class="row">
  <div id="sticky-anchor"></div>
<div id="sticky">
  <div class="col-md-10 col-lg-10 toppad" >
                                

        <div class="ibox-content" style="text-align: left;">
        <form class="" action="{{url('operator_registrasi/verifikasi_peserta_valid')}}" method="post">
          {{ csrf_field() }}
        <input type="hidden" name="no_registrasi" value="{{$peserta->no_registrasi}}">
                          
          <h2>Persyaratan Registrasi</h2>
          <strong>Cek dokumen fisik.</strong>
          <ul class="todo-list m-t">
              
              @if($peserta->jenis_peserta == 'peserta')
              <li>
                  <input type="checkbox" value="1" name="cek_form_data_peserta" class="i-checks"/>
                  <span class="m-l-xs">Form Data Peserta yang telah diisi dan ditandatangani.</span>
                  
              </li>
              <li>
                  <input type="checkbox" value="1" name="cek_izin_operasional_pesantren" class="i-checks"/>
                  <span class="m-l-xs">Izin Operasional Pesantren Asal.</span>
                  
              </li>
              <li>
                  <input type="checkbox" value="1" name="cek_raport" class="i-checks" />
                  <span class="m-l-xs">Raport/Kasyfuddarajah/Surat Keterangan Pimpinan Pesantren</span>
                  
              </li>
              <li>
                  <input type="checkbox" value="1" name="cek_akte_kelahiran" class="i-checks"/>
                  <span class="m-l-xs">Akte Kelahiran/KTP/Ijazah Pendidikan Terakhir</span>
                  
              </li>
              @else
              <li>
                  <input type="checkbox" value="1" name="cek_sk" class="i-checks"/>
                  <span class="m-l-xs">Penetapan Keputusan Panitia/Surat Tugas/Dokumen Penugasan Lainnya</span>
                  
              </li>
              @endif


          </ul>

          <div id="uploadDiv">

           
                   @if ($errors->any())
                    <div class="form-group {{ $errors->has('alasan') ? 'has-error' : 'has-success' }}">
                  @else
                    <div class="form-group">
                  @endif
                    
                    <div class="col-sm-12" style="margin-bottom: 10px;">
                    <textarea name="alasan" class="form-control" placeholder="Silahkan Ketik Alasan ditolak di sini..."></textarea>
                    
                    </div>
                    @if ($errors->has('alasan'))
                        <span class="help-block">{{ $errors->first('alasan') }}</span>
                    @endif
                  </div>
                  </div>

      
                 
          
          <br>
          <div style="text-align: center;">
          <button type="submit" class="btn btn-success" name="btn" value="valid" id="btnTerima">

          <i class="fa fa-check"></i> Verifikasi</button>

          <a class="btn btn-warning" id="btnRevisi" onclick="showUpload()"><i class="fa fa-pencil-square-o"></i> Tolak Verifikasi </a>

           
          

          

          </div>

          <div style="text-align: center;">
          <button type="submit" class="btn btn-danger" name="btn" value="invalid" id="btnTolak"><i class="fa fa-pencil-square-o"></i> Tolak Verifikasi</button>
          </div>

          
          </form>
          
      </div>


      


        </div>
</div>
</div>


    <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center m-t-lg">
                            

                          @if(isset($peserta) )
                          

                          <div class="container" style="margin-top:20px;">
                                <div class="row-fluid">
                                <div class="col-md-10 col-lg-10 toppad" >


                                
                               
                                </div>


                                   
                                </div>
                            </div>

                            @endif


                
        
                    </div>
                </div>
            </div>
            </div>



        <div class="wrapper wrapper-content animated fadeIn">
            
                    <div class="text-center pdf-toolbar">

                            <div class="btn-group">
                                <button id="prev" class="btn btn-white"><i class="fa fa-long-arrow-left"></i> <span class="hidden-xs">Previous</span></button>
                                <button id="next" class="btn btn-white"><i class="fa fa-long-arrow-right"></i> <span class="hidden-xs">Next</span></button>
                                <button id="zoomin" class="btn btn-white"><i class="fa fa-search-minus"></i> <span class="hidden-xs">Zoom In</span></button>
                                <button id="zoomout" class="btn btn-white"><i class="fa fa-search-plus"></i> <span class="hidden-xs">Zoom Out</span> </button>
                                <button id="zoomfit" class="btn btn-white"> 100%</button>
                                <span class="btn btn-white hidden-xs">Page: </span>

                            <div class="input-group">
                                <input type="text" class="form-control" id="page_num">

                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-white" id="page_count">/ 22</button>
                                </div>
                            </div>

                                </div>
                        </div>







            <div class="text-center m-t-md">
                <canvas id="the-canvas" class="pdfcanvas border-left-right border-top-bottom b-r-md"></canvas>
            </div>
            </div>
@endsection



@section('script')


@stop

