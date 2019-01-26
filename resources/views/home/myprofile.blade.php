@extends('layouts.master')
@section('breadcrumbs')
<ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"></li>
</ol>
@endsection
@section('page_title','Profil Saya')
@section('content')
    <div class="row row-sm">
        <div class="col-lg-8">
            <div class="card card-profile">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="card-profile-name">{{ Auth::user()->name }}</h3>
                            <p class="card-profile-position">{{ Auth::user()->level->name }}</p>
                        </div>
                    </div><!-- media -->
                </div><!-- card-body -->
                <div class="card-footer">
                    <div>
                        <a href="">Edit Profil</a>
                        <a href="">Ganti Password</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card pd-25">
                <div class="slim-card-title">Contact &amp; Personal Info</div>
                <div class="media-list mg-t-25">
                    <div class="media">
                        <div>
                            <i class="icon ion-ios-email-outline tx-24 lh-0"></i>
                        </div>
                        <div class="media-body mg-l-15 mg-t-4">
                            <h6 class="tx-14 tx-gray-700">Email</h6>
                            <span class="d-block">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                    <div class="media mg-t-25">
                        <div>
                            <i class="icon ion-home tx-18 lh-0"></i>
                        </div>
                        <div class="media-body mg-l-15 mg-t-2">
                            <h6 class="tx-14 tx-gray-700">Alamat</h6>
                            <span class="d-block">{{ Auth::user()->address }}</span>
                        </div>
                    </div>
                    <div class="media mg-t-25">
                        <div>
                            <i class="icon ion-grid tx-18 lh-0"></i>
                        </div>
                        <div class="media-body mg-l-15 mg-t-2">
                            <h6 class="tx-14 tx-gray-700">Jenis Kelamin</h6>
                            <span class="d-block">{{ Auth::user()->gender == 'L' ? 'Laki Laki' : 'Perempuan' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
