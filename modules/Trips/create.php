<?php
include_once('../../config.php');
$_SESSION['languages']->LoadFromPath(ROOT_MODULES . 'Trips/config/', $_SESSION['languages']->GetLang());
include_once(PHPDOTNETROOT . 'includes/helper.php');
?>


<div style="height: 220px; width:300px;text-align: center">
    <form id="frmpolo" name="frmpolo" method="post"
          enctype="multipart/form-data" target="ifrmimages" action="">

       <div class="createtrip">
        <div class="places">   <h1><?php echo  $_SESSION['languages']->GetString('DEFINE_STAY_TIME');?></h1>
         <ul id="plac" class="plac">


         </ul>

        </div>
        <div style="margin-bottom: 2%;">
            <h1><?php echo  $_SESSION['languages']->GetString('DEFINE_DATE');?></h1>
            <ul>
                <li > <label for="dateinitrip"></label><input id="dateinitrip" name="dateinitrip" type="date" value=""></li>
                <li >     <label for="datefintrip"></label><input id="datefintrip" name="datefintrip" type="date" value="">
                </li>


            </ul>



        </div>
       </div>
        <div class="cb"></div>
        <div>
            <?php

            echo THelper::submit('guardar', $_SESSION['languages']->GetString('SAVE'), array('class="btn-confirm"'));
            echo THelper::button('cancelar', $_SESSION['languages']->GetString('CANCEL'), array('class="btn-confirm"'));
            ?>

        </div>
        <div class="cb"></div>
    </form>
</div>

<script>
    $(function () {

        var j = JSON;

        var tempdata = j.parse($('.update-tours-list')[0].selected.attr("value"));
        var i ;

                for(i=0;i<tempdata.length;i++)
                plac.innerHTML += ' <li ><div style="width: 70%;float:left;"> <label for="' + tempdata[i] + '">' + markers[map.GetMarkerByCode(tempdata[i])].name + '</label></div><input id="' + tempdata[i] + '" name="' + tempdata[i] + '" type="input" value=""></li>';

        $('#frmpolo').validate({
            rules: {

                'dateinitrip': {required:true} ,
                'datefintrip': {required:true}
            },
            messages: {

                'dateinitrip': {required:'<?php  echo $_SESSION['languages']->GetString("FIELD_REQUIRED");?>'} ,
                'datefintrip': {required:'<?php  echo $_SESSION['languages']->GetString("FIELD_REQUIRED");?>'}
            },
            debug: true,
            errorElement: 'div',
            submitHandler: function(form){

                 if(IsValidTime())
                 {

               var data = $('#frmpolo').serialize()+"&idtrip=<?php echo $_REQUEST["item"]; ?>";
                  //  alert(data);
                AjaxRequest('<?php echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('lang='.$_SESSION['languages']->GetLang().'&op=controller&dataset=DSCubaMyWay&dspath=DSCubaMyWay.Designer&table=t_realtrip&task=add&silent=true&iduser='.$_SESSION["authuser"]["id"]);?>&'+data, 'frmpolo', function(j){

                    AjaxJson(j);

                    if(  $('#sh-ok')!=null)
                    {

                   data = [];
                        for(i=0;i<tempdata.length;i++)
                        data.push(tempdata[i] + '-' + $("#" + tempdata[i].toString())[0].value);

                        AjaxRequest('<?php echo LIVESITE.'createtrip/'.\UrlCrypt\UrlCrypt::encrypt('lang='.$_SESSION['languages']->GetLang().'&dataset=DSCubaMyWay&dspath=DSCubaMyWay.Designer&task=add&iduser='.$_SESSION["authuser"]["id"]);?>&data='+data.toString(), 'frmpolo', function(j){

                            AjaxJson(j);

                            if(  $('#sh-ok')!=null)
                            {
                                $('#popupwindow').hide();
                            }
                        } , 'json','<?php echo PHPDOTNETROOTLIVE?>',errors);
                    }
                } , 'json','<?php echo PHPDOTNETROOTLIVE?>',errors);

                 }
                else
                 alert("<?php  echo $_SESSION['languages']->GetString("TRIP_DATE_ERROR"); ?>");
            }
        });
        $('#cancelar').bind('click', function () {


            $('#popupwindow').hide();
        });
        /**
         * @return {boolean}
         */
        function IsValidTime()
        {
            var s= 0;
            for(i=0;i<tempdata.length;i++)
            {
                var t =   $("#"+tempdata[i].toString())[0].value;
            if(t.toString()=="")
            return false;
                else
            s+= parseInt(t);
            }
          var start=  Date.parse(dateinitrip.value);
            var end=  Date.parse(datefintrip.value);
            var diff = Math.round((end- start)/(1000*60*60*24));
                     return diff>=s;
        }
    });
</script>
