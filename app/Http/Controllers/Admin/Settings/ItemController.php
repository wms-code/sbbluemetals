<?php
namespace App\Http\Controllers\Admin\Settings; 
use App\Model\Item;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $item= Item::orderBy('name','asc')->paginate(25);
        return view('item.list',compact('item'));
    }

    public function create()
    {
        return view('item.create');   
    }

    public function store(Request $request)
    {        
       // $request->validate([
        //    'name' => 'required|name|max:255|unique:colours' ]);        
        Item::create($request->all());
        $msg = [ 'message' => 'Item created successfully!' ];
        return  redirect('admin/item')->with($msg);
    }

    public function edit(Item $item)
    {
       return  view('item.edit',compact('item'));
    }

    public function update(Request $request)
    {
        Item::where('id', $request->id)->update(['name'=>$request->name,'tamil'=>$request->tamil ]);       
        $msg =['message' => 'Item Updated successfully!'];
        return  redirect('admin/item')->with($msg);
    }

    public function destroy(Item $item)
    {
       // Colour::where('id', $colour->id)->delete();
       //  $colour->delete();
        $msg =['message' => 'Unable to Delete!',
        'type' => 'warning'];
        return  redirect('admin/item')->with($msg);
    }
}
