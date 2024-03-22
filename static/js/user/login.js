import { getRequestUrl, handleSubmit } from "/static/js/utils.js";
import * as constants from "/static/js/constants.js";

if (constants.PATH === "login") {
	const loginForm = document.querySelector(".login-form");
	let requestUrl = getRequestUrl("/api/user/login");
	loginForm.addEventListener("submit", handleSubmit(requestUrl));
}
