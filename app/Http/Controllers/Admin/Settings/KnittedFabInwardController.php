<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;  
use App\Model\KnittedFabInward;
use App\Model\Fabric;
use App\Model\Colour;
use App\Model\Stockpoint;
use App\Http\Controllers\Controller;
use DB;
class KnittedFabInwardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    private  function getmax()
    {
        KnittedFabInward::max('inward_number');
    }
    public function index()
    {
        $rsdepartmentData['data'] = KnittedFabInward::getsupplier();
        
         $rsfabrics = DB::table('fabrics')        
                ->leftJoin('fabricgroup', 'fabrics.fabricgroup_code', '=', 'fabricgroup.id')
                ->select('fabrics.id','fabrics.name as fabricname', 'fabricgroup.name as fabricgroupname')
                ->orderBy('fabricgroup.name', 'asc')
                ->orderBy('fabrics.name', 'asc')
                ->get(); 
        
        $rsdepartmentData['colour'] = Colour::getall(); 
        $rsdepartmentData['rsstockpoint'] = Stockpoint::getall(); 
        $rsdepartmentData['inwardno'] = KnittedFabInward::max('inward_number');;            
        return view('knitted.autocomplete',compact(['rsdepartmentData','rsfabrics']));

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

    public function fetchrack(Request $request)
    {      
        $data = DB::table('stockpoints')->get();
        $output ='';
        foreach($data as $row)
        {
            $output .='<option value='.$row->id.'>'.$row->name.'</option>';
        }         
         echo $output;      
    }
    public function fetchcolour()
    {    
        echo 's';  
        $data = DB::table('colours')->get();
        $output ='';
        foreach($data as $row)
        {
            $output .='<option value='.$row->id.'>'.$row->name.'</option>';
        }         
         echo $output;      
    }
    public function fetchfabric(Request $request){
     
        $rsfabrics = DB::table('fabrics')        
        ->leftJoin('fabricgroup', 'fabrics.fabricgroup_code', '=', 'fabricgroup.id')
        ->select('fabrics.id','fabrics.name as fabricname', 'fabricgroup.name as fabricgroupname')
        ->orderBy('fabricgroup.name', 'asc')
        ->orderBy('fabrics.name', 'asc')
        ->get(); 

        $output ='';
        $previousCountry = null; 
        foreach($rsfabrics  as $courseCategory) 
        {
            if ($previousCountry != $courseCategory->fabricgroupname) 
              {
                $output .= "<optgroup label='$courseCategory->fabricgroupname'>";
              } 
        
            $output .="<option value='$courseCategory->id'>$courseCategory->fabricname</option>";
            $previousCountry = $courseCategory->fabricgroupname;            
            if ($previousCountry != $courseCategory->fabricgroupname) 
            {
                $output .= "</optgroup>";
            }                                             
        } 
       echo $output;      
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
