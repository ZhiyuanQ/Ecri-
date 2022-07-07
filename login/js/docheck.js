function docheck(php){
	// récupération des données du formulaire
	let donnes = $("#form").serialize();
	// lancement via ajax du traitement des données
	$.ajax({
		type: 'POST',
		url: php,
		data: donnes,
		success: function(msg){
			document.write(msg);
		},
		error : function () {
			document.write("Erreur de requête Ajax!");
		}
	});
};

