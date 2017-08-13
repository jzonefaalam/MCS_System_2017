<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Query\Builder;

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

class adminController extends Controller
{
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
        $dishTypeImage = ($_FILES["addDishImage"]["name"]);
        if($dishTypeImage==null){
            $coursetbl = new coursetbl;
            $coursetbl->dishName = Input::get('addDishName');
            $coursetbl->dishDescription = Input::get('addDishDesc');
            $coursetbl->dishCost = Input::get('addDishPrice');
            $coursetbl->dishTypeID = Input::get('addDishType');
            $coursetbl->dishAvailability = 1;
            $coursetbl->dishStatus = 1;
            $coursetbl->dishImage = ($_FILES["addDishImage"]["name"]);
            $coursetbl->save();
            return redirect()->back();
        }
        else{
        $target_dir = "images\\";
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
        // if (file_exists($target_file)) {
        //     $id = Input::get('companyId');
        //     $company = MCompanyInfo::find($id);
        //     $company->strCompanyLogo=($_FILES["companylogo"]["name"]);
        //     $company->save();
        //     return \Redirect::back();
        // }
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
        $coursetbl->dishImage = ($_FILES["addDishImage"]["name"]);
        $coursetbl->save();
        return redirect()->back();
        } else {
            alert('File Not Uploaded!');
            return \Redirect::back();
        }
        }
        }
       
    }

    public function editDish(){
        $id = Input::get('editDishID');
        $coursetbl = coursetbl::find($id);
        $coursetbl->dishName= Input::get('editDishName');
        $coursetbl->dishDescription= Input::get('editDishDesc');
        $coursetbl->dishCost= Input::get('editDishPrice');
        $coursetbl->dishTypeID= Input::get('editDishType');
        $coursetbl->save();
        return redirect()->back();
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
        $target_dir = "images\\";
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
        // if (file_exists($target_file)) {
        //     $id = Input::get('companyId');
        //     $company = MCompanyInfo::find($id);
        //     $company->strCompanyLogo=($_FILES["companylogo"]["name"]);
        //     $company->save();
        //     return \Redirect::back();
        // }
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
            alert('File Not Uploaded!');
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
        $courseType->dishTypeImage = ($_FILES['editDishTypeImage']['name']);
        $coursetypetbl->save();
        return redirect()->back();
        }
        else{
        $target_dir = "images\\";
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
        // if (file_exists($target_file)) {
        //     $id = Input::get('companyId');
        //     $company = MCompanyInfo::find($id);
        //     $company->strCompanyLogo=($_FILES["companylogo"]["name"]);
        //     $company->save();
        //     return \Redirect::back();
        // }
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

    public function editLocation(){
        $id = Input::get('editLocationID');
        $location = locationtbl::find($id); 
        $location->locationName = Input::get('editLocationName');
        $location->locationContactPerson = Input::get('editLocationContactPerson');
        $location->locationDescription = Input::get('editLocationDesc');
        $location->locationAddress = Input::get('editLocationAddress');
        $location->locationContactNumber = Input::get('editLocationContactNumber');
        $location->locationCapacity = Input::get('editLocationCapacity');
        $location->locationFee = Input::get('editLocationPrice');
        $location->save();
        return redirect()->back();
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
        ->join('packageinclusion_tbl','packageinclusion_tbl.packageID','=','package_tbl.packageID')
        ->join('dishtype_tbl','dishtype_tbl.dishTypeID','=','packageinclusion_tbl.dishTypeID')
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

        return View::make('/PackagePage')
        ->with('packageData', $packageData)
        ->with('dishTypeData', $dishTypeData)
        ->with('equipmentData', $equipmentData);
    }

    public function addPackage(Request $request){
        $package = new packagetbl;
        $package->packageName = Input::get('addPackageName');
        $package->packageDescription = Input::get('addPackageDescription');
        $package->packageCost = Input::get('addPackageCost');
        $package->packageImage = "No Image";
        $package->packageStatus = 1;
        $package->packageAvailability = 1;
        $package->save();
        $dti = $_POST['addDishTypeInclusion'];
        foreach ($dti as $dtinclusion) {
            $packageInclusion = new packageinclusiontbl;
            $packageInclusion->packageID = 1;
            $packageInclusion->dishTypeID = $dtinclusion;
            $packageInclusion->save();
        }
        return redirect()->back();
    }

    public function editPackage(){
        $id = Input::get('editPackageID');
        $package = packagetbl::find($id); 
        $package->packageName = Input::get('editPackageName');
        $package->packageDescription = Input::get('editPackageDescription');
        $package->packageCost = Input::get('editPackageCost');
        $package->save();
        return redirect()->back();
    }

    public function retrievePackageData(){
        $ss = DB::table('package_tbl')
        ->select('*')
        ->where('packageID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function deletePackage(){
        $id = Input::get('deletePackageID');
        $package = packagetbl::find($id); 
        $package->packageStatus = 0;
        $package->save();
        return redirect()->back();
    }
    //Equipment functions------------------------------------------------------------------------->

    public function equipmentPage(){
        $equipmentData = DB::table('equipment_tbl')
        ->join('equipmenttype_tbl','equipmenttype_tbl.equipmentTypeID','=','equipment_tbl.equipmentTypeID')
        ->select('*')
        ->where('equipmentStatus', 1)
        ->get();

        $addEquipmentData = DB::table('equipmenttype_tbl')
        ->select('*')
        ->where('equipmentTypeStatus', 1)
        ->get();

        return View::make('/EquipmentPage')
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
        $equipment->equipmentUnit = 0;
        $equipment->equipmentAvailability = 1;
        $equipment->equipmentStatus = 1;
        $equipment->equipmentTypeID = Input::get('addEquipmentType');
        $equipment->equipmentImage = "No Image";
        $equipment->save();
        return redirect()->back();
        }
        else{
        $target_dir = "images\\";
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
        // if (file_exists($target_file)) {
        //     $id = Input::get('companyId');
        //     $company = MCompanyInfo::find($id);
        //     $company->strCompanyLogo=($_FILES["companylogo"]["name"]);
        //     $company->save();
        //     return \Redirect::back();
        // }
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
        $id = Input::get('editEquipmentID');
        $equipment = equipmenttbl::find($id);
        $equipment->equipmentName = Input::get('editEquipmentName');
        $equipment->equipmentDescription = Input::get('editEquipmentDescription');
        $equipment->equipmentRatePerHour = Input::get('editEquipmentRatePerHour');
        $equipment->equipmentUnit = 9999;
        $equipment->save();
        return redirect()->back();
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
        $service = new servicetbl;
        $service->serviceName = Input::get('addServiceName');
        $service->serviceDescription = Input::get('addServiceDescription');
        $service->serviceFee = Input::get('addServiceFee');
        $service->serviceTypeID = Input::get('addServiceType');
        $service->serviceStatus = 1;
        $service->serviceAvailability = 1;
        $service->serviceImage = 1;
        $service->save();
        return redirect()->back();
    }

    public function editService(){
        $id = Input::get('editServiceID');
        $service = servicetbl::find($id); 
        $service->serviceName = Input::get('editServiceName');
        $service->serviceDescription = Input::get('editServiceDescription');
        $service->serviceFee = Input::get('editServiceFee');
        $service->serviceTypeID = Input::get('editServiceType');
        $service->save();
        return redirect()->back();
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
        $serviceType->serviceTypeDescription = Input::get('addServiceTypeDescription');
        $serviceType->serviceTypeStatus = 1;
        $serviceType->serviceTypeAvailability = 1;
        $serviceType->save();
        return redirect()->back();
    }

    public function editServiceType(){
        $id = Input::get('editServiceTypeID');
        $serviceType = servicetypetbl::find($id); 
        $serviceType->serviceTypeName = Input::get('editServiceTypeName');
        $serviceType->serviceTypeDescription = Input::get('editServiceTypeDesc');
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

    public function schedulePage(){


        
        return View::make('/schedulePage');
    }//Schedule function------------------------------------------------------------------------------>
    

    public function retrieveScheduleData(Request $request){

        $rsvtn = DB::table('reservation_tbl')
              ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
              ->where('reservation_tbl.reservationStatus', '=', 1)
              ->get();

      return \Response::json(['rsvtn'=>$rsvtn]);
    }

    //Reservation function------------------------------------------------------------------------------>

    public function reservationPage(){
        $reservationData = DB::table('reservation_tbl')
        ->join('event_tbl','reservation_tbl.eventID','=','event_tbl.eventID')
        ->join('package_tbl','reservation_tbl.packageID','=','package_tbl.packageID')
        ->join('customer_tbl','event_tbl.customerID','=','customer_tbl.customerID')
        ->join('equipmentavailed_tbl', 'equipmentavailed_tbl.reservationID', '=', 'reservation_tbl.reservationID')
        ->select('event_tbl.*', 'package_tbl.*', 'customer_tbl.*', 'reservation_tbl.*', 'equipmentavailed_tbl.*')
        ->where('reservation_tbl.reservationStatus', 1)
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
     public function inventoryEquipmentPage(){
        $equipmentData = DB::table('equipment_tbl')
        ->select('*')
        ->where('equipmentStatus', 1)
        ->get();
        return View::make('/inventory_equipmentPage')->with('equipmentData', $equipmentData);
    }

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
        $id = Input::get('updateEquipmentID');
        $inventoryEquipment = equipmenttbl::find($id);
        $additionalEquipmentUnit = Input::get('updateEquipmentUnit'); 
        $inventoryEquipment->equipmentUnit = (Input::get('remainingQuantity'))+ $additionalEquipmentUnit; 
        $inventoryEquipment->save();
        return redirect()->back();
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
