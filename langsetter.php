<?php
$d = 'en';

if(!empty($_REQUEST['lang']))
    $d = $_REQUEST['lang'];

if($d!=$_SESSION['languages']->GetLang())
{
    $_SESSION['languages'] ->SetLang($d);


}

$_SESSION['languages'] ->LoadFromPath(ROOT_LANGS,$d);
$_SESSION['languages']->LoadFromPath(PHPDOTNET_ROOT_LANGS,$d);

?>