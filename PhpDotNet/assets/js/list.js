/**
 * @return {boolean}
 */
function ChildNodeTypeExits(src, nodetype) {
    var i;
    alert(src.childNodes);
    for (i = 0; i < src.childNodes.length; i++)
        if (src.childNodes[i].nodeName == nodetype)
            return true;
    return false;
}


JFKList = function () {

};
JFKList.prototype =
{
    BaseArray:[],
    Add:function (param) {
        this.BaseArray = this.BaseArray.concat(param);
    },
    Insert:function (param, pos) {

    }, Clear:function () {

    while (this.Count() > 0)
        this.RemoveAt(0);

},
    Remove:function (item) {
        var p = this.BaseArray.indexOf(item);
        // alert(p);
        if (p != -1)
            this.RemoveAt(p);
    },
    RemoveAt:function (pos) {
        var t = [], i;
        for (i = 0; i < pos; i++)
            t.push(this.BaseArray[i]);

        i++;
        for (i = pos + 1; i < this.BaseArray.length; i++)
            t.push(this.BaseArray[i]);
        this.BaseArray = t;
    },
    Count:function () {
        return this.BaseArray.length;
    }




};