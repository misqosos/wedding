
function getTemplateFormData(formId, form, formControlName){
    const templateForm = document.getElementById(formId);
    // 1: get form data
    const formData = new FormData(templateForm);

    // 2: store form data in object
    const normalizeValues = (values) => (values.length > 1) ? values : values[0];
    const formElemKeys = Array.from(formData.keys());

    const obj = Object.fromEntries(
        // store array of values or single value for element key
        formElemKeys.map(key => [key, normalizeValues(formData.getAll(key))])
    );

    if (obj[formControlName]) {
        form[formControlName] = obj[formControlName];
    } 
    
    return form;
}
