<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class MajorController extends Controller
{
    public function major(){
        
        return view('major');
    }
    public function index() {
        $major = Major::leftJoin('branch', 'branch.id', '=', 'major.id_branch')
        ->select('major.*','branch.branch_name')->get();
        return view('/major',['data'=>$major->toarray()]);
    }
    //แสดงข้อมูลอันเดียว id 
    public function show($id){
        $major = Model::find($id);
        return view('/major',['data'=>$major->toarray()]);
    }
    //เพิ่ม ข้อมูลใน database
    public function store(Request $request){
        $major = new Major();
        $major->major_name = $request->major_name;
        $major->major_numberofcredits = $request->major_numberofcredits;
        $major->major_money = $request->major_money;
        $major->major_mainsubject = $request->major_mainsubject;
        $major->id_branch = 2;
        
        $major->save();
        return redirect('/major');
    }
    //อัปเดตข้อมูลใน database
    public function update(Request $request){
        $major = Major::find($request->id)->update([
            'major_name'=> $request->subject_name,
            'major_numberofcredits'=> $request->subject_numberofcredits,
            'major_money'=> $request->subject_code,
            'major_mainsubject'=> $request->major_mainsubject,
            'id_branch' => 2,
            
        ]);
        return redirect('/subject');
    }
    //ลบข้อมูลใน database
    public function destroy($id){
        $major = Major::destroy($id);
        return redirect('/major');
    }
}
