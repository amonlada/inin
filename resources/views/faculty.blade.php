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
                    <h1 class="text-white">{{ __('คณะและผู้บริหาร') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row p-">
        <div class="header">
            <h1 class="m-1"></h1>
        </div>
    </div class="col">
    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col-3">ชื่อคณะ</th>
                <th scope="col">เบอร์โทรติดต่อ</th>
                <th scope="col">ผู้บริหาร</th>
                <th scope="col">ตำแหน่ง</th>
                <th scope="col">E-mail</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <th>{{ $item['faculty_name'] }}</th>
                <td>{{ $item['faculty_phone'] }}</td>
                <td>{{ $item['faculty_executive'] }}</td>
                <td>{{ $item['faculty_position'] }}</td>
                <td>{{ $item['faculty_email'] }}</td>
                <td>
                    <button class="btn btn-secondary rounded" type="button" data-toggle="modal"
                        data-target="#exampleModa2">
                        <i class="fas fa-search"></i></button>
                </td>
                <td>
                    <div class="button">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning rounded" data-toggle="modal"
                            data-target="#exampleModal">
                            แก้ไข
                        </button>
                        <a href="/deletefaculty/{{$item['id']}}" type="button" class="btn btn-danger ml-2 rounded"
                            style="width:60px" type="button">ลบ</a>
                    </div>
                </td>
            </tr>

            <!-- Modal edit faculty-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$item['faculty_name']}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/editfaculty">
                                @csrf
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="text" class="col-sm-2 col-form-label">คณะ</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="faculty_name" placeholder="กรอกข้อมูล"
                                                value="{{$item['faculty_name']}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">ที่ตั้ง</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="faculty_address" placeholder="กรอกข้อมูล"
                                                value="{{$item['faculty_address']}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPassword"
                                            class="col-sm-2 col-form-label">เบอร์โทรติดต่อ</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="faculty_phone" placeholder="กรอกข้อมูล"
                                                value="{{$item['faculty_phone']}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">ผู้บริหาร</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="faculty_executive" placeholder="กรอกข้อมูล"
                                                value="{{$item['faculty_executive']}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">ตำแหน่ง</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="faculty_position" placeholder="กรอกข้อมูล"
                                                value="{{$item['faculty_position']}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword"
                                            class="col-sm-2 col-form-label">ปีที่รับตำแหน่ง</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="faculty_year" placeholder="กรอกข้อมูล"
                                                value="{{$item['faculty_year']}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">E-Mail</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="faculty_email" placeholder="กรอกข้อมูล"
                                                value="{{$item['faculty_email']}}">
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
            <div class="modal fade" id="exampleModa2" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$item['faculty_name']}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal show faculty-->
                        <div class="modal-body">

                            <div class="col">
                                <div class="form-group row">
                                    <label for="text" class="col-sm-2 col-form-label">คณะ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword" name="faculty_name"
                                            placeholder="กรอกข้อมูล" value="{{$item['faculty_name']}}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">ที่ตั้ง</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword"
                                            name="faculty_address" placeholder="กรอกข้อมูล"
                                            value="{{$item['faculty_address']}}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">เบอร์โทรติดต่อ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword" name="faculty_phone"
                                            placeholder="กรอกข้อมูล" value="{{$item['faculty_phone']}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">ผู้บริหาร</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword"
                                            name="faculty_executive" placeholder="กรอกข้อมูล"
                                            value="{{$item['faculty_executive']}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">ตำแหน่ง</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword"
                                            name="faculty_position" placeholder="กรอกข้อมูล"
                                            value="{{$item['faculty_position']}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword"
                                        class="col-sm-2 col-form-label">ปีที่ได้รับตำแหน่ง</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword" name="faculty_year"
                                            placeholder="กรอกข้อมูล" value="{{$item['faculty_year']}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">E-mail</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword" name="faculty_email"
                                            placeholder="กรอกข้อมูล" value="{{$item['faculty_email']}}" disabled>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่ม</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/addfaculty">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">คณะ</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" name="faculty_name"
                                    placeholder="กรอกข้อมูล" value="{{$item['faculty_name']}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">ที่ตั้ง</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" name="faculty_address"
                                    placeholder="กรอกข้อมูล" value="{{$item['faculty_address']}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">เบอร์โทรติดต่อ</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" name="faculty_phone"
                                    placeholder="กรอกข้อมูล" value="{{$item['faculty_phone']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">ผู้บริหาร</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" name="faculty_executive"
                                    placeholder="กรอกข้อมูล" value="{{$item['faculty_executive']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">ตำแหน่ง</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" name="faculty_position"
                                    placeholder="กรอกข้อมูล" value="{{$item['faculty_position']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">ปีที่รับตำแหน่ง</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" name="faculty_year"
                                    placeholder="กรอกข้อมูล" value="{{$item['faculty_year']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">E-Mail</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" name="faculty_email"
                                    placeholder="กรอกข้อมูล" value="{{$item['faculty_email']}}">
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

@include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush