<?php

namespace App\Http\Controllers\Admin\Settings;
 
use App\Model\Count;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class CountController extends Controller
{
   
    public function index()
    {
        $counts= Count::orderBy('name','asc')->paginate(5);
        return view('counts.list',compact('counts'));     
    }

    public function create()
    {
        return view('counts.create');         
    }


    public function store(Request $request)
    {
        $request->validate([ 'name' => 'required|name|max:255|unique:counts', ]);
        Count::create($request->all());
        $msg = ['message' => 'Count created successfully!' ];
        return  redirect('admin/count')->with($msg);
     
    }

    public function edit(Count $count)
    {
       return  view('counts.edit',compact('count'));
    }

  
    public function update(Request $request)
    {
        Count::where('id', $request->id) ->update(['name'=>$request->name ]);       
        $msg =['message' => 'Counts Updated successfully!'];
        return  redirect('admin/count')->with($msg);
    }

    
    public function destroy(Count $counts)
    {   
        $msg =['message' => 'Unable to Delete!',
        'type' => 'warning'];
        return  redirect('admin/counts')->with($msg);
    }
}
