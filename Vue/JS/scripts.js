// L'user clique sur le bouton s'inscrire
$( "#inscription" ).submit(function(e)  {
	// Récupère les valeurs
	var name = $("#nom").val();
	var pass = $("#pass").val();
	var pass2 = $("#pass2").val();
	var mail = $('#mail').val();

	
		// Vérification éventuelles
		$.ajax({
			type: "POST",
			url: "Forum/../../Controleur/controlRegister.php",
			data: { name: name, pass: pass, pass2: pass2, mail: mail},
			success: function(data){ 
				// On affiche les erreurs éventuelles du serveur
				$("#reponse").html(data);
				$("#nom").val('');
				$("#pass").val('');
				$("#pass2").val('');
				$("#mail").val('');
				$("#img").val('');
				
			}
		})
})


	
	
// L'user clique sur le bouton envoyer
$( "#message" ).submit(function(e)  {
	e.preventDefault();
	// Récupère les valeurs
	var contenu = $("#contenu").val();
	
		// Vérification éventuelles
		$.ajax({
			type: "POST",
			url: "Forum/../../Controleur/controlMessage.php",
			data: { contenu: contenu },
			success: function(data){ 
				// On affiche les erreurs éventuelles du serveur
				$("#reponse").html(data);
				
				location.reload();
			}
		})
})

	
	


// L'user clique sur le bouton btn-connexion
$( "#btn-connexion" ).click(function(e)  {
	// récupère les valeurs
	var nomNav = $("#nomNav").val();
	var passNav = $("#passNav").val();	
	
	// vérifs éventuelles
	$.ajax({
		type: "POST",
		url: "Forum/../../Controleur/controlLogin.php",
		data: { nomNav: nomNav, passNav:passNav },
		success: function(data){ 
			// On affiche les erreurs éventuelles du serveur
			location.reload();
			$("#formnavbar").append(data);
			$("#nomNav").val('');
			$("#passNav").val('');
		}
	});
})




// Confirmation pour supprimer un message 
$("#fil").on('click', 'button', function(){
	var id = this.id;

	    $("#supp").click(function(){
	    	$.ajax({
				type : "POST",
				url: "Forum/../../Controleur/controlDeleteMessage.php",
				// Envoi des données au controlleur en POST
				data : { id : id },

				// Je recharge ma page 
				success: function(data){
					location.reload();	
				}
			})
	    })    		
})





// Confirmation pour supprimer un message 
$("#my").on('click', 'button', function(){
	var id = this.id;

	    $("#supp").click(function(){
	    	$.ajax({
				type : "POST",
				url: "Forum/../../Controleur/controlDeleteMessage.php",
				// Envoi des données au controlleur en POST
				data : { id : id },

				// Je recharge ma page 
				success: function(data){
					location.reload();	
				}
			})
	    })    		
})



// Confirmation pour supprimer un message 
$("#delete_all").on('click', 'button', function(){

	$.ajax({
		type : "POST",
		url: "Forum/../../Controleur/controlDeleteAllMessage.php",

		// Je recharge ma page 
		success: function(data){
			location.reload();	
		}
	})		
})
	







	
//Au chargement de la page, récupère le fil
$( document ).ready(function() {
	
	// Récupération du JSON
	$.getJSON("Forum/../../Controleur/controlFil.php", 
		function(fil) {
			
			// Boucle qui va afficher les éléments voulut du JSON récuperer
			// Dans le controlFill.php
			for (var i = 0, len = fil.length; i < len; i++) {
				
				// Ajout des éléments dans la div ("#fil")
				$("#fil").append(`
					<div id="msg`+i+`" class="message" style = "border-radius : 10px;">
						<div class="auteur">` + fil[i].utilisateur+ ` à dit : ` +`</div>
						<div class="textemsg">`+fil[i].contenu+`</div>
						<div class="dateheure">`+fil[i].dat+'</br>' + fil[i].heure+`</div>
					</div>
				`);
				
				// Si l'utilisateur est propriétaire du message alors je lui autorise a supprimer le message
				// En lui ajoutant un bouton 
				if (fil[i].proprietaire) 
				{
					$("#msg"+i).append(
						`<button class="croix" id="`+fil[i].mid +`" data-toggle="modal" data-target="#myModal">&#10006;</button>`
					);
				}
			}	
		}
	)
});




// Fill du Profil
$( document ).ready(function() {
	
	// Récupération du JSON
	$.getJSON("Forum/../../Controleur/controlFilProfil.php", 
		function(myMess) {
			var etatPro;

			if(myMess[0].proprietaire)
			{
				etatPro = "Oui";
			}
			else
			{
				etatPro = "Non";
			}

			$("#admin").append(`
				<div>
					<p><b> Administrateur : ` + etatPro + `</b> </p>
					<p><b>Membre depuis le : ` + myMess[0].memberFrom + `</b> </p>
				</div>
			`);
			
			
			// Boucle qui va afficher les éléments voulut du JSON récuperer
			// Dans le controlFillProfil.php
			for (var i = 0, len = myMess.length; i < len; i++) {

				// Ajout des éléments dans la div ("#fil")
				$("#my").append(`
					<div id="msg`+i+`" class="message" style = "border-radius : 10px;">
						<div class="auteur">` + myMess[i].utilisateur+ ` à dit : ` +`</div>
						<div class="textemsg">`+myMess[i].contenu+`</div>
						<div class="dateheure">`+myMess[i].dat+'</br>' + myMess[i].heure+`</div>
					</div>
				`);
				
				// Si l'utilisateur est propriétaire du message alors je lui autorise a supprimer le message
				// En lui ajoutant un bouton 
				if (myMess[i].proprietaire) 
				{
					$("#msg"+i).append(
						`<button class="croix" id="`+myMess[i].mid +`" data-toggle="modal" data-target="#myModal">&#10006;</button>`
					);
				}
			}	
		}
	)
});





