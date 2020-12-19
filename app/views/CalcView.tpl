{extends file="main.tpl"}

{block name=footer}Anna Woronko <br> Zajęcia 7. Routing.{/block}

{block name=content}   
    <div class="row">
            <div class="col-sm-12 text-left">
                    <span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span><br>
                    <a style="float:right;" class="pure-button" href="{$conf->action_url}logout">Wyloguj</a>
            </div>
    </div>

    <h2 class="content-head is-center">KALKULATOR KREDYTOWY</h2>

    <div class="pure-g">
        <div class="l-box-lrg pure-u-1 pure-u-med-2-5">
                <form class="pure-form pure-form-stacked" action="{$conf->action_root}calcCompute" method="post">
                        <fieldset>
                                <div class="row">
                                        <div class="col-sm-4">
                                            <label for="kw"> Kwota kredytu: </label>
                                            <input id="kw" class="form-control" type="text" placeholder="Kwota kredytu" name="kw" value="{$form->kwota}" /><br />
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="ok"> Okres (w latach): </label>
                                            <input id="ok" class="form-control" type="text" placeholder="Okres (w latach)" name="ok" value="{$form->okres}" /><br />
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="op"> Oprocentowanie: </label>
                                            <input id="op" class="form-control" type="text" placeholder="Oprocentowanie" name="op" value="{$form->oprocentowanie}" /><br />
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

            {include file='messages.tpl'}

            {if isset($res->result)}
                    <h4>Miesięczna rata kredytu wyniesie:</h4>
                    <p class="res">
                        {$res->result|string_format:"%.2f"}{" zł"}
                    </p>
            {/if}

        </div>
    </div>
{/block}