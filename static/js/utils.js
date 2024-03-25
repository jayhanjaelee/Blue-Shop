import * as constants from "/static/js/constants.js";

export function getRequestUrl(url) {
	return constants.BASEURL + url;
}

export function handleSubmit(requestUrl) {
	return async function (event) {
		event.preventDefault();
		const data = new FormData(event.target);
		const jsonData = {};
		for (const [key, value] of data.entries()) {
			if (value.length == 0) continue;
			jsonData[key] = value;
		}
		let res = await request(requestUrl, "POST", jsonData);
		processResponse(res);
	};
}

export async function request(url, method, jsonData) {
	let options = {
		method: method,
		headers: {
			"Content-Type": "application/json",
		},
	};

	jsonData ? (options["body"] = JSON.stringify(jsonData)) : null;

	const response = await fetch(url, options);
	return response;
}

export async function processResponse(res) {
	let jsonRes = null;
	// fail
	if (res.status !== 200) {
		jsonRes = await res.json();
		return alert(jsonRes["message"]);
	}

	// success
	jsonRes = await res.json();
	alert(jsonRes["message"]);

	if (jsonRes["status"] === "success_then_reload") {
		location.reload();
	}

	// redirect when it is success.
	if (jsonRes["status"] === "success_then_redirect") {
		window.location.href = constants.BASEURL;
	}
}
