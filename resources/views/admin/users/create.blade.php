@extends("layouts.admin")

@section("content")
     <div class="row">
             <div class="col-lg-6">
                   <h1>Create User</h1>
               {!! Form::open(['action' => 'adminUsersController@store','files' => true]) !!}
                      <div class="form-group">
                         {!! Form::label("name","name",['class' =>'control-label']) !!}
                         {!! Form::text("name",null,['class' =>'form-control','placeholder' => 'Enter User name']) !!}
                          <span class="error">@if($errors->has('name')) {{$errors->first('name')}} @endif</span>
                     </div>
                     <div class="form-group">
                         {!! Form::label("email","email",['class' =>'control-label']) !!}
                         {!! Form::email("email",null,['class' =>'form-control','placeholder' => 'Enter User email']) !!}
                         <span class="error">@if($errors->has('email')) {{$errors->first('email')}} @endif</span>
                     </div>
                     <div class="form-group">
                         {!! Form::label("role_id","role id",['class' =>'control-label']) !!}
                         {!! Form::select("role_id",$roles,null,['class' =>'form-control']) !!}
                         <span class="error">@if($errors->has('role_id')) {{$errors->first('role_id')}} @endif</span>
                     </div>
                     <div class="form-group">
                         {!! Form::label("is_active","is_active",['class' =>'control-label']) !!}
                         {!! Form::select("is_active",[0 => 'Not Active',1 => 'active'],1,['class' =>'form-control']) !!}
                         <span class="error">@if($errors->has('status')) {{$errors->first('status')}} @endif</span>
                     </div>
                     <div class="form-group">
                         {!! Form::label("password","password:",['class' =>'control-label']) !!}
                         {!! Form::password("password",['class' =>'form-control','placeholder' => 'Enter User Password']) !!}
                         <span class="error">@if($errors->has('password')) {{$errors->first('password')}} @endif</span>
                     </div>
                     <div class="form-group">
                         {!! Form::label("file","file",['class' =>'control-label']) !!}
                         {!! Form::file("file") !!}
                         <span class="error">@if($errors->has('file')) {{$errors->first('file')}} @endif</span>
                     </div>
                     <div class="form-group">
                         {!! Form::submit("Add",['class' =>'btn btn-primary']) !!}
                     </div>
                 {!! Form::close() !!}
             </div>
     </div>
@stop
