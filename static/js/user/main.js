import { getRequestUrl, processResponse } from "/static/js/utils.js";
import * as constants from "/static/js/constants.js";

console.log(constants.BASEURL);

const path = window.location.pathname.split("/")[1];
let requestUrl = "";

if (path === "login") {
	const form = document.querySelector(".login-form");
	form.addEventListener("submit", handleSubmit);
	requestUrl = getRequestUrl("/api/user/login");
} else if (path === "register") {
	const form = document.querySelector(".register__form");
	form.addEventListener("submit", handleSubmit);
	requestUrl = getRequestUrl("/api/user/register");
}

async function handleSubmit(event) {
	event.preventDefault();
	const data = new FormData(event.target);
	const jsonData = {};

	for (const [key, value] of data.entries()) {
		if (value.length == 0) continue;
		jsonData[key] = value;
	}

	let res = await request(requestUrl, "POST", jsonData);
	processResponse(res);
}

async function request(url, method, jsonData) {
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
