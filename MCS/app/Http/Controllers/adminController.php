<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Query\Builder;
use Carbon\Carbon;
use App\coursetbl;
use App\coursetypetbl;
use App\employeetypetbl;
use App\employeetbl;
use App\equipmenttbl;
use App\equipmenttypetbl;
use App\eventtypetbl;
use App\locationtbl;
use App\packagetbl;
use App\servicetbl;
use App\servicetypetbl;
use App\reservationtbl;
use App\eventtbl;
use App\customertbl;
use App\packageinclusiontbl;
use App\equipmentlogtbl;
use App\transactiontbl;
use Mail;
class adminController extends Controller
{

    public function sendApprovalEmail(Request $request){
        // $data = array(
        //     'email' => "jsooooon017@gmail.com",
        //     'subject' => "Test Approval",
        //     'bodyMessage' => 'Sample'
        //     );
        // Mail::send('emails.approval', $data, function($message) use ($data){
        //     $message->from($data['email']);
        //     $message->to('jzone_faalam@yahoo.com');
        //     $message->subject($data['subject']);
        // });

        $id = Input::get('approveReservationId');
        $reservationtbl = reservationtbl::find($id);
        $reservationtbl->reservationStatus = 2;
        $reservationtbl->save();
        $transactiontbl = new transactiontbl;
        $transactiontbl->transactionStatus = 0;
        $transactiontbl->totalFee = Input::get('totalReservationFee');
        $transactiontbl->reservationID = $id;
        $transactiontbl->save();
        Mail::send(   ['html'=>'mail'],['name','MCS'],function ($message){
            $message->to('jsooooon017@gmail.com', 'To Jayson')
                    ->subject('Test Email');
            $message->from('jsooooon017@gmail.com', 'From Jayson');
        });
        return redirect()->back();
    }

    public function sendDenyEmail(Request $request){
        // $data = array(
        //     'email' => "jsooooon017@gmail.com",
        //     'subject' => "Test Approval",
        //     'bodyMessage' => 'Sample'
        //     );
        // Mail::send('emails.approval', $data, function($message) use ($data){
        //     $message->from($data['email']);
        //     $message->to('jzone_faalam@yahoo.com');
        //     $message->subject($data['subject']);
        // });
        $id = Input::get('denyReservationId');
        $reservationtbl = reservationtbl::find($id);
        $reservationtbl->reservationStatus = 3;
        $reservationtbl->save();
        return redirect()->back();
    }

    public function authenticateLogin(){
        $usernameLogin = Input::get('usernameLogin');
        $passwordLogin = Input::get('passwordLogin');
        $loginData = DB::table('users')
        ->select('*')
        ->where('username',$usernameLogin)
        ->where('password',$passwordLogin)
        ->count();
        if($loginData>0){
            return redirect()->action('adminController@dishPage');
        }
    }

    public function authenticateLogout(){
        return View::make('/Login');
    }

    //Dashboard Page functions-------------------------------------------------------------------------->
    // public function dashboardPage(){ 
    //     $dateTime = Date_create('now');
    //     $dateToday = $dateTime->format('n.j.Y');
    //     $dashboardData = DB::table('reservation_tbl')
    //       ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
    //       ->orderBy('reservation_tbl.created_at', 'desc')
    //       ->where('reservation_tbl.reservationStatus', '=', 1)
    //       ->where('reservation_tbl.created_at', '<=', Carbon::now())
    //       ->get();
    //     return View::make('/DashboardPage')
    //     ->with('dashboardData', $dashboardData);
    // }

    //Dish Page functions-------------------------------------------------------------------------->
    public function dishPage(){
        $dishData = DB::table('dish_tbl')->join('dishtype_tbl','dishtype_tbl.dishTypeID','=','dish_tbl.dishTypeID')
        ->select('*')
        ->where('dish_tbl.dishStatus', 1)
        ->get();

        $addDishData = DB::table('dishtype_tbl')
        ->select('*')
        ->where('dishTypeStatus', 1)
        ->get();

        $dishDataID = DB::table('dish_tbl')->max('dishID');
         
        $dishNewID = $dishDataID + 1;
        return View::make('/DishPage')->with('dishData', $dishData)->with('addDishData', $addDishData)->with('dishNewID', $dishNewID);
    }

