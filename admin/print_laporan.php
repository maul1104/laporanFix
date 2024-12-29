<?php 
include "../conn/conn.php";
require_once __DIR__ . '/../vendor/fpdf/fpdf.php';

class PDF extends FPDF {
    function letak($gambar,$lebar,$tinggi) {
            // Mendapatkan lebar halaman
            $lebarHalaman = $this->GetPageWidth();

            // Menghitung posisi x dan y untuk meletakkan gambar di tengah halaman
            $x = ($lebarHalaman - $lebar) / 2;
            $y = 5;

            // Meletakkan gambar di tengah halaman
            $this->Image($gambar, $x, $y, $lebar, $tinggi);
            $this->Ln(20);
    }
    function garis(){
        $this->SetLineWidth(1);
        $this->Line(5,55,205,55);
        $this->SetLineWidth(0);
        $this->Line(5,56,205,56);
        $this->Ln(10);

    }
    function judul($teks1, $teks2, $teks3, $teks4, $teks5) {
        $this->Cell(45);
        $this->SetFont('Times','B','24');
        $this->Cell(100,6,$teks1,'0','1','C');

        $this->Cell(45);
        $this->SetFont('Times','B','12');
        $this->Cell(100,6,$teks2,'0','1','C');

        $this->Cell(45);
        $this->SetFont('Times','B','12');
        $this->Cell(100,6,$teks3,'0','1','C');

        $this->Cell(30);
        $this->SetFont('Times','B','7');
        $this->Cell(40,6,$teks4,'0','1','C');

        $this->Cell(100);
        $this->SetFont('Times','B','7');
        $this->Cell(0,'-6',$teks5,'0','1','C');


    }
    function subjudul($sub1) {
        $this->Cell(45);
        $this->SetFont('Times','B','18');
        $this->Cell(100,10,$sub1,'0','1','C');
    }

    function footeratas($footer1, $footer2){
        $this->Cell(30);
        $this->SetFont('Times','','12');
        $this->Cell(40,6,$footer1,'0','1','C');

        $this->Cell(70);
        $this->SetFont('Times','','12');
        $this->Cell(0,'-6',$footer2,'0','1','C');
    }

    function footerbawah($footer3, $footer4){
        $this->Cell(30);
        $this->SetFont('Times','','12');
        $this->Cell(40,6,$footer3,'0','1','C');

        $this->Cell(70);
        $this->SetFont('Times','','12');
        $this->Cell(0,'-6',$footer4,'0','1','C');
    }
    
}
$id_laporan = $_GET['id'];
$data_laporan = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM laporan_kegiatan WHERE id_laporan = '$id_laporan'"));

if (isset($_POST['submit'])) {
    $jenis_laporan = $_POST['jenis_laporan'];
    mysqli_query($conn,"UPDATE laporan_kegiatan SET jenis_laporan='$jenis_laporan' WHERE id_laporan='$id_laporan'");
    echo "<script>window.location.href='index.php?page=jenis_laporan';</script>";
    exit;
}
ob_start();
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4');
$pdf->letak('logo-garuda.png',20, 20);
$pdf->judul('BAWASLU', 'BADAN PENGAWAS PEMILIHAN UMUM','K A B U P A T E N  M E R A U K E', 'ALAMAT:JALAN BRAWIJAYA NO.11 B MERAUKE', 'HP: 085240144773');
$pdf->garis();
$pdf->subjudul('FORM LAPORAN');
$pdf->SetFont('Times', '', 12);

