@extends('layouts.admin')
@section('content')
    <hr>
    <div class="row">
        <div class="col-lg-8">
                     {!! Form::open(['action' => 'adminPostController@store' ,'files' => true]) !!}
                         <div class="form-group">
                              {!! Form::label("title","title:",['class' =>'control-label']) !!}
                              {!! Form::text("title",null,['class' =>'form-control','placeholder' => 'Enter Post Title']) !!}
                             @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span>@endif
                         </div>
                        <div class="form-group">
                            {!! Form::label("category","category:",['class' =>'control-label']) !!}
                            {!! Form::select("category_id",["" => "Select Category"]+$categories,null,['class' => 'form-control']) !!}
                            @if($errors->has('category_id')) <span class="error">{{$errors->first('category_id')}}</span>@endif
                        </div>
                        <div class="form-group">
                            {!! Form::label("photo_id","Photo:",['class' =>'control-label']) !!}
                            {!! Form::file("photo_id",null) !!}
                            @if($errors->has('photo_id')) <span class="error">{{$errors->first('photo_id')}}</span>@endif
                       </div>
                        <div class="form-group">
                            {!! Form::label("Body","Describtion:",['class' =>'control-label']) !!}
                            {!! Form::textarea("body",null,['class' =>'form-control']) !!}
                            @if($errors->has('body')) <span class="error">{{$errors->first('body')}}</span>@endif
                        </div>

                        <div class="form-group">
                          {!! Form::submit("Create Post",['class' =>'btn btn-primary']) !!}
                       </div>
        {!! Form::close() !!}
        </div>
    </div>
@stop