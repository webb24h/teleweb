<div id="dialPad" class="text-center">
    <br>
    
  <div style="display:none;" class="row">
<label class="checkbox-inline">
  <input id="automaticDialing" type="checkbox" checked data-toggle="toggle"> Automatic Dialing
</label>
  </div>
<div style="" class="row">
<div id="log"></div>
</div>
<br>
  <div id="mydivheader"></h1></div>
<div class=""><input class="form-control" type="text" id="phoneScreen" /></div><br>
<div class="row">
<div class="col-md-4">
<button class="numpad btn btn-default" value="1"><span class="txt"> 1 </span><p class="hidpad">111</p></button>
</div>
<div class="col-md-4">
<button class="numpad btn btn-default" value="2"><span class="txt"> 2 </span><p>ABC</p></button>
</div>
<div class="col-md-4">
<button class="numpad btn btn-default" value="3"><span class="txt"> 3 </span><p>DEF</p></button>
</div>
</div>
<div class="row">
<div class="col-md-4">
<button class="numpad btn btn-default" value="4"><span class="txt"> 4 </span><p>GHI</p></button>
</div>
<div class="col-md-4">
<button class="numpad btn btn-default" value="5"><span class="txt"> 5 </span><p>JKL</p></button>
</div>
<div class="col-md-4">
<button class="numpad btn btn-default" value="6"><span class="txt"> 6 </span><p>MNO</p></button>
</div>
</div>
<div class="row">
<div class="col-md-4">
<button class="numpad btn btn-default" value="7"><span class="txt"> 7 </span><p>PQRS</p></button>
</div>
<div class="col-md-4">
<button class="numpad btn btn-default" value="8"><span class="txt"> 8 </span><p>TUV</p></button>
</div>
<div class="col-md-4">
<button class="numpad btn btn-default" value="9"><span class="txt"> 9 </span><p>WXYZ</p></button>
</div>
</div>
<div class="row">
<div class="col-md-4">
<button class="numpad btn btn-default" value="*"><span class="txt"> * </span><p class="hidpad">***</p></button>
</div>
<div class="col-md-4">
<button class="numpad btn btn-default" value="+"><span class="txt"> 0 </span><p>+</p></button>
</div>
<div class="col-md-4">
<button class="numpad btn btn-default" value="#"><span class="txt"> # </span><p class="hidpad">###</p></button>
</div>
</div>

<div class="row btn-call">
<div class="col-md-4">
<button agentid="<?=$userID?>" id="makeCall" class="btn btn-success btn-dial"><img src="https://img.icons8.com/ios/25/000000/ringer-volume.png"></button>
</div>
<div class="col-md-4">
<button agentid="<?=$userID?>" id="endCall" class="btn btn-danger btn-dial"><img src="https://img.icons8.com/ios/25/000000/end-call.png"></button>
<input type="hidden" id="uniquephonecallid">
<input type="hidden" id="twiliocallsid">
</div>

<div class="col-md-4">
<button agentid="<?=$userID?>" id="clearNumber" class="btn btn-info btn-dial">
<img src="https://img.icons8.com/ios/25/000000/clear-symbol.png"></button>
</div>
</div>

</div>