@extends('layouts.UserDashboard.userdashlayout')

@section('content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            List Pembelian Kelas Saya
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">{{ $today }}</span>
                            · Tanggal {{ $tanggal_tahun }} · <span id="clock">12:16 PM</span>
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="small">
                            Hi! {{ Auth::user()->name }}
                            <hr>
                            </hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Pembelian
                </div>
            </div>
            <div class="card-body">
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%"
                                    cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 100px;">Kelas</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 50px;">Jenis Kelas</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 30px;">Tanggal</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 30px;">Diskon</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Total</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 30px;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 50px;">Invoice</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($checkout as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $item->Kelas->nama_kelas }}</td>
                                            <td>{{ $item->Kelas->Jeniskelas->jenis_kelas }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            <td class="text-center">{{ $item->percentage_diskon }}%</td>
                                            <td class="text-center">Rp. {{ number_format($item->total_price) }}</td>
                                            <td class="text-center">
                                                @if ($item->payment_status == 'Pending')
                                                <a href="{{ $item->midtrans_url }}"
                                                    class="btn-xs btn-secondary" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Bayar Sekarang">
                                                    <i class="fas fa-money-check-alt mr-2"></i>Pay Now
                                                </a>
                                                @elseif ($item->payment_status == 'Paid')
                                                    <span class="badge badge-success ml-auto">{{ $item->payment_status }}</span>
                                                @else
                                                    <span class="badge badge-danger ml-auto">{{ $item->payment_status }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->payment_status == 'Paid')
                                                <a href="{{ route('pembelian-saya.show', $item->id_checkouts) }}"
                                                    class="btn-xs btn-secondary" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Detail">
                                                    <i class="fas fa-address-card mr-2"></i>Invoice
                                                </a>
                                                @elseif ($item->payment_status == 'Pending')
                                                    <span class="badge badge-danger ml-auto">Selesaikan Pembayaran</span>
                                                @else
                                                    <span class="badge badge-danger ml-auto">Pembayaran Gagal</span>
                                                @endif
                                               
                                            </td>
                                        </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<script>
    setInterval(displayclock, 500);

    function displayclock() {
        var time = new Date()
        var hrs = time.getHours()
        var min = time.getMinutes()
        var sec = time.getSeconds()
        var en = 'AM';

        if (hrs > 12) {
            en = 'PM'
        }

        if (hrs > 12) {
            hrs = hrs - 12;
        }

        if (hrs == 0) {
            hrs = 12;
        }

        if (hrs < 10) {
            hrs = '0' + hrs;
        }

        if (min < 10) {
            min = '0' + min;
        }

        if (sec < 10) {
            sec = '0' + sec;
        }

        document.getElementById('clock').innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;
    }

</script>

@endsection
