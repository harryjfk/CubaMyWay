//administration = new Object();

administration = {
    Redirect: function (p) {
        document.location.href = this.Path + p;

    },
    IsValid: function (idform, name, conn, url, lang) {
        //   $('#nameedit').hide();
        var data = $('#' + idform).serialize();
        data = data + '&op=check';
        var p = "";

        if (url === "") p = this.WebPath;
         else {
                p = url;
                p += lang;
               }
        $.ajax({
            url:this.Path + 'controller',
            data:data,
            type:'POST',
            dataType:'json',
            success:function (request) {
                if (request.value) {

                    document.location.href = p;
                }

                else {
                     if(error!==null)
                     {
                    error.innerHTML = name;
                    error.style.display = "";
                     }
                }

            },
            error:function (xhr, status) {
                if(error!==null)
                {
                error.innerHTML = conn;
                error.style.display = "";
                }
            },
            complete:function (request) {
            }


        })
    }, SetPath:function (path, root) {
        this.Path = path;
        this.WebPath = root;

    }, Register:function () {
        var data = $('#form1').serialize();
        data = data + '&op=check';
        var p = this.WebPath;

        $.ajax({
            url:this.Path + 'controller',
            data:data,
            type:'POST',
            dataType:'json',
            success:function (request) {

                if (request.value) {

                    document.location.href = p;
                }

                else {

                    if (buttoned.childNodes.length > 2)
                        buttoned.removeChild(buttoned.childNodes[2]);
                    var div = $('#buttoned');    // alert(div.Text);

                    div.append('<div id="errmsg" class="errmsg" >' + request.reason + '</div>')


                }

            },
            error:function (xhr, status) {
                if (buttoned.childNodes.length > 2)
                    buttoned.removeChild(buttoned.childNodes[2]);
                var div = $('#buttoned');    // alert(div.Text);

                div.append('<div id="errmsg" class="errmsg" >Error en la conexion con el servidor</div>')
                ;
            },
            complete:function (request) {
            }


        })


    }

}
