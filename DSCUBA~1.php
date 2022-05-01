
class t_tourpoloDataTable extends TDataTable
{
     public function GetData()
    {
     $res ="[ ";
        for($i=0;$i<$this->Rows()->Count();$i++)
        {
            $t = $this->Row($i);
            $res.="{ latLng:".$t->datapolo().",name:"."'".$t->namepolo()."'".",item:"."'".$t->idtourpolo()."'"." }";
            if($i<$this->Rows()->Count()-1)
                $res.=",";
        }
        $res.="]" ;
        return $res;
    }

}