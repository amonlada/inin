<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    public function branch(){
        
        return view('branch');
    }
    public function index() {
        $branch = Branch::leftJoin('faculty', 'faculty.id', '=', 'branch.id_faculty')
        ->select('branch.*','faculty.faculty_name')->get();
        return view('/branch',['data'=>$branch->toarray()]);
    }
    //แสดงข้อมูลอันเดียว id 
    public function show($id){
        $branch = Model::find($id);
        return view('/branch',['data'=>$branch->toarray()]);
    }
    //เพิ่ม ข้อมูลใน database
    public function store(Request $request){
        $branch = new Branch();
        $branch->branch_name = $request->branch_name;
        $branch->branch_phone = $request->branch_phone;
        $branch->brannch_Code = $request->branch_code;
        $branch->id_faculty = 1;
        $branch->save();
        return redirect('/branch');
    }
    //อัปเดตข้อมูลใน database
    public function update(Request $request){
        $branch = Branch::where('id',$request->id)->update([
            'branch_name'=> $request->branch_name,
            'branch_phone'=> $request->branch_phone,
            'brannch_Code'=> $request->brannch_Code,
            'id_faculty'=> 1,
        ]);
        return redirect('/branch');
    }
    //ลบข้อมูลใน database
    public function destroy($id){
        $branch = Branch::destroy($id);
        return redirect('/branch');
    }
    //
   
}
