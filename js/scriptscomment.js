$("#commentButton").click(function(){
    text = $('#commentText').val();
    
    uid = $("#uid").val();
    gid = $("#gid").val();
    // alert($uid+" "+$gid+" "+ text);
    // alert($gid);
    
    $.post("savecomment.php", {
        "uid": uid,
        "gid": gid,
        "comment": text
    }, function(data){
        // alert(data);
        $("#commentul").append('<li class="list-group-item">'+ text +'</li>');

    });

});


