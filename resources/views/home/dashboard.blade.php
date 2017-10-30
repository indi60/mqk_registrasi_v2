@extends('layouts.app_admin')

@section('css')

<style>

/*main card style*/
.card {
  max-width: 100%;
  position: relative;
  /*display: flex;*/
  flex-direction: column;
  min-height: 0;
  background: #fff;
  padding: 0;
  border: none;
  border-radius: .5rem;
  box-shadow: 0 1px 3px 0 #d4d4d5,0 0 0 1px #d4d4d5;
  transition: box-shadow 0.1s ease, transform 0.1s ease;
  z-index: '';
  margin-bottom: 30px;
}
.card a,
.cards > .card a {
  cursor: pointer;
}

.card > .card-content,
.cards > .card > .card-content {
  flex-grow: 1;
  border: none;
  background: 0 0;
  margin: 0;
  padding: 1em;
  box-shadow: none;
  font-size: 1em;
  border-radius: 0;
}
.card > .card-content:after,
.cards > .card > .card-content:after {
  display: block;
  height: 0;
}
.card > .card-content > h4.card-title,
.cards > .card > .card-content > h4.card-title {
  display: block;
  margin: 0px;
  font-family: Lato, 'Helvetica Neue', Arial, Helvetica, sans-serif;
}
.card > .card-content > h6.card-meta,
.cards > .card > .card-content > h6.card-meta {
  margin-top: 0.2em;
}
.card > .card-content > h6.card-meta + .card-description,
.cards > .card > .card-content > h6.card-meta + .card-description,
.card > .card-content > h4.card-title + .card-description,
.cards > .card > .card-content > h4.card-title + .card-description{
  margin-top: 1em;
}
.card > .card-content > .card-description,
.cards > .card > .card-content > .card-description {
  clear: both;
  margin-top: 1em;
}
.card > .card-content p,
.cards > .card > .card-content p {
  margin: 0 0 0.5em;
}
.card > .card-content p:last-child,
.cards > .card > .card-content p:last-child {
  margin-bottom: 0;
}
.card > .card-content > a.card-title,
.cards > .card > .card-content > a.card-title {
  color: rgba(0, 0, 0, 0.85);
}
.card > .card-content > a.card-title:hover,
.cards > .card > .card-content > a.card-title:hover {
  color: #1e70bf;
}

