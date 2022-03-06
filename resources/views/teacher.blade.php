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
                    <h1 class="text-white">{{ __('อาจารย์') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<br>


<div class="container">
    @foreach ($data as $item)

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-d-md-5">
            <div class="card">
                <div class="container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $item['teacher_name'] }}</h5>
                    <h5> ห้องพัก : {{ $item['teacher_room'] }} </h5>
                    <h5> เบอร์โทรติดต่อ : {{ $item['teacher_phone'] }} </h5>
                    <h5> E-mail : {{ $item['teacher_email'] }} </h5>
                    <h5> สาขาวิชา : {{ $item['branch_name'] }} </h5>

                    <td>
                        <div class="button">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning rounded" data-toggle="modal"
                                data-target="#exampleModal">
                                แก้ไข
                            </button>
                            <a href="/deleteteacher/{{$item['id']}}" type="button" class="btn btn-danger ml-2 rounded"
                                style="width:60px" type="button">ลบ</a>
                        </div>
                    </td>
                </div>
            </div>
        </div>

    </div>

<!-- Modal edit-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$item['teacher_name']}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/editteacher">
                        @csrf
                        <div class="col">
                            <div class="form-group row">
                                <label for="text" class="col-sm-2 col-form-label">ชื่อ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword" name="teacher_name"
                                        placeholder="กรอกข้อมูล" value="{{$item['teacher_name']}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">ห้องพัก</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword" name="teacher_room"
                                        placeholder="กรอกข้อมูล" value="{{$item['teacher_room']}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">เบอร์โทรติดต่อ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword" name="teacher_phone"
                                        placeholder="กรอกข้อมูล" value="{{$item['teacher_phone']}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">E-mail</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword" name="teacher_email"
                                        placeholder="กรอกข้อมูล" value="{{$item['teacher_email']}}">
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
    @endforeach

</div>
@include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush