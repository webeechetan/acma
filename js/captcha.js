function validate_captcha(){
    let filled_captcha = $(".captcha_input").val();
    let generated_captcha = $(".generated_captcha").val();
    if(filled_captcha == generated_captcha){
        return true;
    }
    return false;
}

$(".apply_captcha").submit(function(e){
    e.preventDefault();
    if(validate_captcha()){
        this.submit();
    }else{
        $(".captcha_error").html('Invalid Captcha Code');
    }
});