function AjaxUpdate(url, divupdate, idform,root,texts)
{
  blockScreen(root,texts["loading"]);
  var data = '';
  if(idform)
    data = $('#'+idform).serialize();

  try{
  $.ajax({     
      url : url,
      data : data, 
      type : 'POST',    
      dataType : 'html',    
            
      success : function(response) 
      {
        /*var divUpdate = $('#'+divupdate);        
        divUpdate.append($(response).hide().fadeIn(300));*/

        var divUpdate = $('#'+divupdate);
	if(divUpdate.html().trim())
  divUpdate.children().fadeOut(50, function(){divUpdate.empty().append($(response).hide().fadeIn(300));});
     else
        divUpdate.append($(response).hide().fadeIn(300));

          
      },
	
      error : function(xhr, status) {alert( texts["errorload"]);},
      complete: function(){
          /*$.mobile.hidePageLoadingMsg();*/
          $('#blockscreen').hide();
      }
  });
  }
  catch(ex){$('#blockscreen').hide();}
    
  return false;
}

function AjaxRequest(url, idform, myFn, dataType,root,texts)
{
  blockScreen(root,texts["loading"]);
  var data = '';
  if(idform)
  data = $('#'+idform).serialize();  
  //$.mobile.showPageLoadingMsg();

  try{
  $.ajax({      
      url : url,
      data : data, 
      type : 'POST',    
      dataType : dataType,      
      success : function(response){/*alert(response);*/myFn(response);

      },
	
      error : function(xhr, status) {alert(xhr.responseText+status);},	  
      complete: function(){$('#blockscreen').hide();}
  });
  }
  catch(e)
  {
     $('#blockscreen').hide();
    //showMsg('sh-error', ex.message);
    alert(e.message);
  }

  return false;
}

function AjaxJson(Json)
{    
  try
  {
   switch(parseInt(Json.status))
   {
      case 1:
      {
        if(Json.fn)
	      eval(Json.fn);
        break;
      }
   }
  }
  catch(ex){showMsg('sh-error', ex.message);}
}


function updateSilent(url, divupdate, idform, dataType,texts)
{
  var data = '';
  if(idform)
    data = $('#'+idform).serialize();
  try{
  $.ajax({     
      url : url,
      data : data, 
      type : 'POST',    
      dataType : dataType,    
            
      success : function(response) 
      {
        var divUpdate = $('#'+divupdate);	
	if(divUpdate.html().trim())
	  divUpdate.empty().append($(response));
        else
          divUpdate.append($(response));
      },
	
      error : function(xhr, status) {alert(texts["errorload"]);},
      complete: function(){
         $('#blockscreen').hide();
      }
  });
  }
  catch(ex)
  {
     $('#blockscreen').hide();
     //showMsg('sh-error', ex.message);     
  }
    
  return false;
}

function showMsg(cssClass, msg)
{
    var dvNotificar = $('#notif');
    var content = null;
    if(!dvNotificar.get(0))
    {
       $('<div></div>').attr('id','notif').css(
       {'position':'fixed','top':'45%', 'z-index':'200'}).addClass('ui-btn-corner-all notif')
       .appendTo('body').hide();
       
       dvNotificar = $('#notif');       
       
       var btnClose = $('<div></div>').css({'position':'absolute', 'right':'-1%', 'z-index':'26',
       'top':'-13px'}).html('+')
       .addClass('ui-btn ui-shadow ui-btn-corner-all btn-close')
       .click(function(){dvNotificar.stop(); 
       dvNotificar.fadeOut(300);});   
   
        content = $('<div></div>')
       .css({'padding-left':'7%', 'padding-right':'6%', 'padding-top':'2%', 'padding-bottom':'2%'})
       .addClass('nft-content '+cssClass)
       .html(msg);
        content.attr('id',cssClass);
       dvNotificar.append(btnClose).append(content);
    }
    else
    {
       content = dvNotificar.find('div.nft-content');
       content.removeClass('sh-ok').removeClass('sh-error').addClass(cssClass).html(msg);       
    }

    /*centrando segun el contenido que tenga el contenedor*/
    var w = $(document).width();
    dvNotificar.css({'left':'45%' /*parseInt((w/2)-parseInt(dvNotificar.width()/2))+'px'*/});

    /*si antes habia un fade ejecutandose lo paro para hacer el nuevo*/
   dvNotificar.stop();

    dvNotificar.fadeIn(300).delay(10000).fadeOut(300);
}


function deleteItem(ids, fn, prefijo)
{
	if(typeof prefijo == "undefined")
	  prefijo = '';
	  
    var list = ids.split(',');
    var i = 0;	
    for(; i < list.length; i++)
    {
        $('#'+prefijo+list[i]).fadeOut(250, function(){$(this).remove()});
    }
    if(fn)
      fn();
}

function CheckAll(selector, boolVall)
{
    var $list = $(selector);
    for(var i = 0; i < $list.length; i++)
       $list[i].checked = boolVall;
}

