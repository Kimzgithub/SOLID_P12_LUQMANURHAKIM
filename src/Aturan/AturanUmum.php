<?php

declare(strict_types=1);

class AturanUmum implements AturanAnggota
{
    public function lamaPinjam(): int
    {
        return 3;
    }

    public function tarifDenda(): int
    {
        return 2000;
    }
}
