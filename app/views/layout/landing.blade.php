<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Landing Page template</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<div class="container-full">
      <div class="text-center">
      <h1>My Real Estate Review</h1>
      </div>
      <div class="row vertical-offset-100">
       
        <div class="col-md-4 col-md-offset-4">
          
          
          <div class="panel panel-default">
                  <div class="panel-heading">
                          <div class="panel-title text-center">
                            <h2>Please sign in</h2>
                          </div>
                    </div>      
                    <div class="panel-body">
                        {{ Form::open(array('url' =>'/')) }}
                            <div class="form-group"> 
                            {{ Form::text('username', '',  array('placeholder' => 'Username', 'class' =>'form-control')) }}
                            </div>
                            <div class="form-group"> 
                            {{ Form::password('password',  array('placeholder' => 'Password', 'class' =>'form-control')) }}
                            </div>
                            {{ Form::submit('Login', array('class' => 'btn btn-lg btn-info btn-block') ) }}
                        {{ Form::close() }}

                    </div>
                    <div class="pull-left">
                      <p> {{ HTML::link('realestates', 'Continue without login') }}  </p>
                      </div>
                      <div class="pull-right">
                        <p>    {{ HTML::link('register', 'Register') }} </p>
                    </div>
                  
          </div>
          
          <br><br><br>
          
        
        </div>
        
      </div> <!-- /row -->
  
  	  
  
  	<br><br><br><br><br>

</div> <!-- /container full -->

<div class="container">
  
  	<hr>
  
  	<div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading"><h3>Helping Tenants.</h3></div>
            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
            Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
            dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
            Aliquam in felis sit amet augue.
            </div>
          </div>
        </div>
      	<div class="col-md-4">
        	<div class="panel panel-default">
            <div class="panel-heading"><h3>Helping Realestate.</h3></div>
            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
            Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
            dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
            Aliquam in felis sit amet augue.
            </div>
          </div>
        </div>
      	<div class="col-md-4">
        	<div class="panel panel-default">
            <div class="panel-heading"><h3>Learn about the market.</h3></div>
            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
            Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
            dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
            Aliquam in felis sit amet augue.
            </div>
          </div>
        </div>
    </div>
  
	<div class="row">
        <div class="col-lg-12">
        <br><br>
          <p class="pull-right"><a href="http://www.bootply.com">Template from Bootply</a> &nbsp; ©Copyright 2013 ACME<sup>TM</sup> Brand.</p>
        <br><br>
        </div>
    </div>
</div>


	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>