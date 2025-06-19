<?php
/* Smarty version 4.5.5, created on 2025-06-19 10:35:38
  from 'C:\xampp\htdocs\WWW\PHP\Smarty\pageGenerator\templates\page_1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6853cbda9de2c4_03498859',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5eae734e57717c500eda244263582c4de3cdf2de' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WWW\\PHP\\Smarty\\pageGenerator\\templates\\page_1.tpl',
      1 => 1750322133,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6853cbda9de2c4_03498859 (Smarty_Internal_Template $_smarty_tpl) {
?>  <!DOCTYPE html>
  <html lang="it">

  <head>
      <title><?php echo $_smarty_tpl->tpl_vars['titolo']->value;?>
</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.7.1.min.js"
          integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"><?php echo '</script'; ?>
>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
          integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
      <?php echo '</script'; ?>
>

      <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
      <link rel="stylesheet" href="css/custom.css">
  </head>

  <body>
      <div class="headerDiv"><?php echo $_smarty_tpl->tpl_vars['rooLink']->value;?>
</div>
      <div class='clearDiv'></div>
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
