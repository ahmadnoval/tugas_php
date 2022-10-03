<?php

require_once 'persegiPanjang.php';
require_once 'lingkaran.php';
require_once 'segitiga.php';


// <!-- jari - jari -->
$obj1 = new lingkaran(20);

// panjang x lebar
$obj2 = new persegiPanjang(10, 6);

// alas x tinggi x sisi miring
$obj3 = new segitiga(4, 5);

$object_data = [$obj1, $obj2, $obj3];
$judul = ['No', 'Nama Bidang', 'Keterangan', 'Luas Bidang', 'Keliling'];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas Menghitung Bidang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center">Kumpulan Bentuk 2D</h1>

    <div class="container">
    	<table class="table my-5">
    		<thead class="table-secondary">
    			<tr>
    				<?php foreach ($judul as $a) : ?>
    				<th><?= $a ?></th>
    				<?php endforeach ?>
    			</tr>
    		</thead>
    		<tbody class="table-light align-middle">
    			<?php 
    				$no = 1;
    				foreach ($object_data as $obj) : ?>
    				<tr>
    					<th><?= $no++ ?>.</th>
    					<?= $obj->mencetak()?>
    				<?php endforeach ?>
    		</tbody>
    	</table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>

