import * as constants from "/static/js/constants.js";

export function getRequestUrl(url) {
	return constants.BASEURL + url;
}

export async function processResponse(res) {
	if (res.status !== 200) {
		res = await res.json();
		return alert(res["message"]);
	}

	// success
	res = await res.json();
	alert(res["message"]);
	window.location.href = constants.BASEURL;
}
