<?php

declare(strict_types=1);

interface BackupInterface
{
    public function backupDatabase(): void;
}
