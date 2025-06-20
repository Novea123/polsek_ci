<main>
    <div class="container-fluid">
        <h1 class="mt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('barangbukti') ?>">Barang Bukti</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo site_url('barangbukti/edit') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="id_bukti">ID BARANG BUKTI</label>
                        <input class="form-control" type="hidden" name="id_bukti" value="<?=$barangbukti->id_bukti;?>" required />
                        <input class="form-control" type="text" value="<?=$barangbukti->id_bukti;?>" disabled />
                    </div>

                    <div class="mb-3">
                        <label for="id_laporan">ID LAPORAN <code>*</code></label>
                        <input class="form-control <?php echo form_error('id_laporan') ? 'is-invalid':'' ?>"
                            type="text" name="id_laporan" value="<?=$barangbukti->id_laporan;?>" placeholder="ID LAPORAN" required />
                        <div class="invalid-feedback">
                            <?php echo form_error('id_laporan') ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_barang_bukti">JENIS BARANG BUKTI <code>*</code></label>
                        <input class="form-control <?php echo form_error('jenis_barang_bukti') ? 'is-invalid':'' ?>"
                            type="text" name="jenis_barang_bukti" value="<?=$barangbukti->jenis_barang_bukti;?>" placeholder="JENIS BARANG BUKTI" required />
                        <div class="invalid-feedback">
                            <?php echo form_error('jenis_barang_bukti') ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi">DESKRIPSI <code>*</code></label>
                        <textarea name="deskripsi" rows="3" class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>" required><?=$barangbukti->deskripsi;?></textarea>
                        <div class="invalid-feedback">
                            <?php echo form_error('deskripsi') ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_ditemukan">TANGGAL DITEMUKAN <code>*</code></label>
                        <input class="form-control <?php echo form_error('tanggal_ditemukan') ? 'is-invalid':'' ?>"
                            type="date" name="tanggal_ditemukan" value="<?=$barangbukti->tanggal_ditemukan;?>" required />
                        <div class="invalid-feedback">
                            <?php echo form_error('tanggal_ditemukan') ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="status_barang">STATUS BARANG <code>*</code></label>
                        <select name="status_barang" class="form-control chosen-select" required>
                            <option value="<?=$barangbukti->status_barang;?>" selected><?=$barangbukti->status_barang;?></option>
                            <option value="Disimpan">Disimpan</option>
                            <option value="Diproses">Diproses</option>
                            <option value="Dikembalikan">Dikembalikan</option>
                            <option value="Dimusnahkan">Dimusnahkan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="bukti">FILE BUKTI</label>
                        <input class="form-control" type="file" name="bukti" />
                        <?php if($barangbukti->bukti): ?>
                            <small class="text-muted">File saat ini: <?=$barangbukti->bukti?></small>
                            <input type="hidden" name="old_bukti" value="<?=$barangbukti->bukti?>" />
                        <?php endif; ?>
                    </div>

                    <button class="btn btn-warning" type="submit"><i class="fas fa-save"></i> UPDATE</button>
                </form>                
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>
