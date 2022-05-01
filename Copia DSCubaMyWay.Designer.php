<?php
$_SESSION['ide']->import('includes.DataSet.TDataSet');
$_SESSION['ide']->import('includes.DataSet.TTableAdapter');
define('CubaMyWayConnectionString', 'MySQL:localhost:3306:cubamyway:root:');
$CubaMyWayConnection = new TConnection();
$CubaMyWayConnection->Builder()->FromStr(CubaMyWayConnectionString);
class  t_commentRow extends TDataRow
{
    public function  __construct($table)
    {
        parent::_construct($table);
    }

    public function  idcomment($value = null)
    {
        if ($value == null) {
            return $this->GetItem('idcomment');
        } else {
            $this->SetItem('idcomment', $value);
        }
    }

    public function  iduser($value = null)
    {
        if ($value == null) {
            return $this->GetItem('iduser');
        } else {
            $this->SetItem('iduser', $value);
        }
    }

    public function  topiccomment($value = null)
    {
        if ($value == null) {
            return $this->GetItem('topiccomment');
        } else {
            $this->SetItem('topiccomment', $value);
        }
    }

    public function  textcomment($value = null)
    {
        if ($value == null) {
            return $this->GetItem('textcomment');
        } else {
            $this->SetItem('textcomment', $value);
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
    public function  pictureuser($value = null)
    {
        if ($value == null) {
            return $this->GetItem('pictureuser');
        } else {
            $this->SetItem('pictureuser', $value);
        }
    }
}

class  t_tripRow extends TDataRow
{
    public function  __construct($table)
    {
        parent::_construct($table);
    }

    public function  idtrip($value = null)
    {
        if ($value == null) {
            return $this->GetItem('idtrip');
        } else {
            $this->SetItem('idtrip', $value);
        }
    }

    public function  iduser($value = null)
    {
        if ($value == null) {
            return $this->GetItem('iduser');
        } else {
            $this->SetItem('iduser', $value);
        }
    }

    public function  nametrip($value = null)
    {
        if ($value == null) {
            return $this->GetItem('nametrip');
        } else {
            $this->SetItem('nametrip', $value);
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
}

class  t_tourpoloRow extends TDataRow
{
    public function  __construct($table)
    {
        parent::_construct($table);
    }

    public function  idtourpolo($value = null)
    {
        if ($value == null) {
            return $this->GetItem('idtourpolo');
        } else {
            $this->SetItem('idtourpolo', $value);
        }
    }

    public function  namepolo($value = null)
    {
        if ($value == null) {
            return $this->GetItem('namepolo');
        } else {
            $this->SetItem('namepolo', $value);
        }
    }

    public function  datapolo($value = null)
    {
        if ($value == null) {
            return $this->GetItem('datapolo');
        } else {
            $this->SetItem('datapolo', $value);
        }
    }

    public function  descpolo($value = null)
    {
        if ($value == null) {
            return $this->GetItem('descpolo');
        } else {
            $this->SetItem('descpolo', $value);
        }
    }
}

class  t_poloimagesRow extends TDataRow
{
    public function  __construct($table)
    {
        parent::_construct($table);
    }

    public function  idimage($value = null)
    {
        if ($value == null) {
            return $this->GetItem('idimage');
        } else {
            $this->SetItem('idimage', $value);
        }
    }

    public function  pathimage($value = null)
    {
        if ($value == null) {
            return $this->GetItem('pathimage');
        } else {
            $this->SetItem('pathimage', $value);
        }
    }

    public function  idtour($value = null)
    {
        if ($value == null) {
            return $this->GetItem('idtour');
        } else {
            $this->SetItem('idtour', $value);
        }
    }
}

class  t_messagesRow extends TDataRow
{
    public function  __construct($table)
    {
        parent::_construct($table);
    }

    public function  idmessages($value = null)
    {
        if ($value == null) {
            return $this->GetItem('idmessages');
        } else {
            $this->SetItem('idmessages', $value);
        }
    }

    public function  idoriguser($value = null)
    {
        if ($value == null) {
            return $this->GetItem('idoriguser');
        } else {
            $this->SetItem('idoriguser', $value);
        }
    }

    public function  iddestuser($value = null)
    {
        if ($value == null) {
            return $this->GetItem('iddestuser');
        } else {
            $this->SetItem('iddestuser', $value);
        }
    }

    public function  textmsg($value = null)
    {
        if ($value == null) {
            return $this->GetItem('textmsg');
        } else {
            $this->SetItem('textmsg', $value);
        }
    }

    public function  origuser($value = null)
    {
        if ($value == null) {
            return $this->GetItem('origuser');
        } else {
            $this->SetItem('origuser', $value);
        }
    }

    public function  destuser($value = null)
    {
        if ($value == null) {
            return $this->GetItem('destuser');
        } else {
            $this->SetItem('destuser', $value);
        }
    }

    public function  topicmsg($value = null)
    {
        if ($value == null) {
            return $this->GetItem('topicmsg');
        } else {
            $this->SetItem('topicmsg', $value);
        }
    }

    public function  statemsg($value = null)
    {
        if ($value == null) {
            return $this->GetItem('statemsg');
        } else {
            $this->SetItem('statemsg', $value);
        }
    }

    public function  datemsg($value = null)
    {
        if ($value == null) {
            return $this->GetItem('datemsg');
        } else {
            $this->SetItem('datemsg', $value);
        }
    }
    public function  origuserpic ($value = null)
    {
        if ($value == null) {
            return $this->GetItem('origuserpic');
        } else {
            $this->SetItem('origuserpic', $value);
        }
    }
    public function  destuserpic($value = null)
    {
        if ($value == null) {
            return $this->GetItem('destuserpic');
        } else {
            $this->SetItem('destuserpic', $value);
        }
    }
}

class  t_realtripRow extends TDataRow
{
    public function  __construct($table)
    {
        parent::_construct($table);
    }

    public function  idrealtrip($value = null)
    {
        if ($value == null) {
            return $this->GetItem('idrealtrip');
        } else {
            $this->SetItem('idrealtrip', $value);
        }
    }

    public function  idtrip($value = null)
    {
        if ($value == null) {
            return $this->GetItem('idtrip');
        } else {
            $this->SetItem('idtrip', $value);
        }
    }

    public function  iduser($value = null)
    {
        if ($value == null) {
            return $this->GetItem('iduser');
        } else {
            $this->SetItem('iduser', $value);
        }
    }

    public function  isclosed($value = null)
    {
        if ($value == null) {
            return $this->GetItem('isclosed');
        } else {
            $this->SetItem('isclosed', $value);
        }
    }

    public function  datetrip($value = null)
    {
        if ($value == null) {
            return $this->GetItem('datetrip');
        } else {
            $this->SetItem('datetrip', $value);
        }
    }

    public function  nametrip($value = null)
    {
        if ($value == null) {
            return $this->GetItem('nametrip');
        } else {
            $this->SetItem('nametrip', $value);
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
}

class  t_tripdesRow extends TDataRow
{
    public function  __construct($table)
    {
        parent::_construct($table);
    }

    public function  idtripdes($value = null)
    {
        if ($value == null) {
            return $this->GetItem('idtripdes');
        } else {
            $this->SetItem('idtripdes', $value);
        }
    }

    public function  idtrip($value = null)
    {
        if ($value == null) {
            return $this->GetItem('idtrip');
        } else {
            $this->SetItem('idtrip', $value);
        }
    }

    public function  idtourpolo($value = null)
    {
        if ($value == null) {
            return $this->GetItem('idtourpolo');
        } else {
            $this->SetItem('idtourpolo', $value);
        }
    }
}

class t_commentDataTable extends TDataTable
{
    private $columnidcomment;
    private $columniduser;
    private $columntopiccomment;
    private $columntextcomment;
    private $columnnameuser;
    private $columnusername;
    private $columnpictureuser;
    private function  InitClass()
    {
        $this->columnidcomment = new TDataColumn();
        $this->columnidcomment->TDataColumn3("idcomment", "", null, $this);
        $this->columnidcomment->AutoIncrement(True);
        $this->columnidcomment->AutoIncrementStep(1);
        $this->columnidcomment->AutoIncrementSeed(1);
        $this->columnidcomment->AllowDBNull(False);
        $this->columnidcomment->ReadOnly(False);
        $this->columnidcomment->Unique(True);
        $this->columnidcomment->MaxLength(-1);
        $this->columnidcomment->Caption("idcomment");
        $this->columnidcomment->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnidcomment);
        $this->columniduser = new TDataColumn();
        $this->columniduser->TDataColumn3("iduser", "", null, $this);
        $this->columniduser->AutoIncrement(False);
        $this->columniduser->AutoIncrementStep(0);
        $this->columniduser->AutoIncrementSeed(0);
        $this->columniduser->AllowDBNull(True);
        $this->columniduser->ReadOnly(False);
        $this->columniduser->Unique(False);
        $this->columniduser->MaxLength(-1);
        $this->columniduser->Caption("iduser");
        $this->columniduser->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columniduser);
        $this->columntopiccomment = new TDataColumn();
        $this->columntopiccomment->TDataColumn3("topiccomment", "", null, $this);
        $this->columntopiccomment->AutoIncrement(False);
        $this->columntopiccomment->AutoIncrementStep(0);
        $this->columntopiccomment->AutoIncrementSeed(0);
        $this->columntopiccomment->AllowDBNull(True);
        $this->columntopiccomment->ReadOnly(False);
        $this->columntopiccomment->Unique(False);
        $this->columntopiccomment->MaxLength(50);
        $this->columntopiccomment->Caption("topiccomment");
        $this->columntopiccomment->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columntopiccomment);
        $this->columntextcomment = new TDataColumn();
        $this->columntextcomment->TDataColumn3("textcomment", "", null, $this);
        $this->columntextcomment->AutoIncrement(False);
        $this->columntextcomment->AutoIncrementStep(0);
        $this->columntextcomment->AutoIncrementSeed(0);
        $this->columntextcomment->AllowDBNull(True);
        $this->columntextcomment->ReadOnly(False);
        $this->columntextcomment->Unique(False);
        $this->columntextcomment->MaxLength(65535);
        $this->columntextcomment->Caption("textcomment");
        $this->columntextcomment->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columntextcomment);
        $this->columnnameuser = new TDataColumn();
        $this->columnnameuser->TDataColumn3("nameuser", "", null, $this);
        $this->columnnameuser->AutoIncrement(False);
        $this->columnnameuser->AutoIncrementStep(0);
        $this->columnnameuser->AutoIncrementSeed(0);
        $this->columnnameuser->AllowDBNull(True);
        $this->columnnameuser->ReadOnly(False);
        $this->columnnameuser->Unique(False);
        $this->columnnameuser->MaxLength(50);
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
        $this->DefaultType('t_commentRow');
    }

    public function  __construct()
    {
        parent::__construct();
        $this->SetTableName("t_comment");
        parent::BeginInit();
        $this->InitClass();
        parent::EndInit();
    }

    public function  idcommentcolumn()
    {
        return $this->columnidcomment;
    }

    public function  idusercolumn()
    {
        return $this->columniduser;
    }

    public function  topiccommentcolumn()
    {
        return $this->columntopiccomment;
    }

    public function  textcommentcolumn()
    {
        return $this->columntextcomment;
    }

    public function  nameusercolumn()
    {
        return $this->columnnameuser;
    }

    public function  usernamecolumn()
    {
        return $this->columnusername;
    }

    public function  RemoveRow($row)
    {
        $this->Rows()->Remove($row);
    }

    public function  Addt_commentRow($iduser, $topiccomment, $textcomment, $nameuser, $username)
    {
        $row = new Row($this);
        $row->idcomment($this->Rows()->Count() + 1);
        $row->iduser($iduser);
        $row->topiccomment($topiccomment);
        $row->textcomment($textcomment);
        $row->nameuser($nameuser);
        $row->username($username);
        $this->Rows()->Add($row);
        return $row;
    }

    public function  NewRow()
    {
        return $this->Rows()->CreateRow();
    }

    public function  GetByidcomment($idcomment)
    {
        for ($i = 0;
             $i < $this->Count();
             $i++) {
            if ($this->Row($i)->idcomment() == $idcomment) {
                return $this->Row($i);
            }
        }
        return null;
    }
}

class t_tripDataTable extends TDataTable
{
    private $columnidtrip;
    private $columniduser;
    private $columnnametrip;
    private $columnnameuser;

    private function  InitClass()
    {
        $this->columnidtrip = new TDataColumn();
        $this->columnidtrip->TDataColumn3("idtrip", "", null, $this);
        $this->columnidtrip->AutoIncrement(True);
        $this->columnidtrip->AutoIncrementStep(1);
        $this->columnidtrip->AutoIncrementSeed(1);
        $this->columnidtrip->AllowDBNull(False);
        $this->columnidtrip->ReadOnly(False);
        $this->columnidtrip->Unique(True);
        $this->columnidtrip->MaxLength(-1);
        $this->columnidtrip->Caption("idtrip");
        $this->columnidtrip->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnidtrip);
        $this->columniduser = new TDataColumn();
        $this->columniduser->TDataColumn3("iduser", "", null, $this);
        $this->columniduser->AutoIncrement(False);
        $this->columniduser->AutoIncrementStep(0);
        $this->columniduser->AutoIncrementSeed(0);
        $this->columniduser->AllowDBNull(True);
        $this->columniduser->ReadOnly(False);
        $this->columniduser->Unique(False);
        $this->columniduser->MaxLength(-1);
        $this->columniduser->Caption("iduser");
        $this->columniduser->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columniduser);
        $this->columnnametrip = new TDataColumn();
        $this->columnnametrip->TDataColumn3("nametrip", "", null, $this);
        $this->columnnametrip->AutoIncrement(False);
        $this->columnnametrip->AutoIncrementStep(0);
        $this->columnnametrip->AutoIncrementSeed(0);
        $this->columnnametrip->AllowDBNull(True);
        $this->columnnametrip->ReadOnly(False);
        $this->columnnametrip->Unique(False);
        $this->columnnametrip->MaxLength(50);
        $this->columnnametrip->Caption("nametrip");
        $this->columnnametrip->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnnametrip);
        $this->columnnameuser = new TDataColumn();
        $this->columnnameuser->TDataColumn3("nameuser", "", null, $this);
        $this->columnnameuser->AutoIncrement(False);
        $this->columnnameuser->AutoIncrementStep(0);
        $this->columnnameuser->AutoIncrementSeed(0);
        $this->columnnameuser->AllowDBNull(True);
        $this->columnnameuser->ReadOnly(False);
        $this->columnnameuser->Unique(False);
        $this->columnnameuser->MaxLength(50);
        $this->columnnameuser->Caption("nameuser");
        $this->columnnameuser->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnnameuser);
        $this->DefaultType('t_tripRow');
    }

    public function  __construct()
    {
        parent::__construct();
        $this->SetTableName("t_trip");
        parent::BeginInit();
        $this->InitClass();
        parent::EndInit();
    }

    public function  idtripcolumn()
    {
        return $this->columnidtrip;
    }

    public function  idusercolumn()
    {
        return $this->columniduser;
    }

    public function  nametripcolumn()
    {
        return $this->columnnametrip;
    }

    public function  nameusercolumn()
    {
        return $this->columnnameuser;
    }

    public function  RemoveRow($row)
    {
        $this->Rows()->Remove($row);
    }

    public function  Addt_tripRow($iduser, $nametrip, $nameuser)
    {
        $row = new Row($this);
        $row->idtrip($this->Rows()->Count() + 1);
        $row->iduser($iduser);
        $row->nametrip($nametrip);
        $row->nameuser($nameuser);
        $this->Rows()->Add($row);
        return $row;
    }

    public function  NewRow()
    {
        return $this->Rows()->CreateRow();
    }

    public function  GetByidtrip($idtrip)
    {
        for ($i = 0;
             $i < $this->Count();
             $i++) {
            if ($this->Row($i)->idtrip() == $idtrip) {
                return $this->Row($i);
            }
        }
        return null;
    }
}

