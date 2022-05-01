<?php
$_SESSION['ide']->import('includes.DataSet.TDataSet');
$_SESSION['ide']->import('includes.DataSet.TTableAdapter');
define('VisualWaysConnectionString', 'MySQL:localhost:3306:cubamyway:root:');
$VisualWaysConnection = new TConnection();
$VisualWaysConnection->Builder()->FromStr(VisualWaysConnectionString);
class  t_rolRow extends TDataRow
{
    public function  __construct($table)
    {
        parent::_construct($table);
    }

    public function  idrol($value = null)
    {
        if ($value == null) {
            return $this->GetItem('idrol');
        } else {
            $this->SetItem('idrol', $value);
        }
    }

    public function  namerol($value = null)
    {
        if ($value == null) {
            return $this->GetItem('namerol');
        } else {
            $this->SetItem('namerol', $value);
        }
    }

    public function  typerol($value = null)
    {
        if ($value == null) {
            return $this->GetItem('typerol');
        } else {
            $this->SetItem('typerol', $value);
        }
    }

    public function  descrol($value = null)
    {
        if ($value == null) {
            return $this->GetItem('descrol');
        } else {
            $this->SetItem('descrol', $value);
        }
    }

    public function  isanon($value = null)
    {
        if ($value == null) {
            return $this->GetItem('isanon');
        } else {
            $this->SetItem('isanon', $value);
        }
    }
}

class  t_userRow extends TDataRow
{
    public function  __construct($table)
    {
        parent::_construct($table);
    }

    public function  iduser($value = null)
    {
        if ($value == null) {
            return $this->GetItem('iduser');
        } else {
            $this->SetItem('iduser', $value);
        }
    }

    public function  nameuser($value = null)
    {
        if ($value == null) {
            return $this->GetItem('nameuser');
        } else {
            $this->SetItem('nameuser', $value);
        }
    }

    public function  username($value = null)
    {
        if ($value == null) {
            return $this->GetItem('username');
        } else {
            $this->SetItem('username', $value);
        }
    }

    public function  passworduser($value = null)
    {
        if ($value == null) {
            return $this->GetItem('passworduser');
        } else {
            $this->SetItem('passworduser', $value);
        }
    }

    public function  pictureuser($value = null)
    {
        if ($value == null) {
            return $this->GetItem('pictureuser');
        } else {
            $this->SetItem('pictureuser', $value);
        }
    }

    public function  idrol($value = null)
    {
        if ($value == null) {
            return $this->GetItem('idrol');
        } else {
            $this->SetItem('idrol', $value);
        }
    }

    public function  email($value = null)
    {
        if ($value == null) {
            return $this->GetItem('email');
        } else {
            $this->SetItem('email', $value);
        }
    }
}

class t_rolDataTable extends TDataTable
{
    private $columnidrol;
    private $columnnamerol;
    private $columntyperol;
    private $columndescrol;
    private $columnisanon;

