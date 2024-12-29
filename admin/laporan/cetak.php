<?php 
include "../conn/conn.php";
$id_laporan = $_GET['id'];
$data_laporan = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM laporan_kegiatan WHERE id_laporan = '$id_laporan'"));

?>


<h6 class="mb-0 text-uppercase">Pelanggaran Adminstrasi</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div>
            <table id="example1">
                <thead>
                    <tr>
                        <th width="20%">
                        </th>
                        <th width="10%">
                        </th>
                        <th width="100%"><center>Data Laporan</center>
                    </tr>
                </thead>
                <?php
$query = mysqli_query($conn, "SELECT * FROM laporan_kegiatan WHERE id_laporan = '$id_laporan'");
              while ($data = mysqli_fetch_array($query)) { ?>
                <tbody id="t2_details<?= $data['id_laporan']?>">
				<div class="row mb-3">
                            <label for="judul" class="col-sm-3 col-form-label">Nama Pelapor</label>
                            <div class="col-sm-9">
							<?= strtoupper($data['identitas'])?>
                            </div>
                        </div>
                </tbody>
            </table>
        </div>
        <?php }
            ?>
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
                    paginate: false,
                    info: false,
                    filter: false,
                    sorting:false,
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