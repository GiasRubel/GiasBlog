<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\catagory;

class catagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        return $this->middleware('auth:admin');
    }


    public function index()
    {
        $items = catagory::orderBy('id','desc')->paginate(5);
        $page = Input::get('page');
        return view('admin.catagory',compact('items','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createcatagory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $catagory = new catagory();

        $this->validate($request,[
            'name' => 'required|unique:catagories,name',
            ]);

        $catagory->name = $request->name;

        $catagory->save();
        session()->flash('massage','Data saved');
        return redirect('admin/catagory');
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
        $items = catagory::find($id);
        return view('admin.editcatagory',compact('items'));
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
        $catagory = catagory::find($id);

        $this->validate($request,[
            'name' => 'required',
            ]);

        $catagory->name = $request->name;

        $catagory->save();
        session()->flash('massage','Data updated');
        return redirect('admin/catagory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catagory = catagory::find($id);
        $catagory->delete();

        session()->flash('massage','Data Deleted');
        return redirect('admin/catagory');
    }
}
