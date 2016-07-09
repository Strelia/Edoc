$(document).ready(function(){
    $("form").submit(function(){
        GetValue("#rda_id","#rda");
        GetValue("#snap_id","#snap");
    });
});

function GetValue(nameInput, nameList) {
    var x = $(nameInput).val();
    var z = $(nameList);
    var val = $(z).find('option[value="' + x + '"]');
    var endval = val.attr('id');
    var x = $(nameInput).val(endval);
}


function SetValue(num, nameInput, nameList) {
    var z = $(nameList);
    var val = $(z).find('option[id="' + num + '"]');
    var endval = val.attr('value');
    var x = $(nameInput).val(endval);
}