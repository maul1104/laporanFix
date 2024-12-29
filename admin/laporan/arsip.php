<?php 
include "../conn/conn.php";
$id_laporan = $_GET['id'];
$data_laporan = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM laporan_kegiatan WHERE id_laporan = '$id_laporan'"));
if (isset($_POST['submit'])) {
    $jenis_laporan = $_POST['jenis_laporan'];
    mysqli_query($conn,"UPDATE laporan_kegiatan SET jenis_laporan='$jenis_laporan' WHERE id_laporan='$id_laporan'");
    echo "<script>window.location.href='index.php?page=jenis_laporan';</script>'";
    exit;
}
?>
<div class="row">
    <div class="col-xl-9 mx-auto">
        <div class="card border-top border-0 border-4 border-warning">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22"></i>
                        </div>
                        <h5 class="mb-0">Pilih jenis laporan</h5>
                    </div>
                    <hr />
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Jenis Laporan</label>
                            <div class="col-sm-9">
                                        <select class="form-select mb-3" name="jenis_laporan" aria-label="Default select example">
                                        <option value="Pelanggaran Administrasi" selected>Pelanggaran Administrasi</option>
                                        <option value="Pelanggaran Kode Etik">Pelanggaran Kode Etik</option>
                                        <option value="Pelanggaran Pidana">Pelanggaran Pidana</option>
                                        <option value="Pelanggaran Hukum lainnya">Pelanggaran Hukum lainnya</option>
                                        </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                        <button type="submit" name="submit" class="btn btn-primary px-5">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
