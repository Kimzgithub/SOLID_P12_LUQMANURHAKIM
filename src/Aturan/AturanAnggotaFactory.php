<?php

declare(strict_types=1);

class AturanAnggotaFactory
{
    public function __construct(private array $daftarAturan)
    {
    }

    public function buat(string $tipe): AturanAnggota
    {
        return $this->daftarAturan[$tipe]
            ?? throw new InvalidArgumentException("Tipe anggota tidak dikenal: $tipe");
    }
}
