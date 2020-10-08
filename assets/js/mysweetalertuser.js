// jika berhasil
const flashData = $(".flash-user-update").data("flashdata");
if (flashData) {
	Swal.fire({
		title: "BERHASIL",
		text: " " + flashData,
		icon: "success",
	});
}
