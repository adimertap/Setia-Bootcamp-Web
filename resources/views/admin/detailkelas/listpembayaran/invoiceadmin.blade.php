@extends('layouts.UserDashboard.userdashlayout')

@section('content')
<main>
    <div class="container mt-4">
        <!-- Invoice-->
        <div class="card invoice">
            <div class="card-header p-4 p-md-5 border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                        <!-- Invoice branding-->
                        <img class="invoice-brand-img rounded-circle mb-4" src="{{ asset('images/logo_baru.png') }}" alt="">
                        <div class="h2 text-white mb-0">PT. Bootcamp Satria</div>
                        Bootcamp &amp; Class
                    </div>
                    <div class="col-12 col-lg-auto text-center text-lg-right">
                        <!-- Invoice details-->
                        <div class="h3 text-white">Invoice</div>
                        {{ $checkout->midtrans_booking_code }}
                        <br>
                        {{ date('d M Y', strtotime($checkout->created_at)) }}
                    </div>
                </div>
            </div>
            <div class="card-body p-4 p-md-5">
                <!-- Invoice table-->
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead class="border-bottom">
                            <tr class="small text-uppercase text-muted">
                                <th scope="col">Nama Kelas</th>
                                <th class="text-right" scope="col">Harga Kelas</th>
                                <th class="text-right" scope="col">Diskon</th>
                                <th class="text-right" scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-bottom">
                                <td>
                                    <div class="font-weight-bold">{{ $checkout->Kelas->nama_kelas }}</div>
                                    <div class="small text-muted d-none d-md-block">Jenis Kelas yang dibeli {{ $checkout->Kelas->Jeniskelas->jenis_kelas }}</div>
                                </td>
                                <td class="text-right font-weight-bold">Rp. {{ number_format($checkout->Kelas->harga_kelas) }}</td>
                                <td class="text-right font-weight-bold">{{ $checkout->percentage_diskon }}</td>
                                <td class="text-right font-weight-bold">Rp.{{ number_format($checkout->total_price) }}</td>
                            </tr>
                            <!-- Invoice total-->
                            <tr>
                                <td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Total Amount:</div></td>
                                <td class="text-right pb-0"><div class="h5 mb-0 font-weight-700 text-green">Rp.{{ number_format($checkout->total_price) }}</div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer p-4 p-lg-5 border-top-0">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <!-- Invoice - sent to info-->
                        <div class="small text-muted text-uppercase font-weight-700 mb-2">To</div>
                        <div class="h6 mb-1">{{ $checkout->User->name }}</div>
                        <div class="small">{{ $checkout->User->email }}</div>
                        <div class="small">{{ $checkout->User->address }}</div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <!-- Invoice - sent from info-->
                        <div class="small text-muted text-uppercase font-weight-700 mb-2">From</div>
                        <div class="h6 mb-0">PT. Setia Bootcamp</div>
                        <div class="small">setiabootcamp@gmail.com</div>
                        <div class="small">Jl. Raya Kapal Badung Bali</div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Invoice - additional notes-->
                        <div class="small text-muted text-uppercase font-weight-700 mb-2">Note</div>
                        <div class="small mb-0">Payment is due 15 days after receipt of this invoice. Please make checks or money orders out to Company Name, and include the invoice number in the memo. We appreciate your business, and hope to be working with you again very soon!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>

@endsection