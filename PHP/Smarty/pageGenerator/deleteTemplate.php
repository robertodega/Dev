<?php
$t = isset($_GET['t']) ? intval($_GET['t']) : '';
$outputDir = __DIR__ . "/output/".$t."/";

if (!is_dir($outputDir)) {
    ?><h2>Folder does not exist.</h2><hr /><?php
}
else{
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($outputDir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($files as $fileinfo) {
        $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
        $todo($fileinfo->getRealPath());
    }
    rmdir($outputDir);
    ?><h1>Folder deleted.</h1><hr /><?php
}
?>
<button class=" btn btn-sm btn-primary" id="outputLink" name="outputLink" onclick="document.location.href='./'">Home</button>

