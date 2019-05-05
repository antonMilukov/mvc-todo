$( document ).ready(function() {
    //
});

window.oTasks = {
    order: function (column) {
        var field = $('#field-sort');
        var form = $('#tasks-form');
        var r = column;
        var url = new URL(window.location.href);
        var currentSortString = url.searchParams.get("sort");

        if (currentSortString == column){
            r = '-' + r;
        }

        field.val(r);
        form.submit();
    }
};

window.updateURLParameter = function(url, param, paramVal){
    var newAdditionalURL = "";
    var tempArray = url.split("?");
    var baseURL = tempArray[0];
    var additionalURL = tempArray[1];
    var temp = "";
    if (additionalURL) {
        tempArray = additionalURL.split("&");
        for (var i=0; i<tempArray.length; i++){
            if(tempArray[i].split('=')[0] != param){
                newAdditionalURL += temp + tempArray[i];
                temp = "&";
            }
        }
    }

    var rows_txt = temp + "" + param + "=" + paramVal;
    return baseURL + "?" + newAdditionalURL + rows_txt;
}