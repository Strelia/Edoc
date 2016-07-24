$(document).ready(function(){

    $("#clear").click(function(){
        $("input[type=file]").replaceWith($("input[type=file]").val('').clone(true));
    });

});