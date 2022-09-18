<?php
    $data = file_get_contents("http://localhost/appAPI/datamahasiswa.json");
    //echo $data;

    #parse data
    $parsedata = json_decode($data);

    #cek perubahan json ke array
    #echo "<pre>"; print_r($parsedata); echo "</pre>";

    #tampilkan data spesifik
    #echo $parsedata[0]->Nama;
?>

<html>
    <head>
        <title>Data Mahasiswa</title>
    </head>
    <body>
        <label>Nama Mahasiswa :</label>
        <?php echo $parsedata[0]->Nama; ?>

        <p>
            Hobi :
            <br>
            <?php

            foreach ($parsedata[0]->hobi as $hobi){
                echo "$hobi";
                echo "<br/>";
            }
            ?>
        </p>
    </body>
</html>