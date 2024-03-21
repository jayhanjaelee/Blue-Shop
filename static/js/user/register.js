import { getRequestUrl, processResponse, request } from "/static/js/utils.js";

const userIdDuplicateCheckBtn = document.querySelector(
	".user-id-dup-check-btn"
);

if (userIdDuplicateCheckBtn !== null) {
	userIdDuplicateCheckBtn.addEventListener("click", async (e) => {
		e.preventDefault();
		console.log("clicked");
		const requestUrl = getRequestUrl("/api/user/info");
		let res = await request(requestUrl, "GET");
		res = await res.json();
		console.log(res);
	});
}
