<?php

declare(strict_types=1);

interface AturanAnggota
{
    public function lamaPinjam(): int;

    public function tarifDenda(): int;
}
