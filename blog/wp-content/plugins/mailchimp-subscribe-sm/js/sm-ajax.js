	(function($){
    $(document).ready(function() {
    $('.myform').on('submit',function(){
         
        // Add text 'loading...' right after clicking on the submit button. 
        $('#response').text('Processing'); 
         
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(result){
                if (result == 'success'){
                    $('#response').text('Thank You for subscribing!');  
                } else if(result == 'run_url'){
                   var sub_url = $('.ssm_sub_url').val();
                    window.location.assign(sub_url);
                }else {
                    $('#response').text('Error');
                }
            }
        });
         
        // Prevents default submission of the form after clicking on the submit button. 
        return false;   
    });
});
})(jQuery);