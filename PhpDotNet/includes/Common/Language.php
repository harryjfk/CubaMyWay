<?php

include_once('List.php');
class LanguageFile
{
    private $filename;
    private $data;
   public function __construct($path)
   {
     $this->data = @parse_ini_file($path);
       $this->filename = $path;
   }
    public function FileName(){return $this->filename;}
    public function Data(){return $this->data;}

}
class Language
{
    private $files;
    private $mainfile;
    //private $traducciones;
    private $codigoIdioma;

    public function __construct($pathlang, $lang = 'en')
    {
        $this->codigoIdioma = $lang;
        $this->files = new TList();

        $this->LoadFromPath($pathlang, $lang);

    }

    private  function HasLoadedFile($path)
    {
        for ($i=0;$i<$this->Files()->Count();$i++)
            if($this->Files()->GetItem($i)->FileName()==$path)
                return true;
        return false;
    }
    public function LoadFromPath($pathlang, $lang)
    {
      if (!$this->HasLoadedFile($pathlang . "$lang.ini"))
        $this->files->Add(new LanguageFile($pathlang . "$lang.ini"));
        $this->mainfile= @parse_ini_file($pathlang."languages.ini");
    }


    public function GetString($str,$files = true)
    {

        $s = "";
if($files)
        for ($i = 0; $i < $this->files->Count(); $i++) {
            if(is_array($this->files->GetItem($i)->Data()))
           if(  array_key_exists($str,$this->files->GetItem($i)->Data()    ))


        $s = $this->files->GetItem($i)->Data()[$str];
                    if($s!="")
                break;
        }
        else
            $s = $this->mainfile[$str];
        return $s;
    }

    public function get($index)
    {
        /*	if($this->traducciones[$index])
             return $this->traducciones[$index];
            else return $index;*/

        return $this->files->GetItem($index);
    }

    public function Files()
    {
        return $this->files;
    }

    public function GetLang()
    {
        return $this->codigoIdioma;
    }
    public function  SetLang($value)
    {
        if($value!=$this->codigoIdioma)

            $this->Files()->Clear();
        $this->codigoIdioma = $value;
    }
    public function GetErrorsAsJson()
    {
       $s =  array();
        $s +=["loading"=> $this->GetString("LOADING")];
        $s +=["errorload"=> $this->GetString("ERROR_LOADING")];
return json_encode($s);
    }
}