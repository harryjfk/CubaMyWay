<?php


include_once('List.php');
class TPath
{
    private $FPath;
    private $FFiles;

    static function GetExtension($filename)
    {
        $pos1 = stripos($filename, '.');
        $count = strlen($filename);

        if ($pos1 == false)
            return '';
        else

            return substr($filename, $pos1, $count - $pos1);

    }

    static function GetDirectory($path, $all = true)
    {

        $t = $path;
        if (substr($t, strlen($t), 1) == '/')
            $t = substr($t, 0, strlen($t));
        if ($all)
            return substr($t, 0, strripos($t, '/'));
        else {
            $f = substr($t, 0, strripos($t, '/'));
            return substr($f, strripos($f, '/') + 1, strlen($f) - strripos($f, '/'));
        }
    }

static public function ChildFolders($path)
{
$r = new TList();
    $d = dir($path);
    //   echo "Handle: ".$d->handle."<br>\n";
    // echo "Path: ".$d->path."<br>\n";
    while ($entry = $d->read()) {

         // echo $path.$entry;
        if($entry!='.' && $entry!='..' && !is_file($path.$entry))
        $r->Add($entry) ;

    }

    $d->close();
    return $r;
}


    static function GetFileName($filename, $path = true)
    {
        $pos1 = stripos($filename, '.');
        if ($pos1 == false)
            return $filename;
        else
            if ($path)
                return substr($filename, 0, $pos1);
            else
                return substr($filename, strripos($filename, '/') + 1, $pos1);

    }

    static function FilesWithFolderName($path, $foldername)
    {
        $r = new TList();
        $p = new TPath();
        $p->Path($path);
        for ($i = 0; $i < $p->Files()->Count(); $i++) {
            $temp = pathinfo($p->Files()->GetItem($i));

            if (stripos($temp["dirname"], $foldername) || $foldername ==="") //TPath::GetFileName($temp["basename"])==TPath::GetFileName($file["basename"]))
                $r->Add($p->Files()->GetItem($i));
            clearstatcache();
        }
        return $r;
    }

    public function Files()
    {
        return $this->FFiles;
    }

    private function SetPath()
    {
        $this->FFiles->Clear();
        $this->InFiles($this->FPath, $this->FFiles);
    }

    public function __construct($path = null)
    {
        $this->FFiles = new TList();
        $this->Path($path);
    }

    private function InFiles($path, $r)
    {

        $d = dir($path);
        //   echo "Handle: ".$d->handle."<br>\n";
        // echo "Path: ".$d->path."<br>\n";
        while ($entry = $d->read()) {
            //  echo $path.$entry;
            if (!is_file($path . $entry)) {
                if ($entry != '.' && $entry != '..')
                    $this->InFiles($path . $entry . '/', $r);
            } else

                $r->Add($path . $entry);
        }

        $d->close();


        //    $files = pathinfo()

    }

    public function GetFiles($filename = null)
    {

    }

    public function Path($value = null)
    {
        if ($value == null)
            return $this->FPath;
        else {
            $this->FPath = $value;
            $this->SetPath();
        }
    }
}