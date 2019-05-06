<?php

namespace App\Http\Controllers;
use App\Tag;
use Session;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.posts.index')->with(['posts'=>Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        if($categories->count()== 0 || $tags->count()==0)
        {
            Session::flash('info','You Have to Create Category or tags  First');
            return redirect()->back();
        }
        return view('admin.posts.create')->with(['categories'=>$categories,'tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:255',
            'featured'=>'required|image',
            'contents'=>'required',
            'tag'=>'required'
        ]);
        $featured=$request->featured;
        $featured_new_name=time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);
        $post=Post::create([
            'title'=> $request->title,
            'contents'=>$request->contents,
            'featured'=>'uploads/posts/'.$featured_new_name,
            'category_id'=>$request->category_id,
            'slug'=>str_slug($request->title)

        ]);
        $post->tags()->attach($request->tag);
        Session::flash('success','Post has been Successfully Stored');
        return redirect()->route('post.index');
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
        return view('admin.posts.edit')->with(['post'=>Post::find($id),'categories'=>Category::all(),'tags'=>Tag::all()]);
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
        $post=Post::find($id);
        $this->validate($request,[
            'title'=>'required|max:255',
            'contents'=>'required',
            'tag'=>'required'
        ]);
        if($request->hasFile('featured'))
        {
            $featured=$request->featured;
            $featured_new_name=time().$featured->getClientOriginalName();
            $featured->move('uploads/posts',$featured_new_name);
            $post->featured='uploads/posts/'.$featured_new_name;

        }
        $post->title=$request->title;
        $post->contents=$request->contents;
        $post->category_id=$request->category_id;
        $post->tags()->sync($request->tag);
        $post->save();

        Session::flash('success','Successfull Updated');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        Session::flash('success','post is deleted successfully');
        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function trash()
    {
        return view('admin.posts.trash')->with(['posts'=>Post::onlyTrashed()->get()]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function kill($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('info','Post deleted Permanently');
        return redirect()->back();

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Post deleted is restored');
        return redirect()->route('post.index');

    }
}
