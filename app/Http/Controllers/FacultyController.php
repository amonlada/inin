<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class FacultyController extends Controller
{
    public function index() {
        $faculty = Faculty::all();
        return view('/faculty',['data'=>$faculty->toarray()]);
    }
    //แสดงข้อมูลอันเดียว id 
    public function show($id){
        $faculty = Model::find($id);
        return view('/faculty',['data'=>$faculty->toarray()]);
    }
    public function store(Request $request){
        $faculty = new Faculty();
        $faculty->faculty_name = $request->faculty_name;
        $faculty->faculty_address = $request->faculty_address;
        $faculty->faculty_phone = $request->faculty_phone;
        $faculty->faculty_executive = $request->faculty_executive;
        $faculty->faculty_position = $request->faculty_position;
        $faculty->faculty_year = $request->faculty_year;
        $faculty->faculty_email = $request->faculty_email;
    
        $faculty->save();
        return redirect('/faculty');
    }
    //อัปเดตข้อมูลใน database
    public function update(Request $request){
        $activity = Faculty::find($request->id)->update([
            'faculty_name'=> $request->faculty_name,
            'faculty_address'=> $request->faculty_address,
            'faculty_phone'=> $request->faculty_phone,
            'faculty_executive'=> $request->faculty_executive,
            'faculty_position'=> $request->faculty_position,
            'faculty_year'=> $request->faculty_year,
            'faculty_email'=> $request->faculty_email,
         
        ]);
        return redirect('/faculty');
    }
    //ลบข้อมูลใน database
    public function destroy($id){
        $faculty = Faculty::destroy($id);
        return redirect('/faculty');
    }
    //
    public function addfaculty(){  
        return view('addfaculty');
    }

}
