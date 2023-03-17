@extends('app')
@section('title', 'Upgrade Layanan')

@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card text-center">
                <div class="card-body">
                    <h2 class="card-title" style="color: #748ec6;">Paket Website Undangan Digital</h2>
                    <p class="mb-0 pb-0" style="font-size: 15px;">
                        Beberapa pilihan paket yang dapat anda gunakan, silahkan pilih sesuai dengan yang anda butuhkan <br> Jangan ragu untuk bertanya kepada kami jika ingin lebih jelas
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card custom-card text-center">
                <div class="card-header">
                    <h2 class="card-title" style="color: #748ec6;">Standar</h2>
                </div>
                <div class="card-body">
                    <p>
                        Untuk anda yang ingin memiliki website pernikahan cantik menawan dengan tampilan sederhana
                    </p>
                    <div class="container text-white" style="background-color: #748ec6;">
                        <h4 class="p-2">Gratis</h4>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">1 Template Standar Terbuka</li>
                        <li class="list-group-item">Fitur Mempelai, Cerita Cinta, Informasi Undangan, Fitur Doa dan Harapan</li>
                        <li class="list-group-item">Photo Galeri Maksimum 50 Photo</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="javascript:void(0)" class="btn btn-primary btn-block">Anda sudah menggunakan fitur ini</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card custom-card text-center">
                <div class="card-header">
                    <h2 class="card-title" style="color: #748ec6;">Premium</h2>
                </div>
                <div class="card-body">
                    <p>
                        Untuk anda yang ingin memiliki website pernikahan cantik menawan dengan berbagai fitur istimewa
                    </p>
                    <div class="container text-white" style="background-color: #748ec6;">
                        <h4 class="p-2">Rp 500.000</h4>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Template Tak Terbatas</li>
                        <li class="list-group-item">Semua Fitur Bisa Digunakan</li>
                        <li class="list-group-item">Photo Galeri Tak Terbatas</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <form action="{{ route('user.transaction.cashout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-block">Pilih</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
