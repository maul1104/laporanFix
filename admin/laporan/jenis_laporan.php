<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Laporan</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="dashboard.php?page=dashboard"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">List Laporan Saya</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Pelanggaran Adminstrasi</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th width="5%">
                            <center>No</center>
                        </th>
                        <th>
                            <center>Jenis Laporan</center>
                        </th>
                        <th>
                            <center>Nama Pelapor</center>
                        </th>
                        <th width="20%">
                            <center>Nama Terlapor</center>
                        </th>
                        <th>
                            <center>Tanggal Laporan<center>
                        </th>
                        <th>
                            <center>Keterangan<center>
                        </th>
                        <!--<th>
                            <center>Keterangan<center
                        </th>>-->
                        <!--<th>
                            <center>Action<center>
                        </th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    function tgl_indo($tanggal){
                        $bulan = array (
                            1 =>   'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                        );
                        $pecahkan = explode('-', $tanggal); 
                        // variabel pecahkan 0 = tanggal
                        // variabel pecahkan 1 = bulan
                        // variabel pecahkan 2 = tahun
                        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                    }
                    $no = 1;
                    include "../conn/conn.php";
                    $id_staff = ['id_staff'];
                    $query = mysqli_query($conn, "SELECT * FROM laporan_kegiatan where status='diterima' && jenis_laporan='Pelanggaran Administrasi'");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td>
                                <center><?= $no++ ?></center>
                            </td>
                            <td><center><?= ucwords($data['jenis_laporan']) ?></center></td>
                            <td><center><b><?= ucwords($data['judul_laporan']) ?></b></center></td>
                            <td><center><?= ucwords($data['nama_terlapor']) ?></center></td>
                            <td>
                            <center><?= tgl_indo(date('Y-m-d', strtotime($data['tgl']))) ?></center>
                            </td>
                            <td>
                                <center><a href="print_laporan.php?page=print_laporan&&id=<?= $data['id_laporan'] ?>" class="btn btn-sm btn-primary" target="_blank">Cetak</a></center>
                            </td>
                            <!--<td><center><?= ucwords($data['Keterangan']) ?></center></td>-->
                            <?php
                            if ($data['status']=="DITERIMA") {
                            }else { ?>
                              <!--<a href="dashboard.php?page=edit_laporan&id=<?= $data['id_laporan'] ?>"><i class="bx bxs-pencil"></i> Edit</a> | <a href="dashboard.php?page=delete_laporan&id=<?= $data['id_laporan'] ?>" style="color:red" onClick="return confirm('Delete This Laporan ?')"><i class="bx bxs-trash"></i> Hapus</a> -->
                            <?php }
                            ?>
                            </td>
                        </tr>
                    <?php
                    };
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.fileupload.js"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
	<script src="../assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#show_hide_password a").on('click', function(event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});

			window.setTimeout(function() {
				$(".alert").fadeTo(1000, 0).slideUp(1000, function() {
					$(this).remove();
				});
			}, 2000);

			$(document).ready(function() {
				$('#example').DataTable();
			});

			$(document).ready(function() {
				var table = $('#example1').DataTable({
					lengthChange: false,
					buttons: ['print']
				});

				table.buttons().container()
					.appendTo('#example1_wrapper .col-md-6:eq(0)');
			});

			tinymce.init({
				selector: '#mytextarea'
			});

			$('#fancy-file-upload').FancyFileUpload({
				params: {
					action: 'fileuploader'
				},
				maxfilesize: 1000000
			});

			$(document).ready(function() {
				$('#image-uploadify').imageuploadify();
			})
			$(document).ready(function() {
				$('#image-uploadify2').imageuploadify();
			})
		});
	</script>
	<!--app JS-->
	<script src="../assets/js/app.js"></script>


