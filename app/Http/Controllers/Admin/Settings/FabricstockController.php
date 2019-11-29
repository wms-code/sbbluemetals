<?php

namespace App\Http\Controllers\Admin\Settings;
 
  
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
 
class FabricstockController extends Controller
{
    
    public function index()
    {
        
        $accounts = DB::table('knitted_fab_details')  
        ->join('fabrics', 'fabrics.id', '=', 'knitted_fab_details.fabric_id')
        ->join('colours', 'colours.id', '=', 'knitted_fab_details.colour_id')
        ->select('fabrics.name as fabricsname','colours.name as colourssname',
                  DB::raw('SUM(weight) as total'))
         ->orderBy('colours.name', 'asc')            
         ->orderBy('fabrics.name', 'asc')    
         ->groupBy('fabrics.name','colours.name')          
         //->where('inwardnumber',$id)
         ->get(); 

        return view('fabricstock.list',compact('accounts'));
    } 
     
}