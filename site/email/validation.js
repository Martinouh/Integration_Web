
 function validation()
 {

	var contactname=document.enq.name.value;
	var name_exp=/^[A-Za-z\s]+$/;
	if(contactname=='')
	{
		alert("Le champ nom, ne peut pas être vide!");
		document.enq.name.focus();
		return false;
	}
	else if(!contactname.match(name_exp))
	{
		alert("Erreur sur le nom!");
		document.enq.name.focus();
		return false;
	}

	var email=document.enq.email.value;
	//var email_exp=/^[A-Za-z0-9\.-_\$]+@[A-Za-z]+\.[a-z]{2,4}$/;
	var email_exp=/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	if(email=='')
	{
		alert("svp indiquez une email valide");
		document.enq.email.focus();
		return false;
	}
	else if(!email.match(email_exp))
	{
		alert("Erreur sur l'email");
		document.enq.email.focus();
		return false;
	}


	var message=document.enq.message.value;
	if(message=='')
	{
		alert("Veuillez écrire un message!");
		document.enq.message.focus();
		return false;
	}
    return true;
 }
