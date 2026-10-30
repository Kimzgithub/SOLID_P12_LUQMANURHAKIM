<?php

declare(strict_types=1);

class BukuUmum extends Buku implements DapatDipinjam
{
    public function hitungDenda(int $hariTerlambat): int
    {
        return $hariTerlambat * 1000;
    }
}
