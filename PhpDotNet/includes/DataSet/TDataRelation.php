<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Armando Alvarez
 * Date: 10/17/13
 * Time: 5:12 PM
 * To change this template use File | Settings | File Templates.
 */
class TDataRelation
{
    var $FName;
    var $FParentColumns;
    var $FChildColumns;
    var $FDataSet;
    var $FChildTable;
    var $FParentTable;
    var $FExtendedProperties;
    var $FChildKeyConstraint;
    var $FParentKeyConstraint;
    private function Inicialize()
    {
        $this->FChildColumns=new TDataColumnCollection();
        $this->FParentColumns = new TDataColumnCollection();


    }

    public function __construct(){$this->Inicialize();}
    public function DataRelation1($relationName,$parentColumn,$childColumn){}
    public function DataRelation2($relationName, $parentColumn, $childColumn, $createConstraints){}
    public function DataRelation3($relationName, $parentTableName, $childTableName, $parentColumnNames, $childColumnNames,$nested){}
    /*

public DataRelation(string relationName, DataColumn[] parentColumns, DataColumn[] childColumns);

public DataRelation(string relationName, DataColumn[] parentColumns, DataColumn[] childColumns, bool createConstraints);

public DataRelation(string relationName, string parentTableName, string parentTableNamespace, string childTableName, string childTableNamespace, string[]
parentColumnNames, string[] childColumnNames, bool nested);

*/

    //Propiedades

    public function  ChildColumns() { return $this->FChildColumns; }
    public function  ChildKeyConstraint() { return $this->FChildKeyConstraint; }
    public function ChildTable(){return $this->FChildTable;}
    public function DataSet(){return $this->FDataSet;}
    public function ExtendedProperties(){return $this->FExtendedProperties;}
    public function GetNested(){return $this->FNested;}
    public function SetNested($nested){$this->FNested=$nested;}
    public function ParentColumns(){return $this->FParentColumns;}
    public function ParentTable(){return $this->FParentTable;}
    public function ParentKeyConstraint(){return $this->FParentKeyConstraint;}
    public function GetRelationName() { return $this->FName; }
    public function SetRelationName($name) { $this->FName=$name; }
}

class TDataRelationCollection extends TList
{

    public function __construct(){}

}
