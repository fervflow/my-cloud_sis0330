<?php
namespace App\Core\Policies;

class ArchivoPolicy
{
    public static function isFileExpired(\DateTime $uploadedAt): bool
    {
        $expirationDays = 30;
        return (new \DateTime())->diff($uploadedAt)->days > $expirationDays;
    }
}
