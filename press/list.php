<?php
// Scans this folder for press releases and ./photos for images, and returns
// them as JSON. Drop files into these two folders on the server (via FTP)
// and they'll show up automatically — nothing else to update.

header('Content-Type: application/json');

function human_filesize($bytes) {
    $units = ['B', 'KB', 'MB', 'GB'];
    $i = 0;
    while ($bytes >= 1024 && $i < count($units) - 1) {
        $bytes /= 1024;
        $i++;
    }
    return round($bytes, $bytes < 10 && $i > 0 ? 1 : 0) . ' ' . $units[$i];
}

function scan_dir($dir, $url_prefix) {
    $items = [];
    if (!is_dir($dir)) {
        return $items;
    }
    $files = scandir($dir);
    natcasesort($files);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        if (strpos($file, '.') === 0) continue; // skip dotfiles (.DS_Store, etc.)
        if (strcasecmp($file, 'list.php') === 0) continue;
        if (strcasecmp($file, 'README.txt') === 0) continue;
        $path = $dir . '/' . $file;
        if (is_dir($path)) continue; // this endpoint only lists files, not subfolders

        $items[] = [
            'name' => $file,
            'url' => $url_prefix . rawurlencode($file),
            'size' => human_filesize(filesize($path)),
            'modified' => date('M j, Y', filemtime($path)),
        ];
    }
    return $items;
}

echo json_encode([
    'releases' => scan_dir(__DIR__, ''),
    'photos' => scan_dir(__DIR__ . '/photos', 'photos/'),
]);
