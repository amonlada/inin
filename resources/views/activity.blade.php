@extends('layouts.app')

@section('content')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="header bg-dark py-4 py-lg-4">
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
    <div class="row p-">
        <div class="header">
            <h1 class="m-1">กิจกรรมที่จะมาถึงเร็ว ๆนี้ !!</h1>
        </div>
    </div class="col">
    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col">ชื่อกิจกรรม</th>
                <th scope="col-3">วันที่จัดกิจกรรม</th>
                <th scope="col">รายละเอียด</th>
                <th scope="col">จำนวนรับเข้า</th>
                <th scope="col">หน่วยกิต</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item['activity_name'] }}</td>
                <th>{{ $item['activity_date'] }}</th>
                <td>{{ $item['activity_details'] }}</td>
                <td>{{ $item['activity_number'] }}</td>
                <td>{{ $item['activity_numberofcredits'] }}</td>
               
                <td>
                    <button class="btn btn-secondary rounded" type="button" data-toggle="modal"
                        data-target="#{{$item['activity_name']}}show">
                        <i class="fas fa-search"></i></button>
                </td>
                <td>
                    <div class="button">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning rounded" data-toggle="modal"
                            data-target="#{{$item['activity_name']}}edit">
                            แก้ไข
                        </button>
                        <a href="/deleteactivity/{{$item['id']}}" type="button" class="btn btn-danger ml-2 rounded"
                            style="width:60px" type="button">ลบ</a>
                    </div>
                </td>
            </tr>
            <!-- Modal edit activity-->
            <div class="modal fade" id="{{$item['activity_name']}}edit" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$item['activity_name']}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/editactivity">
                                @csrf
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="text" class="col-sm-2 col-form-label">ชื่อกิจกรรม</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="activity_name" placeholder="กรอกข้อมูล"
                                                value="{{$item['activity_name']}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="text" class="col-sm-2 col-form-label">ประเภทกิจกรรม</label>
                                        <div class="col-sm-10">
                                            <select class="form-select form-select mb-3" name="activity_type"
                                                aria-label=".form-select-lg example">
                                                @if($item['activity_type'] == 1)
                                                <option>Open this select menu</option>
                                                <option value="1" selected>กิจกรรมด้านที่ 1 การพัฒนาศักยภาพตนเอง
                                                </option>
                                                <option value="2">กิจกรรมด้านที่ 2 การธำรงไว้ซึ่งสถาบันชาติ ศาสนา
                                                    พระมหากษัตริย์ เสริมสร้างจิตสำนึกความภาคภูมิใจในมหาวิทยาลัยและคณะ
                                                </option>
                                                <option value="3">กิจกรรมด้านที่ 3 การเสริมสร้างจิตอาสา และจิตสาธารณะ
                                                </option>
                                                <option value="4">กิจกรรมด้านที่ 4 การสร้างคุณธรรมจริยธรรมและศีลธรรม
                                                </option>
                                                <option value="5">กิจกรรมด้านที่ 5
                                                    การอนุรักษ์ศิลปวัฒนธรรมไทยและภูมิปัญญาท้องถิ่น</option>

                                                @elseif($item['activity_type'] == 2)
                                                <option>Open this select menu</option>
                                                <option value="1">กิจกรรมด้านที่ 1 การพัฒนาศักยภาพตนเอง</option>
                                                <option value="2" selected>กิจกรรมด้านที่ 2 การธำรงไว้ซึ่งสถาบันชาติ
                                                    ศาสนา พระมหากษัตริย์
                                                    เสริมสร้างจิตสำนึกความภาคภูมิใจในมหาวิทยาลัยและคณะ</option>
                                                <option value="3">กิจกรรมด้านที่ 3 การเสริมสร้างจิตอาสา และจิตสาธารณะ
                                                </option>
                                                <option value="4">กิจกรรมด้านที่ 4 การสร้างคุณธรรมจริยธรรมและศีลธรรม
                                                </option>
                                                <option value="5">กิจกรรมด้านที่ 5
                                                    การอนุรักษ์ศิลปวัฒนธรรมไทยและภูมิปัญญาท้องถิ่น</option>

                                                @elseif($item['activity_type'] == 3)
                                                <option>Open this select menu</option>
                                                <option value="1">กิจกรรมด้านที่ 1 การพัฒนาศักยภาพตนเอง</option>
                                                <option value="2">กิจกรรมด้านที่ 2 การธำรงไว้ซึ่งสถาบันชาติ ศาสนา
                                                    พระมหากษัตริย์ เสริมสร้างจิตสำนึกความภาคภูมิใจในมหาวิทยาลัยและคณะ
                                                </option>
                                                <option value="3" selected>กิจกรรมด้านที่ 3 การเสริมสร้างจิตอาสา
                                                    และจิตสาธารณะ</option>
                                                <option value="4">กิจกรรมด้านที่ 4 การสร้างคุณธรรมจริยธรรมและศีลธรรม
                                                </option>
                                                <option value="5">กิจกรรมด้านที่ 5
                                                    การอนุรักษ์ศิลปวัฒนธรรมไทยและภูมิปัญญาท้องถิ่น</option>

                                                @elseif($item['activity_type'] == 4)
                                                <option>Open this select menu</option>
                                                <option value="1">กิจกรรมด้านที่ 1 การพัฒนาศักยภาพตนเอง</option>
                                                <option value="2">กิจกรรมด้านที่ 2 การธำรงไว้ซึ่งสถาบันชาติ ศาสนา
                                                    พระมหากษัตริย์ เสริมสร้างจิตสำนึกความภาคภูมิใจในมหาวิทยาลัยและคณะ
                                                </option>
                                                <option value="3">กิจกรรมด้านที่ 3 การเสริมสร้างจิตอาสา และจิตสาธารณะ
                                                </option>
                                                <option value="4" selected>กิจกรรมด้านที่ 4
                                                    การสร้างคุณธรรมจริยธรรมและศีลธรรม</option>
                                                <option value="5">กิจกรรมด้านที่ 5
                                                    การอนุรักษ์ศิลปวัฒนธรรมไทยและภูมิปัญญาท้องถิ่น</option>

                                                @elseif($item['activity_type'] == 5)
                                                <option>Open this select menu</option>
                                                <option value="1">กิจกรรมด้านที่ 1 การพัฒนาศักยภาพตนเอง</option>
                                                <option value="2">กิจกรรมด้านที่ 2 การธำรงไว้ซึ่งสถาบันชาติ ศาสนา
                                                    พระมหากษัตริย์ เสริมสร้างจิตสำนึกความภาคภูมิใจในมหาวิทยาลัยและคณะ
                                                </option>
                                                <option value="3">กิจกรรมด้านที่ 3 การเสริมสร้างจิตอาสา และจิตสาธารณะ
                                                </option>
                                                <option value="4">กิจกรรมด้านที่ 4 การสร้างคุณธรรมจริยธรรมและศีลธรรม
                                                </option>
                                                <option value="5" selected>กิจกรรมด้านที่ 5
                                                    การอนุรักษ์ศิลปวัฒนธรรมไทยและภูมิปัญญาท้องถิ่น</option>
                                                @else
                                                <option selected>Open this select menu</option>
                                                <option value="1">กิจกรรมด้านที่ 1 การพัฒนาศักยภาพตนเอง</option>
                                                <option value="2">กิจกรรมด้านที่ 2 การธำรงไว้ซึ่งสถาบันชาติ ศาสนา
                                                    พระมหากษัตริย์ เสริมสร้างจิตสำนึกความภาคภูมิใจในมหาวิทยาลัยและคณะ
                                                </option>
                                                <option value="3">กิจกรรมด้านที่ 3 การเสริมสร้างจิตอาสา และจิตสาธารณะ
                                                </option>
                                                <option value="4">กิจกรรมด้านที่ 4 การสร้างคุณธรรมจริยธรรมและศีลธรรม
                                                </option>
                                                <option value="5">กิจกรรมด้านที่ 5
                                                    การอนุรักษ์ศิลปวัฒนธรรมไทยและภูมิปัญญาท้องถิ่น</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="text" class="col-sm-2 col-form-label">วันที่จัดกิจกรรม</label>
                                        <div class="col-sm-10">
                                            <div class="form-outline datepicker">
                                                <input type="date" class="form-control" id="dateentering"
                                                    name="activity_date" placeholder="วัน/เดือน/ปี ที่จอง"
                                                    value="{{$item['activity_date']}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">รายละเอียด</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="activity_details" placeholder="กรอกข้อมูล"
                                                value="{{$item['activity_details']}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">สถานที่จัด</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                placeholder="กรอกข้อมูล">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">ผู้รับผิดชอบ</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="activity_responsible" placeholder="กรอกข้อมูล"
                                                value="{{$item['activity_responsible']}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="activity_year" placeholder="กรอกข้อมูล"
                                                value="{{$item['activity_year']}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword"
                                            class="col-sm-2 col-form-label">จำนวนที่เปิดรับ</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="activity_number" placeholder="กรอกข้อมูล"
                                                value="{{$item['activity_number']}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">จำนวนหน่วยกิต</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="activity_numberofcredits" placeholder="กรอกข้อมูล"
                                                value="{{$item['activity_numberofcredits']}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">วัน/เดือน/ปี
                                            ที่เปิดรับสมัคร</label>
                                        <div class="col-sm-10">
                                            <div class="form-outline datepicker">
                                                <input type="date" class="form-control" id="dateentering"
                                                    name="activity_apply" placeholder="วัน/เดือน/ปี ที่จอง"
                                                    value="{{$item['activity_apply']}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" value="{{$item['id']}}" name="id">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="{{$item['activity_name']}}show" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$item['activity_name']}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal show all data activity-->
                        <div class="modal-body">

                            <div class="col">
                                <div class="form-group row">
                                    <label for="text" class="col-sm-2 col-form-label">ชื่อกิจกรรม</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword" name="activity_name"
                                            placeholder="กรอกข้อมูล" value="{{$item['activity_name']}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text" class="col-sm-2 col-form-label">ประเภทกิจกรรม</label>
                                    <div class="col-sm-10">
                                        <select class="form-select form-select mb-3" name="activity_type" disabled
                                            aria-label=".form-select-lg example">
                                            @if($item['activity_type'] == 1)
                                            <option>Open this select menu</option>
                                            <option value="1" selected>กิจกรรมด้านที่ 1 การพัฒนาศักยภาพตนเอง</option>
                                            <option value="2">กิจกรรมด้านที่ 2 การธำรงไว้ซึ่งสถาบันชาติ ศาสนา
                                                พระมหากษัตริย์ เสริมสร้างจิตสำนึกความภาคภูมิใจในมหาวิทยาลัยและคณะ
                                            </option>
                                            <option value="3">กิจกรรมด้านที่ 3 การเสริมสร้างจิตอาสา และจิตสาธารณะ
                                            </option>
                                            <option value="4">กิจกรรมด้านที่ 4 การสร้างคุณธรรมจริยธรรมและศีลธรรม
                                            </option>
                                            <option value="5">กิจกรรมด้านที่ 5
                                                การอนุรักษ์ศิลปวัฒนธรรมไทยและภูมิปัญญาท้องถิ่น</option>

                                            @elseif($item['activity_type'] == 2)
                                            <option>Open this select menu</option>
                                            <option value="1">กิจกรรมด้านที่ 1 การพัฒนาศักยภาพตนเอง</option>
                                            <option value="2" selected>กิจกรรมด้านที่ 2 การธำรงไว้ซึ่งสถาบันชาติ ศาสนา
                                                พระมหากษัตริย์ เสริมสร้างจิตสำนึกความภาคภูมิใจในมหาวิทยาลัยและคณะ
                                            </option>
                                            <option value="3">กิจกรรมด้านที่ 3 การเสริมสร้างจิตอาสา และจิตสาธารณะ
                                            </option>
                                            <option value="4">กิจกรรมด้านที่ 4 การสร้างคุณธรรมจริยธรรมและศีลธรรม
                                            </option>
                                            <option value="5">กิจกรรมด้านที่ 5
                                                การอนุรักษ์ศิลปวัฒนธรรมไทยและภูมิปัญญาท้องถิ่น</option>

                                            @elseif($item['activity_type'] == 3)
                                            <option>Open this select menu</option>
                                            <option value="1">กิจกรรมด้านที่ 1 การพัฒนาศักยภาพตนเอง</option>
                                            <option value="2">กิจกรรมด้านที่ 2 การธำรงไว้ซึ่งสถาบันชาติ ศาสนา
                                                พระมหากษัตริย์ เสริมสร้างจิตสำนึกความภาคภูมิใจในมหาวิทยาลัยและคณะ
                                            </option>
                                            <option value="3" selected>กิจกรรมด้านที่ 3 การเสริมสร้างจิตอาสา
                                                และจิตสาธารณะ</option>
                                            <option value="4">กิจกรรมด้านที่ 4 การสร้างคุณธรรมจริยธรรมและศีลธรรม
                                            </option>
                                            <option value="5">กิจกรรมด้านที่ 5
                                                การอนุรักษ์ศิลปวัฒนธรรมไทยและภูมิปัญญาท้องถิ่น</option>

                                            @elseif($item['activity_type'] == 4)
                                            <option>Open this select menu</option>
                                            <option value="1">กิจกรรมด้านที่ 1 การพัฒนาศักยภาพตนเอง</option>
                                            <option value="2">กิจกรรมด้านที่ 2 การธำรงไว้ซึ่งสถาบันชาติ ศาสนา
                                                พระมหากษัตริย์ เสริมสร้างจิตสำนึกความภาคภูมิใจในมหาวิทยาลัยและคณะ
                                            </option>
                                            <option value="3">กิจกรรมด้านที่ 3 การเสริมสร้างจิตอาสา และจิตสาธารณะ
                                            </option>
                                            <option value="4" selected>กิจกรรมด้านที่ 4
                                                การสร้างคุณธรรมจริยธรรมและศีลธรรม</option>
                                            <option value="5">กิจกรรมด้านที่ 5
                                                การอนุรักษ์ศิลปวัฒนธรรมไทยและภูมิปัญญาท้องถิ่น</option>

                                            @elseif($item['activity_type'] == 5)
                                            <option>Open this select menu</option>
                                            <option value="1">กิจกรรมด้านที่ 1 การพัฒนาศักยภาพตนเอง</option>
                                            <option value="2">กิจกรรมด้านที่ 2 การธำรงไว้ซึ่งสถาบันชาติ ศาสนา
                                                พระมหากษัตริย์ เสริมสร้างจิตสำนึกความภาคภูมิใจในมหาวิทยาลัยและคณะ
                                            </option>
                                            <option value="3">กิจกรรมด้านที่ 3 การเสริมสร้างจิตอาสา และจิตสาธารณะ
                                            </option>
                                            <option value="4">กิจกรรมด้านที่ 4 การสร้างคุณธรรมจริยธรรมและศีลธรรม
                                            </option>
                                            <option value="5" selected>กิจกรรมด้านที่ 5
                                                การอนุรักษ์ศิลปวัฒนธรรมไทยและภูมิปัญญาท้องถิ่น</option>
                                            @else
                                            <option selected>Open this select menu</option>
                                            <option value="1">กิจกรรมด้านที่ 1 การพัฒนาศักยภาพตนเอง</option>
                                            <option value="2">กิจกรรมด้านที่ 2 การธำรงไว้ซึ่งสถาบันชาติ ศาสนา
                                                พระมหากษัตริย์ เสริมสร้างจิตสำนึกความภาคภูมิใจในมหาวิทยาลัยและคณะ
                                            </option>
                                            <option value="3">กิจกรรมด้านที่ 3 การเสริมสร้างจิตอาสา และจิตสาธารณะ
                                            </option>
                                            <option value="4">กิจกรรมด้านที่ 4 การสร้างคุณธรรมจริยธรรมและศีลธรรม
                                            </option>
                                            <option value="5">กิจกรรมด้านที่ 5
                                                การอนุรักษ์ศิลปวัฒนธรรมไทยและภูมิปัญญาท้องถิ่น</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text" class="col-sm-2 col-form-label">วันที่จัดกิจกรรม</label>
                                    <div class="col-sm-10">
                                        <div class="form-outline datepicker">
                                            <input type="date" class="form-control" id="dateentering"
                                                name="activity_date" placeholder="วัน/เดือน/ปี ที่จอง"
                                                value="{{$item['activity_date']}}" required disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">รายละเอียด</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword"
                                            name="activity_details" placeholder="กรอกข้อมูล"
                                            value="{{$item['activity_details']}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">สถานที่จัด</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword" disabled
                                            placeholder="กรอกข้อมูล">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">ผู้รับผิดชอบ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword"
                                            name="activity_responsible" placeholder="กรอกข้อมูล"
                                            value="{{$item['activity_responsible']}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword" name="activity_year"
                                            placeholder="กรอกข้อมูล" value="{{$item['activity_year']}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">จำนวนที่เปิดรับ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword"
                                            name="activity_number" placeholder="กรอกข้อมูล"
                                            value="{{$item['activity_number']}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">จำนวนหน่วยกิต</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword"
                                            name="activity_numberofcredits" placeholder="กรอกข้อมูล"
                                            value="{{$item['activity_numberofcredits']}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">วัน/เดือน/ปี
                                        ที่เปิดรับสมัคร</label>
                                    <div class="col-sm-10">
                                        <div class="form-outline datepicker">
                                            <input type="date" class="form-control" id="dateentering"
                                                name="activity_apply" placeholder="วัน/เดือน/ปี ที่จอง"
                                                value="{{$item['activity_apply']}}" required disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a type="button" class="btn btn-success me-md-2 rounded" data-toggle="modal" data-target="#create"
            style="width:100px;">เพิ่ม</a>
    </div>
