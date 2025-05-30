const signinbtn=document.querySelector('signinbtn');
const signupbtn=document.querySelector('signinbtn');
const formbox=document.querySelector('.formbox');
signinbtn.onclick=function(){
    formbox.classList.add('active');}


//les bouttons modifier et supprimer
function modifier(){  
    alert("Voulez-vous continuer?");  
} 

function supprimer(){  
    alert("Voulez-vous continuer?");  
}  

function confirmerModification(id) {
    if (confirm("Voulez-vous vraiment modifier cet étudiant ?")) {
        window.location.href = "inscription.php?id=" + id;
    } else {
        // Recharge la page sans changer l’URL
        location.reload();
    }
}
// boutton back-top de la liste
