<?php
class Pegawai{
    //member1 variabel
    public $nip;
    public $nama;
    public $jabatan;
    public $agama;
    public $status;
    
    //variabel konstanta & static di dlm class
    static $jml = 0;
    const PT = 'PT. Nurul Fikri Cipta Inovasi';
    
    //member2 konstruktor
    public function __construct($nip, $nama, $jabatan, $agama, $status){
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
        self::$jml++;
    }
    //member3 method2
    public function setGapok(){
        switch ($this->jabatan) {
            case 'Manager': $gapok = 15000000; break;
            case 'Asmen': $gapok = 10000000; break;
            case 'Kabag': $gapok = 7000000; break;
            case 'Staff': $gapok = 4000000; break;
            
            default: $gapok = 0;
        }
        
        return $gapok;
    }
    public function setTunjab(){
        $tunjab = 0.2 * $this->setGapok();
        return $tunjab;
    }
    public function setTunkel(){
        $tunkel = ($this->status == 'Menikah') ? 0.1 * $this->setGapok() : 0;
        $tunkel1 = ($this->status == 'Belum Menikah') ? $this->setGapok() : 0;
        return $tunkel;
        return $tunkel1;
    }
    public function setGator(){
        $gator = $this->setGapok() + $this->setTunjab() + $this->setTunkel();
        return $gator;
    }
    public function setZakatProfesi(){
        $zakat = ($this->agama == 'Islam' && $this->setGator() > 6000000 ) ? 0.025 * $this->setGator() : 0;
        return $zakat;
    }
    public function mencetak(){
        echo '<b><u>'.self::PT.'</u></b>'; 
        echo '<br/>NIP: '.$this->nip;
        echo '<br/>Nama Pegawai: '.$this->nama;
        echo '<br/>Jabatan: '.$this->jabatan;
        echo '<br/>agama: '.$this->agama;
        echo '<br/>Status: '.$this->status;
        echo '<br/>Gaji Pokok: '.$this->setGapok();
        echo '<br/>Tunjangan Jabatan: '.$this->setTunjab();
        echo '<br/>Tunjangan Keluarga: '.$this->setTunkel();
        echo '<br/>Gaji Kotor: '.$this->setGator();
        echo '<br/>Zakat: '.$this->setZakatProfesi();

        echo '<hr/>';
    }
}