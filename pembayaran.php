<?php
abstract class Pembayaran {
    protected $jumlah;

    public function __construct($jumlah) {
        $this->jumlah = $jumlah;
    }

    abstract public function prosesPembayaran();

    public function validasi() {
        return $this->jumlah > 0;
    }

    // diskon 10%
    public function diskon() {
        return $this->jumlah * 0.1;
    }

    // pajak 11%
    public function pajak() {
        return $this->jumlah * 0.11;
    }

    // total akhir
    public function totalBayar() {
        return $this->jumlah - $this->diskon() + $this->pajak();
    }
}
?>