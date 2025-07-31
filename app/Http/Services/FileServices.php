<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileServices
{
    protected static $disk = 'public';

	static function getFileName(UploadedFile $file): string
    {
        return $file->getClientOriginalName();
    }

    static function getFileExtension(UploadedFile $file): string
    {
        return $file->extension();
    }

    static function makeSafeFileName(string $prefix, string $extension, UploadedFile $file): string
    {
        $fileName = $prefix . '-' . time() . '-' . uniqid() . '.' . $extension;

        // Ensure the file name is safe for storage
        return preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $fileName);
    }

    static function saveFile(string $path, string $fileName, UploadedFile $file): string
    {
        return $file->storeAs($path, $fileName, self::$disk);
    }

    static function deleteFile(string $path): bool
    {
        return Storage::disk(self::$disk)->delete($path);
    }
}