</div>


<!-- Modal create activity-->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มกิจกรรม</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/addactivity">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">ชื่อกิจกรรม</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" name="activity_name"
                                    placeholder="กรอกข้อมูล" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">ประเภทกิจกรรม</label>
                            <div class="col-sm-10">
                                <select class="form-select form-select mb-3" name="activity_type"
                                    aria-label=".form-select-lg example">
                                    <option selected>ประเภทกิจกรรม</option>
                                    <option value="1">กิจกรรมด้านที่ 1 การพัฒนาศักยภาพตนเอง</option>
                                    <option value="2">กิจกรรมด้านที่ 2 การธำรงไว้ซึ่งสถาบันชาติ ศาสนา พระมหากษัตริย์
                                        เสริมสร้างจิตสำนึกความภาคภูมิใจในมหาวิทยาลัยและคณะ</option>
                                    <option value="3">กิจกรรมด้านที่ 3 การเสริมสร้างจิตอาสา และจิตสาธารณะ</option>
                                    <option value="4">กิจกรรมด้านที่ 4 การสร้างคุณธรรมจริยธรรมและศีลธรรม</option>
                                    <option value="5">กิจกรรมด้านที่ 5 การอนุรักษ์ศิลปวัฒนธรรมไทยและภูมิปัญญาท้องถิ่น
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">วันที่จัดกิจกรรม</label>
                            <div class="col-sm-10">
                                <div class="form-outline datepicker">
                                    <input type="date" class="form-control" id="dateentering" name="activity_date"
                                        placeholder="วัน/เดือน/ปี ที่จอง" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">รายละเอียด</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" name="activity_details"
                                    placeholder="กรอกข้อมูล" value="">
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
                                <input type="text" class="form-control" id="inputPassword" name="activity_responsible"
                                    placeholder="กรอกข้อมูล" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" name="activity_year"
                                    placeholder="กรอกข้อมูล" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">จำนวนที่เปิดรับ</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" name="activity_number"
                                    placeholder="กรอกข้อมูล" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">จำนวนหน่วยกิต</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword"
                                    name="activity_numberofcredits" placeholder="กรอกข้อมูล" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">วัน/เดือน/ปี
                                ที่เปิดรับสมัคร</label>
                            <div class="col-sm-10">
                                <div class="form-outline datepicker">
                                    <input type="date" class="form-control" id="dateentering" name="activity_apply"
                                        placeholder="วัน/เดือน/ปี ที่จอง" value="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </form>
            </div>
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