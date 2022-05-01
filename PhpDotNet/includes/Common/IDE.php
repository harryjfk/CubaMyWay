<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Armando Alvarez
 * Date: 10/17/13
 * Time: 3:27 PM
 * To change this template use File | Settings | File Templates.
 */
class TIDE
{
    private $root;
    public function Root($value=null)
    {
        if($value==null)
            Return $this ->root;
        else
            $this->root($value);
    }
    public function __construct($root)
    {
        $this->root = $root;

    }
 public function import($file)
    {
        $include= str_replace(".","/",$file);
        $include=$this->root.$include.".php";
        if(file_exists($include))
            include_once($include);
    }
static public function  include_path($path)
{
    echo $path;
   $r= pathinfo($path);
 echo count($r);
}


}
?>