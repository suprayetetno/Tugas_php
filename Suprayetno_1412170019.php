<!DOCTYPE html>
<html lang="en">
<head>
   <title>Document</title>
</head>
<body align="center">
   <h1>Konversi </h1>
   <form method="get">
     <label for="tgl">Masukkan tanggal : </label>
      <input type="date" name="tgl" id="tgl"></input>
      <input type="submit" name="sub"></input>
   </form><br>

</body>
</html>

<?php
 
// sebagai acuan
// hari pasaran tanggal 3 Januari 1980 adalah 'Pon'
$tgl1 = "1980-01-03";
 

 
//cek apakah tonmbol submit sudah di tekan atau belum
if(isset($_GET['sub'])){

    $tgl2=$_GET['tgl'];

    // array urutan nama hari pasaran dimulai dari 'Pon' 
$pasaran = array('pon', 'wage', 'kliwon', 'legi', 'pahing');
 
// proses mencari selisih hari antara kedua tanggal 
$pecah1 = explode("-", $tgl1);
$date1 = $pecah1[2];;
$month1 = $pecah1[1];
$year1 = $pecah1[0];
  
$pecah2 = explode("-", $tgl2);
$date2 = $pecah2[2];
$month2 = $pecah2[1];
$year2 =  $pecah2[0];
  
$jd1 = GregorianToJD($month1, $date1, $year1);
$jd2 = GregorianToJD($month2, $date2, $year2);
  
$selisih = $jd2 - $jd1;
 
// hitung modulo 5 dari selisih harinya
$mod = $selisih % 5;
 
 
// konfigurasi untuk hari indonesia
$day = date('l', strtotime($tgl1));
$mod1 = $selisih % 7;

// variabel array untuk konversi nama hari ke bahasa indonesia
$dayList = array(
   'Kamis',
   'Jumat',
   'Sabtu',
   'Minggu',
    'Senin',
    'Selasa',
    'Rabu'  
);

       // menampilkan nama hari pasaran jawa 
   echo "Tanggal ".$tgl2." Nama hari pasaran jawa : "."<br>"."<h4>"."<h3>".$pasaran[$mod]."</h3>"."<h4>";  
   
   //menampilkan nama hari bahasa indonesia
   echo "Tanggal ".$tgl2." Nama hari bahasa indonesia : "."<br>"."<h3>".$dayList[$mod1]."</h3>";

}else{
   $error =true;
}

?>
