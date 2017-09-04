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

    function sellItem(user, item){
        var ajaxUrl = '/dnd/php/actions.php?action=sellItem&user=' + user + '&item=' + item;
        post(ajaxUrl, 1);
    }

});