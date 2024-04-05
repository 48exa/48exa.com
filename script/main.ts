/** @format */
/// <reference lib="es2017" />

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

function setTextHTML(element: HTMLElement, text: string): void {
	element.innerHTML = text;
}

export function getFormattedDate(): string {
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

document.addEventListener("DOMContentLoaded", main);
