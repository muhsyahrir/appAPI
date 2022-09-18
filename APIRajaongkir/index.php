<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: 1f20d4a9c20269645a42af13e4a79d94"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;

  $data = json_decode($response);
 // echo "<pre>"; print_r($data); echo "</pre>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Web ongkos kirim</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="api.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav>
        <div class="logo">API-Rajaongkir</div>
    </nav>
    <br>
<div class="jumbotron text-center">
<p> <h1>Ongkos kirim</h1>
  Silahkan hitung ongkos kirim anda.</p> 
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>Kota Asal</h3>
      <p>Pilih Provinsi
      <select name="provinsi_asal" onchange="cariKotaAsal(this.value)">
        <option>-- Pilih Provinsi --</option>

        <?php
          foreach ($data->rajaongkir->results as $provinsi) {
            echo '<option value="'.$provinsi->province_id.'">'.$provinsi->province.'</option>';
          }
        ?>
      </select>
      </p>

      <p>Pilih Kota Asal<br>
      <select id="kota_asal" name="kota_asal">
        <option>-- Pilih Kota --</option>
      </select>
      </p>

    </div>
    <div class="col-sm-4">
      <h3>Kota Tujuan</h3>
      <p>Pilih Provinsi
      <select name="provinsi_tujuan" onchange="cariKotatujuan(this.value)">
        <option>-- Pilih Provinsi --</option>

        <?php
          foreach ($data->rajaongkir->results as $provinsi) {
            echo '<option value="'.$provinsi->province_id.'">'.$provinsi->province.'</option>';
          }
        ?>
      </select>
      </p>

      <p>Pilih Kota Tujuan<br>
      <select id="kota_tujuan" name="kota_tujuan">
        <option>-- Pilih Kota --</option>
      </select>
      </p>

    </div>
    <div class="col-sm-4">
      <h3>Berat dan Kurir</h3>
      <p>Berat Paket:
        <br>
      <input id="berat_paket" type="text" name="berat_paket">
      </p>
      
      <p>Pilih Kurir:
        <br>
      <select id="kurir" name="kurir" >
          <option value="jne">JNE</option>
          <option value="tiki">TIKI</option>
          <option value="pos">Pos Indonesia</option>
      </select>
      </p>
    
    </div>

    <div class="col-sm-12">
      <h3>Cek Ongkir</h3>
      <p>
        <input type="submit" name="cari" value="Cek Ongkir" onclick="cekongkir();">
      </p>

      <div id="hasilcekongkir"></div>
      
    </div>
  </div>
</div>
<script>
  function cariKotaAsal(id_provinsi) {

   
    const xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function() {
      if (this.readyState ==4 && this.status == 200) {  
      document.getElementById("kota_asal").innerHTML = this.responseText;
    }
    };
    xmlhttp.open("GET", "http://localhost/appAPI/APIRajaongkir/requestkota.php?id_provinsi="+id_provinsi, true);
    xmlhttp.send();

  }
  </script>
  <script>
  function cariKotatujuan(id_provinsi) {

   
    const xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function() {
      if (this.readyState ==4 && this.status == 200) {  
      document.getElementById("kota_tujuan").innerHTML = this.responseText;
    }
    };
    xmlhttp.open("GET", "http://localhost/appAPI/APIRajaongkir/requestkota.php?id_provinsi="+id_provinsi, true);
    xmlhttp.send();

  }

  function cekongkir(){
    var id_kota_asal = document.getElementById("kota_asal").value;
    var id_kota_tujuan = document.getElementById("kota_tujuan").value;
    var berat_paket = document.getElementById("berat_paket").value;
    var kurir = document.getElementById("kurir").value;

    
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function() {
      if (this.readyState ==4 && this.status == 200) {  
      document.getElementById("hasilcekongkir").innerHTML = this.responseText;
    }
    };
    xmlhttp.open("GET", "http://localhost/appAPI/APIRajaongkir/requestongkos.php?id_kota_asal="
    +id_kota_asal+"&id_kota_tujuan="+id_kota_tujuan+"&berat_paket="+berat_paket+"&kurir="+kurir, true);
    xmlhttp.send();

  }
  </script>

<footer class="footer-distributed">

<div class="footer-left">
  <h3>API<span>Rajaongkir</span></h3>


  <p class="footer-company-name">© 2022 Rekayasa web Teknik Komputer dan Jaringan</p>
</div>

<div class="footer-center">
  <div>
    <i class="fa fa-map-marker"></i>
      <p><span>Bumi Tamalanrea Permai Blok. G no 121</span>
      Muh. Syahrir
      <span>42519040</span>
    </p>
  </div>

  <div>
    <i class="fa fa-phone"></i>
    <p>085242732640</p>
  </div>
  <div>
    <i class="fa fa-envelope"></i>
    <p><a href="#">muhsyahrir005@gmail.com</a></p>
  </div>
</div>
<div class="footer-right">
  <p class="footer-company-about">
    <span>API-Rajaongkir</span>
    Kita membuat Api raja ongkir dengan metode GET</p>
  <div class="footer-icons">
    <a href="#"><i class="fa fa-facebook"></i></a>
    <a href="#"><i class="fa fa-twitter"></i></a>
    <a href="#"><i class="fa fa-instagram"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>
    <a href="#"><i class="fa fa-youtube"></i></a>
  </div>
</div>
</footer>

<!-- Javascript Section -->
<script>
  let scroll1 = window.pageYOffset;
  window.onscroll = function(){
      let scroll2 = window.pageYOffset;
      if(scroll1 > scroll2){
          document.querySelector('nav').style.top = '0';
      }
      else{
          document.querySelector('nav').style.top = '-100px';
      }
      scroll1 = scroll2;

  }

</script>

</body>
</html>
