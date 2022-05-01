ClientEventHandler = function (h, c,hn,cn) {
    var ec = this;
    this.Host=  h;
    this.Client= c ;
    this.HostName = hn;
    this.ClientName = cn;
    this.Events = new JFKList();
    this.PreHostEv = new JFKList();
    this.PreClientEv = new JFKList();
};
 var tk= null;
ClientEventHandler.prototype =
{
   Host:HTMLBaseElement,
    Client:HTMLBaseElement,
    HostName:'', ClientName:'',

    executeEvent: function (f,n)
{
   var $this = f.srcElement.eventhandler ;
  var hname ="";
    var cname ="";
    var event = f.type;
/*
   if($this.HostName!=="")
        hname = $this.HostName;
    else
        hname = $this.Host.id;  */

    $this.Host.mousedown(f,map.onmousemove);
       //  alert(hname);
  //  $this.Host.eve
         //    eval(hname+'.'+event+'('+f+')');
         //   map.bindElementEvents();
 /*if(f.srcElement==ec.Client)
        ec.PreClientEv.BaseArray[0](f,n);    */
}  ,
        setActive:function(s)
    {
       if(s)
       {
           var i;
         for(i=0;i<this.Events.Count();i++)
         {
             var hname ="";
              var cname ="";
           this.Host.eventhandler= this;
             this.Client.eventhandler= this;
             if(this.HostName!=="")
             hname = this.HostName;
             else
             hname = this.Host.id;
             if(this.ClientName!=="")
                 cname = this.ClientName;
             else
                 cname = this.Client.id;
             var t =  eval(hname+'.'+this.Events.BaseArray[i]);
          if(t==null)
            t = eval(hname+'.'+this.Events.BaseArray[i].substring(2))  ;

          this.PreHostEv.Add(t)  ;

             this.PreClientEv.Add(eval(cname+'.'+this.Events.BaseArray[i]))  ;
             eval(hname+'.'+this.Events.BaseArray[i]+'='+this.executeEvent);
             eval(cname+'.'+this.Events.BaseArray[i]+'='+this.executeEvent);
         }

       }


    },
    Events:JFKList,
    PreClientEv:JFKList,
    PreHostEv:JFKList



};
