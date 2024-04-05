/** @format */
/// <reference lib="es2017" />

/// I am too used to C++ so here is a main function.
function main(): void {
	let dateElement: HTMLElement = document.querySelector("#date");
	setTextHTML(dateElement, getFormattedDate());

	setInterval(() => {
		setTextHTML(dateElement, getFormattedDate());
	}, 10);

	setInterval(() => {
		setCarousel();
	}, 1000);
}

/*
 ***********************************
 * Helper functions below
 * This comment wall is only
 * here so I don't have to scroll.
 ***********************************
 */

/**
 * @brief Sets the carousel elements to a random message.
 * @returns `void`
 */
function setCarousel(): void {
	let message: HTMLElement = document.querySelector("#userMessage");
	let user: HTMLElement = document.querySelector("#userName");
	let date: HTMLElement = document.querySelector("#userDate");

	getMessages().then((messages) => {
		let randomMessage = messages[Math.floor(Math.random() * messages.length)];

		setTextHTML(message, randomMessage["message"]);
		setTextHTML(user, randomMessage["user"]);
		setTextHTML(date, randomMessage["date"]);
	});
}

/**
 * @brief Sets the innerHTML of an element.
 * @param `HTMLElement` element The element to set the text of.
 * @param `string` text The text to set the element to.
 * @returns `void`
 */
function setTextHTML(element: HTMLElement, text: string): void {
	element.innerHTML = text;
}

/**
 * @brief Gets the current date in a formatted string.
 * @returns `string` The formatted date.
 */
function getFormattedDate(): string {
	const date: Date = new Date();

	let result: string =
		date.getFullYear() +
		"/" +
		(date.getMonth() + 1) +
		"/" +
		date.getDate() +
		" " +
		date.getHours() +
		":" +
		date.getMinutes() +
		":" +
		date.getSeconds() +
		"." +
		date.getMilliseconds();

	return result;
}

/**
 * @brief Fetches all messages from the server.
 * @returns `Promise<string>` The messages from the server.
 */
async function getMessages(): Promise<string> {
	let url = "api/get_messages.php";

	return fetch(url)
		.then((res) => res.json())
		.then((out) => {
			return out;
		})
		.catch((err) => {
			throw err;
		});
}

/// I need my main function.
document.addEventListener("DOMContentLoaded", main);
