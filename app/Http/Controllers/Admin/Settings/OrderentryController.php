<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;  
use App\Model\Orderentry;
use App\Model\place;
use App\Model\item;
use App\Http\Controllers\Controller;
use DB;
class OrderentryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $rsdepartmentData['data'] = Orderentry::getall();
        return view('orderentry.list',compact(['rsdepartmentData']));
    }
    private  function getmax()
    {
        $str='000000';$stringlen=0;
        $retvalue=Orderentry::max('ordernumber');
        if ($retvalue === null)
        {
            $retvalue=1;
            $stringlen=1;
        }
        elseif ($retvalue >=1)
        {
            $stringlen=$retvalue;
            $retvalue=$retvalue+1;
        }
         $stringlen=strlen($retvalue);
        switch ($stringlen) {
            case 1:
            $str='00000';
                break;
            case 2:
            $str='0000';
                break;
            case 3:
            $str='000';
                break;
            case 4:
                $str='00';
                break;
            case 5:
                $str='0';
                break;  
            case 6:
                $str='';
                break;               
            default:
            $str='0';
        }
        $retvalue=$str.$retvalue.'/19-20';
        return $retvalue;
    }
    private  function getmaxinwardno()
    {
        $retvalue=Orderentry::max('inwardnumner');
        if ($retvalue === null)
        {
            $retvalue=1;
        }
        elseif ($retvalue >=1)
        {
            $retvalue=$retvalue+1;
        }
        return $retvalue;
    }
    public function store(Request $request)
    {
        $order_number = $this->getmax(); 
        $ordernumber = $this->getmaxinwardno();       
        Orderentry::create(['order_number'=>$order_number,
                                    'ordernumber'=> $ordernumber ,
                                    'pty_code'=>$request->pty_code,
                                    'order_date'=>$request->order_date, 
                                    'vehicle_code'=>$request->vehicle_code,
                                    'driver_code'=>$request->driver_code,
                                    'vehicle_code'=>$request->vehicle_code,
                                    'jcb_code'=>$request->jcb_code,
                                    'op_code'=>$request->op_code,
                                    'from_code'=>$request->from_code,
                                    'to_code'=>$request->to_code,
                                    'item_code'=>$request->item_code,
                                    'total_unit'=>$request->total_unit,       
                                    'perunitrate'=>$request->perunitrate,
                                    'amount'=>$request->amount,                                   
                                    'remarks'=>$request->remarks ]);
        
        $msg = [
          'message' => 'Order Entry created successfully!' ];
        return  redirect('admin/orderentry')->with($msg);
    }
    public function create()
    {
       $rsdepartmentData['order_number'] = $this->getmax(); 
       $rsdepartmentData['ordernumber'] = $this->getmaxinwardno();        
       $rsdepartmentData['customer'] = Orderentry::getcustomer();
       $rsdepartmentData['vehicle'] = Orderentry::getvehicle();      
       $rsdepartmentData['driver'] = Orderentry::getdriver();     
       $rsdepartmentData['jcb'] = Orderentry::getjcb();      
       $rsdepartmentData['opeartor'] = Orderentry::getopeartor();
       $rsdepartmentData['place'] = Orderentry::getplace();
       $rsdepartmentData['item'] = Orderentry::getitem();           
       return view('orderentry.create',compact(['rsdepartmentData']));
       
    }
    
    public function saveproduction(Request $request)
    {
        $i=0;$output='';
        return   $request->frnnumber;
        foreach($request->sno as $arrcolour)
           { 
            Knittedfabdetails::where(
                    ['inwardnumber'=>$request->id,'indx'=>$i+1])->update(
                    ['delivery_weight'=>$request->recdweight[$i],
                     'frnnumber'=>$request->frnnumber[$i]
                    ]); 
                    $i=$i+1;
           }             
     
        echo 'Knitted Fabric Entry Updated successfully!';
         
    }

  
    public function edit($id)
    {
         
        $rsstaff= Cuttingproduction::getstaff();
        $rsstyle = Cuttingproduction::getstyle();
        
        $rsdepartmentData['rsproduction'] = DB::table('Cuttingproduction1')    
        ->select('production_number','productionnumber',
                   'remarks','style_code','total_pcs', 
                  'emp_code','production_date')
         ->orderBy('Cuttingproduction1.production_date', 'asc')              
         ->where('productionnumber',$id)
         ->get();  

        $rsdepartmentData['rsdetail'] = DB::table('Cuttingproduction2')  
              ->select( 'size1','size2','size3','size4',
                         'size5','size6','size7','size8', 
                         'indx')
                ->where('indx',1)                
               ->where('productionnumber',$id)
               ->get(); 
        
        $rsdepartmentData['rsindxdetail'] = DB::table('Cuttingproduction2')  
               ->select( 'size1','size2','size3','size4',
                          'size5','size6','size7','size8', 
                          'indx') 
                ->where('indx',0)          
                ->where('productionnumber',$id)
                ->get();   
       return view('cuttingproduction.edit',compact(['rsdepartmentData','rsstaff','rsstyle']));
    }

    

   public function fetchsize(Request $request)
   {
       $styleid= $request->get('styleid');
       if($request->get('styleid'))
       { 
         $rsdepartmentData = DB::table('styledetail')      
          ->select('size1','size2','size3','size4','size5','size6','size7','size8')
          ->where('styleid',$styleid)
          ->where('indx',1)
          ->get(); 
        }
        return $rsdepartmentData;
   }

   public function fetchfrnloop($colour_id,$fabric_id)
   {      
         $rsdepartmentData = DB::table('knitted_fab_details')      
          ->select('frnnumber')
          ->where('fabric_id',$fabric_id)
          ->where('colour_id',$colour_id)
          ->get();         
        return $rsdepartmentData;
   }
   public function fetchcolourfabric(Request $request)
   { 
       $styleid= $request->get('styleid');
        if($request->get('styleid'))
         { 
           $rsdepartmentData = DB::table('style')      
           ->leftJoin('fabrics as fabrics1', 'fabrics1.id', '=', 'style.fabric_code1')
           ->leftJoin('fabrics as fabrics2', 'fabrics2.id', '=', 'style.fabric_code2')
           ->leftJoin('fabrics as fabrics3', 'fabrics3.id', '=', 'style.fabric_code3')
           ->leftJoin('fabrics as fabrics4', 'fabrics4.id', '=', 'style.fabric_code4')
           ->leftJoin('fabrics as fabrics5', 'fabrics5.id', '=', 'style.fabric_code5')
           ->leftJoin('colours as colours1', 'colours1.id', '=', 'style.colour_code1')
           ->leftJoin('colours as colours2', 'colours2.id', '=', 'style.colour_code2')
           ->leftJoin('colours as colours3', 'colours3.id', '=', 'style.colour_code3')
           ->leftJoin('colours as colours4', 'colours4.id', '=', 'style.colour_code4')
           ->leftJoin('colours as colours5', 'colours5.id', '=', 'style.colour_code5')
            ->select('fabrics1.name as  fabricname1','fabrics2.name as  fabricname2',
                    'fabrics3.name as  fabricname3','fabrics4.name as  fabricname4',
                    'fabrics5.name as  fabricname5','colours1.name as  colourname1',
                    'colours2.name as  colourname2','colours3.name as  colourname3',
                    'colours4.name as  colourname4','colours5.name as  colourname5',
                    DB::raw("(SELECT SUM(weight)  FROM knitted_fab_details
                                WHERE knitted_fab_details.colour_id = style.colour_code1 and
                                knitted_fab_details.fabric_id = style.fabric_code1
                                GROUP BY knitted_fab_details.colour_id ,knitted_fab_details.fabric_id ) as weight1"),
                    DB::raw("(SELECT SUM(weight)  FROM knitted_fab_details
                                WHERE knitted_fab_details.colour_id = style.colour_code2 and
                                knitted_fab_details.fabric_id = style.fabric_code2
                                GROUP BY knitted_fab_details.colour_id ,knitted_fab_details.fabric_id ) as weight2"),      
                    DB::raw("(SELECT SUM(weight)  FROM knitted_fab_details
                                WHERE knitted_fab_details.colour_id = style.colour_code3 and
                                knitted_fab_details.fabric_id = style.fabric_code3
                                GROUP BY knitted_fab_details.colour_id ,knitted_fab_details.fabric_id ) as weight3"),  
                    DB::raw("(SELECT SUM(weight)  FROM knitted_fab_details
                                WHERE knitted_fab_details.colour_id = style.colour_code4 and
                                knitted_fab_details.fabric_id = style.fabric_code4
                                GROUP BY knitted_fab_details.colour_id ,knitted_fab_details.fabric_id ) as weight4"),  
                    DB::raw("(SELECT SUM(weight)  FROM knitted_fab_details
                                WHERE knitted_fab_details.colour_id = style.colour_code5 and
                                knitted_fab_details.fabric_id = style.fabric_code5
                                GROUP BY knitted_fab_details.colour_id ,knitted_fab_details.fabric_id ) as weight5")                                      
                  )
            ->where('style.id',$styleid)
            ->get();           
         } 
        
         return  $rsdepartmentData;
   }
   public function fetchfrn(Request $request)
   { 
        $styleid= $request->get('styleid');
        if($request->get('styleid'))
         { 
           $rsdepartmentData = DB::table('style')      
            ->select('fabric_code1','colour_code1','fabric_code2','colour_code2',
                     'fabric_code3','colour_code3', 'fabric_code4','colour_code4',
                     'fabric_code5','colour_code5',
                     )
            ->where('id',$styleid)
            ->get();  
         } 
   }

   public function fetchproduction(Request $request)
   {
        $str='';

        $indxvalue= DB::table('Cuttingproduction2')
                  ->select('size1','size2','size3','size4','size5','size6','size7','size8')
                  ->where('productionnumber',$request->id)
                  ->where('indx',0)
                  ->get(); 

        $retvalue= DB::table('Cuttingproduction2')
                  ->select('size1','size2','size3','size4','size5','size6','size7','size8')
                  ->where('productionnumber',$request->id)
                  ->where('indx',1)
                  ->get();  
        foreach($indxvalue  as $rsretvalue) 
                  {
                      $indxsize1=$rsretvalue->size1;
                      $indxsize2=$rsretvalue->size2;
                      $indxsize3=$rsretvalue->size3;
                      $indxsize4=$rsretvalue->size4;
                      $indxsize5=$rsretvalue->size5;
                      $indxsize6=$rsretvalue->size6;            
                      $indxsize7=$rsretvalue->size7;
                      $indxsize8=$rsretvalue->size8;
                  }           
       foreach($retvalue  as $rsretvalue) 
        {
            $size1=$rsretvalue->size1;
            $size2=$rsretvalue->size2;
            $size3=$rsretvalue->size3;
            $size4=$rsretvalue->size4;
            $size5=$rsretvalue->size5;
            $size6=$rsretvalue->size6;            
            $size7=$rsretvalue->size7;
            $size8=$rsretvalue->size8;
        }
        $rowno=1;
        if ($size1 >0) {  $str.="<tr><td>".$rowno."</td>"."<td>".$indxsize1."</td>"."<td>".$size1."</td></tr>";}
        
        return  $str;
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
     
    
    public function show(KnittedFabInward $knittedFabInward)
    {
        
    } 
    
    public function update(Request $request)
    {  
        Cuttingproduction::where('productionnumber',$request->productionnumber)->update([ 
        'emp_code'=>$request->emp_code,
        'style_code'=>$request->style_code,
        'production_date'=>$request->program_date,  
        'total_pcs'=>$request->total_pcs,
        'remarks'=>$request->remarks ]); 
        
        DB::table('Cuttingproduction2')->where('productionnumber',$request->productionnumber)->delete();

        Cuttingproductiondetail::create(['productionnumber'=> $request->productionnumber,
                                    'emp_code'=>$request->emp_code,
                                    'indx'=>0,
                                    'production_date'=>$request->program_date, 
                                    'style_code'=>$request->style_code,
                                    'size1'=>$request->indxsize1,
                                    'size2'=>$request->indxsize2,
                                    'size3'=>$request->indxsize3,
                                    'size4'=>$request->indxsize4,
                                    'size5'=>$request->indxsize5,
                                    'size6'=>$request->indxsize6,
                                    'size7'=>$request->indxsize7,
                                    'size8'=>$request->indxsize8,
                                    'totalpcs'=>$request->total_pcs]);  

        Cuttingproductiondetail::create(['productionnumber'=> $request->productionnumber,
                                    'emp_code'=>$request->emp_code,
                                    'indx'=>1,
                                    'production_date'=>$request->program_date, 
                                    'style_code'=>$request->style_code,
                                    'size1'=>$request->size1,
                                    'size2'=>$request->size2,
                                    'size3'=>$request->size3,
                                    'size4'=>$request->size4,
                                    'size5'=>$request->size5,
                                    'size6'=>$request->size6,
                                    'size7'=>$request->size7,
                                    'size8'=>$request->size8,
                                    'totalpcs'=>$request->total_pcs]);   

        $msg = [
            'message' => 'Cutting Program Entry Updated successfully!' ];
        return  redirect('admin/cuttingproduction')->with($msg);
    }

  
    public function destroy($id)
    {
       
       DB::table('cuttingproduction1')->where('productionnumber',$id)->delete();
       DB::table('cuttingproduction2')->where('productionnumber',$id)->delete();
       
        $msg =['message' => 'Cutting Program Entry Deleted successfully!',
       'type' => 'warning'];

      
        return  redirect('admin/cuttingproduction')->with($msg); 
    }
    
}
