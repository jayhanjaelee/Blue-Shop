const path = window.location.pathname.split("/")[1];

if (path === "login") {
	const form = document.querySelector(".login-form");
	form.addEventListener("submit", handleSubmit);
} else if (path === "register") {
	const form = document.querySelector(".register__form");
	form.addEventListener("submit", handleSubmit);
}

async function handleSubmit(event) {
	event.preventDefault();
	const data = new FormData(event.target);
	const jsonData = {};

	for (const [key, value] of data.entries()) {
		if (value.length == 0) continue;
		jsonData[key] = value;
	}

	let baseUrl = window.location.protocol + "//" + window.location.host;
	let requestUrl = "";

	if (path === "login") {
		requestUrl = baseUrl += "/api/user/login";
	} else if (path === "register") {
		requestUrl = baseUrl += "/api/user/register";
	}

	let res = await request(requestUrl, jsonData);

	if (res.status == 200) {
		res.json().then((res) => {
			alert(res["message"]);
			window.location.href = baseUrl;
		});
	} else {
		// failed
		res.json().then((res) => {
			alert(res["message"]);
		});
	}
}

async function request(url, jsonData) {
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
