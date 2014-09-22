<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Dashboard - Real Estate</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		{{ HTML::style('css/bootstrap.min.css') }}
		
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		{{ HTML::style('css/dashboard.css') }}
		
	</head>
<body>
<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
      </button>
      {{ HTML::link('mine/'.Auth::user()->username, 'Control Panel', array('class' => 'navbar-brand')) }}
      </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
      	<li> {{ HTML::link('realestates', 'Real Estates')}}
        
        <li class="dropdown">
          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
            <i class="glyphicon glyphicon-user"></i> {{ Auth::user()->username }} <span class="caret"></span></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
            <li><a href="user">My Profile</a></li>
            <!--<li><a href="/logout"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>-->
            <li>{{ HTML::link('logout', 'Logout') }}</li>
            
          </ul>
        </li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container">
  
  <!-- upper section -->
  <div class="row">
	<div class="col-sm-3">
	      <!-- left -->
	      <h3><i class="glyphicon glyphicon-briefcase"></i> Toolbox</h3>
	      <hr>
	      
	      <ul class="nav nav-stacked">
	      
	        <li>{{HTML::decode(HTML::link('mine/'.Auth::user()->username.'/realestates','<i class="glyphicon glyphicon-flash"></i>My Real Estates'))}}</li>
	        <li><a href="javascript:;"><i class="glyphicon glyphicon-list-alt"></i> My Details</a></li>
	        <li><a href="javascript:;"><i class="glyphicon glyphicon-link"></i> Messages</a></li>
	        
	        <li><a href="javascript:;"><i class="glyphicon glyphicon-book"></i> Books</a></li>
	        <li><a href="javascript:;"><i class="glyphicon glyphicon-briefcase"></i> Tools</a></li>
	        <li><a href="javascript:;"><i class="glyphicon glyphicon-time"></i> Real-time</a></li>
	        <li><a href="javascript:;"><i class="glyphicon glyphicon-plus"></i> Advanced..</a></li>
	      </ul>
      
      	 	<hr>
	</div><!-- /span-3 -->
    	<div class="col-sm-9">
      	
      <!-- column 2 -->	
	       @yield('content')
	            
	      

	       
  	</div><!--/col-span-9-->
    
  </div><!--/row-->

</div><!--/container-->
<!-- /Main -->


<footer class="text-center"><a href="#"><strong>Terms and Condictions</strong></a></footer>

	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		{{ HTML::script('js/bootstrap.min.js') }}
		
	</body>
</html>