class t_tourpoloDataTable extends TDataTable
{
    private $columnidtourpolo;
    private $columnnamepolo;
    private $columndatapolo;
    private $columndescpolo;

    private function  InitClass()
    {
        $this->columnidtourpolo = new TDataColumn();
        $this->columnidtourpolo->TDataColumn3("idtourpolo", "", null, $this);
        $this->columnidtourpolo->AutoIncrement(True);
        $this->columnidtourpolo->AutoIncrementStep(1);
        $this->columnidtourpolo->AutoIncrementSeed(1);
        $this->columnidtourpolo->AllowDBNull(False);
        $this->columnidtourpolo->ReadOnly(False);
        $this->columnidtourpolo->Unique(True);
        $this->columnidtourpolo->MaxLength(-1);
        $this->columnidtourpolo->Caption("idtourpolo");
        $this->columnidtourpolo->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnidtourpolo);
        $this->columnnamepolo = new TDataColumn();
        $this->columnnamepolo->TDataColumn3("namepolo", "", null, $this);
        $this->columnnamepolo->AutoIncrement(False);
        $this->columnnamepolo->AutoIncrementStep(0);
        $this->columnnamepolo->AutoIncrementSeed(0);
        $this->columnnamepolo->AllowDBNull(True);
        $this->columnnamepolo->ReadOnly(False);
        $this->columnnamepolo->Unique(False);
        $this->columnnamepolo->MaxLength(50);
        $this->columnnamepolo->Caption("namepolo");
        $this->columnnamepolo->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnnamepolo);
        $this->columndatapolo = new TDataColumn();
        $this->columndatapolo->TDataColumn3("datapolo", "", null, $this);
        $this->columndatapolo->AutoIncrement(False);
        $this->columndatapolo->AutoIncrementStep(0);
        $this->columndatapolo->AutoIncrementSeed(0);
        $this->columndatapolo->AllowDBNull(True);
        $this->columndatapolo->ReadOnly(False);
        $this->columndatapolo->Unique(False);
        $this->columndatapolo->MaxLength(65535);
        $this->columndatapolo->Caption("datapolo");
        $this->columndatapolo->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columndatapolo);
        $this->columndescpolo = new TDataColumn();
        $this->columndescpolo->TDataColumn3("descpolo", "", null, $this);
        $this->columndescpolo->AutoIncrement(False);
        $this->columndescpolo->AutoIncrementStep(0);
        $this->columndescpolo->AutoIncrementSeed(0);
        $this->columndescpolo->AllowDBNull(True);
        $this->columndescpolo->ReadOnly(False);
        $this->columndescpolo->Unique(False);
        $this->columndescpolo->MaxLength(65535);
        $this->columndescpolo->Caption("descpolo");
        $this->columndescpolo->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columndescpolo);
        $this->DefaultType('t_tourpoloRow');
    }

    public function  __construct()
    {
        parent::__construct();
        $this->SetTableName("t_tourpolo");
        parent::BeginInit();
        $this->InitClass();
        parent::EndInit();
    }

    public function  idtourpolocolumn()
    {
        return $this->columnidtourpolo;
    }

    public function  namepolocolumn()
    {
        return $this->columnnamepolo;
    }

    public function  datapolocolumn()
    {
        return $this->columndatapolo;
    }

    public function  descpolocolumn()
    {
        return $this->columndescpolo;
    }

    public function  RemoveRow($row)
    {
        $this->Rows()->Remove($row);
    }

    public function  Addt_tourpoloRow($namepolo, $datapolo, $descpolo)
    {
        $row = new Row($this);
        $row->idtourpolo($this->Rows()->Count() + 1);
        $row->namepolo($namepolo);
        $row->datapolo($datapolo);
        $row->descpolo($descpolo);
        $this->Rows()->Add($row);
        return $row;
    }

    public function  NewRow()
    {
        return $this->Rows()->CreateRow();
    }

    public function  GetByidtourpolo($idtourpolo)
    {
        for ($i = 0;
             $i < $this->Count();
             $i++) {
            if ($this->Row($i)->idtourpolo() == $idtourpolo) {
                return $this->Row($i);
            }
        }
        return null;
    }
    public function GetData($imgs=false)
    {
        $res = "[ ";
        if($imgs)
            $t_poloimages = new t_poloimagesTableAdapter();
        for ($i = 0; $i < $this->Rows()->Count(); $i++) {
            $t = $this->Row($i);
            $res .= "{ latLng:" . $t->datapolo() . ",name:" . "'" . $t->namepolo() . "'" . ",item:" . "'" . $t->idtourpolo() . "'" ;

            if($imgs)
            {
             $res.= ",imgs : [";


             $t_poloimages->FillBy($this->DataSet()->t_poloimages(),$t->idtourpolo());
             for($k=0;$k<$this->DataSet()->t_poloimages()->Count();$k++)
             {

                 $res.=      '"'.        $this->DataSet()->t_poloimages()->Row($k)->pathimage().'"';
                 if ($k < $this->DataSet()->t_poloimages()->Count() - 1)
                     $res .= ",";
             }
                $res.=" ]";
            }

            $res.= " }";
            if ($i < $this->Rows()->Count() - 1)
                $res .= ",";
        }
        $res .= "]";
        return $res;
    }
}

