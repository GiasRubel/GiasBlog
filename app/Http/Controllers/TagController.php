<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Tag;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Tag::orderBy('id','desc')->paginate(10);
        // $page = Input::get('page');
        return view('admin.tags',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = new Tag();
        $this->validate($request, [
            'name' => 'required|unique:tags,name|min:3',
            ]);
        $tag->name = $request->name;
        $tag->save();
        session()->flash('massage','Data saved');
        // return redirect('admin/tag');
        return redirect()->route('tag.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tags = Tag::find($id);
        
        return view('admin.singletag',compact('tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Tag::find($id);

        return view('admin.edittag',compact('item'));
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
        $tag  = Tag::find($id);
        $this->validate($request, [
            'name' => "required|unique:tags,name,$id|min:3",
            ]);
        $tag->name = $request->name;
        $tag->save();
        session()->flash('massage','Data Edited');
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);

        $tag->posts()->detach();

        $tag->delete();

        session()->flash('massage','Data Deleted');

        return redirect()->route('tag.index');
    }
}
