<?php

declare(strict_types=1);

class StrukPrinter
{
    public function cetak(string $judul, AturanAnggota $aturan): void
    {
        echo "=== STRUK PEMINJAMAN ===\n";
        echo "Judul: $judul\n";
        echo "Lama pinjam: {$aturan->lamaPinjam()} hari\n";
        echo "Tarif denda: Rp {$aturan->tarifDenda()} / hari\n";
    }
}