class t_poloimagesDataTable extends TDataTable
{
    private $columnidimage;
    private $columnpathimage;
    private $columnidtour;

    private function  InitClass()
    {
        $this->columnidimage = new TDataColumn();
        $this->columnidimage->TDataColumn3("idimage", "", null, $this);
        $this->columnidimage->AutoIncrement(True);
        $this->columnidimage->AutoIncrementStep(1);
        $this->columnidimage->AutoIncrementSeed(1);
        $this->columnidimage->AllowDBNull(False);
        $this->columnidimage->ReadOnly(False);
        $this->columnidimage->Unique(True);
        $this->columnidimage->MaxLength(-1);
        $this->columnidimage->Caption("idimage");
        $this->columnidimage->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnidimage);
        $this->columnpathimage = new TDataColumn();
        $this->columnpathimage->TDataColumn3("pathimage", "", null, $this);
        $this->columnpathimage->AutoIncrement(False);
        $this->columnpathimage->AutoIncrementStep(0);
        $this->columnpathimage->AutoIncrementSeed(0);
        $this->columnpathimage->AllowDBNull(True);
        $this->columnpathimage->ReadOnly(False);
        $this->columnpathimage->Unique(False);
        $this->columnpathimage->MaxLength(255);
        $this->columnpathimage->Caption("pathimage");
        $this->columnpathimage->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnpathimage);
        $this->columnidtour = new TDataColumn();
        $this->columnidtour->TDataColumn3("idtour", "", null, $this);
        $this->columnidtour->AutoIncrement(False);
        $this->columnidtour->AutoIncrementStep(0);
        $this->columnidtour->AutoIncrementSeed(0);
        $this->columnidtour->AllowDBNull(True);
        $this->columnidtour->ReadOnly(False);
        $this->columnidtour->Unique(False);
        $this->columnidtour->MaxLength(-1);
        $this->columnidtour->Caption("idtour");
        $this->columnidtour->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnidtour);
        $this->DefaultType('t_poloimagesRow');
    }

    public function  __construct()
    {
        parent::__construct();
        $this->SetTableName("t_poloimages");
        parent::BeginInit();
        $this->InitClass();
        parent::EndInit();
    }

    public function  idimagecolumn()
    {
        return $this->columnidimage;
    }

    public function  pathimagecolumn()
    {
        return $this->columnpathimage;
    }

    public function  idtourcolumn()
    {
        return $this->columnidtour;
    }

    public function  RemoveRow($row)
    {
        $this->Rows()->Remove($row);
    }

    public function  Addt_poloimagesRow($pathimage, $idtour)
    {
        $row = new Row($this);
        $row->idimage($this->Rows()->Count() + 1);
        $row->pathimage($pathimage);
        $row->idtour($idtour);
        $this->Rows()->Add($row);
        return $row;
    }

    public function  NewRow()
    {
        return $this->Rows()->CreateRow();
    }

    public function  GetByidimage($idimage)
    {
        for ($i = 0;
             $i < $this->Count();
             $i++) {
            if ($this->Row($i)->idimage() == $idimage) {
                return $this->Row($i);
            }
        }
        return null;
    }
}

class t_messagesDataTable extends TDataTable
{
    private $columnidmessages;
    private $columnidoriguser;
    private $columniddestuser;
    private $columntextmsg;
    private $columnoriguser;
    private $columndestuser;
    private $columntopicmsg;
    private $columnstatemsg;
    private $columndatemsg;
    private $columnoriguserpic;
    private $columndestuserpic;

    private function  InitClass()
    {
        $this->columnidmessages = new TDataColumn();
        $this->columnidmessages->TDataColumn3("idmessages", "", null, $this);
        $this->columnidmessages->AutoIncrement(True);
        $this->columnidmessages->AutoIncrementStep(1);
        $this->columnidmessages->AutoIncrementSeed(1);
        $this->columnidmessages->AllowDBNull(False);
        $this->columnidmessages->ReadOnly(False);
        $this->columnidmessages->Unique(True);
        $this->columnidmessages->MaxLength(-1);
        $this->columnidmessages->Caption("idmessages");
        $this->columnidmessages->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnidmessages);
        $this->columnidoriguser = new TDataColumn();
        $this->columnidoriguser->TDataColumn3("idoriguser", "", null, $this);
        $this->columnidoriguser->AutoIncrement(False);
        $this->columnidoriguser->AutoIncrementStep(0);
        $this->columnidoriguser->AutoIncrementSeed(0);
        $this->columnidoriguser->AllowDBNull(True);
        $this->columnidoriguser->ReadOnly(False);
        $this->columnidoriguser->Unique(False);
        $this->columnidoriguser->MaxLength(-1);
        $this->columnidoriguser->Caption("idoriguser");
        $this->columnidoriguser->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnidoriguser);
        $this->columniddestuser = new TDataColumn();
        $this->columniddestuser->TDataColumn3("iddestuser", "", null, $this);
        $this->columniddestuser->AutoIncrement(False);
        $this->columniddestuser->AutoIncrementStep(0);
        $this->columniddestuser->AutoIncrementSeed(0);
        $this->columniddestuser->AllowDBNull(True);
        $this->columniddestuser->ReadOnly(False);
        $this->columniddestuser->Unique(False);
        $this->columniddestuser->MaxLength(-1);
        $this->columniddestuser->Caption("iddestuser");
        $this->columniddestuser->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columniddestuser);
        $this->columntextmsg = new TDataColumn();
        $this->columntextmsg->TDataColumn3("textmsg", "", null, $this);
        $this->columntextmsg->AutoIncrement(False);
        $this->columntextmsg->AutoIncrementStep(0);
        $this->columntextmsg->AutoIncrementSeed(0);
        $this->columntextmsg->AllowDBNull(True);
        $this->columntextmsg->ReadOnly(False);
        $this->columntextmsg->Unique(False);
        $this->columntextmsg->MaxLength(65535);
        $this->columntextmsg->Caption("textmsg");
        $this->columntextmsg->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columntextmsg);
        $this->columnoriguser = new TDataColumn();
        $this->columnoriguser->TDataColumn3("origuser", "", null, $this);
        $this->columnoriguser->AutoIncrement(False);
        $this->columnoriguser->AutoIncrementStep(0);
        $this->columnoriguser->AutoIncrementSeed(0);
        $this->columnoriguser->AllowDBNull(True);
        $this->columnoriguser->ReadOnly(False);
        $this->columnoriguser->Unique(False);
        $this->columnoriguser->MaxLength(50);
        $this->columnoriguser->Caption("origuser");
        $this->columnoriguser->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnoriguser);
        $this->columndestuser = new TDataColumn();
        $this->columndestuser->TDataColumn3("destuser", "", null, $this);
        $this->columndestuser->AutoIncrement(False);
        $this->columndestuser->AutoIncrementStep(0);
        $this->columndestuser->AutoIncrementSeed(0);
        $this->columndestuser->AllowDBNull(True);
        $this->columndestuser->ReadOnly(False);
        $this->columndestuser->Unique(False);
        $this->columndestuser->MaxLength(50);
        $this->columndestuser->Caption("destuser");
        $this->columndestuser->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columndestuser);
        $this->columntopicmsg = new TDataColumn();
        $this->columntopicmsg->TDataColumn3("topicmsg", "", null, $this);
        $this->columntopicmsg->AutoIncrement(False);
        $this->columntopicmsg->AutoIncrementStep(1);
        $this->columntopicmsg->AutoIncrementSeed(0);
        $this->columntopicmsg->AllowDBNull(True);
        $this->columntopicmsg->ReadOnly(False);
        $this->columntopicmsg->Unique(False);
        $this->columntopicmsg->MaxLength(-1);
        $this->columntopicmsg->Caption("topicmsg");
        $this->columntopicmsg->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columntopicmsg);
        $this->columnstatemsg = new TDataColumn();
        $this->columnstatemsg->TDataColumn3("statemsg", "", null, $this);
        $this->columnstatemsg->AutoIncrement(False);
        $this->columnstatemsg->AutoIncrementStep(1);
        $this->columnstatemsg->AutoIncrementSeed(0);
        $this->columnstatemsg->AllowDBNull(True);
        $this->columnstatemsg->ReadOnly(False);
        $this->columnstatemsg->Unique(False);
        $this->columnstatemsg->MaxLength(-1);
        $this->columnstatemsg->Caption("statemsg");
        $this->columnstatemsg->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnstatemsg);
        $this->columndatemsg = new TDataColumn();
        $this->columndatemsg->TDataColumn3("datemsg", "", null, $this);
        $this->columndatemsg->AutoIncrement(False);
        $this->columndatemsg->AutoIncrementStep(1);
        $this->columndatemsg->AutoIncrementSeed(0);
        $this->columndatemsg->AllowDBNull(True);
        $this->columndatemsg->ReadOnly(False);
        $this->columndatemsg->Unique(False);
        $this->columndatemsg->MaxLength(-1);
        $this->columndatemsg->Caption("datemsg");
        $this->columndatemsg->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columndatemsg);
        $this->columnoriguserpic = new TDataColumn();
        $this->columnoriguserpic->TDataColumn3("origuserpic", "", null, $this);
        $this->columnoriguserpic->AutoIncrement(False);
        $this->columnoriguserpic->AutoIncrementStep(0);
        $this->columnoriguserpic->AutoIncrementSeed(0);
        $this->columnoriguserpic->AllowDBNull(True);
        $this->columnoriguserpic->ReadOnly(False);
        $this->columnoriguserpic->Unique(False);
        $this->columnoriguserpic->MaxLength(255);
        $this->columnoriguserpic->Caption("origuserpic");
        $this->columnoriguserpic->DefaultValue('user.png');
        $this->Columns()->Add($this->columnoriguserpic);
        $this->columndestuserpic = new TDataColumn();
        $this->columndestuserpic->TDataColumn3("destuserpic", "", null, $this);
        $this->columndestuserpic->AutoIncrement(False);
        $this->columndestuserpic->AutoIncrementStep(0);
        $this->columndestuserpic->AutoIncrementSeed(0);
        $this->columndestuserpic->AllowDBNull(True);
        $this->columndestuserpic->ReadOnly(False);
        $this->columndestuserpic->Unique(False);
        $this->columndestuserpic->MaxLength(255);
        $this->columndestuserpic->Caption("destuserpic");
        $this->columndestuserpic->DefaultValue('user.png');
        $this->Columns()->Add($this->columndestuserpic);
        $this->DefaultType('t_messagesRow');
    }

    public function  __construct()
    {
        parent::__construct();
        $this->SetTableName("t_messages");
        parent::BeginInit();
        $this->InitClass();
        parent::EndInit();
    }

    public function  idmessagescolumn()
    {
        return $this->columnidmessages;
    }

    public function  idorigusercolumn()
    {
        return $this->columnidoriguser;
    }

    public function  iddestusercolumn()
    {
        return $this->columniddestuser;
    }

    public function  textmsgcolumn()
    {
        return $this->columntextmsg;
    }

    public function  origusercolumn()
    {
        return $this->columnoriguser;
    }

    public function  destusercolumn()
    {
        return $this->columndestuser;
    }

    public function  topicmsgcolumn()
    {
        return $this->columntopicmsg;
    }

    public function  statemsgcolumn()
    {
        return $this->columnstatemsg;
    }

    public function  datemsgcolumn()
    {
        return $this->columndatemsg;
    }

    public function  RemoveRow($row)
    {
        $this->Rows()->Remove($row);
    }

    public function  Addt_messagesRow($idoriguser, $iddestuser, $textmsg, $origuser, $destuser, $topicmsg, $statemsg, $datemsg)
    {
        $row = new Row($this);
        $row->idmessages($this->Rows()->Count() + 1);
        $row->idoriguser($idoriguser);
        $row->iddestuser($iddestuser);
        $row->textmsg($textmsg);
        $row->origuser($origuser);
        $row->destuser($destuser);
        $row->topicmsg($topicmsg);
        $row->statemsg($statemsg);
        $row->datemsg($datemsg);
        $this->Rows()->Add($row);
        return $row;
    }

    public function  NewRow()
    {
        return $this->Rows()->CreateRow();
    }

    public function  GetByidmessages($idmessages)
    {
        for ($i = 0;
             $i < $this->Count();
             $i++) {
            if ($this->Row($i)->idmessages() == $idmessages) {
                return $this->Row($i);
            }
        }
        return null;
    }
}

