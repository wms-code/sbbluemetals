<?php
namespace App\Http\Controllers\Admin\Settings;
 
use App\Model\Colour;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class ColourController extends Controller
{
    public function index()
    {
        $colours= Colour::orderBy('name','asc')->paginate(5);
        return view('colours.list',compact('colours'));
     
    }

    public function create()
    {
        return view('colours.create');
         
    }
    public function store(Request $request)
    {        
        $request->validate([
            'name' => 'required|name|max:255|unique:colours',
        ]);        
        Colour::create($request->all());
          $msg = [
            'message' => 'Colour created successfully!' ];
          return  redirect('admin/colour')->with($msg);
     
    }

    public function edit(Colour $colour)
    {
       return  view('colours.edit',compact('colour'));
    }

    public function update(Request $request)
    {
        Colour::where('id', $request->id)->update(['name'=>$request->name ]);       
        $msg =['message' => 'Colour Updated successfully!'];
        return  redirect('admin/colour')->with($msg);
    }

    public function destroy(Colour $colour)
    {
       // Colour::where('id', $colour->id)->delete();
       //  $colour->delete();
        $msg =['message' => 'Unable to Delete!',
        'type' => 'warning'];
        return  redirect('admin/colour')->with($msg);
    }
}
