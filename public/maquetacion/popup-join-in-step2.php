<?php include 'layout/header.php';?>       
<div id="signin-popup" class="round-corner-10">
	<div style="height:25px"><span id="popup-back" class="float-left"><< BACK</span><span id="popup-close" class="float-right">X</span></div>
	<p class="popup-title oswald">Join Mexi-Go!</p>
	<label id="label-joinPass" for="joinPass">Choose a password:</label><br/>
    <input type="text" id="joinPass" name="joinPass" /><br/>
	<label id="label-joinName" for="joinName">What's your name:</label><br/>
    <input type="text" id="joinName" name="joinName" /><br/>
	<div class="field-alert field-alert-height-20">Password is required.</div>
	<label  id="label-membershipFree" class="label-radio margin-top-5">Free membership</label><input type="radio" id="membershipFree" name="membershipType" /><br/>
    <label  id="label-membershipPartner" class="label-radio">Become a partner</label><input type="radio" id="membershipPartner" name="membershipType"/><br/>
	<label for="checkRemember" id="label-checkRemember" class="ejecuto-label-rojo label-check-rojo check-special-rojo">Remember me</label><input id="checkRemember" name="checkRemember" type="checkbox" /><br/>
	<input type="submit" class="boton-css-formato boton-css-gradient-yellow oswald round-corner-3 hand" value="SUBMIT >>" />
	<p class="message-1" style="display:none">By pressing the Join Now button you agree to the <a href="#">Terms of Membership</a>.</p>
	<p>Already a member? <a href="">Sign in here</a></p>
</div>
<?php include 'layout/footer.php';?>     