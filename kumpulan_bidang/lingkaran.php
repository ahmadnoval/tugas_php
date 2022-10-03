<?php
require_once 'bentuk2D.php';
class lingkaran extends bentuk2D{
	public $jari;
	const BENTUK = 'Lingkaran';

	public function __construct($jari){
		$this->jari = $jari;
	}

	public function luas(){
		$luas = 3.14 * ($this->jari * $this->jari);
		return $luas;
	}

	public function keliling(){
		$keliling = 3.14 * ($this->jari * $this->jari);
		return $keliling;
	}

	public function mencetak(){
		echo '
		<td>' . self::BENTUK . '</td>
		<td> 
			Jari - Jari : ' . $this->jari . 'cm<br>
		</td>
		<td>' . round($this->luas()) . ' cm<br>
		<td>' . round($this->keliling()) . 'cm<br>
		</tr>';
	}
}
?>