
<html>
<head>
	
<style>

body {
			
			font-family:'verdana';
		}
		.id-card-holder {
			width: 270px;
		    padding: 4px;
		    margin: 0 auto;
		    background-color: #1f1f1f;
		    border-radius: 5px;
		    position: relative;
		}
		.id-card-holder:after {
		    content: '';
		    width: 7px;
		    display: block;
		    background-color: #0a0a0a;
		    height: 100px;
		    position: absolute;
		    top: 105px;
		    border-radius: 0 5px 5px 0;
		}
		.id-card-holder:before {
		    content: '';
		    width: 7px;
		    display: block;
		    background-color: #0a0a0a;
		    height: 100px;
		    position: absolute;
		    top: 105px;
		    left: 268px;
		    border-radius: 5px 0 0 5px;
		}
		.id-card {
			
			background-color: #fff;
			padding: 10px;
			border-radius: 10px;
			text-align: center;
			box-shadow: 0 0 1.5px 0px #b9b9b9;
		}
		.id-card img {
			margin: 0 auto;
		}
		.header img {
			
		}
		.photo img {
			width: 100px;
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
		.qr-code img {
			width: 50px;
		}
		p {
			font-size: 5px;
			margin: 2px;
		}
		
		.id-card-tag-strip {
			width: 45px;
		    height: 40px;
		    background-color: #0950ef;
		    margin: 0 auto;
		    border-radius: 5px;
		    position: relative;
		    top: 9px;
		    z-index: 1;
		    border: 1px solid #0041ad;
		}
		.id-card-tag-strip:after {
			content: '';
		    display: block;
		    width: 100%;
		    height: 1px;
		    background-color: #c1c1c1;
		    position: relative;
		    top: 10px;
		}
		.id-card-tag {
			width: 0;
			height: 0;
			border-left: 100px solid transparent;
			border-right: 100px solid transparent;
			border-top: 100px solid #0958db;
			margin: -10px auto -30px auto;
		}
		.id-card-tag:after {
			content: '';
		    display: block;
		    width: 0;
		    height: 0;
		    border-left: 50px solid transparent;
		    border-right: 50px solid transparent;
		    border-top: 100px solid #d7d6d3;
		    margin: -10px auto -30px auto;
		    position: relative;
		    top: -130px;
		    left: -50px;
		}




	

</style>
</head>
<body>

<span id="widget" class="widget">
    <div class="id-card-holder">
		<div class="id-card">

			<div class="header"  style="height: 60px;text-align: center">
			
			<table align="" width="100%">
				<tr>
				<td align="left"><img src="{{ base_path() }}/public/images/kemenag.png" width="50px" /></td>
				
				<td align="right" style="padding-left: 130px;"><img src="{{ base_path() }}/public/images/mqk.png" width="70px" /></td>
				</tr>
			</table>
			
			</div>

			<div class="header">
				

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
			</div>
			<div class="photo" style="height: 100px;text-align: center">

			<table align="center">
				<tr>
				<td align="center"><img src="{{ base_path() }}/public/photo/{{ $peserta->foto }}" /></td>
				</tr>
			</table>

			
				
			</div>
			<p style="font-size: 20px"> {{$peserta->nama_lengkap}} </p>
			
			<div class="qr-code" style="text-align: center;">
			<table align="center">
			<tr>
			<td align="center">
				<?php 
                echo DNS2D::getBarcodeHTML($peserta->no_peserta, "QRCODE",3,3);
                ?>
            </td>
            </tr>
            </table>    
			</div>
			<p style="font-size: 20px">
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
			<hr>
			<p><strong>"PENGG"</strong>HOUSE,4th Floor, TC 11/729(4), Division Office Road <p>
			<p>Near PMG Junction, Thiruvananthapuram Kerala, India <strong>695033</strong></p>
			<p>Ph: 9446062493 | E-ail: info@onetikk.info</p>

		</div>
	</div>
  <!-- ngRepeat: field in getChildren(field) -->
</span>
<br/>

</body>
</html>
