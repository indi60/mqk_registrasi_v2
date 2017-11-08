@extends('layouts.public')



@section('css')
<link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
<style type="text/css">
  

  /* ------------------------------------------------- */

  #tabs {
    overflow: hidden;
    width: 100%;
    margin: 0;
    padding: 0;
    list-style: none;
  }

  #tabs li {
    float: left;
    margin: 0 -15px 0 0;
  }

  #tabs a {
    float: left;
    position: relative;
    padding: 0 40px;
    height: 0;
    line-height: 30px;
    text-transform: uppercase;
    text-decoration: none;
    color: #fff;      
    border-right: 30px solid transparent;
    border-bottom: 30px solid #3D3D3D;
    border-bottom-color: #777\9;
    opacity: .3;
    filter: alpha(opacity=30);      
  }

  #tabs a:hover,
  #tabs a:focus {
    border-bottom-color: #2ac7e1;
    opacity: 1;
    filter: alpha(opacity=100);
  }

  #tabs a:focus {
    outline: 0;
  }

  #tabs #current {
    z-index: 3;
    border-bottom-color: #3d3d3d;
    opacity: 1;
    filter: alpha(opacity=100);      
  }

  /* ----------- */
  #content {
      background: #fff;
      border-top: 2px solid #3d3d3d;
      padding: 2em;
      /*height: 220px;*/
  }

  #content h2,
    #content h3,
    #content p {
      margin: 0 0 15px 0;
  }  

  /* Demo page only */
  #about {
      color: #999;
      text-align: center;
      font: 0.9em Arial, Helvetica;
  }

  #about a {
      color: #777;
  }   
</style>
@stop

@section('title', 'MQKN-2017')

@section('content')


<br>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Daftar Peserta MQKN 2017  </small></h5>
                
            </div>
            <div class="ibox-content">

              <div class="row" style="padding: 10px;">
                <div class="col-lg-2" style="padding-bottom: 10px;">
                  <p style="font-size: 1.2vw;font-weight: bold;"> Bidang Lomba - {{$list_peserta[0]->majelis->bidang_lomba_majelis->bidang_lomba}} </p> 

                  <p style="font-size: 1.2vw;font-weight: bold;"> Marhalah - {{$list_peserta[0]->majelis->marhalah_majelis->marhalah}}</p>
                  <p style="font-size: 1.2vw;font-weight: bold;"> Babak - {{$list_peserta[0]->majelis->babak->nama_babak}} </p>
                  
                </div>
                
                
              </div>


    <div class="table-responsive">
        


        
  <ul id="tabs">
      <li><a href="#" name="#tab1">Semua Peserta</a></li>
      <li><a href="#" name="#tab2">Putra</a></li>
      <li><a href="#" name="#tab3">Putri</a></li>
      
  </ul>

  <div id="content">
      <div id="tab1">
          @include('public.list_peserta_semua')   
      </div>
      <div id="tab2">
          @include('public.list_peserta_putra')   
      </div>
      <div id="tab3">
          @include('public.list_peserta_putri')   
      </div>
  </div>
  
  <p id="about">footer</p>


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

<script type="text/javascript">
      function resetTabs(){
        $("#content > div").hide(); //Hide all content
        $("#tabs a").attr("id",""); //Reset id's      
    }

    var myUrl = window.location.href; //get URL
    var myUrlTab = myUrl.substring(myUrl.indexOf("#")); // For localhost/tabs.html#tab2, myUrlTab = #tab2     
    var myUrlTabName = myUrlTab.substring(0,4); // For the above example, myUrlTabName = #tab

    (function(){
        $("#content > div").hide(); // Initially hide all content
        $("#tabs li:first a").attr("id","current"); // Activate first tab
        $("#content > div:first").fadeIn(); // Show first tab content
        
        $("#tabs a").on("click",function(e) {
            e.preventDefault();
            if ($(this).attr("id") == "current"){ //detection for current tab
             return       
            }
            else{             
            resetTabs();
            $(this).attr("id","current"); // Activate this
            $($(this).attr('name')).fadeIn(); // Show content for current tab
            }
        });

        for (i = 1; i <= $("#tabs li").length; i++) {
          if (myUrlTab == myUrlTabName + i) {
              resetTabs();
              $("a[name='"+myUrlTab+"']").attr("id","current"); // Activate url tab
              $(myUrlTab).fadeIn(); // Show url tab content        
          }
        }
    })()
</script>

@stop

