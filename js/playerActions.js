$(document).ready(function() {
    playerLog();
    function post(ajaxUrl, willAlert){
        $.post(ajaxUrl, function (data) {
            if(willAlert >= 1) {
                alert(data);
            }

            location.reload();
        });
    }
    //rerolling user stats
    $('#reroll').click(function () {
        if (confirm("Are you sure?") == true) {
            var uname = $(this).data('uname'),
                ajaxUrl = '/php/actions.php?action=reroll&user=' + uname;
            $.post(ajaxUrl, function () {
                var log = uname + " has rerolled their stats.";
                addToLog(log);
                location.reload();
            });
        }
    });

    $('#satisfiedButton').click(function () {
        if (confirm("Are you sure?") == true) {
            var uname = $(this).data('uname'),
                ajaxUrl = '/php/actions.php?action=satisfy&user=' + uname;
            $.post(ajaxUrl, function () {
                var log = uname + " has rerolled their stats.";
                addToLog(log);
                location.reload();
            });
        }
    });
    $('.itemEquip').click(function(){
        var uname = $(this).data('uname'),
            item = $(this).val(),
            type = $(this).data('type'),
            ajaxUrl = '/php/actions.php?action=unequipItem2&user=' + uname + '&type=' + type,
            ajaxUrl2 = '/php/actions.php?action=equipItem&user=' + uname + '&item=' + item;
        $.post(ajaxUrl, function (e) {
              $.post(ajaxUrl2, function (e) {
                  var log = uname + " equiped " + item;
                  addToLog(log);
                  location.reload();
              });
        });
    });
    $('.sellItem').click(function(){
        if (confirm("Are you sure?") == true) {
            var user = $(this).data('uname'),
                item = $(this).val(),
                log = user + " sold their " + item;
            addToLog(log);
            sellItem(user, item);
            location.reload();
        }
    });

    $('.itemUnEquip').click(function(){
        var uname = $(this).data('uname'),
            item = $(this).val(),
            ajaxUrl = '/php/actions.php?action=unequipItem&user=' + uname + '&item=' + item;
        $.post(ajaxUrl, function () {
            var log = uname + " unequiped " + item;
            addToLog(log);
            location.reload();
        });
    });
    // Setting name function
    $('#saveName').click(function () {
        var uname = $(this).data('uname'),
            fname = $("#firstName").val(),
            lname = $("#lastName").val(),
            ajaxUrl = '/php/actions.php?action=setName&user=' + uname + '&fname=' + fname + '&lname=' + lname;
        $.post(ajaxUrl, function () {
            location.reload();
        });
    });
    $('#saveAlign').click(function(){
        var uname = $(this).data('uname'),
            align = $('#alignSelect').find(":selected").text(),
            ajaxUrl = '/php/actions.php?action=setAlign&user=' + uname + '&align='+ $.trim(align);
        $.post(ajaxUrl, function () {
            location.reload();
        });
    });
    $('#saveAge').click(function(){
        var uname = $(this).data('uname'),
            age = $('#age').val(),
            ajaxUrl = '/php/actions.php?action=setAge&user=' + uname + '&age='+ $.trim(age);
        $.post(ajaxUrl, function () {
            location.reload();
        });
    });
    $('#saveRace').click(function(){
        var uname = $(this).data('uname'),
            race = $('#race').find(":selected").text(),
            ajaxUrl = '/php/actions.php?action=setRace&user=' + uname + '&race='+ $.trim(race);
        $.post(ajaxUrl, function () {
            location.reload();
        });
    });
    $('#saveSkill').click(function(){
        var uname = $(this).data('uname'),
            skill = $('#skill').find(":selected").text(),
            ajaxUrl = '/php/actions.php?action=saveSkill&user=' + uname + '&skill='+ $.trim(skill);
        $.post(ajaxUrl, function () {
            location.reload();
        });
    });
    $('#saveSpell').click(function(){
        var uname = $(this).data('uname'),
            spellLvl = $('#spellLvl').find(":selected").text(),
            spellName = $('#spellName').val(),
            spellDesc = $('#spellDesc').val(),
            ajaxUrl = '/php/actions.php?action=saveSpell&user=' + uname + '&spellLvl=' + $.trim(spellLvl) + '&spellName=' + $.trim(spellName) + '&spellDesc=' + $.trim(spellDesc);
        $.post(ajaxUrl, function () {
          var log = uname + " added a level " + spellLvl + " called " + spellName + " to their spell list.";
          addToLog(log);
          addToPlayerLog(log);
            location.reload();
        });
    });
    $('.removeSpell').click(function(){
        if (confirm("Are you sure?") == true) {
            var user = $(this).data('uname'),
                spell = $(this).val(),
                ajaxUrl = '/php/actions.php?action=removeSpell&user=' + user + '&spell=' + spell;
                $.post(ajaxUrl, function () {
                    var log = user + " removed " + spell + " from their spell list.";
                    addToLog(log);
                    addToPlayerLog(log);
                    location.reload();
                });
        }
    });
    $('#saveClass').click(function(){
        var uname = $(this).data('uname'),
            playerClass = $('#class').find(":selected").text(),
            ajaxUrl = '/php/actions.php?action=setClass&user=' + uname + '&class='+ $.trim(playerClass);
        $.post(ajaxUrl, function () {
            location.reload();
        });
    });
    $('#saveGender').click(function(){
        var uname = $(this).data('uname'),
            gender = $("#gender").val(),
            ajaxUrl = '/php/actions.php?action=setGender&user=' + uname + '&gender='+ $.trim(gender);
        $.post(ajaxUrl, function () {
            location.reload();
        });
    });

    $('#tradeGoldButton').click(function(){
        if (confirm("Are you sure?") == true) {
            var uname = $(this).data('uname'),
                usersGold = $(this).data('origgold'),
                gold = $("#tradeGoldAmount").val(),
                playerToTrade = $("#goldTradeList").find(":selected").text(),
                ajaxUrl = '/php/actions.php?action=tradeGold&user=' + uname + '&gold=' + gold + '&player=' + playerToTrade;
            if (gold > usersGold) {
                alert("You do not have that much gold.");
            } else {
                $.post(ajaxUrl, function () {
                    var log = uname + " gave " + gold + "g to " + playerToTrade;
                    addToLog(log);
                    location.reload();
                });
            }
        }
    });

    $('#saveUser').click(function(){
        var uname = $("#username").val();
          window.location.replace("index.php?" + uname);
    });

    $('#tradeItemButton').click(function(){
        if (confirm("Are you sure?") == true) {
            var uname = $(this).data('uname'),
                item = $("#itemToTrade").find(":selected").text(),
                playerToTrade = $("#tradeList").find(":selected").text(),
                ajaxUrl = '/php/actions.php?action=unequipItem&user=' + uname + '&item=' + item;
            ajaxUrl2 = '/php/actions.php?action=tradeItem&user=' + uname + '&item=' + item + '&player=' + playerToTrade;
            $.post(ajaxUrl, function (e) {
                $.post(ajaxUrl2, function (e) {
                    var log = uname + " traded " + item + " to " + playerToTrade;
                    addToLog(log);
                    location.reload();
                });
            });
        }
    });

    $('.quiverAdd').click(function(){
        var uname = $(this).data('uname'),
            item = $(this).val(),
            amount = $(this).data('amount'),
            ajaxUrl = '/php/actions.php?action=quiverAdd&user=' + uname + '&item=' + item;
        $.post(ajaxUrl, function () {
            var log = uname + " gained an arrow. They have " + amount + " left.";
            addToLog(log);
            location.reload();
        });

    });
    $('.quiverDel').click(function(){
        var uname = $(this).data('uname'),
            item = $(this).val(),
            amount = $(this).data('amount'),
            ajaxUrl = '/php/actions.php?action=quiverDel&user=' + uname + '&item=' + item;

        if (amount == '-1'){
          alert("Your quiver is empty");
        } else {
        $.post(ajaxUrl, function () {
            var log = uname + " used an arrow. They have " + amount + " left.";
            addToLog(log);
            location.reload();
        });
      }

    });

    $('#saveRollDice').click(function(){
        var uname = $(this).data('uname'),
            dtype = $("#diceType").find(":selected").val(),
            amount = $("#rollAmount").val(),
            memo = $("#rollMemo").val(),
            ajaxUrl = '/php/actions.php?action=rollDice&user=' + uname + '&type='+ $.trim(dtype) + '&amount=' + amount + '&memo' + memo;
        if (amount == '' || memo == '' ){
            alert("Please be sure you set how many dice to roll and why you are rolling for other players and the dm to know.")
        } else {
            $.post(ajaxUrl, function (e) {
                $("#diceResult").text('Dice roll result: ' + e);
                var log = uname + " rolled a " + dtype + " sided dice " + amount + " times for " + memo + ". The result was: " + e;
                addToLog(log);
                addToPlayerLog(log);
            });
        }
    });

    function sellItem(user, item){
        var ajaxUrl = '/php/actions.php?action=sellItem&user=' + user + '&item=' + item;
        post(ajaxUrl, 1);
    }

    function addToLog(data){
        var now = new Date(),
            date = now.format("m/dd/yy H:M:ss");
        var newData = data.replace (/^/, date + ' - ');
        var ajaxUrl = '/php/actions.php?action=dmLog&log=' + newData;
        $.post(ajaxUrl, function(){
            console.log("Action Logged -- " + newData);
        });
    }

    function addToPlayerLog(data){
        var now = new Date(),
            date = now.format("m/dd/yy H:M:ss");
        var newData = data.replace (/^/, date + ' - ');
        var ajaxUrl = '/php/actions.php?action=playerLog&log=' + newData;
        $.post(ajaxUrl, function(e){
            console.log("Action Logged -- " + newData);
        });
    }

    function playerLog(){
        $('.player-log').html("");
        var file = '../data/player-log.txt';
        jQuery.get(file, function(data) {
            //process text file line by line
            $('.player-log').html(data);
        });
    }

    // for when users update the log

    $(function () {
        setInterval(playerLog, 5000);
    });


});
