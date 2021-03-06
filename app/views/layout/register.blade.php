@extends('layout.landing')

@section('content')
<div class="panel panel-default">
                  <div class="panel-heading">
                          <div class="panel-title text-center">
                            <h2>Register</h2>
                          </div>
                    </div>      
                    <div class="panel-body">
                        {{ Form::open(array('url' =>'register')) }}
                        		@if($errors->any())
              				<div class="form-group has-error">
              				<a href="#" class="close" data-dismiss="alert">&times;</a>
              				{{ implode('', $errors->all('<li class="control-label">:message</li>')) }}
              				</div>
              			@endif
                            <div class="form-group"> 
                            {{ Form::text('username', Input::old('username'),  array('placeholder' => 'Username', 'class' =>'form-control')) }}
                            </div>
                             <div class="form-group"> 
                            {{ Form::text('email', Input::old('email'),  array('placeholder' => 'Email', 'class' =>'form-control')) }}
                            </div>
                            <div class="form-group"> 
                            {{ Form::password('password',  array('placeholder' => 'Password', 'class' =>'form-control')) }}
                            </div>
                            <div class="form-group"> 
                            {{ Form::password('samePassword',  array('placeholder' => 'Confirm Password', 'class' =>'form-control')) }}
                            </div>
                            {{ Form::submit('Login', array('class' => 'btn btn-lg btn-info btn-block') ) }}
                        {{ Form::close() }}

                    </div>
                    <div class="pull-left">
                      <p> {{ link_to_route('realestates.index', 'Continue without login') }}  </p>
                      </div>
                      <div class="pull-right">
                        <p>    {{ link_to_route('login', 'Login') }} </p>
                    </div>
                  
          </div>
          
          <br><br><br>
@stop