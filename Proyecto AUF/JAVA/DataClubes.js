const form = document.getElementById("formClubes");
const Errormsg = document.getElementById("Error");
const Nombre = document.getElementById("NombreClub");

function validateNombre(Nombre) {
    const errors = [];
    if (Nombre.length > 255) {
        errors.push("- No ser mas de 255 Letras\n")
    }
    if (!/[a-z]/.test(Nombre)) {
        errors.push("- Al menos una letra minúscula.\n");
    }
    if (!/[A-Z]/.test(Nombre)) {
        errors.push("- Al menos una letra mayúscula.\n");
    }
    if (/\d/.test(Nombre)) {
        errors.push("- No llevar Numeros\n")
    }
    if (/[^a-zA-Z\s]/.test(Nombre)) {
  errors.push("- No llevar caracteres especiales\n");
}
    return errors;
}

form.addEventListener('submit', (e) => {
    Errormsg.innerText = "";
const NombreErrors = validateNombre(Nombre.value.trim());
   if (NombreErrors.length > 0){
    Errormsg.innerText = "El Nombre debe:\n " + NombreErrors.join("");
    e.preventDefault();
   }
});