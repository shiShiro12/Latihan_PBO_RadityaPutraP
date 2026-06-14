<?php

class TiketRegular extends Tiket {
    // Properti tambahan spesifik (camelCase)
    private string $tipeAudio;
    private string $lokasiBaris;

    // Constructor Utama
    public function __construct(
        int $id_tiket, string $nama_film, string $jadwal_tayang, int $jumlah_kursi, float $harga_dasar_tiket,
        string $tipeAudio, string $lokasiBaris
    ) {
        // Mengirimkan data ke constructor abstract class induk
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Implementasi Metode Abstrak: Hitung Total Harga
    public function hitungTotalHarga(): float {
        return $this->harga_dasar_tiket * $this->jumlah_kursi;
    }

    // Implementasi Metode Abstrak: Tampilkan Fasilitas
    public function tampilkanInfoFasilitas(): void {
        echo "<h3>[STUDIO REGULAR] Ticket ID: #{$this->id_tiket}</h3>";
        echo "Film: {$this->nama_film}<br>";
        echo "Jadwal Tayang: {$this->jadwal_tayang}<br>";
        echo "Fasilitas Tambahan:<br>";
        echo "- Tipe Audio: {$this->tipeAudio}<br>";
        echo "- Lokasi Kursi Baris: {$this->lokasiBaris}<br>";
        echo "Total Bayar: Rp " . number_format($this->hitungTotalHarga(), 0, ',', '.') . "<br><hr>";
    }
}