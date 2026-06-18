<?php
// ====================================================================
// 1. KONEKSI DATABASE (PDO)
// ====================================================================
class Koneksi {
    private string $host = "localhost";
    private string $username = "root"; 
    private string $password = "";     
    private string $database = "DB_LATIHAN_PBO_TI-1D_RadityaPutraPerdana";
    protected ?PDO $db = null;

    public function __construct() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->database};charset=utf8mb4";
            $this->db = new PDO($dsn, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("<strong style='color:red;'>Koneksi Gagal! Pastikan MySQL di XAMPP sudah START.</strong><br>Error: " . $e->getMessage());
        }
    }

    public function getConnection(): PDO {
        return $this->db;
    }
}

// ====================================================================
// 2. ABSTRACT CLASS INDUK (TIKET)
// ====================================================================
abstract class Tiket {
    protected int $id_tiket;
    protected string $nama_film;
    protected string $jadwal_tayang;
    protected int $jumlah_kursi;
    protected float $harga_dasar_tiket;

    public function __construct(int $id_tiket, string $nama_film, string $jadwal_tayang, int $jumlah_kursi, float $harga_dasar_tiket) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->harga_dasar_tiket = $harga_dasar_tiket;
    }

    // Method Abstrak wajib tanpa body
    abstract public function hitungTotalHarga(): float;
    abstract public function tampilkanInfoFasilitas(): void;
}

// ====================================================================
// 3. CLASS ANAK: TIKET REGULAR (Sesuai Gambar Tahap 5 & 6)
// ====================================================================
class TiketRegular extends Tiket {
    private string $tipeAudio;
    private string $lokasiBaris;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, string $tipeAudio, string $lokasiBaris) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Overriding: Tarif standar murni tanpa biaya tambahan fasilitas
    public function hitungTotalHarga(): float {
        return $this->harga_dasar_tiket * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas(): void {
        echo "<div style='border-left: 5px solid #007bff; padding: 10px; margin-bottom: 10px; background:#f8f9fa;'>";
        echo "<strong>ID Tiket:</strong> #{$this->id_tiket} | <strong>Film:</strong> {$this->nama_film}<br>";
        echo "<strong>Jadwal:</strong> {$this->jadwal_tayang} | <strong>Jumlah:</strong> {$this->jumlah_kursi} Kursi<br>";
        echo "<strong>Spesifikasi Fasilitas:</strong> Audio {$this->tipeAudio}, Baris {$this->lokasiBaris}<br>";
        echo "<span style='color:#007bff;'><strong>Total Harga:</strong> Rp " . number_format($this->hitungTotalHarga(), 0, ',', '.') . "</span>";
        echo "</div>";
    }
}

// ====================================================================
// 4. CLASS ANAK: TIKET IMAX (Sesuai Gambar Tahap 5 & 6)
// ====================================================================
class TiketIMAX extends Tiket {
    private string $kacamata3dId;
    private ?string $efekGerakFitur;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, string $kacamata3dId, ?string $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Overriding: Total Harga = (jumlah_kursi * hargaDasarTiket) + 35000
    public function hitungTotalHarga(): float {
        return ($this->jumlah_kursi * $this->harga_dasar_tiket) + 35000;
    }

    public function tampilkanInfoFasilitas(): void {
        echo "<div style='border-left: 5px solid #ffc107; padding: 10px; margin-bottom: 10px; background:#fffdf3;'>";
        echo "<strong>ID Tiket:</strong> #{$this->id_tiket} | <strong>Film:</strong> {$this->nama_film}<br>";
        echo "<strong>Jadwal:</strong> {$this->jadwal_tayang} | <strong>Jumlah:</strong> {$this->jumlah_kursi} Kursi<br>";
        echo "<strong>Spesifikasi Fasilitas:</strong> Kacamata 3D ID ({$this->kacamata3dId}), Fitur Gerak (" . ($this->efekGerakFitur ?? "Standard") . ")<br>";
        echo "<span style='color:#b8860b;'><strong>Total Harga (+Audio Flat & Layar Lebar):</strong> Rp " . number_format($this->hitungTotalHarga(), 0, ',', '.') . "</span>";
        echo "</div>";
    }
}

