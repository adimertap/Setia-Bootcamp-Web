@extends('layouts.Admin.adminlayout')

@section('content')

<main>
    <div class="container-fluid mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Pembuatan Kuis Kelas</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">{{ $today }}</span>
                    · Tanggal {{ $tanggal }} · <span id="clock"> 12:16 PM</span>
                </div>
            </div>
            <div class="small">
                <span class="font-weight-500 text-primary">Menu Mentor</span>
                <hr></hr>
            </div>
        </div>
    </div>


    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Kelas dan Kuis</div>
            </div>
            <div class="card-body">
                <div class="datatable">
                    @if(session('messagelaunch'))
                    <div class="alert alert-primary" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messagelaunch') }}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    @if(session('messageberhasil'))
                    <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messageberhasil') }}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    @if(session('messagehapus'))
                    <div class="alert alert-danger" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messagehapus') }}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif

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
                                                style="width: 150px;">Nama Kelas</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 50px;">Jenis Kelas</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">Status Keypoint</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">Status Video</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">Status Kuis</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 40px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($class == '')
                                            
                                        @else
                                            @forelse ($class as $item)
                                            <tr role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                <td>{{ $item->Kelas[0]->nama_kelas }}</td>
                                                <td>{{ $item->Kelas[0]->Jeniskelas->jenis_kelas }}</td>
                                                <td class="text-center">
                                                    @if ($item->Kelas[0]->status_keypoint == 'Telah Dibuat')
                                                        <span class="badge badge-success ">Telah Dibuat</span>
                                                    @else
                                                        <span class="badge badge-danger">Belum Dibuat</span>
                                                    @endif
                                                </td>
                                                
                                                <td class="text-center">
                                                    @if ($item->Kelas[0]->status_video == 'Telah Dibuat')
                                                        <span class="badge badge-success ">Telah Dibuat</span>
                                                    @else
                                                        <span class="badge badge-danger">Belum Dibuat</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($item->Kelas[0]->status_kuis == 'Telah Dibuat')
                                                        <span class="badge badge-success ">Telah Dibuat</span>
                                                    @else
                                                        <span class="badge badge-danger">Belum Dibuat</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($item->Kelas[0]->status_keypoint == 'Belum Dibuat')
                                                        <span class="badge badge-warning">Atur Modul Terlebih Dahulu</span>
                                                    @elseif ($item->Kelas[0]->status_video == 'Belum Dibuat')
                                                        <span class="badge badge-warning">Atur Video Terlebih Dahulu</span>
                                                    @else
                                                        <a href="{{ route('mentor-kuis.edit', $item->Kelas[0]->id_kelas) }}"
                                                            class="btn-xs btn-secondary" data-toggle="tooltip"
                                                            data-placement="top" title="" data-original-title="Kuis Pembelajaran">
                                                            <i class="fa fa-tasks"></i> Buat Kuis
                                                        </a>
                                                    @endif
                                                    
                                                </td>
                                            </tr>
                                            @empty
                                            
                                            @endforelse
                                        @endif
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