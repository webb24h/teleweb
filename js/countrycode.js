$(document).ready(function(){
    
    $(document).on('click','.flag-container',function(){

    //get the country code
    var countryCode = $(".selected-dial-code").html();
    
    if(countryCode !==''){
        
      $('#countryCode').val(countryCode);
        
    }
    });
});