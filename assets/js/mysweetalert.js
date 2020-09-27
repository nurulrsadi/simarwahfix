// untuk update
const flashData = $(".flash-data-update").data("flashdata");
if (flashData) {
	Swal.fire({
		title: "BERHASIL",
		text: " " + flashData,
		icon: "success",
	});
}

// pengajuan diacc
const flashDataACC = $(".flash-data-pengajuan").data("flashdata");
$("tombol-yakin").on("click", function (e) {
	e.preventDefault();

	Swal.fire({
		title: "Anda yakin menerima surat pengajuan ini?",
		text:
			"Jika pengajuan telah disetujui, maka anda tidak dapat meminta pihak ormawa untuk mengganti surat-surat tersebut!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, terima surat pengajuan!",
	}).then((result) => {
		if (result.isConfirmed) {
			flashDataACC;
		}
	});
});
