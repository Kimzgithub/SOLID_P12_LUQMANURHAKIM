<?php

declare(strict_types=1);
spl_autoload_register(function (string $class): void {
    $iter = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__ . '/src'));
    foreach ($iter as $file) {
        if ($file->getFilename() === $class . '.php') {
            require_once $file->getPathname();
            return;
        }
    }
});

$db     = new FakeDatabaseConnection();   
$mailer = new FakeMailer();               

$factory = new AturanAnggotaFactory([
    'mahasiswa' => new AturanMahasiswa(),
    'dosen'     => new AturanDosen(),
    'umum'      => new AturanUmum(),
    'guru_tamu' => new AturanGuruTamu(),
]);

$service = new PerpustakaanService(
    new BukuRepository($db),
    new AnggotaRepository($db),
    new PeminjamanRepository($db),
    $factory,
    $mailer,
    new StrukPrinter()
);

echo "\n Skenario A: Mahasiswa \n";
$service->prosesPeminjaman(1, 1, 'mahasiswa');

echo "\n Skenario B: Dosen \n";
$service->prosesPeminjaman(1, 2, 'dosen');

echo "\n Skenario C: Tipe tidak dikenal \n";
try {
    $service->prosesPeminjaman(1, 1, 'tamu');
} catch (InvalidArgumentException $e) {
    echo "Error: {$e->getMessage()}\n";
}

echo "\n Skenario D: Buku referensi \n";
try {
    $service->prosesPeminjaman(2, 1, 'mahasiswa');
} catch (DomainException $e) {
    echo "Error: {$e->getMessage()}\n";
}

echo "\n Skenario E: Guru tamu (tipe baru, OCP) \n";
$service->prosesPeminjaman(1, 1, 'guru_tamu');

echo "\n Demo ISP: SirkulasiBukuService \n";
$sirkulasi = new SirkulasiBukuService();
$sirkulasi->pinjamBuku(1);
$sirkulasi->kembalikanBuku(1);

echo "\n Demo LSP: denda hanya untuk DapatDipinjam \n";
function tampilkanDenda(DapatDipinjam $buku, int $hari): void
{
    echo "Denda: Rp " . $buku->hitungDenda($hari) . "\n";
}
tampilkanDenda(new BukuUmum('PBO'), 3);

echo "\nPeminjaman tersimpan: {$db->getJumlahPeminjaman()}\n";
echo 'Email terkirim: ' . count($mailer->getTerkirim()) . "\n";
