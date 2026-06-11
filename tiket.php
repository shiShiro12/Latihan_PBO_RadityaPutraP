<?php

abstract class Tiket {
    // Properti terenkapsulasi dengan hak akses protected
    protected int $id_tiket;
    protected string $nama_film;
    protected string $jadwal_tayang; // Disimpan sebagai string format 'YYYY-MM-DD HH:MM:SS' agar cocok dengan MySQL
    protected int $jumlah_kursi;
    protected float $harga_dasar_tiket;

    // Constructor Utama untuk Pemetaan Data dari Database
    public function __construct(
        int $id_tiket, 
        string $nama_film, 
        string $jadwal_tayang, 
        int $jumlah_kursi, 
        float $harga_dasar_tiket
    ) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->harga_dasar_tiket = $harga_dasar_tiket;
    }

    // ====================================================================
    // METODE ABSTRAK (Wajib tanpa body/isi, diimplementasikan di class anak)
    // ====================================================================
    
    /**
     * Menghitung total harga tiket berdasarkan jumlah kursi, harga dasar,
     * dan tambahan biaya spesifik dari masing-masing jenis studio.
     */
    abstract public function hitungTotalHarga(): float;

    /**
     * Menampilkan informasi fasilitas spesifik yang didapatkan pelanggan.
     */
    abstract public function tampilkanInfoFasilitas(): void;

    // ====================================================================
    // GETTER AND SETTER (Untuk akses enkapsulasi yang aman)
    // ====================================================================
    public function getIdTiket(): int {
        return $this->id_tiket;
    }

    public function setIdTiket(int $id_tiket): void {
        $this->id_tiket = $id_tiket;
    }

    public function getNamaFilm(): string {
        return $this->nama_film;
    }

    public function setNamaFilm(string $nama_film): void {
        $this->nama_film = $nama_film;
    }

    public function getJadwalTayang(): string {
        return $this->jadwal_tayang;
    }

    public function setJadwalTayang(string $jadwal_tayang): void {
        $this->jadwal_tayang = $jadwal_tayang;
    }

    public function getJumlahKursi(): int {
        return $this->jumlah_kursi;
    }

    public function setJumlahKursi(int $jumlah_kursi): void {
        $this->jumlah_kursi = $jumlah_kursi;
    }

    public function getHargaDasarTiket(): float {
        return $this->harga_dasar_tiket;
    }

    public function setHargaDasarTiket(float $harga_dasar_tiket): void {
        $this->harga_dasar_tiket = $harga_dasar_tiket;
    }
}