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
                location.reload();


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
                location.reload();

            })
        });

    });

    $('#saveStat').click(function () {
        var stat = $("#stat").val(),
            addStat = $("#addStat").val(),
            user = $('#statPlayers').find(":selected").text(),
            ajaxUrl = '/php/actions.php?action=updateStat&stat=' + stat + '&user=' + user + '&addStat=' + addStat;
            $.post(ajaxUrl, function(){
                var log = "Added " + addStat +" to " + user + "'s " + stat + " stat.";
                addToLog(log);
                dmLog();
                $('#giveStat').modal('toggle');
                location.reload();
              })
        });



    $('#saveHp').click(function () {

        var hp = $("#hp").val();
        $('#playerHpList :selected').each(function() {
            var user = $(this).text(),
                ajaxUrl = '/php/actions.php?action=setHp&hp=' + hp + '&user=' + user;
            $.post(ajaxUrl, function(){
                var log = "Added " + hp +" HP to " + user + ".";
                addToLog(log);
                dmLog();
                $('#modHealth').modal('toggle');
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
            stat = $("#statName").find(":selected").text(),
            user = $("#playerList").find(":selected").text(),
            mod = $("#mod").find(":selected").val(),
            ajaxUrl = '/php/actions.php?action=addItem&itemType='+ itemType +'&itemName=' + itemName + '&statMod=' + mod + stats + '&stat='+ stat + '&desc=' + desc + '&cost=' + cost + '&user=' + user;
            $.post(ajaxUrl, function(){
            var log = "Added " + itemName +" with a " + mod + stats + " " + stat+ " to " + user + "'s inventory.";
            addToLog(log);
            dmLog();
            location.reload();
          })

    });

    $('#saveRestMode').click(function () {
        var restMode = $('input[name=restMode]:checked').val(),
            ajaxUrl = '/php/actions.php?action=restMode&restMode=' + restMode;
            $.post(ajaxUrl, function(e){
              if (restMode == 1){
                var rest = "On";
              } else {
                var rest = "Off";
              }
                var log = "Set Rest to "+ rest;
                addToLog(log);
                dmLog();
                $('#toggleRest').modal('toggle');
            })
        });

    function addToLog(data){
        var now = new Date(),
            date = now.format("m/dd/yy H:M:ss");
        var newData = data.replace (/^/, date + ' - ');
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
            $('.dm-log').html(data);
        });
    }

    // for when users update the log

    $(function () {
        setInterval(dmLog, 5000);
    });


});
