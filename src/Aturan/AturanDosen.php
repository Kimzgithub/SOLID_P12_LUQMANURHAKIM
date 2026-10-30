<?php

declare(strict_types=1);

class AturanDosen implements AturanAnggota
{
    public function lamaPinjam(): int
    {
        return 14;
    }

    public function tarifDenda(): int
    {
        return 500;
    }
}
