class TiketIMAX extends Tiket {
    // Properti tambahan spesifik (camelCase)
    private string $kacamata3dId;
    private ?string $efekGerakFitur; // tanda ? berarti boleh null sesuai isi database

    // Constructor Utama
    public function __construct(
        int $id_tiket, string $nama_film, string $jadwal_tayang, int $jumlah_kursi, float $harga_dasar_tiket,
        string $kacamata3dId, ?string $efekGerakFitur
    ) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Implementasi Metode Abstrak: Hitung Total Harga (+ Charge IMAX Rp 25.000/kursi)
    public function hitungTotalHarga(): float {
        $chargeIMAX = 25000 * $this->jumlah_kursi;
        return ($this->harga_dasar_tiket * $this->jumlah_kursi) + $chargeIMAX;
    }

    // Implementasi Metode Abstrak: Tampilkan Fasilitas
    public function tampilkanInfoFasilitas(): void {
        echo "<h3>[STUDIO IMAX 3D] Ticket ID: #{$this->id_tiket}</h3>";
        echo "Film: {$this->nama_film}<br>";
        echo "Jadwal Tayang: {$this->jadwal_tayang}<br>";
        echo "Fasilitas Tambahan:<br>";
        echo "- ID Kacamata 3D: {$this->kacamata3dId}<br>";
        echo "- Fitur Efek Gerak Kursi: " . ($this->efekGerakFitur ?? "Standard Vibration") . "<br>";
        echo "Total Bayar (+Charge IMAX): Rp " . number_format($this->hitungTotalHarga(), 0, ',', '.') . "<br><hr>";
    }
}