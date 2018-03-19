var home_ShowHide=getElementsByClassName("hide_Show");
var commentaires= getElementById('comms');
commentaires.styles.display="none";
home_ShowHide.addEventListener("click", function (){
	home_ShowHide.textContent="Masquer les commentaires";
	commentaires.styles.display="inline-block";
	commentaires.styles.height="50px";
});