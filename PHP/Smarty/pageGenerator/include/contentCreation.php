<?php
$rooLink = "<a href='../../'>ROOT</a>";
$menuList = '';
foreach ($pagine as $pagina) {
    $menuList .= "<div class='menulink' id='" . $pagina['titolo'] . "' ref='" . $pagina['slug'] . ".html'>" . $pagina['titolo'] . "</div>";
}
foreach ($pagine as $pagina) {

    $smarty->assign('rooLink', $rooLink);
    $smarty->assign('menu', $menuList);
    $smarty->assign('titolo', $pagina['titolo']);
    $smarty->assign('contenuto', $pagina['contenuto']);

    $html = $smarty->fetch($templateFile);
    file_put_contents($outputDir . '/' . $pagina['slug'] . '.html', $html);
?>
    <li>Generata: <?= $t ?>/<strong><?= $pagina['slug'] ?>.html</strong></li>
<?php
}
?>
<button class="btn btn-sm btn-primary" id="outputLink" name="outputLink" onclick="document.location.href='output/<?= urlencode($t) ?>'">Output</button>