class t_realtripDataTable extends TDataTable
{
    private $columnidrealtrip;
    private $columnidtrip;
    private $columniduser;
    private $columnisclosed;
    private $columndatetrip;
    private $columnnametrip;
    private $columnnameuser;

    private function  InitClass()
    {
        $this->columnidrealtrip = new TDataColumn();
        $this->columnidrealtrip->TDataColumn3("idrealtrip", "", null, $this);
        $this->columnidrealtrip->AutoIncrement(True);
        $this->columnidrealtrip->AutoIncrementStep(1);
        $this->columnidrealtrip->AutoIncrementSeed(1);
        $this->columnidrealtrip->AllowDBNull(False);
        $this->columnidrealtrip->ReadOnly(False);
        $this->columnidrealtrip->Unique(True);
        $this->columnidrealtrip->MaxLength(-1);
        $this->columnidrealtrip->Caption("idrealtrip");
        $this->columnidrealtrip->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnidrealtrip);
        $this->columnidtrip = new TDataColumn();
        $this->columnidtrip->TDataColumn3("idtrip", "", null, $this);
        $this->columnidtrip->AutoIncrement(False);
        $this->columnidtrip->AutoIncrementStep(0);
        $this->columnidtrip->AutoIncrementSeed(0);
        $this->columnidtrip->AllowDBNull(True);
        $this->columnidtrip->ReadOnly(False);
        $this->columnidtrip->Unique(False);
        $this->columnidtrip->MaxLength(-1);
        $this->columnidtrip->Caption("idtrip");
        $this->columnidtrip->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnidtrip);
        $this->columniduser = new TDataColumn();
        $this->columniduser->TDataColumn3("iduser", "", null, $this);
        $this->columniduser->AutoIncrement(False);
        $this->columniduser->AutoIncrementStep(0);
        $this->columniduser->AutoIncrementSeed(0);
        $this->columniduser->AllowDBNull(True);
        $this->columniduser->ReadOnly(False);
        $this->columniduser->Unique(False);
        $this->columniduser->MaxLength(-1);
        $this->columniduser->Caption("iduser");
        $this->columniduser->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columniduser);
        $this->columnisclosed = new TDataColumn();
        $this->columnisclosed->TDataColumn3("isclosed", "", null, $this);
        $this->columnisclosed->AutoIncrement(False);
        $this->columnisclosed->AutoIncrementStep(0);
        $this->columnisclosed->AutoIncrementSeed(0);
        $this->columnisclosed->AllowDBNull(True);
        $this->columnisclosed->ReadOnly(False);
        $this->columnisclosed->Unique(False);
        $this->columnisclosed->MaxLength(-1);
        $this->columnisclosed->Caption("isclosed");
        $this->columnisclosed->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnisclosed);
        $this->columndatetrip = new TDataColumn();
        $this->columndatetrip->TDataColumn3("datetrip", "", null, $this);
        $this->columndatetrip->AutoIncrement(False);
        $this->columndatetrip->AutoIncrementStep(0);
        $this->columndatetrip->AutoIncrementSeed(0);
        $this->columndatetrip->AllowDBNull(True);
        $this->columndatetrip->ReadOnly(False);
        $this->columndatetrip->Unique(False);
        $this->columndatetrip->MaxLength(-1);
        $this->columndatetrip->Caption("datetrip");
        $this->columndatetrip->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columndatetrip);
        $this->columnnametrip = new TDataColumn();
        $this->columnnametrip->TDataColumn3("nametrip", "", null, $this);
        $this->columnnametrip->AutoIncrement(False);
        $this->columnnametrip->AutoIncrementStep(0);
        $this->columnnametrip->AutoIncrementSeed(0);
        $this->columnnametrip->AllowDBNull(True);
        $this->columnnametrip->ReadOnly(False);
        $this->columnnametrip->Unique(False);
        $this->columnnametrip->MaxLength(50);
        $this->columnnametrip->Caption("nametrip");
        $this->columnnametrip->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnnametrip);
        $this->columnnameuser = new TDataColumn();
        $this->columnnameuser->TDataColumn3("nameuser", "", null, $this);
        $this->columnnameuser->AutoIncrement(False);
        $this->columnnameuser->AutoIncrementStep(0);
        $this->columnnameuser->AutoIncrementSeed(0);
        $this->columnnameuser->AllowDBNull(True);
        $this->columnnameuser->ReadOnly(False);
        $this->columnnameuser->Unique(False);
        $this->columnnameuser->MaxLength(50);
        $this->columnnameuser->Caption("nameuser");
        $this->columnnameuser->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnnameuser);
        $this->DefaultType('t_realtripRow');
    }

    public function  __construct()
    {
        parent::__construct();
        $this->SetTableName("t_realtrip");
        parent::BeginInit();
        $this->InitClass();
        parent::EndInit();
    }

    public function  idrealtripcolumn()
    {
        return $this->columnidrealtrip;
    }

    public function  idtripcolumn()
    {
        return $this->columnidtrip;
    }

    public function  idusercolumn()
    {
        return $this->columniduser;
    }

    public function  isclosedcolumn()
    {
        return $this->columnisclosed;
    }

    public function  datetripcolumn()
    {
        return $this->columndatetrip;
    }

    public function  nametripcolumn()
    {
        return $this->columnnametrip;
    }

    public function  nameusercolumn()
    {
        return $this->columnnameuser;
    }

    public function  RemoveRow($row)
    {
        $this->Rows()->Remove($row);
    }

    public function  Addt_realtripRow($idtrip, $iduser, $isclosed, $datetrip, $nametrip, $nameuser)
    {
        $row = new Row($this);
        $row->idrealtrip($this->Rows()->Count() + 1);
        $row->idtrip($idtrip);
        $row->iduser($iduser);
        $row->isclosed($isclosed);
        $row->datetrip($datetrip);
        $row->nametrip($nametrip);
        $row->nameuser($nameuser);
        $this->Rows()->Add($row);
        return $row;
    }

    public function  NewRow()
    {
        return $this->Rows()->CreateRow();
    }

    public function  GetByidrealtrip($idrealtrip)
    {
        for ($i = 0;
             $i < $this->Count();
             $i++) {
            if ($this->Row($i)->idrealtrip() == $idrealtrip) {
                return $this->Row($i);
            }
        }
        return null;
    }
}

class t_tripdesDataTable extends TDataTable
{
    private $columnidtripdes;
    private $columnidtrip;
    private $columnidtourpolo;

    private function  InitClass()
    {
        $this->columnidtripdes = new TDataColumn();
        $this->columnidtripdes->TDataColumn3("idtripdes", "", null, $this);
        $this->columnidtripdes->AutoIncrement(True);
        $this->columnidtripdes->AutoIncrementStep(1);
        $this->columnidtripdes->AutoIncrementSeed(1);
        $this->columnidtripdes->AllowDBNull(False);
        $this->columnidtripdes->ReadOnly(False);
        $this->columnidtripdes->Unique(True);
        $this->columnidtripdes->MaxLength(-1);
        $this->columnidtripdes->Caption("idtripdes");
        $this->columnidtripdes->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnidtripdes);
        $this->columnidtrip = new TDataColumn();
        $this->columnidtrip->TDataColumn3("idtrip", "", null, $this);
        $this->columnidtrip->AutoIncrement(False);
        $this->columnidtrip->AutoIncrementStep(0);
        $this->columnidtrip->AutoIncrementSeed(0);
        $this->columnidtrip->AllowDBNull(True);
        $this->columnidtrip->ReadOnly(False);
        $this->columnidtrip->Unique(False);
        $this->columnidtrip->MaxLength(-1);
        $this->columnidtrip->Caption("idtrip");
        $this->columnidtrip->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnidtrip);
        $this->columnidtourpolo = new TDataColumn();
        $this->columnidtourpolo->TDataColumn3("idtourpolo", "", null, $this);
        $this->columnidtourpolo->AutoIncrement(False);
        $this->columnidtourpolo->AutoIncrementStep(0);
        $this->columnidtourpolo->AutoIncrementSeed(0);
        $this->columnidtourpolo->AllowDBNull(True);
        $this->columnidtourpolo->ReadOnly(False);
        $this->columnidtourpolo->Unique(False);
        $this->columnidtourpolo->MaxLength(-1);
        $this->columnidtourpolo->Caption("idtourpolo");
        $this->columnidtourpolo->DefaultValue('<DBNull>');
        $this->Columns()->Add($this->columnidtourpolo);
        $this->DefaultType('t_tripdesRow');
    }

    public function  __construct()
    {
        parent::__construct();
        $this->SetTableName("t_tripdes");
        parent::BeginInit();
        $this->InitClass();
        parent::EndInit();
    }

    public function  idtripdescolumn()
    {
        return $this->columnidtripdes;
    }

    public function  idtripcolumn()
    {
        return $this->columnidtrip;
    }

    public function  idtourpolocolumn()
    {
        return $this->columnidtourpolo;
    }

    public function  RemoveRow($row)
    {
        $this->Rows()->Remove($row);
    }

    public function  Addt_tripdesRow($idtrip, $idtourpolo)
    {
        $row = new Row($this);
        $row->idtripdes($this->Rows()->Count() + 1);
        $row->idtrip($idtrip);
        $row->idtourpolo($idtourpolo);
        $this->Rows()->Add($row);
        return $row;
    }

    public function  NewRow()
    {
        return $this->Rows()->CreateRow();
    }

    public function  GetByidtripdes($idtripdes)
    {
        for ($i = 0;
             $i < $this->Count();
             $i++) {
            if ($this->Row($i)->idtripdes() == $idtripdes) {
                return $this->Row($i);
            }
        }
        return null;
    }
    public function GetData()
    {
        $s = new TList();
        for($i=0;$i<$this->Count();$i++)
            $s->Add(  $this->Row($i)->idtourpolo());
        return json_encode($s->AsArray());
    }
}

