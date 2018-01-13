@extends('layouts.admin')
@section('content')
     <table class="table table-bordered">
               <tbody>
               @if(count($posts) > 0)

                   <tr>
                      <th style="width: 10px">#</th>
                      <th>title</th>
                      <th>UserName</th>
                      <th>Category</th>
                      <th>Photo</th>
                      <th>role</th>
                      <th>Updated</th>
                   </tr>
                     @foreach($posts as $post)
                           <tr>
                              <td>{{$post->id}}</td>
                               <td><a href="/admin/posts/{{$post->id}}/edit">{{$post->title}}</a></td>
                              <td>{{$post->user->name}}</td>
                              <td>{{$post->category ? $post->category->name:"No category"}}</td>
                              <td>{{$post->photo->file ? $post->photo->file:""}}</td>
                              <td>{{$post->user->role->name}}</td>
                              <td>{{$post->updated_at->diffForHumans()}}</td>
                            </tr>
                     @endforeach
                   @endif
                </tbody>
          </table>
@stop