@extends('app')
@section('title', 'Informasi Acara')

@section('content')
    @if ($message = Session::get('success'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.3/sweetalert2.all.js" integrity="sha512-5gz/at+6LT6tuaX/ritelLOHwVc0CoXsspPbUBPdoIrOLshcpguRTMBAKVZCdG//YdwyYP2c4n7NMaDqVXWTJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.3/sweetalert2.css" integrity="sha512-us/9of/cEp3FrrmLUpCcWUAzm2gE7EOPnfEAWBMwdWR1Lpxw0orMoVvLyyoGSD9iMGAUlEd8XHzt5+SDwmdGLg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script>
            Swal.fire(
                'Success',
                '{!! $message !!}',
                'success'
            );
        </script>
    @endif
    @forelse ($event as $data)
        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="text-right">
                    <a href="{{ route('user.eventinformation.edit', $data->id) }}" class="btn btn-outline-info">Ubah Informasi Acara</a>
                </div>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h4 class="card-title">Settingan Umum</h4>
                        <img src="https://maps.geoapify.com/v1/staticmap?style=osm-carto&width=600&height=400&center=lonlat:106.85180,-6.43277&zoom=14&marker=lonlat:106.85180,-6.43277;color:%23ff0000;size:medium&apiKey=2b8f241eadb8432785b5bfbf819ad399" alt="map" class="img-thumbnail w-50">
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Agama</p>
                                </div>
                                <div class="col-lg-8">
                                    <p>: {{ $data->religion }}</p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Zona Waktu</p>
                                </div>
                                <div class="col-lg-8">
                                    <p>: {{ $data->timezone }}</p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Jenis Peta</p>
                                </div>
                                <div class="col-lg-8">
                                    <p>: {{ $data->maps_type }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h4 class="card-title">Acara Akad Nikah</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Ditampilkan</p>
                                </div>
                                <div class="col-lg-8">
                                    <p class="contract_validation">: {{ $data->contract_validation }}</p>
                                </div>
                            </div>
                            <div class="row mb-3 contract1">
                                <div class="col-lg-4">
                                    <p>Nama Acara</p>
                                </div>
                                <div class="col-lg-8">
                                    <p>: {{ $data->contract_name }}</p>
                                </div>
                            </div>
                            <div class="row mb-3 contract2">
                                <div class="col-lg-4">
                                    <p>Tanggal Acara</p>
                                </div>
                                <div class="col-lg-8">
                                    <p>: {{ \Carbon\Carbon::parse($data->contract_date)->isoFormat('dddd, D MMMM Y') }}</p>
                                </div>
                            </div>
                            <div class="row mb-3 contract3">
                                <div class="col-lg-4">
                                    <p>Waktu Acara</p>
                                </div>
                                <div class="col-lg-8">
                                    <p>: {{ $data->contract_time_start . ' ' . $data->timezone . ' s/d ' . $data->contract_time_end . ' ' . $data->timezone }}</p>
                                </div>
                            </div>
                            <div class="row mb-3 contract4">
                                <div class="col-lg-4">
                                    <p>Tempat</p>
                                </div>
                                <div class="col-lg-8">
                                    <p>: {{ $data->contract_address }}</p>
                                </div>
                            </div>
                            <div class="row mb-3 contract5">
                                <div class="col-lg-4">
                                    <p>Google Maps</p>
                                </div>
                                <div class="col-lg-8">
                                    <p>: {{ $data->contract_url_address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h4 class="card-title">Acara Resepsi Nikah</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Ditampilkan</p>
                                </div>
                                <div class="col-lg-8">
                                    <p class="reception_validation">: {{ $data->reception_validation }}</p>
                                </div>
                            </div>
                            <div class="row mb-3 reception1">
                                <div class="col-lg-4">
                                    <p>Nama Acara</p>
                                </div>
                                <div class="col-lg-8">
                                    <p>: {{ $data->reception_name }}</p>
                                </div>
                            </div>
                            <div class="row mb-3 reception2">
                                <div class="col-lg-4">
                                    <p>Tanggal Acara</p>
                                </div>
                                <div class="col-lg-8">
                                    <p>: {{ $data->reception_date }}</p>
                                </div>
                            </div>
                            <div class="row mb-3 reception3">
                                <div class="col-lg-4">
                                    <p>Waktu Acara</p>
                                </div>
                                <div class="col-lg-8">
                                    <p>: {{ $data->reception_time_start . ' ' . $data->timezone . ' s/d ' . $data->reception_time_end . ' ' . $data->timezone }}</p>
                                </div>
                            </div>
                            <div class="row mb-3 reception4">
                                <div class="col-lg-4">
                                    <p>Tempat</p>
                                </div>
                                <div class="col-lg-8">
                                    <p>: {{ $data->reception_address }}</p>
                                </div>
                            </div>
                            <div class="row mb-3 reception5">
                                <div class="col-lg-4">
                                    <p>Google Maps</p>
                                </div>
                                <div class="col-lg-8">
                                    <p>: {{ $data->reception_url_address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="text-right">
                    <a href="{{ route('user.eventinformation.create') }}" class="btn btn-outline-primary">Buat Informasi Acara</a>
                </div>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h4 class="card-title">Settingan Umum</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Agama</p>
                                </div>
                                <div class="col-lg-8">
                                    Data belum diatur
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Zona Waktu</p>
                                </div>
                                <div class="col-lg-8">
                                    Data belum diatur
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Jenis Peta</p>
                                </div>
                                <div class="col-lg-8">
                                    Data belum diatur
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h4 class="card-title">Acara Akad Nikah</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Ditampilkan</p>
                                </div>
                                <div class="col-lg-8">
                                    Data belum diatur
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Nama Acara</p>
                                </div>
                                <div class="col-lg-8">
                                    Data belum diatur
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Tanggal Acara</p>
                                </div>
                                <div class="col-lg-8">
                                    Data belum diatur
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Waktu Acara</p>
                                </div>
                                <div class="col-lg-8">
                                    Data belum diatur
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Tempat</p>
                                </div>
                                <div class="col-lg-8">
                                    Data belum diatur
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Google Maps</p>
                                </div>
                                <div class="col-lg-8">
                                    Data belum diatur
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h4 class="card-title">Acara Resepsi Nikah</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Ditampilkan</p>
                                </div>
                                <div class="col-lg-8">
                                    Data belum diatur
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Nama Acara</p>
                                </div>
                                <div class="col-lg-8">
                                    Data belum diatur
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Tanggal Acara</p>
                                </div>
                                <div class="col-lg-8">
                                    Data belum diatur
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Waktu Acara</p>
                                </div>
                                <div class="col-lg-8">
                                    Data belum diatur
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Tempat</p>
                                </div>
                                <div class="col-lg-8">
                                    Data belum diatur
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Google Maps</p>
                                </div>
                                <div class="col-lg-8">
                                    Data belum diatur
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforelse
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            var contract = $('.contract_validation').text();
            var reception = $('.reception_validation').text();

            if(contract == ": Ditampilkan")
            {
                $('.contract1').fadeIn('fast');
                $('.contract2').fadeIn('fast');
                $('.contract3').fadeIn('fast');
                $('.contract4').fadeIn('fast');
                $('.contract5').fadeIn('fast');
            }
            else
            {
                $('.contract1').fadeOut('fast');
                $('.contract2').fadeOut('fast');
                $('.contract3').fadeOut('fast');
                $('.contract4').fadeOut('fast');
                $('.contract5').fadeOut('fast');
            }

            if(reception == ": Ditampilkan")
            {
                $('.reception1').fadeIn('fast');
                $('.reception2').fadeIn('fast');
                $('.reception3').fadeIn('fast');
                $('.reception4').fadeIn('fast');
                $('.reception5').fadeIn('fast');
            }
            else
            {
                $('.reception1').fadeOut('fast');
                $('.reception2').fadeOut('fast');
                $('.reception3').fadeOut('fast');
                $('.reception4').fadeOut('fast');
                $('.reception5').fadeOut('fast');
            }


        });
    </script>
@endsection
