<?php

declare(strict_types=1);

class FakeMailer implements MailerInterface
{
    /** @var string[] */
    private array $terkirim = [];

    public function kirim(string $tujuan, string $subjek, string $pesan): void
    {
        $this->terkirim[] = "$tujuan | $subjek";
    }

    /** @return string[] */
    public function getTerkirim(): array
    {
        return $this->terkirim;
    }
}
