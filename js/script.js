jQuery(document).ready(function(){
    //Get Form
    var form=jQuery("#ajax-contact");
    
    //Messages
    var formMessages=jQuery("#form-messages");
    
    //Form Event Handler
    jQuery(form).submit(function(event){
        //Stop browser from submitting form
        event.preventDefault();
        console.log("Contact form submitted");
        //Serialize data
        var formData=jQuery(form).serialize();
        
        //Submit with AJAX
        jQuery.ajax({
            type: "POST",
            url: jQuery(form).attr("action"),
            data: formData
        }).done(function(response){
            //Make sure message is success
            jQuery(formMessages).removeClass("error");
            jQuery(formMessages).addClass("success");
            
            //Set message text
            jQuery(formMessages).text(response);
            
            //Clear form fields
            jQuery("#name").val("");
            jQuery("#email").val("");
            jQuery("#message").val("");
        }).fail(function(data){
            //Make sure message is success
            jQuery(formMessages).removeClass("success");
            jQuery(formMessages).addClass("error");
            
            //Set message text
            if(data.responseText!="")
                jQuery(formMessages).text(data.responseText);
            else{
                jQuery(formMessages).text("An unknown error occurred.");
            }
        });
    });
});