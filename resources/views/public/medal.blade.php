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
<h2>KLASEMEN</h2>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
          <caption class="text-center">
          MQKN 2017 BALEKAMBANG JEPARA</caption>
          <thead>
            <tr>
              <th style="text-align: center;">No</th>
              <th style="text-align: center;">Kafilah</th>
              <th style="text-align: center;">Emas</th>
              <th style="text-align: center;">Perak</th>
              <th style="text-align: center;">Perunggu</th>
              <th style="text-align: center;">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=1;
            foreach ($list_kafilah as $row): ?>
            
              <tr>
                <td>{{$no++}}</td>
                <td>{{$row->nama_kafilah}}</td>
                <td style="text-align: center;">{{$row->emas}}</td>
                <td style="text-align: center;">{{$row->perak}}</td>
                <td style="text-align: center;">{{ $row->perunggu }}</td>
                <td style="text-align: center;">{{ $row->total }}</td>
              </tr>
            
            <?php endforeach; ?>
            
          </tbody>
          <tfoot>
            <tr>
              <td colspan="6" class="text-center">SUMBER DATA: PUSAT INFORMASI MQK</td>
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
  //run instantly and then goes after (setTimeout interval)

$("html, body").animate({ scrollTop: $(document).height() }, 20000);

setTimeout(function() {
   $('html, body').animate({scrollTop:0}, 20000); 
},20000);


setInterval(function(){
     // 20000 - it will take 4 secound in total from the top of the page to the bottom
$("html, body").animate({ scrollTop: $(document).height() }, 20000);
setTimeout(function() {
   $('html, body').animate({scrollTop:0}, 20000); 
},20000);
    
},40000);


$('html, body').mouseover(function(e) {
$(this).stop(true);
      
    }).mouseout(function() {
         $(this).stop(false);
    });
    

</script>




@stop


