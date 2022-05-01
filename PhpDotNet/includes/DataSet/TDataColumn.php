<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Armando Alvarez
 * Date: 10/17/13
 * Time: 3:22 PM
 * To change this template use File | Settings | File Templates.
 */

class TDataColumn
{
    var $FName;
    var $FType;
    var $FExpression;
    var $FAllowDBNull;
    var $FAutoInc;
    var $FCaption;
    var $FAutoSeed;
    var $FAutoStep;
    var $FUnique;
    var $FDefaultValue;
    var $FReadOnly;
    var $FMaxLength;
    var $FTable;
    public function  __construct(){}
    public function TDataColumn1($columnName,$table){ $this->FName=$columnName; $this->FTable=$table; }
    public function  TDataColumn2 ($columnName,$dataType,$table){$this->FName=$columnName; $this->FTable=$table;}
    public function  TDataColumn3($columnName, $dataType, $expr,$table){$this->FName=$columnName; $this->FTable=$table;}
    //Propiedades
    public function AllowDBNull($value=null){
        if ($value==null)
            return $this->FAllowDBNull;
        else
            $this->FAllowDBNull=$value;
    }

    public function AutoIncrement($value=null){

        if ($value==null)
            return $this->FAutoInc;
        else
            $this->FAutoInc=$value;
    }

    public function AutoIncrementSeed($value=null){

        if ($value==null)
            return $this->FAutoSeed;
        else
            $this->FAutoSeed=$value;
    }

    public function AutoIncrementStep($value=null){

        if ($value==null)
            return $this->FAutoStep;
        else
            $this->FAutoStep=$value;}

    public function Caption($value=null){

        if ($value==null)
            return $this->FCaption;
        else
            $this->FCaption=$value;}

    public function ColumnName($value=null){

        if ($value==null)
            return $this->FName;
        else
            $this->FName=$value;
    }


    public function DataType($value=null){

        if ($value==null)
            return $this->FType;
        else
            $this->FType=$value;
    }

    public function DefaultValue($value=null){

        if ($value==null)
            return $this->FDefaultValue;
        else
            $this->FDefaultValue=$value;
    }

    public function Expression($value=null){

        if ($value==null)
            return $this->FExpression;
        else
            $this->FExpression=$value;}

    public function MaxLength($value=null){
        if ($value==null)
            return $this->FMaxLength;
        else
            $this->FMaxLength=$value;

    }
     public function ReadOnly($value=null){

        if ($value==null)
            return $this->FReadOnly;
        else
            $this->FReadOnly=$value;}

    public function Unique($value=null){

        if ($value==null)
            return $this->FUnique;
        else
            $this->FUnique=$value;}

    public function Table(){return $this->FTableName;}


    // public DataSetDateTime DateTimeMode { get; set; }

}
class TDataColumnCollection extends TList
{

    public function __construct(){}
    public function ColumnByName($name){
        for($i=0;$i<$this->Count();$i++)
            if ($this->GetItem($i)->ColumnName()==$name)
            {
                return $i;
            }
        return -1;
    }

}
