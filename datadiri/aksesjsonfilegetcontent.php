<?php
    $data = file_get_contents("http://localhost/appAPI/datadiri/datadiri.json");
    $data1 = file_get_contents("http://localhost/appAPI/datadiri/datadiri1.json");
    $data2 = file_get_contents("http://localhost/appAPI/datadiri/tokohpahlawan.json");

    //echo $data;

    #parse data
    $parsedata = json_decode($data);
    $data = json_decode($data1);
    $data2 = json_decode($data2);

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
        <div class="logo">API-Akses Json File Get Content</div>
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
                    <td> <?php echo $parsedata[0]->NamaLengkap; ?></td>
                    <td> <?php echo $parsedata[0]->TempatTanggalLahir; ?></td>
                    <td><?php echo $parsedata[0]->JenisKelamin; ?></td>
                    <td><?php echo $parsedata[0]->Agama; ?></td>
                    <td><?php echo $parsedata[0]->PendidikanSaatini; ?></td>
                    <td><?php echo $parsedata[0]->IPK; ?></td>
                    <td><?php echo $parsedata[0]->OrganisasiSaatini; ?></td>
                    <td><?php echo $parsedata[0]->Hobi; ?></td>
                    <td><?php echo $parsedata[0]->NoHp; ?></td>
        
                </tr>
                <tr>
                <td> <?php echo $data[0]->NamaLengkap; ?></td>
                    <td> <?php echo $data[0]->TempatTanggalLahir; ?></td>
                    <td><?php echo $data[0]->JenisKelamin; ?></td>
                    <td><?php echo $data[0]->Agama; ?></td>
                    <td><?php echo $data[0]->PendidikanSaatini; ?></td>
                    <td><?php echo $data[0]->IPK; ?></td>
                    <td><?php echo $data[0]->OrganisasiSaatini; ?></td>
                    <td><?php echo $data[0]->Hobi; ?></td>
                    <td><?php echo $data[0]->NoHp; ?></td>
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
                    <td> <?php echo $data2[0]->NamaLengkap; ?></td>
                    <td> <?php echo $data2[0]->TempatTanggalLahir; ?></td>
                    <td><?php echo $data2[0]->JenisKelamin; ?></td>
                    <td><?php echo $data2[0]->Agama; ?></td>
                    <td><?php echo $data2[0]->PendidikanTerakhir; ?></td>
                    <td><?php echo $data2[0]->Organisasi; ?></td>
                    <td><?php echo $data2[0]->Pekerjaan; ?></td>
                    <td><?php echo $data2[0]->Wafat; ?></td>
            
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
					<span>Akses Json file get Content</span>
					Kita membuat web dengan melakukan akses json file get content</p>
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