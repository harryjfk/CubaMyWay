<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Armando Alvarez
 * Date: 10/18/13
 * Time: 5:56 PM
 * To change this template use File | Settings | File Templates.
 */
class TParam
{
    var $FName;
    var $FType;
    var $FDirection;
    var $FSource;
    var $FValue;
    public function __construct(){}
    public function _construct($name,$type,$direction,$source)
    {
        $this->FName = $name;
        $this->FType = $type;
        $this->FDirection = $direction;
        $this->FSource = $source;
    }

    public function ClearedName()
    {
        $s = str_replace('@','',$this->Name());
        return  $s;

    }
    public function Value($value=null){

        if ($value==null)
            return $this->FValue ;
        else
            $this->FValue =$value;
    }
    public function Source($value=null){

        if ($value==null)
            return $this->FSource ;
        else
            $this->FSource =$value;
    }
    public function Name($value=null){

        if ($value==null)
            return $this->FName ;
        else
            $this->FName =$value;
    }
}
class TParamCollection extends TList
{
    public function CreateAndAdd($name,$type,$direction,$source)
    {
        $r = new TParam();
        $r->_construct($name,$type,$direction,$source);
        parent::Add($r);
        return $r;
    }
}
class TDataCommand
{
    var $FConnection;
    var $FSql;
    var $FParams;
    var $FType;
    var $FExecSelect;
    public function __construct(){ $this->FParams=new TParamCollection(); }
    public function _construct($adapter){$this->FAdapter=$adapter;}
    public function SetConnection($value)
    {
        $this->FConnection=$value;
    }
    public function  Adapter(){return $this->FAdapter;}
    public function GetConnection(){return $this->FConnection;}
    public function GetSql(){return $this->FSql;}
    public function SetSql($sql){$this->FSql=$sql;}
    private function CleanSql($sql)
    {
        $r =$sql;
        $r =str_replace('[','',$r);
        $r =str_replace(']','',$r);
        $r =str_replace('dbo.','',$r);
        return $r;
    }
    private function GetCommandSql($sql)
    {
        if($this->FType=='Text')
            return $sql;
        else
            if ($this->FType=='StoredProcedure')
            {
               $temp  = "CALL `".$sql.'`(';

                for ($i=0;$i<$this->FParams->Count();$i++)
                {

                    $temp=$temp."'".$this->FParams->GetItem($i)->Name()."'";
                    if ($i<$this->FParams->Count()-1)
                        $temp.=',';

                }
                   $temp.=')';
                  return $temp;

            }

    }
    public function Execute($out=false)
    {
        $this->FConnection->Connect();

        $sql = $this->CleanSql($this->FSql);


           $sql= $this->GetCommandSql($sql);

        if ($this->FParams->Count()>0)
            for ($i=0;$i<$this->FParams->Count();$i++)

                  $sql =str_replace($this->FParams->GetItem($i)->Name(),$this->FParams->GetItem($i)->Value(),$sql);


           $res = $this->FConnection->ExecuteQuery($sql);
            $this->FConnection->DisConnect();

               if ($out==false &&(is_array($res)))
               {

           // if ($this->FExecSelect)
//&&(stripos(strtolower($sql) ,'select')!==false)
          return    $this->Adapter()->FillData($res);}
      //  echo $this->Adapter()->Table()->Count();
        if(stripos(strtolower($sql) ,'select')==false &&(is_array($res)))
            if(is_array($res[0]))
                return $res[0];
                else
            return $res[0][0];
          return $res;
    }
    public function Type($value=null){
        if ($value==null)
            return $this->FType;
        else
            $this->FType=$value;
    }
    public function Parametres(){return $this->FParams;}
    public function ExecuteSelect($value=-1){
        if ($value==-1 )
            return $this->FExecSelect;
        else
            $this->FExecSelect = $value;
    }

}

class TDataCommandCollection
{


}
