class FormManager {
    constructor(formId, inputIds, onSubmitCallback) {
        this.form = document.getElementById(formId);
        if (!this.form) {
            throw new Error(`Form with ID "${formId}" not found.`);
        }
        this.inputIds = inputIds;
        this.onSubmitCallback = onSubmitCallback;
        this.form.addEventListener("submit", this.handleFormSubmit.bind(this));
    }
    handleFormSubmit(event) {
        event.preventDefault(); // Evita el envío del formulario estándar.
        if (typeof this.onSubmitCallback === "function") {
            const formData = this.handleFormData();
            this.onSubmitCallback(formData);
        }
    }
    handleFormData() {
        const formData = new FormData();
        this.inputIds.forEach((inputId) => {
            const inputElement = document.getElementById(inputId);
            if (inputElement) {
                if (inputElement.type === "file") {
                    formData.append(inputElement.name, inputElement.files[0]);
                } else {
                    formData.append(inputElement.name, inputElement.value);
                }
            }
        });
        return formData;
    }
}
