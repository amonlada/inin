<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function subject(){
        
        return view('subject');
    }
    public function index() {
        $subject = Subject::leftJoin('major', 'major.id', '=', 'subject.id_major')
        ->select('subject.*','major.major_name')->get();
        return view('/subject',['data'=>$subject->toarray()]);


    }
    //แสดงข้อมูลอันเดียว id 
    public function show($id){
        $subject = Model::find($id);
        return view('/subject',['data'=>$subject->toarray()]);
    }
    //เพิ่ม ข้อมูลใน database
    public function store(Request $request){
        $subject = new Subject();
        $subject->subject_name = $request->subject_name;
        $subject->subject_numberofcredits = $request->subject_numberofcredits;
        $subject->subject_code = $request->subject_code;
        $subject->id_major = 8;
        $subject->save();
        return redirect('/subject');
    }
    //อัปเดตข้อมูลใน database
    public function update(Request $request){
        $subject = Subject::find($request->id)->update([
            'subject_name'=> $request->subject_name,
            'subject_numberofcredits'=> $request->subject_numberofcredits,
            'subject_code'=> $request->subject_code,
        ]);
        return redirect('/subject');
    }
    //ลบข้อมูลใน database
    public function destroy($id){
        $subject = Subject::destroy($id);
        return redirect('/subject');
    }
}

