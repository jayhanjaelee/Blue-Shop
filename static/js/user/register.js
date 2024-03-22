import {
	getRequestUrl,
	processResponse,
	request,
	handleSubmit,
} from "/static/js/utils.js";
import * as constants from "/static/js/constants.js";

const userIdDuplicateCheckBtn = document.querySelector(
	".user-id-dup-check-btn"
);

const user_id_input = document.querySelector(".register__item-input");

if (userIdDuplicateCheckBtn !== null) {
	userIdDuplicateCheckBtn.addEventListener("click", async (e) => {
		e.preventDefault();
		const requestUrl = getRequestUrl("/api/user/check/duplicate");
		const data = {
			user_id: user_id_input.value,
		};

		let res = await request(requestUrl, "POST", data);
		processResponse(res);
	});
}

if (constants.PATH === "register") {
	const form = document.querySelector(".register__form");
	let requestUrl = getRequestUrl("/api/user/register");
	form.addEventListener("submit", handleSubmit(requestUrl));
}
