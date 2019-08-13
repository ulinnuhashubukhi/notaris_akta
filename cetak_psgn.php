<?php
include "configuration/connection.php";
include "configuration/function.php";
include_once('tcpdf/tcpdf.php');

	$list 		= mysql_fetch_array (mysql_query("SELECT * FROM trs_akta WHERE id_transaksi = '$_GET[id]'"));
	$akta1 		= mysql_fetch_array (mysql_query("SELECT * FROM tabel_akta WHERE id_akta = '$list[id_akta]'"));
	$client1 	= mysql_fetch_array (mysql_query("SELECT * FROM tabel_client WHERE id_client = '$list[id_client]'"));
	$objek1 	= mysql_fetch_array (mysql_query("SELECT * FROM tabel_objek WHERE id_objek = '$list[id_objek]'"));
	$kuasa1 	= mysql_fetch_array (mysql_query("SELECT * FROM tabel_kuasa WHERE id_kuasa = '$list[id_kuasa]'"));	
	$pasangan1 	= mysql_fetch_array (mysql_query("SELECT * FROM tabel_pasangan WHERE id_pasangan = '$list[id_pasangan]'"));		
	
	$tgl_akta = $list['tgl_akta'];
		
	$tahun = substr($tgl_akta, 0, 4);
	$bulan = substr($tgl_akta, 5, 2);
	$tgl   = substr($tgl_akta, 8, 2);	
		
	$jam   	= substr($tgl_akta, 11, 2);
	$menit   = substr($tgl_akta, 14, 2);	
	
	$jm		= substr($tgl_akta, 11, 5);
			
	$nilai = $tgl;	
	
	$nilaiThn = $tahun;
	
	$tgl_skr = $tgl."-".$bulan."-".$tahun;
	
	//objek
	
	$tgl_objek = $objek1['tgl_surat_perjanjian_bersama'];
	
	$tahun1 = substr($tgl_objek, 0, 4);
	$bulan2 = substr($tgl_objek, 5, 2);
	$tgl3   = substr($tgl_objek, 8, 2);
		
	$tgl_skrobjek = $tgl3."-".$bulan2."-".$tahun1;
	
	//kuasa
	
	$tgl_kuasa = $kuasa1['tgl_lahir'];
	
	$tahunk = substr($tgl_kuasa, 0, 4);
	$bulank = substr($tgl_kuasa, 5, 2);
	$tglk   = substr($tgl_kuasa, 8, 2);
		
	$tglskrg_kuasa = $tglk."-".$bulank."-".$tahunk;
	
	//pasangan
	
	$tgl_pasangan = $pasangan1['tgl_lahir'];
	
	$tahunp = substr($tgl_pasangan, 0, 4);
	$bulanp = substr($tgl_pasangan, 5, 2);
	$tglp   = substr($tgl_pasangan, 8, 2);
		
	$tglskrg_pasangan = $tglp."-".$bulanp."-".$tahunp;
	
	//akta
	
	$tgl_perjanjian_pembiyaan = $akta1['tgl_perjanjian_pembiayaan'];
	
	$tahuna = substr($tgl_perjanjian_pembiyaan, 0, 4);
	$bulana = substr($tgl_perjanjian_pembiyaan, 5, 2);
	$tgla   = substr($tgl_perjanjian_pembiyaan, 8, 2);
		
	$btgl_perjanjian_pembiyaan = $tgla."-".$bulana."-".$tahuna;
	
	
	//objek
	
	$tgl_surat_perjanjian_bersama = $objek1['tgl_surat_perjanjian_bersama'];
	
	$tahuno = substr($tgl_surat_perjanjian_bersama, 0, 4);
	$bulano = substr($tgl_surat_perjanjian_bersama, 5, 2);
	$tglo   = substr($tgl_surat_perjanjian_bersama, 8, 2);
		
	$btgl_surat_perjanjian_bersama = $tglo."-".$bulano."-".$tahuno;
	
	
	//validasi pasangan
	if($pasangan1['title'] == 'Nyonya' OR $pasangan1['title'] == 'Nona'){
		$dpnpasangan = "Istrinya";
	}else{
		$dpnpasangan = "Suaminya";
	}

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

  //Page header
  public function Header() {
     $this->SetFont('helvetica', '', 9);
    // Page number
    $this->Cell(0, 10, 'Halaman ' . $this->getAliasNumPage(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
  }

  // Page footer
  public function Footer() {
    global $footer;
    // Position at 15 mm from bottom
    $this->SetY(-15);
    // Set font
    $this->SetFont('helvetica', 'I', 8);
    // Page number
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle(''.$list[no_akta].'');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
  require_once(dirname(__FILE__).'/lang/eng.php');
  $pdf->setLanguageArray($l);
}

// --------------------------------------------------------- 1111

// add a page
$pdf->AddPage();
// set font
$pdf->SetFont('times', '', 10);
// set some text to print
$html .='	<style>
	
				hr.hrr {
					width:1px;
					height:780px; 
					margin-left:10px;
				}
			</style>
			<div>
				<table width="100%" border="0">
					<tr>
						<td align="left" width="150px"><img src="img/201704271090.001.jpg"/ width="120"> </td>
						<td align="left" width="10px;">
						<p align="center"> &nbsp; </p> <p align="center"> &nbsp; </p>  <p align="center"> &nbsp; </p>  <hr class="hrr">
						</td>
						<td align="left" width="450px;">
						<p align="center"><b>AKTA JAMINAN FIDUSIA</b></p>
						<p align="center"><b>Nomor : '.$list[no_akta].'</b></p> 
						<p align="justify" style="line-height: 8px;">- Pada hari ini, '.hariIndo($list['tgl_akta']).' tanggal '.terbilang($nilai, $style=2).' '.BulanIndo($list['tgl_akta']).' '.terbilang($nilaiThn, $style=2).' ('.$tgl_skr.').-----------------------<br>
						- Pukul '.$jm.' WIB ('.terbilang($jam, $style=2).' '.terbilang($menit, $style=2).' Menit) Waktu Indonesia Bagian Barat.----------------------------------------<br>
						- Menghadap dihadapan saya, <b>FENNY OCTAVIA, Sarjana Hukum, Magister Kenotariatan,</b> Notaris di Kabupaten Karawang dengan dihadiri oleh saksi-saksi yang saya, Notaris kenal dan nama-namanya akan disebutkan pada bagian akhir akta ini.-------------------------------<br>
						I.	<b>Tuan ANTON TEDDY,</b> lahir di Palembang, pada tanggal lima Desember seribu Sembilan ratus delapan puluh dua (05-12-1982), Warga Negara Indonesia, Karyawan Swasta, Kepala Cabang Central Park dari Perseroan yang akan disebutkan kemudian, berkedudukan di Daerah Khusus Ibukota Jakarta, bertempat tinggal di Jalan STR Agung UTR STS Blok K Nomor 4, Rukun Tetangga 003, Rukun Warga 018, Kelurahan Sunter Agung, Kecamatan Tanjung Priok, Kotamadya Jakarta Utara, pemegang Kartu Tanda Penduduk Nomor: 3275040512820017, yang untuk sementara waktu berada di Karawang.------------<br>
						- Menurut keterangannya dalam hal ini bertindak dalam jabatannya tersebut diatas, berdasarkan Surat Kuasa tertanggal dua puluh empat Maret dua ribu lima belas (24-03-2015) Nomor SK/050/III/2015, dibuat dibawah tangan, aslinya diperlihatkan kepada saya, Notaris dan oleh karenanya sah mewakili Direksi untuk dan atas nama <b>Perseroan Terbatas PT. MITSUI LEASING CAPITAL INDONESIA,</b> berkedudukan di Jakarta Pusat, yang seluruh perubahan Anggaran Dasarnya telah mendapat pengesahan dari Menteri Hukum Dan Hak Asasi Manusia Republik Indonesia dengan Surat Keputusannya tertanggal 05-08-2008 (lima Agustus dua ribu delapan) Nomor AHU-47913.AH.01.02.Tahun 2008, serta telah diumumkan dalam berita Negara Republik Indonesia tertanggal 24-10-2008 (dua puluh empat Oktober dua ribu delapan) Nomor: 86, Tambahan Nomor 21255, yang perubahan anggaran dasar terakhirnya telah disesuaikan dengan Peraturan Otoritas Jasa Keuangan</p>
						</td>
					
					</tr>
				</table>
			</div>
		';

// print a block of text using Write()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true);

// ---------------------------------------------------------

// --------------------------------------------------------- 222222222

// add a page
$pdf->AddPage();
// set font
$pdf->SetFont('times', '', 10);
// set some text to print
$html2 .='	
			<style>
	
				hr.hrr {
					width:1px;
					height:780px; 
				}
			</style>
			<div>
				<table width="100%" border="0">
					<tr>
						<td align="left" width="150px"><img src="img/201704271090.001.jpg"/ width="120"></td>
						<td align="left" width="10px;">
						<p align="center"> &nbsp; </p> <hr class="hrr">
						</td>
						<td align="left" width="450px;">
						<p align="justify" style="line-height: 8px;">sebagaimana dimuat dalam akta tertanggal 28-09-2015 (dua puluh delapan September dua ribu lima belas) Nomor 67, akta perubahan mana yang telah mendapat persetujuan dari Menteri Hukum Dan Hak Asasi Manusia Republik Indonesia dengan Surat Keputusannya tertanggal 06-10-2015 (enam Oktober dua ribu lima belas) Nomor AHU-0943439.AH.01.02.Tahun 2015 dan Laporannya telah diterima dan dicatat oleh Kementerian Hukum Dan Hak Asasi Manusia Republik Indonesia Direktorat Jenderal Administrasi Hukum Umum melalui surat Penerimaan Pemberitahuan Perubahan Anggaran Dasar <b>PT. MITSUI LEASING CAPITAL INDONESIA,</b> tertanggal 06-10-2015 (enam Oktober dua ribu lima belas) Nomor AHU-AH.01.03-0970006 serta tercatat dalam administrasi Direktorat Kelembagaan dan Produk Industri Keuangan Non Bank sebagaimana ternyata dalam surat Laporan Perubahan Anggaran dasar Terkait Perubahan Maksud dan Tujuan serta Kegiatan Usaha <b>PT. MITSUI LEASING CAPITAL INDONESIA,</b> tertanggal 20-11-2015 (dua puluh Nopember dua ribu lima belas) Nomor S-6197/NB.111/2015. Sedangkan perubahan susunan Pengurusnya yang terakhir dimuat dalam akta tertanggal 29-10-2015 (dua puluh sembilan Oktober dua ribu lima belas)  Nomor 56, dan Laporannya telah diterima dan dicatat oleh Kementrian Hukum Dan Hak Asasi Manusia Republik Indonesia Direktorat Jenderal Administrasi Hukum Umum melalui surat Penerimaan Pemberitahuan Perubahan Data Perseroan <b>PT. MITSUI LEASING CAPITAL INDONESIA,</b> tertanggal 04-11-2015 (empat Nopember dua ribu lima belas) Nomor AHU-AH.01.03-0977542. Seluruh akta tersebut dibuat dihadapan <b>LINDA HERAWATI, Sarjana Hukum,</b> Notaris di Jakarta Pusat. Yang dalam hal ini diwakilinya: ------<br>
						<b>-	Berdasarkan surat kuasa pembebanan jaminan fidusia tertanggal dua puluh satu Maret dua ribu tujuh belas (21-03-2017)</b> dibuat dibawah tangan, bermeterai cukup dan aslinya dilekatkan pada minuta akta ini, selaku kuasa dari dan oleh karena itu untuk dan atas nama: <br>
						<b>- '.$kuasa1[title].' '.$kuasa1[nama].', lahir di '.$kuasa1[tempat_lahir].' pada tanggal '.terbilang($tglk, $style=2).' '.BulanIndo($kuasa1['tgl_lahir']).' '.terbilang($tahunk, $style=2).' ('.$tglskrg_kuasa.'), Warga Negara Indonesia, </b></p>
						</td>
					
					</tr>
				</table>
			</div>
		';

// print a block of text using Write()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html2, $border=0, $ln=1, $fill=0, $reseth=true);

// ---------------------------------------------------------

// --------------------------------------------------------- 333333

// add a page
$pdf->AddPage();
// set font
$pdf->SetFont('times', '', 10);
// set some text to print
$html3 .='	<style>
	
				hr.hrr {
					width:1px;
					height:780px; 
				}
			</style>
			<div>
				<table width="100%" border="0">
					<tr>
						<td align="left" width="150px"><img src="img/201704271090.001.jpg"/ width="120"></td>
						<td align="left" width="10px;">
						<p align="center"> </p> <hr class="hrr">
						</td>
						<td align="left" width="450px;">
						<p align="justify" style="line-height: 8px;"><b>'.$kuasa1[pekerjaan].', berkedudukan di '.$kuasa1[berkependudukan].', bertempat tinggal di '.$kuasa1[bertempat_tinggal].', Rukun Tetangga '.$kuasa1[rt].', Rukun Warga '.$kuasa1[rw].', Kelurahan/Desa '.$kuasa1[kelurahan].', Kecamatan '.$kuasa1[kecamatan].', Kabupaten/Kotamadya '.$kuasa1[kota].', Pemegang Kartu Tanda Penduduk dengan Nomor Induk Kependudukan: '.$kuasa1[no_ktp].';</br>------------------------------------<br>						
						Selaku Pihak Pertama, untuk selanjutnya disebut: ----<br>
						Menurut  keterangannya  dalam  melakukan  tindakan  hukum 
						dalam  akta  ini  telah  mendapat  persetujuan  dari 
						'.$dpnpasangan.' yang bernama <b>- '.$pasangan1[title].' '.$pasangan1[nama].', lahir di '.$pasangan1[tempat_lahir].' pada tanggal '.terbilang($tglp, $style=2).' '.BulanIndo($pasangan1['tgl_lahir']).' '.terbilang($tahunp, $style=2).' ('.$tglskrg_pasangan.'), Warga Negara Indonesia,  '.$pasangan1[pekerjaan].', berkedudukan di '.$pasangan1[berkependudukan].', bertempat tinggal di '.$pasangan1[bertempat_tinggal].', Rukun Tetangga '.$pasangan1[rt].', Rukun Warga '.$pasangan1[rw].', Kelurahan/Desa '.$pasangan1[kelurahan].', Kecamatan '.$pasangan1[kecamatan].', Kabupaten/Kotamadya '.$pasangan1[kota].', Pemegang Kartu Tanda Penduduk dengan Nomor Induk Kependudukan: '.$pasangan1[no_ktp].';</b>----------<br>
						Demikian berdasarkan Surat Persetujuan tertanggal <b>'.terbilang($tgla, $style=2).' '.BulanIndo($tgl_perjanjian_pembiyaan).' '.terbilang($tahuna, $style=2).' ('.$btgl_perjanjian_pembiyaan.') </b>yang dibuat dibawah tangan bermeterai cukup;---------
						Selaku Pihak Pertama, untuk selanjutnya disebut:<br> 
						---------------------------------------- <b>PEMBERI FIDUSIA</b>--------------------------------------<br>
						II.	Untuk dan atas nama badan hukumnya sendiri, Perseroan Terbatas <b>PT. MITSUI LEASING CAPITAL INDONESIA</b> berkedudukan di Jakarta Pusat, berikut segenap pengganti haknya selaku Pihak Kedua disebut sebagai:-<br>
						---------------------------------------- <b>PENERIMA FIDUSIA</b> ------------------------------------<br>
						- Penghadap telah saya, Notaris kenal.---------------<br>
						- Penghadap bertindak sebagaimana tersebut diatas menerangkan terlebih dahulu sebagai berikut : -------<br>
						A.	Bahwa sepanjang tidak didefinisikan dan diartikan lain, maka definisi dan istilah dalam perjanjian ini memiliki arti yang sama dengan definisi dan istilah yang digunakan dalam <b>Perjanjian Pembiayaan Multiguna untuk Pembelian dengan Pembayaran Secara Angsuran (Installment Financing)</b> berikut dengan segala perubahan dan pembaharuannya disebut “Perjanjian Pembiayaan”; ----------------------------------------						
						</p>
						</td>
					
					</tr>
				</table>
			</div>
		';

// print a block of text using Write()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html3, $border=0, $ln=1, $fill=0, $reseth=true);

// ---------------------------------------------------------

// --------------------------------------------------------- 44444

// add a page
$pdf->AddPage();
// set font
$pdf->SetFont('times', '', 10);
// set some text to print
$html4 .='	<style>
	
				hr.hrr {
					width:1px;
					height:660px; 
				}
			</style>
			<div>
				<table width="100%" border="0">
					<tr>
						<td align="left" width="150px"><img src="img/201704271090.001.jpg"/ width="120"></td>
						<td align="left" width="10px;">
						<p align="center"> </p> <hr class="hrr">
						</td>
						<td align="left" width="450px;">
						<p align="justify" style="line-height: 8px;">
						B.	Bahwa antara Pemberi Fidusia selaku pihak yang menerima fasilitas pembiayaan dan Penerima Fidusia selaku pihak yang memberi fasilitas pembiayaan telah dibuat dan ditandatangani Perjanjian Pembiayaan pada tanggal <b>'.terbilang($tgla, $style=2).' '.BulanIndo($tgl_perjanjian_pembiyaan).' '.terbilang($tahuna, $style=2).' ('.$btgl_perjanjian_pembiyaan.') dengan Nomor Perjanjian: '.$akta1['nomor_perjanjian'].'.</b>  ----<br>
						C.	Bahwa untuk memenuhi ketentuan mengenai Pemberian Jaminan yang ditentukan dalam perjanjian Pembiayaan, Pemberi Fidusia dan Penerima Fidusia sepakat dan setuju mengadakan Perjanjian sebagaimana yang dimaksud dalam Undang-Undang Nomor: 42 tahun 1999 tentang Jaminan Fidusia, sebagaimana hendak dinyatakan dalam akta ini; ---<br>
						D.	Bahwa untuk menjamin terbayarnya dengan baik segala sesuatu yang terhutang dan harus dibayar oleh Pemberi Fidusia kepada Penerima Fidusia, baik karena jumlah total hutang sebesar <b>Rp.'.format_rupiah($objek1['hutang_pokok']).',- ('.terbilang($objek1['hutang_pokok'], $style=2).' Rupiah)</b> ditambah dengan bunga, denda dan biaya-biaya lainnya yang timbul berdasarkan Perjanjian Pembiayaan, atau sejumlah uang yang ditentukan dikemudian hari berdasarkan Perjanjian Pembiayaan, maka Pemberi Fidusia menerangkan dengan ini memberikan Jaminan Fidusia kepada Penerima Fidusia sampai dengan nilai penjaminan sebesar <b>Rp.'.format_rupiah($objek1['nilai_pinjaman']).',- ('.terbilang($objek1['nilai_pinjaman'], $style=2).' Rupiah).</b> Atas Obyek Jaminan Fidusia berupa 1 (satu) unit kendaraan bermotor roda empat, dengan identifikasi kendaraan sebagai berikut:--------------<br>
						<b>Merk/Type/Model	: '.$objek1['merk_type'].' ;-----------------------------------------------<br>
						Tahun Pembuatan	: '.$objek1['tahun'].';------------------------------<br>
						Warna				: '.$objek1['warna'].';--------------------<br>
						Nomor Rangka		: '.$objek1['nomor_rangka'].';-----------------<br>
						Nomor Mesin		: '.$objek1['nomor_mesin'].';--------------------<br></b>
						</p>
						</td>
					
					</tr>
				</table>
			</div>
		';

// print a block of text using Write()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html4, $border=0, $ln=1, $fill=0, $reseth=true);

// ---------------------------------------------------------

// --------------------------------------------------------- 555555

// add a page
$pdf->AddPage();
// set font
$pdf->SetFont('times', '', 10);
// set some text to print
$html5 .='	<style>
	
				hr.hrr {
					width:1px;
					height:780px; 
				}
			</style>
			<div>
				<table width="100%" border="0">
					<tr>
						<td align="left" width="150px"><img src="img/201704271090.001.jpg"/ width="120"></td>
						<td align="left" width="10px;">
						<p align="center"> </p> <hr class="hrr">
						</td>
						<td align="left" width="450px;">
						<p align="justify" style="line-height: 8px;">
						- Yang diperoleh Pemberi Fidusia dengan fasilitas pembiayaan dari Penerima Fidusia sebagaimana tercantum dari Perjanjian Pembiayaan juncto Surat  Pernyataan Bersama tertanggal <b>'.terbilang($tglo, $style=2).' '.BulanIndo($tgl_surat_perjanjian_bersama).' '.terbilang($tahuno, $style=2).' ('.$btgl_surat_perjanjian_bersama.'), dengan nilai obyek  Rp.'.format_rupiah($objek1['nilai_objek']).',- ('.terbilang($objek1['nilai_objek'], $style=2).' Rupiah).</b> Untuk selanjutnya dalam akta ini disebut “Obyek Jaminan Fidusia”.—--------------------<br>
						-	Selanjutnya penghadap bertindak dalam kedudukannya menerangkan bahwa pembebanan jaminan fidusia ini diterima dan dilangsungkan dengan persyaratan dan ketentuan sebagai berikut: --------------------------<br>
						---------------------------------------------------- <b>Pasal 1</b> -------------------------------------------<br>
						Dengan ditandatanganinya akta ini, Obyek Jaminan Fidusia beralih hak kepemilikannya atas dasar kepercayaan kepada Penerima Fidusia namun Obyek Jaminan Fidusia tersebut tetap berada pada dan dalam kekuasaan Pemberi Fidusia selaku Peminjam Pakai, untuk itu surat-surat bukti hak milik atas obyek
						Jaminan Fidusia serta surat-surat lain yang bersangkutan diserahkan kepada Penerima Fidusia.-----<br>
						---------------------------------------------------- <b>Pasal 2</b> -------------------------------------------<br>						
						- Obyek Jaminan Fidusia hanya dapat dipergunakan oleh Pemberi Fidusia menurut sifat dan peruntukannya, dengan kewajiban bagi Pemberi Fidusia untuk membayar total hutang ditambah dengan bunga yang diperjanjikan kepada Penerima Fidusia berdasarkan Perjanjian Pembiayaan.------------------------------------------<br>
						- Pemberi Fidusia berkewajiban untuk memelihara Obyek Jaminan Fidusia tersebut dengan sebaik-baiknya sebagaimana biasa dalam memelihara barang-barang yang dipercayakan kepadanya termasuk melakukan semua tindakan yang diperlukan untuk pemeliharaan dan perbaikan atas Obyek Jaminan Fidusia atas biaya dan tanggungan Pemberi Fidusia. Apabila bagian dari Obyek Jaminan Fidusia atau diantara Obyek Jaminan Fidusia ada yang tidak dapat dipergunakan lagi, maka Pemberi Fidusia dengan ini berjanji dan karenanya mengikat diri untuk mengganti bagian dari atau Obyek Jaminan Fidusia yang tidak dapat dipergunakan tersebut dengan Obyek Jaminan Fidusia lainnya yang sejenis yang
						</p>
						</td>
					
					</tr>
				</table>
			</div>
		';

// print a block of text using Write()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html5, $border=0, $ln=1, $fill=0, $reseth=true);

// ---------------------------------------------------------

// --------------------------------------------------------- 666666

// add a page
$pdf->AddPage();
// set font
$pdf->SetFont('times', '', 10);
// set some text to print
$html6 .='	<style>
	
				hr.hrr {
					width:1px;
					height:780px; 
				}
			</style>
			<div>
				<table width="100%" border="0">
					<tr>
						<td align="left" width="150px"><img src="img/201704271090.001.jpg"/ width="120"></td>
						<td align="left" width="10px;">
						<p align="center"> </p> <hr class="hrr">
						</td>
						<td align="left" width="450px;">
						<p align="justify" style="line-height: 8px;">
						nilainya setara dengan yang digantikan serta yang dapat disetujui Penerima Fidusia dan pengganti Obyek Jaminan Fidusia tersebut termasuk dalam Jaminan Fidusia yang dinyatakan dalam akta ini.--------------<br>
						- Segala pajak, bea, pungutan, dan beban lainnya yang sekarang telah dan atau di kemudian hari akan dikenakan terhadap Obyek Jaminan Fidusia (bila ada) merupakan beban dan tanggungan Pemberi Fidusia, dan karenanya wajib dipikul dan dibayar seluruhnya oleh Pemberi Fidusia sendiri.-----------------------------<br>
						- Resiko tentang kerugian atau kerusakan seluruh atau sebagian Obyek Jaminan Fidusia atau adanya tuntutan dari polisi, aparat hukum atau pihak lainnya mengenai Obyek Jaminan Fidusia tetap merupakan tanggung jawab Pemberi Fidusia sepenuhnya, dimanapun Obyek Jaminan Fidusia berada. Penerima Fidusia dibebaskan dari segala tuntutan atau tagihan dari pihak manapun juga.----------------------------------<br>
						---------------------------------------------------- <b>Pasal 3</b> -------------------------------------------<br>
						- Penerima Fidusia atau wakilnya yang sah setiap waktu berhak untuk memeriksa tentang adanya dan keadaan Obyek Jaminan Fidusia tersebut, dan sehubungan dengan hal tersebut Penerima Fidusia atau wakilnya yang sah dengan ini telah diberi kuasa dengan hak substitusi oleh Pemberi Fidusia untuk memasuki gedung, gudang, bangunan, ruang dimana Obyek Janminan Fidusia disimpan atau berada.---------------<br>
						- Pemberi Fidusia dengan ini menyatakan bahwa tindakan tersebut tidak merupakan tindakan memasuki tempat dan atau bangunan tanpa izin (“huuisvredebreuk”).---------------------------------<br>
						---------------------------------------------------- <b>Pasal 4</b> -------------------------------------------<br>
						- Pemberi Fidusia menyatakan dan menjamin kepada Penerima Fidusia sebagai berikut:--------------------<br>
						a. Obyek Jaminan Fidusia adalah milik/hak Pemberi Fidusia dan tidak ada orang/Pihak lain yang turut memiliki atau mempunyai hak apapun, oleh karena itu Pemberi Fidusia mempunyai kewenangan hukum untuk mengalihkan dan memindahkan hak atas Obyek Jaminan Fidusia; --------------------------------------------
						</p>
						</td>
					
					</tr>
				</table>
			</div>
		';

// print a block of text using Write()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html6, $border=0, $ln=1, $fill=0, $reseth=true);

// ---------------------------------------------------------

// --------------------------------------------------------- 777777

// add a page
$pdf->AddPage();
// set font
$pdf->SetFont('times', '', 10);
// set some text to print
$html61 .='	<style>
	
				hr.hrr {
					width:1px;
					height:790px; 
				}
			</style>
			<div>
				<table width="100%" border="0">
					<tr>
						<td align="left" width="150px"><img src="img/201704271090.001.jpg"/ width="120"></td>
						<td align="left" width="10px;">
						<p align="center"> </p> <hr class="hrr">
						</td>
						<td align="left" width="450px;">
						<p align="justify" style="line-height: 8px;">
						b. Obyek Jaminan Fidusia belum pernah dijual atau dialihkan haknya dengan cara bagaimanapun dan kepada siapapun juga;---------------------------------------<br> 
						c. Obyek Jaminan Fidusia tidak dan tidak pernah diagunkan dengan cara bagaimanapun dan kepada siapapun, kecuali kepada Penerima Fidusia; ----------<br>
						d. Obyek Jaminan Fidusia tidak sedang tersangkut perkara/ sengketa dan tidak sedang dalam sitaan.-----<br>
						- Pemberi Fidusia dengan ini membebaskan dan melepaskan Penerima Fidusia dari semua dan setiap tuntutan, gugatan atau tagihan yang diajukan oleh siapapun mengenai atau yang berhubungan dengan hal yang dinyatakan dan dijamin oleh Pemberi Fidusia tersebut diatas. ------------------------------------<br>
						- Semua tuntutan/gugatan yang ada atau mungkin ada sepenuhnya merupakan beban dan tanggung jawab Pemberi Fidusia dan atas permintaan pertama dari Penerima Fidusia, Pemberi Fidusia wajib mengurus, menyelesaikan (jika perlu) membayar tuntutan atau gugatan tersebut.------------------------------------<br>
						---------------------------------------------------- <b>Pasal 5</b> -------------------------------------------<br>
						- Pemberi Fidusia tidak berhak untuk melakukan fidusia ulang atas Obyek Jaminan Fidusia.------------<br>
						- Pemberi Fidusia juga tidak diperkenankan untuk menggadaikan atau mengalihkan atau menyewakan, dengan cara apapun Obyek Jaminan Fidusia kepada pihak lain tanpa persetujuan tertulis terlebih dahulu dari Penerima Fidusia. ----------------------------------- <br>
						-Perjanjian Pembiayaan menurut Akta Jaminan Fidusia ini dan hak-hak Penerima Fidusia yang timbul karenanya, tidak akan terpengaruh oleh kepailitan Pemberi Fidusia, pengalihan dengan cessie, novasi, atau subrogasi atau karena alasan hukum apapun juga atas Obyek Jaminan Fidusia atau hak-hak yang timbul dari Obyek Jaminan Fidusia.--------------------------<br> 
						---------------------------------------------------- <b>Pasal 6</b> -------------------------------------------<br>
						- Pemberi Fidusia berjanji dan karenanya mengikat diri untuk mengasuransikan Obyek Jaminan Fidusia tersebut pada perusahaan asuransi yang ditunjuk atau disetujui oleh Penerima Fidusia terhadap bahaya, resiko atau kecelakaan yang patut diduga dapat 
						</p>
						</td>
					
					</tr>
				</table>
			</div>
		';

// print a block of text using Write()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html61, $border=0, $ln=1, $fill=0, $reseth=true);

// ---------------------------------------------------------


// --------------------------------------------------------- 88888

// add a page
$pdf->AddPage();
// set font
$pdf->SetFont('times', '', 10);
// set some text to print
$html8 .='	<style>
	
				hr.hrr {
					width:1px;
					height:780px; 
				}
			</style>
			<div>
				<table width="100%" border="0">
					<tr>
						<td align="left" width="150px"><img src="img/201704271090.001.jpg"/ width="120"></td>
						<td align="left" width="10px;">
						<p align="center"> </p> <hr class="hrr">
						</td>
						<td align="left" width="450px;">
						<p align="justify" style="line-height: 8px;">terjadi atas Obyek Jaminan Fidusia dengan premi yang harus dibayar oleh Pemberi Fidusia sendiri.----------<br>
						- Semua uang premi asuransi menjadi beban dan wajib dibayar oleh Pemberi Fidusia.------------------------<br>
						- Apabila Pemberi Fidusia lalai atau tidak mengasuransikan Obyek Jaminan Fidusia, maka segala resiko terhadap kerusakan, kehilangan, kecelakaan, kerugian dan lain-lainnya sepenuhnya merupakan tanggung jawab dan menjadi resiko dan beban Pemberi Fidusia sendiri. Dalam hal demikian, Penerima Fidusia berhakdan dengan ini kepadanya oleh Pemberi Fidusia diberi kuasa untuk mengasuransikan Obyek Jaminan Fidusia, dengan ketentuan bahwa premi asuransinya tetap wajib dibayar oleh Pemberi Fidusia. -----------<br>
						---------------------------------------------------- <b>Pasal 7</b> -------------------------------------------<br>
						- Dalam hal Pemberi Fidusia lalai berdasarkan akta ini dan atau berdasarkan Perjanjian Pembiayaan, maka tanpa diperlukan lagi surat teguran juru sita atau surat lain yang serupa dengan itu Penerima Fidusia atas kekuasaannya sendiri berhak untuk menjual Obyek Jaminan Fidusia tersebut atas dasar titel eksekutorial atau melalui pelelangan dimuka umum atau melalui penjualan dibawah tangan yang dilakukan berdasarkan kesepakatan Pemberi Fidusia dengan Penerima Fidusia. -----------------------------------<br>
						- Untuk keperluan penjualan tersebut Penerima Fidusia berhak menghadap dimana perlu, membuat atau suruh membuat serta menandatangani semua surat, akta serta dokumen lain yang diperlukan, menerima uang hasil penjualan dan memberikan tanda penerimaan untuk itu, menyerahkan apa yang dijual itu kepada pembelinya, memperhitungkan uang hasil bersih penjualan yang diterimanya itu dengan semua yang wajib dibayar oleh Pemberi Fidusia kepada Penerima Fidusia berdasarkan Perjanjian Pembiayaan, akan tetapi dengan kewajiban bagi Penerima Fidusia untuk menyerahkan sisa uang hasil bersih penjualannya jika masih ada kepada Pemberi Fidusia, dengan tidak ada kewajiban bagi Penerima Fidusia untuk membayar bunga atau ganti kerugian berupa apapun juga kepada Pemberi Fidusia mengenai sisa uang hasil bersih penjualan itu dan selanjutnya Penerima Fidusia juga berhak untuk
						</p>
						</td>
					
					</tr>
				</table>
			</div>
		';

// print a block of text using Write()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html8, $border=0, $ln=1, $fill=0, $reseth=true);

// ---------------------------------------------------------

// --------------------------------------------------------- 99999

// add a page
$pdf->AddPage();
// set font
$pdf->SetFont('times', '', 10);
// set some text to print
$html9 .='	<style>
	
				hr.hrr {
					width:1px;
					height:780px; 
				}
			</style>
			<div>
				<table width="100%" border="0">
					<tr>
						<td align="left" width="150px"><img src="img/201704271090.001.jpg"/ width="120"></td>
						<td align="left" width="10px;">
						<p align="center"> </p> <hr class="hrr">
						</td>
						<td align="left" width="450px;">
						<p align="justify" style="line-height: 8px;">
						melakukan segala sesuatu yang dipandang perlu dan berguna dalam rangka penjualan Obyek Jaminan Fidusia tersebut dengan tidak ada yang dikecualikan.---------<br>
						- Apabila hasil penjualan dari Obyek Jaminan Fidusia tersebut tidak mencukupi untuk melunasi semua apa yang wajib dibayar oleh Pemberi Fidusia kepada Penerima Fidusia, maka Pemberi Fidusia tetap terikat membayar lunas sisa uang yang masih harus dibayar oleh Pemberi Fidusia kepada Penerima Fidusia.--------<br>
						---------------------------------------------------- <b>Pasal 8</b> -------------------------------------------<br>
						- Dalam hal Penerima Fidusia mempergunakan hak-hak yang diberikan kepadanya seperti diuraikan di atas. Pemberi Fidusia wajib dan mengikat diri sekarang ini untuk nanti pada waktunya, menyerahkan Obyek Jaminan Fidusia dalam keadaan terpelihara dengan baik kepada Penerima Fidusia atas permintaan atau teguran pertama dari Penerima Fidusia dalam waktu sebagaimana ditentukan dalam surat permintaan atau teguran tersebut. Dalam hal Pemberi Fidusia tidak memenuhi ketentuan tersebut maka Pemberi Fidusia dianggap telah lalai sehingga tidak diperlukan lagi suratteguran juru sita atau surat lain yang serupa dengan itu. ------------------------------------------------<br>
						- Dengan tidak mengurangi kewajiban Pemberi Fidusia untuk membayar denda, maka dalam hal Pemberi Fidusia terlambat menyerahkan atau tidak menyerahkan Obyek Jaminan Fidusia pada waktu eksekusi dilaksanakan, Penerima Fidusia atau kuasanya yang sah berhak secara langsung mengambil atau menarik kembali (penguasaan) Obyek Jaminan Fidusia dari Pemberi Fidusia atau pihak lain manapun yang menguasai Obyek Jaminan Fidusia dan apabila perlu dapat meminta bantuan pihak yang berwenang, dengan ketentuan bahwa semua biaya yang berkaitan dengan itu menjadi beban dan wajib dibayar oleh Pemberi Fidusia.--------------------------------<br>
						---------------------------------------------------- <b>Pasal 9</b> -------------------------------------------<br>						
						Pembebanan terhadap Obyek Jaminan Fidusia ini dilakukan oleh Pemberi Fidusia kepada Penerima Fidusia dengan syarat-syarat yang memutuskan (onder dee ontbindende voorwaarden), yakni sampai dengan Pemberi Fidusia telah memenuhi/membayar lunas semua yang wajib dibayar oleh Pemberi Fidusia kepada  
						</p>
						</td>
					</tr>
				</table>
			</div>
		';

// print a block of text using Write()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html9, $border=0, $ln=1, $fill=0, $reseth=true);

// ---------------------------------------------------------

// --------------------------------------------------------- 101010

// add a page
$pdf->AddPage();
// set font
$pdf->SetFont('times', '', 10);
// set some text to print
$html10 .='	<style>
	
				hr.hrr {
					width:1px;
					height:780px; 
				}
			</style>
			<div>
				<table width="100%" border="0">
					<tr>
						<td align="left" width="150px"><img src="img/201704271090.001.jpg"/ width="120"></td>
						<td align="left" width="10px;">
						<p align="center"> </p> <hr class="hrr">
						</td>
						<td align="left" width="450px;">
						<p align="justify" style="line-height: 8px;">
						Penerima Fidusia sebagaimana ditentukan dalam perjanjian Pembiayaan.-------------------------------<br>
						---------------------------------------------------- <b>Pasal 10</b> -------------------------------------------<br>
						- Sepanjang diperlukan, Pemberi Fidusia dengan ini memberikan kuasa dengan hak substitusi kepada Penerima Fidusia yang menyatakan menerima kuasa dari Pemberi Fidusia untuk melaksanakan pendaftaran jaminan fidusia tersebut, untuk keperluan tersebut berhak menghadap dihadapan Pejabat atau instansi yang berwenang (termasuk Kantor Pendaftaran Fidusia), memberikan keterangan, menandatangani surat/formulir, mendaftarkan Jaminan Fidusia atas Obyek Jaminan Fidusia tersebut dengan melampirkan Pernyataan Pendaftaran Jaminan Fidusia, serta untuk mengajukan permohonan pendaftaran atas perubahan dalam hal terjadi perubahan atas data yang tercantum dalam Sertifikat Jaminan Fidusia.--------------------------<br>
						- Selanjutnya menerima Sertifikat Jaminan Fidusia dan atau Pernyataan Perubahan, serta dokumen-dokumen lain yang berkaitan untuk keperluan itu, membayar semua biaya dan menerima kuitansi segala pembayaran serta selanjutnya melakukan segala tindakan yang perlu dan berguna untuk melaksanakan ketentuan dari akta ini.--<br>
						- Akta ini merupakan bagian yang tidak dapat dipisahkan dari Perjanjian Pembiayaan, demikian pula kuasa yang diberikan dalam akta ini merupakan bagian yang tidak terpisahkan dari akta ini yang tanpa adanya akta ini dan kuasa tersebut, niscaya Perjanjian Pembiayaan dan akta ini tidak akan diterima dan dilangsungkan diantara para pihak yang bersangkutan, oleh karenanya akta ini tidak dapat ditarik kembali atau dibatalkan selama kewajiban Pemberi Fidusia berdasarkan Perjanjian Pembiayaan belum terpenuhi dan kuasa tersebut tidak akan batal atau berakhir karena sebab yang dapat mengakhiri pemberian suatu kuasa, termasuk sebab yang disebutkan dalam pasal 1813, 1814 dan 1816 Kitab Undang-Undang Hukum Perdata. --------------------------------------<br>
						---------------------------------------------------- <b>Pasal 11</b> -------------------------------------------<br>
						- Penerima Fidusia berhak dan dengan ini diberi kuasa dengan hak substitusi oleh Pemberi Fidusia untuk melakukan perubahan atau penyesuaian atas ketentuan 
						</p>
						</td>
					
					</tr>
				</table>
			</div>
		';

// print a block of text using Write()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html10, $border=0, $ln=1, $fill=0, $reseth=true);

// ---------------------------------------------------------

// --------------------------------------------------------- 11 11 11

// add a page
$pdf->AddPage();
// set font
$pdf->SetFont('times', '', 10);
// set some text to print
$html11 .='	<style>
	
				hr.hrr {
					width:1px;
					height:780px; 
				}
			</style>
			<div>
				<table width="100%" border="0">
					<tr>
						<td align="left" width="150px"><img src="img/201704271090.001.jpg"/ width="120"></td>
						<td align="left" width="10px;">
						<p align="center"> </p> <hr class="hrr">
						</td>
						<td align="left" width="450px;">
						<p align="justify" style="line-height: 8px;">
						dalam akta ini, dalam hal perubahan atau penyesuaian tersebut diperlukan dalam rangka memenuhi ketentuan dalam Peraturan Pemerintah tentang Pendaftaran Fidusia maupun ketentuan dalam Undang-Undang Nomor 42 Tahun 1999 (seribu sembilan ratus sembilan puluh sembilan) tentang Jaminan Fidusia.------------------- <br>
						---------------------------------------------------- <b>Pasal 12</b> -------------------------------------------<br>
						Biaya akta ini dan biaya lainnya yang berkenaan dengan pembuatan akta ini maupun dalam melaksanakan ketentuan dalam akta ini menjadi beban dan wajib dibayar oleh Debitur atau Pemberi Fidusia, demikian pula biaya pendaftaran Jaminan Fidusia ini di Kantor Pendaftaran Fidusia. -------------------------<br>
						---------------------------------------------------- <b>Pasal 13</b> -------------------------------------------<br>
						- Segala perselisihan yang mungkin timbul diantara kedua belah pihak mengenai akta ini yang tidak dapat diselesaikan diantara kedua belah pihak sendiri, maka kedua belah pihak akan memilih domisili hukum yang tetap dan seumumnya di Kantor Panitera Pengadilan Negeri Jakarta Pusat. -------------------------------<br>
						- Pemilihan domisili hukum tersebut dilakukan dengan tidak mengurangi hak dari Penerima Fidusia untuk mengajukan tuntutan hukum terhadap Pemberi Fidusia berdasarkan jaminan fidusia atas Obyek Jaminan Fidusia tersebut dihadapan pengadilan lainnya dalam wilayah Republik Indonesia yaitu pada Pengadilan Negeri yang mempunyai yurisdiksi atas diri dari Pemberi Fidusia atau Obyek Jaminan Fidusia tersebut.-<br>
						---------------------------------------------------- <b>Pasal 14</b> -------------------------------------------<br>
						Penghadap menyatakan dengan ini menjamin kebenaran tanda identitas diri, kewenangannya untuk bertindak dalam akta ini dan keterangan-keterangan yang disampaikan kepada saya, Notaris dan bertanggung jawab sepenuhnya atas hal tersebut, serta Penghadap menyatakan telah mengerti dan memahami tentang segala sesuatu yang diterangkan dan termaktub dalam akta ini.-------------------------------------------------<br>
						-------------------------------------- <b>DEMIKIAN AKTA INI</b> --------------------------------<br>
						- Dibuat dan dilangsungkan di Karawang, pada hari, tanggal serta pada jam seperti disebutkan pada bagian awal akta ini, dengan dihadiri oleh: ----------------						
						</p>
						</td>
					
					</tr>
				</table>
			</div>
		';

// print a block of text using Write()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html11, $border=0, $ln=1, $fill=0, $reseth=true);

// ---------------------------------------------------------

// --------------------------------------------------------- 12 12 12

// add a page
$pdf->AddPage();
// set font
$pdf->SetFont('times', '', 10);
// set some text to print
$html12 .='	<style>
	
				hr.hrr {
					width:1px;
					height:480px; 
				}
				
			</style>
			<div>
				<table width="100%" border="0">
					<tr>
						<td align="left" width="150px"><img src="img/201704271090.001.jpg"/ width="120"></td>
						<td align="left" width="10px;">
						<p align="center"> </p> <hr class="hrr">
						</td>
						<td align="left" width="450px;">
						<p align="justify" style="line-height: 8px;">
						1.	Nyonya VIDYA HARYANI, lahir di Jakarta pada tanggal tiga puluh Juni seribu sembilan ratus tujuh puluh empat (30-06-1974), Warga Negara Indonesia, Karyawan Notaris, bertempat tinggal di Jakarta Utara, Jalan Summagung II D2/21, RT/RW 008/002, Kelapa Gading Timur, Kelapa Gading, pemegang Kartu Tanda Penduduk Nomor: 3172067006740002, yang untuk sementara waktu berada di Karawang; ---------------------------------<br>
						2.	Nyonya RETHI RUSTANDI, lahir di Tangerang pada tanggal sembilan April seribu sembilan ratus delapan puluh delapan (09-04-1988), Warga Negara Indonesia, Karyawan Notaris, bertempat tinggal di Kota Tangerang, Cikahuripan, RT/RW 05/05, pemegang Kartu Tanda Penduduk Nomor: 3671104904880001, yang untuk sementara waktu berada di Karawang;<br>
						- Keduanya pegawai saya, Notaris, sebagai saksi-saksi.-----<br>
						- Atas permintaan penghadap akta ini dibaca sendiri oleh penghadap dan penghadap menyatakan kepada saya, Notaris bahwa penghadap telah mengerti dan memahami tentang segala sesuatu yang termaktub dalam akta ini, maka seketika akta ini ditandatangani oleh penghadap, saksi-saksi dan saya, Notaris.--------------------------<br>
						- Dilangsungkan dengan tanpa perubahan.-----------------<br>
						- Minuta akta ini telah ditandatangani dengan sempurna.-<br>
						- Diberikan sebagai salinan yang sama bunyinya.---------
						</p>
						<p align="right"></p>
						<p align="right">Notaris di Kabupaten Karawang</p>
						<p align="right"></p>
						<p align="right"></p>
						<p align="right"></p>
						<p align="right"></p>
						<p align="right"></p>
						<p align="right">(Fenny Octavia, S.H., M.Kn)</p>
						</td>
					
					</tr>
				</table>
			</div>
		';

// print a block of text using Write()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html12, $border=0, $ln=1, $fill=0, $reseth=true);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output(''.$list[no_akta].'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>