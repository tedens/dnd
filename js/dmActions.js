$(document).ready(function() {
    $('#saveGold').click(function () {
        var gold = $("#goldAmount").val();
        $('#goldList :selected').each(function() {
            var ajaxUrl = '/php/actions.php?action=gold&gold=' + gold + '&user=' + $(this).text();
            $.post(ajaxUrl, function(){
                location.reload();
            })
        });

    });

    $('#saveExp').click(function () {
        var exp = $("#exp").val();
        $('#players :selected').each(function() {
            var ajaxUrl = '/php/actions.php?action=setExp&exp=' + exp + '&user=' + $(this).text();
            $.post(ajaxUrl, function(){
                location.reload();
            })
        });

    });

    $('#saveItem').click(function () {
        var itemName = $("#itemName").val(),
            itemType = $("#itemType").val(),
            stats = $("#statMod").val(),
            cost = $("#cost").val(),
            desc = $("#desc").val(),
            stat = $("#stat").val(),
            user = $("#playerList").find(":selected").text(),
            mod = $("#mod").find(":selected").val(),
            ajaxUrl = '/php/actions.php?action=addItem&itemType='+ itemType +'&itemName=' + itemName + '&statMod=' + mod + stats + '&stat='+ stat + '&desc=' + desc + '&cost=' + cost + '&user=' + user;
        $.post(ajaxUrl, function(){
            location.reload();
        })

    });

});
