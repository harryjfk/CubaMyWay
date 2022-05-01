<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Armando Alvarez
 * Date: 10/17/13
 * Time: 4:32 PM
 * To change this template use File | Settings | File Templates.
 */
class TList
{
    var $array= array();

    public function Count() {return count($this->array);}

    public function Add($item)
    {

        $this->array[$this->Count()]=$item;

    }
    public function Insert($item,$pos)
    {

    }
    public function Delete($pos)
    {
        $t =array();
        for($i=0;$i<$pos;$i++)
            $t[$i]=$this->array[$i];

        for($i=$pos+1;$i<$this->Count();$i++)
            $t[$i-1]=$this->array[$i];
        unset($this->array);
        $this->array = $t;

    }
    public function AsArray(){return $this->array;}
    public function SetArray($arr){}
    public function Clear(){

        foreach($this->array as $a)
            unset($a);
        $this->array = array();



    }
    public function GetItem($index){return $this->array[$index];}
    public function SetItem($index,$value){$this->array[$index]=$value;}
}