class t_commentTableAdapter extends TTableAdapter
{
    private $FFillByID;

    public function  __construct()
    {
        global $CubaMyWayConnection;
        parent::__construct($CubaMyWayConnection);
        $this->ClearFill(true);
        $this->FSelectCommand = new TDataCommand();
        $this->Commands()->Add($this->FSelectCommand);
        $this->FSelectCommand->SetSql("SELECT idcomment,iduser,topiccomment,textcomment FROM t_comment");
        $this->FSelectCommand->SetConnection($this->FConnection);
        $this->FSelectCommand->_construct($this);
        $this->FSelectCommand->Type('Text');
        $this->FInsertCommand = new TDataCommand();
        $this->Commands()->Add($this->FInsertCommand);
        $this->FInsertCommand->SetSql("INSERT INTO t_comment(iduser,topiccomment,textcomment) VALUES ('@iduser','@topiccomment','@textcomment')");
        $this->FInsertCommand->SetConnection($this->FConnection);
        $this->FInsertCommand->_construct($this);
        $this->FInsertCommand->Type('Text');
        $this->FInsertCommand->FParams->CreateAndAdd("@iduser", "int", "Input", "iduser");
        $this->FInsertCommand->FParams->CreateAndAdd("@topiccomment", "nvarchar", "Input", "topiccomment");
        $this->FInsertCommand->FParams->CreateAndAdd("@textcomment", "nvarchar", "Input", "textcomment");
        $this->FDeleteCommand = new TDataCommand();
        $this->Commands()->Add($this->FDeleteCommand);
        $this->FDeleteCommand->SetSql("DELETE FROM t_comment WHERE idcomment = '@Original_idcomment'");
        $this->FDeleteCommand->SetConnection($this->FConnection);
        $this->FDeleteCommand->_construct($this);
        $this->FDeleteCommand->Type('Text');
        $this->FDeleteCommand->FParams->CreateAndAdd("@Original_idcomment", "int", "Input", "idcomment");
        $this->FUpdateCommand = new TDataCommand();
        $this->Commands()->Add($this->FUpdateCommand);
        $this->FUpdateCommand->SetSql("UPDATE t_comment SET iduser='@iduser',topiccomment='@topiccomment',textcomment='@textcomment' WHERE idcomment = '@Original_idcomment'");
        $this->FUpdateCommand->SetConnection($this->FConnection);
        $this->FUpdateCommand->_construct($this);
        $this->FUpdateCommand->Type('Text');
        $this->FUpdateCommand->FParams->CreateAndAdd("@idcomment", "int", "Input", "idcomment");
        $this->FUpdateCommand->FParams->CreateAndAdd("@Original_idcomment", "int", "Input", "idcomment");
        $this->FUpdateCommand->FParams->CreateAndAdd("@iduser", "int", "Input", "iduser");
        $this->FUpdateCommand->FParams->CreateAndAdd("@topiccomment", "nvarchar", "Input", "topiccomment");
        $this->FUpdateCommand->FParams->CreateAndAdd("@textcomment", "nvarchar", "Input", "textcomment");
        $this->FFillByID = new TDataCommand();
        $this->OtherCommands()->Add($this->FFillByID);
        $this->FFillByID->SetSql(" SELECT t_comment.idcomment, t_comment.iduser, t_comment.topiccomment, t_comment.textcomment, t_user.nameuser, t_user.username,t_user.pictureuser FROM t_comment INNER JOIN t_user ON t_user.iduser = t_comment.iduser WHERE t_comment.idcomment = '@param' OR topiccomment LIKE '%@param%' OR '@param'='-1' ");
        $this->FFillByID->SetConnection($this->FConnection);
        $this->FFillByID->_construct($this);
        $this->FFillByID->Type('Text');
        $this->FFillByID->FParams->CreateAndAdd("@param", "int", "Input", "param");
    }

    public function    Insert($iduser, $topiccomment, $textcomment)
    {
        $this->FInsertCommand->Parametres()->GetItem(0)->Value($iduser);
        $this->FInsertCommand->Parametres()->GetItem(1)->Value($topiccomment);
        $this->FInsertCommand->Parametres()->GetItem(2)->Value($textcomment);
        $this->FInsertCommand->Execute();
    }

    public function    Delete($Original_idcomment)
    {
        $this->FDeleteCommand->Parametres()->GetItem(0)->Value($Original_idcomment);
        $this->FDeleteCommand->Execute();
    }

    public function    Update($idcomment, $Original_idcomment, $iduser, $topiccomment, $textcomment)
    {
        $this->FUpdateCommand->Parametres()->GetItem(0)->Value($idcomment);
        $this->FUpdateCommand->Parametres()->GetItem(1)->Value($Original_idcomment);
        $this->FUpdateCommand->Parametres()->GetItem(2)->Value($iduser);
        $this->FUpdateCommand->Parametres()->GetItem(3)->Value($topiccomment);
        $this->FUpdateCommand->Parametres()->GetItem(4)->Value($textcomment);
        $this->FUpdateCommand->Execute();
    }

    public function  FillByID($table, $param)
    {
        $this->FTable = $table;
        $this->FFillByID->Parametres()->GetItem(0)->Value($param);
        $this->FFillByID->Execute();
    }
}

class t_tripTableAdapter extends TTableAdapter
{
    private $FFillByID;

    public function  __construct()
    {
        global $CubaMyWayConnection;
        parent::__construct($CubaMyWayConnection);
        $this->ClearFill(true);
        $this->FSelectCommand = new TDataCommand();
        $this->Commands()->Add($this->FSelectCommand);
        $this->FSelectCommand->SetSql("SELECT idtrip,iduser,nametrip FROM t_trip");
        $this->FSelectCommand->SetConnection($this->FConnection);
        $this->FSelectCommand->_construct($this);
        $this->FSelectCommand->Type('Text');
        $this->FInsertCommand = new TDataCommand();
        $this->Commands()->Add($this->FInsertCommand);
        $this->FInsertCommand->SetSql("INSERT INTO t_trip(iduser,nametrip) VALUES ('@iduser','@nametrip')");
        $this->FInsertCommand->SetConnection($this->FConnection);
        $this->FInsertCommand->_construct($this);
        $this->FInsertCommand->Type('Text');
        $this->FInsertCommand->FParams->CreateAndAdd("@iduser", "int", "Input", "iduser");
        $this->FInsertCommand->FParams->CreateAndAdd("@nametrip", "nvarchar", "Input", "nametrip");
        $this->FDeleteCommand = new TDataCommand();
        $this->Commands()->Add($this->FDeleteCommand);
        $this->FDeleteCommand->SetSql("DELETE FROM t_trip WHERE idtrip = '@Original_idtrip'");
        $this->FDeleteCommand->SetConnection($this->FConnection);
        $this->FDeleteCommand->_construct($this);
        $this->FDeleteCommand->Type('Text');
        $this->FDeleteCommand->FParams->CreateAndAdd("@Original_idtrip", "int", "Input", "idtrip");
        $this->FUpdateCommand = new TDataCommand();
        $this->Commands()->Add($this->FUpdateCommand);
        $this->FUpdateCommand->SetSql("UPDATE t_trip SET iduser='@iduser',nametrip='@nametrip' WHERE idtrip = '@Original_idtrip'");
        $this->FUpdateCommand->SetConnection($this->FConnection);
        $this->FUpdateCommand->_construct($this);
        $this->FUpdateCommand->Type('Text');
        $this->FUpdateCommand->FParams->CreateAndAdd("@idtrip", "int", "Input", "idtrip");
        $this->FUpdateCommand->FParams->CreateAndAdd("@Original_idtrip", "int", "Input", "idtrip");
        $this->FUpdateCommand->FParams->CreateAndAdd("@iduser", "int", "Input", "iduser");
        $this->FUpdateCommand->FParams->CreateAndAdd("@nametrip", "nvarchar", "Input", "nametrip");
        $this->FFillByID = new TDataCommand();
        $this->OtherCommands()->Add($this->FFillByID);
        $this->FFillByID->SetSql(" SELECT t_trip.idtrip, t_trip.iduser, t_trip.nametrip, t_user.nameuser FROM t_trip INNER JOIN t_user ON t_user.iduser = t_trip.iduser WHERE idtrip = '@param' or nametrip LIKE '%@param%' or '@param' = '-1' ");
        $this->FFillByID->SetConnection($this->FConnection);
        $this->FFillByID->_construct($this);
        $this->FFillByID->Type('Text');
        $this->FFillByID->FParams->CreateAndAdd("@param", "int", "Input", "param");
    }

    public function    Insert($iduser, $nametrip)
    {
        $this->FInsertCommand->Parametres()->GetItem(0)->Value($iduser);
        $this->FInsertCommand->Parametres()->GetItem(1)->Value($nametrip);
        $this->FInsertCommand->Execute();
    }

    public function    Delete($Original_idtrip)
    {
        $this->FDeleteCommand->Parametres()->GetItem(0)->Value($Original_idtrip);
        $this->FDeleteCommand->Execute();
    }

