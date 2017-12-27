function refreshCode(obj) {
    var url = $(obj).attr('data-api');

    if (url) {
        $.ajax({
            url: url + '?refresh',
            dataType: 'json',
            type: 'get',
            success: function(data) {
                $(obj).attr('src', data.url);
            }
        });
    }
}

$(function () {
    refreshCode('#login_code');

    $('#login_code').click(function (event) {
        event.preventDefault();  //阻止默认行为
        event.stopPropagation(); //该方法将停止事件的传播，阻止它被分派到其他 Document 节点

        refreshCode(this);
    });

});