@extends('app')
@section('title', 'Home')

@section('content')
    <!--Row-->
    <div class="row row-sm">
        <div class="col-lg-12">
            @if(Auth::user()->premium_status == 0)
                <div class="row row-sm  mt-lg-4">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="card bg-warning custom-card card-box">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="offset-xl-3 offset-sm-6 col-xl-8 col-sm-6 col-12">
                                        <h4 class="d-flex mb-3">
                                            <span class="font-weight-bold text-white ml-3">Welcome, {{ Auth::user()->name }}!</span>
                                        </h4>
                                        <p class="tx-white-8 mb-1 ml-3">Saat ini anda menggunakan paket gratis. Anda bisa mengupgrade layanan kapanpun untuk mendapatkan fitur yang lebih lengkap dan menarik!</p>
                                    </div>
                                    <img src="{{ asset('dashboard/assets/img/pngs/work3.png') }}" alt="user-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row row-sm  mt-lg-4">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="card bg-primary custom-card card-box">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="offset-xl-3 offset-sm-6 col-xl-8 col-sm-6 col-12">
                                        <h4 class="d-flex mb-3">
                                            <span class="font-weight-bold text-white ml-3">Welcome, {{ Auth::user()->name }}!</span>
                                        </h4>
                                        <p class="tx-white-8 mb-1 ml-3">Saat ini anda menggunakan paket premium. Selamat menikmati layanan kami!</p>
                                    </div>
                                    <img src="{{ asset('dashboard/assets/img/pngs/work3.png') }}" alt="user-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <!-- col end -->
    </div>
    <!-- Row end -->
@endsection
