<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCreateRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::where('published_at', '<', Carbon::now())->latest()->paginate(6);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCreateRequest $request)
    {
        //表单验证
//        $request->validate([
//            'title' => 'required|min:5|max:20',
//            'body'  =>  'required|min:30',
//            'published_at' => 'required|date',
////            'email' => 'required|unique' //邮箱唯一
//        ]);

        //
//        dd($request->all());
        $datas = $request->all();

        $datas['author_id'] = Auth::id();
//        dd(Post::create($datas));
        Post::create($datas);
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //1、
//        $post = Post::find($id);
//        if (!$post){
//            abort(404);
//        }
        //2、
//        $post = Post::findOrFail($id);

        //3、Post $post
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCreateRequest $request, Post $post)
    {
        $post->update($request->all());
        return redirect(url('posts', $post->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //用依赖注入的方式获取到文章
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect('posts');

    }
}
