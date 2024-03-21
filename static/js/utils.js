import * as constants from "/static/js/constants.js";

export function getRequestUrl(url) {
	return constants.BASEURL + url;
}

export async function processResponse(res) {
	// fail
	if (res.status !== 200) {
		res = await res.json();
		return alert(res["message"]);
	}

	// success
	res = await res.json();
	alert(res["message"]);
	window.location.href = constants.BASEURL;
}

export async function request(url, method, jsonData) {
	let options = {
		method: method,
		headers: {
			"Content-Type": "application/json",
		},
	};

	jsonData ? (options["body"] = JSON.stringify(jsonData)) : undefined;
	const response = await fetch(url, options);
	return response;
}
