<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Armando Alvarez
 * Date: 10/18/13
 * Time: 2:14 PM
 * To change this template use File | Settings | File Templates.
 */
include_once('TConnection.php');
include_once('TDataCommand.php');
class TTableAdapter
{
    var $FConnection;
    var $FCommands;
    var $FSelectCommand;
    var $FInsertCommand;
    var $FDeleteCommand;
    var $FUpdateCommand;
    var $FClearBeforeFill;
    var $FOtherCommands;
    var $FTable;
    private function Inicialize($srcconn=null){
        if ($srcconn==null)
        $this->FConnection = new TConnection();
        else
           $this->FConnection = $srcconn;
        $this->FCommands = new TList();
        $this->  FOtherCommands = new TList();
    }
    public  function __construct($srcconn=null){ $this->Inicialize($srcconn);}

    public function ClearFill($value=null){
        if ($value==null)
            return $this->FClearBeforeFill;
        else
            $this->FClearBeforeFill=$value;
    }

    public function Commands(){return $this->FCommands;}
    public function Connection(){
        return $this->FConnection;}

    public function SelectCommand(){return $this->FSelectCommand;}
    public function InsertCommand(){return $this->FInsertCommand;}
    public function DeleteCommand(){return $this->FDeleteCommand;}
    public function UpdateCommand(){return $this->FUpdateCommand;}
    public function Table($table=null){
        if ($table==null)
            return $this->FTable;
        else
            $this->FTable=$table;
    }
    public function FillData($data)
    {

         if ($data!=null)
         {               if($this->FClearBeforeFill)
             $this->FTable->Clear();
        foreach($data  as $row)
        {
            $t = new $this->FTable->FDefaultType ($this->FTable);
            $t->_construct($this->FTable);
            $t->BeginInit();
            for($i=0;$i<count($row);$i++)
                $t->SetItem($i,$row[$i]);

            $t->EndInit();
            $this->FTable->Rows()->Add($t);
        }
        foreach($data  as $row)
            unset($row);
         }
    }
    public function FillDefault($table) {
        $this->FTable = $table;


        $res =  $this->SelectCommand()->Execute();

          $this->FillData($res);
        unset($res);

    }
    public function OtherCommands(){return $this->FOtherCommands;}
    public function UpdateTable($table)
    {

       // $clear = $this->ClearFill();
$r = true;
        $this->ClearFill(false);

        for ($i=0;$i<$table->Rows()->Count();$i++)
        {
               $c = $table->Rows()->GetItem($i);

            if ($c->RowState()=='added')
             {

       for ($k=0;$k<$this->FInsertCommand->Parametres()->Count();$k++)


                     $this->FInsertCommand->Parametres()->GetItem($k)->Value($c->GetItem( $table->Columns()->ColumnByName($this->FInsertCommand->Parametres()->GetItem($k)->Source())));

               $t=  $this->FInsertCommand->Execute();


                 $c->RowState('none');
                 if (!$t)
                     $r = $t;
             }
           else
                   if ($c->RowState()=='modified')
                   {
                       for ($k=0;$k<$this->FUpdateCommand->Parametres()->Count();$k++)

                           if($this->FUpdateCommand->Parametres()->GetItem($k)->ClearedName()==$this->FUpdateCommand->Parametres()->GetItem($k)->Source())

                               $this->FUpdateCommand->Parametres()->GetItem($k)->Value($c->GetItem( $table->Columns()->ColumnByName($this->FUpdateCommand->Parametres()->GetItem($k)->Source())));

                           else

                               $this->FUpdateCommand->Parametres()->GetItem($k)->Value($c->FOriginalData->GetItem( $table->Columns()->ColumnByName($this->FUpdateCommand->Parametres()->GetItem($k)->Source())));


                      $t= $this->FUpdateCommand->Execute();

                       $c->RowState('none');
                       if (!$t)
                           $r = $t;
                   }

        }

        for ($i=0;$i<$table->Rows()->Removed()->Count();$i++)
        {
            $c = $table->Rows()->Removed()->GetItem($i);
            for ($k=0;$k<$this->FDeleteCommand->Parametres()->Count();$k++)
                $this->FDeleteCommand->Parametres()->GetItem($k)->Value($c->GetItem( $table->Columns()->ColumnByName($this->FDeleteCommand->Parametres()->GetItem($k)->Source())));

            $t= $this->FDeleteCommand->Execute();
            if (!$t)
                $r = $t;
        }
        $table->Rows()->Removed()->Clear();
return $r;
    }
    public function FillLast($table)
    {
       $arr =array();
        $l = new TList();
        $t = "SELECT ";
        for($i=0;$i<$table->Columns()->Count();$i++)
       if($table->Columns()->GetItem($i)->AutoIncrement()==true && $table->Columns()->GetItem($i)->Unique()==true)
            $l->Add($table->Columns()->GetItem($i)) ;


        for($i=0;$i<$l->Count();$i++)
        { $t.="MAX(".$l->GetItem($i)->ColumnName().") as ".$l->GetItem($i)->ColumnName() ;
        if($i<$l->Count()-1)
            $t.=",";
        }
         $t.= " FROM ".$table->GetTableName();
        $c = new TDataCommand();
        $c->Type("Text");
        $c->SetConnection($this->Connection());
         $c->SetSql($t);
      $t=  $c->Execute(true);

        for($i=0;$i<$l->Count();$i++)
            $arr+=[$l->GetItem($i)->ColumnName()=>$t[$i]];
        return $arr;




    }

}
