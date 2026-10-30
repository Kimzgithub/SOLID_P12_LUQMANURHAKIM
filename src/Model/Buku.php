<?php

declare(strict_types=1);

abstract class Buku
{
    public function __construct(private string $judul)
    {
    }

    public function getJudul(): string
    {
        return $this->judul;
    }
}
