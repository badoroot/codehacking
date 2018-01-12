@extends('layouts.admin')
@section('content')
    <h1>users</h1>
    <div class="col-lg-12">
        @if(session("UpdateInsertStatus"))
            <div class="alert alert-success">
                <strong>Success!</strong> {{session("UpdateInsertStatus")}}.
            </div>
        @endif
    </div>
     <table class="table table-bordered">
          <tbody>
            @if(count($users) > 0)
              <tr>
                  <th style="width: 10px">#</th>
                  <th>name</th>
                  <th>email</th>
                  <th>Role</th>
                  <th>active</th>
                  <th>photo</th>
                  <th>Created</th>
                  <th>Updated</th>
              </tr>
                @foreach($users as $user)
              <tr>
                  <td>{{$user->id}}</td>
                  <td><a href="/admin/users/{{$user->id}}/edit">{{$user->name}}</a></td>
                  <td> {{$user->email}}</td>
                  <td> {{$user->role->name}}</td>
                  <td>{{$user->is_active == 1 ? "active":"not active"}}</td>
                  <td><img width="80" src="{{ $user->photo_id  ? $user->photo->file:"/img/avatar.png" }}" alt=""></td>
                  <td> {{$user->created_at->diffForHumans()}}</td>
                  <td> {{$user->updated_at->diffForHumans()}}</td>
               </tr>
                @endforeach
            @endif
           </tbody>
     </table>
@stop