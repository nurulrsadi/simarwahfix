// untuk update
const flashData = $(".flash-data-update").data("flashdata");
if (flashData) {
	Swal.fire({
		title: "BERHASIL",
		text: " " + flashData,
		icon: "success",
	});
}

function basicPopup(url) {
	popupWindow = window.open(url, 'popupWindow',
		'height=300,width=700,left=50, top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=yes,status=yes,download=no'
	)
}
// pengajuan diacc





