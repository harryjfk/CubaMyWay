<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Armando Alvarez
 * Date: 10/17/13
 * Time: 3:21 PM
 * To change this template use File | Settings | File Templates.
 */
class TData
{
    var $FName;
    var $FObj;

    public function __construct($name, $obj)
    {
        $this->FName = $name;
        $this->FObj = $obj;
    }

    public function get_Name()
    {
        return $this->FName;
    }

    public function set_Name($name)
    {
        $this->FName = $name;
    }

    public function get_Obj()
    {
        return $this->FObj;
    }

    public function set_Obj($obj)
    {
        $this->FObj = $obj;
    }

}

class TDataRow
{
    var $FData;
    var $FRowError;
    var $FRowState;
    var $FTable;
    var $FColumnError;
    var $FOriginalData;
    var $FInit;

    private function Inicialize()
    {
        $this->FData = new TList();
        $this->FColumnError = new TList();
        $this->FOriginalData = new TList();
        $this->FRowState = 'none';
    }

    public function __construct()
    {
        $this->Inicialize();
    }

    public function _construct($table)
    {
        $this->Inicialize();
        $this->FTable = $table;

    }

    public function GetParentRow($relation)
    {
    }

    public function SetParentRow($parentRow)
    {
    }

    public function SetParentRowAndRelation($parentRow, $relation)
    {
    }

    public function GetChildRows($relation)
{
}

    public function GetColumnError($column)
    {
    }

    public function SetColumnError($column, $error)
    {
    }

    public function IsNull($column)
    {
    }

    protected function SetNull($column)
    {
    }

//Methodos de modificacion
    public function  EndEdit()
    {
    }

    public function   Delete()
    {
    }

    public function   CancelEdit()
    {
    }

    public function  BeginEdit()
    {
    }

    public function  BeginInit()
    {
        $this->FInit = true;
    }

    public function  EndInit()
    {
        $this->FInit = false;
    }

    public function   AcceptChanges()
    {
    }

    public function  RejectChanges()
    {
    }

    public function   SetAdded()
    {
    }

    public function   SetModified()
    {
    }

    //Propiedades
    public function RowError($value = null)
    {
        if ($value == null)
            return $this->FRowError;
        else
            $this->FRowError = $value;
    }

    public function RowState($state = null)
    {
        if ($state != null)
            $this->FRowState = $state;
        else
            return $this->FRowState;
    }

    public function ItemArray($value = null)
    {
        if ($value == null)
            return $this->FData->AsArray();
        else
            $this->FData->SetArray($value);
    }

    public function  Table()
    {
        return $this->FTable;
    }

    public function GetItem($column)
    {
        if (is_string($column))
            $c = $this->FTable->Columns()->ColumnByName($column);
        else
            $c = $column;
      // if($c<$this->FData->Count())

        return $this->FData->GetItem($c);
       // return null;
    }

    public function SetItem($column, $value)
    {


        if (is_string($column))
            $c = $this->FTable->Columns()->ColumnByName($column);
        else
            $c = $column;

        $this->FData->SetItem($c, $value);
        if ($this->FInit == true) {
            $this->FOriginalData->SetItem($c, $value);
            //      echo 'dddd'    ;
        } //   echo 'aaad'    ;

        else
            if ($this->IsModified())
                if ($this->FRowState != 'added')
                    $this->FRowState = 'added';
                else

                    $this->FRowState = 'modified';
            else
                $this->FRowState = 'none';
        //    echo    $this->FOriginalData->GetItem($c).'-'.$this->GetItem($c);
        //

    }

    private function IsModified()
    {

        if ($this->FRowState == 'added')
            return true;
        for ($i = 0; $i < $this->FData->Count(); $i++)
            if ($this->FData->GetItem($i) != $this->FOriginalData->GetItem($i))
                return true;
        return false;
    }


    /*
     *estos dos preguntar si es string o obecto
public function  GetParentRowByRelation($relation){}
public DataRow[] GetChildRows(string relationName);

//
     lo mismo pero con string y entero
        public object this[int columnIndex] { get; set; }
            public object this[string columnName] { get; set; }
public string GetColumnError(int columnIndex);
    public void SetColumnError(int columnIndex, string error);
public void SetColumnError(string columnName, string error);

        public DataRow[] GetParentRows(DataRelation relation);








*/
}

class TDataRowCollection extends TList
{
    var $FRemoved;
    var $Table;

    public function __construct($table)
    {
        $this->FRemoved = new TList();
        $this->Table = $table;
    }

   /* public function AsArray($idvalue,$colsvalue)
    {
        $r = array();
        for ($k = 0; $k < $this->Count(); $k++)
        {
            $t ="";
            for ($i = 0; $i < count($colsvalue); $i++) {
            $t.=$this->GetItem($k)->GetItem($colsvalue[$i]);
                if($i<count($colsvalue)-1)
                    $t.=",";
            }
            $r.= [$this->GetItem($k)->GetItem($idvalue)=>$t];
        }
     echo json_encode($r) ;
    }*/

    public function AddNew($item)
    {
        $item->FRowState = 'added';
        return $this->Add($item);
    }

    public function AddDefault()
    {
        if($this->Table!=null)
        $s = $this->Table->DefaultType();

        $item = new  $s($this->Table);
        $item->__construct($this->Table);

        $this->AddNew($item);

        return $item;
    }

    public function  Remove($item)
    {
        $t = null;
        if (is_int($item))
            $t = $this->GetItem($item);
        else
            $t = $item;
        if ($t != null) {
            if ($t->RowState() == 'none')
                $this->FRemoved->Add($t);
            parent::Delete($item);
        }
    }

    public function Removed()
    {
        return $this->FRemoved;
    }
}
