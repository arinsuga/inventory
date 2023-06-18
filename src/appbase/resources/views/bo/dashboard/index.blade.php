@extends('layouts.appbo')

@section('content_title', 'Dashboard')

@section('toolbar')
@endsection

@section('control_sidebar')
@endsection

@section('content')

        <div style="margin-top: 10px;">
            @include('bo.dashboard.index-items')
        </div>

@endsection

@section('js')

    @include('bo.dashboard._script')


@endsection