    private function  InitClass()
    {
        $this->columnidrol = new TDataColumn();
        $this->columnidrol->TDataColumn3("idrol", "", null, $this);
        $this->columnidrol->AutoIncrement(True);
        $this->columnidrol->AutoIncrementStep(1);
        $this->columnidrol->AutoIncrementSeed(1);
        $this->columnidrol->AllowDBNull(False);
        $this->columnidrol->ReadOnly(False);
        $this->columnidrol->Unique(True);
        $this->columnidrol->MaxLength(-1);
        $this->columnidrol->Caption("idrol");
        $this->columnidrol->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnidrol);
        $this->columnnamerol = new TDataColumn();
        $this->columnnamerol->TDataColumn3("namerol", "", null, $this);
        $this->columnnamerol->AutoIncrement(False);
        $this->columnnamerol->AutoIncrementStep(0);
        $this->columnnamerol->AutoIncrementSeed(0);
        $this->columnnamerol->AllowDBNull(True);
        $this->columnnamerol->ReadOnly(False);
        $this->columnnamerol->Unique(False);
        $this->columnnamerol->MaxLength(50);
        $this->columnnamerol->Caption("namerol");
        $this->columnnamerol->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnnamerol);
        $this->columntyperol = new TDataColumn();
        $this->columntyperol->TDataColumn3("typerol", "", null, $this);
        $this->columntyperol->AutoIncrement(False);
        $this->columntyperol->AutoIncrementStep(0);
        $this->columntyperol->AutoIncrementSeed(0);
        $this->columntyperol->AllowDBNull(True);
        $this->columntyperol->ReadOnly(False);
        $this->columntyperol->Unique(False);
        $this->columntyperol->MaxLength(-1);
        $this->columntyperol->Caption("typerol");
        $this->columntyperol->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columntyperol);
        $this->columndescrol = new TDataColumn();
        $this->columndescrol->TDataColumn3("descrol", "", null, $this);
        $this->columndescrol->AutoIncrement(False);
        $this->columndescrol->AutoIncrementStep(0);
        $this->columndescrol->AutoIncrementSeed(0);
        $this->columndescrol->AllowDBNull(True);
        $this->columndescrol->ReadOnly(False);
        $this->columndescrol->Unique(False);
        $this->columndescrol->MaxLength(65535);
        $this->columndescrol->Caption("descrol");
        $this->columndescrol->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columndescrol);
        $this->columnisanon = new TDataColumn();
        $this->columnisanon->TDataColumn3("isanon", "", null, $this);
        $this->columnisanon->AutoIncrement(False);
        $this->columnisanon->AutoIncrementStep(0);
        $this->columnisanon->AutoIncrementSeed(0);
        $this->columnisanon->AllowDBNull(True);
        $this->columnisanon->ReadOnly(False);
        $this->columnisanon->Unique(False);
        $this->columnisanon->MaxLength(-1);
        $this->columnisanon->Caption("isanon");
        $this->columnisanon->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnisanon);
        $this->DefaultType('t_rolRow');
    }

    public function  __construct()
    {
        parent::__construct();
        $this->SetTableName("t_rol");
        parent::BeginInit();
        $this->InitClass();
        parent::EndInit();
    }

    public function  idrolcolumn()
    {
        return $this->columnidrol;
    }

    public function  namerolcolumn()
    {
        return $this->columnnamerol;
    }

    public function  typerolcolumn()
    {
        return $this->columntyperol;
    }

    public function  descrolcolumn()
    {
        return $this->columndescrol;
    }

    public function  isanoncolumn()
    {
        return $this->columnisanon;
    }

    public function  RemoveRow($row)
    {
        $this->Rows()->Remove($row);
    }

    public function  Addt_rolRow($namerol, $typerol, $descrol, $isanon)
    {
        $row = new Row($this);
        $row->idrol($this->Rows()->Count() + 1);
        $row->namerol($namerol);
        $row->typerol($typerol);
        $row->descrol($descrol);
        $row->isanon($isanon);
        $this->Rows()->Add($row);
        return $row;
    }

    public function  NewRow()
    {
        return $this->Rows()->CreateRow();
    }

    public function  GetByidrol($idrol)
    {
        for ($i = 0;
             $i < $this->Count();
             $i++) {
            if ($this->Row($i)->idrol() == $idrol) {
                return $this->Row($i);
            }
        }
        return null;
    }
}

class t_userDataTable extends TDataTable
{
    private $columniduser;
    private $columnnameuser;
    private $columnusername;
    private $columnpassworduser;
    private $columnpictureuser;
    private $columnidrol;
    private $columnemail;

