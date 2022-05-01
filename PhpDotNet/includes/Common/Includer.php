<?php

namespace System
{
    include_once ('Path.php');
class TIncluder
{
    static function  IncludeByPath ($root,$class)
    {
        $s =  TPath::FilesWithName($root,$class);
        for($i=0;$i<$s->Count();$i++)
        {

         /*   try
            {
            include_once(str_replace($root,'',$s->GetItem($i)));
            }
            catch(\Exception $e)
            {*/
                include_once($s->GetItem($i));
            //}
        }


      return file_exists($root.$class);
    }
}
}
