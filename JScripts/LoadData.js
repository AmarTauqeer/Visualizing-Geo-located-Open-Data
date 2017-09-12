function LoadData() {
    $(document).ready(function () {

        $("button").click(function () {
            $(".display_info").html(" ");
            $(document).ajaxStart(function () {
                $(".wait").css("display", "block");
            });

            var cat = document.getElementById("category").checked;
            //var distr_code = document.getElementById("districts").value;
            var distr_code = $('#districts').val();
            var category = $('#cat').val();

            var test = $.get("data.php", {
                'distr_code': distr_code,
                'cat': cat,
                'category': category
            }, function (data) {
                $(".display_info").html(data);

            }).done(function () {
                //$('.message_success').show();
                //alert("second success");
            });
            $(document).ajaxComplete(function () {
                $("#wait").css("display", "none");
            });

        });

    });



}