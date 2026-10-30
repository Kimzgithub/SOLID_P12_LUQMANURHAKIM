<?php

declare(strict_types=1);

interface MailerInterface
{
    public function kirim(string $tujuan, string $subjek, string $pesan): void;
}
