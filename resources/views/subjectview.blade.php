@extends('layouts.app')

@section('content')
    @include('layouts.headers.createsubject')
    
    <div class="container-fluid mt--7">
       

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush