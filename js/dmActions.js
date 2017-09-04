$(document).ready(function() {
    $('#saveGold').click(function () {
        var gold = $("#goldAmount").val();
        $('#goldList :selected').each(function() {
            var ajaxUrl = '/dnd/php/actions.php?action=gold&gold=' + gold + '&user=' + $(this).text();
            $.post(ajaxUrl, function(e){
                console.log(e);
            })
        });

    });

    $('#saveItem').click(function () {
        var itemName = $("#itemName").val(),
            itemType = $("#itemType").val(),
            stats = $("#statMod").val(),
            cost = $("#cost").val(),
            stat = $("#stat").find(":selected").text();
            ajaxUrl = '/dnd/php/actions.php?action=addItem&itemType='+ itemType +'&itemName=' + itemName + '&statMod=' + stats + '&stat'+ stat +'&cost=' + cost + '&user=' + $('#players').find(':selected').text();
        $.post(ajaxUrl, function(){
            location.reload();
        })

    });

});