    private function  InitClass()
    {
        $this->columniduser = new TDataColumn();
        $this->columniduser->TDataColumn3("iduser", "", null, $this);
        $this->columniduser->AutoIncrement(True);
        $this->columniduser->AutoIncrementStep(1);
        $this->columniduser->AutoIncrementSeed(1);
        $this->columniduser->AllowDBNull(False);
        $this->columniduser->ReadOnly(False);
        $this->columniduser->Unique(True);
        $this->columniduser->MaxLength(-1);
        $this->columniduser->Caption("iduser");
        $this->columniduser->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columniduser);
        $this->columnnameuser = new TDataColumn();
        $this->columnnameuser->TDataColumn3("nameuser", "", null, $this);
        $this->columnnameuser->AutoIncrement(False);
        $this->columnnameuser->AutoIncrementStep(0);
        $this->columnnameuser->AutoIncrementSeed(0);
        $this->columnnameuser->AllowDBNull(True);
        $this->columnnameuser->ReadOnly(False);
        $this->columnnameuser->Unique(False);
        $this->columnnameuser->MaxLength(255);
        $this->columnnameuser->Caption("nameuser");
        $this->columnnameuser->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnnameuser);
        $this->columnusername = new TDataColumn();
        $this->columnusername->TDataColumn3("username", "", null, $this);
        $this->columnusername->AutoIncrement(False);
        $this->columnusername->AutoIncrementStep(0);
        $this->columnusername->AutoIncrementSeed(0);
        $this->columnusername->AllowDBNull(True);
        $this->columnusername->ReadOnly(False);
        $this->columnusername->Unique(False);
        $this->columnusername->MaxLength(50);
        $this->columnusername->Caption("username");
        $this->columnusername->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnusername);
        $this->columnpassworduser = new TDataColumn();
        $this->columnpassworduser->TDataColumn3("passworduser", "", null, $this);
        $this->columnpassworduser->AutoIncrement(False);
        $this->columnpassworduser->AutoIncrementStep(0);
        $this->columnpassworduser->AutoIncrementSeed(0);
        $this->columnpassworduser->AllowDBNull(True);
        $this->columnpassworduser->ReadOnly(False);
        $this->columnpassworduser->Unique(False);
        $this->columnpassworduser->MaxLength(255);
        $this->columnpassworduser->Caption("passworduser");
        $this->columnpassworduser->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnpassworduser);
        $this->columnpictureuser = new TDataColumn();
        $this->columnpictureuser->TDataColumn3("pictureuser", "", null, $this);
        $this->columnpictureuser->AutoIncrement(False);
        $this->columnpictureuser->AutoIncrementStep(0);
        $this->columnpictureuser->AutoIncrementSeed(0);
        $this->columnpictureuser->AllowDBNull(True);
        $this->columnpictureuser->ReadOnly(False);
        $this->columnpictureuser->Unique(False);
        $this->columnpictureuser->MaxLength(255);
        $this->columnpictureuser->Caption("pictureuser");
        $this->columnpictureuser->DefaultValue('user.png');
        $this->Columns()->Add($this->columnpictureuser);
        $this->columnidrol = new TDataColumn();
        $this->columnidrol->TDataColumn3("idrol", "", null, $this);
        $this->columnidrol->AutoIncrement(False);
        $this->columnidrol->AutoIncrementStep(0);
        $this->columnidrol->AutoIncrementSeed(0);
        $this->columnidrol->AllowDBNull(True);
        $this->columnidrol->ReadOnly(False);
        $this->columnidrol->Unique(False);
        $this->columnidrol->MaxLength(-1);
        $this->columnidrol->Caption("idrol");
        $this->columnidrol->DefaultValue('2');
        $this->Columns()->Add($this->columnidrol);
        $this->columnemail = new TDataColumn();
        $this->columnemail->TDataColumn3("email", "", null, $this);
        $this->columnemail->AutoIncrement(False);
        $this->columnemail->AutoIncrementStep(1);
        $this->columnemail->AutoIncrementSeed(0);
        $this->columnemail->AllowDBNull(True);
        $this->columnemail->ReadOnly(False);
        $this->columnemail->Unique(False);
        $this->columnemail->MaxLength(-1);
        $this->columnemail->Caption("email");
        $this->columnemail->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnemail);
        $this->DefaultType('t_userRow');
    }

    public function  __construct()
    {
        parent::__construct();
        $this->SetTableName("t_user");
        parent::BeginInit();
        $this->InitClass();
        parent::EndInit();
    }

    public function  idusercolumn()
    {
        return $this->columniduser;
    }

    public function  nameusercolumn()
    {
        return $this->columnnameuser;
    }

    public function  usernamecolumn()
    {
        return $this->columnusername;
    }

    public function  passwordusercolumn()
    {
        return $this->columnpassworduser;
    }

    public function  pictureusercolumn()
    {
        return $this->columnpictureuser;
    }

    public function  idrolcolumn()
    {
        return $this->columnidrol;
    }

    public function  emailcolumn()
    {
        return $this->columnemail;
    }

    public function  RemoveRow($row)
    {
        $this->Rows()->Remove($row);
    }

    public function  Addt_userRow($nameuser, $username, $passworduser, $pictureuser, $idrol, $email)
    {
        $row = new Row($this);
        $row->iduser($this->Rows()->Count() + 1);
        $row->nameuser($nameuser);
        $row->username($username);
        $row->passworduser($passworduser);
        $row->pictureuser($pictureuser);
        $row->idrol($idrol);
        $row->email($email);
        $this->Rows()->Add($row);
        return $row;
    }

    public function  NewRow()
    {
        return $this->Rows()->CreateRow();
    }

    public function  GetByiduser($iduser)
    {
        for ($i = 0;
             $i < $this->Count();
             $i++) {
            if ($this->Row($i)->iduser() == $iduser) {
                return $this->Row($i);
            }
        }
        return null;
    }
}