// ====================================================================
// 5. CLASS ANAK: TIKET VELVET (Sesuai Gambar Tahap 5 & 6)
// ====================================================================
class TiketVelvet extends Tiket {
    private string $bantalSelimutPack;
    private string $layananButler;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket, string $bantalSelimutPack, string $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // Overriding: Total Harga = (jumlah_kursi * hargaDasarTiket) * 1.50 (Surcharge 50%)
    public function hitungTotalHarga(): float {
        return ($this->jumlah_kursi * $this->harga_dasar_tiket) * 1.50;
    }

    public function tampilkanInfoFasilitas(): void {
        echo "<div style='border-left: 5px solid #dc3545; padding: 10px; margin-bottom: 10px; background:#fdf3f4;'>";
        echo "<strong>ID Tiket:</strong> #{$this->id_tiket} | <strong>Film:</strong> {$this->nama_film}<br>";
        echo "<strong>Jadwal:</strong> {$this->jadwal_tayang} | <strong>Jumlah:</strong> {$this->jumlah_kursi} Kursi<br>";
        echo "<strong>Spesifikasi Fasilitas:</strong> Paket Kasur ({$this->bantalSelimutPack}), Layanan Pelayan ({$this->layananButler})<br>";
        echo "<span style='color:#dc3545;'><strong>Total Harga (+50% Premium Surcharge):</strong> Rp " . number_format($this->hitungTotalHarga(), 0, ',', '.') . "</span>";
        echo "</div>";
    }
}

// ====================================================================
// 6. PROSES VIEW / ANTARMUKA PHP (Tahap 6 - Pengelompokan Data)
// ====================================================================
$database = new Koneksi();
$db = $database->getConnection();

// Ambil seluruh data dari database
$query = $db->query("SELECT * FROM `tabel_tiket` ORDER BY `id_tiket` ASC");
$daftarTiket = $query->fetchAll();

// Array kontainer untuk memisahkan/mengelompokkan objek berdasarkan studio
$listRegular = [];
$listIMAX = [];
$listVelvet = [];

// Memetakan data dari database menjadi objek polimorfik
foreach ($daftarTiket as $row) {
    if ($row['jenis_studio'] === 'reguler') {
        $listRegular[] = new TiketRegular(
            $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], $row['jumlah_kursi'], $row['harga_dasar_tiket'],
            $row['tipe_audio'], $row['lokasi_baris']
        );
    } 
    elseif ($row['jenis_studio'] === 'imax') {
        $listIMAX[] = new TiketIMAX(
            $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], $row['jumlah_kursi'], $row['harga_dasar_tiket'],
            $row['kacamata_3D_id'], $row['efek_gerak_fitur']
        );
    } 
    elseif ($row['jenis_studio'] === 'velvet') {
        $listVelvet[] = new TiketVelvet(
            $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], $row['jumlah_kursi'], $row['harga_dasar_tiket'],
            $row['bantal_selimut_pack'], $row['layanan_butler']
        );
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Tiket Bioskop - Raditya Putra Perdana</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f6f9; color: #333; }
        .container { max-width: 900px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); }
        h1, h2 { text-align: center; margin-bottom: 5px; }
        .studio-section { margin-top: 30px; }
        .studio-title { padding: 8px 15px; color: #fff; border-radius: 4px; margin-bottom: 15px; font-weight: bold; }
        .bg-regular { background-color: #007bff; }
        .bg-imax { background-color: #e0a800; }
        .bg-velvet { background-color: #dc3545; }
    </style>
</head>
<body>

<div class="container">
    <h1>SISTEM INFORMASI DATA TIKET BIOSKOP</h1>
    <h3 style="text-align:center; color:#555;">DB: DB_LATIHAN_PBO_TI-1D_RadityaPutraPerdana</h3>
    <hr>

    <div class="studio-section">
        <div class="studio-title bg-regular">KATEGORI: STUDIO REGULAR</div>
        <?php 
        foreach ($listRegular as $tiket) {
            $tiket->tampilkanInfoFasilitas();
        }
        ?>
    </div>

    <div class="studio-section">
        <div class="studio-title bg-imax">KATEGORI: STUDIO IMAX 3D</div>
        <?php 
        foreach ($listIMAX as $tiket) {
            $tiket->tampilkanInfoFasilitas();
        }
        ?>
    </div>

    <div class="studio-section">
        <div class="studio-title bg-velvet">KATEGORI: STUDIO VELVET VIP</div>
        <?php 
        foreach ($listVelvet as $tiket) {
            $tiket->tampilkanInfoFasilitas();
        }
        ?>
    </div>
</div>

</body>
</html>