const realFileBtn = document.getElementById("real-file");
const realFileBtn1 = document.getElementById("real-life1");
const realFileBtn2 = document.getElementById("real-life2");
const customBtn = document.getElementById("custom-buttonn");
const customBtn1 = document.getElementById("custom-button");
const customBtn2 = document.getElementById("custom-button");
const customTxt = document.getElementById("custom-text");
const customTxt1 = document.getElementById("custom-text1");
const customTxt2 = document.getElementById("custom-text2");

// data1
customBtn.addEventListener("click", function () {
	realFileBtn.click();
});

realFileBtn.addEventListener("change", function () {
	if (realFileBtn.value) {
		customTxt.innerHTML = realFileBtn.value.match(
			/[\/\\]([\w\d\s\.\-\(\)]+)$/
		)[1];
	} else {
		customTxt.innerHTML = "No file chosen, yet.";
	}
});

// data2
customBtn1.addEventListener("click", function () {
	realFileBtn1.click();
});

realFileBtn1.addEventListener("change", function () {
	if (realFileBtn1.value) {
		customTxt1.innerHTML = realFileBtn1.value.match(
			/[\/\\]([\w\d\s\.\-\(\)]+)$/
		)[1];
	} else {
		customTxt1.innerHTML = "No file chosen, yet.";
	}
});

// // data3
// customBtn2.addEventListener("click", function () {
//     realFileBtn2.click();
// });

// realFileBtn2.addEventListener("change", function () {
//     if (realFileBtn2.value) {
//         customTxt2.innerHTML = realFileBtn2.value.match(
//             /[\/\\]([\w\d\s\.\-\(\)]+)$/
//         )[1];
//     } else {
//         customTxt2.innerHTML = "No file chosen, yet.";
//     }
// });
