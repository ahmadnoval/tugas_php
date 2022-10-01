<?php
require 'Pegawai.php';
//ciptakan object
$neur = new Pegawai('001','Neur','Manager','Kristen Katholik','Menikah');
$salah = new Pegawai('011','Mohammed Salah','Asmen','Islam','Menikah');
$mail = new Pegawai('004','Mohammed Ismail','Staff','Kristen Protestan','Menikah');
$muas = new Pegawai('019','Ahmad Muas','Kabag','Islam','Belum Menikah');
$ameri = new Pegawai('008','Ameri Yuliana','Manager','Budha','Menikah');
//dst ...
//cetak struktur gaji

echo '<h3 align="center">'.Pegawai::PT.'</h3>';
$neur->mencetak();
$salah->mencetak();
$mail->mencetak();
$muas->mencetak();
$ameri->mencetak();
//dst ...
echo 'Jumlah Pegawai: '.Pegawai::$jml;