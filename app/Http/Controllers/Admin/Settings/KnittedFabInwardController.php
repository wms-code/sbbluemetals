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
        $rsdepartmentData['data'] = KnittedFabInward::getcolour();
          
       return view('knitted.autocomplete',compact('rsdepartmentData'));

    }


    public function fetcssh(Request $request)
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

    public function fetch(Request $request){
    //    $rsdepartmentData = KnittedFabInward::getcolour1();
       // echo $rsdepartmentData;
       // return response()->json(['results' => $rsdepartmentData]);
       //$query = $request->get('query');
       $data = DB::table('apps_countries')
        // ->where('country_name', 'LIKE', "%{$query}%")
         ->get();
       $output ='';// '<optopn class="dropdown-menu" style="display:block; position:relative">';
       foreach($data as $row)
       {
        $output .= '
        <option value='.$row->country_name.'>'.$row->country_name.'</option>
        ';
       }
     //  $output .= '</ul>';
       echo $output;
       //<option value='"+id+"'>"+name+"</option>"
     
      //  echo json_encode($rsdepartmentData);
        //exit;
          
    }
    public function fetch1(Request $request){
        $query = $request->get('term','');
        $countries=\DB::table('apps_countries');
       // if($request->type=='country_name'){
            $countries->where('country_name','LIKE','%'.$query.'%');
       // }
       // if($request->type=='country_code'){
       //     $countries->where('country_name','LIKE','%'.$query.'%');
       // }
           $countries=$countries->get();        
        $data=array();
        foreach ($countries as $country) {
                $data[]=array('name'=>$country->country_name,'sortname'=>$country->country_name);
        }
        return redirect()->back() ->with('alert',$data);
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
