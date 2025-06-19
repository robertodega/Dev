<?php
/* Smarty version 4.5.5, created on 2025-06-19 08:57:37
  from 'C:\xampp\htdocs\WWW\PHP\Smarty\pageGenerator\templates\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6853b4e19c2812_99519544',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a4d34ee96c220c5d9f5881d796697402c265b38' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WWW\\PHP\\Smarty\\pageGenerator\\templates\\page.tpl',
      1 => 1750316216,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6853b4e19c2812_99519544 (Smarty_Internal_Template $_smarty_tpl) {
?>  <!DOCTYPE html>
  <html lang="it">
  <head>
      <title><?php echo $_smarty_tpl->tpl_vars['titolo']->value;?>
</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"><?php echo '</script'; ?>
>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"><?php echo '</script'; ?>
>

      <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
      <link rel="stylesheet" href="css/custom.css">
  </head>
  <body>
      <div class='menuDiv'><?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
</div>
      <div class='clearDiv'></div>
      <h1><?php echo $_smarty_tpl->tpl_vars['titolo']->value;?>
</h1>
      <div><?php echo $_smarty_tpl->tpl_vars['contenuto']->value;?>
</div>
  </body>
  </html>

  <?php echo '<script'; ?>
 src="js/custom.js"><?php echo '</script'; ?>
><?php }
}
