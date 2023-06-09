<?php

namespace App\Http\Controllers;

use App\Models\ShortCode;

class ShortCodeController extends Controller
{
    public static function generateShortCode($qrCodeData): ShortCode
    {
        return self::storeShortCode(shortCode: self::generateRandomString(), qrCodeData: $qrCodeData);
    }
    public static function storeShortCode($shortCode, $qrCodeData): ShortCode
    {
        return ShortCode::create([
            'code' => $shortCode,
            'data' => $qrCodeData,
        ]);
    }
    public static function generateRandomString(): string
    {
        do {
            $shortCode = str()->random(6);
        } while (self::isShortCodeExists($shortCode));
        return $shortCode;
    }
    public static function isShortCodeExists($shortCode): bool
    {
        return ShortCode::whereCode($shortCode)->exists();
    }
}
