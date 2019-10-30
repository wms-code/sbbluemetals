<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use App\Model\KnittedFabInward;
use App\Http\Controllers\Controller;
use DB;
class KnittedFabInwardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$rsknittedfabricinward= KnittedFabInward::orderBy('name','asc')->paginate(5);
       // return view('knitted.list',compact('rsknittedfabricinward'));
       return view('knitted.autocomplete');

    }
    public function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('apps_countries')
        ->where('country_name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->country_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }


    public function searchResponse(Request $request){
        $query = $request->get('term','');
        $countries=\DB::table('colour');
        if($request->type=='countryname'){
            $countries->where('name','LIKE','%'.$query.'%');
        }
        if($request->type=='country_code'){
            $countries->where('name','LIKE','%'.$query.'%');
        }
           $countries=$countries->get();        
        $data=array();
        foreach ($countries as $country) {
                $data[]=array('name'=>$country->name,'sortname'=>$country->sortname);
        }
        if(count($data))
             return $data;
        else
            return ['name'=>'','sortname'=>''];
    }
    
    public function create()
    {
        return view('knitted.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\KnittedFabInward  $knittedFabInward
     * @return \Illuminate\Http\Response
     */
    public function show(KnittedFabInward $knittedFabInward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\KnittedFabInward  $knittedFabInward
     * @return \Illuminate\Http\Response
     */
    public function edit(KnittedFabInward $knittedFabInward)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\KnittedFabInward  $knittedFabInward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KnittedFabInward $knittedFabInward)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\KnittedFabInward  $knittedFabInward
     * @return \Illuminate\Http\Response
     */
    public function destroy(KnittedFabInward $knittedFabInward)
    {
        //
    }
}
