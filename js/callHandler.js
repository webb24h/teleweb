$(function () {
    
  log('Connecting Agent Station...');
  
  $.getJSON('./view/token.php').done(function (data) {
      log('Agent Station Connected.');
      //console.log('Token: ' + data.token);

      // Setup Twilio.Device
      Twilio.Device.setup(data.token);

      Twilio.Device.ready(function (device) {
        log('Phone Ready For Call');
      });

      Twilio.Device.error(function (error) {
        log('Agent Station Error: ' + error.message);
        
        //update call log
        
      });

      Twilio.Device.connect(function (conn) {
        log('Success! Call Established.');
      });

      Twilio.Device.disconnect(function (conn) {
        log('Call ended.');
       //update call log 
       //get call id
       var uniquephonecallid = $('#uniquephonecallid').val();
       
       //get agentid
       var agentid = $('#endCall').attr('agentid');
       
       var uniquephonecallStatID = $('#uniquephonecallStatID').val();
       
        var valuesforms = 'agentid=' + encodeURIComponent(agentid)
                + '&uniquephonecallid=' + encodeURIComponent(uniquephonecallid);
       
       if(uniquephonecallid !=='' && uniquephonecallStatID !== '0'){
           
           //pass on to ajax
           $.ajax({
            type: 'POST',
            url: 'queries/endCall.php',  
            data:valuesforms,   
            success: function (data)
                {
                  if(data.message==='success'){
                     $('#uniquephonecallStatID').val('0');
                  }
                }
           });
           
           
       }
       
       
      });

//bind button to answer incoming call?
document.getElementById('answerCall').onclick = function () {
   // get the phone number to connect the call to
   var queueName = document.getElementById('queuename').value;
    var params = {
      To: queueName
    };
    log('Connecting agent to ' + params.To + '...');
    Twilio.Device.connect(params);
  };

      setClientNameUI(data.identity);
    })
    .fail(function () {
      log('Could not connect agent station to server!');
    });

  // Bind button to make call
  document.getElementById('makeCall').onclick = function () {
      
      var uniquephonecallStatID = $('#uniquephonecallStatID').val();
      
    // get the phone number to connect the call to
    var params = {
      To: document.getElementById('phoneScreen').value
    };

       log('Calling ' + params.To + '...');
     Twilio.Device.connect(params);  
   
      Twilio.Device.connect(function(connection) {
          
        //retrieve call sid
        var callSid = connection.parameters.CallSid;
        
       //retrieve phone number
        var phonenumber = $('#phoneScreen').val();

        //retrieve agentid
        var agentid = document.getElementById('makeCall').getAttribute('agentid');

        //retrieve campaign id
        var campaignid = $('#campadign_id').val();

        //retrieve propsect id
        var prospectid = $('#prospect_id').val();

        //insert phonenumber and agentid in call logs
        var valuesforms = 'agentid=' + encodeURIComponent(agentid)
         + '&twiliocallsid=' + encodeURIComponent(callSid)
                + '&phonenumber=' + encodeURIComponent(phonenumber)
                + '&campaignid=' + encodeURIComponent(campaignid)
                + '&prospectid=' + encodeURIComponent(prospectid);

        if (valuesforms !== '' && phonenumber !== '') {
            $.ajax({
                type: 'POST',
                url: 'queries/makeCall.php',
                data: valuesforms,
                success: function (data)
                {
                    if (data.message === 'success') {
                        $('#uniquephonecallid').val(data.uniquecallid);
                    }
                }

            });

        }

        //display call log
   
      });
  };

  // Bind button to hangup call
  document.getElementById('endCall').onclick = function () {
    log('Hanging up...');
    Twilio.Device.disconnectAll();
  };

});

// Activity log
function log(message) {
  var logDiv = document.getElementById('log');
  logDiv.innerHTML += '<p>&gt;&nbsp;' + message + '</p>';
  logDiv.scrollTop = logDiv.scrollHeight;
}

// Set the client name in the UI
function setClientNameUI(clientName) {
  var div = document.getElementById('client-name');
  div.innerHTML = 'Your client name: <strong>' + clientName +
    '</strong>';
}

