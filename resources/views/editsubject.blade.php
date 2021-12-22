@extends('layouts.app')

@section('content')
<div class="header bg-dark py-7 py-lg-8">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <h1 class="text-white">{{ __('Create Subject.') }}</h1>
                </div>
            </div>
        </div>
    </div>


</div><br>
<div class="container text-dark">
    <div class="row col-md ">
        <form class="row g-3">
            <div class="col-md-12 ">
                <label for="inputEmail4" class="form-label m-3">ชื่อหลักสูตร</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="แก้ไขชื่อหลักสูตร">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label m-3">หน่วยกิตตลอดหลักสูตร</label>
                <input type="text" class="form-control" id="inputPassword4" placeholder="แก้ไข้หน่วยกิต">
            </div>
            <div class="col-6">
                <label for="inputAddress" class="form-label m-3">ค่าเทอม</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="ระบุค่าเทอม">
            </div><br>



        </form>
    </div>
</div>
<div class="container p-10">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-success" type="button">บันทึก</button>

    </div>



</div>

<div class="container-fluid mt--7">


    @include('layouts.footers.auth')
</div>
@endsection