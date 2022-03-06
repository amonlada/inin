@extends('layouts.app')

@section('content')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="header bg-dark py-7 py-lg-8">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <h1 class="text-white">{{ __('กิจกรรม') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="container-fluid">
        <h1>
            ที่กรอกข้อมูล
        </h1>
        <div class="card">
            <div class="header">
                <h1 class="m-1">ทะเบียนกิจกรรมนนักศึกษา ด้านที่ 1</h1>
            </div>
            <div class="col">
                <form>
                    <div class="form-group row">
                        <label for="text" class="col-sm-2 col-form-label">ชื่อกิจกรรม</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" placeholder="กรอกข้อมูล">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-sm-2 col-form-label">ประเภทกิจกรรม</label>
                        <div class="col-sm-10">
                            <select class="form-select form-select mb-3" aria-label=".form-select-lg example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-sm-2 col-form-label">ชื่อกิจกรรม</label>
                        <div class="col-sm-10">
                            <div class="form-outline datepicker">
                                <input type="date" class="form-control" id="dateentering" name="dateentering"
                                    placeholder="วัน/เดือน/ปี ที่จอง" value="mybooking" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">รายละเอียด</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" placeholder="กรอกข้อมูล">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">สถานที่จัด</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" placeholder="กรอกข้อมูล">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">ผู้รับผิดชอบ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" placeholder="กรอกข้อมูล">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" placeholder="กรอกข้อมูล">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">จำนวนที่เปิดรับ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" placeholder="กรอกข้อมูล">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">จำนวนหน่วยกิต</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" placeholder="กรอกข้อมูล">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">วัน/เดือน/ปี ที่เปิดรับสมัคร</label>
                        <div class="col-sm-10">
                            <div class="form-outline datepicker">
                                <input type="date" class="form-control" id="dateentering" name="dateentering"
                                    placeholder="วัน/เดือน/ปี ที่จอง" value="mybooking" required>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary me-md-2 rounded-pill" type="button">บันทึก</button>
                    <button class="btn btn-danger ml-2 rounded-pill" type="button">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>

</div>




@include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush