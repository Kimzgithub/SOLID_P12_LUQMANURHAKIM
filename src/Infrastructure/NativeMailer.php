<?php

declare(strict_types=1);

class NativeMailer implements MailerInterface
{
    public function kirim(string $tujuan, string $subjek, string $pesan): void
    {
        mail($tujuan, $subjek, $pesan);
    }
}
