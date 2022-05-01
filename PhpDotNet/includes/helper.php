<?php defined('JEXEC') or die('Restricted access');
class THelper
{
    public function __construct()
    {
    }

    /**
     * @param string $id id del control
     * @param string $value valor que va a quedar seleccionado en el control
     * @param array  $attributes aqui se pasan todos los atributos extras Ej:
     * @example array('class="nombreclass"', 'size="20"') y otrs atributos que se deseen agregar
     * @return string control input type="radio"
     * */
    static public function radioButton($id, $value, $attributes = array())
    {
        $list_attrib = implode(' ', $attributes);
        return "<input type=\"radio\" name=\"$id\" id=\"$id\" value=\"$value\" $list_attrib />";
    }

    /**
     * @param string $id id del control
     * @param string $value valor que va a quedar seleccionado en el control
     * @param array  $attributes aqui se pasan todos los atributos extras Ej:
     * @example array('class="nombreclass"', 'size="20"') y otrs atributos que se deseen agregar
     * @return string control input type="text"
     * */
    static public function textBox($id, $value, $attributes = array())
    {
        $list_attrib = implode(' ', $attributes);
        return "<input type=\"text\" name=\"$id\" id=\"$id\" value=\"$value\" $list_attrib />";
    }


    /**
     * @param string $id id del control
     * @param string $value valor que va a quedar seleccionado en el control
     * @param array  $attributes aqui se pasan todos los atributos extras Ej:
     * @example array('class="nombreclass"', 'size="20"') y otrs atributos que se deseen agregar
     * @return string control input type="password"
     * */
    static public function password($id, $value, $attributes = array())
    {
        $list_attrib = implode(' ', $attributes);
        return "<input type=\"password\" name=\"$id\" id=\"$id\" value=\"$value\" $list_attrib />";
    }


    /**
     * @param string $id id del control
     * @param string $value valor que va a quedar seleccionado en el control
     * @param array  $attributes aqui se pasan todos los atributos extras Ej:
     * @example array('class="nombreclass"', 'size="20"') y otrs atributos que se deseen agregar
     * @return string control input type="checkbox"
     * */
    static public function checkBox($id, $value, $attributes = array())
    {
        $list_attrib = implode(' ', $attributes);
        $id_s = str_replace('[', '', $id);
        $id_s = str_replace(']', '', $id_s);
        return "<input type=\"checkbox\" name=\"$id\" id=\"$id_s\" value=\"$value\" $list_attrib />";
    }

    /**
     * @param string $id id del control
     * @param string $value valor que va a quedar seleccionado en el control
     * @param array  $attributes aqui se pasan todos los atributos extras Ej:
     * @example array('class="nombreclass"', 'size="20"') y otrs atributos que se deseen agregar
     * @return string control input type="button"
     * */
    static public function button($id, $value, $attributes = array())
    {
        $list_attrib = implode(' ', $attributes);
        return "<input type=\"button\" name=\"$id\" id=\"$id\" value=\"$value\" $list_attrib />";
    }

    /**
     * @param string $id id del control boton
     * @param string $value valor del boton a mostrar
     * @param string &urlImage imagen que se va a mostrar en el boton
     * @param Array $attributes lista de propiedades del boton
     * */
    static public function imageLinkButton($id, $value, $urlImage, $attributes = array())
    {
        $list_attrib = implode(' ', $attributes);
        return "<input type=\"image\" name=\"$id\" id=\"$id\" value=\"$value\" src=\"$urlImage\" $list_attrib />";
    }

    /**
     * @param string $id id del control
     * @param string $value valor que va a quedar seleccionado en el control
     * @param array  $attributes aqui se pasan todos los atributos extras Ej:
     * @example array('class="nombreclass"', 'size="20"') y otrs atributos que se deseen agregar
     * @return string control input type="submit"
     * */
    static public function submit($id, $value, $attributes = array())
    {
        $list_attrib = implode(' ', $attributes);
        return "<input type=\"submit\" name=\"$id\" id=\"$id\" value=\"$value\" $list_attrib />";
    }

    /**
     * @param string $id id del control
     * @param string $value valor que va a quedar seleccionado en el control
     * @param array  $attributes aqui se pasan todos los atributos extras Ej:
     * @example array('class="nombreclass"', 'size="20"') y otrs atributos que se deseen agregar
     * @return string control input type="hidden"
     * */
    static public function hidden($id, $value, $attributes = array())
    {
        $list_attrib = implode(' ', $attributes);
        $id_s = str_replace('[', '', $id);
        $id_s = str_replace(']', '', $id_s);
        return "<input type=\"hidden\" name=\"$id\" id=\"$id_s\" value=\"$value\" $list_attrib />";
    }

