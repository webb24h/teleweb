<?php
include 'call_rate.php';
?>


<div id="callReport" class="table-bordered">
    <br>
    <input id="uniquephonecallStatID" type="hidden" value="1">
    <input id="uniquephonecallid" type="hidden">
    <input id="agentID" type="hidden" value="<?= $customer ?>">
    <input id="campadign_id" type="hidden" value="<?= $campaignid ?>">
    <input id="prospect_id" type="hidden" value="<?= $prospectid ?>">

    <div class="row text-center">
        <h3>Call Report</h3>
    </div>
    <br>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Send Email</a>
                </h4>
            </div>
            <div style="padding:2% !important;"  id="collapse1" class="panel-collapse collapse">

                <div class="panel-body no-padding-panel-body callReportComplete">

                    <div id="">
                        <form id="contact-form">
                            <h3></h3>
                            <h4></h4>

                            <div class="">
                                <p class="text-warning" style="font-size:small;">* Make sure you confirm the email before sending</p>
                                <span class="displayerr"></span>
                                <label>
                                    <span>Mail to</span>
                                </label>
                                <p id="pf1">
                                    <input id="demomailto" type='text' value='' class="form-control" placeholder='prospect_email'>
                                </p>
                                <label>
                                    <span>Agent Email</span>
                                </label>
                                <input id="demomailfrom" type='text' value='' class="form-control" placeholder="agent_email">

                                <label>
                                    <span>Subject</span>
                                </label>
                                <input id="demomailsubject" type='text' value='' class="form-control" placeholder="subject">

                                <label>
                                    <span>Message</span>
                                </label>
                                <textarea id="demomailbody" class="form-control"></textarea>

                                <label>
                                    <span>Signature</span>
                                </label>
                                <textarea id="demomailsignature" class="form-control"></textarea>

                                <label>
                                    <span>Enter password</span>
                                </label>
                                <input required id="demomailpassword" type='text' placeholder="Enter your mail password" value="" class="form-control">

                                <label>
                                    <span>Enter your first name</span>
                                </label>
                                <input id="mailfromname" type='text' placeholder='enter your first name' class="form-control">



                            </div>

                            <div>
                                <button type="button" class="btn btn-info sendInfoEmail">Send mail</button>
                            </div>
                        </form>
                    </div>    

                </div>
            </div>
        </div>



        <div  class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Call Failed</a>
                </h4>
            </div>
            <div style="padding:2%;" id="collapse2" class="panel-collapse collapse">
                <div style="" class="panel-body callReportComplete">
                    <?php
                    $z = 0;
                    foreach ($call_failed_arr as $callcode) {
                        $z++;
                        echo '<div class="radio">
                        <input id="radio-' . $z . '" name="radioStatus" type="radio" value="' . $callcode . '">
                        <label for="radio-' . $z . ' class="radio-label">' . $callcode . '</label>
                      </div>';
                    }
                    ?>
                    <br><br>
                    <button class="btn btn-primary sendCallCode" name="submit" type="submit" id="sendCallCode">Save</button>
                </div>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Schedule Callback</a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse in">
                <div class="panel-body callReportComplete">
                    <label>Select Date: </label>
                    <div class="input-group date">
                        <input id="callbackdate" class="form-control datepicker" type="text"/>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                    <br><br>
                    <label>Select Time: </label>
                    <div class="input-group date">
                        <input id="callbacktime" class="form-control timepicker" type="text"/>
                        <span class="input-group-addon"><i class="fa fa-clock"></i></span>
                    </div>
                    <br><br>
                    <button class="btn btn-primary scheduleCallBackButton" name="submit" type="button" id="scheduleCallBackButton">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>