$(document).ready(function() {
    dmLog();
    $('#saveGold').click(function () {
        var gold = $("#goldAmount").val();
        $('#goldList :selected').each(function() {
            var user = $(this).text();
            var ajaxUrl = '/php/actions.php?action=gold&gold=' + gold + '&user=' + user;
            $.post(ajaxUrl, function(){
                var log = "Added " + gold +" gold to " + user + "'s balance.";
                addToLog(log);
                dmLog();
                $('#giveGold').modal('toggle');

            })
        });

    });

    $('#saveExp').click(function () {
        var exp = $("#exp").val();
        $('#players :selected').each(function() {
            var user = $(this).text(),
                ajaxUrl = '/php/actions.php?action=setExp&exp=' + exp + '&user=' + user;
            $.post(ajaxUrl, function(){
                var log = "Added " + exp +" exp to " + user + ".";
                addToLog(log);
                dmLog();
                $('#giveExp').modal('toggle');
            })
        });

    });

    $('#saveHp').click(function () {
        var hp = $("#hp").val();
        $('#playersHpList :selected').each(function() {
            var user = $(this).text(),
                ajaxUrl = '/php/actions.php?action=setHp&hp=' + hp + '&user=' + user;
            $.post(ajaxUrl, function(){
                var log = "Added " + hp +" HP to " + user + ".";
                addToLog(log);
                dmLog();
                $('#modHealth').modal('toggle');
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
            var log = "Added " + itemName +" with a " + mod + stats + " " + stat+ " to " + user + "'s inventory.";
            addToLog(log);
            dmLog();
            $('#manageInv').modal('toggle');
        })

    });

    function addToLog(data){
        var now = new Date(),
            date = now.format("m/dd/yy H:M:ss");
        console.log(data);
        var newData = data.replace (/^/, date + ' - ');
        console.log(newData);
        var ajaxUrl = '/php/actions.php?action=dmLog&log=' + newData;
        $.post(ajaxUrl, function(data){
            dmLog();
        });
    }

    function dmLog(){
        $('.dm-log').html("");
        var file = '../data/dm-log.txt';
        jQuery.get(file, function(data) {
            //process text file line by line
            $('.dm-log').html(data.replace('n',''));
        });
    }

    // for when users update the log

    $(function () {
        setInterval(dmLog, 5000);
    });


});

