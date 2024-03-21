import { getRequestUrl } from "/static/js/utils.js";

const userIdDuplicateCheckBtn = document.querySelector(
	".user-id-dup-check-btn"
);

userIdDuplicateCheckBtn.addEventListener("click", async (e) => {
	e.preventDefault();
	console.log("clicked");
	requestUrl = getRequestUrl("/api/user/info");
	const res = await request(requestUrl, "GET");
	console.log(res);
});
