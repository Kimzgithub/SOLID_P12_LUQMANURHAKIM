<?php

declare(strict_types=1);

interface PengelolaKatalogInterface
{
    public function tambahBuku(array $data): void;

    public function hapusBuku(int $id): void;
}
