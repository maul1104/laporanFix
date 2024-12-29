<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Laporan</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="dashboard.php?page=dashboard"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Laporan</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<?php
if (isset($_POST['submit'])) {
    include "conn/conn.php";
    $jenis_laporan = $_POST['jenis_laporan'];
    $judul = $_POST['judul'];
    $identitas = $_POST['identitas'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $pekerjaan = $_POST['pekerjaan'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $lokasi = $_POST['lokasi'];
    $peristiwa = $_POST['peristiwa'];
    $nama_terlapor = $_POST['nama_terlapor'];
    $alamat_t = $_POST['alamat_t'];
    $nohp_terlapor = $_POST['nohp_terlapor'];
    $nama_s1 = $_POST['nama_s1'];
    $alamat_s1 = $_POST['alamat_s1'];
    $nohp_s1 = $_POST['nohp_s1'];
    $nama_s2 = $_POST['nama_s2'];
    $alamat_s2 = $_POST['alamat_s2'];
    $nohp_s2 = $_POST['nohp_s2'];
    $nama_s3 = $_POST['nama_s3'];
    $alamat_s3 = $_POST['alamat_s3'];
    $nohp_s3 = $_POST['nohp_s3'];
    $tgl = $_POST['tgl'];
    $mytextarea = $_POST['mytextarea'];
    $created_at = date('Y-m-d');
    mysqli_query($conn,"INSERT INTO laporan_kegiatan (id_laporan,jenis_laporan,judul_laporan,identitas,jenis_kelamin,no_hp,pekerjaan,kewarganegaraan,email,lokasi,peristiwa,nama_terlapor,alamat_t,nohp_terlapor,tgl,isi,created_at,nama_s1,alamat_s1,nohp_s1,nama_s2,alamat_s2,nohp_s2,nama_s3,alamat_s3,nohp_s3,status) 
    VALUES ('','$jenis_laporan','$judul','$identitas','$jenis_kelamin','$no_hp','$pekerjaan','$kewarganegaraan','$email','$lokasi','$peristiwa','$nama_terlapor','$alamat_t','$nohp_terlapor','$tgl','$mytextarea','$created_at','$nama_s1','$alamat_s1','$nohp_s1','$nama_s2','$alamat_s2','$nohp_s2','$nama_s3','$alamat_s3','$nohp_s3','PENDING')");
    $get_id = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM laporan_kegiatan ORDER BY id_laporan DESC LIMIT 1"));
    $id = $get_id['id_laporan'];
    echo "<script>window.location.href='dashboard.php?page=upload_laporan&&id=".$id."';</script>'";
}
?>

    
    
<div class="row">
    <div class="col-xl-9 mx-auto">
        <div class="card border-top border-0 border-4 border-warning">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <h4 class="mb-0">Laporan</h4>
                    </div>
                    <hr />
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22"></i>
                        </div>
                        <h4 class="mb-0">Pelapor</h4>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="judul" class="col-sm-3 col-form-label">Nama Pelapor</label>
                            <div class="col-sm-9">
                                <input type="text" name="judul" class="form-control" id="judul" placeholder="Nama Pelapor" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="identitas" class="col-sm-3 col-form-label">Nomor Identitas (KTP)</label>
                            <div class="col-sm-9">
                                <input type="text" name="identitas" class="form-control" id="identitas" placeholder="Nomor Identitas" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <select class="form-select mb-3" name="jenis_kelamin" aria-label="Default select example">
                                    <option value="laki-laki" selected>Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                            <div class="col-sm-9">
                                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Pekerjaan" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kewarganegaraan" class="col-sm-3 col-form-label">Kewarganegaraan</label>
                            <div class="col-sm-9">
                                <input type="text" name="kewarganegaraan" class="form-control" id="kewarganegaraan" placeholder="Kewarganegaraan" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nohp" class="col-sm-3 col-form-label">Nomor HP</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_hp" class="form-control" id="nohp" placeholder="Nomor Hp" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                        <!--<div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Jenis Laporan</label>
                            <div class="col-sm-9">
                                <select class="form-select mb-3" name="identitas" aria-label="Default select example">
                                <?php
                                include "conn/conn.php";
                                $query_jenis = mysqli_query($conn, "SELECT * FROM jenis_laporan");
                                while ($jenis = mysqli_fetch_array($query_jenis)) { ?>
									<option value="<?= $jenis['identitas'] ?>"><?= ucwords($jenis['judul']) ?></option>
                                <?php
                                };
                                ?>
								</select>
                            </div>
                        </div> -->
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-home me-1 font-22"></i>
                            </div>
                            <h4 class="mb-0">Peristiwa yang dilaporkan</h4>
                        </div>
                        <div class="row mb-3">
                            <label for="peristiwa" class="col-sm-3 col-form-label">Peristiwa yang dilaporkan</label>
                            <div class="col-sm-9">
                                <input type="text" name="peristiwa" class="form-control" id="peristiwa" placeholder="Peristiwa yang dilaporkan" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Lokasi Kegiatan" class="col-sm-3 col-form-label">Lokasi Laporan</label>
                            <div class="col-sm-9">
                                <input type="text" name="lokasi" class="form-control" id="Lokasi Kegiatan" placeholder="Lokasi Kegiatan" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tgl" class="col-sm-3 col-form-label">Tanggal Laporan</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tgl" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama terlapor" class="col-sm-3 col-form-label">Nama Terlapor</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_terlapor" class="form-control" id="nama terlapor" placeholder="Nama Terlapor" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat_t" class="col-sm-3 col-form-label">Alamat Terlapor</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat_t" class="form-control" id="alamat_t" placeholder="Alamat Terlapor" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Nomor Hp terlapor" class="col-sm-3 col-form-label">Nomor HP Terlapor</label>
                            <div class="col-sm-9">
                                <input type="text" name="nohp_terlapor" class="form-control" id="Nomor Hp terlapor" placeholder="Nomor Hp Terlapor" required>
                            </div>
                        </div>
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22"></i>
                            </div>
                            <h4 class="mb-0">Saksi-saksi</h4>
                        </div>
                        <hr  />
                        <div class="row mb-3">
                            <label for="nama_s1" class="col-sm-3 col-form-label">Nama Saksi</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_s1" class="form-control" id="nama_s1" placeholder="Nama Saksi" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat_s1" class="col-sm-3 col-form-label">Alamat saksi</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat_s1" class="form-control" id="alamat_s1" placeholder="Alamat Saksi" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nohp_s1" class="col-sm-3 col-form-label"><a>Nomor HP Saksi</a></label>
                            <div class="col-sm-9">
                                <input type="text" name="nohp_s1" class="form-control" id="nohp_s1" placeholder="Nomor Hp Saksi" required>
                            </div>
                        </div>
                            <hr  \>
                            <div class="row mb-3">
                            <label for="nama_s2" class="col-sm-3 col-form-label">Nama Saksi</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_s2" class="form-control" id="nama_s2" placeholder="Nama Saksi" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat_s2" class="col-sm-3 col-form-label">Alamat saksi</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat_s2" class="form-control" id="alamat_s2" placeholder="Alamat Saksi" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nohp_s2" class="col-sm-3 col-form-label"><a>Nomor HP Saksi</a></label>
                            <div class="col-sm-9">
                                <input type="text" name="nohp_s2" class="form-control" id="nohp_s2" placeholder="Nomor Hp Saksi" >
                            </div>
                        </div>
                        <hr  />
                        <div class="row mb-3">
                            <label for="nama_s3" class="col-sm-3 col-form-label">Nama Saksi</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_s3" class="form-control" id="nama_s3" placeholder="Nama Saksi" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat_s3" class="col-sm-3 col-form-label">Alamat saksi</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat_s3" class="form-control" id="alamat_s3" placeholder="Alamat Saksi" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nohp_s3" class="col-sm-3 col-form-label"><a>Nomor HP Saksi</a></label>
                            <div class="col-sm-9">
                                <input type="text" name="nohp_s3" class="form-control" id="nohp_s3" placeholder="Nomor Hp Saksi" >
                            </div>
                        </div>
                        <hr  />
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22">Rincian Singkat Peristiwa</i>
                            </div>
                            <h4 class="mb-0"></h4>
                        </div>
                        <div class="row mb-3">
                            <label for="mytextarea" class="col-sm-3 col-form-label">Urian Singkat Laporan</label>
                            <div class="col-sm-9">
                            <textarea id="mytextarea" name="mytextarea"></textarea>
                            </div>
                        </div>
                        
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                            <input type="submit" name="submit" value="Upload Foto / Video Laporan" class="btn btn-primary px-5">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>