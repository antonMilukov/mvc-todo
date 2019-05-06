$( document ).ready(function() {
    //
});

window.oTasks = {

    /**
     * Setting param for sort form and submit it
     * @param column
     */
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