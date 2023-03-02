@extends('app')
@section('title', 'Mempelai Wanita')

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

                    @forelse ($bridewoman as $data)
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <img id="image" src="{{ $data->image == null ? asset('dashboard/assets/img/users/1.jpg') : asset($data->image) }}" alt="" class="img-thumbnail w-25">
                            </div>
                        </div>

                        <form action="{{ route('user.bridewoman.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <label for="exampleInputPassword1">Nama Lengkap</label>
                                <input type="text" name="fullname" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" value="{{ $data->fullname }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Panggilan</label>
                                <input type="text" name="shortname" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" value="{{ $data->shortname }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Ayah</label>
                                <input type="text" name="father_name" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" value="{{ $data->father_name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Ibu</label>
                                <input type="text" name="mother_name" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" value="{{ $data->mother_name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tentang Mempelai Wanita</label>
                                <textarea name="self_description" class="form-control" id="exampleInputPassword1" cols="30" rows="10">{{ $data->self_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Foto</label>
                                <div class="input-group file-browser">
                                    <input id="textfile" type="text" class="form-control border-right-0 browse-file" placeholder="Choose image" readonly />
                                    <label class="input-group-btn">
                                        <span class="btn btn-primary">
                                            Unggah <input type="file" style="display: none;" name="image" id="inputimage" accept="image/*" />
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </form>
                    @empty
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Peringatan!</strong> Anda belum mengisi data mempelai pria untuk website anda. Segera atur sekarang!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <img id="image" src="{{ asset('dashboard/assets/img/users/1.jpg') }}" alt="" class="img-thumbnail w-25">
                            </div>
                        </div>

                        <form action="{{ route('user.bridewoman.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Lengkap</label>
                                <input type="text" name="fullname" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Panggilan</label>
                                <input type="text" name="shortname" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Ayah</label>
                                <input type="text" name="father_name" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Ibu</label>
                                <input type="text" name="mother_name" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tentang Mempelai Wanita</label>
                                <textarea name="self_description" class="form-control" id="exampleInputPassword1" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Foto</label>
                                <div class="input-group file-browser">
                                    <input id="textfile" type="text" class="form-control border-right-0 browse-file" placeholder="Choose image" readonly />
                                    <label class="input-group-btn">
                                        <span class="btn btn-primary">
                                            Unggah <input type="file" style="display: none;" name="image" id="inputimage" accept="image/*" />
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </form>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#inputimage").change(function(){
            readURL(this);
            var filename = $(this).val().replace(/C:\\fakepath\\/i, '')
            $('#textfile').val(filename);
        });
    </script>
@endsection
