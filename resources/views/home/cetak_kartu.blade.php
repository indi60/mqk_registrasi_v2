
<html>
<head>
	
<style>

body {
			
			font-family:'arial, verdana';
		}
		.id-card-holder {
			width: 380px;
		    padding: 4px;
		    margin: 0 auto;
		    
		    
		    position: relative;
		}
		
		.id-card {
			
			background-color: #fff;
			padding: 10px;
			border-radius: 10px;
			text-align: center;
		}
		.id-card img {
			margin: 0 auto;
		}
		.header img {
			
		}
		.photo img {
			height: 150px;
    		margin-top: 15px;
		}
		h2 {
			font-size: 15px;
			margin: 5px 0;
		}
		h3 {
			font-size: 12px;
			margin: 2.5px 0;
			font-weight: 300;
		}
		/*.qr-code img {
			width: 50px;
		}*/
		p {
			font-size: 5px;
			margin: 2px;
		}

		.centered-and-cropped { object-fit: cover }


		




	

</style>
</head>
<body style="text-transform: uppercase;font-family: 'arial';">

<span id="widget" class="widget">
    <div class="id-card-holder">
		<div class="id-card">

			<!-- <div class="header">
				

				 <p style="font-size: 13px;">MUSABAQAH QIRA'ATUL KUTUB <br> NASIONAL KE-VI</p> 

				<hr>				
				<p style="font-size: 20px;font-weight: bold;">
					@if($peserta->jenis_peserta == 'peserta')
	                PESERTA
	                @elseif($peserta->jenis_peserta == 'panitia')
	                PANITIA
	                @elseif($peserta->jenis_peserta == 'vip')
	                TAMU VIP
	                @elseif($peserta->jenis_peserta == 'lainnya')
	                PESERTA LAIN
	                @elseif($peserta->jenis_peserta == 'bazar')
	                PJ BAZAR
	                @elseif($peserta->jenis_peserta == 'pentas_seni')
	                PJ PENTAS SENI
	                @elseif($peserta->jenis_peserta == 'panitera')
	                PANITERA
	                @elseif($peserta->jenis_peserta == 'dewan_hakim')
	                DEWAN HAKIM
	                @endif

				</p>
				<hr>				
			</div> -->
			<div class="photo" id="crop" align="center" style="margin-top: 2.2cm;margin-bottom: 15px">

				

				<!-- <img class="centered-and-cropped" width="150" height="150" src="{{ base_path() }}/public/photo/{{ $peserta->foto }}" /> -->
				<img class="centered-and-cropped" width="150" height="150" src="{{asset('photo/'.$peserta->foto)}}" />
			

			
				
			</div>
			<p style="font-size: 20px;margin-bottom: 3px;"> {{$peserta->nama_lengkap}} </p>
			@if($peserta->jenis_peserta == 'peserta')
			<p style="font-size: 15px;margin-bottom: 3px;">{{$peserta->kafilah->nama_kafilah}}</p>
			<p style="font-size: 15px;margin-bottom: 15px;">{{$peserta->bidang_lomba_peserta->bidang_lomba}} - {{$peserta->marhalah_peserta->marhalah}} </p>
			@elseif($peserta->jenis_peserta == 'panitera')
			<p style="font-size: 15px;margin-bottom: 3px;">PANITERA</p>
			<p style="font-size: 15px;margin-bottom: 15px;">PUSAT </p>
			@elseif($peserta->jenis_peserta == 'panitera')
			<p style="font-size: 15px;margin-bottom: 3px;">DEWAN HAKIM</p>
			<p style="font-size: 15px;margin-bottom: 15px;">PUSAT </p>
			@elseif($peserta->jenis_peserta == 'panitia' && $peserta->kafilah_id==0)
			<p style="font-size: 15px;margin-bottom: 3px;">PANITIA</p>
			<p style="font-size: 15px;margin-bottom: 15px;">PUSAT </p>
			@elseif($peserta->jenis_peserta == 'panitia' && $peserta->kafilah_id!=0)
			<p style="font-size: 15px;margin-bottom: 3px;">{{$peserta->kafilah->nama_kafilah}}</p>
			<p style="font-size: 15px;margin-bottom: 15px;">PANITIA / PEMBINA </p>
			@elseif($peserta->jenis_peserta == 'vip')
			<p style="font-size: 15px;margin-bottom: 3px;">{{$peserta->kafilah->nama_kafilah}}</p>
			<p style="font-size: 15px;margin-bottom: 15px;">VIP</p>
			@elseif($peserta->jenis_peserta == 'lainnya')
			<p style="font-size: 15px;margin-bottom: 3px;">{{$peserta->kafilah->nama_kafilah}}</p>
			<p style="font-size: 15px;margin-bottom: 15px;">PESERTA LAIN-LAIN</p>
			@endif
			
			<div class="qr-code" style="text-align: center;">
			<table align="center">
			<tr>
			<td align="center">

				@if($peserta->jenis_peserta == 'peserta')
				<img width="75px" height="75px" src="data:image/png;base64,{{DNS2D::getBarcodePNG($peserta->no_peserta."\n".$peserta->nama_lengkap."\n".$peserta->kafilah->nama_kafilah."\n".$peserta->bidang_lomba_peserta->bidang_lomba."\n".$peserta->marhalah_peserta->marhalah, 'QRCODE')}}" alt="barcode" />
				@elseif($peserta->jenis_peserta == 'panitera')
				<img width="75px" height="75px" src="data:image/png;base64,{{DNS2D::getBarcodePNG($peserta->no_peserta."\n".$peserta->nama_lengkap."\n".'PANITERA - PUSAT', 'QRCODE')}}" alt="barcode" />

				@elseif($peserta->jenis_peserta == 'dewan hakim')
				<img width="75px" height="75px" src="data:image/png;base64,{{DNS2D::getBarcodePNG($peserta->no_peserta."\n".$peserta->nama_lengkap."\n".'DEWAN HAKIM - PUSAT', 'QRCODE')}}" alt="barcode" />

				@elseif($peserta->jenis_peserta == 'panitia' && $peserta->kafilah_id==0)
				<img width="75px" height="75px" src="data:image/png;base64,{{DNS2D::getBarcodePNG($peserta->no_peserta."\n".$peserta->nama_lengkap."\n".'PANITIA PUSAT', 'QRCODE')}}" alt="barcode" />

				@elseif($peserta->jenis_peserta == 'panitia' && $peserta->kafilah_id!=0)
				<img width="75px" height="75px" src="data:image/png;base64,{{DNS2D::getBarcodePNG($peserta->no_peserta."\n".$peserta->nama_lengkap."\n".'PANITIA'."\n".$peserta->kafilah->nama_kafilah, 'QRCODE')}}" alt="barcode" />

				@elseif($peserta->jenis_peserta == 'vip' )
				<img width="75px" height="75px" src="data:image/png;base64,{{DNS2D::getBarcodePNG($peserta->no_peserta."\n".$peserta->nama_lengkap."\n".'VIP'."\n".$peserta->kafilah->nama_kafilah, 'QRCODE')}}" alt="barcode" />

				@elseif($peserta->jenis_peserta == 'lainnya')
				<img width="75px" height="75px" src="data:image/png;base64,{{DNS2D::getBarcodePNG($peserta->no_peserta."\n".$peserta->nama_lengkap."\n".'PESERTA LAIN-LAIN'."\n".$peserta->kafilah->nama_kafilah, 'QRCODE')}}" alt="barcode" />


				@endif


				<?php 
                //echo DNS2D::getBarcodeHTML($peserta->no_peserta, "QRCODE",4,4);
                ?>
            </td>
            </tr>
            </table>    
			</div>
			<p style="font-size: 15px">
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
			</p>
			<!-- <hr>
			<p> -->
				<!-- <strong>"PENGG"</strong>HOUSE,4th Floor, TC 11/729(4), Division Office Road <p>
			<p>Near PMG Junction, Thiruvananthapuram Kerala, India <strong>695033</strong></p>
			<p>Ph: 9446062493 | E-ail: info@onetikk.info</p> -->

		</div>
	</div>
  <!-- ngRepeat: field in getChildren(field) -->
</span>
<br/>

<script type="text/javascript">
<!--
// window.print();
//-->
</script>

</body>
</html>