/*card with border*/
.card.card-centred-text {
  text-align: center;
  
}
/*card with border*/
.card.card-with-border .card-content {
  position: relative;
  padding: 15px 15px 25px 15px;
}
.card.card-with-border::after {
  position: absolute;
  display: block;
  width: calc(100% - 10px);
  height: calc(100% - 10px);
  content: '';
  top: 5px;
  left: 5px;
  z-index: 1;
  border-radius: 5px;
  border: 1px solid rgba(255, 255, 255, 0.8);
} 
/*bg and text*/
.black-grey {color:#fff!important;background-color:#434A54!important}
.text-white,.text-white-hover:hover{color:#fff!important}




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

@section('title', 'MQKN-2017')

@section('content')

@if($isValidated  && $peserta->status == 1)
<h3 style="text-align: center;">Ambil Photo Peserta</h3>

<div class="container" style="max-width: 500px;">

  <div class="app">

    <a href="#" id="start-camera" class="visible">Touch here to start the app.</a>
    <video muted id="camera-stream"></video>
    <img id="snap">

    <p id="error-message"></p>

    <div class="controls">
      <!--<a href="#" id="delete-photo" title="Delete Photo" class="disabled"><i class="material-icons">delete</i></a>-->
      <a href="#" id="take-photo" title="Take Photo" ><i class="material-icons">camera_alt</i></a>
      <a href="#" id="gunakan-photo" title="Gunakan Gambar Ini"  onclick="canvasToImg()"><i class="fa fa-check-circle" aria-hidden="true" fa-3x></i></a>
      <!--<a href="#" id="download-photo" download="selfie.png" title="Save Photo" class="disabled"><i class="material-icons">file_download</i></a>  -->
    </div>

    <!-- Hidden canvas element. Used for taking snapshot of video. -->
    <canvas id="canvas"></canvas>

  </div>

</div>
@endif

    <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center m-t-lg">
                            <h1 style="padding-bottom: 15px;">
                                Masukkan No Registrasi
                            </h1>
                            
                            <form class="form-inline quick-search-form" role="form" action="{{url('operator_registrasi/dashboard')}}" method="post" enctype="multipart/form-data">
                             {{ csrf_field() }}
                            <div class="form-group">
                                    <input type="text" name="no_registrasi" class="form-control" placeholder="Nomor Registrasi">
                            </div>
                            <button type="submit" id="quick-search" class="btn btn-custom"><span class="glyphicon glyphicon-search custom-glyph-color"></span></button>
                          </form>

                          @if(isset($peserta) && $total_found > 0 )

    <div class="container" style="margin-top:20px;">
          <div class="row-fluid">
              
              <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-1 col-lg-offset-1 toppad" >
               <div class="panel panel-info">
                  <div class="panel-heading"><h3 class="panel-title">
                      
                  Profil {{$peserta->nama_lengkap}}
                  </h3>
                  <div class="span2" style="margin-top:-25px; float:right;">
                  <div class="btn-group">
                      <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          
                          <li style="align:justify;"><a href="#"><span class="icon-cog"></span> Modify</a></li>
                          <li style="align:justify;"><a href="#"><span class="icon-log-out"></span>Sign Out</a></li>

                      </ul>
                  </div>
                  </div>
              </div>
                  <div class="panel-body">
                  @if($isValidated)
                  <form target="_blank" class="" action="{{url('operator_registrasi/cetak_kartu')}}" method="post">
                              {{ csrf_field() }}
                  @endif

                  <div class="row">
                      <div>
                          
                          
                          @if($isValidated  && $peserta->status == 1)
                          <div id="image" class="responsive" >
                            
                          </div>

                          <input style="visibility:hidden;" id="image_input" name="img1" type="file" />

                          
                          @endif
                            
                      </div>
                      
                    </div>

                    <div class="row">
                      <div class="col-md-3 col-lg-3 " align="center">
                          @if(!$isValidated)
                          <i class="fa fa-vcard fa-5x"></i>
                          @elseif($isValidated  && $peserta->status == 1)
                          

                          <div class="" style="font-size: x-large;font-family: monospace;">
                          <?php 
                          echo DNS2D::getBarcodeHTML($peserta->no_peserta, "QRCODE",5,5);
                          ?>
                            <br>
                            @if($peserta->jenis_peserta == 'peserta')
                            {{ $peserta->no_peserta }}
                            @elseif($peserta->jenis_peserta == 'panitia')
                            PNT-{{ $peserta->no_peserta }}
                            @elseif($peserta->jenis_peserta == 'vip')
                            VIP-{{ $peserta->no_peserta }}
                            @elseif($peserta->jenis_peserta == 'lainnya')
                            PL-{{ $peserta->no_peserta }}
                            @elseif($peserta->jenis_peserta == 'bazar')
                            PJB-{{ $peserta->no_peserta }}
                            @elseif($peserta->jenis_peserta == 'pentas_seni')
                            PJS-{{ $peserta->no_peserta }}
                            @elseif($peserta->jenis_peserta == 'panitera')
                            PNR-{{ $peserta->no_peserta }}
                            @elseif($peserta->jenis_peserta == 'dewan_hakim')
                            DH-{{ $peserta->no_peserta }}
                            @endif

                          </div>
                          @endif
                            
                      </div>
                      <div class=" col-md-9 col-lg-9 " style="text-align: left;"> 

                        @if($peserta->jenis_peserta == 'peserta')
                        <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><strong>{{$peserta->nama_lengkap}}</strong></td>
                        </tr>
                        <tr>
                            <td>Kafilah</td>
                            <td><strong>{{$peserta->kafilah->nama_kafilah}}</strong></td>
                        </tr>
                        <tr>
                            <td>Bidang Lomba</td>
                            <td><strong>{{$peserta->bidang_lomba_peserta->bidang_lomba}}</strong></td>
                        </tr>
                        <tr>
                            <td>Marhalah</td>
                            <td><strong> {{$peserta->marhalah_peserta->marhalah}} </strong></td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td><strong> {{$peserta->tempat_lahir}}, {{date('d-M-Y', strtotime($peserta->tanggal_lahir))}} </strong></td>
                        </tr>
                        <tr>
                            <td>Pesantren Asal</td>
                            <td><strong> {{$peserta->nama_pesantren}} </strong></td>
                        </tr>
                        </tbody>
                        </table>
                        <table>

                        @elseif($peserta->jenis_peserta == 'bazar' )

                        <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><strong>{{$peserta->nama_lengkap}}</strong></td>
                        </tr>
                        <tr>
                            <td>Kafilah</td>
                            <td><strong>{{$peserta->kafilah->nama_kafilah}}</strong></td>
                        </tr>
                        
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td><strong> {{$peserta->tempat_lahir}}, {{date('d-M-Y', strtotime($peserta->tanggal_lahir))}} </strong></td>
                        </tr>
                        <tr>
                            <td>Nama Instansi</td>
                            <td><strong> {{$peserta->nama_instansi}} </strong></td>
                        </tr>
                        </tbody>
                        </table>
                        <table>

                        @elseif($peserta->jenis_peserta == 'pentas_seni' )

                        <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><strong>{{$peserta->nama_lengkap}}</strong></td>
                        </tr>
                        <tr>
                            <td>Kafilah</td>
                            <td><strong>{{$peserta->kafilah->nama_kafilah}}</strong></td>
                        </tr>

                        <tr>
                            <td>Penanggung Jawab</td>
                            <td><strong>PENTAS SENI</strong></td>
                        </tr>
                        
                        
                        
                        </tbody>
                        </table>
                        <table>


                        @elseif($peserta->jenis_peserta == 'dewan_hakim'  )

                        <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><strong>{{$peserta->nama_lengkap}}</strong></td>
                        </tr>
                        

                        <tr>
                            <td>Posisi</td>
                            <td><strong>DEWAN HAKIM</strong></td>
                        </tr>


                        <tr>
                            <td>Nama Instansi</td>
                            <td><strong> {{$peserta->nama_instansi}} </strong></td>
                        </tr>
                        
                        
                        
                        </tbody>
                        </table>
                        <table>

                           @elseif( $peserta->jenis_peserta == 'panitera'  )

                        <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><strong>{{$peserta->nama_lengkap}}</strong></td>
                        </tr>
                        

                        <tr>
                            <td>Posisi</td>
                            <td><strong>PANITERA</strong></td>
                        </tr>


                        <tr>
                            <td>Nama Instansi</td>
                            <td><strong> {{$peserta->nama_instansi}} </strong></td>
                        </tr>
                        
                        
                        
                        </tbody>
                        </table>
                        <table>

                        @elseif( $peserta->jenis_peserta == 'panitia' )

                        @if(!isset($peserta->kafilah->nama_kafilah))

                        <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><strong>{{$peserta->nama_lengkap}}</strong></td>
                        </tr>
                        

                        <tr>
                            <td>Posisi</td>
                            <td><strong>PANITIA</strong></td>
                        </tr>


                        <tr>
                            <td>Nama Instansi</td>
                            <td><strong> {{$peserta->nama_instansi}} </strong></td>
                        </tr>
                        @else
                         <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><strong>{{$peserta->nama_lengkap}}</strong></td>
                        </tr>
                        <tr>
                            <td>Posisi</td>
                            <td><strong>PANITIA / PEMBINA</strong></td>
                        </tr>
                        <tr>
                            <td>Kafilah</td>
                            <td><strong>{{$peserta->kafilah->nama_kafilah}}</strong></td>
                        </tr>
                        
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td><strong> {{$peserta->tempat_lahir}}, {{date('d-M-Y', strtotime($peserta->tanggal_lahir))}} </strong></td>
                        </tr>
                        <tr>
                            <td>Nama Instansi</td>
                            <td><strong> {{$peserta->nama_instansi}} </strong></td>
                        </tr>
                        </tbody>
                        </table>
                        <table>
                        @endif
                        
                        
                        
                        </tbody>
                        </table>
                        <table>

                        @else

                        <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><strong>{{$peserta->nama_lengkap}}</strong></td>
                        </tr>
                        <tr>
                            <td>Kafilah</td>
                            <td><strong>{{$peserta->kafilah->nama_kafilah}}</strong></td>
                        </tr>
                        
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td><strong> {{$peserta->tempat_lahir}}, {{date('d-M-Y', strtotime($peserta->tanggal_lahir))}} </strong></td>
                        </tr>
                        <tr>
                            <td>Nama Instansi</td>
                            <td><strong> {{$peserta->nama_instansi}} </strong></td>
                        </tr>
                        </tbody>
                        </table>
                        <table>

                        @endif


                        <tr>
                            <!--
                            <td>
                            <a href="#" class="btn btn-info"><i class="fa fa-eye"></i> Detail</a>
                            </td>
                            <td>
                            <a href="#" class="btn btn-primary"> <i class="fa fa-file"></i> Dokumen</a>
                            </td>
                            -->
                            <td>

                            @if($peserta->status == 2)  
                            <span class="btn btn-danger"><i class="fa fa-close"></i> Gagal Verifikasi</span>

                            @elseif($isValidated == false)
                            <form class="" action="{{url('operator_registrasi/verifikasi_peserta')}}" method="post">
                              {{ csrf_field() }}
                            <input type="hidden" name="no_registrasi" value="{{$peserta->no_registrasi}}">
                            <button type="submit" class="btn btn-success" name="button"><i class="fa fa-check"></i> Verifikasi</button>
                            </form>


                            @else
                            <td>
                            <button class="btn btn-info" name="button"><i class="fa fa-check"></i> Sudah di Verifikasi</button>
                            </td>
                            <td>
                            
                            <input type="hidden" name="no_registrasi" value="{{$peserta->no_registrasi}}">
                            
                            <input type="hidden" class="form-control" id="photo" name="photo">

                            <button type="submit" class="btn btn-danger" name="button"><i class="fa fa-vcard"></i> Cetak Kartu</button>
                            
                            </td>
                            @endif

                            </td>
                        </tr>
                        </table>
                        
                        
                        
                        

                      </div>
                    </div>

                    @if($isValidated)
                    </form>
                    @endif

                  </div>
                </div>
              </div>
          </div>
      </div>


                
        <div class="wrapper wrapper-content animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content border-sbottom">
                            <h4>Dokumen Pendukung</h4>
                           <!--  <p>
                                PDF.js is a Portable Document Format (PDF) viewer that is built with HTML5.
                                PDF.js is community-driven and supported by Mozilla Labs. The goal is to create a general-purpose, web standards-based platform for parsing and rendering PDFs.
                                 Full documentation: <a href="https://github.com/mozilla/pdf.js" target="_blank">https://github.com/mozilla/pdf.js</a>
                            </p> -->

                        </div>
                    </div>
                </div>
            </div>
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

            @elseif ($total_found == 0)
                    <div class="container_2">
                        <div class="row">
                        <h1>Tidak Ditemukan <span>:(</span></h1>
                                <p>Nomor Registrasi tidak terdaftar dalam sistem Pendaftaran MQK.</p>
                                <p>Silahkan ulangi lagi.</p>
                                
                        </div>
                    </div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
@endsection



@section('script')

@if($isValidated && $peserta->status == 1)
<script src="{{ asset('camera/js/script.js') }}"></script>
@endif


        <script src=" {{ asset('js/plugins/pdfjs/pdf.js') }}"></script>
        



    <script id="script">
        //
        // If absolute URL from the remote server is provided, configure the CORS
        // header on that server.
        //

        var url = '/dokumen_peserta/no_document_uploaded.pdf';
        @if(isset($peserta) && $peserta->dokumen_url != "")

          @if($peserta->jenis_peserta == 'peserta')
          url = '/dokumen_peserta/{{$peserta->dokumen_url}}';
          @endif

          @if($peserta->jenis_peserta == 'panitia')
          url = '/dokumen_panitia/{{$peserta->dokumen_url}}';
          @endif

          @if($peserta->jenis_peserta == 'panitera')
          url = '/dokumen_panitera/{{$peserta->dokumen_url}}';
          @endif

          @if($peserta->jenis_peserta == 'bazar')
          url = '/dokumen_bazar/{{$peserta->dokumen_url}}';
          @endif

          @if($peserta->jenis_peserta == 'vip')
          url = '/dokumen_vip/{{$peserta->dokumen_url}}';
          @endif

          @if($peserta->jenis_peserta == 'pentasseni')
          url = '/dokumen_pentasseni/{{$peserta->dokumen_url}}';
          @endif

          @if($peserta->jenis_peserta == 'dewan_hakim')
          url = '/dokumen_dewan_hakim/{{$peserta->dokumen_url}}';
          @endif

          @if($peserta->jenis_peserta == 'lainnya')
          url = '/dokumen_lainnya/{{$peserta->dokumen_url}}';
          @endif
        
        
        @endif


        var pdfDoc = null,
                pageNum = 1,
                pageRendering = false,
                pageNumPending = null,
                scale = 1.5,
                zoomRange = 0.25,
                canvas = document.getElementById('the-canvas'),
                ctx = canvas.getContext('2d');

        /**
         * Get page info from document, resize canvas accordingly, and render page.
         * @param num Page number.
         */
        function renderPage(num, scale) {
            pageRendering = true;
            // Using promise to fetch the page
            pdfDoc.getPage(num).then(function(page) {
                var viewport = page.getViewport(scale);
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Render PDF page into canvas context
                var renderContext = {
                    canvasContext: ctx,
                    viewport: viewport
                };
                var renderTask = page.render(renderContext);

                // Wait for rendering to finish
                renderTask.promise.then(function () {
                    pageRendering = false;
                    if (pageNumPending !== null) {
                        // New page rendering is pending
                        renderPage(pageNumPending);
                        pageNumPending = null;
                    }
                });
            });

            // Update page counters
            document.getElementById('page_num').value = num;
        }

        /**
         * If another page rendering in progress, waits until the rendering is
         * finised. Otherwise, executes rendering immediately.
         */
        function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                renderPage(num,scale);
            }
        }

        /**
         * Displays previous page.
         */
        function onPrevPage() {
            if (pageNum <= 1) {
                return;
            }
            pageNum--;
            var scale = pdfDoc.scale;
            queueRenderPage(pageNum, scale);
        }
        document.getElementById('prev').addEventListener('click', onPrevPage);

        /**
         * Displays next page.
         */
        function onNextPage() {
            if (pageNum >= pdfDoc.numPages) {
                return;
            }
            pageNum++;
            var scale = pdfDoc.scale;
            queueRenderPage(pageNum, scale);
        }
        document.getElementById('next').addEventListener('click', onNextPage);

        /**
         * Zoom in page.
         */
        function onZoomIn() {
            if (scale >= pdfDoc.scale) {
                return;
            }
            scale += zoomRange;
            var num = pageNum;
            renderPage(num, scale)
        }
        document.getElementById('zoomin').addEventListener('click', onZoomIn);

        /**
         * Zoom out page.
         */
        function onZoomOut() {
            if (scale >= pdfDoc.scale) {
                return;
            }
            scale -= zoomRange;
            var num = pageNum;
            queueRenderPage(num, scale);
        }
        document.getElementById('zoomout').addEventListener('click', onZoomOut);

        /**
         * Zoom fit page.
         */
        function onZoomFit() {
            if (scale >= pdfDoc.scale) {
                return;
            }
            scale = 1;
            var num = pageNum;
            queueRenderPage(num, scale);
        }
        document.getElementById('zoomfit').addEventListener('click', onZoomFit);


        /**
         * Asynchronously downloads PDF.
         */
        PDFJS.getDocument(url).then(function (pdfDoc_) {
            pdfDoc = pdfDoc_;
            var documentPagesNumber = pdfDoc.numPages;
            document.getElementById('page_count').textContent = '/ ' + documentPagesNumber;

            $('#page_num').on('change', function() {
                var pageNumber = Number($(this).val());

                if(pageNumber > 0 && pageNumber <= documentPagesNumber) {
                    queueRenderPage(pageNumber, scale);
                }

            });

            // Initial/first page rendering
            renderPage(pageNum, scale);
        });
    </script>

    <script>
    function canvasToImg() {
      var canvas = document.getElementById("canvas");
      var ctx=canvas.getContext("2d");
      //draw a red box

      var url = canvas.toDataURL();

      var newImg = document.createElement("img"); // create img tag
       newImg.style.height = '300px';
       //newImg.style.weight = '500px';
      newImg.style.padding = '5px';
      newImg.id = 'logo';
      newImg.src = url;

      //document.body.appendChild(newImg); // add to end of your document
      $('#image').html(newImg); 
      

      $("#photo").val(url);
    }





    
</script>


@stop

