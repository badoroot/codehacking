<?php

namespace App\Http\Controllers;
use App\post;
use App\photo;
use App\category;
use App\Http\Requests\postCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view("admin.posts.index",compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::pluck('name', 'id')->all();
        return view("admin.posts.create",compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(postCreateRequest $request)
    {
        $input  = $request->all();
        $user  = Auth::user();

        if($file = $request->file('photo_id')){
            $fileName = time().$file->getClientOriginalName();
            $file->move('img',$fileName);
            $photo = photo::create(["file" => $fileName]);
            $input['photo_id']    =  $photo->id;
        }


        $user->posts()->create($input);
        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::findOrfail($id);
        $categories = category::pluck('name', 'id')->all();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
            $photoFile = $post->photo->file;
            if($post->photo()->delete()){
                unlink(public_path($photoFile));
                $post->delete();
            }
            return redirect("admin/posts");
    }
}
