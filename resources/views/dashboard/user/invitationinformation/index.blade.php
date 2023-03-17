@extends('app')
@section('title', 'Informasi Undangan')

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
    @forelse ($invite as $data)
        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="text-right">
                    <a href="{{ route('user.invitationinformation.edit', $data->id) }}" class="btn btn-outline-info">Ubah Informasi Undangan</a>
                </div>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h4 class="card-title">Informasi Undangan</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Turut Mengundang</p>
                                </div>
                                <div class="col-lg-8">
                                    <p>: {{ $data->invite }}</p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Catatan</p>
                                </div>
                                <div class="col-lg-8">
                                    <p>: {{ $data->description }}</p>
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
                    <a href="{{ route('user.invitationinformation.create') }}" class="btn btn-outline-primary">Buat Informasi Undangan</a>
                </div>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h4 class="card-title">Informasi Undangan</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Turut Mengundang</p>
                                </div>
                                <div class="col-lg-8">
                                    Data belum diatur
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Catatan</p>
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
