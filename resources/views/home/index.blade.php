@extends('layouts.master')
@section('breadcrumbs')
<ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"></li>
</ol>
@endsection
@section('page_title','')
@section('content')
    @if(Auth::user()->user_level_id == 1)
        @include('home.admindashboard')
    @else
        @include('home.userdashboard')
    @endif
@endsection
