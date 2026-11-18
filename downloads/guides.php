<?php
// Scans the per-episode downloads/S1E*/ folders for one guide type (parent
// or teacher) and returns every episode's copy as JSON, in episode order.
// Drop a new episode's guide into its S1EN folder with the same naming
// pattern ("SuperPod S1EN Parent Guide.pdf" / "... Teacher Guide.pdf") and
// it shows up here automatically - nothing else to update.

header('Content-Type: application/json');

$titles = [
    'S1E1' => 'The Sound of Home',
    'S1E2' => 'Kiko Tries New Things',
    'S1E3' => 'Kiko Calms Herself',
    'S1E4' => 'Kiko Makes a Friend',
    'S1E5' => 'Echo Finds Her Way',
    'S1E6' => 'Every Orca Has a Gift',
];

$type_labels = [
    'parent' => 'Parent Guide',
    'teacher' => 'Teacher Guide',
];

$type = isset($_GET['type']) ? $_GET['type'] : '';
if (!isset($type_labels[$type])) {
    http_response_code(400);
    echo json_encode(['error' => 'invalid type']);
    exit;
}
$needle = $type_labels[$type];

$guides = [];
foreach ($titles as $folder => $episode_title) {
    $dir = __DIR__ . '/' . $folder;
    if (!is_dir($dir)) continue;
    foreach (scandir($dir) as $file) {
        if (strpos($file, '.') === 0) continue;
        if (stripos($file, $needle) === false) continue;
        if (strtolower(substr($file, -4)) !== '.pdf') continue;
        $guides[] = [
            'episode' => $folder,
            'title' => $episode_title,
            'name' => $file,
            'url' => $folder . '/' . rawurlencode($file),
        ];
        break;
    }
}

echo json_encode(['label' => $needle, 'guides' => $guides]);
