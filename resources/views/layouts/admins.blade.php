<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="fa" dir="rtl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<meta name="csrf-token" content="<?php echo csrf_token() ?>"/>
  <title>سازمان آرامستان شهرداری اراک - MongoDb</title>
  <link rel="icon" type="image/png" href="favicon.png"  />
    
 	<script src="{{asset('js/jquery-1.7.2.min.js')}}"></script>
	<script src="{{asset('js/func.js')}}"></script>
	<script src="{{asset('js/admin.js')}}"></script>
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/jalaali.js')}}"></script>
	<script src="{{asset('js/jquery.Bootstrap-PersianDateTimePicker.js')}}"></script>
	
			
	<!-- END PAGE LEVEL JAVASCRIPT -->
	

	
	
			
	 <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
		
			
		<!-- END PAGE LEVEL SCRIPTS -->
		<!-- Fonts Link -->


	
	
	<!--<script>
		  $(document).ready(function(){
			  var x = 2;
			   $('#bgImage').click( function(){
				   try{
				    	var src ="res/images/health-bg-"+x+".jpg";
			            $("#bgImage").attr("src", src);
			            if(x<19)
			            	x++;
			            else
			            	x=1;
				   }catch(e){
					   alert(e);
				   }
			    });
		  });
 	</script>-->
	
			
		
		
			
		<!-- END PAGE LEVEL SCRIPTS -->

</head>
	  <body>
    <div class="header">
        <div class="container">
                <div class="text-center"><img style="position:absolute; cursor:pointer;" onclick="postMenus('start/retActStat');" src="images/logoinverse.png"  class="img-responsive" alt="logo" /></div>
                <div class="text-left today">امروز :{{  $date }} </div>
				 <div  align="left"><br /><br />


				<ul class="nav" style="left:35px; position:absolute;">
				<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span style="color:#FF0000"> {{ session ('admin')['name'].' '.session ('admin')['family'] }} </span>خوش آمدید<span class="caret"></span></a>
            <ul class="dropdown-menu">
			  <li ><a href="#">تغییر رمز</a></li>
              <li ><a href="/logOut" >خروج</a></li>
           
            </ul>
            </li>
			</ul>
			</div>
				<br /><br />
				<br /><br />
				
			
        </div>
		
    </div>
	<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <nav class="navbar navbar-primary">
    <div class="container-fluid">
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            
			
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">متوفیان <span class="caret"></span></a>
            <ul class="dropdown-menu">
               <li onclick="postMenus('decedent');"><a href="#">ثبت متوفی جدید</a></li>
			   <li onclick="postMenus('decedent/decList');" ><a href="#">لیست متوفیان</a></li>
               
            </ul>
            </li>
            
			
			
	
			
        </ul>
        
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>
	    
	<div class="container"  id="AdminDiv">
	
	</div>
    
</div>
	
  <div class="footer">
    <div class="container-fluid">
      <p>کلیه حقوق این نرم افزار برای شرکت نارون محفوظ است</p>
    </div>
  </div>
  <script>
    $(function () {
      $('[data-toggle="popover"]').popover()
    })
  </script>
  <div id="bg"></div>
	<div id="wait" align="center" >
	<span style="background:#FFFF99; padding:3px">لطفا کمی صبر کنید</span>
	</div>
	<div id="alerts" align="center">
	<br />
	<span class="alerts" id="err_msg" ></span><br />
<div class="modal-footer" >
<button type="button" class="btn btn-primary" onclick="		
					$('#alerts').fadeOut(100,function(){
												$('#bg').fadeOut(200,function(){
												$('#err_msg').html('');
												$('#wait').fadeOut(100);
												}); 
												
												 });"  >&nbsp;&nbsp;&nbsp;&nbsp;< بسـتن > &nbsp;&nbsp;&nbsp;&nbsp;   </button><br />
	</div>
	</div>
	<div id="LayerDiv">
	
	</div>
  </body>
</html>
	
	



      