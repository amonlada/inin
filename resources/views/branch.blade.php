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
                    <h1 class="text-white">{{ __('สาขาวิชา') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!--  สาขาวิชา -->
<div class="container">
    <div class="row p-">
        <div class="header">
        </div>
    </div class="col">
    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col-3">สาขาวิชา</th>
                <th scope="col">รหัสหัวหน้าสาขา</th>
                <th scope="col">เบอร์โทร</th>
                <th scope="col">คณะ</th>



            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <th>{{ $item['branch_name'] }}</th>
                <td>{{ $item['brannch_Code'] }}</td>
                <td>{{ $item['branch_phone'] }}</td>
                <td>{{ $item['faculty_name'] }}</td>
               

                <td>
                    <button class="btn btn-secondary rounded" type="button" data-toggle="modal"
                        data-target="#{{$item['branch_name']}}show">
                        <i class="fas fa-search"></i></button>
                </td>
                <td>
                    <div class="button">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning rounded" data-toggle="modal"
                            data-target="#{{$item['branch_name']}}edit">
                            แก้ไข
                        </button>
                        <a href="/deletebranch/{{$item['id']}}" type="button" class="btn btn-danger ml-2 rounded"
                            style="width:60px" type="button">ลบ</a>
                    </div>
                </td>
            </tr>
            <!-- Modal edit branch-->
            <div class="modal fade" id="{{$item['branch_name']}}edit" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$item['branch_name']}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/editbranch">
                                @csrf
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="text" class="col-sm-2 col-form-label">ชื่อสาขา</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="branch_name" placeholder="กรอกข้อมูล"
                                                value="{{$item['branch_name']}}">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="inputPassword"
                                            class="col-sm-2 col-form-label">รหัสหัวหน้าสาขา</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="brannch_Code" placeholder="กรอกข้อมูล"
                                                value="{{$item['brannch_Code']}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">เบอร์โทร</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                name="branch_phone" placeholder="กรอกข้อมูล"
                                                value="{{$item['branch_phone']}}">
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

            <div class="modal fade" id="{{$item['branch_name']}}show" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$item['branch_name']}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal show all data activity-->
                        <div class="modal-body">

                            <div class="col">
                                <div class="form-group row">
                                    <label for="text" class="col-sm-2 col-form-label">ชื่อสาขา</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword" name="branch_name"
                                            placeholder="กรอกข้อมูล" value="{{$item['branch_name']}}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">รหัสหัวหน้าสาขา</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword" name="branch_code"
                                            placeholder="กรอกข้อมูล" value="{{$item['brannch_Code']}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">เบอร์โทร</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword" name="branch_phone"
                                            placeholder="กรอกข้อมูล" value="{{$item['branch_phone']}}" disabled>
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


<!-- Modal create สาขาวิชา-->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มสาขา</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/addbranch">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">ชื่อสาขา</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" name="branch_name"
                                    placeholder="กรอกข้อมูล" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">รหัสหัวหน้าสาขา</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" name="branch_code"
                                    placeholder="กรอกข้อมูล" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">เบอร์โทร</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" name="branch_phone"
                                    placeholder="กรอกข้อมูล" value="">
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