<h6 class="mb-0 text-uppercase">Pelanggaran Pidana</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th width="5%">
                            <center>No</center>
                        </th>
                        <th>
                            <center>Jenis Laporan</center>
                        </th>
                        <th>
                            <center>Nama Pelapor</center>
                        </th>
                        <th width="20%">
                            <center>Nama Terlapor</center>
                        </th>
                        <th>
                            <center>Tanggal Laporan<center>
                        </th>
                        <th>
                            <center>Keterangan<center>
                        </th>
                        <!--<th>
                            <center>Keterangan<center
                        </th>>-->
                        <!--<th>
                            <center>Action<center>
                        </th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    include "../conn/conn.php";
                    $id_staff = ['id_staff'];
                    $query = mysqli_query($conn, "SELECT * FROM laporan_kegiatan where status='diterima' && jenis_laporan='Pelanggaran Pidana'");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td>
                                <center><?= $no++ ?></center>
                            </td>
                            <td><center><?= ucwords($data['jenis_laporan']) ?></center></td>
                            <td><center><b><?= ucwords($data['judul_laporan']) ?></b></center></td>
                            <td><center><?= ucwords($data['nama_terlapor']) ?></center></td>
                            <td>
                            <center><?= tgl_indo(date('Y-m-d', strtotime($data['tgl']))) ?></center>
                            </td>
                            <td>
                            <center><a href="print_laporan.php?page=print_laporan&&id=<?= $data['id_laporan'] ?>" class="btn btn-sm btn-primary" target="_blank">Cetak</a></center>
                                <!--<center><span class="badge <?= $data['status']=="DITERIMA" ? ' bg-success' : ' bg-danger'?>"><?= $data['status']?></span></center>-->
                            </td>
                            <!--<td><center><?= ucwords($data['Keterangan']) ?></center></td>-->
                            <?php
                            if ($data['status']=="DITERIMA") {
                            }else { ?>
                              <!--<a href="dashboard.php?page=edit_laporan&id=<?= $data['id_laporan'] ?>"><i class="bx bxs-pencil"></i> Edit</a> | <a href="dashboard.php?page=delete_laporan&id=<?= $data['id_laporan'] ?>" style="color:red" onClick="return confirm('Delete This Laporan ?')"><i class="bx bxs-trash"></i> Hapus</a> -->
                            <?php }
                            ?>
                            </td>
                        </tr>
                    <?php
                    };
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.fileupload.js"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
	<script src="../assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#show_hide_password a").on('click', function(event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});

			window.setTimeout(function() {
				$(".alert").fadeTo(1000, 0).slideUp(1000, function() {
					$(this).remove();
				});
			}, 2000);

			$(document).ready(function() {
				$('#example').DataTable();
			});

			$(document).ready(function() {
				var table = $('#example4').DataTable({
					lengthChange: false,
					buttons: ['print']
				});

				table.buttons().container()
					.appendTo('#example4_wrapper .col-md-6:eq(0)');
			});

			tinymce.init({
				selector: '#mytextarea'
			});

			$('#fancy-file-upload').FancyFileUpload({
				params: {
					action: 'fileuploader'
				},
				maxfilesize: 1000000
			});

			$(document).ready(function() {
				$('#image-uploadify').imageuploadify();
			})
			$(document).ready(function() {
				$('#image-uploadify2').imageuploadify();
			})
		});
	</script>
	<!--app JS-->
	<script src="../assets/js/app.js"></script>

<h6 class="mb-0 text-uppercase">Pelanggaran Kode Etik</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th width="5%">
                            <center>No</center>
                        </th>
                        <th>
                            <center>Jenis Laporan</center>
                        </th>
                        <th>
                            <center>Nama Pelapor</center>
                        </th>
                        <th width="20%">
                            <center>Nama Terlapor</center>
                        </th>
                        <th>
                            <center>Tanggal Laporan<center>
                        </th>
                        <th>
                            <center>Keterangan<center>
                        </th>
                        <!--<th>
                            <center>Keterangan<center
                        </th>>-->
                        <!--<th>
                            <center>Action<center>
                        </th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    include "../conn/conn.php";
                    $id_staff = ['id_staff'];
                    $query = mysqli_query($conn, "SELECT * FROM laporan_kegiatan where status='diterima' && jenis_laporan='Pelanggaran Kode Etik'");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td>
                                <center><?= $no++ ?></center>
                            </td>
                            <td><center><?= ucwords($data['jenis_laporan']) ?></center></td>
                            <td><center><b><?= ucwords($data['judul_laporan']) ?></b></center></td>
                            <td><center><?= ucwords($data['nama_terlapor']) ?></center></td>
                            <td>
                            <center><?= tgl_indo(date('Y-m-d', strtotime($data['tgl']))) ?></center>
                            </td>
                            <td>
                            <center><a href="print_laporan.php?page=print_laporan&&id=<?= $data['id_laporan'] ?>" class="btn btn-sm btn-primary" target="_blank">Cetak</a></center>
                                <!--<center><span class="badge <?= $data['status']=="DITERIMA" ? ' bg-success' : ' bg-danger'?>"><?= $data['status']?></span></center>-->
                            </td>
                            <!--<td><center><?= ucwords($data['Keterangan']) ?></center></td>-->
                            <?php
                            if ($data['status']=="DITERIMA") {
                            }else { ?>
                              <!--<a href="dashboard.php?page=edit_laporan&id=<?= $data['id_laporan'] ?>"><i class="bx bxs-pencil"></i> Edit</a> | <a href="dashboard.php?page=delete_laporan&id=<?= $data['id_laporan'] ?>" style="color:red" onClick="return confirm('Delete This Laporan ?')"><i class="bx bxs-trash"></i> Hapus</a> -->
                            <?php }
                            ?>
                            </td>
                        </tr>
                    <?php
                    };
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.fileupload.js"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
	<script src="../assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#show_hide_password a").on('click', function(event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});

			window.setTimeout(function() {
				$(".alert").fadeTo(1000, 0).slideUp(1000, function() {
					$(this).remove();
				});
			}, 2000);

			$(document).ready(function() {
				$('#example').DataTable();
			});

			$(document).ready(function() {
				var table = $('#example3').DataTable({
					lengthChange: false,
					buttons: ['print']
				});

				table.buttons().container()
					.appendTo('#example3_wrapper .col-md-6:eq(0)');
			});

			tinymce.init({
				selector: '#mytextarea'
			});

			$('#fancy-file-upload').FancyFileUpload({
				params: {
					action: 'fileuploader'
				},
				maxfilesize: 1000000
			});

			$(document).ready(function() {
				$('#image-uploadify').imageuploadify();
			})
			$(document).ready(function() {
				$('#image-uploadify2').imageuploadify();
			})
		});
	</script>
	<!--app JS-->
	<script src="../assets/js/app.js"></script>


