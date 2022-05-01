<?php
function NombreFileRandom($extensionFile, $direccionFichero, &$prefijo = '')
{
    $prefijo = md5(rand(1, 999999999999999999999)*microtime());
    $fullFilePath = $direccionFichero.$prefijo.$extensionFile;
    if(file_exists($fullFilePath))
        NombreFileRandom($extensionFile, $direccionFichero, $prefijo);
}
function DeleteFile($fileName)
{
    if(file_exists($fileName))
    {
        @chmod($fileName, 0777);
        @unlink($fileName);
    }
}
