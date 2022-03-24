<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input as InputInput;

class TeacherController extends Controller
{
    public function teacher(){
        
        return view('teacher');
    }
    public function index() {
        $teacher = Teacher::leftJoin('branch', 'branch.id', '=', 'teacher.id_branch')
        ->select('teacher.*','branch.branch_name')->get();
        return view('/teacher',['data'=>$teacher->toarray()]);
    }
    //แสดงข้อมูลอันเดียว id 
    public function show($id){
        $teacher = Model::find($id);
        return view('/teacher',['data'=>$teacher->toarray()]);
    }
    //เพิ่ม ข้อมูลใน database
    public function store(Request $request){
        $teacher = new Teacher();
        $teacher->teacher_name = $request->teacher_name;
        $teacher->teacher_room = $request->teacher_room;
        $teacher->teacher_image=$request->teacher_image;
        $teacher->teacher_phone = $request->teacher_phone;
        $teacher->teacher_email = $request->teacher_email;
        $teacher->id_branch = 1;
        
        $teacher->save();
        return redirect('/teacher');
    }
    //อัปเดตข้อมูลใน database
    public function update(Request $request){
        $teacher = Teacher::where('id',$request->id)->update([
            'teacher_name'=> $request->teacher_name,
            'teacher_room'=> $request->teacher_room,
            'teacher_image'=> $request->teacher_image,
            'teacher_phone'=> $request->teacher_phone,
            'teacher_email'=> $request->teacher_email,
            'id_branch'=>1,
        ]);
        return redirect('/teacher');
    }
    //ลบข้อมูลใน database
    public function destroy($id){
        $teacher = Teacher::destroy($id);
        return redirect('/teacher');
    }
    
}
