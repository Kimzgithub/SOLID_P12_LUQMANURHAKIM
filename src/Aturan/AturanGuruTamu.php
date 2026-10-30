<?php

declare(strict_types=1);

class AturanGuruTamu implements AturanAnggota
{
    public function lamaPinjam(): int
    {
        return 5;
    }

    public function tarifDenda(): int
    {
        return 1500;
    }
}