    public function    Update($idtrip, $Original_idtrip, $iduser, $nametrip)
    {
        $this->FUpdateCommand->Parametres()->GetItem(0)->Value($idtrip);
        $this->FUpdateCommand->Parametres()->GetItem(1)->Value($Original_idtrip);
        $this->FUpdateCommand->Parametres()->GetItem(2)->Value($iduser);
        $this->FUpdateCommand->Parametres()->GetItem(3)->Value($nametrip);
        $this->FUpdateCommand->Execute();
    }

    public function  FillByID($table, $param)
    {
        $this->FTable = $table;
        $this->FFillByID->Parametres()->GetItem(0)->Value($param);
        $this->FFillByID->Execute();
    }
}

class t_tripdesTableAdapter extends TTableAdapter
{
    private $FDeleteByTrip;
    private $FFillByTripID;

    public function  __construct()
    {
        global $CubaMyWayConnection;
        parent::__construct($CubaMyWayConnection);
        $this->ClearFill(true);
        $this->FSelectCommand = new TDataCommand();
        $this->Commands()->Add($this->FSelectCommand);
        $this->FSelectCommand->SetSql("SELECT idtripdes,idtrip,idtourpolo FROM t_tripdes");
        $this->FSelectCommand->SetConnection($this->FConnection);
        $this->FSelectCommand->_construct($this);
        $this->FSelectCommand->Type('Text');
        $this->FInsertCommand = new TDataCommand();
        $this->Commands()->Add($this->FInsertCommand);
        $this->FInsertCommand->SetSql("INSERT INTO t_tripdes(idtrip,idtourpolo) VALUES ('@idtrip','@idtourpolo')");
        $this->FInsertCommand->SetConnection($this->FConnection);
        $this->FInsertCommand->_construct($this);
        $this->FInsertCommand->Type('Text');
        $this->FInsertCommand->FParams->CreateAndAdd("@idtrip", "int", "Input", "idtrip");
        $this->FInsertCommand->FParams->CreateAndAdd("@idtourpolo", "int", "Input", "idtourpolo");
        $this->FDeleteCommand = new TDataCommand();
        $this->Commands()->Add($this->FDeleteCommand);
        $this->FDeleteCommand->SetSql("DELETE FROM t_tripdes WHERE idtripdes = '@Original_idtripdes'");
        $this->FDeleteCommand->SetConnection($this->FConnection);
        $this->FDeleteCommand->_construct($this);
        $this->FDeleteCommand->Type('Text');
        $this->FDeleteCommand->FParams->CreateAndAdd("@Original_idtripdes", "int", "Input", "idtripdes");
        $this->FUpdateCommand = new TDataCommand();
        $this->Commands()->Add($this->FUpdateCommand);
        $this->FUpdateCommand->SetSql("UPDATE t_tripdes SET idtrip='@idtrip',idtourpolo='@idtourpolo' WHERE idtripdes = '@Original_idtripdes'");
        $this->FUpdateCommand->SetConnection($this->FConnection);
        $this->FUpdateCommand->_construct($this);
        $this->FUpdateCommand->Type('Text');
        $this->FUpdateCommand->FParams->CreateAndAdd("@Original_idtripdes", "int", "Input", "idtripdes");
        $this->FUpdateCommand->FParams->CreateAndAdd("@idtrip", "int", "Input", "idtrip");
        $this->FUpdateCommand->FParams->CreateAndAdd("@idtourpolo", "int", "Input", "idtourpolo");
        $this->FDeleteByTrip = new TDataCommand();
        $this->OtherCommands()->Add($this->FDeleteByTrip);
        $this->FDeleteByTrip->SetSql("DELETE FROM t_tripdes WHERE idtrip = '@param'");
        $this->FDeleteByTrip->SetConnection($this->FConnection);
        $this->FDeleteByTrip->_construct($this);
        $this->FDeleteByTrip->Type('Text');
        $this->FDeleteByTrip->FParams->CreateAndAdd("@param", "int", "", "");
        $this->FFillByTripID = new TDataCommand();
        $this->OtherCommands()->Add($this->FFillByTripID);
        $this->FFillByTripID->SetSql("SELECT idtripdes,idtrip,idtourpolo FROM t_tripdes WHERE idtrip = '@param'");
        $this->FFillByTripID->SetConnection($this->FConnection);
        $this->FFillByTripID->_construct($this);
        $this->FFillByTripID->Type('Text');
        $this->FFillByTripID->FParams->CreateAndAdd("@param", "int", "", "");
    }

    public function    Insert($idtripdes, $idtourpolo)
    {
        $this->FInsertCommand->Parametres()->GetItem(0)->Value($idtripdes);
        $this->FInsertCommand->Parametres()->GetItem(1)->Value($idtourpolo);
        return $this->FInsertCommand->Execute();
    }

    public function    Delete($Original_idtripdes)
    {
        $this->FDeleteCommand->Parametres()->GetItem(0)->Value($Original_idtripdes);
        $this->FDeleteCommand->Execute();
    }

    public function    Update($Original_idtripdes, $idtrip, $idtourpolo)
    {

        $this->FUpdateCommand->Parametres()->GetItem(0)->Value($Original_idtripdes);

        $this->FUpdateCommand->Parametres()->GetItem(1)->Value($idtrip);
        $this->FUpdateCommand->Parametres()->GetItem(2)->Value($idtourpolo);
        $this->FUpdateCommand->Execute();
    }

    public function  DeleteByTrip($param)
    {
        $this->FDeleteByTrip->Parametres()->GetItem(0)->Value($param);
        return $this->FDeleteByTrip->Execute(true);
    }

    public function  FillByTrip($table, $param)
    {

        $this->FTable = $table;
        $this->FFillByTripID->Parametres()->GetItem(0)->Value($param);
        $this->FFillByTripID->Execute();
    }

    public function UpdateFromData($item, $data)
    {
        $r = true;
        if(strpos($data,',')!==false)
        {
        $this->DeleteByTrip($item);

        $t = explode(',', $data);

        for ($i = 0; $i < count($t); $i++) {
            $v = $this->Insert($item, $t[$i]);
            if (!$v)
                $r = false;
        }
        }
        return $r;
    }

}

class t_tourpoloTableAdapter extends TTableAdapter
{
    private $FFillByID;

    public function  __construct()
    {
        global $CubaMyWayConnection;
        parent::__construct($CubaMyWayConnection);
        $this->ClearFill(true);
        $this->FSelectCommand = new TDataCommand();
        $this->Commands()->Add($this->FSelectCommand);
        $this->FSelectCommand->SetSql("SELECT idtourpolo,namepolo,datapolo,descpolo FROM t_tourpolo");
        $this->FSelectCommand->SetConnection($this->FConnection);
        $this->FSelectCommand->_construct($this);
        $this->FSelectCommand->Type('Text');
        $this->FInsertCommand = new TDataCommand();
        $this->Commands()->Add($this->FInsertCommand);
        $this->FInsertCommand->SetSql("INSERT INTO t_tourpolo(namepolo,datapolo,descpolo) VALUES ('@namepolo','@datapolo','@descpolo')");
        $this->FInsertCommand->SetConnection($this->FConnection);
        $this->FInsertCommand->_construct($this);
        $this->FInsertCommand->Type('Text');
        $this->FInsertCommand->FParams->CreateAndAdd("@namepolo", "nvarchar", "Input", "namepolo");
        $this->FInsertCommand->FParams->CreateAndAdd("@datapolo", "nvarchar", "Input", "datapolo");
        $this->FInsertCommand->FParams->CreateAndAdd("@descpolo", "nvarchar", "Input", "descpolo");
        $this->FDeleteCommand = new TDataCommand();
        $this->Commands()->Add($this->FDeleteCommand);
        $this->FDeleteCommand->SetSql("DELETE FROM t_tourpolo WHERE idtourpolo = '@Original_idtourpolo'");
        $this->FDeleteCommand->SetConnection($this->FConnection);
        $this->FDeleteCommand->_construct($this);
        $this->FDeleteCommand->Type('Text');
        $this->FDeleteCommand->FParams->CreateAndAdd("@Original_idtourpolo", "int", "Input", "idtourpolo");
        $this->FUpdateCommand = new TDataCommand();
        $this->Commands()->Add($this->FUpdateCommand);
        $this->FUpdateCommand->SetSql("UPDATE t_tourpolo SET namepolo='@namepolo',datapolo='@datapolo',descpolo='@descpolo' WHERE idtourpolo = '@Original_idtourpolo'");
        $this->FUpdateCommand->SetConnection($this->FConnection);
        $this->FUpdateCommand->_construct($this);
        $this->FUpdateCommand->Type('Text');
        $this->FUpdateCommand->FParams->CreateAndAdd("@idtourpolo", "int", "Input", "idtourpolo");
        $this->FUpdateCommand->FParams->CreateAndAdd("@Original_idtourpolo", "int", "Input", "idtourpolo");
        $this->FUpdateCommand->FParams->CreateAndAdd("@namepolo", "nvarchar", "Input", "namepolo");
        $this->FUpdateCommand->FParams->CreateAndAdd("@datapolo", "nvarchar", "Input", "datapolo");
        $this->FUpdateCommand->FParams->CreateAndAdd("@descpolo", "nvarchar", "Input", "descpolo");
        $this->FFillByID = new TDataCommand();
        $this->OtherCommands()->Add($this->FFillByID);
        $this->FFillByID->SetSql(" SELECT idtourpolo, namepolo, datapolo, descpolo FROM t_tourpolo WHERE idtourpolo = '@param' OR namepolo LIKE '%@param%'");
        $this->FFillByID->SetConnection($this->FConnection);
        $this->FFillByID->_construct($this);
        $this->FFillByID->Type('Text');
        $this->FFillByID->FParams->CreateAndAdd("@param", "int", "Input", "param");
    }

    public function    Insert($namepolo, $datapolo, $descpolo)
    {
        $this->FInsertCommand->Parametres()->GetItem(0)->Value($namepolo);
        $this->FInsertCommand->Parametres()->GetItem(1)->Value($datapolo);
        $this->FInsertCommand->Parametres()->GetItem(2)->Value($descpolo);
        $this->FInsertCommand->Execute();
    }

    public function    Delete($Original_idtourpolo)
    {
        $this->FDeleteCommand->Parametres()->GetItem(0)->Value($Original_idtourpolo);
        $this->FDeleteCommand->Execute();
    }