class t_rolTableAdapter extends TTableAdapter
{
    private $FFillByID;

    public function  __construct()
    {
        global $VisualWaysConnection;
        parent::__construct($VisualWaysConnection);
        $this->ClearFill(true);
        $this->FSelectCommand = new TDataCommand();
        $this->Commands()->Add($this->FSelectCommand);
        $this->FSelectCommand->SetSql("SELECT idrol,namerol,typerol,descrol,isanon FROM t_rol");
        $this->FSelectCommand->SetConnection($this->FConnection);
        $this->FSelectCommand->_construct($this);
        $this->FSelectCommand->Type('Text');
        $this->FInsertCommand = new TDataCommand();
        $this->Commands()->Add($this->FInsertCommand);
        $this->FInsertCommand->SetSql("INSERT INTO t_rol(namerol,typerol,descrol,isanon) VALUES ('@namerol','@typerol','@descrol','@isanon')");
        $this->FInsertCommand->SetConnection($this->FConnection);
        $this->FInsertCommand->_construct($this);
        $this->FInsertCommand->Type('Text');
        $this->FInsertCommand->FParams->CreateAndAdd("@namerol", "nvarchar", "Input", "namerol");
        $this->FInsertCommand->FParams->CreateAndAdd("@typerol", "int", "Input", "typerol");
        $this->FInsertCommand->FParams->CreateAndAdd("@descrol", "nvarchar", "Input", "descrol");
        $this->FInsertCommand->FParams->CreateAndAdd("@isanon", "bit", "Input", "isanon");
        $this->FDeleteCommand = new TDataCommand();
        $this->Commands()->Add($this->FDeleteCommand);
        $this->FDeleteCommand->SetSql("DELETE FROM t_rol WHERE idrol = @Original_idrol");
        $this->FDeleteCommand->SetConnection($this->FConnection);
        $this->FDeleteCommand->_construct($this);
        $this->FDeleteCommand->Type('Text');
        $this->FDeleteCommand->FParams->CreateAndAdd("@idrol", "int", "Input", "idrol");
        $this->FDeleteCommand->FParams->CreateAndAdd("@Original_idrol", "int", "Input", "idrol");
        $this->FDeleteCommand->FParams->CreateAndAdd("@namerol", "nvarchar", "Input", "namerol");
        $this->FDeleteCommand->FParams->CreateAndAdd("@typerol", "int", "Input", "typerol");
        $this->FDeleteCommand->FParams->CreateAndAdd("@descrol", "nvarchar", "Input", "descrol");
        $this->FDeleteCommand->FParams->CreateAndAdd("@isanon", "bit", "Input", "isanon");
        $this->FUpdateCommand = new TDataCommand();
        $this->Commands()->Add($this->FUpdateCommand);
        $this->FUpdateCommand->SetSql("UPDATE t_rol SET namerol='@namerol',typerol='@typerol',descrol='@descrol',isanon='@isanon' WHERE idrol = @Original_idrol");
        $this->FUpdateCommand->SetConnection($this->FConnection);
        $this->FUpdateCommand->_construct($this);
        $this->FUpdateCommand->Type('Text');
        $this->FUpdateCommand->FParams->CreateAndAdd("@idrol", "int", "Input", "idrol");
        $this->FUpdateCommand->FParams->CreateAndAdd("@Original_idrol", "int", "Input", "idrol");
        $this->FUpdateCommand->FParams->CreateAndAdd("@namerol", "nvarchar", "Input", "namerol");
        $this->FUpdateCommand->FParams->CreateAndAdd("@typerol", "int", "Input", "typerol");
        $this->FUpdateCommand->FParams->CreateAndAdd("@descrol", "nvarchar", "Input", "descrol");
        $this->FUpdateCommand->FParams->CreateAndAdd("@isanon", "bit", "Input", "isanon");
        $this->FFillByID = new TDataCommand();
        $this->OtherCommands()->Add($this->FFillByID);
        $this->FFillByID->SetSql(" SELECT idrol, namerol, typerol, descrol, isanon FROM t_rol WHERE idrol = '@param' OR namerol LIKE '%@param%' ");
        $this->FFillByID->SetConnection($this->FConnection);
        $this->FFillByID->_construct($this);
        $this->FFillByID->Type('Text');
        $this->FFillByID->FParams->CreateAndAdd("@param", "int", "Input", "param");
    }

