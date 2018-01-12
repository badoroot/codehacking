@extends("layouts.admin")

@section("content")
    <div class="row">
        <div class="col-lg-3">
            <img  class="img-responsive" src="{{ $user->photo_id  ? $user->photo->file:"/img/avatar.png" }}" alt="">
        </div>
        <div class="col-lg-9">
            <h1>Edit User</h1>
            {!! Form::open(['action' => ['adminUsersController@update',$user->id],'method' => 'PUT','files' => true]) !!}
            <div class="form-group">
                {!! Form::label("name","name",['class' =>'control-label']) !!}
                {!! Form::text("name",$user->name,['class' =>'form-control','placeholder' => 'Enter User name']) !!}
                <span class="error">@if($errors->has('name')) {{$errors->first('name')}} @endif</span>
            </div>
            <div class="form-group">
                {!! Form::label("email","email",['class' =>'control-label']) !!}
                {!! Form::email("email",$user->email,['class' =>'form-control','placeholder' => 'Enter User email']) !!}
                <span class="error">@if($errors->has('email')) {{$errors->first('email')}} @endif</span>
            </div>
            <div class="form-group">
                {!! Form::label("role_id","role id",['class' =>'control-label']) !!}
                {!! Form::select("role_id",$roles,$user->role_id,['class' =>'form-control']) !!}
                <span class="error">@if($errors->has('role_id')) {{$errors->first('role_id')}} @endif</span>
            </div>
            <div class="form-group">
                {!! Form::label("is_active","is_active",['class' =>'control-label']) !!}
                {!! Form::select("is_active",[0 => 'Not Active',1 => 'active'],$user->is_active,['class' =>'form-control']) !!}
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
                {!! Form::submit("Update User",['class' =>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}


            {!! Form::open(['action' => ['adminUsersController@destroy',$user->id] ,'method' =>'DELETE']) !!}
            <div class="form-group">
                {!! Form::submit("Delete User",['class' =>'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}
    </div>
    </div>
@stop