/*
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */
$(document).ready(function () {
       /*
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     */
    
      $(document).on ('keyup','#jumptopagenumberinput',function() {
      var newpage = $('#jumptopagenumberinput').val();
      var campaignID = $('#campaignID').val();
      var agentID = $('#agentID').val();
      var newurl = 'index.php?callcenter&outboundcampaign&entercampaign='+campaignID+'&agent='+agentID+'&page='+newpage;
      $('a.jumptopagenumberbutton').attr('href', newurl);
    });
    //var divClone = $("#callReport").clone(true,false);
    // Use this command if you want to keep divClone as a copy of "#some_div"
//$("#callReport").replaceWith(divClone.clone()); // Restore element with a copy of divClone

// Any changes to "#some_div" after this point will affect the value of divClone
//$("#callReport").replaceWith(divClone); // Restore element with divClone itself
    /*
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     */
    
    var params = new window.URLSearchParams(window.location.search);
    
      if (params.get('agentReady') === "1") {
          
          $('#fetchProspect').hide();
      }
      
     var uniquephonecallStatID = $('#uniquephonecallStatID').val();
      var myAgentStatusTableRow = $('#myAgentStatusTableRow').html();
    
     if ( params.get('agentReady') === "1" && uniquephonecallStatID ==='') {
          
          $('#getBackInPipeline').show();
      }

    /*
     * 
     * 
     * 
     * DIALPAD
     * 
     * 
     * 
     * 
     */
    $('.numpad').click(function () {
        //Use this to get the value of the button which triggered the event
        //$(this) refers to the button which triggered the event in this context
        //You were using class numpad which returned the value of the first element in
        //the collection, that's why you kept getting a value of 1
        var number = $(this).val();

        //On this line you want to append the newly pressed key to the existing value
        //Of the element with id phoneScreen
        $('#phoneScreen').val($('#phoneScreen').val() + number);

    });
    /*
     * 
     * 
     * 
     * HANDLE END CALLS
     * 
     * 
     * 
     * 
     */

    $('#endCall').click(function () {

        //update call log 
        //get call id
        var uniquephonecallid = $('#uniquephonecallid').val();

        //get agentid
        var agentid = $('#endCall').attr('agentid');
        
        
          //retrieve phone number
        var phonenumber = $('#phoneScreen').val();


        var valuesforms = 'agentid=' + encodeURIComponent(agentid)
                + '&uniquephonecallid=' + encodeURIComponent(uniquephonecallid);

        if (uniquephonecallid !== '' && phonenumber !=='') {

            //pass on to ajax
            $.ajax({
                type: 'POST',
                url: 'queries/endCall.php',
                data: valuesforms,
                success: function (data)
                {
                    if (data.message === 'success') {

                        $('#uniquephonecallStatID').val('0');
                         $('#myAgentStatusTableRow').html('Ready For Call')
                    }
                }
            });


        }

    });
    /*
     * 
     * 
     * 
     * SCHEDULE CALLBACK
     * 
     * 
     * 
     * 
     */
    $(document).on('click', '.scheduleCallBackButton', function () {
        //update call log 
        //get call id
        var uniquephonecallid = $('#uniquephonecallid').val();

        //get agentid
        var agentid = $('#endCall').attr('agentid');

        var callbackdate = $('#callbackdate').val();

        var callbacktime = $('#callbacktime').val();

        var prospectid = $('#prospect_id').val();
        
          //retrieve phone number
        var phonenumber = $('#phoneScreen').val();


        var valuesforms = 'agentid=' + encodeURIComponent(agentid)
                + '&uniquephonecallid=' + encodeURIComponent(uniquephonecallid)
                + '&callbackdate=' + encodeURIComponent(callbackdate)
                + '&callbacktime=' + encodeURIComponent(callbacktime)
                + '&prospectid=' + encodeURIComponent(prospectid);

        if (uniquephonecallid !== '' && phonenumber !=='') {

            //pass on to ajax
            $.ajax({
                type: 'POST',
                url: 'queries/scheduleCallback.php',
                data: valuesforms,
                success: function (data)
                {
                    if (data.message === 'success') {

                        $('.callReportComplete').html('Call Complete.Thank You.')

                      /*  var images = ['cloud-love.gif',
                            'cloud-workout.gif',
                            'dog-glasses.gif',
                            'dog-rock.gif',
                            'dog-smile.gif',
                            'fish-swim.gif',
                            'heart-twerk.gif',
                            'octo-birthday.gif',
                            'thumbs-up.gif',
                            'unicorm.gif',
                            'yin-yan.gif'];

                        var randomImage = Math.floor(Math.random() * images.length);
                        $('#headScript').html('CALL COMPLETED WITH SUCCESS! <br><br> <img src="callcenter/img/' + images[randomImage] + '" alt="">');
                        $('.headScript').css('background-color', 'white');
                        $('.bodyScript').css('display', 'none');
                        $('.closeScript').css('display', 'none');
                         $('#fetchNewProspect').css('display', 'block');*/
                    }
                }
            });


        }

    });
    /*
     * 
     * 
     * 
     * UPDATE CALL STATUS ON FAILED
     * 
     * 
     * 
     * 
     */
    $(document).on( 'click', '.sendCallCode', function () {
        //update call log 
        //get call id
        var uniquephonecallid = $('#uniquephonecallid').val();

        //get agentid
        var agentid = $('#endCall').attr('agentid');

        //get call status
        var call_status = $("input[name='radioStatus']:checked").val();


  //retrieve phone number
        var phonenumber = $('#phoneScreen').val();


        var valuesforms = 'agentid=' + encodeURIComponent(agentid)
                + '&uniquephonecallid=' + encodeURIComponent(uniquephonecallid)
                + '&call_status=' + encodeURIComponent(call_status);

        if (uniquephonecallid !== '' && phonenumber !=='') {

            //pass on to ajax
            $.ajax({
                type: 'POST',
                url: 'queries/codeCall.php',
                data: valuesforms,
                success: function (data)
                {
                    if (data.message === 'success') {

                        $('.callReportComplete').html('Call Complete.Thank You.')

                       /* var images = ['cloud-love.gif',
                            'cloud-workout.gif',
                            'dog-glasses.gif',
                            'dog-rock.gif',
                            'dog-smile.gif',
                            'fish-swim.gif',
                            'heart-twerk.gif',
                            'octo-birthday.gif',
                            'thumbs-up.gif',
                            'unicorm.gif',
                            'yin-yan.gif'];

                        var randomImage = Math.floor(Math.random() * images.length);
                      $('#headScript').html('CALL COMPLETED WITH SUCCESS! <br><br> <img src="callcenter/img/' + images[randomImage] + '" alt="">');
                        $('.headScript').css('background-color', 'white');
                        $('.bodyScript').css('display', 'none');
                        $('.closeScript').css('display', 'none');
                         $('#fetchNewProspect').css('display', 'block');*/


                    }
                }
            });


        }

    });

    /*
     * 
     * 
     * 
     * EMAIL INFORMATION
     * 
     * 
     * 
     * 
     */
  $(document).on( 'click', '.sendInfoEmail', function () {
        //get variables
        var mailTO = $('#demomailto').val();
        var mailFROM = $('#demomailfrom').val();
        var mailSUBJECT = $('#demomailsubject').val();
        var mailBODY = $('#demomailbody').val();
        var mailSIGNATURE = $('#demomailsignature').val();
        var mailpassword = $('#demomailpassword').val();
        var mailfromname = $("#mailfromname").val();
        var salesexpertid = $('#endCall').attr('agentid');
        var prospectID = $('#prospect_id').val();
        var campaignid = $('#campadign_id').val();
        
          //update call log 
        //get call id
        var uniquephonecallid = $('#uniquephonecallid').val();
        
          //retrieve phone number
        var phonenumber = $('#phoneScreen').val();


  //error msgs
                                var error1 = '<p class="text-danger" style="font-size:small;">* Please enter prospect email</p>';
                                var error2 = '<p class="text-danger" style="font-size:small;">* Please enter your work email</p>';  
                                var error3 = '<p class="text-danger" style="font-size:small;">* Please enter email subject</p>';  
                                var error4 = '<p class="text-danger" style="font-size:small;">* Please enter email message</p>'; 
                                var error5 = '<p class="text-danger" style="font-size:small;">* Please enter signature</p>'; 
                                var error6 = '<p class="text-danger" style="font-size:small;">* Please your email password</p>';
            
                               //form values
                               var pppvalues ='prospectid='+ encodeURIComponent(prospectID) 
                                +'&mailto='+ encodeURIComponent(mailTO)
                                +'&mailfrom='+encodeURIComponent(mailFROM)
                                +'&mailsubject='+encodeURIComponent(mailSUBJECT)
                                +'&mailbody='+encodeURIComponent(mailBODY)
                                +'&mailsignature='+encodeURIComponent(mailSIGNATURE)
                                +'&mailfromname='+encodeURIComponent(mailfromname)
                                +'&mailpassword='+encodeURIComponent(mailpassword)
                                +'&campaignid='+encodeURIComponent(campaignid)
                                + '&uniquephonecallid=' + encodeURIComponent(uniquephonecallid)
                                +'&salesexpertid='+encodeURIComponent(salesexpertid);
                        
                                //validate form
                                if(mailTO ===''||mailTO === null ||mailTO=== 'undefined'){
                                     $(".displayerr").html(error1);
                                }else
                                    if(mailFROM==='' ||mailFROM=== null || mailFROM=== 'undefined'){
                                     $(".displayerr").html(error2);
                                }else
                                if(mailSUBJECT==='' ||mailSUBJECT=== null || mailSUBJECT=== 'undefined'){
                                     $(".displayerr").html(error3);
                                 }else
                                if(mailBODY==='' ||mailBODY=== null || mailBODY=== 'undefined'){
                                     $(".displayerr").html(error4);
                                 }else
                                 if(mailSIGNATURE==='' ||mailSIGNATURE=== null || mailSIGNATURE=== 'undefined'){
                                     $(".displayerr").html(error5);
                                 }else
                                 if(mailpassword==='' ||mailpassword=== null || mailpassword=== 'undefined'){
                                     $(".displayerr").html(error6);
                                 }else
                        
                                if(pppvalues !=='' && uniquephonecallid !== '' && phonenumber !== ''){
                                    
                                       $.ajax({
                                type: 'POST',
                                url: 'queries/sendProspectDemo.php',
                                data:pppvalues,
                                success: function(datapross)
                                {
                                    if(datapross.message==='success'){
                                       
                        $('.callReportComplete').html('Call Complete.Thank You.')

                        /*var images = ['cloud-love.gif',
                            'cloud-workout.gif',
                            'dog-glasses.gif',
                            'dog-rock.gif',
                            'dog-smile.gif',
                            'fish-swim.gif',
                            'heart-twerk.gif',
                            'octo-birthday.gif',
                            'thumbs-up.gif',
                            'unicorm.gif',
                            'yin-yan.gif'];

                        var randomImage = Math.floor(Math.random() * images.length);
                      $('#headScript').html('CALL COMPLETED WITH SUCCESS! <br><br> <img src="callcenter/img/' + images[randomImage] + '" alt="">');
                        $('.headScript').css('background-color', 'white');
                        $('.bodyScript').css('display', 'none');
                        $('.closeScript').css('display', 'none');
                         $('#fetchNewProspect').css('display', 'block');
                                            */
                                        
                                    }
                                }

                                });
                                    
                                    
                                }

    });
    /*
     * 
     * 
     * 
     * CHOOSE NEW CAMPAIGN
     * 
     * 
     * 
     * 
     */
    $(document).on( 'click', '.chooseNewCampaign', function () {
          //append a variable to url
        window.location = "home.php?salesmarketing";
        
    });
    /*
     * 
     * 
     * 
     * NEXT CALL 
     * 
     * 
     * 
     * 
     */
    $(document).on( 'click', '.nextCallButton', function () {
          //append a variable to url
       location.reload();
    });
    /*
     * 
     * 
     * 
     * DELETE NUMBER
     * 
     * 
     * 
     * 
     */

    $('#clearNumber').click(function () {

        //clear phone number
        $('#phoneScreen').val('');

    });
    /* 
     * end of file
     */
});