    public function    Insert($namerol, $typerol, $descrol, $isanon)
    {
        $this->FInsertCommand->Parametres()->GetItem(0)->Value($namerol);
        $this->FInsertCommand->Parametres()->GetItem(1)->Value($typerol);
        $this->FInsertCommand->Parametres()->GetItem(2)->Value($descrol);
        $this->FInsertCommand->Parametres()->GetItem(3)->Value($isanon);
        $this->FInsertCommand->Execute();
    }

    public function    Delete($idrol, $Original_idrol, $namerol, $typerol, $descrol, $isanon)
    {
        $this->FDeleteCommand->Parametres()->GetItem(0)->Value($idrol);
        $this->FDeleteCommand->Parametres()->GetItem(1)->Value($Original_idrol);
        $this->FDeleteCommand->Parametres()->GetItem(2)->Value($namerol);
        $this->FDeleteCommand->Parametres()->GetItem(3)->Value($typerol);
        $this->FDeleteCommand->Parametres()->GetItem(4)->Value($descrol);
        $this->FDeleteCommand->Parametres()->GetItem(5)->Value($isanon);
        $this->FDeleteCommand->Execute();
    }

    public function    Update($idrol, $Original_idrol, $namerol, $typerol, $descrol, $isanon)
    {
        $this->FUpdateCommand->Parametres()->GetItem(0)->Value($idrol);
        $this->FUpdateCommand->Parametres()->GetItem(1)->Value($Original_idrol);
        $this->FUpdateCommand->Parametres()->GetItem(2)->Value($namerol);
        $this->FUpdateCommand->Parametres()->GetItem(3)->Value($typerol);
        $this->FUpdateCommand->Parametres()->GetItem(4)->Value($descrol);
        $this->FUpdateCommand->Parametres()->GetItem(5)->Value($isanon);
        $this->FUpdateCommand->Execute();
    }

    public function  FillByID($table, $param)
    {
        $this->FTable = $table;
        $this->FFillByID->Parametres()->GetItem(0)->Value($param);
        $this->FFillByID->Execute();
    }
}

class t_userTableAdapter extends TTableAdapter
{
    private $FFillByID;
    private $FAuthenticated;