    public function    Update($idtourpolo, $Original_idtourpolo, $namepolo, $datapolo, $descpolo)
    {
        $this->FUpdateCommand->Parametres()->GetItem(0)->Value($idtourpolo);
        $this->FUpdateCommand->Parametres()->GetItem(1)->Value($Original_idtourpolo);
        $this->FUpdateCommand->Parametres()->GetItem(2)->Value($namepolo);
        $this->FUpdateCommand->Parametres()->GetItem(3)->Value($datapolo);
        $this->FUpdateCommand->Parametres()->GetItem(4)->Value($descpolo);
        $this->FUpdateCommand->Execute();
    }

    public function  FillByID($table, $param)
    {
        $this->FTable = $table;
        $this->FFillByID->Parametres()->GetItem(0)->Value($param);
        $this->FFillByID->Execute();
    }
}

class t_poloimagesTableAdapter extends TTableAdapter
{
    private $FFillBy;

    public function  __construct()
    {
        global $CubaMyWayConnection;
        parent::__construct($CubaMyWayConnection);
        $this->ClearFill(true);
        $this->FSelectCommand = new TDataCommand();
        $this->Commands()->Add($this->FSelectCommand);
        $this->FSelectCommand->SetSql("SELECT idimage,pathimage,idtour FROM t_poloimages");
        $this->FSelectCommand->SetConnection($this->FConnection);
        $this->FSelectCommand->_construct($this);
        $this->FSelectCommand->Type('Text');
        $this->FInsertCommand = new TDataCommand();
        $this->Commands()->Add($this->FInsertCommand);
        $this->FInsertCommand->SetSql("INSERT INTO t_poloimages(pathimage,idtour) VALUES ('@pathimage','@idtour')");
        $this->FInsertCommand->SetConnection($this->FConnection);
        $this->FInsertCommand->_construct($this);
        $this->FInsertCommand->Type('Text');
        $this->FInsertCommand->FParams->CreateAndAdd("@pathimage", "nvarchar", "Input", "pathimage");
        $this->FInsertCommand->FParams->CreateAndAdd("@idtour", "int", "Input", "idtour");
        $this->FDeleteCommand = new TDataCommand();
        $this->Commands()->Add($this->FDeleteCommand);
        $this->FDeleteCommand->SetSql("DELETE FROM t_poloimages WHERE idimage = '@Original_idimage'");
        $this->FDeleteCommand->SetConnection($this->FConnection);
        $this->FDeleteCommand->_construct($this);
        $this->FDeleteCommand->Type('Text');
        $this->FDeleteCommand->FParams->CreateAndAdd("@Original_idimage", "int", "Input", "idimage");
        $this->FUpdateCommand = new TDataCommand();
        $this->Commands()->Add($this->FUpdateCommand);
        $this->FUpdateCommand->SetSql("UPDATE t_poloimages SET pathimage='@pathimage',idtour='@idtour' WHERE idimage = '@Original_idimage'");
        $this->FUpdateCommand->SetConnection($this->FConnection);
        $this->FUpdateCommand->_construct($this);
        $this->FUpdateCommand->Type('Text');
        $this->FUpdateCommand->FParams->CreateAndAdd("@idimage", "int", "Input", "idimage");
        $this->FUpdateCommand->FParams->CreateAndAdd("@Original_idimage", "int", "Input", "idimage");
        $this->FUpdateCommand->FParams->CreateAndAdd("@pathimage", "nvarchar", "Input", "pathimage");
        $this->FUpdateCommand->FParams->CreateAndAdd("@idtour", "int", "Input", "idtour");
        $this->FFillBy = new TDataCommand();
        $this->OtherCommands()->Add($this->FFillBy);
        $this->FFillBy->SetSql(" SELECT idimage, pathimage, idtour FROM t_poloimages WHERE idtour = '@param' ");
        $this->FFillBy->SetConnection($this->FConnection);
        $this->FFillBy->_construct($this);
        $this->FFillBy->Type('Text');
        $this->FFillBy->FParams->CreateAndAdd("@param", "int", "Input", "param");
    }

    public function    Insert($pathimage, $idtour)
    {
        $this->FInsertCommand->Parametres()->GetItem(0)->Value($pathimage);
        $this->FInsertCommand->Parametres()->GetItem(1)->Value($idtour);
        $this->FInsertCommand->Execute();
    }

    public function    Delete($Original_idimage)
    {
        $this->FDeleteCommand->Parametres()->GetItem(0)->Value($Original_idimage);
        $this->FDeleteCommand->Execute();
    }

    public function    Update($idimage, $Original_idimage, $pathimage, $idtour)
    {
        $this->FUpdateCommand->Parametres()->GetItem(0)->Value($idimage);
        $this->FUpdateCommand->Parametres()->GetItem(1)->Value($Original_idimage);
        $this->FUpdateCommand->Parametres()->GetItem(2)->Value($pathimage);
        $this->FUpdateCommand->Parametres()->GetItem(3)->Value($idtour);
        $this->FUpdateCommand->Execute();
    }

    public function  FillBy($table, $param)
    {
        $this->FTable = $table;
        $this->FFillBy->Parametres()->GetItem(0)->Value($param);
        $this->FFillBy->Execute();
    }
}

class t_messagesTableAdapter extends TTableAdapter
{
    private $FFillByID;
    private $FFillBy1;

    public function  __construct()
    {
        global $CubaMyWayConnection;
        parent::__construct($CubaMyWayConnection);
        $this->ClearFill(true);
        $this->FSelectCommand = new TDataCommand();
        $this->Commands()->Add($this->FSelectCommand);
        $this->FSelectCommand->SetSql(" SELECT idmessages, idoriguser, iddestuser, textmsg, topicmsg, statemsg, datemsg FROM t_messages");
        $this->FSelectCommand->SetConnection($this->FConnection);
        $this->FSelectCommand->_construct($this);
        $this->FSelectCommand->Type('Text');
        $this->FInsertCommand = new TDataCommand();
        $this->Commands()->Add($this->FInsertCommand);
        $this->FInsertCommand->SetSql("INSERT INTO t_messages(idoriguser,iddestuser,textmsg,topicmsg,statemsg,datemsg) VALUES ('@idoriguser','@iddestuser','@textmsg','@topicmsg','@statemsg','@datemsg')");
        $this->FInsertCommand->SetConnection($this->FConnection);
        $this->FInsertCommand->_construct($this);
        $this->FInsertCommand->Type('Text');
        $this->FInsertCommand->FParams->CreateAndAdd("@idoriguser", "int", "Input", "idoriguser");
        $this->FInsertCommand->FParams->CreateAndAdd("@iddestuser", "int", "Input", "iddestuser");
        $this->FInsertCommand->FParams->CreateAndAdd("@textmsg", "nvarchar", "Input", "textmsg");
        $this->FInsertCommand->FParams->CreateAndAdd("@topicmsg", "nvarchar", "Input", "topicmsg");
        $this->FInsertCommand->FParams->CreateAndAdd("@statemsg", "bit", "Input", "statemsg");
        $this->FInsertCommand->FParams->CreateAndAdd("@datemsg", "", "Input", "datemsg");
        $this->FDeleteCommand = new TDataCommand();
        $this->Commands()->Add($this->FDeleteCommand);
        $this->FDeleteCommand->SetSql("DELETE FROM t_messages WHERE idmessages = '@Original_idmessages'");
        $this->FDeleteCommand->SetConnection($this->FConnection);
        $this->FDeleteCommand->_construct($this);
        $this->FDeleteCommand->Type('Text');
        $this->FDeleteCommand->FParams->CreateAndAdd("@Original_idmessages", "int", "Input", "idmessages");
        $this->FUpdateCommand = new TDataCommand();
        $this->Commands()->Add($this->FUpdateCommand);
        $this->FUpdateCommand->SetSql("UPDATE t_messages SET idoriguser='@idoriguser',iddestuser='@iddestuser',textmsg='@textmsg',topicmsg='@topicmsg',statemsg='@statemsg',datemsg='@datemsg' WHERE idmessages = '@Original_idmessages'");
        $this->FUpdateCommand->SetConnection($this->FConnection);
        $this->FUpdateCommand->_construct($this);
        $this->FUpdateCommand->Type('Text');
        $this->FUpdateCommand->FParams->CreateAndAdd("@Original_idmessages", "int", "Input", "idmessages");
        $this->FUpdateCommand->FParams->CreateAndAdd("@idoriguser", "int", "Input", "idoriguser");
        $this->FUpdateCommand->FParams->CreateAndAdd("@iddestuser", "int", "Input", "iddestuser");
        $this->FUpdateCommand->FParams->CreateAndAdd("@textmsg", "nvarchar", "Input", "textmsg");
        $this->FUpdateCommand->FParams->CreateAndAdd("@topicmsg", "nvarchar", "Input", "topicmsg");
        $this->FUpdateCommand->FParams->CreateAndAdd("@statemsg", "bit", "Input", "statemsg");
        $this->FUpdateCommand->FParams->CreateAndAdd("@datemsg", "", "Input", "datemsg");
        $this->FFillByID = new TDataCommand();
        $this->OtherCommands()->Add($this->FFillByID);
        $this->FFillByID->SetSql(" SELECT t_messages.idmessages, t_messages.idoriguser, t_messages.iddestuser, t_messages.textmsg, t_user.nameuser AS origuser, t_user1.nameuser AS destuser,t_messages.topicmsg, t_messages.statemsg, t_messages.datemsg,t_user.pictureuser AS origuserpic, t_user1.pictureuser AS destuserpic FROM t_messages INNER JOIN t_user ON t_messages.idoriguser = t_user.iduser INNER JOIN t_user AS t_user1 ON t_messages.iddestuser = t_user1.iduser WHERE idmessages = '@param' OR textmsg LIKE '%@param%'  ");
        $this->FFillByID->SetConnection($this->FConnection);
        $this->FFillByID->_construct($this);
        $this->FFillByID->Type('Text');
        $this->FFillByID->FParams->CreateAndAdd("@param", "int", "Input", "param");
        $this->FFillBy1 = new TDataCommand();
        $this->OtherCommands()->Add($this->FFillBy1);
        $this->FFillBy1->SetSql(" SELECT t_messages.idmessages, t_messages.idoriguser, t_messages.iddestuser, t_messages.textmsg,  t_user.nameuser AS origuser, t_user1.nameuser AS destuser, t_messages.topicmsg, t_messages.statemsg, t_messages.datemsg,t_user.pictureuser AS origuserpic, t_user1.pictureuser AS destuserpic FROM t_messages INNER JOIN t_user ON t_messages.idoriguser = t_user.iduser INNER JOIN t_user AS t_user1 ON t_messages.iddestuser = t_user1.iduser WHERE (t_messages.idoriguser = '@iduser' AND '@param' = '1') OR (t_messages.iddestuser = '@iduser' AND '@param' = '2') OR '@param' = '-1'");
        $this->FFillBy1->SetConnection($this->FConnection);
        $this->FFillBy1->_construct($this);
        $this->FFillBy1->Type('Text');
        $this->FFillBy1->FParams->CreateAndAdd("@iduser", "int", "Input", "iduser");
        $this->FFillBy1->FParams->CreateAndAdd("@param", "nvarchar", "", "");
    }

