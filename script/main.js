/** @format */
/// <reference lib="es2017" />
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var __generator = (this && this.__generator) || function (thisArg, body) {
    var _ = { label: 0, sent: function() { if (t[0] & 1) throw t[1]; return t[1]; }, trys: [], ops: [] }, f, y, t, g;
    return g = { next: verb(0), "throw": verb(1), "return": verb(2) }, typeof Symbol === "function" && (g[Symbol.iterator] = function() { return this; }), g;
    function verb(n) { return function (v) { return step([n, v]); }; }
    function step(op) {
        if (f) throw new TypeError("Generator is already executing.");
        while (g && (g = 0, op[0] && (_ = 0)), _) try {
            if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;
            if (y = 0, t) op = [op[0] & 2, t.value];
            switch (op[0]) {
                case 0: case 1: t = op; break;
                case 4: _.label++; return { value: op[1], done: false };
                case 5: _.label++; y = op[1]; op = [0]; continue;
                case 7: op = _.ops.pop(); _.trys.pop(); continue;
                default:
                    if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) { _ = 0; continue; }
                    if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) { _.label = op[1]; break; }
                    if (op[0] === 6 && _.label < t[1]) { _.label = t[1]; t = op; break; }
                    if (t && _.label < t[2]) { _.label = t[2]; _.ops.push(op); break; }
                    if (t[2]) _.ops.pop();
                    _.trys.pop(); continue;
            }
            op = body.call(thisArg, _);
        } catch (e) { op = [6, e]; y = 0; } finally { f = t = 0; }
        if (op[0] & 5) throw op[1]; return { value: op[0] ? op[1] : void 0, done: true };
    }
};
/// I am too used to C++ so here is a main function.
function main() {
    var dateElement = document.querySelector("#date");
    setTextHTML(dateElement, getFormattedDate());
    setInterval(function () {
        setTextHTML(dateElement, getFormattedDate());
    }, 10);
    setInterval(function () {
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
function setCarousel() {
    var message = document.querySelector("#userMessage");
    var user = document.querySelector("#userName");
    var date = document.querySelector("#userDate");
    getMessages().then(function (messages) {
        var randomMessage = messages[Math.floor(Math.random() * messages.length)];
        setTextHTML(message, '"' + randomMessage["message"] + '"');
        setTextHTML(user, "- " + randomMessage["user"]);
        setTextHTML(date, randomMessage["date"]);
    });
}
/**
 * @brief Sets the innerHTML of an element.
 * @param `HTMLElement` element The element to set the text of.
 * @param `string` text The text to set the element to.
 * @returns `void`
 */
function setTextHTML(element, text) {
    element.innerHTML = text;
}
/**
 * @brief Gets the current date in a formatted string.
 * @returns `string` The formatted date.
 */
function getFormattedDate() {
    var date = new Date();
    var result = date.getFullYear() +
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
function getMessages() {
    return __awaiter(this, void 0, void 0, function () {
        var url;
        return __generator(this, function (_a) {
            url = "api/get_messages.php";
            return [2 /*return*/, fetch(url)
                    .then(function (res) { return res.json(); })
                    .then(function (out) {
                    return out;
                })["catch"](function (err) {
                    throw err;
                })];
        });
    });
}
/// I need my main function.
document.addEventListener("DOMContentLoaded", main);
