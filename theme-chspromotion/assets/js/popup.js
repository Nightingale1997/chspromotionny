//Jquery för popup fönstren i browse

//Ser till att ingen kod körs tills dokumentet har laddats in för att motverka fel.
$(document).ready(function () {

    //Gömmer alla fönster texten då den inte ska visas tills klick-funktionen har utförts
    $("#popupbackground").show();
    $("#popupbackground").hide();
    $("#loginform").hide();
    $("#insertworkerform").hide();




    //Visar sektionen och artikeln som tillhör knappen"
    $("#login").click(function () {
        $("#loginform").fadeIn("2000");
        $("#popupbackground").fadeIn("2000");

    });

    $("#insert").click(function () {
        $("#insertworkerform").fadeIn("2000");
        $("#popupbackground").fadeIn("2000");

    });


    $(document).bind('click', function (e) {
        if (!$(e.target).is('.popupcontent')) {
            $("#loginform").fadeOut("1");
            $("#popupbackground").fadeOut("3000");
            $("#insertworkerform").fadeOut("3000");
        }
    });

});
