<?php 
require_once 'bentuk2D.php';
/**
 * 
 */
class persegiPanjang extends bentuk2D
{
	public $panjang;
	public $lebar;
	const BENTUK = 'Persegi Panjang';

	public function __construct($panjang, $lebar)
	{
		$this->panjang = $panjang;
		$this->lebar = $lebar;
	}

	public function luas(){
		$luas = $this->panjang * $this->lebar;
		return $luas;
	}

	public function keliling(){
		$keliling = 2 * ($this->panjang * $this->lebar);
		return $keliling;
	}

	public function mencetak(){
		echo '
		<td>' . self::BENTUK . '</td>
		<td> 
			Panjang : ' . $this->panjang . 'cm<br>
			Lebar : '.$this->lebar . 'cm<br>
		</td>
		<td>' . round($this->luas()) . ' cm<br>
		<td>' . round($this->keliling()) . 'cm<br>
		</tr>';
	}
}

?>