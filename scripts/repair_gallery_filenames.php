<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

$renamed = 0;
$skipped = 0;

Gallery::query()->orderBy('id')->get()->each(function (Gallery $gallery) use (&$renamed, &$skipped) {
    $currentFilename = $gallery->filename;

    if (preg_match('/^[A-Za-z0-9._-]+$/', $currentFilename)) {
        $skipped++;
        return;
    }

    $extension = strtolower(pathinfo($currentFilename, PATHINFO_EXTENSION));
    $baseName = pathinfo($currentFilename, PATHINFO_FILENAME);
    $safeBaseName = Str::slug($baseName);

    if ($safeBaseName === '') {
        $safeBaseName = 'gallery-image';
    }

    $newFilename = $gallery->id . '_' . Str::limit($safeBaseName, 80, '') . '.' . $extension;
    $oldPath = 'portfolio/' . $currentFilename;
    $newPath = 'portfolio/' . $newFilename;

    if ($oldPath === $newPath) {
        $skipped++;
        return;
    }

    if (Storage::disk('public')->exists($oldPath)) {
        if (! Storage::disk('public')->exists($newPath)) {
            Storage::disk('public')->move($oldPath, $newPath);
        }

        $gallery->update(['filename' => $newFilename]);
        $renamed++;
        return;
    }

    $skipped++;
});

echo "Renamed: {$renamed}" . PHP_EOL;
echo "Skipped: {$skipped}" . PHP_EOL;