$query = mysqli_query($conn, "SELECT * FROM laporan_kegiatan WHERE id_laporan = '$id_laporan'");
while ($data = mysqli_fetch_array($query)) {
    // Tambahkan konten ke PDF
    $pdf->Ln(10);

    $pdf->Cell(0, 7, '1. Pelapor', 0, 1);

    $pdf->Cell(7, 10, 'Nama Pelapor               :    ' . strtoupper($data['judul_laporan']), 0, 1);

    $pdf->Cell(7, 10, 'No. Identitas                 :    ' . strtoupper($data['identitas']), 0, 1);

    $pdf->Cell(7, 10, 'Jenis Kelamin               :    ' . strtoupper($data['jenis_kelamin']), 0, 1);

    $pdf->Cell(7, 10, 'No. HP                          :    ' . strtoupper($data['no_hp']), 0, 1);

    $pdf->Cell(7, 10, 'Pekerjaan                      :    ' . strtoupper($data['pekerjaan']), 0, 1);

    $pdf->Cell(7, 10, 'Kewarganegaraan         :    ' . strtoupper($data['kewarganegaraan']), 0, 1);

    $pdf->Ln(15);

    $pdf->Cell(0, 7, '2. Peristiwa Yang di Temukan', 0, 1);

    $pdf->Cell(7, 10, 'Peristiwa Yang Dilaporkan      :    ' . strtoupper($data['peristiwa']), 0, 1);

    $pdf->Cell(7, 10, 'Lokasi Laporan                        :    ' . strtoupper($data['lokasi']), 0, 1);

    $pdf->Cell(7, 10, 'Tanggal Laporan                      :    ' . strtoupper($data['tgl']), 0, 1);

    $pdf->Cell(7, 10, 'Nama Terlapor                         :    ' . strtoupper($data['nama_terlapor']), 0, 1);

    $pdf->Cell(7, 10, 'Alamat Terlapor                       :    ' . strtoupper($data['nohp_terlapor']), 0, 1);

    $pdf->Cell(7, 10, 'No. Hp Terlapor                       :    ' . strtoupper($data['identitas']), 0, 1);

    $pdf->Ln(15);

    $pdf->Cell(0, 7, '3. Saksi-Saksi ',0, 1);

    $pdf->Cell(5, 5, 'Saksi 1 :', 0, 1 );

    $pdf->Cell(5, 7, 'Nama                         :    ' . strtoupper($data['nama_s1']), 0, 1);

    $pdf->Cell(5, 7, 'Alamat                       :    ' . strtoupper($data['alamat_s1']), 0, 1);

    $pdf->Cell(5, 7, 'No. Hp                       :    ' . strtoupper($data['nohp_s1']), 0, 1);

    $pdf->Ln(10);

    $pdf->Cell(5, 5, 'Saksi 2 :', 0, 1 );

    $pdf->Cell(5, 7, 'Nama                         :    ' . strtoupper($data['nama_s2']), 0, 1);

    $pdf->Cell(5, 7, 'Alamat                       :    ' . strtoupper($data['alamat_s2']), 0, 1);

    $pdf->Cell(5, 7, 'No. Hp                       :    ' . strtoupper($data['nohp_s2']), 0, 1);

    $pdf->Ln(10);

    $pdf->Cell(5, 5, 'Saksi 3 :', 0, 1 );

    $pdf->Cell(5, 7, 'Nama                         :    ' . strtoupper($data['nama_s3']), 0, 1);

    $pdf->Cell(5, 7, 'Alamat                       :    ' . strtoupper($data['alamat_s3']), 0, 1);

    $pdf->Cell(5, 7, 'No. Hp                       :    ' . strtoupper($data['nohp_s3']), 0, 1);

    $pdf->Ln(10);

    $pdf->Cell(7, 10, 'Saya menyatakan bahwa ini adalah laporan yang sebenar-sebenarnya dan saya bersedia', 0, 1);

    $pdf->Cell(7, 10, 'mempertanggung jawabkannya di hadapan hukum.', 0, 1);

    $pdf->Ln(15);

    $pdf->footeratas('Penerima Laporan', 'Pelapor');

    $pdf->Ln(20);

    $pdf->footerbawah('......................', strtoupper($data['judul_laporan']), 0, 1);






}

// Output PDF
$pdf->Output('I', 'Laporan.pdf');
ob_end_flush();
?>
