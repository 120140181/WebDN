@include('components.admNavbar')
<div class="wrapper" style="min-width: 100vh">
    <div class="content-wrapper p-3" style="min-width: 100vh">
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
                                <a href="#">Home</a>
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
                <div class="col-12 text-center">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">History Payment</h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-hover">
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
                                    @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->nama_nasabah }}</td>
                                        <td>{{ $d->nomor_kwitansi }}</td>
                                        <td>{{ $d->tanggal_tagihan }}</td>
                                        <td>{{ $d->status_pembayaran }}</td>
                                        <td>{{ $d->keterangan }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@include('components.admFooter')
