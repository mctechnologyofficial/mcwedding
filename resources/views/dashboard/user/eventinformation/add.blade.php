@extends('app')
@section('title', 'Informasi Acara')

@section('content')
    @if ($message = Session::get('failed'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.3/sweetalert2.all.js" integrity="sha512-5gz/at+6LT6tuaX/ritelLOHwVc0CoXsspPbUBPdoIrOLshcpguRTMBAKVZCdG//YdwyYP2c4n7NMaDqVXWTJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.3/sweetalert2.css" integrity="sha512-us/9of/cEp3FrrmLUpCcWUAzm2gE7EOPnfEAWBMwdWR1Lpxw0orMoVvLyyoGSD9iMGAUlEd8XHzt5+SDwmdGLg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script>
            Swal.fire(
                'Failed',
                '{!! $message !!}',
                'error'
            );
        </script>
    @endif
    <form action="{{ route('user.eventinformation.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h4 class="card-title">Settingan Umum</h4>
                        <div id="map"></div>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Agama</p>
                                </div>
                                <div class="col-lg-8">
                                    <select name="religion" class="form-control">
                                        <option value="" selected disabled>Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Katholik">Katholik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Zona Waktu</p>
                                </div>
                                <div class="col-lg-8">
                                    <select name="timezone" class="form-control">
                                        <option value="" selected disabled>Pilih Zona Waktu</option>
                                        <option value="WIB">WIB (Waktu Indonesia Bagian Barat)</option>
                                        <option value="WITA">WITA (Waktu Indonesia Bagian Tengah)</option>
                                        <option value="WIT">WIT (Waktu Indonesia Bagian Timur)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <p>Jenis Peta</p>
                                </div>
                                <div class="col-lg-8">
                                    <select name="maps_type" class="form-control">
                                        <option value="Tidak Ditampilkan">Tidak Ditampilkan</option>
                                        <option value="Static Google Maps" selected>Static Google Maps</option>
                                        <option value="Dynamic Maps">Dynamic Maps (Khusus Premium)</option>
                                        <option value="Google Maps">Google Maps (Khusus Premium)</option>
                                    </select>
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
                                    <select name="contract_validation" class="form-control">
                                        <option value="Ditampilkan">Ditampilkan</option>
                                        <option value="Sembunyikan" selected>Sembunyikan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3 contract1">
                                <div class="col-lg-4">
                                    <p>Nama Acara (Optional)</p>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="contract_name" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3 contract2">
                                <div class="col-lg-4">
                                    <p>Tanggal Acara</p>
                                </div>
                                <div class="col-lg-8">
                                    <input type="date" name="contract_date" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3 form-inline contract3">
                                <div class="col-lg-4">
                                    <p>Waktu Acara</p>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="contract_time_start" class="form-control timepicker1" readonly>
                                    &nbsp; s/d &nbsp;
                                    <input type="text" name="contract_time_end" class="form-control timepicker2" readonly>
                                </div>
                            </div>
                            <div class="row mb-3 contract4">
                                <div class="col-lg-4">
                                    <p>Tempat dan Alamat</p>
                                </div>
                                <div class="col-lg-8">
                                    <textarea name="contract_address" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3 contract5">
                                <div class="col-lg-4">
                                    <p>Google Maps</p>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="contract_url_address" class="form-control" placeholder="Masukkan URL Google Maps yang telah anda salin">
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
                                    <select name="reception_validation" class="form-control">
                                        <option value="Ditampilkan">Ditampilkan</option>
                                        <option value="Sembunyikan" selected>Sembunyikan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3 reception1">
                                <div class="col-lg-4">
                                    <p>Nama Acara (Optional)</p>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="reception_name" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3 reception2">
                                <div class="col-lg-4">
                                    <p>Tanggal Acara</p>
                                </div>
                                <div class="col-lg-8">
                                    <input type="date" name="reception_date" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3 form-inline reception3">
                                <div class="col-lg-4">
                                    <p>Waktu Acara</p>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="reception_time_start" class="form-control timepicker1" readonly>
                                    &nbsp; s/d &nbsp;
                                    <input type="text" name="reception_time_end" class="form-control timepicker2" readonly>
                                </div>
                            </div>
                            <div class="row mb-3 reception4">
                                <div class="col-lg-4">
                                    <p>Tempat dan Alamat</p>
                                </div>
                                <div class="col-lg-8">
                                    <textarea name="reception_address" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3 reception5">
                                <div class="col-lg-4">
                                    <p>Google Maps</p>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="reception_url_address" class="form-control" placeholder="Masukkan URL Google Maps yang telah anda salin">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-sm mb-3">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-outline-primary btn-block">Simpan</button>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            var contract_validation = $('select[name="contract_validation"]').val();
            var reception_validation = $('select[name="reception_validation"]').val();

            if(contract_validation == "Ditampilkan")
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

            if(reception_validation == "Ditampilkan")
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

            $('.timepicker1').timepicker({
                timeFormat: 'HH:mm',
            });

            $('.timepicker2').timepicker({
                timeFormat: 'HH:mm',
            });

            $('select[name="contract_validation"]').on('change', function(){
                var value = $(this).val();

                if(value == "Ditampilkan")
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
            });

            $('select[name="reception_validation"]').on('change', function(){
                var value = $(this).val();

                if(value == "Ditampilkan")
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
        });
    </script>
@endsection
