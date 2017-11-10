<!DOCTYPE html>
<html>
<head>
	<title> MQKN 2017</title>
	        <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
	<style type="text/css">

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
	    -webkit-filter: blur(5px);
	    z-index: 0;
	}

	
		

		.title{
		  font-size: 48px;
		  text-align: center;
		  color: #fff;
		  margin: 60px 0 0 0;
		}
		nav ul {
		  min-width: 600px;
		  position: relative;
		  display: table;
		  margin: 50px auto;
		  clear: both;
		}

		nav ul li {
		  list-style: none;
		  float: left;
		}

		nav ul li a {
		    width: 200px;
		    height: 200px;
		    float: left;
		    margin: 0 10px;
		  -webkit-perspective: 600px;
		     -moz-perspective: 600px;
		      -ms-perspective: 600px;
		          perspective: 600px;
		}

		nav ul li .front {
		  text-align: center;
		  -webkit-transform: rotateX(0deg) rotateY(0deg);
		     -moz-transform: rotateX(0deg) rotateY(0deg);
		      -ms-transform: rotateX(0deg) rotateY(0deg);
		       -o-transform: rotateX(0deg) rotateY(0deg);
		  -webkit-transition: all 0.5s ease-in-out;
		     -moz-transition: all 0.5s ease-in-out;
		      -ms-transition: all 0.5s ease-in-out;
		       -o-transition: all 0.5s ease-in-out;
		          transition: all 0.5s ease-in-out;
		  -webkit-backface-visibility: hidden;
		     -moz-backface-visibility: hidden;
		      -ms-backface-visibility: hidden;
		       -o-backface-visibility: hidden;
		          backface-visibility: hidden;
		  -webkit-transform-style: preserve-3d;
		     -moz-transform-style: preserve-3d;
		       -o-transform-style: preserve-3d;
		          transform-style: preserve-3d;
		}

		nav ul li:hover .front {
		  -webkit-transform: rotateX(0deg) rotateY(180deg);
		     -moz-transform: rotateX(0deg) rotateY(180deg);
		      -ms-transform: rotateX(0deg) rotateY(180deg);
		       -o-transform: rotateX(0deg) rotateY(180deg);
		}

		nav ul li .back {
		  position: absolute;
		  top: 0;
		  width: inherit;
		  height: inherit;
		  text-align: center;
		  z-index: -1;
		  -webkit-transform: rotateX(0deg) rotateY(-180deg);
		     -moz-transform: rotateX(0deg) rotateY(-180deg);
		      -ms-transform: rotateX(0deg) rotateY(-180deg);
		       -o-transform: rotateX(0deg) rotateY(-180deg);
		  -webkit-transition: all 0.5s ease-in-out;
		     -moz-transition: all 0.5s ease-in-out;
		      -ms-transition: all 0.5s ease-in-out;
		       -o-transition: all 0.5s ease-in-out;
		          transition: all 0.5s ease-in-out;
		  -webkit-backface-visibility: hidden;
		     -moz-backface-visibility: hidden;
		      -ms-backface-visibility: hidden;
		       -o-backface-visibility: hidden;
		          backface-visibility: hidden;
		  -webkit-transform-style: preserve-3d;
		     -moz-transform-style: preserve-3d;
		       -o-transform-style: preserve-3d;
		          transform-style: preserve-3d;
		}

		nav ul li:hover .back {
		  z-index: 1;
		  -webkit-transform: rotateX(0deg) rotateY(0deg);
		     -moz-transform: rotateX(0deg) rotateY(0deg);
		      -ms-transform: rotateX(0deg) rotateY(0deg);
		       -o-transform: rotateX(0deg) rotateY(0deg);
		}

		nav ul li i {
		  line-height: 200px !important;
		  color: white;
		  vertical-align: middle !important;
		}

		nav ul li span {
		  font-family: 'Roboto';
		  font-size: 20px;
		  font-weight: 300;
		  line-height: 200px;
		  color: white;
		  text-transform: lowercase;
		  vertical-align: middle;
		}

		nav ul li.color-1 .front,
		nav ul li.color-1 .back {
		  background-color: #e6567a;
		}

		nav ul li.color-2 .front,
		nav ul li.color-2 .back {
		  background-color: #00c0e4;
		}

		nav ul li.color-3 .front,
		nav ul li.color-3 .back {
		  background-color: #5bd999;
		}

		nav ul li.color-4 .front,
		nav ul li.color-4 .back {
		  background-color: #7658f4;
		}

		nav ul li.color-5 .front,
		nav ul li.color-5 .back {
		  background-color: #eac14d;
		}
		p{text-align: center; color: #333; font-size: 18px;}
	</style>
</head>
<body style="background-image: url({{url('/images/mqk_background.jpg')}});">

<div class="title">MQKN 2017 BALEKAMBANG <BR> JEPARA</div>
<nav>
    <ul class="panel2">
        <li class="color-1"> <a href="{{url('majelis')}}">
                <div class="front">
                    <i class="fa fa-home fa-5x"></i>
                </div>
                <div class="back">
                    <span>MAJELIS</span>
                </div>
            </a>

        </li>
        <li class="color-2"> <a href="{{url('leaderboard')}}">
                <div class="front">
                    <i class="fa fa-list-ol fa-5x"></i>
                </div>
                <div class="back">
                    <span>EKSPOS NILAI</span>
                </div>
            </a>

        </li>
        <li class="color-3"> <a href="{{url('medal')}}">
                <div class="front">
                    <i class="fa fa-trophy fa-5x"></i>
                </div>
                <div class="back">
                    <span>KLASEMEN</span>
                </div>
            </a>

        </li>
       
        <li class="color-5"> <a href="{{url('/')}}">
                <div class="front">
                    <i class="fa fa-sign-in fa-5x"></i>
                </div>
                <div class="back">
                    <span>LOGIN</span>
                </div>
            </a>

        </li>
    </ul>
</nav>

</body>
</html>