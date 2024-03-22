const pages = document.querySelectorAll(".pagination li");
const selectedPage = document.querySelector(".current");

for (let i = 0; i < pages.length; i++) {
	const page = pages[i];
	page.addEventListener("click", (e) => {
		selectedPage.className = null;
		page.className = "current";
	});
}
