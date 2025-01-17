<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Laporan</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Laporan Masuk</li>
            </ol>
        </nav>
    </div>
</div>
<?php
include "../conn/conn.php"; 
?>
<!--end breadcrumb-->
<div class="">
    <div class="">
        <div class="container py-2">
            <h2 class="font-weight-light text-center text-muted py-3">Laporan Masuk</h2>
            <?php
            function tgl_indo($tanggal){
                $bulan = array (
                    1 =>'Januari',
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
              $query = mysqli_query($conn, "SELECT * FROM laporan_kegiatan as a  WHERE a.status='PENDING' OR a.status='DITERIMA' ORDER BY a.id_laporan DESC");
              while ($data = mysqli_fetch_array($query)) { ?>
                <div class="row">
                <div class="col-auto text-center flex-column d-none d-sm-flex">
                    <div class="row h-50">
                        <div class="col border-end">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                    <h5 class="m-2">
                        <span class="badge rounded-pill bg-warning">&nbsp;</span>
                    </h5>
                    <div class="row h-50">
                        <div class="col border-end">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                </div>
                <div class="col py-2">
                    <div class="card border-primary shadow radius-15">
                        <div class="card-body">
                            <div class="float-end text-primary"><?= tgl_indo(date('Y-m-d', strtotime($data['tgl']))).', '.$data['judul_laporan']?></div>
                            <h4 class="card-title text-primary"><?= ucwords($data['judul_laporan']) ?> <span class="badge <?= $data['status']=="DITERIMA" ? ' bg-success' : ' bg-danger'?>" style="font-size:12px;"><?= $data['status'] ?></span></h4>
                            <p class="card-text"><?= $data['isi'] ?></p>
                            <button class="btn btn-sm btn-outline-warning" type="button" data-bs-target="#t2_details<?= $data['id_laporan']?>" data-bs-toggle="collapse">Detail Laporan ▼</button>
                            <div class="collapse border" id="t2_details<?= $data['id_laporan']?>">
                                <div class="p-2 text-monospace">
                                    <div>Lokasi : <?= ucwords($data['lokasi']) ?></div>
                                    <div>Pelapor : <b><?= strtoupper($data['judul_laporan'])?></b></div>
                                    <div>Nomor Indentitas : <b><?= strtoupper($data['identitas'])?></b></div>
                                    <div>Jenis Kelamin : <b><?= strtoupper($data['jenis_kelamin'])?></b></div>
                                    <div>Pekerjaan : <b><?= strtoupper($data['pekerjaan'])?></b></div>
                                    <div>Kewarganegaraaan : <b><?= strtoupper($data['kewarganegaraan'])?></b></div>
                                    <div>Peristiwa: <b><?= strtoupper($data['peristiwa'])?></b></div>
                                    <div>Terlapor : <b><?= strtoupper($data['nama_terlapor'])?></b></div>
                                    <div>Alamat Terlapor : <b><?= strtoupper($data['alamat_t'])?></b></div>
                                    <div>Saksi : <b><?= strtoupper($data['nama_s1'])?>
                                    <?php 
                            if ( $data['nama_s3'] =="0") {
                                ?>
                                <?=","?>
                                <?= strtoupper($data['nama_s2'])?>
                            <?php } ?>
                            <?php      
                            if ($data['nama_s2'] && $data['nama_s3'] =="0") {

                            }
                            
                            else {
                            ?>
                           <?= ", ".strtoupper($data['nama_s2'])?>
                           <?= ", ". strtoupper($data['nama_s3'])?>
                            <?php } ?>
                                    </b></div>
                                    <hr>
                                    <div>Foto : </div>
                                    <div>
                                        <?php
                                        $id_laporan = $data['id_laporan'];
                                        $query_foto = mysqli_query($conn, "SELECT * FROM foto_kegiatan WHERE id_laporan = '$id_laporan'");
                                         while ($foto = mysqli_fetch_array($query_foto)) {
                                          echo  '<img src="../file/'.$foto['foto'].'" width="150" height="120" class="border rounded cursor-pointer mr-5" alt=""> ';
                                         }
                                        ?>
                                    </div>
                                    <hr>
                                    <div>video : </div>
                                    <div>
                                        <?php
                                        $query_video = mysqli_query($conn, "SELECT * FROM video_kegiatan WHERE id_laporan = '$id_laporan'");
                                         while ($video = mysqli_fetch_array($query_video)) {
                                          echo  '
                                          <video width="320" height="240" controls>
                                            <source src="../file/'.$video['video'].'" type="video/mp4">
                                            </video>
                                          ';
                                         }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            if ($data['status']=="DITERIMA") {?>
                    <a href="index.php?page=arsip&&id=<?= $data['id_laporan'] ?>" class="btn btn-sm btn-secondary">Arsip</a>
                    <a href="print_laporan.php?page=print_laporan&&id=<?= $data['id_laporan'] ?>" class="btn btn-sm btn-primary" target="_blank">Cetak</a>

                                <?php }
                            else {
                            ?>
                            <a href="index.php?page=confirm_laporan&&id=<?= $data['id_laporan'] ?>" class="btn btn-sm btn-success" onClick="return confirm('Apakah Laporan Sudah Benar ?')">Terima Laporan</a>
                            <a href="index.php?page=tolak_laporan&&id=<?= $data['id_laporan'] ?>" class="btn btn-sm btn-danger" href="index.php?page=tolak_keterangan?>">Tolak Laporan</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
            ?>
        <!--container-->
    </div>
</div>