    public function  __construct()
    {
        global $VisualWaysConnection;
        parent::__construct($VisualWaysConnection);
        $this->ClearFill(true);
        $this->FSelectCommand = new TDataCommand();
        $this->Commands()->Add($this->FSelectCommand);
        $this->FSelectCommand->SetSql(" SELECT iduser, nameuser, username, passworduser, pictureuser, idrol, email FROM t_user");
        $this->FSelectCommand->SetConnection($this->FConnection);
        $this->FSelectCommand->_construct($this);
        $this->FSelectCommand->Type('Text');
        $this->FInsertCommand = new TDataCommand();
        $this->Commands()->Add($this->FInsertCommand);
        $this->FInsertCommand->SetSql("INSERT INTO t_user(nameuser,username,passworduser,pictureuser,idrol,email) VALUES ('@nameuser','@username','@passworduser','@pictureuser','@idrol','@email')");
        $this->FInsertCommand->SetConnection($this->FConnection);
        $this->FInsertCommand->_construct($this);
        $this->FInsertCommand->Type('Text');
        $this->FInsertCommand->FParams->CreateAndAdd("@nameuser", "nvarchar", "Input", "nameuser");
        $this->FInsertCommand->FParams->CreateAndAdd("@username", "nvarchar", "Input", "username");
        $this->FInsertCommand->FParams->CreateAndAdd("@passworduser", "nvarchar", "Input", "passworduser");
        $this->FInsertCommand->FParams->CreateAndAdd("@pictureuser", "nvarchar", "Input", "pictureuser");
        $this->FInsertCommand->FParams->CreateAndAdd("@idrol", "int", "Input", "idrol");
        $this->FInsertCommand->FParams->CreateAndAdd("@email", "nvarchar", "Input", "email");
        $this->FDeleteCommand = new TDataCommand();
        $this->Commands()->Add($this->FDeleteCommand);
        $this->FDeleteCommand->SetSql("DELETE FROM t_user WHERE iduser = @Original_iduser");
        $this->FDeleteCommand->SetConnection($this->FConnection);
        $this->FDeleteCommand->_construct($this);
        $this->FDeleteCommand->Type('Text');
        $this->FDeleteCommand->FParams->CreateAndAdd("@Original_iduser", "int", "Input", "iduser");
        $this->FUpdateCommand = new TDataCommand();
        $this->Commands()->Add($this->FUpdateCommand);
        $this->FUpdateCommand->SetSql("UPDATE t_user SET nameuser='@nameuser',username='@username',passworduser='@passworduser',pictureuser='@pictureuser',idrol='@idrol',email='@email' WHERE iduser = @Original_iduser");
        $this->FUpdateCommand->SetConnection($this->FConnection);
        $this->FUpdateCommand->_construct($this);
        $this->FUpdateCommand->Type('Text');
        $this->FUpdateCommand->FParams->CreateAndAdd("@Original_iduser", "int", "Input", "iduser");
        $this->FUpdateCommand->FParams->CreateAndAdd("@nameuser", "nvarchar", "Input", "nameuser");
        $this->FUpdateCommand->FParams->CreateAndAdd("@username", "nvarchar", "Input", "username");
        $this->FUpdateCommand->FParams->CreateAndAdd("@passworduser", "nvarchar", "Input", "passworduser");
        $this->FUpdateCommand->FParams->CreateAndAdd("@pictureuser", "nvarchar", "Input", "pictureuser");
        $this->FUpdateCommand->FParams->CreateAndAdd("@idrol", "int", "Input", "idrol");
        $this->FUpdateCommand->FParams->CreateAndAdd("@iduser", "int", "Input", "iduser");
        $this->FUpdateCommand->FParams->CreateAndAdd("@email", "nvarchar", "Input", "email");
        $this->FFillByID = new TDataCommand();
        $this->OtherCommands()->Add($this->FFillByID);
        $this->FFillByID->SetSql(" SELECT iduser, nameuser, username, passworduser, pictureuser, idrol,email FROM t_user WHERE iduser = '@param' OR nameuser LIKE '%@param%'");
        $this->FFillByID->SetConnection($this->FConnection);
        $this->FFillByID->_construct($this);
        $this->FFillByID->Type('Text');
        $this->FFillByID->FParams->CreateAndAdd("@param", "int", "Input", "param");
        $this->FAuthenticated = new TDataCommand();
        $this->OtherCommands()->Add($this->FAuthenticated);
        $this->FAuthenticated->SetSql(" SELECT iduser, nameuser, username, passworduser, pictureuser, idrol,email  FROM t_user WHERE username = '@username' AND passworduser = '@passworduser' ");
        $this->FAuthenticated->SetConnection($this->FConnection);
        $this->FAuthenticated->_construct($this);
        $this->FAuthenticated->Type('Text');
        $this->FAuthenticated->FParams->CreateAndAdd("@username", "nvarchar", "Input", "username");
        $this->FAuthenticated->FParams->CreateAndAdd("@passworduser", "nvarchar", "Input", "passworduser");
    }

