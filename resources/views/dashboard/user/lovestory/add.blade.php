@extends('app')
@section('title', 'Tambah Cerita Cinta')

@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">

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

                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img id="image" src="{{ asset('dashboard/assets/img/users/1.jpg') }}" alt="" class="img-thumbnail w-25">
                        </div>
                    </div>

                    <form action="{{ route('user.lovestory.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Cerita</label>
                            <input type="date" name="date_story" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Judul Cerita</label>
                            <input type="text" name="title" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Cerita</label>
                            <textarea name="story" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Gambar / Foto</label>
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
