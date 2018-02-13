var lastName=document.getElementById('nom');
var prenom=document.getElementById('firstName');
var pseudo=document.getElementById('pseudo');
var courriel=document.getElementById('mail');
var pwd_First=document.getElementById('motDpasse');
var second_PWD=document.getElementById('mdPasse');

var updateStat=document.getElementById('statutMDP');

var Bouton_validation=document.getElementById('validation');

var mail_cle=courriel.value;

var regex=/.+@.+\..+/;
function verif_Mail() {
	if (regex===mail_cle) {
		console.log('mail OK');

	}else{
		console.log('recommencer');
	}
}
Bouton_validation.addEventListener('click',verif_Mail);