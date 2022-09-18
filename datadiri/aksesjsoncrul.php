<?php
    
    $ch = curl_init();
    $ch1 = curl_init();
    $ch2 = curl_init();

    // setting option (setop) u/url yang akan dibuka
    curl_setopt($ch, CURLOPT_URL, "http://localhost/appAPI/datadiri/datadiri.json");
    curl_setopt($ch1, CURLOPT_URL, "http://localhost/appAPI/datadiri/datadiri1.json");
    curl_setopt($ch2, CURLOPT_URL, "http://localhost/appAPI/datadiri/tokohpahlawan.json");

    //setting option (setopt) u/ hasil hit url bisa ada kembali (return)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, TRUE);

    //eksekusi curl
    $output = curl_exec($ch);
    $output1 = curl_exec($ch1);
    $output2 = curl_exec($ch2);
    
    //close curl
    curl_close($ch);
    curl_close($ch1);
    curl_close($ch2);

    //cek perubahan json to array
   // echo "<pre>"; print_r($output); echo "</pre>";

   //cek perubahan json to array
   $data = json_decode($output);
   $data1 = json_decode($output1);
   $data2 = json_decode($output2);


  ?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata diri</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="logo">API-Akses Json Crul</div>
        <ul>
            <li><a href="#">Home</a></li>
        </ul>
    </nav>
    <br><br><br>
    <div> <center><h1>Biodata diri</h1></center>
        <center><table cellspacing='0'>
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Pendidikan Saat ini</th>
                    <th>IPK</th>
                    <th>Organisasi Saat ini</th>
                    <th>Hobi</th>
                    <th>No. Hp</th>
        
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php
                    foreach($data as $file){ echo ' '.$file->NamaLengkap.' ';
                    } ?></td>
                    <td><?php
                    foreach($data as $file){ echo ' '.$file->TempatTanggalLahir.' ';
                    } ?></td>
                     <td><?php
                    foreach($data as $file){ echo ' '.$file->JenisKelamin.' ';
                    } ?></td>
                     <td><?php
                    foreach($data as $file){ echo ' '.$file->Agama.' ';
                    } ?></td>
                     <td><?php
                    foreach($data as $file){ echo ' '.$file->PendidikanSaatini.' ';
                    } ?></td>
                     <td><?php
                    foreach($data as $file){ echo ' '.$file->IPK.' ';
                    } ?></td>
                     <td><?php
                    foreach($data as $file){ echo ' '.$file->OrganisasiSaatini.' ';
                    } ?></td>
                     <td><?php
                    foreach($data as $file){ echo ' '.$file->Hobi.' ';
                    } ?></td>
                     <td><?php
                    foreach($data as $file){ echo ' '.$file->NoHp.' ';
                    } ?></td>
                </tr>

                 <tr>
                    <td><?php
                    foreach($data1 as $file){ echo ' '.$file->NamaLengkap.' ';
                    } ?></td>
                    <td><?php
                    foreach($data1 as $file){ echo ' '.$file->TempatTanggalLahir.' ';
                    } ?></td>
                     <td><?php
                    foreach($data1 as $file){ echo ' '.$file->JenisKelamin.' ';
                    } ?></td>
                     <td><?php
                    foreach($data1 as $file){ echo ' '.$file->Agama.' ';
                    } ?></td>
                     <td><?php
                    foreach($data1 as $file){ echo ' '.$file->PendidikanSaatini.' ';
                    } ?></td>
                     <td><?php
                    foreach($data1 as $file){ echo ' '.$file->IPK.' ';
                    } ?></td>
                     <td><?php
                    foreach($data1 as $file){ echo ' '.$file->OrganisasiSaatini.' ';
                    } ?></td>
                     <td><?php
                    foreach($data1 as $file){ echo ' '.$file->Hobi.' ';
                    } ?></td>
                     <td><?php
                    foreach($data1 as $file){ echo ' '.$file->NoHp.' ';
                    } ?></td>
                </tr>
             
            </tbody>
        </table></center></div>

        <br>
        <div> <center><h1>Biodata Tokoh Nasional</h1></center>
            <center><table cellspacing='0'>
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Organisasi</th>
                        <th>Pekerjaan</th>
                        <th>Wafat</th>
                        
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                    foreach($data2 as $file){ echo ' '.$file->NamaLengkap.' ';
                    } ?></td>
                    <td><?php
                    foreach($data2 as $file){ echo ' '.$file->TempatTanggalLahir.' ';
                    } ?></td>
                     <td><?php
                    foreach($data2 as $file){ echo ' '.$file->JenisKelamin.' ';
                    } ?></td>
                     <td><?php
                    foreach($data2 as $file){ echo ' '.$file->Agama.' ';
                    } ?></td>
                     <td><?php
                    foreach($data2 as $file){ echo ' '.$file->PendidikanTerakhir.' ';
                    } ?></td>
                     <td><?php
                    foreach($data2 as $file){ echo ' '.$file->Organisasi.' ';
                    } ?></td>
                     <td><?php
                    foreach($data2 as $file){ echo ' '.$file->Pekerjaan.' ';
                    } ?></td>
                     <td><?php
                    foreach($data2 as $file){ echo ' '.$file->Wafat.' ';
                    } ?></td>
                    
                </tr>

                </tbody>
            </table></center></div>

            <footer class="footer-distributed">

			<div class="footer-left">
				<h3>Biodata<span>Diri</span></h3>

		
				<p class="footer-company-name">© 2022 Rekayasa web Teknik Komputer dan Jaringan</p>
			</div>

			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					  <p><span>Bumi Tamalanrea Permai Blok. G no 121</span>
						Muh. Syahrir</p>
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
					<span>Akses Json Crul</span>
					Kita membuat web dengan melakukan akses json Crul</p>
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