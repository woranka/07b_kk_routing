<?php
/* Smarty version 3.1.30, created on 2020-12-19 23:26:55
  from "C:\xampp\htdocs\PROJEKTY\07b_kk_routing\app\views\CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fde7e2fcdaa53_12859912',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fcd22649efd97d842f385e88bc0026ddb7de40b3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PROJEKTY\\07b_kk_routing\\app\\views\\CalcView.tpl',
      1 => 1608416803,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_5fde7e2fcdaa53_12859912 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19332310645fde7e2fc88158_21548753', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17944219375fde7e2fcd8e13_08408743', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'footer'} */
class Block_19332310645fde7e2fc88158_21548753 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Anna Woronko <br> Zajęcia 7. Routing.<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_17944219375fde7e2fcd8e13_08408743 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
   
    <div class="row">
            <div class="col-sm-12 text-left">
                    <span style="float:right;">użytkownik: <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
, rola: <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</span><br>
                    <a style="float:right;" class="pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout">Wyloguj</a>
            </div>
    </div>

    <h2 class="content-head is-center">KALKULATOR KREDYTOWY</h2>

    <div class="pure-g">
        <div class="l-box-lrg pure-u-1 pure-u-med-2-5">
                <form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute" method="post">
                        <fieldset>
                                <div class="row">
                                        <div class="col-sm-4">
                                            <label for="kw"> Kwota kredytu: </label>
                                            <input id="kw" class="form-control" type="text" placeholder="Kwota kredytu" name="kw" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota;?>
" /><br />
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="ok"> Okres (w latach): </label>
                                            <input id="ok" class="form-control" type="text" placeholder="Okres (w latach)" name="ok" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->okres;?>
" /><br />
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="op"> Oprocentowanie: </label>
                                            <input id="op" class="form-control" type="text" placeholder="Oprocentowanie" name="op" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->oprocentowanie;?>
" /><br />
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm-12 text-right">
                                                <button type="submit" class="pure-button">Oblicz</button>
                                        </div>
                                </div> 
                        </fieldset>
                </form>
        </div>

        <div class="l-box-lrg pure-u-1 pure-u-med-3-5">

            <?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


            <?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
                    <h4>Miesięczna rata kredytu wyniesie:</h4>
                    <p class="res">
                        <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['res']->value->result);
echo " zł";?>

                    </p>
            <?php }?>

        </div>
    </div>
<?php
}
}
/* {/block 'content'} */
}