function algunSeleccionado(selector, msgError, fn)
{
    if($(selector).length == 0)
    {
       showMsg('sh-error', msgError);       
       return false;
    }
    else
    {
   var first=     $(selector)[0];
      if(fn)
          fn(first);
      return true;
    }
}

function loadCombo(url, idctrl, divupdate, idform, dataType,texts)
{
  var data = '';
  if(idform)
    data = $('#'+idform).serialize();
  try{
  var sel = $('#'+idctrl).get(0);
  if(sel.options[0])
   sel.options[0].text = texts["loading"];
  
  $.ajax({     
      url : url,
      data : data, 
      type : 'POST',    
      dataType : dataType,    
            
      success : function(response) 
      {
        var divUpdate = $('#'+divupdate);	
	if(divUpdate.html().trim())
	  divUpdate.empty().append($(response));
        else
          divUpdate.append($(response));
      },
	
      error : function(xhr, status) {alert(texts["errorload"]+xhr.responseText);},
      complete: function(){
          /*$.mobile.hidePageLoadingMsg();*/
      }
  });
  }
  catch(ex)
  {
     //$.mobile.hidePageLoadingMsg();
     //showMsg('sh-error', ex.message); 
     alert(ex.message);
  }
    
  return false;
}

function resetForm(id, fn)
{
  $('#'+id).get(0).reset(); 
  if(fn)
    fn();
}

function dimPadre(ele,loading)
{
   var parent = ele.parent();
    if(loading)
        ele.css({'width': '55%',
            'height': '56%',
            'position': 'absolute',
            'z-index': 150,
            'top':'0'  ,
            'padding-top':'25%'  ,'padding-left':'45%'
        });


    else
  ele.css({'width': '100%',
   'height': '100%',
   'position': 'absolute',
   'z-index': 150,
   'top':'0'
   });

}

function blockScreen(root,loading)
{

    var block = $('#blockscreen');
    if(block.get(0))
    {
      dimPadre(block,true);
      block.show();
    }
    else
    {
       block = $('<div></div>');
       block.attr('id', 'blockscreen').addClass('opaco_block');
       block.appendTo('body');
       dimPadre(block,true);
       var dvIndicador = $('<div></div>');

       var imgcargador = $('<img>').attr({'src':root+'assets/css/images/charging.gif', 'align':'absmiddle'});
       dvIndicador.append(imgcargador);
       
       dvIndicador.addClass('dvc w20p indicador').append(loading);
       
       block.append(dvIndicador);       
       block.show();
    }
}

function resetSelectByIds(ids, excluirValor, fn)
{
    var list = ids.split(',');
    var i = 0;
    var tmp = null;
    var opt = null;
    for(; i < list.length; i++)
    {
      tmp = $('#'+list[i]+' option');
      for(j = 0; j < tmp.length; j++)
      {
          opt = $(tmp[j]);
          if(opt.val() != excluirValor)
              opt.remove();
      }     
    }
    if(fn)
      fn();
}

function zoomImage(urlImage, title)
{
    var dv = $('#dialog');
    var ima = $('<img>').attr({'src':urlImage}).css({'max-width':'100%'});
    if(!dv.get(0))
    {
        dv = $('<div>');
        dv.attr({'id':'dialog', 'title':title});
        dv.appendTo('body');
    }
    else
        dv.empty();

    dv.append(ima);
    dv.dialog({show: "explode", hide: "explode"});
}


function Percent(part,total)
{

  return part*100/total;
}
function PopupWindow(url,idform,myFn,data)
{

    var block = $('#popupwindow');

    if(block[0])
        block[0].parentNode.removeChild(block[0]);


        block = $('<div></div>');
        block.attr('id', 'popupwindow').addClass('opaco_block');
        block.appendTo('body');
        dimPadre(block,false);
        block.show();


    var tdata = data;
    if(idform)
        tdata += $('#'+idform).serialize();

    try{
        $.ajax({
            url : url,
            data : tdata,
            type : 'POST',
            dataType : 'html',
            success : function(response){

                        block.append(response)  ;

var dh =(block[0].offsetHeight /2)-  (block[0].childNodes[1].offsetHeight/2);

                var dw =(block[0].offsetWidth /2)-  (block[0].childNodes[1].offsetWidth/2);

                var pheight =Percent(dh,block[0].offsetHeight)/2 ;
                   var pwidth = Percent(dw,block[0].offsetWidth) ;

                block[0].childNodes[1].style.marginTop = (pheight)+"%";
            block[0].childNodes[1].style.marginLeft = (pwidth)+"%";
                block[0].childNodes[1].classList.add("popupwindow");
            },

            error : function(xhr, status) {alert(xhr.responseText+status);},
            complete: function(){$('#blockscreen').hide();}
        });
    }
    catch(e)
    {
     //   $('#popupwindow').hide();
        //showMsg('sh-error', ex.message);
        alert(e.message);
    }




}