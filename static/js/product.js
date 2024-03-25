import { getRequestUrl, processResponse, request } from "/static/js/utils.js";

const form = document.querySelector(".product-info__form");
const productCount = form.querySelector("#product_count");
const productPrice = form.querySelector(".product__price");
const productPriceValue = Number(productPrice.getAttribute("value"));
const pid = window.location.pathname.split("/")[2];
const url = getRequestUrl(`/api/product/buy/${pid}`);

let KRWon = new Intl.NumberFormat("ko-KR", {
	style: "currency",
	currency: "WON",
});

productCount.addEventListener("change", async (event) => {
	const count = Number(event.target.value);
	const totalPrice = productPriceValue * count;
	changeProductPrice(totalPrice);
});

form.addEventListener("submit", handleSubmit(url));

function handleSubmit(requestUrl) {
	return async function (event) {
		event.preventDefault();
		const data = new FormData(event.target);
		const jsonData = {};
		for (const [key, value] of data.entries()) {
			if (value.length == 0) continue;
			jsonData[key] = Number(value);
		}

		// calc product price.
		const price = productPriceValue * Number(jsonData["product_count"]);
		jsonData["price"] = price;

		let res = await request(requestUrl, "POST", jsonData);
		processResponse(res);
	};
}

function changeProductPrice(price) {
	// ex) WON 1234.00
	price = KRWon.format(price)
		.replace(/([A-Z])\w+\s/, "")
		.replace(/(\.|,)00$/g, "");
	productPrice.setAttribute("value", price);
	productPrice.querySelector(".product__price-value").textContent = price;
}
