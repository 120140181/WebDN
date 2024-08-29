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
                                    <a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Reminder</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <blockquote class="quote-primary">
                                <h5 id="tip">Total Tagihan Aktif :</h5>
                                <p>Rp. {{ number_format($totalTagihan, 0, ',', '.') }}</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <!-- reminder expandable table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div
                            class="card-header d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <!-- Title -->
                            <div class="mb-2 mb-md-0">
                                <h3 class="card-title">Payment Info</h3>
                            </div>

                            <!-- Actions (Search and Add Reminder) -->
                            <div class="d-flex flex-column flex-md-row align-items-center ml-md-auto">
                                <!-- Sort Dropdown Button -->
                                <div class="dropdown mx-2">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        Sort And Filter
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                                        <li><a class="dropdown-item" href="#" data-sort="nomor-asc">Nomor
                                                (Terkecil - Terbesar)</a></li>
                                        <li><a class="dropdown-item" href="#" data-sort="nomor-desc">Nomor
                                                (Terbesar - Terkecil)</a></li>
                                        <li><a class="dropdown-item" href="#" data-sort="tanggal-asc">Tanggal
                                                (Terbaru - Terlama)</a></li>
                                        <li><a class="dropdown-item" href="#" data-sort="tanggal-desc">Tanggal
                                                (Terlama - Terbaru)</a></li>
                                    </ul>
                                </div>
                                <!-- Search Input -->
                                <div class="input-group input-group-md mb-2 mb-md-0 me-md-2" style="width: 250px">
                                    <input type="text" id="searchInput" name="table_search"
                                        class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="button" id="searchButton" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Add Reminder Button -->
                                <a href="#" class="btn btn-success" type="button" data-bs-toggle="modal"
                                    data-bs-target="#tambahReminder">
                                    <i class="fa fa-plus" aria-hidden="true"></i><span> Tambah Reminder</span>
                                </a>
                            </div>
                        </div>



                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-hover text-nowrap" id="table1"
                                aria-describedby="table1-info">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Nasabah</th>
                                        <th>Nomor Kwitansi</th>
                                        <th>Nominal Tagihan</th>
                                        <th>Status Pembayaran</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Tagihan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $d)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $d->nama_nasabah }}</td>
                                            <td>{{ $d->nomor_kwitansi }}</td>
                                            <td>Rp. {{ number_format($d->nominal_tagihan, 0, ',', '.') }}</td>
                                            <td>{{ $d->status_pembayaran }}</td>
                                            <td>{{ $d->keterangan }}</td>
                                            <td>{{ date('d-m-Y', strtotime($d->tanggal_tagihan)) }}</td>
                                            <td class="d-flex justify-content-center">
                                                <button class="btn btn-primary mx-1" type="button"
                                                    data-edire_id="{{ $d->id }}"
                                                    data-nama="{{ $d->nama_nasabah }}"
                                                    data-kwitansi="{{ $d->nomor_kwitansi }}"
                                                    data-nominal_tagihan="{{ $d->nominal_tagihan }}"
                                                    data-status="{{ $d->status_pembayaran }}"
                                                    data-keterangan="{{ $d->keterangan }}"
                                                    data-tanggal="{{ $d->tanggal_tagihan }}" data-bs-toggle="modal"
                                                    data-bs-target="#editReminder">
                                                    <i class="fas fa-pen"></i>
                                                </button>
                                                <form action="{{ route('admin.reminder-delete', $d->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin membatalkan reminder ini?');">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-danger mx-1"><i
                                                            class="fas fa-times"></i> Cancel</button>
                                                </form>
                                                <form
                                                    action="{{ route('admin.reminder-approve', ['id' => $d->id, 'page' => request()->get('page')]) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menyetujui reminder ini?');">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-success mx-1"><i
                                                            class="fas fa-check"></i> Approve</button>
                                                </form>

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
                                                        <button type="button" class="btn btn-primary">Save
                                                            changes</button>
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
            @include('components.modalReminder')
        </div>
        <!-- //reminder expandle table -->
        @include('components.admFooter')
    </div>
