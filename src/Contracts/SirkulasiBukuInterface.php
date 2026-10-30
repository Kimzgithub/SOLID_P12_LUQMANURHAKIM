<?php

declare(strict_types=1);

interface SirkulasiBukuInterface
{
    public function pinjamBuku(int $id): void;

    public function kembalikanBuku(int $id): void;
}
