 $(function(){
    var textfield = $("input[name=username]");
    $('input[type="submit"]').click(function(e) {


        //little validation just to check username
        if (textfield.val() != "") {
            //$("body").scrollTo("#output");

            $("#output").removeClass(' alert-danger');
            $("input").css({
                "height":"0",
                "padding":"0",
                "margin":"0",
                "opacity":"0"
            });




        } else {
            e.preventDefault();
            //remove success mesage replaced with error message
            $("#output").removeClass(' alert alert-success');
            $("#output").addClass("alert alert-danger animated fadeInUp").html("podaj login ");
        }
        //console.log(textfield.val());

    });
});

