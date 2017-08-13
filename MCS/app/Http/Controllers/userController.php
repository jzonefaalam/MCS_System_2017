<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

use App\coursetbl;
use App\coursetypetbl;
use App\employeetypetbl;
use App\employeetbl;
use App\equipmenttbl;
use App\eventtypetbl;
use App\locationtbl;
use App\packagetbl;
use App\servicetbl;

class userController extends Controller
{
    public function basePage(){
    	$dishData = DB::table('coursetbl')->join('coursetypetbl','coursetypetbl.dishTypeID','=','coursetbl.dishTypeID')
        ->select('*')
    	->where('coursetbl.dishAvailability', 1)->where('coursetbl.dishStatus', 1)
    	->get();

    	$addDishData = DB::table('coursetypetbl')
        ->select('*')
        ->where('dishTypeStatus', 1)
        ->get();

        $dishDataID = DB::table('coursetbl')->max('dishID');
         
        $dishNewID = $dishDataID + 1;
        return View::make('/UserBasePage')->with('dishData', $dishData)->with('addDishData', $addDishData)->with('dishNewID', $dishNewID);
    }

    public function reservationPage(){
        $dishData = DB::table('coursetbl')->join('coursetypetbl','coursetypetbl.dishTypeID','=','coursetbl.dishTypeID')
        ->select('*')
        ->where('coursetbl.dishAvailability', 1)->where('coursetbl.dishStatus', 1)
        ->get();

        $addDishData = DB::table('coursetypetbl')
        ->select('*')
        ->where('dishTypeStatus', 1)
        ->get();

        $dishDataID = DB::table('coursetbl')->max('dishID');
         
        $dishNewID = $dishDataID + 1;
        return View::make('/UserReservationPage')->with('dishData', $dishData)->with('addDishData', $addDishData)->with('dishNewID', $dishNewID);
    }

    public function aboutPage(){
        $dishData = DB::table('coursetbl')->join('coursetypetbl','coursetypetbl.dishTypeID','=','coursetbl.dishTypeID')
        ->select('*')
        ->where('coursetbl.dishAvailability', 1)->where('coursetbl.dishStatus', 1)
        ->get();

        $addDishData = DB::table('coursetypetbl')
        ->select('*')
        ->where('dishTypeStatus', 1)
        ->get();

        $dishDataID = DB::table('coursetbl')->max('dishID');
         
        $dishNewID = $dishDataID + 1;
        return View::make('/UserAboutPage')->with('dishData', $dishData)->with('addDishData', $addDishData)->with('dishNewID', $dishNewID);
    }
}
