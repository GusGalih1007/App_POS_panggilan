<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Custom CSS (Inline Style) -->
    <style>
        .content-header {
            margin-bottom: 20px;
        }

        .card-img-top {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card-title {
            font-weight: bold;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="content-header">
            <h1 class="m-0">Detail Transaksi</h1>
        </div>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Card Container -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Transaksi #{{ $transaction->transaction_id }}</h3>
                        </div>
                        <div class="card-body">
                            
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Status Transaksi</h5>
                                    <p class="card-text">{{ $transaction->status }}</p>
                            
                                    <h5 class="card-title">Tanggal Pembayaran</h5>
                                    <p class="card-text">{{ $transaction->payment->payment_date }}</p>
                                </div>
                            </div>

                            <!-- Informasi Customer -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Customer</h5>
                                    <p class="card-text">{{ $transaction->customer->customer_name ?? 'Guest' }}</p>
                                </div>
                            </div>

                            <!-- Metode Pembayaran -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Metode Pembayaran</h5>
                                    <p class="card-text">{{ $transaction->payment->payment_method }}</p>
                                </div>
                            </div>

                            <!-- Diskon -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Diskon</h5>
                                    <p class="card-text">Rp. {{ number_format($transaction->discount, 2) }}</p>
                                </div>
                            </div>

                            <!-- Total Amount -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Total Harga</h5>
                                    <p class="card-text">Rp. {{ number_format($transaction->total_amount, 2) }}</p>
                                </div>
                            </div>

                            <!-- Daftar Produk -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Produk yang Dibeli</h5>
                                    <ul class="list-group">
                                        @foreach ($transaction->details as $detail)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>{{ $detail->product->product_name }}</strong><br>
                                                Harga Satuan: Rp. {{ number_format($detail->product->price, 2) }}<br>
                                                Jumlah: {{ $detail->quantity }}
                                            </div>
                                            <div class="product-img">
                                                @if($detail->product->photo)
                                                <img src="{{ asset('storage/' . $detail->product->photo) }}" alt="{{$detail->product->product_name}}" class="card-img-top"
                                                    style="width: 100px;">
                                                @else
                                                <img src="https://via.placeholder.com/100" alt="No Image" width="100">
                                                @endif

                                               
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- Pembayaran -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Pembayaran</h5>
                                    <p class="card-text">Rp. {{ number_format($transaction->payment->amount, 2) }}</p>
                                </div>
                            </div>

                            <!-- Kembalian -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Kembalian</h5>
                                    <p class="card-text">Rp. {{ number_format($transaction->change, 2) }}</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Back Button -->
                    <a href="{{ route('transaction.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </section>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>