    /**
     * @param string $id id del control
     * @param string $value valor que va a quedar seleccionado en el control
     * @param int $cols ancho del control
     * @param int $rows alto del control
     * @param array  $attributes aqui se pasan todos los atributos extras Ej:
     * @example array('class="nombreclass"', 'size="20"') y otrs atributos que se deseen agregar
     * @return string control textarea
     * */
    static public function textarea($id, $value, $cols = 45, $rows = 5, $attributes = array())
    {
        $list_attrib = implode(' ', $attributes);
        return "<textarea name=\"$id\" id=\"$id\" cols=\"$cols\" rows=\"$rows\" $list_attrib>$value</textarea>";
    }

    /**
     * @param string $id id del control
     * @param object objecto que debe llenarse con los valores que se van  a mostrar
     * @param string $field_value este es e el valor que va a tener cada option del select
     * @param string $field_show valor que se va a mostrar en el select
     * @param array  $default_value aqui se pone el valor por defecto que debe tener el select
     * @param string valor que va a quedar seleccionado
     * @example   array('valor'=>'Valor Mostrar');
     * @param bool $isHtmlEntities para usar la funci�n htmlentities se debe poner este par�metro en true
     * @param array  $attributes aqui se pasan todos los atributos extras Ej:
     * @example array('class="nombreclass"', 'size="20"') y otrs atributos que se deseen agregar
     * @return string control Select
     * */
    static public function selectObject($id, $object, $field_value, $field_show, $default_value = array(), $defaultValue = 0, $isHtmlEntities = false, $attributes = array())
    {
        $list_attrib = implode(' ', $attributes);
        $id_s = str_replace('[', '', $id);
        $id_s = str_replace(']', '', $id_s);
        $control = "<select name=\"$id\" id=\"$id_s\" $list_attrib>";

        //agrego los valores por defecto
        if ($default_value) {
            foreach ($default_value as $key => $value) {
                $key = $isHtmlEntities ? utf8_decode(htmlentities($key)) : $key;
                $value = $isHtmlEntities ? utf8_decode(htmlentities($value)) : $value;

                $selected = preg_match("/^$key$/", $defaultValue) ? 'selected="selected"' : '';
                $control .= "<option value=\"$key\" $selected>$value</option>";
            }
        }
        //lleno el select con los valores de la base de datos
        foreach ($object as $items) {
            $val = $isHtmlEntities ? utf8_decode(htmlentities($items->getGenericField($field_value))) : $items->getGenericField($field_value);
            $value_Show = $isHtmlEntities ? utf8_decode(htmlentities($items->getGenericField($field_show))) : $items->getGenericField($field_show);
            $selected = ($items->getGenericField($field_value) == $defaultValue) ? 'selected="selected"' : '';
            $control .= "<option value=\"$val\" $selected>$value_Show</option>";
        }

        $control .= "</select>";

        return $control;
    }

    static public function selectObject2($id, $object, $field_value, $field_show, $default_value = array(), $defaultValue = 0, $isHtmlEntities = false, $attributes = array())
    {
        $list_attrib = implode(' ', $attributes);
        $id_s = str_replace('[', '', $id);
        $id_s = str_replace(']', '', $id_s);
        $control = "<select name=\"$id\" id=\"$id_s\" $list_attrib>";

        //agrego los valores por defecto
        if ($default_value) {
            foreach ($default_value as $key => $value) {
                $key = $isHtmlEntities ? utf8_decode(htmlentities($key)) : $key;
                $value = $isHtmlEntities ? utf8_decode(htmlentities($value)) : $value;

                $selected = preg_match("/^$key$/", $defaultValue) ? 'selected="selected"' : '';
                $control .= "<option value=\"$key\" $selected>$value</option>";
            }
        }
        //lleno el select con los valores de la base de datos

        for ($i = 0; $i < $object->Count(); $i++) {
            $items = $object->GetItem($i);
            $val = $isHtmlEntities ? utf8_decode(htmlentities($items->GetItem($field_value))) : $items->GetItem($field_value);
            $value_Show = $isHtmlEntities ? utf8_decode(htmlentities($items->GetItem($field_show))) : $items->GetItem($field_show);
            $selected = ($items->GetItem($field_value) == $defaultValue) ? 'selected="selected"' : '';
            $control .= "<option value=\"$val\" $selected>$value_Show</option>";
        }

        $control .= "</select>";

        return $control;
    }

    /**
     * @param string $id id del control
     * @param array  $values listado de valores que se van  a mostrar en el listado
     * @param string $defaultValue valor por defecto que va a quedar selccionado
     * @example   array('valor'=>'Valor Mostrar', 'valor1'=>'Valor Mostrar1', 'valor2'=>'Valor Mostrar2');
     * @param bool $isHtmlEntities para usar la funci�n htmlentities se debe poner este par�metro en true
     * @param array  $attributes aqui se pasan todos los atributos extras Ej:
     * @example array('class="nombreclass"', 'size="20"') y otrs atributos que se deseen agregar
     * @return string control Select
     * */
    static public function select($id, $values = array(), $defaultValue = 0, $isHtmlEntities = false, $attributes = array(), $excluirKey = array())
    {
        $list_attrib = implode(' ', $attributes);
        $name = $id;
        $id_s = str_replace('[', '', $id);
        $id_s = str_replace(']', '', $id_s);
        $control = "<select name=\"$name\" id=\"$id_s\" $list_attrib>";
        //lleno el select con los valores de la base de datos
        foreach ($values as $key => $value) {

            if (!in_array($key, $excluirKey)):

                $key = $isHtmlEntities ? htmlentities($key) : $key;
                $value = $isHtmlEntities ? htmlentities($value) : $value;

                $selected = preg_match("/^$key$/", $defaultValue) ? 'selected="selected"' : '';
                $control .= "<option value=\"$key\" $selected>$value</option>";

            endif;
        }


        $control .= "</select>";

        return $control;
    }

