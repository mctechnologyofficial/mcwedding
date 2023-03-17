@extends('app')
@section('title', 'Informasi Undangan')

@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <form action="{{ route('user.invitationinformation.update', $invite->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card custom-card">
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
                    <div class="card-body">
                        <div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Turut Mengundang</p>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="invite" id="" class="form-control" value="{{ $invite->invite }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Catatan</p>
                                </div>
                                <div class="col-lg-8">
                                    <textarea name="description" class="form-control" cols="30" rows="10">{{ $invite->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-primary btn-block">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
