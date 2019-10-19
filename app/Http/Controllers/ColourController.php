<?php

namespace App\Http\Controllers;

use App\Colour;
use Illuminate\Http\Request;

class ColourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colours= ItemsGroup::orderBy('name','asc')->paginate(5);
        return view('colours.list',compact('colours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Colours::add($request->all());
        $msg = [
          'message' => 'Colour created successfully!' ];
        return  redirect('colour')->with($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Colour  $colour
     * @return \Illuminate\Http\Response
     */
    public function show(Colour $colour)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Colour  $colour
     * @return \Illuminate\Http\Response
     */
    public function edit(Colour $colour)
    {
        return  view('colours.edit', $colours);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Colour  $colour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Colours::where('id', $id)
                    ->update(['name'=>$request->name ]);       
        $msg =['message' => 'Colours Updated successfully!'];
       return  redirect('colours')->with($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Colour  $colour
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Colours::where('id', $id)->delete();
        $msg =['message' => 'Colour Deleted successfully!',
        'type' => 'warning'];
        return  redirect('colours')->with($msg);
    }
}
