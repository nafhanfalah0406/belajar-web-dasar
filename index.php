<?php
/**
 * BAGIAN 1: LOGIKA PHP (SERVER-SIDE)
 * Semua proses data diletakkan di sini sebelum halaman dirender.
 */

// Inisialisasi variabel untuk menghindari error "undefined variable"
$pesan_status = "";
$status_engine = "Active";
$status_security = "Secure";
$tahun_footer = date("Y");
$waktu_server = date("H:i:s");

// Logika penanganan Form (Hanya berjalan jika tombol Kirim diklik)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari input form
    $subjek = htmlspecialchars($_POST['subjek']);
    $email = htmlspecialchars($_POST['email']);
    
    // Memberikan feedback ke user
    $pesan_status = "Sistem: Data '$subjek' telah diterima dari $email pada $waktu_server.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nafhan Dashboard v2</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <p style="color: #64748b; font-weight: 600;">PORTFOLIO V2.0</p>
    <h1>Halo, Nafhan di sini.</h1>
</header>

<nav>
    <a href="#">Overview</a>
    <a href="#">Projects</a>
    <a href="#">Analytics</a>
</nav>

<div class="container">

    <div class="card" style="grid-column: span 2;">
        <h2>Bio Singkat</h2>
        <p style="color: #94a3b8;">Nafhan adalah seorang mahasiswa Teknik Informatika semester 4 yang berkuliah di Universitas Muhammadiyah Sukabumi.</p>
    </div>

    <div class="card">
        <h2>Data Statistik</h2>
        <table>
            <thead>
                <tr>
                    <th>Sistem</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Core Engine</td>
                    <td style="color: var(--secondary);"><?php echo $status_engine; ?></td>
                </tr>
                <tr>
                    <td>Security</td>
                    <td style="color: var(--secondary);"><?php echo $status_security; ?></td>
                </tr>
                <tr>
                    <td>Runtime</td>
                    <td style="color: #64748b; font-size: 0.8rem;"><?php echo $waktu_server; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="card">
        <h2>Hubungi Saya</h2>
        <form method="POST" action="">
            <input type="text" name="subjek" placeholder="Subjek Pesan" required>
            <input type="email" name="email" placeholder="Email Anda" required>
            <button type="submit">Kirim Sekarang</button>
        </form>

        <?php if ($pesan_status != ""): ?>
            <div style="margin-top: 15px; padding: 10px; border-radius: 8px; background: rgba(0, 210, 255, 0.1); border: 1px solid var(--primary); color: var(--primary); font-size: 0.8rem;">
                <?php echo $pesan_status; ?>
            </div>
        <?php endif; ?>
    </div>

</div>

<footer>
    &copy; <?php echo $tahun_footer; ?> Nafhan Project &bull; Dibuat dengan presisi tinggi.
</footer>

<script src="script.js"></script>
</body>
</html>