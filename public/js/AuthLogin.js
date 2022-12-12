(function ($, undefined) {
    $("#accountRegister").click(function () {
        $(this).button('loading');
        $.ajax({
            type:"POST",
            url:"/?/register/",
            data:$("#loginForm").serialize(),
            error:function (xhr, ajaxOptions, thrownError) {
                $("#accountRegister").button('reset');
            },
            success:function (data) {
                $("#accountRegister").button('reset');
            }
        });
        return false;
    })
})(jQuery);
