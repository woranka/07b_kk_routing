<?php
/* Smarty version 3.1.30, created on 2020-12-19 23:27:03
  from "C:\xampp\htdocs\PROJEKTY\07b_kk_routing\app\views\LoginView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fde7e377b7f64_18945158',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6cc878ebf81ea2b26e97c14e63f2485e034dd34' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PROJEKTY\\07b_kk_routing\\app\\views\\LoginView.tpl',
      1 => 1608416812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_5fde7e377b7f64_18945158 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2840773735fde7e377a3f19_49158969', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16564785725fde7e377b5a75_15705997', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'footer'} */
class Block_2840773735fde7e377a3f19_49158969 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Anna Woronko <br> Zajęcia 7. Routing.<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_16564785725fde7e377b5a75_15705997 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="pure-g">
        <div class="l-box-lrg pure-u-1 pure-u-med-2-5">
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post" class="pure-form pure-form-aligned bottom-margin">
                    <legend>Logowanie do systemu</legend>
                    <fieldset>
                            <div class="row">
                                    <div class="col-sm-4">
                                        <label for="log"> login: </label>
                                        <input id="log" class="form-control" type="text" placeholder="login" name="login" /><br />
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="pas"> hasło: </label>
                                        <input id="pas" class="form-control" type="text" placeholder="hasło" name="pass" /><br />
                                    </div>
                            </div>
                            <div class="row">
                                    <div class="col-sm-12 text-right">
                                            <button type="submit" class="pure-button">zaloguj</button>
                                    </div>
                            </div>
                    </fieldset>
            </form>
        </div>
                    
        <div class="l-box-lrg pure-u-1 pure-u-med-3-5">
            <?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </div>
    </div>
<?php
}
}
/* {/block 'content'} */
}
