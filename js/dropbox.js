var client = new Dropbox.Client({
		key : "papK0lL1ddA=|wDOrYZjBjpb8S1thRMlUlL1buwS4pK1PWUk8Mz9Xew==",
		sandbox : true
	});

	client.authDriver(new Dropbox.Drivers.Redirect());

	client.authDriver(new Dropbox.Drivers.NodeServer(8191));

	client.authenticate(function(error, client) {
		if(error) {
			// Replace with a call to your own error-handling code.
			//
			// Don't forget to return from the callback, so you don't execute the code
			// that assumes everything went well.
			alert("Hello! I am an alert box!");
			return showError(error);
		}

		// Replace with a call to your own application code.
		//
		// The user authorized your app, and everything went well.
		// client is a Dropbox.Client instance that you can use to make API calls.
		// doSomethingCool(client);
		alert("Hello! I am an alert box!");
	});
	var showError = function(error) {
		if(window.console) {// Skip the "if" in node.js code.
			console.error(error);
		}

		switch (error.status) {
			case 401:
				// If you're using dropbox.js, the only cause behind this error is that
				// the user token expired.
				// Get the user through the authentication flow again.
				break;

			case 404:
				// The file or folder you tried to access is not in the user's Dropbox.
				// Handling this error is specific to your application.
				break;

			case 507:
				// The user is over their Dropbox quota.
				// Tell them their Dropbox is full. Refreshing the page won't help.
				break;

			case 503:
				// Too many API requests. Tell the user to try again later.
				// Long-term, optimize your code to use fewer API calls.
				break;

			case 400:
			// Bad input parameter
			case 403:
			// Bad OAuth request.
			case 405:
			// Request method not expected
			default:
			// Caused by a bug in dropbox.js, in your application, or in Dropbox.
			// Tell the user an error occurred, ask them to refresh the page.
		}
	};