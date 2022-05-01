
<div class="msgpanel">

<div class="msgtab">
  <ul id="itemlist1">
      <li class="selected"><a class="updtabmsg" href="2">Bandeja de Entrada</a></li>
      <li><a  class="updtabmsg" href="1">Enviados</a></li>
  </ul>
</div>

    <div id="updatemsgpanel" class="updatemsgpanel">


        <?php
        include (ROOT_MODULES.'Messages/list.php')?>

    </div>
</div>

<script type="text/javascript">

    $(function () {
        $('a.updtabmsg').bind('click', function () {
            var $this = $(this);
            var r = "<?php echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=module&module=messages&view=list&lang='.$_SESSION["languages"]->GetLang()); ?>";
          r+="&msgtypes="+$this.attr('href');
            for (i = 0; i < itemlist1.children.length; i++)

                itemlist1.children[i].classList.remove("selected");

            if (!this.classList.contains("none"))
                this.parentNode.classList.add("selected");

            AjaxUpdate(r, 'updatemsgpanel', '', '<?php echo LIVESITE;?>',errors);

            return false;
        });


    });

</script>