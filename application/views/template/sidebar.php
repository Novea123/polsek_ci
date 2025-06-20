      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
      	<!--begin::Sidebar Brand-->
      	<div class="sidebar-brand">
      		<!--begin::Brand Link-->
      		<a href="../index.html" class="brand-link">
      			<!--begin::Brand Image-->
      			<img
      				src="<?= base_url('assets/img/polsek.png') ?>"
      				alt="AdminLTE Logo"
      				class="brand-image opacity-75 shadow" />
      			<!--end::Brand Image-->
      			<!--begin::Brand Text-->
      			<span class="brand-text fw-light">APTK</span>
      			<!--end::Brand Text-->
      		</a>
      		<!--end::Brand Link-->
      	</div>
      	<!--end::Sidebar Brand-->
      	<!--begin::Sidebar Wrapper-->
      	<div class="sidebar-wrapper">
      		<nav class="mt-2">
      			<!--begin::Sidebar Menu-->
      			<ul
      				class="nav sidebar-menu flex-column"
      				data-lte-toggle="treeview"
      				role="menu"
      				data-accordion="false">
      				<li class="nav-header">DASHBOARD</li>
      				<li class="nav-item">
      					<a href="../generate/theme.html" class="nav-link">
      						<i class="nav-icon bi bi-palette"></i>
      						<p>Dashboard</p>
      					</a>
      				</li>
      				<li class="nav-header">DATA MASTER</li>
      				<li class="nav-item">
      					<a href="#" class="nav-link">
      						<i class="nav-icon bi bi-speedometer"></i>
      						<p>
      							Data Master
      							<i class="nav-arrow bi bi-chevron-right"></i>
      						</p>
      					</a>
      					<ul class="nav nav-treeview">
      						<li class="nav-item">
      							<a href="<?php echo site_url('petugas'); ?>" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Data Petugas</p>
      							</a>
      						</li>
      						<li class="nav-item">
      							<a href="<?php echo site_url('pelapor'); ?>" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Data Pelapor</p>
      							</a>
      						</li>
      						<li class="nav-item">
      							<a href="<?php echo site_url('pelanggaran'); ?>" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Data Pelanggaran</p>
      							</a>
      						</li>
      						<li class="nav-item">
      							<a href="<?php echo site_url('daftartahanan'); ?>" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Daftar Tahanan</p>
      							</a>
      						</li>
      						<li class="nav-item">
      							<a href="<?php echo site_url('laporankejahatan'); ?>" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Data Laporan Kejahatan</p>
      							</a>
      						<li class="nav-item">
      							<a href="<?php echo site_url('barangbukti'); ?>" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Data Barang Bukti</p>
      							</a>
      						</li>
      						<li class="nav-item">
      							<a href="<?php echo site_url('tindaklanjut'); ?>" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Tindak Lanjut Kasus</p>
      							</a>
      						</li>
      						<li class="nav-item">
      							<a href="<?php echo site_url('kinerjapetugas'); ?>" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Kinerja Petugas</p>
      							</a>
      						</li>
      						<li class="nav-item">
      							<a href="<?php echo site_url('monitoringkasus'); ?>" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Monitoring Kasus Harian</p>
      							</a>
      						</li>
      						<li class="nav-item">
      							<a href="<?php echo site_url('rekapitulasi'); ?>" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Rekapitulasi Penyelesaian Kasus</p>
      							</a>
      						</li>
      					</ul>
      				</li>


      				<li class="nav-header">LAPORAN</li>
      				<li class="nav-item">
      					<a href="#" class="nav-link">
      						<i class="nav-icon bi bi-box-arrow-in-right"></i>
      						<p>
      							LAPORAN
      							<i class="nav-arrow bi bi-chevron-right"></i>
      						</p>
      					</a>
      					<ul class="nav nav-treeview">
      						<li class="nav-item">
      							<a href="../examples/lockscreen.html" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Laporan Pelanggaran</p>
      							</a>
      						</li>
      						<li class="nav-item">
      							<a href="<?php echo site_url('laporan/laporan'); ?>" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Laporan Pelapor</p>
      							</a>
      						</li>
      						<li class="nav-item">
      							<a href="../examples/lockscreen.html" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Laporan Kejahatan</p>
      							</a>
      						</li>
      						<li class="nav-item">
      							<a href="../examples/lockscreen.html" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Laporan Tahanan</p>
      							</a>
      						</li>
      						<li class="nav-item">
      							<a href="../examples/lockscreen.html" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Laporan Barang Bukti</p>
      							</a>
      						</li>
      						<li class="nav-item">
      							<a href="../examples/lockscreen.html" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Laporan Tindak Lanjut</p>
      							</a>
      						</li>
      						<li class="nav-item">
      							<a href="../examples/lockscreen.html" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Laporan Kinerja Petugas</p>
      							</a>
      						</li>
      						<li class="nav-item">
      							<a href="../examples/lockscreen.html" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Laporan Kronologi Kasus</p>
      							</a>
      						</li>
      						<li class="nav-item">
      							<a href="../examples/lockscreen.html" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Laporan Barang Bukti</p>
      							</a>
      						</li>
      						<li class="nav-item">
      							<a href="../examples/lockscreen.html" class="nav-link">
      								<i class="nav-icon bi bi-circle"></i>
      								<p>Laporan Kasus</p>
      							</a>
      						</li>
      					</ul>
      				</li>
      				<li class="nav-header">PENGATURAN</li>
      				<li class="nav-item">
      					<a href="<?php echo site_url('user'); ?>" class="nav-link">
      						<i class="nav-icon bi bi-patch-check-fill"></i>
      						<p>Manajemen User</p>
      					</a>
      				</li>

      			</ul>
      			<!--end::Sidebar Menu-->
      		</nav>
      	</div>
      	<!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
