<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Real Estate Review</title>

    <!-- Bootstrap Core CSS -->
    {{ HTML::style('css/bootstrap.min.css') }}
  
     {{ HTML::style('css/styles.css') }}
    
    <!-- Custom CSS -->
   

    <!-- Custom Fonts -->
  {{ HTML::style('font-awesome-4.1.0/css/font-awesome.min.css') }}
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{ HTML::link('realestates', 'My Real Estate Review', array('class' => 'navbar-brand')) }}
               <div class="col-md-5 pull-right"> 
                {{ Form::open(array('url' => 'search')) }}
                    <div class="input-group"> 
                            {{ Form::text('search', '', array('placeholder' => 'Search by Street Name', 'class' => 'form-control')) }}
                            <span class="input-group-btn">
                                  {{ Form::submit('Search', array('class' => 'btn btn-default')) }}
                            </span>
                    </div>
                {{ Form::close() }}
                </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            
        </div>
        <!-- /.container -->
    </nav>
    <br><br><br>

   
    <!-- Page Content -->

    <!--Yield Content-->
    <br><br>
   <div class="container">
	<div class="row">
	       <div class="col-md-3">
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav ">
                                        <li>
                                            @if (Auth::check())
                                                  {{ Auth::user()->username }} / {{ HTML::link('logout', 'Logout')}}
                                                  {{ HTML::link('mine/'.Auth::user()->username, 'Profile') }}
                                            @else
                                                 {{ HTML::link('/', 'Login') }}
                                            @endif            
                                        </li>
                                </ul>
                           </div>     
                            <div class="clearfix"></div>

                             @yield('sidebar-left')
                            
                     </div>
                                        <!-- /.navbar-collapse -->
                                               
                    <div class="col-md-9">
                        @yield('content') 
                    </div>
            </div>
</div>
		

   

    
<div class="clearfix"></div>
    

    

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery Version 1.11.0 -->
    {{ HTML::script('js/jquery-1.11.0.js')}}
    

    <!-- Bootstrap Core JavaScript -->
    {{ HTML::script('js/bootstrap.min.js')}}
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    @yield('map')

</body>

</html>
