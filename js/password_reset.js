$("#password_reset_modal").submit(function(e){
    e.preventDefault();
    let email = $("#password_reset_email").val();
    $.post("index.php",{action:'password_reset',email:email},function(data,status){
        data = JSON.parse(data)
        $(".password_reset_msg").html(data.msg)
        if(data.code==200){
            $("#password_reset_email").val('');
            setTimeout(function(){
                $(".modal_close_btn").click();
            },5000);
        }
    });
});