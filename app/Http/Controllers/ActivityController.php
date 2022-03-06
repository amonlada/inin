<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function index() {
        $activity = Activity::all();
        return view('/activity',['data'=>$activity->toarray()]);
    }
    //แสดงข้อมูลอันเดียว id 
    public function show($id){
        $activity = Model::find($id);
        return view('/activity',['data'=>$activity->toarray()]);
    }
    //เพิ่ม ข้อมูลใน database
    public function store(Request $request){
        $activity = new Activity();
        $activity->activity_name = $request->activity_name;
        $activity->activity_type = $request->activity_type;
        $activity->activity_date = $request->activity_date;
        $activity->activity_details = $request->activity_details;
        $activity->activity_responsible = $request->activity_responsible;
        $activity->activity_year = $request->activity_year;
        $activity->activity_number = $request->activity_number;
        $activity->activity_numberofcredits = $request->activity_numberofcredits;
        $activity->activity_apply = $request->activity_apply;
        $activity->save();
        return redirect('/activity');
    }
    //อัปเดตข้อมูลใน database
    public function update(Request $request){
        $activity = Activity::find($request->id)->update([
            'activity_name'=> $request->activity_name,
            'activity_type'=> $request->activity_type,
            'activity_date'=> $request->activity_date,
            'activity_details'=> $request->activity_details,
            'activity_responsible'=> $request->activity_responsible,
            'activity_year'=> $request->activity_year,
            'activity_number'=> $request->activity_number,
            'activity_numberofcredits'=> $request->activity_numberofcredits,
            'activity_apply'=> $request->activity_apply
        ]);
        return redirect('/activity');
    }
    //ลบข้อมูลใน database
    public function destroy($id){
        $activity = Activity::destroy($id);
        return redirect('/activity');
    }
    //
    public function addactivity(){  
        return view('addactivity');
    }

   
    
}