    public function    Insert($idoriguser, $iddestuser, $textmsg, $topicmsg, $statemsg, $datemsg)
    {
        $this->FInsertCommand->Parametres()->GetItem(0)->Value($idoriguser);
        $this->FInsertCommand->Parametres()->GetItem(1)->Value($iddestuser);
        $this->FInsertCommand->Parametres()->GetItem(2)->Value($textmsg);
        $this->FInsertCommand->Parametres()->GetItem(3)->Value($topicmsg);
        $this->FInsertCommand->Parametres()->GetItem(4)->Value($statemsg);
        $this->FInsertCommand->Parametres()->GetItem(5)->Value($datemsg);
        $this->FInsertCommand->Execute();
    }

    public function    Delete($Original_idmessages)
    {
        $this->FDeleteCommand->Parametres()->GetItem(0)->Value($Original_idmessages);
        $this->FDeleteCommand->Execute();
    }

    public function    Update($Original_idmessages, $idoriguser, $iddestuser, $textmsg, $topicmsg, $statemsg, $datemsg)
    {
        $this->FUpdateCommand->Parametres()->GetItem(0)->Value($Original_idmessages);
        $this->FUpdateCommand->Parametres()->GetItem(1)->Value($idoriguser);
        $this->FUpdateCommand->Parametres()->GetItem(2)->Value($iddestuser);
        $this->FUpdateCommand->Parametres()->GetItem(3)->Value($textmsg);
        $this->FUpdateCommand->Parametres()->GetItem(4)->Value($topicmsg);
        $this->FUpdateCommand->Parametres()->GetItem(5)->Value($statemsg);
        $this->FUpdateCommand->Parametres()->GetItem(6)->Value($datemsg);
        $this->FUpdateCommand->Execute();
    }

    public function  FillByID($table, $param)
    {
        $this->FTable = $table;
        $this->FFillByID->Parametres()->GetItem(0)->Value($param);
        $this->FFillByID->Execute();
    }

    public function  FillBy1($table, $iduser, $param)
    {
        $this->FTable = $table;

        $this->FFillBy1->Parametres()->GetItem(0)->Value($iduser);
        $this->FFillBy1->Parametres()->GetItem(1)->Value($param);
        $this->FFillBy1->Execute();
    }
}

class t_realtripTableAdapter extends TTableAdapter
{
    private $FFillByID;

    public function  __construct()
    {
        global $CubaMyWayConnection;
        parent::__construct($CubaMyWayConnection);
        $this->ClearFill(true);
        $this->FSelectCommand = new TDataCommand();
        $this->Commands()->Add($this->FSelectCommand);
        $this->FSelectCommand->SetSql("SELECT idrealtrip,idtrip,iduser,isclosed,datetrip FROM t_realtrip");
        $this->FSelectCommand->SetConnection($this->FConnection);
        $this->FSelectCommand->_construct($this);
        $this->FSelectCommand->Type('Text');
        $this->FInsertCommand = new TDataCommand();
        $this->Commands()->Add($this->FInsertCommand);
        $this->FInsertCommand->SetSql("INSERT INTO t_realtrip(idtrip,iduser,isclosed,datetrip) VALUES ('@idtrip','@iduser','@isclosed','@datetrip')");
        $this->FInsertCommand->SetConnection($this->FConnection);
        $this->FInsertCommand->_construct($this);
        $this->FInsertCommand->Type('Text');
        $this->FInsertCommand->FParams->CreateAndAdd("@idtrip", "int", "Input", "idtrip");
        $this->FInsertCommand->FParams->CreateAndAdd("@iduser", "int", "Input", "iduser");
        $this->FInsertCommand->FParams->CreateAndAdd("@isclosed", "bit", "Input", "isclosed");
        $this->FInsertCommand->FParams->CreateAndAdd("@datetrip", "", "Input", "datetrip");
        $this->FDeleteCommand = new TDataCommand();
        $this->Commands()->Add($this->FDeleteCommand);
        $this->FDeleteCommand->SetSql("DELETE FROM t_realtrip WHERE idrealtrip = '@Original_idrealtrip'");
        $this->FDeleteCommand->SetConnection($this->FConnection);
        $this->FDeleteCommand->_construct($this);
        $this->FDeleteCommand->Type('Text');
        $this->FDeleteCommand->FParams->CreateAndAdd("@Original_idrealtrip", "int", "Input", "idtrip");
        $this->FUpdateCommand = new TDataCommand();
        $this->Commands()->Add($this->FUpdateCommand);
        $this->FUpdateCommand->SetSql("UPDATE t_realtrip SET idtrip='@idtrip',iduser='@iduser',isclosed='@isclosed',datetrip='@datetrip' WHERE idrealtrip = '@Original_idrealtrip'");
        $this->FUpdateCommand->SetConnection($this->FConnection);
        $this->FUpdateCommand->_construct($this);
        $this->FUpdateCommand->Type('Text');
        $this->FUpdateCommand->FParams->CreateAndAdd("@Original_idrealtrip", "int", "Input", "idrealtrip");
        $this->FUpdateCommand->FParams->CreateAndAdd("@idtrip", "int", "Input", "idtrip");
        $this->FUpdateCommand->FParams->CreateAndAdd("@iduser", "int", "Input", "iduser");
        $this->FUpdateCommand->FParams->CreateAndAdd("@isclosed", "bit", "Input", "isclosed");
        $this->FUpdateCommand->FParams->CreateAndAdd("@datetrip", "", "Input", "datetrip");
        $this->FFillByID = new TDataCommand();
        $this->OtherCommands()->Add($this->FFillByID);
        $this->FFillByID->SetSql(" SELECT t_realtrip.idrealtrip, t_realtrip.idtrip, t_realtrip.iduser, t_realtrip.isclosed, t_realtrip.datetrip, t_trip.nametrip, t_user.nameuser FROM t_realtrip INNER JOIN t_trip ON t_trip.idtrip = t_realtrip.idtrip INNER JOIN t_user ON t_user.iduser = t_realtrip.iduser WHERE idrealtrip = '@param' OR '@param' = '-1'");
        $this->FFillByID->SetConnection($this->FConnection);
        $this->FFillByID->_construct($this);
        $this->FFillByID->Type('Text');
        $this->FFillByID->FParams->CreateAndAdd("@param", "int", "Input", "param");
    }

    public function    Insert($idtrip, $iduser, $isclosed, $datetrip)
    {
        $this->FInsertCommand->Parametres()->GetItem(0)->Value($idtrip);
        $this->FInsertCommand->Parametres()->GetItem(1)->Value($iduser);
        $this->FInsertCommand->Parametres()->GetItem(2)->Value($isclosed);
        $this->FInsertCommand->Parametres()->GetItem(3)->Value($datetrip);
        $this->FInsertCommand->Execute();
    }

    public function    Delete($Original_idrealtrip)
    {
        $this->FDeleteCommand->Parametres()->GetItem(0)->Value($Original_idrealtrip);
        $this->FDeleteCommand->Execute();
    }

    public function    Update($Original_idrealtrip, $idtrip, $iduser, $isclosed, $datetrip)
    {
        $this->FUpdateCommand->Parametres()->GetItem(0)->Value($Original_idrealtrip);
        $this->FUpdateCommand->Parametres()->GetItem(1)->Value($idtrip);
        $this->FUpdateCommand->Parametres()->GetItem(2)->Value($iduser);
        $this->FUpdateCommand->Parametres()->GetItem(3)->Value($isclosed);
        $this->FUpdateCommand->Parametres()->GetItem(4)->Value($datetrip);
        $this->FUpdateCommand->Execute();
    }

    public function  FillByID($table, $param)
    {
        $this->FTable = $table;
        $this->FFillByID->Parametres()->GetItem(0)->Value($param);
        $this->FFillByID->Execute(false);
    }
}

class  DSCubaMyWay extends TDataSet
{
    private $Ft_comment;
    private $Ft_trip;
    private $Ft_tourpolo;
    private $Ft_poloimages;
    private $Ft_messages;
    private $Ft_realtrip;
    private $Ft_tripdes;

    public function  __construct()
    {
        parent::__construct();
        $this->set_DataSetName("DSCubaMyWay");
        $this->set_Prefix("Prefix");
        $this->set_Namespace("http://tempuri.org/DSCubaMyWay.xsd");
        $this->set_Constraints(false);
        $this->Ft_comment = new t_commentDataTable();
        $this->Ft_comment->construct("t_comment",$this);
        parent::Tables()->Add($this->Ft_comment);
        $this->Ft_trip = new t_tripDataTable();
        $this->Ft_trip->construct("t_trip",$this);
        parent::Tables()->Add($this->Ft_trip);
        $this->Ft_tourpolo = new t_tourpoloDataTable();
        $this->Ft_tourpolo->construct("t_tourpolo",$this);
        parent::Tables()->Add($this->Ft_tourpolo);
        $this->Ft_poloimages = new t_poloimagesDataTable();
        $this->Ft_poloimages->construct("t_poloimages",$this);
        parent::Tables()->Add($this->Ft_poloimages);
        $this->Ft_messages = new t_messagesDataTable();
        $this->Ft_messages->construct("t_messages",$this);
        parent::Tables()->Add($this->Ft_messages);
        $this->Ft_realtrip = new t_realtripDataTable();
        $this->Ft_realtrip->construct("t_realtrip",$this);
        parent::Tables()->Add($this->Ft_realtrip);
        $this->Ft_tripdes = new t_tripdesDataTable();
        $this->Ft_tripdes->construct("t_tripdes",$this);
        parent::Tables()->Add($this->Ft_tripdes);
    }

    public function  t_comment()
    {
        return $this->Ft_comment;
    }

    public function  t_trip()
    {
        return $this->Ft_trip;
    }

    public function  t_tourpolo()
    {
        return $this->Ft_tourpolo;
    }

    public function  t_poloimages()
    {
        return $this->Ft_poloimages;
    }

    public function  t_messages()
    {
        return $this->Ft_messages;
    }

    public function  t_realtrip()
    {
        return $this->Ft_realtrip;
    }

    public function  t_tripdes()
    {
        return $this->Ft_tripdes;
    }
}

?>