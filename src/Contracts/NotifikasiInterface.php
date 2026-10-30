<?php

declare(strict_types=1);

interface NotifikasiInterface
{
    public function kirimNotifikasi(string $pesan): void;
}
