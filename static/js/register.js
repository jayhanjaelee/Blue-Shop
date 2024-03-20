const form = document.querySelector(".register__form");
form.addEventListener("submit", handleSubmit);

async function handleSubmit(event) {
	event.preventDefault();
	const data = new FormData(event.target);
	const jsonData = {};

	for (const [key, value] of data.entries()) {
		if (value.length == 0) continue;
		jsonData[key] = value;
	}

	const url =
		window.location.protocol + "//" + window.location.host + "/api/user";
	// url = "http://dev.hanjaelee.com/api/user";
	let res = await register(url, jsonData);

	if (res.status == 200) {
		res.json().then((res) => {
			alert(res["message"]);
			window.location.href =
				window.location.protocol + "//" + window.location.host;
		});
	} else {
		// failed
		res.json().then((res) => {
			alert(res["message"]);
		});
	}
}

async function register(url, jsonData) {
	// Send JSON data to server using fetch
	const response = await fetch(url, {
		method: "POST",
		headers: {
			"Content-Type": "application/json",
		},
		body: JSON.stringify(jsonData),
	});

	return response;
}
