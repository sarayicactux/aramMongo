<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="<?php echo csrf_token() ?>"/>
    <title>سازمان آرامستان شهرداری اراک - MongoDb - ورود </title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
	<script src="{{asset('js/jquery-1.7.2.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/admin.js')}}"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  </head>
<body>
    <div class="container-fluid relative100">
        <div class="row relative100">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-lg-offset-1 relative100">
                <div class="panel panel-default panel-login relative100">
                    <div class="panel-body">
                        <img src="{{asset('/images/logoinverse.png')}}" alt="logo" class="img-responsive" />
                        <h3 class="text-center">ورود به سیستم</h3>
                        <hr />
						<form method="post" id="mem_log_form">
                        <div class="form-group">
                            <label for="username">نام کاربری</label>
                            <input type="text" class="form-control ltr" id="username">
                        </div>
                        <div class="form-group">
                            <label for="password">گذرواژه</label>
                            <input type="password" class="form-control ltr" id="password">
							<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                        </div>
                        <input type="submit" class="btn btn-success btn-block" value="ورود"   id="admin_log"/>
						</form>
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div id="bg"></div>
	<div id="wait" align="center" >
	<span style="background:#FFFF99; padding:3px">لطفا کمی صبر کنید</span>
	</div>
	<div id="alerts" align="center">
	<br />
	<span class="alerts" id="err_msg" ></span><br />
<div ><input type="button" class="button" value="بستن"  onclick="$('#alerts').fadeOut(100,function(){
												$('#bg').fadeOut(200,function(){
												$('#err_msg').html('');
												}); 
												
												 });">
<br />
	</div>
	</div>
	<style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);
@charset "utf-8";

#wait {
display:none; position:fixed;  text-align:center; font-family:ns; z-index:4005; font-size:14px; top:50px; width:10%; right:42%;
}
.alert{font-size: 13px;padding: 4px 15px !important;}
#bg {
		width:100%;
		height:100%;
		background:#F4F4F4 ;
		filter: alpha(opacity=5);
		-moz-opacity: 0.5;
		-khtml-opacity: 0.5;
		opacity: 0.5;
		position:fixed;
		z-index:4000;
		top:0px;
		display:none;
		cursor:wait;
}
.alerts {
		font-family:ns,tahoma;
		color:#FF0000;
		font-size:16px;
}
#alerts {
		width:30%;
		top:30%;
		left:35%;
		position:fixed;
		z-index:4003;
		background:#FFFFFF;
		border: 2px solid #0099FF;
        border-radius: 5px 5px 5px 5px;
		-moz-box-shadow: 0px 0px 10px 4px #000;
		-webkit-box-shadow: 0px 0px 10px 4px #000;
		 box-shadow: 0px 0px 10px 4px #000;
		  /* For IE 8 */
		-ms-filter: "progid:DX../imageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#000000')";
		  /* For IE 5.5 - 7 */
		filter: progid:DX../imageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#000000');
		display:none;
}
.button{
	width: 260px;
	height: 35px;
	background: #00CCFF;
	border: 1px solid #3C3C3C;
	cursor: pointer;
	border-radius: 2px;
	color: #666666;
	font-family: 'ns';
	font-size: 14px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}
    </style>
</body>
</html>