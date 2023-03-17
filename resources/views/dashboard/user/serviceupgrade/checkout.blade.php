@extends('app')
@section('title', 'Upgrade Layanan')

@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Paket</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="Paket Premium" disabled>
                    </div>
                    <div class="form-group">
                        <label for="inlineFormInputGroupUsername2">Harga Paket</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                            </div>
                            <input type="text" name="price" class="form-control" id="inlineFormInputGroupUsername2" value="500000" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <button id="pay-button" class="btn btn-primary mt-3 px-3">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    /* You may add your own implementation here */
                    alert("payment success!"); console.log(result);
                },
                onPending: function(result){
                    /* You may add your own implementation here */
                    alert("wating your payment!"); console.log(result);
                },
                onError: function(result){
                    /* You may add your own implementation here */
                    alert("payment failed!"); console.log(result);
                },
                onClose: function(){
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
@endsection
