<?php
if(isset($_REQUEST["params"]))
{

    $params=\UrlCrypt\UrlCrypt::DecryptAsArray($_REQUEST["params"],"&","=");
    $temparams =  array_keys($_REQUEST);
    foreach($temparams as $tp)
        if($tp!=="params")
            $params+=array($tp=>$_REQUEST[$tp]);
    $_REQUEST = $params;
}