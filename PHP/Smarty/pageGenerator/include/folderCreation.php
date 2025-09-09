<?php
$outputHomeDir = __DIR__ . '/../output/';
$outputDir = $outputHomeDir . $t;

#   Output dir creation
if (!is_dir($outputDir)) {
    mkdir($outputDir, 0777, true);
}

#   css e js in output dir if not present
foreach (['css', 'js', 'img'] as $dir) {
    $src = __DIR__ . '/../output/' . $dir;
    $dst = $outputDir . '/' . $dir;
    if (is_dir($src) && !is_dir($dst)) {
        mkdir($dst, 0777, true);
        $files = scandir($src);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
}
