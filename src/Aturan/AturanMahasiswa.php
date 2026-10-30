<?php
declare(strict_types=1);

class AturanMahasiswa implements AturanAnggota
{
    public function lamaPinjam(): int
    {
        return 7;
    }

    public function tarifDenda(): int
    {
        return 1000;
    }
}