    /**
     * @param string $id id del control
     * @param string $value valor que va a quedar seleccionado en el control
     * @param array  $attributes aqui se pasan todos los atributos extras Ej:
     * @example array('class="nombreclass"', 'size="20"') y otrs atributos que se deseen agregar
     * @return string control input type="hidden"
     * */
    static public function file($id, $attributes = array())
    {
        $list_attrib = implode(' ', $attributes);
        $id_s = str_replace('[', '', $id);
        $id_s = str_replace(']', '', $id_s);
        return "<input type=\"file\" name=\"$id\" id=\"$id_s\" value=\"\" $list_attrib  />";
    }
    private function uploadImage($image, $pathToSave,$msgs)
{

    $errors ="";
    $foo = new Upload($image);

    $myima = '';
    NombreFileRandom('.'.$foo->file_src_name_ext, $pathToSave, $nameFile);

    if($foo->file_is_image):
        // $isImage = true;
        $foo->file_new_name_body = $nameFile;
        $foo->Process($pathToSave);
        if($foo->processed):
            $myima .= $nameFile.'.'.$foo->file_src_name_ext;
        else:
            $errors = $msgs["UPLOAD_ERROR_SERVER"];
        endif;

    else:
        $errors = $msgs["UPLOAD_ERROR_ONLY_IMAGES"];
    endif;

    return array("filename"=>$myima,"errors"=>$errors);
}
    private function uploadFile($image, $pathToSave,$msgs)
    {

        $errors ="";
        $foo = new Upload($image);

        $myima = '';
        $nameFile = $foo->file_src_name;
         $foo->Process($pathToSave);
            if($foo->processed):
                $myima = $nameFile;
            else:
                $errors = $msgs["UPLOAD_ERROR_SERVER"];
            endif;



        return array("filename"=>$myima,"errors"=>$errors);
    }
    static public function BoolToStr($strs,$value)
    {
        if($value==true)
            return $strs["GEN_YES"];
        else
            return $strs["GEN_NO"];

    }
    static public function IsInArray($arr,$value)
    {

        for($i=0;$i<count($arr);$i++)
            if($arr[$i]===$value)
                return $i;
 return -1;
    }
    static  public function SplitStrings($str,$sp)
{
  $r = array();
    $t ="";

    for($i = 0; $i<strlen($str);$i++)
        if($str[$i]==$sp)
        {
            $r[].= $t;
            $t="";
        }
    else
        $t .=$str[$i];

    if($t!="")
        $r[].= $t;

    return $r;
}
     public function Upload($imagename,$uploadfolder,$msgs,$func)
    {
        $r = array();
include_once("Common/Upload.php");
        include_once("Common/funciones.php");
        $json = array('status' => 1);
        $cant = count($_FILES);
       // $o = $_REQUEST['imagenes_actuales']; //cantidad de imagenes actuales

        $guardados = true;
        if ($cant):
            $listImages = $_FILES;

        foreach($listImages as $key=>$value)
            if($key==$imagename || $imagename=="")
        {

            $ima = array();
            $ima['name'] = $value['name'];
            $ima['type'] =$value['type'];
            $ima['tmp_name'] = $value['tmp_name'];
            $ima['error'] = $value['error'];
            $ima['size'] = $value['size'];

            if(stripos($ima["type"],"application")!==false)
            {  $t = $this->uploadFile($ima, $uploadfolder["files"],$msgs);

            }
            else
                $t = $this->uploadImage($ima, $uploadfolder["imgs"],$msgs);




            if ($t["errors"] != "") {
                $guardados = false;
                break;
            } else {
                $r[].= $t["filename"];
            }

        }


          endif;

    if ($guardados)
          $json['fn'] = ' window.top.window.showMsg("sh-ok", "'.  $msgs["UPLOAD_OK"] .'"); '.$func;
    else
    { $json['fn'] = ' window.top.window.showMsg("sh-error","'.  $msgs["UPLOAD_ERROR_GENERAL"] .'");';
        $json['status']=0;}

       // echo '<script language="javascript" type="text/javascript">window.top.window.AjaxJson(eval(\'(' . json_encode($json) . ')\'));</script> ';
   $json['filenames'] = $r;
        return $json;

    }
}


?>