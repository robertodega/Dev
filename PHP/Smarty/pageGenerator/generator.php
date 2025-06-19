  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  require_once __DIR__ . '/libs/Smarty.class.php';

  $smarty = new Smarty();
  $smarty->setTemplateDir(__DIR__ . '/templates/');
  $smarty->setCompileDir(__DIR__ . '/templates_c/');
  $smarty->setCacheDir(__DIR__ . '/cache/');

  $t = isset($_GET['t']) ? intval($_GET['t']) : 1;

  $templateFile = 'page_' . $t . '.tpl';
  if ($smarty->templateExists($templateFile)) {
    include_once __DIR__ . '/include/structures.php';
    include_once __DIR__ . '/include/folderCreation.php';
    include_once __DIR__ . '/include/contentCreation.php';
  } else {
  ?>
    <li style="color:red;">Template mancante: <strong><?= htmlspecialchars($templateFile) ?></strong></li>
  <?php
  }
  ?>
  <button class=" btn btn-sm btn-primary" id="outputLink" name="outputLink" onclick="document.location.href='./'">Home</button>