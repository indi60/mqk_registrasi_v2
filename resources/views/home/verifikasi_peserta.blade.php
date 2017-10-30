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


.sweet-alert { 
   top:5%;
    left:30%;
    outline: none;
    overflow:hidden;
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
        <form id="form-verifikasi" class="form-verifikasi" action="{{url('operator_registrasi/verifikasi_peserta_valid')}}" method="post">
          {{ csrf_field() }}
        <input type="hidden" name="no_registrasi" value="{{$peserta->no_registrasi}}">
        <input type="hidden" name="btn" id="btn">
                          
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
                                
                                <button id="zoomin" class="btn btn-white"><i class="fa fa-search-minus"></i> <span class="hidden-xs">Zoom In</span></button>
                                <button id="zoomout" class="btn btn-white"><i class="fa fa-search-plus"></i> <span class="hidden-xs">Zoom Out</span> </button>
                                <button id="zoomfit" class="btn btn-white"> 100%</button>
                                <span class="btn btn-white hidden-xs">Page: </span>

                                <button id="prev" class="btn btn-white"><i class="fa fa-long-arrow-left"></i> <span class="hidden-xs">Previous</span></button>
                                <button id="next" class="btn btn-white"><i class="fa fa-long-arrow-right"></i> <span class="hidden-xs">Next</span></button>


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

        
        <script src=" {{ asset('js/plugins/pdfjs/pdf.js') }}"></script>
        

        <script type="text/javascript">
        /*
          $("input[type='checkbox'].i-checks").change(function(){
            var a = $("input[type='checkbox'].i-checks");
            if(a.length == a.filter(":checked").length){
                alert('Data Peserta Lengkap!');
            }
        });
        */
        </script>



    <script id="script">

    var x = document.getElementById('uploadDiv');
      x.style.display = 'none';

      var y = document.getElementById('btnTolak');
      y.style.display = 'none';
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

          @if($peserta->jenis_peserta == 'pentas_seni')
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


        function sticky_relocate() {
            var window_top = $(window).scrollTop();
            var div_top = $('#sticky-anchor').offset().top;
            if (window_top > div_top) {
                $('#sticky').addClass('stick');
                $('#sticky-anchor').height($('#sticky').outerHeight());
            } else {
                $('#sticky').removeClass('stick');
                $('#sticky-anchor').height(0);
            }
        }

        $(function() {
            $(window).scroll(sticky_relocate);
            sticky_relocate();
        });



    </script>



<script>
function showUpload() {
    var x = document.getElementById('uploadDiv');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }

    var x = document.getElementById('btnRevisi');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }

    var x = document.getElementById('btnTolak');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }

    var x = document.getElementById('btnTerima');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}

</script>



<script>
     $(document).ready(function(){

       $('#btnDelete').click(function() {
          bootbox.confirm("<b>Apakah Anda Yakin Mengajukan Validasi Data?</b><br><br>Setelah data dikirim, Anda tidak bisa merubah data kembali.", function(result) {
            if(result){
              location.href = "{{url('kafilah/pengajuan_validasi')}}";
            }
          });
        });



     });
</script>

<script type="text/javascript">

@if($peserta->jenis_peserta == 'peserta')

$(document).on('click', '#btnTolak', function(e) {
    $("#btn").val("invalid");
    e.preventDefault();
    swal({
        title: 'Konfirmasi',
        input: 'checkbox',
        inputValue: 0,
        inputPlaceholder: ' Dengan ini saya menyatakan bahwa Peserta dengan Nama <br> {{ $peserta->nama_lengkap }} ({{$peserta->no_registrasi}}) dari Kafilah {{ $peserta->kafilah->nama_kafilah }} <br>TIDAK MEMENUHI SYARAT VERIFIKASI<br> (Bidang Lomba <strong>{{$peserta->bidang_lomba_peserta->bidang_lomba}}</strong> Marhalah {{$peserta->marhalah_peserta->marhalah}})',
        confirmButtonText: 'Tolak Verifikasi Peserta',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        customClass: 'sweet-alert',
        inputValidator: function (result) {
            return new Promise(function (resolve, reject) {
                if (result) {
                    resolve();
                } else {
                    reject('Anda harus mencentang persetujuan.');
                }
            })
        }
    }).then(function (result) {
        //$('#form-verifikasi').submit();
        document.getElementById("form-verifikasi").submit();
    });
});

$(document).on('click', '#btnTerima', function(e) {
    $("#btn").val("valid");
    e.preventDefault();
    
    swal({
        title: 'Konfirmasi',
        input: 'checkbox',
        inputValue: 0,
        inputPlaceholder: ' Dengan ini saya menyatakan bahwa Peserta dengan Nama <br> {{ $peserta->nama_lengkap }} ({{$peserta->no_registrasi}}) dari Kafilah {{ $peserta->kafilah->nama_kafilah }} <br> MEMENUHI SYARAT VERIFIKASI.<br> (Bidang Lomba <strong>{{$peserta->bidang_lomba_peserta->bidang_lomba}}</strong> Marhalah {{$peserta->marhalah_peserta->marhalah}})',
        confirmButtonText: 'Verifikasi Peserta',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        customClass: 'sweet-alert',
        inputValidator: function (result) {
            return new Promise(function (resolve, reject) {
                if (result) {
                    resolve();
                } else {
                    reject('Anda harus mencentang persetujuan.');
                }
            })
        }
    }).then(function (result) {
        //$('#form-verifikasi').submit();
        document.getElementById("form-verifikasi").submit();
    });
});

@else


$(document).on('click', '#btnTolak', function(e) {
  $("#btn").val("invalid");
    e.preventDefault();
    swal({
        title: 'Konfirmasi',
        input: 'checkbox',
        inputValue: 0,
        inputPlaceholder: ' Dengan ini saya menyatakan bahwa Nama <br> {{ $peserta->nama_lengkap }} ({{$peserta->no_registrasi}}) <br> TIDAK MEMENUHI SYARAT VERIFIKASI.',
        confirmButtonText: 'Verifikasi Peserta',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        customClass: 'sweet-alert',
        inputValidator: function (result) {
            return new Promise(function (resolve, reject) {
                if (result) {
                    resolve();
                } else {
                    reject('Anda harus mencentang persetujuan.');
                }
            })
        }
    }).then(function (result) {
        //$('#form-verifikasi').submit();
        document.getElementById("form-verifikasi").submit();
    });
});

$(document).on('click', '#btnTerima', function(e) {
    $("#btn").val("valid");
    e.preventDefault();
    swal({
        title: 'Konfirmasi',
        input: 'checkbox',
        inputValue: 0,
        inputPlaceholder: ' Dengan ini saya menyatakan bahwa Nama <br> {{ $peserta->nama_lengkap }} ({{$peserta->no_registrasi}}) <br> MEMENUHI SYARAT VERIFIKASI.',
        confirmButtonText: 'Verifikasi Peserta',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        customClass: 'sweet-alert',
        inputValidator: function (result) {
            return new Promise(function (resolve, reject) {
                if (result) {
                    resolve();
                } else {
                    reject('Anda harus mencentang persetujuan.');
                }
            })
        }
    }).then(function (result) {
        //$('#form-verifikasi').submit();
        document.getElementById("form-verifikasi").submit();
    });
});

@endif



</script>



@stop

