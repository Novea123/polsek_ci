<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard Polsek</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        
        <!-- Info Cards -->
        <div class="row">
            <!-- Total Laporan -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="font-weight-light">Total Laporan</h5>
                                <h2 class="mb-0"><?= number_format($total_laporan) ?></h2>
                            </div>
                            <div class="display-4">
                                <i class="fas fa-file-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?= site_url('laporan') ?>">Lihat Detail</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            
            <!-- Total Pelanggaran -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="font-weight-light">Total Pelanggaran</h5>
                                <h2 class="mb-0"><?= number_format($total_pelanggaran) ?></h2>
                            </div>
                            <div class="display-4">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?= site_url('pelanggaran') ?>">Lihat Detail</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            
            <!-- Total Petugas -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="font-weight-light">Total Petugas</h5>
                                <h2 class="mb-0"><?= number_format($total_petugas) ?></h2>
                            </div>
                            <div class="display-4">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?= site_url('petugas') ?>">Lihat Detail</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            
            <!-- Total Tahanan -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="font-weight-light">Total Tahanan</h5>
                                <h2 class="mb-0"><?= number_format($total_tahanan) ?></h2>
                            </div>
                            <div class="display-4">
                                <i class="fas fa-user-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?= site_url('tahanan') ?>">Lihat Detail</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recent Laporan -->
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-file-alt mr-1"></i>
                        Laporan Terbaru
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pelapor</th>
                                        <th>Jenis Kejahatan</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($laporan_terbaru as $laporan): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $laporan->nama_pelapor ?? 'Anonim' ?></td>
                                        <td><?= $laporan->jenis_kejahatan ?></td>
                                        <td><?= date('d/m/Y', strtotime($laporan->tanggal_kejadian)) ?></td>
                                        <td>
                                            <span class="badge badge-<?= 
                                                ($laporan->status == 'Selesai') ? 'success' : 
                                                (($laporan->status == 'Dalam Penyelidikan') ? 'warning' : 'primary') 
                                            ?>">
                                                <?= $laporan->status ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Pelanggaran -->
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-exclamation-triangle mr-1"></i>
                        Pelanggaran Terbaru
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pelanggar</th>
                                        <th>Jenis Pelanggaran</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($pelanggaran_terbaru as $pelanggaran): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $pelanggaran->nama_pelanggar ?></td>
                                        <td><?= $pelanggaran->jenis_pelanggaran ?></td>
                                        <td><?= date('d/m/Y', strtotime($pelanggaran->tanggal)) ?></td>
                                        <td>
                                            <span class="badge badge-<?= 
                                                ($pelanggaran->status == 'Selesai') ? 'success' : 
                                                (($pelanggaran->status == 'Dalam Proses') ? 'warning' : 'secondary') 
                                            ?>">
                                                <?= $pelanggaran->status ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
