{extends file="main.tpl"}

{block name=footer}Anna Woronko <br> Zajęcia 7. Routing.{/block}

{block name=content}
    <div class="pure-g">
        <div class="l-box-lrg pure-u-1 pure-u-med-2-5">
            <form action="{$conf->action_url}login" method="post" class="pure-form pure-form-aligned bottom-margin">
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
            {include file='messages.tpl'}
        </div>
    </div>
{/block}
