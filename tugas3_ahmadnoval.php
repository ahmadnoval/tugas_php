<?php
//array scalar (1 dimensi)
$m1 = ['nim'=>'0110220001','nama'=>'Noval','nilai'=>100,'jml'=>5];
$m2 = ['nim'=>'0110220001','nama'=>'cika','nilai'=>90,'jml'=>4];
$m3 = ['nim'=>'0110220001','nama'=>'Azka','nilai'=>80,'jml'=>10];
$m4 = ['nim'=>'0110220001','nama'=>'Alwi','nilai'=>70,'jml'=>8];
$m5 = ['nim'=>'0110220001','nama'=>'Mail','nilai'=>60,'jml'=>12];
$m6 = ['nim'=>'0110220001','nama'=>'Gugun','nilai'=>50,'jml'=>15];
$m7 = ['nim'=>'0110220001','nama'=>'Topik','nilai'=>40,'jml'=>5];
$m8 = ['nim'=>'0110220001','nama'=>'Sulton','nilai'=>30,'jml'=>4];
$m9 = ['nim'=>'0110220001','nama'=>'Cingbuy','nilai'=>20,'jml'=>10];
$m10 = ['nim'=>'0110220001','nama'=>'Entong','nilai'=>10,'jml'=>8];

$ar_judul = ['No','NIM','nama','Nilai','Grade','Predikat','Keterangan'];



//array assosiative (> 1 dimensi)
$mahasiswa = [$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10];

// $grade = ['A','B','C','D','E'];

//aggregate function in array
$jumlah_mahasiswa = count(array_column($mahasiswa, 'nama'));
$jml_nilai = array_column($mahasiswa, 'nilai');
$max_nilai = max(array_column($mahasiswa, 'nilai'));
$min_nilai = min(array_column($mahasiswa, 'nilai'));
$total_nilai = array_sum($jml_nilai);
$rata2 = $total_nilai / $jumlah_mahasiswa;
//keterangan
$keterangan = [
    'Jumlah Mahasiswa'=>$jumlah_mahasiswa,
    'Nilai Tertinggi'=>$max_nilai,
    'Nilai Terendah'=>$min_nilai,
    'Rata2'=>$rata2
];
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Belajar Array</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>

    <body>
        <h3 class="text-center">Daftar Buah</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <?php
                    foreach($ar_judul as $jdl){
                    ?>
                    <th><?= $jdl ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach($mahasiswa as $maha){
                //rumus2
                $bruto = $maha['nilai']* $maha['jml'];  
                $diskon = ($maha['nama'] && $maha['nilai']>=60) ? 'lulus' : 'gagal';
                
                if ($maha['nilai'] >= 85 && $maha['nilai'] <= 100) $grade = 'A';
                else if ($maha['nilai'] >= 75 && $maha['nilai'] <= 100) $grade = 'B';
                else if ($maha['nilai'] >= 60 && $maha['nilai'] <= 100) $grade = 'C';
                else if ($maha['nilai'] >= 50 && $maha['nilai'] <= 100) $grade = 'D';
                else if ($maha['nilai'] >= 40) $grade = 'E'; 
                
                switch ($maha['nilai']) {
                    case ($maha['nilai'] <= 100 && $maha['nilai'] >= 85):
                        $predikat = 'Memuaskan';
                        break;
                    case ($maha['nilai'] <= 84 && $maha['nilai'] >= 75):
                        $predikat = 'Sangat baik';
                        break;
                    case ($maha['nilai'] <= 74 && $maha['nilai'] >= 60):
                        $predikat = 'Baik';
                        break;
                    case ($maha['nilai'] <= 59 && $maha['nilai'] >= 40):
                        $predikat = 'Kurang';
                        break;
                    case ($maha['nilai'] <= 39):
                        $predikat = 'kurang Baik';
                        break;
                    default:
                        $predikat = '';
                        break;
                }
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $maha['nim'] ?></td>
                    <td><?= $maha['nama'] ?></td>
                    <td><?= $maha['nilai'] ?></td>
                    <td><?= $grade ?></td>
                    <td><?= $diskon ?></td>
                    <td><?= $predikat ?></td>
                </tr>
                <?php $no++; } ?>
            </tbody>
            <tfoot>
                <?php
                foreach ($keterangan as $ket => $hasil) {
                ?>
                <tr>
                    <th colspan="7"><?= $ket ?></th>
                    <th><?= $hasil ?></th>
                </tr>
                <?php } ?>
            </tfoot>
        </table>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
    </body>

</html>