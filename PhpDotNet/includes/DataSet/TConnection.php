<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Armando Alvarez
 * Date: 10/17/13
 * Time: 3:22 PM
 * To change this template use File | Settings | File Templates.
 */
class TConnectionStringBuilder
{
    var $FHeader;
    var $FUser;
    var $FPass;
    var $FDB;
    var $FServer;
    var $FPort;
    private function CheckHeader($head)
    {

        return (strtoupper($head)=='ADODB')||(strtoupper($head)=='MYSQL')||(strtoupper($head)=='POSTGRE');
    }
    public function __construct(){}
        public function FromStr($str){
        $array = explode(':',$str);

        $head = $this->CheckHeader($array[0]);
        $i = 0;
              $this->FHeader='ADODB';
        if ($head==true)
        {
            $this->FHeader=$array[$i];
            $i=1;
        }
        $this->FServer = $array[$i];
        $i++;
        $this->FPort = $array[$i];
        $i++;
        $this->FDB = $array[$i];
        $i++;
        $this->FUser = $array[$i];
        $i++;
        if ($i!=count($array))
            $this->FPass = $array[$i];
    }
    public function AsStr(){return $this->FHeader.':'.$this->FServer.':'.$this->FPort.':'.$this->FDB.':'.$this->FUser.':'.$this->FPass;}
    public function AsAdoDB(){return "";}
}

class TConnection
{
    var $FConnBuilder;
    var $FSysConn;
    var $FConnected;
    public function Connect(){


        if($this->FConnected==true)
            return null;
        $this->FConnected=false;
        if($this->FConnBuilder->FHeader=='adodb')
        {


        }
        else

            if(strtoupper($this->FConnBuilder->FHeader)=='MYSQL')
            {


                $this->FSysConn =      mysqli_connect($this->FConnBuilder->FServer, $this->FConnBuilder->FUser, $this->FConnBuilder->FPass,$this->FConnBuilder->FDB,$this->FConnBuilder->FPort,0)
               or die("aaa")  ;
             //   mysql_select_db ($this->FConnBuilder->FDB,$this->FSysConn)
             //       or die ("Could not select database");


            }
            else
            {

            }
        $this->FConnected=true;
    }
    public function Disconnect(){
        if($this->FConnected==false)
            return null;
        if(strtoupper($this->FConnBuilder->FHeader)=='ADODB')
        {


        }
        else

            if(strtoupper($this->FConnBuilder->FHeader)=='MYSQL')
                mysqli_close($this->FSysConn);
            else
            {

            }
        $this->FConnected=false;

    }
    public function __construct(){ $this->FConnBuilder = new TConnectionStringBuilder();}
    public function Builder(){return $this->FConnBuilder;}
    private function IsSelect($sql)
    {

       return (strpos(strtolower($sql),'select')!==false);

    }
    public function ExecuteQuery($sql)
    {

        if(strtoupper($this->FConnBuilder->FHeader)=='ADODB')
        {


        }
        else

            if(strtoupper($this->FConnBuilder->FHeader)=='MYSQL')

            {

              /*  if(stripos(strtoupper($sql),'CALL')!==false)
                {
                    $result=   mysqli_multi_query($this->FSysConn,$sql);
                    $res = mysqli_store_result($this->FSysConn);
                    $array = $res->fetch_all();


                    echo json_encode($array);
                }
                else
                {
*/                   $array=null;
               $result=  mysqli_multi_query($this->FSysConn,$sql) ;

                    if($result==true)

                    {

                        $res = mysqli_store_result($this->FSysConn);

                       if(stripos(strtolower($sql),'select')!==false || stripos(strtolower($sql),'call')!==false )

                        $array = $res->fetch_all();


                                        }

                            if($array!=null)
                if (count($array)>0)
                return $array;
                return $result;

            //}
    }

            else
            {

            }

    }
    public function Tables(){
        return mysql_list_tables($this->Builder()->FDB,  $this->FSysConn);

    }
    public function DataBases(){

       return  mysql_list_dbs($this->FSysConn);
    }
    public function Fields($table){
        return  mysql_list_fields($this->Builder()->FDB, $table, $this->FSysConn);

    }
}

