<?php

declare(strict_types=1);

class SirkulasiBukuService implements SirkulasiBukuInterface
{
    /** @var array<int, bool> */
    private array $dipinjam = [];

    public function pinjamBuku(int $id): void
    {
        $this->dipinjam[$id] = true;
        echo "Buku $id dipinjam\n";
    }

    public function kembalikanBuku(int $id): void
    {
        unset($this->dipinjam[$id]);
        echo "Buku $id dikembalikan\n";
    }
}
