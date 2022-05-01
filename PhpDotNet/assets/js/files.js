FilesChecker = function()
{

};
FilesChecker.prototype = {

    /**
     * @return {boolean}
     */
    IsImg: function (path)
    {
     return  path.indexOf(".png")!=-1||path.indexOf(".jpg")!=-1||path.indexOf(".bmp")!=-1||path.indexOf(".gif")!=-1;
    }

};