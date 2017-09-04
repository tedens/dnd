$(document).ready(function() {
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
        var uname = $(this).data('uname'),
            ajaxUrl = '/dnd/php/actions.php?action=reroll&user=' + uname;
        $.post(ajaxUrl, function () {
            location.reload();
        });
    });

    $('#satisfiedButton').click(function () {
        var uname = $(this).data('uname'),
            ajaxUrl = '/dnd/php/actions.php?action=satisfy&user=' + uname;
        $.post(ajaxUrl, function () {
            location.reload();
        });
    });
    $('.itemEquip').click(function(){
        var uname = $(this).data('uname'),
            item = $(this).val(),
            ajaxUrl = '/dnd/php/actions.php?action=equipItem&user=' + uname + '&item=' + item;
        $.post(ajaxUrl, function () {
            location.reload();
        });
    });
    $('.sellItem').click(function(){
        var user = $(this).data('uname'),
            item = $(this).val();
        sellItem(user, item)

    });

    $('.itemUnEquip').click(function(){
        var uname = $(this).data('uname'),
            item = $(this).val(),
            ajaxUrl = '/dnd/php/actions.php?action=unequipItem&user=' + uname + '&item=' + item;
        $.post(ajaxUrl, function () {
            location.reload();
        });
    });
    // Setting name function
    $('#saveName').click(function () {
        var uname = $(this).data('uname'),
            fname = $("#firstName").val(),
            lname = $("#lastName").val(),
            ajaxUrl = '/dnd/php/actions.php?action=setName&user=' + uname + '&fname=' + fname + '&lname=' + lname;
        $.post(ajaxUrl, function () {
            location.reload();
        });
    });
    $('#saveAlign').click(function(){
        var uname = $(this).data('uname'),
            align = $('#alignSelect').find(":selected").text(),
            ajaxUrl = '/dnd/php/actions.php?action=setAlign&user=' + uname + '&align='+ $.trim(align);
        $.post(ajaxUrl, function () {
            location.reload();
        });
    });
    $('#saveAge').click(function(){
        var uname = $(this).data('uname'),
            age = $('#age').val(),
            ajaxUrl = '/dnd/php/actions.php?action=setAge&user=' + uname + '&age='+ $.trim(age);
        $.post(ajaxUrl, function () {
            location.reload();
        });
    });
    $('#saveRace').click(function(){
        var uname = $(this).data('uname'),
            race = $('#race').find(":selected").text(),
            ajaxUrl = '/dnd/php/actions.php?action=setRace&user=' + uname + '&race='+ $.trim(race);
        $.post(ajaxUrl, function () {
            location.reload();
        });
    });
    $('#saveClass').click(function(){
        var uname = $(this).data('uname'),
            playerClass = $('#class').find(":selected").text(),
            ajaxUrl = '/dnd/php/actions.php?action=setClass&user=' + uname + '&class='+ $.trim(playerClass);
        $.post(ajaxUrl, function () {
            location.reload();
        });
    });
    $('#saveGender').click(function(){
        var uname = $(this).data('uname'),
            gender = $("#gender").val(),
            ajaxUrl = '/dnd/php/actions.php?action=setGender&user=' + uname + '&gender='+ $.trim(gender);
        $.post(ajaxUrl, function () {
            location.reload();
        });
    });

    function sellItem(user, item){
        var ajaxUrl = '/dnd/php/actions.php?action=sellItem&user=' + user + '&item=' + item;
        post(ajaxUrl, 1);
    }

});