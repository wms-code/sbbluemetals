<?php

namespace App\Http\Controllers\Admin\Settings;
 
use App\Model\Count;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule; 
class CountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts= Count::orderBy('name','asc')->paginate(5);
        return view('counts.list',compact('counts'));
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('counts.create');
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
           'name' => 'required|name|max:255|unique:counts',
           ]);
    }
    public function store(Request $request)
    {
        //'email' => "unique:users,email,{$userId}"
        
        Count::add($request->all());
          $msg = [
            'message' => 'Count created successfully!' ];
          return  redirect('admin/count')->with($msg);
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Colours  $colours
     * @return \Illuminate\Http\Response
     */
    public function show(Count $counts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Colours  $colours
     * @return \Illuminate\Http\Response
     */
    public function edit(Count $count)
    {
        //return  $colour;
      //  return  view('colours', $colour);
      //echo 'test';
       //$colours=Colours::where('id',$colours);
       return  view('counts.edit',compact('count'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Colours  $colours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //return  $request;
        Count::where('id', $request->id)
        ->update(['name'=>$request->name ]);       
        $msg =['message' => 'Counts Updated successfully!'];
         return  redirect('admin/count')->with($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Colours  $colours
     * @return \Illuminate\Http\Response
     */
    public function destroy(Count $counts)
    {
       // Colour::where('id', $colour->id)->delete();
       //  $colour->delete();

        $msg =['message' => 'Unable to Delete!',
        'type' => 'warning'];

        return  redirect('admin/counts')->with($msg);
    }
}
