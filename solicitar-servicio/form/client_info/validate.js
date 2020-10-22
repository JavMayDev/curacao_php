function validateClientInfo() {
	var clientSenderName = document.getElementsByName("client_sender_name")[0];

	var isValid = true;

	if (!clientSenderName.value) {
		console.log("is invalid");
		clientSenderName.classList.add("is-invalid");
		isValid = false;
	}

	return isValid;
}
