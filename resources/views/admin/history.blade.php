@include('components.admNavbar')
<div class="wrapper" style="min-width: 100%;">
    <div class="content-wrapper p-3"">
        <!-- content-header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-8 col-sm-6">
                        <h5 class="">
                            Selamat Datang Administrator Di Halaman Admin Keuangan
                        </h5>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <i class="nav-icon fas fa-home"></i>
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">History</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!--Main Content-->
        <section class="content-header">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div
                            class="card-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                            <h3 class="card-title mb-2 mb-md-0">History Payment</h3>
                            <div class="dt-buttons btn-group flex-wrap ml-md-auto">
                                <button class="btn btn-outline-danger buttons-pdf buttons-html5" tabindex="0"
                                    aria-controls="example1" type="button"><span class="iconify mr-1"
                                        data-icon="vscode-icons:file-type-pdf2" data-inline="false"
                                        style="font-size: 24px;"></span>Cetak-PDF</button>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="table1" class="table table-bordered table-hover text-nowrap"
                                aria-describedby="table1-info">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Nasabah</th>
                                        <th>Nomor Kwitansi</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $d)
                                        <tr>
                                            <td>{{ $data->firstItem() + $index }}</td>
                                            <td>{{ $d->nama_nasabah }}</td>
                                            <td>{{ $d->nomor_kwitansi }}</td>
                                            <td>{{ $d->tanggal_tagihan }}</td>
                                            <td>{{ $d->status_pembayaran }}</td>
                                            <td>{{ $d->keterangan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-4">
                                {{ $data->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@include('components.admFooter')
