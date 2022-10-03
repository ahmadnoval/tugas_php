<?php 
require_once 'bentuk2D.php';
/**
 * 
 */
class segitiga extends bentuk2D
{
	const BENTUK = 'Segitiga';
	public function __construct($alas, $tinggi)
	{
		$this->alas = $alas;
		$this->tinggi = $tinggi;
	}

	public function luas(){
		$luas = 0.5 * ($this->alas * $this->tinggi);
		return $luas;
	}

	public function keliling(){
		$keliling = $this->alas + $this->tinggi + $this->sisi();
		return $keliling;
	}

	public function sisi(){
		$sisi = sqrt(pow($this->tinggi, 2) + pow($this->alas, 2));
		return $sisi;
	}

	public function mencetak(){
		echo '
		<td>' . self::BENTUK . '</td>
		<td> 
			Alas : ' . $this->alas . 'cm<br>
			Tinggi : '.$this->tinggi . 'cm<br>
			Sisi : ' . $this->sisi() . 'cm<br>
		</td>
		<td>' . round($this->luas()) . ' cm<br>
		<td>' . round($this->keliling()) . 'cm<br>
		</tr>';
	}
}
?>