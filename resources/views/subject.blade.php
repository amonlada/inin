@extends('layouts.app')

@section('content')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="header bg-dark py-4 py-lg-3">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <h1 class="text-white">{{ __('วิชาเรียน') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!--วิชาเรียน-->
<div class="container">
    <div class="row p-">
        <div class="header">
        </div>
    </div class="col">
    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col-3">ชื่อวิชา</th>
                <th scope="col">จำนวนหน่วยกิตแต่ละวิชา</th>
                <th scope="col">รหัส</th>
                <th scope="col">สาขาวิชา</th>



            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <th>{{ $item['subject_name'] }}</th>
                <td>{{ $item['subject_numberofcredits'] }}</td>
                <td>{{ $item['subject_code'] }}</td>
                <td>{{ $item['major_name'] }}</td>

                <!-- <td>
                    <button class="btn btn-secondary rounded" type="button" data-toggle="modal"
                        data-target="#show{{$item['id']}}">
                        <i class="fas fa-search"></i></button>
                </td>
-->
                <td>
                    <div class="button">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning rounded" data-toggle="modal"
                            data-target="#edit{{$item['id']}}">
                            แก้ไข
                        </button>
                        <a href="/deletesubject/{{$item['id']}}" type="button" class="btn btn-danger ml-2 rounded"
                            style="width:60px" type="button">ลบ</a>
                    </div>
                </td>
            </tr>
            <!-- Modal edit subject-->
            <div class="modal fade" id="edit{{$item['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$item['subject_name']}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/editsubject">
                                @csrf
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="text" class="col-sm-2 col-form-label">ชื่อวิชา</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="subject_name" placeholder="กรอกข้อมูล"
                                                value="{{$item['subject_name']}}">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="inputPassword"
                                            class="col-sm-2 col-form-label">จำนวนหน่วยกิตแต่ละวิชา</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="subject_numberofcredits" placeholder="กรอกข้อมูล"
                                                value="{{$item['subject_numberofcredits']}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">รหัสวิชา</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="subject_code" placeholder="กรอกข้อมูล"
                                                value="{{$item['subject_code']}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">หลักสูตร</label>
                                        <div class="col-sm-10">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    เลือกหลักสูตร
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                </ul>
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

            <!--   <div class="modal fade" id="show{{$item['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$item['subject_name']}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        //Modal show all data activity
                        <div class="modal-body">

                            <div class="col">
                                <div class="form-group row">
                                    <label for="text" class="col-sm-2 col-form-label">ชื่อวิชา</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword" name="subject_name"
                                            placeholder="กรอกข้อมูล" value="{{$item['subject_name']}}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword"
                                        class="col-sm-2 col-form-label">จำนวนหน่วยกิตแต่ละวิช</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword"
                                            name="subject_numberofcredits" placeholder="กรอกข้อมูล"
                                            value="{{$item['subject_numberofcredits']}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">รหัสวิชา</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword" name="subject_code"
                                            placeholder="กรอกข้อมูล" value="{{$item['subject_code']}}" disabled>
                                    </div>
                                </div>
                            </div>
                            



                        </div>
                    </div>-->
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


<!-- Modal create subject-->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่ม</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/addsubject">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">ชื่อวิชา</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" name="subject_name"
                                    placeholder="กรอกข้อมูล" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">จำนวนหน่วยกิตแต่ละวิช</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword"
                                    name="subject_numberofcredits" placeholder="กรอกข้อมูล" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">รหัสวิชา</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" name="subject_code"
                                    placeholder="กรอกข้อมูล" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">หลักสูตร</label>
                            <div class="col-sm-10">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        เลือกหลักสูตร
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">{{ $item['major_name'] }}</a></li>
                                    </ul>
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