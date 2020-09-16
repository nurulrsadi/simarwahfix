Array.prototype.forEach.call(
    document.querySelectorAll(".file-upload__button-custom"),
    function (button) {
        const hiddenInput = button.parentElement.querySelector(
            ".file-upload__input-custom"
        );
        const label = button.parentElement.querySelector(".file-upload__label-custom");
        const defaultLabelText = "No file selected";

        // Set default text for label
        label.textContent = defaultLabelText;
        label.title = defaultLabelText;

        button.addEventListener("click", function () {
            hiddenInput.click();
        });

        hiddenInput.addEventListener("change", function () {
            const filenameList = Array.prototype.map.call(hiddenInput.files, function (
                file
            ) {
                return file.name;
            });

            label.textContent = filenameList.join(", ") || defaultLabelText;
            label.title = label.textContent;
        });
    }
);