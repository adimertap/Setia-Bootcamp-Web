@extends('layouts.Admin.adminlayout')

@section('content')

<main>
    <div class="container-fluid mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">FAQ Pertanyaan Member</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">{{ $today }}</span>
                    · Tanggal {{ $tanggal }} · <span id="clock"> 12:16 PM</span>
                </div>
            </div>
            <div class="small">
                <span class="font-weight-500 text-primary">Menu Mentor</span>
                <hr>
                </hr>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-body">
                <div class="datatable">
                    @if(session('message'))
                    <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                        {{ session('message') }}
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
                                                style="width: 80px;">Member</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 110px;">Kelas</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Video</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Pertanyaan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($faq as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $item->User->name }}</td>
                                            <td>{{ $item->Kelas->nama_kelas }}</td>
                                            <td>{{ $item->Video->nama_video }}</td>
                                            <td>{{ $item->pertanyaan }}</td>
                                            <td>{{ $item->status_faq }}</td>
                                            <td class="text-center">
                                                @if ($item->status_faq == 'Belum Terjawab')
                                                <a href="" class="btn btn-primary btn-xs mr-2" type="button"
                                                    data-toggle="modal" data-target="#Modalkuis-{{ $item->id_faq }}">
                                                    <i class="fas fa-plus"></i> Jawab Pertanyaan
                                                </a>
                                                @else
                                                <span class="badge badge-success">Telah Terjawab</span>
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

@forelse ($faq as $item)
<div class="modal fade" id="Modalkuis-{{ $item->id_faq }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Jawab Pertanyaan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="closetambahpajak"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('send.email.faq', $item->id_faq) }}" method="POST" id="form2" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-4">
                            <label class="small mb-1 mr-1" for="email">Email Member</label>
                            <input class="form-control" id="email" type="text" name="email"
                                value="{{ $item->User->email }}" readonly></input>
                        </div>
                        <div class="form-group col-4">
                            <label class="small mb-1 mr-1" for="name">Nama Member</label>
                            <input class="form-control" id="name" type="text" name="name"
                                value="{{ $item->User->name }}" readonly></input>
                        </div>
                        <div class="form-group col-4">
                            <label class="small mb-1 mr-1" for="nama_kelas">Kelas</label>
                            <input class="form-control" id="nama_kelas" type="text" name="nama_kelas"
                                value="{{ $item->Kelas->nama_kelas }}" readonly></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="pertanyaan"> Pertanyaan</label>
                            <input class="form-control" id="pertanyaan" type="text" name="pertanyaan" value="{{ $item->pertanyaan }}"
                                 readonly></input>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="jawaban_faq">Jawaban Pertanyaan</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <div class="input-group input-group-joined">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-list"></i>
                                </span>
                            </div>
                            <textarea class="form-control" id="jawaban_faq" type="text" name="jawaban_faq"
                                placeholder="Input Jawaban" required></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success btn-sm" type="submit">Send</button>
                </div>
            </form>
        </div>

    </div>
</div>
@empty

@endforelse



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
