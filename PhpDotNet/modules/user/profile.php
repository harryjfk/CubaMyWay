<?php

if(!empty($_REQUEST["otherpages"]))
{    if($_REQUEST["otherpages"]!=="")
{
    ?>
<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Datos generales</a></li>
  <?php  $t= explode(',',$_REQUEST["otherpages"])     ;

       function CreateLink($page,$i){
           ?>
           <li><a href="#tabs-<?php echo $i?>"><?php

               if(chdir(ROOT_MODULES.$page."/config"))

                   $_SESSION["languages"]->LoadFromPath(ROOT_MODULES.$page."/config/",$_SESSION['languages']->GetLang());
               else
                   if(chdir(PHPDOTNET_ROOT_MODULES.$page."/config"))
                       $_SESSION["languages"]->LoadFromPath(PHPDOTNET_ROOT_MODULES.$page."/config/",$_SESSION['languages']->GetLang());


               echo $_SESSION["languages"]->GetString(strtoupper($page));

               ?></a></li>
           <?php
       }
        if(count($t)>0)
        {
            for($i=0;$i<count($t);$i++)
            {
                $s =    $t[$i];

                $t1= explode(':',$s);

                CreateLink($t1[0],$i+2);
            }
        }
        else

        {
            $t1= explode(':',$_REQUEST["otherpages"])     ;
            CreateLink($t1[0],2);
        }
        ?>
    </ul>
    <div id="tabs-1" style="display: block;"><?php include('innerprofile.php');?></div>

    <?php


     function includepage($page,$module,$i)
     {
                                                                 ?>
         <div id="tabs-<?php echo $i?>">        <?php
          if(file_exists(ROOT_MODULES.$page.'/'.$module.".php"))
          include( ROOT_MODULES .$page.'/'.$module.".php") ;
         else
             if(file_exists(PHPDOTNET_ROOT_MODULES.$page.'/'.$module.".php"))
                 include (PHPDOTNET_ROOT_MODULES .$page.'/'.$module.".php") ;?> </div><?php

     }
    $t= explode(',',$_REQUEST["otherpages"])     ;
    if(count($t)>0)
    {
        for($i=0;$i<count($t);$i++)
        {
            $s =    $t[$i];

           $t1= explode(':',$s);

      includepage($t1[0],$t1[1],$i+2);
        }
    }
        else

        {
            $t1= explode(':',$_REQUEST["otherpages"])     ;
            includepage($t1[0],$t1[1],2);
        }

?>


</div>
<script type="text/javascript">


   // $(function(){

       $( "#tabs" ).tabs();
   //});



</script>

<?php
}  else
    include ('innerprofile.php');

}
else

    include ('innerprofile.php');