<h6 class="mb-0 text-uppercase">Pelanggaran Hukum lainnya</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th width="5%">
                            <center>No</center>
                        </th>
                        <th>
                            <center>Jenis Laporan</center>
                        </th>
                        <th>
                            <center>Nama Pelapor</center>
                        </th>
                        <th width="20%">
                            <center>Nama Terlapor</center>
                        </th>
                        <th>
                            <center>Tanggal Laporan<center>
                        </th>
                        <th>
                            <center>Keterangan<center>
                        </th>
                        <!--<th>
                            <center>Keterangan<center
                        </th>>-->
                        <!--<th>
                            <center>Action<center>
                        </th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    include "../conn/conn.php";
                    $id_staff = ['id_staff'];
                    $query = mysqli_query($conn, "SELECT * FROM laporan_kegiatan where status='diterima' && jenis_laporan='Pelanggaran Hukum lainnya'");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td>
                                <center><?= $no++ ?></center>
                            </td>
                            <td><center><?= ucwords($data['jenis_laporan']) ?></center></td>
                            <td><center><b><?= ucwords($data['judul_laporan']) ?></b></center></td>
                            <td><center><?= ucwords($data['nama_terlapor']) ?></center></td>
                            <td>
                            <center><?= tgl_indo(date('Y-m-d', strtotime($data['tgl']))) ?></center>
                            </td>
                            <td>
                                <center><a href="print_laporan.php?page=print_laporan&&id=<?= $data['id_laporan'] ?>" class="btn btn-sm btn-primary" target="_blank">Cetak</a></center>
                            </td>
                            <!--<td><center><?= ucwords($data['Keterangan']) ?></center></td>-->
                            <?php
                            if ($data['status']=="DITERIMA") {
                            }else { ?>
                              <!--<a href="dashboard.php?page=edit_laporan&id=<?= $data['id_laporan'] ?>"><i class="bx bxs-pencil"></i> Edit</a> | <a href="dashboard.php?page=delete_laporan&id=<?= $data['id_laporan'] ?>" style="color:red" onClick="return confirm('Delete This Laporan ?')"><i class="bx bxs-trash"></i> Hapus</a> -->
                            <?php }
                            ?>
                            </td>
                        </tr>
                    <?php
                    };
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.fileupload.js"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
	<script src="../assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#show_hide_password a").on('click', function(event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});

			window.setTimeout(function() {
				$(".alert").fadeTo(1000, 0).slideUp(1000, function() {
					$(this).remove();
				});
			}, 2000);

			$(document).ready(function() {
				$('#example').DataTable();
			});

			$(document).ready(function() {
				var table = $('#example5').DataTable({
					lengthChange: false,
					buttons: ['print']
				});

				table.buttons().container()
					.appendTo('#example5_wrapper .col-md-6:eq(0)');
			});

			tinymce.init({
				selector: '#mytextarea'
			});

			$('#fancy-file-upload').FancyFileUpload({
				params: {
					action: 'fileuploader'
				},
				maxfilesize: 1000000
			});

			$(document).ready(function() {
				$('#image-uploadify').imageuploadify();
			})
			$(document).ready(function() {
				$('#image-uploadify2').imageuploadify();
			})
		});
	</script>
	<!--app JS-->
	<script src="../assets/js/app.js"></script>