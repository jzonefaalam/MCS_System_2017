<?php
	$avail = DB::table('dishtype_tbl')
        ->where('dishTypeName', Input::get('addDishTypeName'))
        ->count();
    // dd($avail);
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
?>