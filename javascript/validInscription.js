var lastName=document.getElementById('nom');
var prenom=document.getElementById('firstName');
var pseudo=document.getElementById('pseudo');
var courriel=document.getElementById('mail');
var updateStat=document.getElementById('statutMDP');
var lengthPWD=document.getElementById('longueurMDP');

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


/*PWD correspondances.*/
var formulaire=document.querySelector("form");

formulaire.addEventListener("input", function(e){
	var mdp1=document.getElementById("motDpasse");
		mdp1=mdp1.value;
	var mdp2=document.getElementById("mdPasse");
		mdp2=mdp2.value;

	if(mdp1.length<=4){
		lengthPWD.textContent="Mot de passe trop court."
		lengthPWD.style.color="red";
	}else{
		if(mdp1===mdp2){
			console.log("Mot de passe correspondant");
			updateStat.textContent="Mode de passe correspondant";
			updateStat.style.color="green";
		}else{
			console.log("Les 2 mots de passes sont différents");
			updateStat.textContent="Les 2 mots de passe sont différents";
			updateStat.style.color="red";
		}
	}//fin if mdp1.lenght
});