    public function    Insert($nameuser, $username, $passworduser, $pictureuser, $idrol, $email)
    {
        $this->FInsertCommand->Parametres()->GetItem(0)->Value($nameuser);
        $this->FInsertCommand->Parametres()->GetItem(1)->Value($username);
        $this->FInsertCommand->Parametres()->GetItem(2)->Value($passworduser);
        $this->FInsertCommand->Parametres()->GetItem(3)->Value($pictureuser);
        $this->FInsertCommand->Parametres()->GetItem(4)->Value($idrol);
        $this->FInsertCommand->Parametres()->GetItem(5)->Value($email);
        $this->FInsertCommand->Execute();
    }

    public function    Delete( $Original_iduser      )
    {

        $this->FDeleteCommand->Parametres()->GetItem(0)->Value($Original_iduser);
        $this->FDeleteCommand->Execute();
    }

    public function    Update( $Original_iduser, $nameuser, $username, $passworduser, $pictureuser, $idrol, $email)
    {

        $this->FUpdateCommand->Parametres()->GetItem(0)->Value($Original_iduser);
        $this->FUpdateCommand->Parametres()->GetItem(2)->Value($nameuser);
        $this->FUpdateCommand->Parametres()->GetItem(3)->Value($username);
        $this->FUpdateCommand->Parametres()->GetItem(4)->Value($passworduser);
        $this->FUpdateCommand->Parametres()->GetItem(5)->Value($pictureuser);
        $this->FUpdateCommand->Parametres()->GetItem(6)->Value($idrol);
        $this->FUpdateCommand->Parametres()->GetItem(7)->Value($email);
        $this->FUpdateCommand->Execute();
    }

    public function  FillByID($table, $param)
    {
        $this->FTable = $table;
        $this->FFillByID->Parametres()->GetItem(0)->Value($param);
        $this->FFillByID->Execute();
    }

    public function  Authenticated($table, $username, $passworduser)
    {
        $this->FTable = $table;
        $this->FAuthenticated->Parametres()->GetItem(0)->Value($username);
        $this->FAuthenticated->Parametres()->GetItem(1)->Value($passworduser);
        $this->FAuthenticated->Execute();
    }
}

class  DSDatos extends TDataSet
{
    private $Ft_rol;
    private $Ft_user;

    public function  __construct()
    {
        parent::__construct();
        $this->set_DataSetName("DSDatos");
        $this->set_Prefix("Prefix");
        $this->set_Namespace("http://tempuri.org/DSDatos.xsd");
        $this->set_Constraints(false);
        $this->Ft_rol = new t_rolDataTable();
        parent::Tables()->Add($this->Ft_rol);
        $this->Ft_user = new t_userDataTable();
        parent::Tables()->Add($this->Ft_user);
    }

    public function  t_rol()
    {
        return $this->Ft_rol;
    }

    public function  t_user()
    {
        return $this->Ft_user;
    }
}

?>