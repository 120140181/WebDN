@include('components.admNavbar')
<div class="wrapper" style="min-width: 100%;">
    <!-- Content Wrapper -->
    <div class="content-wrapper p-3">
        <!-- content-header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-8 col-sm-6">
                        <h2 class="">Reminder Tagihan</h2>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <i class="nav-icon fas fa-home"></i>
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Reminder</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- reminder expandable table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header cardder d-flex align-items-center">
                        <div class="col-lg">
                            <h3 class="card-title">Payment Info</h3>
                        </div>
                        <div class="card-tools me-3">
                            <div class="input-group input-group-md" style="width: 200px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-success" type="button" data-bs-toggle="modal"
                            data-bs-target="#tambahReminder">
                            <i class="fa fa-plus" aria-hidden="true"></i><span> Tambah reminder</span>
                        </a>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-hover text-nowrap">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Nasabah</th>
                                    <th>Nomor Kwitansi</th>
                                    <th>Status Pembayaran</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Tagihan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->nama_nasabah }}</td>
                                        <td>{{ $d->nomor_kwitansi }}</td>
                                        <td>{{ $d->status_pembayaran }}</td>
                                        <td>{{ $d->keterangan }}</td>
                                        <td>{{ $d->tanggal_tagihan }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('admin.reminder-edit', ['id' => $d->id]) }}"
                                                class="btn btn-primary mx-1"><i class="fas fa-pen"></i> Edit</a>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#modal-default"
                                                class="btn btn-danger mx-1"><i class="fas fa-trash-alt"></i> Hapus</a>
                                            <a href="" class="btn btn-success mx-1"><i class="fas fa-check"></i>
                                                Approve</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modal title</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Modal body text goes here.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tambah Reminder Modal -->
        @include('components.tambahReminder')
        @include('components.editReminder')
    </div>
    <!-- //reminder expandle table -->
    @include('components.admFooter')
</div>
