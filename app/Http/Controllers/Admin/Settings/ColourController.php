<?php
namespace App\Http\Controllers\Admin\Settings;
 
use App\Model\Colour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule; 
class ColourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colours= Colour::orderBy('name','asc')->paginate(5);
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

    protected function validator(array $data)
    {
        return Validator::make($data, [
           'name' => 'required|name|max:255|unique:colours',
           ]);
    }
    public function store(Request $request)
    {
        //'email' => "unique:users,email,{$userId}"
        
        Colour::add($request->all());
          $msg = [
            'message' => 'Colour created successfully!' ];
          return  redirect('admin/colour')->with($msg);
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Colours  $colours
     * @return \Illuminate\Http\Response
     */
    public function show(Colours $colours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Colours  $colours
     * @return \Illuminate\Http\Response
     */
    public function edit(Colour $colour)
    {
        //return  $colour;
      //  return  view('colours', $colour);
      //echo 'test';
       //$colours=Colours::where('id',$colours);
       return  view('colours.edit',compact('colour'));
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
        Colour::where('id', $request->id)
        ->update(['name'=>$request->name ]);       
        $msg =['message' => 'Colour Updated successfully!'];
         return  redirect('admin/colour')->with($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Colours  $colours
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colour $colour)
    {
       // Colour::where('id', $colour->id)->delete();
       //  $colour->delete();

        $msg =['message' => 'Unable to Delete!',
        'type' => 'warning'];

        return  redirect('admin/colour')->with($msg);
    }
}
