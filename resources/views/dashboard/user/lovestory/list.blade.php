@extends('app')
@section('title', 'Cerita Cinta')

@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-header text-right">
                    <a href="{{ route('user.lovestory.create') }}" class="btn btn-outline-primary">+ Tambah Cerita Cinta</a>
                </div>
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

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="example1">
                            <thead class="table-dark">
                                <tr align="center">
                                    <th class="wd-15p">Tanggal Cerita</th>
                                    <th class="wd-20p">Judul Cerita</th>
                                    <th class="wd-40p">Cerita</th>
                                    <th class="wd-15p">Gambar / Foto</th>
                                    <th class="wd-10p">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lovestory as $data)
                                    <tr align="center">
                                        <td>{{ \Carbon\Carbon::parse($data->date_story)->isoFormat('dddd, D MMMM Y') }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->story }}</td>
                                        <td>
                                            <img id="image" src="{{ $data->image == null ? asset('dashboard/assets/img/users/1.jpg') : asset($data->image) }}" alt="" class="img-thumbnail w-100">
                                        </td>
                                        <td>
                                            <a href="{{ route('user.lovestory.edit', $data->id) }}" class="btn btn-outline-info btn-block mb-2">Edit</a>
                                            <form action="{{ route('user.lovestory.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-outline-danger btn-block">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
