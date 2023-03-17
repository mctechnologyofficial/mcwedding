@extends('app')
@section('title', 'Pengaturan Umum')

@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
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

                    @if ($errors->any())
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.3/sweetalert2.all.js" integrity="sha512-5gz/at+6LT6tuaX/ritelLOHwVc0CoXsspPbUBPdoIrOLshcpguRTMBAKVZCdG//YdwyYP2c4n7NMaDqVXWTJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.3/sweetalert2.css" integrity="sha512-us/9of/cEp3FrrmLUpCcWUAzm2gE7EOPnfEAWBMwdWR1Lpxw0orMoVvLyyoGSD9iMGAUlEd8XHzt5+SDwmdGLg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

                        <script>
                            Swal.fire(
                                'Failed',
                                '{!! implode('', $errors->all('<div>:message</div>')) !!}',
                                'error'
                            );
                        </script>
                    @endif

                    @forelse ($setting as $data)
                        <form action="{{ route('user.settings.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="validationDefaultUsername">Domain</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">https://mcwedding.com/</span>
                                    </div>
                                    <input type="text" name="domain" class="form-control" id="validationDefaultUsername" aria-describedby="emailHelp" value="{{ $data->domain }}" />
                                </div>
                                <small id="emailHelp" class="form-text text-muted">Wajib menggunakan simbol strip (-). <strong>Contoh : abdul-siti</strong></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Judul Website</label>
                                <input type="text" name="title" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" value="{{ $data->title }}">
                                <small id="emailHelp" class="form-text text-muted">Judul untuk menamai website Anda yang akan muncul pada bagian atas browser.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi</label>
                                <input type="text" name="description" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" value="{{ $data->description }}">
                                <small id="emailHelp" class="form-text text-muted">Ceritakanlah secara ringkas mengenai website Anda.</small>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </form>
                    @empty
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Peringatan!</strong> Anda belum mengisi pengaturan utama untuk website anda. Segera atur
                            pengaturannya sekarang!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('user.settings.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="validationDefaultUsername">Domain</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">https://mcwedding.com/</span>
                                    </div>
                                    <input type="text" name="domain" class="form-control" id="validationDefaultUsername" aria-describedby="emailHelp" />
                                </div>
                                <small id="emailHelp" class="form-text text-muted">Wajib menggunakan simbol strip (-). <strong>Contoh : abdul-siti</strong></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Judul Website</label>
                                <input type="text" name="title" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">Judul untuk menamai website anda yang akan muncul pada bagian atas browser.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi</label>
                                <input type="text" name="description" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">Ceritakanlah secara ringkas mengenai website Anda.</small>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </form>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
