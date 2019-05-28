$(document).ready(function () {
var jumpPage = document.querySelector('#jumptopagenumberinput');

jumpPage.addEventListener('input', restrictNumberP);

function restrictNumberP (e) {  
  var newValue = this.value.replace(new RegExp(/[^\d]/,'ig'), "");
  this.value = newValue;
}
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
	var countryCode = document.querySelector('#countryCode');

countryCode.addEventListener('input', restrictNumberC);

function restrictNumberC (e) {  
  var newValue = this.value.replace(new RegExp(/[^\d]/,'ig'), "");
  this.value = newValue;
}
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

var phoneNumber = document.querySelector('#phone');

phoneNumber.addEventListener('input', restrictNumber);

function restrictNumber (e) {  
  var newValue = this.value.replace(new RegExp(/[^\d]/,'ig'), "");
  this.value = newValue;
}
});
