<?php 
include "../conn/conn.php";
$id_laporan = $_GET['id'];
$data_laporan = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM laporan_kegiatan WHERE id_laporan = '$id_laporan'"));
if (isset($_POST['submit'])) {
    $keterangan = $_POST['keterangan'];
    mysqli_query($conn,"UPDATE laporan_kegiatan SET status='DITOLAK',keterangan='$keterangan' WHERE id_laporan='$id_laporan'");
    echo "<script>window.location.href='index.php?page=laporan_kegiatan';</script>'";
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
                        <h5 class="mb-0">Keterangan Penolakan</h5>
                    </div>
                    <hr />
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="keterangan" class="col-sm-3 col-form-label">keterangan</label>
                            <div class="col-sm-9">
                            <textarea id="keterangan" size="big" name="keterangan"></textarea>
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


