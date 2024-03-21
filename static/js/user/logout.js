import { getRequestUrl, processResponse, request } from "/static/js/utils.js";

const logoutButton = document.querySelector(".header-top__logout > a");

if (logoutButton !== null) {
	logoutButton.addEventListener("click", async (event) => {
		event.preventDefault();
		const requestUrl = getRequestUrl("/api/user/logout");
		const res = await request(requestUrl, "GET");
		processResponse(res);
	});
}