    public function retrieveDishData(){
        $ss = DB::table('dish_tbl')
        ->join('dishtype_tbl','dish_tbl.dishTypeID','=','dishtype_tbl.dishTypeID')
        ->select('dish_tbl.*','dishtype_tbl.*')
        ->where('dish_tbl.dishID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function addDishes(Request $request) 
    {
        $dishImage = ($_FILES["addDishImage"]["name"]);

        if($dishImage==null){
            $coursetbl = new coursetbl;
            $coursetbl->dishName = Input::get('addDishName');
            $coursetbl->dishDescription = Input::get('addDishDesc');
            $coursetbl->dishCost = Input::get('addDishPrice');
            $coursetbl->dishTypeID = Input::get('addDishType');
            $coursetbl->dishAvailability = 1;
            $coursetbl->dishStatus = 1;
            $coursetbl->dishImage = "No image";
            $coursetbl->save();
            return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["addDishImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["addDishImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $coursetbl = new coursetbl;
            $coursetbl->dishName = Input::get('addDishName');
            $coursetbl->dishDescription = Input::get('addDishDesc');
            $coursetbl->dishCost = Input::get('addDishPrice');
            $coursetbl->dishTypeID = Input::get('addDishType');
            $coursetbl->dishAvailability = 1;
            $coursetbl->dishStatus = 1;
            $coursetbl->dishImage = $dishImage;
            $coursetbl->save();
            return redirect()->back();
        }
        // Check file size
        if ($_FILES["addDishImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["addDishImage"]["tmp_name"], $target_file)) {
        $coursetbl = new coursetbl;
        $coursetbl->dishName = Input::get('addDishName');
        $coursetbl->dishDescription = Input::get('addDishDesc');
        $coursetbl->dishCost = Input::get('addDishPrice');
        $coursetbl->dishTypeID = Input::get('addDishType');
        $coursetbl->dishAvailability = 1;
        $coursetbl->dishStatus = 1;
        $coursetbl->dishImage = $dishImage;
        $coursetbl->save();
        return redirect()->back();
        } else {
            return \Redirect::back();
        }
        }
        }
       
    }

    public function editDish(){
        $dishImage = ($_FILES["editDishImage"]["name"]);

        if($dishImage==null){
        $id = Input::get('editDishID');
        $coursetbl = coursetbl::find($id);
        $coursetbl->dishName= Input::get('editDishName');
        $coursetbl->dishDescription= Input::get('editDishDesc');
        $coursetbl->dishCost= Input::get('editDishPrice');
        $coursetbl->dishTypeID= Input::get('editDishType');
        $coursetbl->dishImage= "No Image";
        $coursetbl->save();
        return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["editDishImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["editDishImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $id = Input::get('editDishID');
            $coursetbl = coursetbl::find($id);
            $coursetbl->dishName= Input::get('editDishName');
            $coursetbl->dishDescription= Input::get('editDishDesc');
            $coursetbl->dishCost= Input::get('editDishPrice');
            $coursetbl->dishTypeID= Input::get('editDishType');
            $coursetbl->dishImage= $dishImage;
            $coursetbl->save();
            return redirect()->back();
        }
        // Check file size
        if ($_FILES["editDishImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["editDishImage"]["tmp_name"], $target_file)) {
            $id = Input::get('editDishID');
            $coursetbl = coursetbl::find($id);
            $coursetbl->dishName= Input::get('editDishName');
            $coursetbl->dishDescription= Input::get('editDishDesc');
            $coursetbl->dishCost= Input::get('editDishPrice');
            $coursetbl->dishTypeID= Input::get('editDishType');
            $coursetbl->dishImage= $dishImage;
            $coursetbl->save();
            return redirect()->back();
        } else {
            alert('File Not Uploaded!');
            return \Redirect::back();
        }
        }
        }
    }

    public function deleteDish(){
        $id = Input::get('deleteDishID');
        $coursetbl=coursetbl::find($id);
        $coursetbl->dishStatus = 0;
        $coursetbl->save();
        return redirect()->back();
    }

    //Dish Type functions-------------------------------------------------------------------------->

    public function dishTypePage(){
        $dishTypeData = DB::table('dishtype_tbl')
        ->select('*')
        ->where('dishTypeStatus', 1)
        ->get();

        
        return View::make('/DishTypePage')->with('dishTypeData', $dishTypeData);
    }

    public function addDishType(Request $request){
        $dishTypeImage = ($_FILES["addDishTypeImage"]["name"]);
        if($dishTypeImage==null){
        $courseType = new coursetypetbl;
        $courseType->dishTypeName = Input::get('addDishTypeName');
        $courseType->dishTypeStatus = 1;
        $courseType->dishTypeImage = "No Image";
        $courseType->save();
        return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["addDishTypeImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["addDishTypeImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $courseType = new coursetypetbl;
            $courseType->dishTypeName = Input::get('addDishTypeName');
            $courseType->dishTypeStatus = 1;
            $courseType->dishTypeImage = ($_FILES['addDishTypeImage']['name']);
            $courseType->save();
            return redirect()->back();

        }
        // Check file size
        if ($_FILES["addDishTypeImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["addDishTypeImage"]["tmp_name"], $target_file)) {
            $courseType = new coursetypetbl;
            $courseType->dishTypeName = Input::get('addDishTypeName');
            $courseType->dishTypeStatus = 1;
            $courseType->dishTypeImage = ($_FILES['addDishTypeImage']['name']);
            $courseType->save();
            return redirect()->back();
        } else {
            return \Redirect::back();
        }
        }
        }
       
    }

    public function retrieveDishTypeData(){
        $ss = DB::table('dishtype_tbl')
        ->select('*')
        ->where('dishTypeID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function editDishType(){
        $dishTypeImage = ($_FILES["editDishTypeImage"]["name"]);

        if($dishTypeImage==null){
        $id = Input::get('editDishTypeID');
        $coursetypetbl = coursetypetbl::find($id);
        $coursetypetbl->dishTypeName= Input::get('editDishTypeName');
        $coursetypetbl->dishTypeImage = "No Image";
        $coursetypetbl->save();
        return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["editDishTypeImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["editDishTypeImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $id = Input::get('editDishTypeID');
            $coursetypetbl = coursetypetbl::find($id);
            $coursetypetbl->dishTypeName= Input::get('editDishTypeName');
            $coursetypetbl->dishTypeImage = ($_FILES['editDishTypeImage']['name']);
            $coursetypetbl->save();
            return redirect()->back();
        }
        // Check file size
        if ($_FILES["editDishTypeImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["editDishTypeImage"]["tmp_name"], $target_file)) {
        $id = Input::get('editDishTypeID');
        $coursetypetbl = coursetypetbl::find($id);
        $coursetypetbl->dishTypeName= Input::get('editDishTypeName');
        $coursetypetbl->dishTypeImage = ($_FILES['editDishTypeImage']['name']);
        $coursetypetbl->save();
        return redirect()->back();
        } else {
            alert('File Not Uploaded!');
            return \Redirect::back();
        }
        }
        }
        
    }

    public function deleteDishType(){
        $id = Input::get('deleteDishTypeID');
        $coursetypetbl = coursetypetbl::find($id);
        $coursetypetbl->dishTypeStatus= 0;
        $coursetypetbl->save();
        return redirect()->back();
    }

    //Employee functions--------------------------------------------------------------------------->

    public function employeePage(){
        $employeeData = DB::table('employee_tbl')
        ->join('employeetype_tbl','employeetype_tbl.employeeTypeID','=','employee_tbl.employeeTypeID')
        ->select('*')
        ->where('employee_tbl.employeeStatus', 1)
        ->get();

        $addEmployeeData = DB::table('employeetype_tbl')
        ->select('*')
        ->where('employeeTypeStatus', 1)
        ->get();

        return View::make('/EmployeePage')->with('employeeData', $employeeData)->with('addEmployeeData', $addEmployeeData);
    }

    public function addEmployee(Request $request){
        $employeeImage = ($_FILES["addEmployeeImage"]["name"]);
        if($employeeImage==null){
        $employee = new employeetbl;
        $employee->employeeName = Input::get('addEmployeeName');
        $employee->employeeTypeID = Input::get('addEmployeeType');
        $employee->employeeAvailability = 1;
        $employee->employeeStatus = 1;
        $employee->employeeImage = "No Image";
        $employee->save();
        return redirect()->back();
        }
        else{
        $target_dir = "images\\";
        $target_file = $target_dir . basename($_FILES["addEmployeeImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["addEmployeeImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        // if (file_exists($target_file)) {
        //     $id = Input::get('companyId');
        //     $company = MCompanyInfo::find($id);
        //     $company->strCompanyLogo=($_FILES["companylogo"]["name"]);
        //     $company->save();
        //     return \Redirect::back();
        // }
        // Check file size
        if ($_FILES["addEmployeeImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["addEmployeeImage"]["tmp_name"], $target_file)) {
        $employee = new employeetbl;
        $employee->employeeName = Input::get('addEmployeeName');
        $employee->employeeTypeID = Input::get('addEmployeeType');
        $employee->employeeAvailability = 1;
        $employee->employeeStatus = 1;
        $employee->employeeImage = ($_FILES["addEmployeeImage"]["name"]);
        $employee->save();
        return redirect()->back();

        } else {
            alert('File Not Uploaded!');
            return \Redirect::back();
        }
        }
        }
    }

    public function editEmployee(){
        $id = Input::get('editEmployeeID');
        $employeetbl = employeetbl::find($id);
        $employeetbl->employeeName= Input::get('editEmployeeName');
        $employeetbl->employeeTypeID= Input::get('editEmployeeType');
        $employeetbl->save();
        return redirect()->back();
    }

    public function retrieveEmployeeData(){
        $ss = DB::table('employee_tbl')
        ->join('employeetype_tbl','employeetype_tbl.employeeTypeID','=','employee_tbl.employeeTypeID')
        ->select('employee_tbl.*','employeetype_tbl.*')
        ->where('employee_tbl.employeeID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function deleteEmployee(){
        $id = Input::get('deleteEmployeeID');
        $employeetbl = employeetbl::find($id);
        $employeetbl->employeeStatus= 0;
        $employeetbl->save();
        return redirect()->back();
    }

     //Employee Type functions--------------------------------------------------------------------->

    public function employeeTypePage(){
        $employeeTypeData = DB::table('employeetype_tbl')
        ->select('*')
        ->where('employeeTypeStatus', 1)
        ->get();
        return View::make('/EmployeeTypePage')->with('employeeTypeData', $employeeTypeData);
    }

    public function addEmployeeType(Request $request){
        $employeeType = new employeetypetbl;
        $employeeType->employeeTypeName = Input::get('addEmployeeType');
        $employeeType->employeeTypeDescription = "None";
        $employeeType->employeeRatePerHour = Input::get('addEmployeeRatePerHour');
        $employeeType->employeeTypeStatus = 1;
        $employeeType->employeeTypeImage = "No Image";
        $employeeType->save();
        return redirect()->back();
    }

    public function editEmployeeType(){
        $id = Input::get('editEmployeeTypeID');
        $employeetypetbl = employeetypetbl::find($id);
        $employeetypetbl->employeeTypeName= Input::get('editEmployeeTypeName');
        $employeetypetbl->employeeRatePerHour = Input::get('editEmployeeRatePerHour');
        $employeetypetbl->save();
        return redirect()->back();
    }

    public function retrieveEmployeeTypeData(){
        $ss = DB::table('employeetype_tbl')
        ->select('*')
        ->where('employeeTypeID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function deleteEmployeeType(){
        $id = Input::get('deleteEmployeeTypeID');
        $employeetypetbl = employeetypetbl::find($id);
        $employeetypetbl->employeeTypeStatus= 0;
        $employeetypetbl->save();
        return redirect()->back();
    }

     //Event functions

    public function eventPage(){
        $eventData = DB::table('eventtype_tbl')
        ->select('*')
        ->where('eventTypeStatus', 1)->where('eventTypeStatus',1)
        ->get();
        return View::make('/EventPage')->with('eventData', $eventData);
    }

    public function addEvent(Request $request){
        $event = new eventtypetbl;
        $event->eventTypeName = Input::get('addEventName');
        $event->eventTypeDescription = Input::get('addEventDescription');
        $event->eventTypeStatus = 1;
        $event->eventTypeAvailability = 1;
        $event->save();
        return redirect()->back();
    }

    public function editEvent(){
        $id = Input::get('editEventTypeID');
        $event = eventtypetbl::find($id);
        $event->eventTypeName = Input::get('editEventTypeName');
        $event->eventTypeDescription = Input::get('editEventTypeDesc');
        $event->save();
        return redirect()->back();
    }

    public function retrieveEventData(){
        $ss = DB::table('eventtype_tbl')
        ->select('*')
        ->where('eventTypeID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function deleteEvent(){
        $id = Input::get('deleteEventTypeID');
        $event = eventtypetbl::find($id);
        $event->eventTypeStatus = 0;
        $event->save();
        return redirect()->back();
    }

     //Location functions------------------------------------------------------------------------->

    public function locationPage(){
        $locationData = DB::table('location_tbl')
        ->select('*')
        ->where('locationStatus', 1)->where('locationAvailability',1)
        ->get();
        return View::make('/LocationPage')->with('locationData', $locationData);
    }

    public function addLocation(Request $request){
        $locationImage = ($_FILES["addLocationImage"]["name"]);
        if($locationImage==null){
            $location = new locationtbl;
            $location->locationName = Input::get('addLocationName');
            $location->locationContactPerson = Input::get('addLocationContactPerson');
            $location->locationDescription = Input::get('addLocationDescription');
            $location->locationAddress = Input::get('addLocationAddress');
            $location->locationContactNumber = Input::get('addLocationContactNumber');
            $location->locationCapacity = Input::get('addLocationCapacity');
            $location->locationImage = "No Image";
            $location->locationFee = Input::get('addLocationFee');
            $location->locationStatus = 1;
            $location->locationAvailability = 1;
            $location->save();
            return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["addLocationImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["addLocationImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $location = new locationtbl;
            $location->locationName = Input::get('addLocationName');
            $location->locationContactPerson = Input::get('addLocationContactPerson');
            $location->locationDescription = Input::get('addLocationDescription');
            $location->locationAddress = Input::get('addLocationAddress');
            $location->locationContactNumber = Input::get('addLocationContactNumber');
            $location->locationCapacity = Input::get('addLocationCapacity');
            $location->locationImage = $locationImage;
            $location->locationFee = Input::get('addLocationFee');
            $location->locationStatus = 1;
            $location->locationAvailability = 1;
            $location->save();
            return redirect()->back();
        }
        // Check file size
        if ($_FILES["addLocationImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["addLocationImage"]["tmp_name"], $target_file)) {
            $location = new locationtbl;
            $location->locationName = Input::get('addLocationName');
            $location->locationContactPerson = Input::get('addLocationContactPerson');
            $location->locationDescription = Input::get('addLocationDescription');
            $location->locationAddress = Input::get('addLocationAddress');
            $location->locationContactNumber = Input::get('addLocationContactNumber');
            $location->locationCapacity = Input::get('addLocationCapacity');
            $location->locationImage = $locationImage;
            $location->locationFee = Input::get('addLocationFee');
            $location->locationStatus = 1;
            $location->locationAvailability = 1;
            $location->save();
            return redirect()->back();
        } else {
            return \Redirect::back();
        }
        }
        }
    }

    public function editLocation(){
        $locationImage = ($_FILES["editLocationImage"]["name"]);
        if($locationImage==null){
            $id = Input::get('editLocationID');
            $location = locationtbl::find($id); 
            $location->locationName = Input::get('editLocationName');
            $location->locationContactPerson = Input::get('editLocationContactPerson');
            $location->locationDescription = Input::get('editLocationDesc');
            $location->locationAddress = Input::get('editLocationAddress');
            $location->locationContactNumber = Input::get('editLocationContactNumber');
            $location->locationCapacity = Input::get('editLocationCapacity');
            $location->locationFee = Input::get('editLocationPrice');
            $location->locationImage = "No Image";
            $location->save();
            return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["editLocationImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["editLocationImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $id = Input::get('editLocationID');
            $location = locationtbl::find($id); 
            $location->locationName = Input::get('editLocationName');
            $location->locationContactPerson = Input::get('editLocationContactPerson');
            $location->locationDescription = Input::get('editLocationDesc');
            $location->locationAddress = Input::get('editLocationAddress');
            $location->locationContactNumber = Input::get('editLocationContactNumber');
            $location->locationCapacity = Input::get('editLocationCapacity');
            $location->locationFee = Input::get('editLocationPrice');
            $location->locationImage = $locationImage;
            $location->save();
            return redirect()->back();
        }
        // Check file size
        if ($_FILES["editLocationImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["editLocationImage"]["tmp_name"], $target_file)) {
            $id = Input::get('editLocationID');
            $location = locationtbl::find($id); 
            $location->locationName = Input::get('editLocationName');
            $location->locationContactPerson = Input::get('editLocationContactPerson');
            $location->locationDescription = Input::get('editLocationDesc');
            $location->locationAddress = Input::get('editLocationAddress');
            $location->locationContactNumber = Input::get('editLocationContactNumber');
            $location->locationCapacity = Input::get('editLocationCapacity');
            $location->locationFee = Input::get('editLocationPrice');
            $location->locationImage = $locationImage;
            $location->save();
            return redirect()->back();
        } else {
            return \Redirect::back();
        }
        }
        }
    }

    public function retrieveLocationData(){
        $ss = DB::table('location_tbl')
        ->select('*')
        ->where('locationID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function deleteLocation(){
        $id = Input::get('deleteLocationID');
        $location = locationtbl::find($id); 
        $location->locationStatus = 0;
        $location->save();
        return redirect()->back();
    }

    //Package functions--------------------------------------------------------------------------->

    public function packagePage(){
        $packageData = DB::table('package_tbl')
        ->where('packageStatus', 1)->where('packageAvailability',1)
        ->get();

        $dishTypeData = DB::table('dishtype_tbl')
        ->select('*')
        ->where('dishTypeStatus', 1)->where('dishTypeStatus',1)
        ->get();

        $equipmentData = DB::table('equipment_tbl')
        ->select('*')
        ->where('equipmentStatus', 1)->where('equipmentStatus',1)
        ->get();

        $serviceData = DB::table('service_tbl')
        ->select('*')
        ->where('serviceStatus', 1)
        ->get();

        $staffData = DB::table('employeetype_tbl')
        ->select('*')
        ->where('employeeTypeStatus', 1)
        ->get();

        return View::make('/PackagePage')
        ->with('packageData', $packageData)
        ->with('dishTypeData', $dishTypeData)
        ->with('equipmentData', $equipmentData)
        ->with('serviceData', $serviceData)
        ->with('staffData', $staffData);
    }

    public function addPackage(Request $request){
        $packageImage = ($_FILES["addPackageImage"]["name"]);
        if($packageImage==null){
            $package = new packagetbl;
            $package->packageName = Input::get('addPackageName');
            $package->packageDescription = Input::get('addPackageDescription');
            $package->packageCost = Input::get('addPackageCost');
            $package->packageImage = "No Image";
            $package->packageStatus = 1;
            $package->packageAvailability = 1;
            $package->save();
            $lastPackageID = DB::table('package_tbl')
            ->max('packageID');
            $dti = $_POST['addDishTypeInclusion'];
            $si = $_POST['addStaffInclusion'];
            $ei = $_POST['addEquipmentInclusion'];
            $svi = $_POST['addServiceInclusion'];
            foreach ($dti as $dtinclusion) {
                $packageInclusion = new packageinclusiontbl;
                $packageInclusion->packageID = $lastPackageID;
                $packageInclusion->dishTypeID = $dtinclusion;
                $packageInclusion->save();
            }
            foreach ($si as $staffInclusion) {
                $packageInclusion = new packageinclusiontbl;
                $packageInclusion->packageID = $lastPackageID;
                $packageInclusion->employeeTypeID = $staffInclusion;
                $packageInclusion->save();
            }
            foreach ($ei as $equipmentInclusion) {
                $packageInclusion = new packageinclusiontbl;
                $packageInclusion->packageID = $lastPackageID;
                $packageInclusion->equipmentID = $equipmentInclusion;
                $packageInclusion->save();
            }
            foreach ($svi as $serviceInclusion) {
                $packageInclusion = new packageinclusiontbl;
                $packageInclusion->packageID = $lastPackageID;
                $packageInclusion->serviceID = $serviceInclusion;
                $packageInclusion->save();
            }
            return redirect()->back();
        }
        else{
            $target_dir = "img\\";
            $target_file = $target_dir . basename($_FILES["addPackageImage"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["addPackageImage"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $package = new packagetbl;
                $package->packageName = Input::get('addPackageName');
                $package->packageDescription = Input::get('addPackageDescription');
                $package->packageCost = Input::get('addPackageCost');
                $package->packageImage = $packageImage;
                $package->packageStatus = 1;
                $package->packageAvailability = 1;
                $package->save();
                $lastPackageID = DB::table('package_tbl')
                ->max('packageID');
                $dti = $_POST['addDishTypeInclusion'];
                $si = $_POST['addStaffInclusion'];
                $ei = $_POST['addEquipmentInclusion'];
                $svi = $_POST['addServiceInclusion'];
                foreach ($dti as $dtinclusion) {
                    $packageInclusion = new packageinclusiontbl;
                    $packageInclusion->packageID = $lastPackageID;
                    $packageInclusion->dishTypeID = $dtinclusion;
                    $packageInclusion->save();
                }
                foreach ($si as $staffInclusion) {
                    $packageInclusion = new packageinclusiontbl;
                    $packageInclusion->packageID = $lastPackageID;
                    $packageInclusion->employeeTypeID = $staffInclusion;
                    $packageInclusion->save();
                }
                foreach ($ei as $equipmentInclusion) {
                    $packageInclusion = new packageinclusiontbl;
                    $packageInclusion->packageID = $lastPackageID;
                    $packageInclusion->equipmentID = $equipmentInclusion;
                    $packageInclusion->save();
                }
                foreach ($svi as $serviceInclusion) {
                    $packageInclusion = new packageinclusiontbl;
                    $packageInclusion->packageID = $lastPackageID;
                    $packageInclusion->serviceID = $serviceInclusion;
                    $packageInclusion->save();
                }
                return redirect()->back();
            }
            // Check file size
            if ($_FILES["addPackageImage"]["size"] > 500000) {
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                // if everything is ok, try to upload file
            } else {
            if (move_uploaded_file($_FILES["addPackageImage"]["tmp_name"], $target_file)) {
                $package = new packagetbl;
                $package->packageName = Input::get('addPackageName');
                $package->packageDescription = Input::get('addPackageDescription');
                $package->packageCost = Input::get('addPackageCost');
                $package->packageImage = $packageImage;
                $package->packageStatus = 1;
                $package->packageAvailability = 1;
                $package->save();
                $lastPackageID = DB::table('package_tbl')
                ->max('packageID');
                $dti = $_POST['addDishTypeInclusion'];
                $si = $_POST['addStaffInclusion'];
                $ei = $_POST['addEquipmentInclusion'];
                $svi = $_POST['addServiceInclusion'];
                foreach ($dti as $dtinclusion) {
                    $packageInclusion = new packageinclusiontbl;
                    $packageInclusion->packageID = $lastPackageID;
                    $packageInclusion->dishTypeID = $dtinclusion;
                    $packageInclusion->save();
                }
                foreach ($si as $staffInclusion) {
                    $packageInclusion = new packageinclusiontbl;
                    $packageInclusion->packageID = $lastPackageID;
                    $packageInclusion->employeeTypeID = $staffInclusion;
                    $packageInclusion->save();
                }
                foreach ($ei as $equipmentInclusion) {
                    $packageInclusion = new packageinclusiontbl;
                    $packageInclusion->packageID = $lastPackageID;
                    $packageInclusion->equipmentID = $equipmentInclusion;
                    $packageInclusion->save();
                }
                foreach ($svi as $serviceInclusion) {
                    $packageInclusion = new packageinclusiontbl;
                    $packageInclusion->packageID = $lastPackageID;
                    $packageInclusion->serviceID = $serviceInclusion;
                    $packageInclusion->save();
                }
                return redirect()->back();
            } else {
                return \Redirect::back();
            }
            }
        }
        
    }

    public function editPackage(){
        $packageImage = ($_FILES["editPackageImage"]["name"]);
        if($packageImage==null){
            $id = Input::get('editPackageID');
            $package = packagetbl::find($id); 
            $package->packageName = Input::get('editPackageName');
            $package->packageDescription = Input::get('editPackageDescription');
            $package->packageCost = Input::get('editPackageCost');
            $package->packageImage = "No Image";
            $package->save();
            $dti = $_POST['editDishTypeInclusion'];
            $si = $_POST['editStaffInclusion'];
            $ei = $_POST['editEquipmentInclusion'];
            $svi = $_POST['editServiceInclusion'];
            foreach ($dti as $dtinclusion) {
                $packageInclusion = new packageinclusiontbl;
                $packageInclusion->packageID = $lastPackageID;
                $packageInclusion->dishTypeID = $dtinclusion;
                $packageInclusion->save();
            }
            foreach ($si as $staffInclusion) {
                $packageInclusion = new packageinclusiontbl;
                $packageInclusion->packageID = $lastPackageID;
                $packageInclusion->employeeTypeID = $staffInclusion;
                $packageInclusion->save();
            }
            foreach ($ei as $equipmentInclusion) {
                $packageInclusion = new packageinclusiontbl;
                $packageInclusion->packageID = $lastPackageID;
                $packageInclusion->equipmentID = $equipmentInclusion;
                $packageInclusion->save();
            }
            foreach ($svi as $serviceInclusion) {
                $packageInclusion = new packageinclusiontbl;
                $packageInclusion->packageID = $lastPackageID;
                $packageInclusion->serviceID = $serviceInclusion;
                $packageInclusion->save();
            }
            return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["editPackageImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["editPackageImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
           $id = Input::get('editPackageID');
            $package = packagetbl::find($id); 
            $package->packageName = Input::get('editPackageName');
            $package->packageDescription = Input::get('editPackageDescription');
            $package->packageCost = Input::get('editPackageCost');
            $package->packageImage = $packageImage;
            $package->save();
            return redirect()->back();
        }
        // Check file size
        if ($_FILES["editPackageImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["editPackageImage"]["tmp_name"], $target_file)) {
           $id = Input::get('editPackageID');
            $package = packagetbl::find($id); 
            $package->packageName = Input::get('editPackageName');
            $package->packageDescription = Input::get('editPackageDescription');
            $package->packageCost = Input::get('editPackageCost');
            $package->packageImage = $packageImage;
            $package->save();
            return redirect()->back();
        } else {
            return \Redirect::back();
        }
        }
        }
    }

    public function retrievePackageData(){
        $ss = DB::table('package_tbl')
        ->select('*')
        ->where('packageID', Input::get('sdid'))
        ->get();

        $dd = DB::table('packageinclusion_tbl')
        ->join('service_tbl', 'service_tbl.serviceID', '=', 'packageinclusion_tbl.serviceID')
        ->where('packageinclusion_tbl.packageID', Input::get('sdid'))
        ->get();

        $ff = DB::table('packageinclusion_tbl')
        ->join('equipment_tbl', 'equipment_tbl.equipmentID', '=', 'packageinclusion_tbl.equipmentID')
        ->where('packageinclusion_tbl.packageID', Input::get('sdid'))
        ->get();

        $gg = DB::table('packageinclusion_tbl')
        ->join('employeetype_tbl', 'employeetype_tbl.employeeTypeID', '=', 'packageinclusion_tbl.employeeTypeID')
        ->where('packageinclusion_tbl.packageID', Input::get('sdid'))
        ->get();

        $dishInclusion = DB::table('packageinclusion_tbl')
        ->join('dishtype_tbl', 'dishtype_tbl.dishTypeID', '=', 'packageinclusion_tbl.dishTypeID')
        ->where('packageinclusion_tbl.packageID', Input::get('sdid'))
        ->get();


        return \Response::json(['ss'=>$ss]);
    }

    public function retrievePackageInclusion(){
        $ss = DB::table('dishavailed_tbl')
        ->join('reservation_tbl', 'reservation_tbl.reservationID','=','dishavailed_tbl.reservationID')
        ->join('dish_tbl','dish_tbl.dishID', '=', 'dishavailed_tbl.dishID')
        ->where('dishavailed_tbl.reservationID', Input::get('sendReservationID'))
        ->get();

        $dd = DB::table('packageinclusion_tbl')
        ->join('service_tbl', 'service_tbl.serviceID', '=', 'packageinclusion_tbl.serviceID')
        ->where('packageinclusion_tbl.packageID', Input::get('sdid'))
        ->get();

        $ff = DB::table('packageinclusion_tbl')
        ->join('equipment_tbl', 'equipment_tbl.equipmentID', '=', 'packageinclusion_tbl.equipmentID')
        ->where('packageinclusion_tbl.packageID', Input::get('sdid'))
        ->get();

        $gg = DB::table('packageinclusion_tbl')
        ->join('employeetype_tbl', 'employeetype_tbl.employeeTypeID', '=', 'packageinclusion_tbl.employeeTypeID')
        ->where('packageinclusion_tbl.packageID', Input::get('sdid'))
        ->get();

        $dishInclusion = DB::table('packageinclusion_tbl')
        ->join('dishtype_tbl', 'dishtype_tbl.dishTypeID', '=', 'packageinclusion_tbl.dishTypeID')
        ->where('packageinclusion_tbl.packageID', Input::get('sdid'))
        ->get();

        $dishData = DB::table('dish_tbl')
        ->get();

        $dishTypeData = DB::table('dishtype_tbl')
        ->get();

        $additionalDish = DB::table('dishadditional_tbl')
        ->join('reservation_tbl', 'reservation_tbl.reservationID','=','dishadditional_tbl.reservationID')
        ->join('dish_tbl','dish_tbl.dishID', '=', 'dishadditional_tbl.dishID')
        ->where('dishadditional_tbl.reservationID', Input::get('sendReservationID'))
        ->get();

        $additionalEquipment = DB::table('equipmentadditional_tbl')
        ->join('reservation_tbl', 'reservation_tbl.reservationID','=','equipmentadditional_tbl.reservationID')
        ->join('equipment_tbl','equipment_tbl.equipmentID', '=', 'equipmentadditional_tbl.equipmentID')
        ->where('equipmentadditional_tbl.reservationID', Input::get('sendReservationID'))
        ->get();

        $additionalService = DB::table('serviceadditional_tbl')
        ->join('reservation_tbl', 'reservation_tbl.reservationID','=','serviceadditional_tbl.reservationID')
        ->join('service_tbl','service_tbl.serviceID', '=', 'serviceadditional_tbl.serviceID')
        ->where('serviceadditional_tbl.reservationID', Input::get('sendReservationID'))
        ->get();

        $additionalEmployee = DB::table('employeeadditional_tbl')
        ->join('reservation_tbl', 'reservation_tbl.reservationID','=','employeeadditional_tbl.reservationID')
        ->join('employeetype_tbl','employeetype_tbl.employeeTypeID', '=', 'employeeadditional_tbl.employeeTypeID')
        ->where('employeeadditional_tbl.reservationID', Input::get('sendReservationID'))
        ->get();

        return \Response::json(['ss'=>$ss, 'gg'=>$gg, 'ff'=>$ff, 'dd'=>$dd, 'additionalDish'=>$additionalDish, 'additionalEquipment'=>$additionalEquipment, 'additionalService'=>$additionalService, 'additionalEmployee'=>$additionalEmployee, 'dishTypeData'=>$dishTypeData, 'dishData'=>$dishData, 'dishInclusion'=>$dishInclusion]);
    }

    public function deletePackage(){
        $id = Input::get('deletePackageID');
        $package = packagetbl::find($id); 
        $package->packageStatus = 0;
        $package->save();
        return redirect()->back();
    }
    //Equipment functions------------------------------------------------------------------------->

    public function inventoryEquipmentPage(){
        $equipmentData = DB::table('equipment_tbl')
        ->join('equipmenttype_tbl','equipmenttype_tbl.equipmentTypeID','=','equipment_tbl.equipmentTypeID')
        // ->join('equipmentlog_tbl', 'equipmentlog_tbl.equipmentTypeID', '=', 'equipment_tbl.equipmentID')
        ->select('*')
        ->where('equipmentStatus', 1)
        ->get();

        $addEquipmentData = DB::table('equipmenttype_tbl')
        ->select('*')
        ->where('equipmentTypeStatus', 1)
        ->get();

        return View::make('/inventory_EquipmentPage')
        ->with('equipmentData', $equipmentData)
        ->with('addEquipmentData', $addEquipmentData);
    }

    public function inventoryPOPage(){
        $equipmentData = DB::table('equipment_tbl')
        ->join('equipmenttype_tbl','equipmenttype_tbl.equipmentTypeID','=','equipment_tbl.equipmentTypeID')
        // ->join('equipmentlog_tbl', 'equipmentlog_tbl.equipmentTypeID', '=', 'equipment_tbl.equipmentID')
        ->select('*')
        ->where('equipmentStatus', 1)
        ->get();

        $addEquipmentData = DB::table('equipmenttype_tbl')
        ->select('*')
        ->where('equipmentTypeStatus', 1)
        ->get();

        return View::make('/inventory_purchaseOrderPage')
        ->with('equipmentData', $equipmentData)
        ->with('addEquipmentData', $addEquipmentData);
    }

    public function addEquipment(Request $request){
        
        $equipmentImage = ($_FILES["addEquipmentImage"]["name"]);
        if($equipmentImage==null){
        $equipment = new equipmenttbl;
        $equipment->equipmentName = Input::get('addEquipmentName');
        $equipment->equipmentDescription = Input::get('addEquipmentDescription');
        $equipment->equipmentRatePerHour = Input::get('addEquipmentRatePerHour');
        $equipment->equipmentAvailability = 1;
        $equipment->equipmentStatus = 1;
        $equipment->equipmentTypeID = Input::get('addEquipmentType');
        $equipment->equipmentImage = "No Image";
        $equipment->save();
        $getEquipmentID = DB::table('equipment_tbl')
        ->MAX('equipmentID');
        $equipmentlog = new equipmentlogtbl;
        $equipmentlog->equipmentID = $getEquipmentID;
        $equipmentlog->equipmentQuantityIn = 0;
        $equipmentlog->equipmentQuantityOut = 0;
        $equipmentlog->equipmentLogDate = Date_create('now');
        $equipmentlog->save();
        return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["addEquipmentImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["addEquipmentImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $equipment = new equipmenttbl;
            $equipment->equipmentName = Input::get('addEquipmentName');
            $equipment->equipmentDescription = Input::get('addEquipmentDescription');
            $equipment->equipmentRatePerHour = Input::get('addEquipmentRatePerHour');
            $equipment->equipmentAvailability = 1;
            $equipment->equipmentStatus = 1;
            $equipment->equipmentTypeID = Input::get('addEquipmentType');
            $equipment->equipmentImage = $equipmentImage;
            $equipment->save();
            $getEquipmentID = DB::table('equipment_tbl')
            ->MAX('equipmentID');
            $equipmentlog = new equipmentlogtbl;
            $equipmentlog->equipmentID = $getEquipmentID;
            $equipmentlog->equipmentQuantityIn = 0;
            $equipmentlog->equipmentQuantityOut = 0;
            $equipmentlog->equipmentLogDate = Date_create('now');
            $equipmentlog->save();
            return redirect()->back();
        }
        // Check file size
        if ($_FILES["addEquipmentImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["addEquipmentImage"]["tmp_name"], $target_file)) {
        $equipment = new equipmenttbl;
        $equipment->equipmentName = Input::get('addEquipmentName');
        $equipment->equipmentDescription = Input::get('addEquipmentDescription');
        $equipment->equipmentRatePerHour = Input::get('addEquipmentRatePerHour');
        $equipment->equipmentUnit = 0;
        $equipment->equipmentAvailability = 1;
        $equipment->equipmentStatus = 1;
        $equipment->equipmentImage = ($_FILES["addEquipmentImage"]["name"]);
        $equipment->save();
        return redirect()->back();

        } else {
            alert('File Not Uploaded!');
            return \Redirect::back();
        }
        }
        }
    }

    public function editEquipment(){
        $equipmentImage = ($_FILES["editEquipmentImage"]["name"]);
        if($equipmentImage==null){
        $id = Input::get('editEquipmentID');
        $equipment = equipmenttbl::find($id);
        $equipment->equipmentName = Input::get('editEquipmentName');
        $equipment->equipmentDescription = Input::get('editEquipmentDescription');
        $equipment->equipmentTypeID = Input::get('editEquipmentTypeID');
        $equipment->equipmentRatePerHour = Input::get('editEquipmentRatePerHour');
        $equipment->save();
        return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["editEquipmentImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["editEquipmentImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $id = Input::get('editEquipmentID');
            $equipment = equipmenttbl::find($id);
            $equipment->equipmentName = Input::get('editEquipmentName');
            $equipment->equipmentDescription = Input::get('editEquipmentDescription');
            $equipment->equipmentTypeID = Input::get('editEquipmentTypeID');
            $equipment->equipmentRatePerHour = Input::get('editEquipmentRatePerHour');
            $equipment->equipmentImage = $equipmentImage;
            $equipment->save();
            return redirect()->back();
        }
        // Check file size
        if ($_FILES["editEquipmentImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["editEquipmentImage"]["tmp_name"], $target_file)) {
            $id = Input::get('editEquipmentID');
            $equipment = equipmenttbl::find($id);
            $equipment->equipmentName = Input::get('editEquipmentName');
            $equipment->equipmentDescription = Input::get('editEquipmentDescription');
            $equipment->equipmentTypeID = Input::get('editEquipmentTypeID');
            $equipment->equipmentRatePerHour = Input::get('editEquipmentRatePerHour');
            $equipment->equipmentImage = $equipmentImage;
            $equipment->save();
            return redirect()->back();

        } else {
            alert('File Not Uploaded!');
            return \Redirect::back();
        }
        }
        }
    }

    public function retrieveEquipmentData(){
        $ss = DB::table('equipment_tbl')
        ->select('*')
        ->where('equipmentID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function deleteEquipment(){
        $id = Input::get('deleteEquipmentID');
        $equipment = equipmenttbl::find($id);
        $equipment->equipmentStatus = 0;
        $equipment->save();
        return redirect()->back();
    }

    //Equipment Type Functions-------------------------------------------------------------------->
    public function equipmentTypePage(){
        $equipmentData = DB::table('equipmenttype_tbl')
        ->select('*')
        ->where('equipmentTypeStatus', 1)
        ->get();
        return View::make('/EquipmentTypePage')->with('equipmentTypeData', $equipmentData);
    }

    public function addEquipmentType(Request $request){
        $equipmentType = new equipmenttypetbl;
        $equipmentType->equipmentTypeName = Input::get('addEquipmentTypeName');
        $equipmentType->equipmentTypeStatus = 1;
        $equipmentType->equipmentTypeImage = "No Image";
        $equipmentType->save();
        return redirect()->back();
    }

    public function retrieveEquipmentTypeData(){
        $ss = DB::table('equipmenttype_tbl')
        ->select('*')
        ->where('equipmentTypeID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function deleteEquipmentType(){
        $id = Input::get('deleteEquipmentTypeID');
        $equipmentType = equipmenttypetbl::find($id);
        $equipmentType->equipmentTypeStatus = 0;
        $equipmentType->save();
        return redirect()->back();
    }

    public function editEquipmentType(){
        $id = Input::get('editEquipmentTypeID');
        $equipmentType = equipmenttypetbl::find($id);
        $equipmentType->equipmentTypeName = Input::get('editEquipmentTypeName');
        $equipmentType->save();
        return redirect()->back();
    }


    //Service functions--------------------------------------------------------------------------->

    public function servicePage(){
        $serviceData = DB::table('service_tbl')
        ->join('servicetype_tbl','servicetype_tbl.serviceTypeID','=','service_tbl.serviceTypeID')
        ->select('*')
        ->where('service_tbl.serviceAvailability', 1)
        ->where('service_tbl.serviceStatus', 1)
        ->where('servicetype_tbl.serviceTypeStatus', 1)
        ->get();

        $addServiceData = DB::table('servicetype_tbl')
        ->select('*')
        ->where('serviceTypeStatus', 1)
        ->get();

        return View::make('/servicePage')->with('serviceData', $serviceData)->with('addServiceData', $addServiceData);
    }

    public function addService(){
       $serviceImage = ($_FILES["addServiceImage"]["name"]);
        if($serviceImage==null){
            $service = new servicetbl;
            $service->serviceName = Input::get('addServiceName');
            $service->serviceDescription = Input::get('addServiceDescription');
            $service->serviceFee = Input::get('addServiceFee');
            $service->serviceTypeID = Input::get('addServiceType');
            $service->serviceStatus = 1;
            $service->serviceAvailability = 1;
            $service->serviceImage = "No Image";
            $service->save();
            return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["addServiceImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["addServiceImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $service = new servicetbl;
            $service->serviceName = Input::get('addServiceName');
            $service->serviceDescription = Input::get('addServiceDescription');
            $service->serviceFee = Input::get('addServiceFee');
            $service->serviceTypeID = Input::get('addServiceType');
            $service->serviceStatus = 1;
            $service->serviceAvailability = 1;
            $service->serviceImage = $serviceImage;
            $service->save();
            return redirect()->back();
        }
        // Check file size
        if ($_FILES["addServiceImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["addServiceImage"]["tmp_name"], $target_file)) {
            $service = new servicetbl;
            $service->serviceName = Input::get('addServiceName');
            $service->serviceDescription = Input::get('addServiceDescription');
            $service->serviceFee = Input::get('addServiceFee');
            $service->serviceTypeID = Input::get('addServiceType');
            $service->serviceStatus = 1;
            $service->serviceAvailability = 1;
            $service->serviceImage = $serviceImage;
            $service->save();
            return redirect()->back();
        } else {
            return \Redirect::back();
        }
        }
        }
    }

    public function editService(){
        $serviceImage = ($_FILES["editServiceImage"]["name"]);
        if($serviceImage==null){
            $id = Input::get('editServiceID');
            $service = servicetbl::find($id); 
            $service->serviceName = Input::get('editServiceName');
            $service->serviceDescription = Input::get('editServiceDescription');
            $service->serviceFee = Input::get('editServiceFee');
            $service->serviceTypeID = Input::get('editServiceType');
            $service->save();
            return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["editServiceImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["editServiceImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $id = Input::get('editServiceID');
            $service = servicetbl::find($id); 
            $service->serviceName = Input::get('editServiceName');
            $service->serviceDescription = Input::get('editServiceDescription');
            $service->serviceFee = Input::get('editServiceFee');
            $service->serviceTypeID = Input::get('editServiceType');
            $service->serviceImage = $serviceImage;
            $service->save();
            return redirect()->back();
        }
        // Check file size
        if ($_FILES["editServiceImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["editServiceImage"]["tmp_name"], $target_file)) {
            $id = Input::get('editServiceID');
            $service = servicetbl::find($id); 
            $service->serviceName = Input::get('editServiceName');
            $service->serviceDescription = Input::get('editServiceDescription');
            $service->serviceFee = Input::get('editServiceFee');
            $service->serviceTypeID = Input::get('editServiceType');
            $service->serviceImage = $serviceImage;
            $service->save();
            return redirect()->back();
        } else {
            return \Redirect::back();
        }
        }
        }
    }

    public function retrieveServiceData(){
        $ss = DB::table('service_tbl')
        ->select('*')
        ->where('serviceID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function deleteservice(){
        $id = Input::get('deleteServiceID');
        $service = servicetbl::find($id); 
        $service->serviceStatus = 0;
        $service->save();
        return redirect()->back();
    }

    //serviceType functions--------------------------------------------------------------------------->

    public function serviceTypePage(){
        $serviceTypeData = DB::table('servicetype_tbl')
        ->select('*')
        ->where('serviceTypeStatus', 1)->where('serviceTypeAvailability',1)
        ->get();
        return View::make('/serviceTypePage')->with('serviceTypeData', $serviceTypeData);
    }

    public function addServiceType(){
        $serviceType = new servicetypetbl;
        $serviceType->serviceTypeName = Input::get('addServiceTypeName');
        // $serviceType->serviceTypeDescription = Input::get('addServiceTypeDescription');
        $serviceType->serviceTypeStatus = 1;
        $serviceType->serviceTypeAvailability = 1;
        $serviceType->save();
        return redirect()->back();
    }

    public function editServiceType(){
        $id = Input::get('editServiceTypeID');
        $serviceType = servicetypetbl::find($id); 
        $serviceType->serviceTypeName = Input::get('editServiceTypeName');
        // $serviceType->serviceTypeDescription = Input::get('editServiceTypeDesc');
        $serviceType->save();
        return redirect()->back();
    }

    public function retrieveServiceTypeData(){
        $ss = DB::table('servicetype_tbl')
        ->select('*')
        ->where('serviceTypeID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function deleteServiceType(){
        $id = Input::get('deleteServiceTypeID');
        $serviceType = servicetypetbl::find($id); 
        $serviceType->serviceTypeStatus = 0;
        $serviceType->save();
        return redirect()->back();
    }

    public function dashboardPage(){
        $packageData = DB::table('package_tbl')
        ->where('packageStatus', 1)->where('packageAvailability',1)
        ->get();

        $dateTime = Date_create('now');
        $dateToday = $dateTime->format('n.j.Y');
        $dashboardData =  DB::table('reservation_tbl')
        ->join('event_tbl','reservation_tbl.eventID','=','event_tbl.eventID')
        ->join('package_tbl','reservation_tbl.packageID','=','package_tbl.packageID')
        ->join('customer_tbl','event_tbl.customerID','=','customer_tbl.customerID')
        ->select('reservation_tbl.*','event_tbl.*','customer_tbl.*','package_tbl.*')
        ->orderBy('reservation_tbl.created_at', 'desc')
        ->where('reservation_tbl.created_at', '>=', $dateToday)
        ->get();  
        // $dashboardData = DB::table('reservation_tbl')
        //   ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
        //   ->orderBy('reservation_tbl.created_at', 'desc')
        //   ->where('reservation_tbl.reservationStatus', '=', 1)
        //   ->where('reservation_tbl.created_at', '<=', Carbon::now())
        //   ->get();

        return View::make('/dashboardPage')
        ->with('packageData',$packageData)
        ->with('dashboardData', $dashboardData);
    }//Schedule function------------------------------------------------------------------------------>
    

    public function retrieveScheduleData(Request $request){
        $rsvtn = DB::table('reservation_tbl')
        ->join('event_tbl','reservation_tbl.eventID','=','event_tbl.eventID')
        ->join('package_tbl','reservation_tbl.packageID','=','package_tbl.packageID')
        ->join('customer_tbl','event_tbl.customerID','=','customer_tbl.customerID')
        ->select('reservation_tbl.*','event_tbl.*','customer_tbl.*','package_tbl.*')
        ->get();
        return \Response::json(['rsvtn'=>$rsvtn]);
    }

    //Reservation function------------------------------------------------------------------------------>

    public function reservationPage(){
        $reservationData = DB::table('reservation_tbl')
        ->join('event_tbl','reservation_tbl.eventID','=','event_tbl.eventID')
        ->join('package_tbl','reservation_tbl.packageID','=','package_tbl.packageID')
        ->join('customer_tbl','event_tbl.customerID','=','customer_tbl.customerID')
        ->select('reservation_tbl.*','event_tbl.*','customer_tbl.*','package_tbl.*')
        ->get();    

        $addReservationData = DB::table('package_tbl')
        ->select('*')
        ->where('packageStatus', 1)
        ->get();

        return View::make('/transaction_reservationPage')->with('reservationData', $reservationData)->with('addReservationData', $addReservationData);
    }

    public function retrieveReservationData(){
       $ss = DB::table('reservation_tbl')
        ->join('event_tbl','reservation_tbl.eventID','=','event_tbl.eventID')
        ->join('package_tbl','reservation_tbl.packageID','=','package_tbl.packageID')
        ->join('customer_tbl','event_tbl.customerID','=','customer_tbl.customerID')
        ->select('event_tbl.*', 'package_tbl.*', 'customer_tbl.*', 'reservation_tbl.*')
        ->where('reservation_tbl.reservationStatus', 1)
        ->get();

        return \Response::json(['ss'=>$ss]);

    }

    public function retrieveReservationId(){
       $ss = DB::table('reservation_tbl')
        ->where('reservationID', Input::get('sdid'))
        ->get();

        return \Response::json(['ss'=>$ss]);

    }
    public function editReservation(){
        $eventID = DB::table('reservation_tbl')
        ->where('reservationID',Input::get('editReservationID'))
        ->pluck('eventID');
        $event = eventtbl::find($eventID[0]);
        $event->eventDate = Input::get('editReservationDate');
        $event->save();


        $id = Input::get('editReservationID');
        $reservation = reservationtbl::find($id);
        $reservation->packageID = Input::get('editReservationPackage');
        $reservation->save();
        return redirect()->back();
    }

    //Inventory Dish
    public function inventoryDishPage(){
        $dishData = DB::table('dish_tbl')->join('dishtype_tbl','dishtype_tbl.dishTypeID','=','dish_tbl.dishTypeID')
        ->select('*')
        ->where('dish_tbl.dishStatus', 1)
        ->get();

        $addDishData = DB::table('dishtype_tbl')
        ->select('*')
        ->where('dishTypeStatus', 1)
        ->get();

        return View::make('/inventory_dishPage')->with('dishData', $dishData)->with('addDishData', $addDishData);
    }

    public function disableDish(){
        $id = Input::get('disableDishID');
        $inventoryDish = coursetbl::find($id); 
        $inventoryDish->dishAvailability = 0; 
        $inventoryDish->save();
        return redirect()->back();
    }

    public function enableDish(){
        $id = Input::get('enableDishID');
        $inventoryDish = coursetbl::find($id); 
        $inventoryDish->dishAvailability = 1; 
        $inventoryDish->save();
        return redirect()->back();
    }

    public function retrieveInventoryDishID(){
        $ss = DB::table('dish_tbl')
        ->select('*')
        ->where('dishID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    //Inventory Equipment

    public function enableEquipment(){
        $id = Input::get('enableEquipmentID');
        $inventoryEquipment = equipmenttbl::find($id); 
        $inventoryEquipment->equipmentAvailability   = 1; 
        $inventoryEquipment->save();
        return redirect()->back();
    }

    public function disableEquipment(){
        $id = Input::get('disableEquipmentID');
        $inventoryEquipment = equipmenttbl::find($id); 
        $inventoryEquipment->equipmentAvailability = 0; 
        $inventoryEquipment->save();
        return redirect()->back();
    }

    public function addEquipmentUnit(){
        $id = Input::get('id');
        $addQuantityInput = Input::get('addQuantity');
        $minusQuantityInput = Input::get('minusQuantity');
        $equipmentlog = new equipmentlogtbl;
        $equipmentlog->equipmentID = $id;
        $equipmentlog->equipmentQuantityIn = $addQuantityInput;
        $equipmentlog->equipmentQuantityOut = $minusQuantityInput;
        $equipmentlog->equipmentLogDate = Date_create('now');
        $equipmentlog->save();

    }

    //Inventory Location
    public function inventoryLocationPage(){
        $locationData = DB::table('location_tbl')
        ->select('*')
        ->where('locationStatus', 1)
        ->get();
        return View::make('/inventory_locationPage')->with('locationData', $locationData);
    }

    public function enableLocation(){
        $id = Input::get('enableLocationID');
        $inventoryLocation = locationtbl::find($id); 
        $inventoryLocation->locationAvailability = 1; 
        $inventoryLocation->save();
        return redirect()->back();
    }


    public function disableLocation(){
        $id = Input::get('disableLocationID');
        $inventoryLocation = locationtbl::find($id); 
        $inventoryLocation->locationAvailability = 0; 
        $inventoryLocation->save();
        return redirect()->back();
    }

    //Transaction Page 
    public function transactionPage(){
        $transactionData =  DB::table('transaction_tbl')
        ->join('reservation_tbl','reservation_tbl.reservationID','=','transaction_tbl.reservationID')
        ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
        ->join('customer_tbl','customer_tbl.customerID','=','event_tbl.customerID')
        ->select('transaction_tbl.*', 'reservation_tbl.*','event_tbl.*','customer_tbl.*')
        ->get();  
        return View::make('/transactionPage')
        ->with('transactionData', $transactionData);
    }

    public function retrieveTransactionData(){
        $transactionData =  DB::table('transaction_tbl')
        ->join('reservation_tbl','reservation_tbl.reservationID','=','transaction_tbl.reservationID')
        ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
        ->join('customer_tbl','customer_tbl.customerID','=','event_tbl.customerID')
        ->join('package_tbl', 'package_tbl.packageID','=','reservation_tbl.packageID')
        ->join('paymentterm_tbl', 'paymentterm_tbl.paymentTermID','=','reservation_tbl.paymentTermID')
        ->select('transaction_tbl.*', 'reservation_tbl.*','event_tbl.*','customer_tbl.*', 'package_tbl.*', 'paymentterm_tbl.*')
        ->where('transaction_tbl.transactionID', Input::get('getId'))
        ->get();
        return \Response::json(['tdata'=>$transactionData]);
    }


    //VALIDATIONS
    ////DISH TYPE
    public function validateDishTypeName(){
        $avail = DB::table('dishtype_tbl')
            ->where('dishTypeName', Input::get('addDishTypeName'))
            ->count();
        if($avail == 0)
        {
            $isAvailable = true;
            echo json_encode(array(
            'valid' => $isAvailable
            ));
    
        }else{
            $isAvailable = False;
            echo json_encode(array(
            'valid' => $isAvailable
            ));
        }
    }

      

}
