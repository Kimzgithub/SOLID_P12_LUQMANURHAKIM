<?php

declare(strict_types=1);

interface DapatDipinjam
{
    public function hitungDenda(int $hariTerlambat): int;
}
