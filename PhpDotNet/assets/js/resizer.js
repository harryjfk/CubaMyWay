ClientControlResizer = function (h, c) {
    var ccr = this;
    this.Host = h;
    this.Client = c;

    this.params = ClientControlResizer.defaultParams;
    this.setActive(true);
};
function windowresize(f) {

    cr.ResfreshRects();
 //  if(cr.OnResize!=null)
   cr.OnResize();

}
ClientControlResizer.prototype =
{
    Host:HTMLObjectElement,
    Client:HTMLObjectElement,
    /**
     *  @s {boolean}
     * @return {boolean}
     */
    setActive:function (s) {
        if (s)
            window.onresize = windowresize;
    }, OnResize:HTMLObjectElement,
    ResfreshRects:function () {

        if (this.ResizeWidth)
            this.Client.style.width = this.Host.offsetWidth + "px";
        if (this.ResizeHeight)
            this.Client.style.height = this.Host.offsetHeight + "px";
        if (this.ResizeLeft)
            this.Client.style.left = this.Host.offsetLeft + "px";
        if (this.ResizeTop)
            this.Client.style.top = this.Host.offsetTop + "px";

    }

}
ClientControlResizer.defaultParams =
{
    ResizeLeft:true,
    ResizeTop:true,
    ResizeHeight:true,
    ResizeWidth:true
}