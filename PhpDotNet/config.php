<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrador
 * Date: 8/02/14
 * Time: 10:36
 * To change this template use File | Settings | File Templates.
 */
define('JEXEC', true);
define('ROOT', str_replace("\\", '/', realpath(__DIR__ . '/..')).'/');
define('ROOT_MODULES',ROOT.'modules/');
define('ROOT_UPLOADS',ROOT.'volatiles/');
define('ROOT_UPLOADS_IMAGES',ROOT_UPLOADS.'images/');
define('ROOT_UPLOADS_FILES',ROOT_UPLOADS.'files/');
define('ROOT_LANGS',ROOT_MODULES.'languages/');
define('ROOT_TEMP',ROOT.'tmp/');
//direcciones externas
define('LIVESITE', 'http://www.cubamyway.com/');
define('LIVE_UPLOADS',LIVESITE.'uploads/');
define('LIVE_TEMP',LIVESITE.'tmp/');
define('LIVE_USER_IMGS',LIVESITE.'volatiles/images/');
//include_once('System/TIncluder.php');
define('neededchart',true);
define('PHPDOTNETROOT',str_replace("\\", '/', dirname ( __FILE__ )).'/' );
define('PHPDOTNETROOTLIVE', 'http://www.cubamyway.com/PhpDotNet/');
define('PROJECTNAME','Cuba My Way');
define('PHPDOTNET_ROOT_MODULES',PHPDOTNETROOT.'modules/');
    define('PHPDOTNET_ROOT_LANGS',PHPDOTNET_ROOT_MODULES.'languages/');
//define('PROJECTDB','mysql:localhost:3306:xatem:root:');
define('PHPDOTNETROOT_LIBS',PHPDOTNETROOT.'includes/Common/');
session_start();
include(PHPDOTNETROOT.'includes/Common/IDE.php');


$_SESSION['ide'] = new TIDE(PHPDOTNETROOT)         ;
$_SESSION['ide']->import('includes.Common.Language');
$_SESSION['ide']->import('includes.Common.List');
$_SESSION['ide']->import('includes.UrlCrypt');
$d = 'en';
if (!empty($_GET['lang']))
    $d = $_GET['lang'];


$_SESSION['languages'] = new Language(PHPDOTNET_ROOT_LANGS,$d);
$ACL = array(1=>$_SESSION['languages']->GetString("TYPE_PROFILE_ADMIN"),2=>$_SESSION['languages']->GetString("TYPE_PROFILE_FRONT"));
include('DSDatos.Designer.php');



