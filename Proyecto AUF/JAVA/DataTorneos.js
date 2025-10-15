const form = document.getElementById("FormTorneo");
const Errormsg = document.getElementById("Error");
const Nombre = document.getElementById("Nombre_Torneo");
const Fecha_Inicio = document.getElementById("Fecha_Inicio");
const Fecha_Fin = document.getElementById("Fecha_Fin");

function validateFechaInicio(Fecha_Inicio){
const errors = [];
if (Fecha_Inicio.length > 10) {
    errors.push("- No puede pasarse de 00/00/0000 \n");
}
return errors
}
function validateFechaFIn(Fecha_Fin){
const errors = [];
if (Fecha_Fin.length > 10) {
    errors.push("- No puede pasarse de 00/00/0000 \n");
}
return errors
}
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
   const FechaInicioErrors = validateFechaInicio(Fecha_Inicio.value.trim());
   if (FechaInicioErrors.length > 0){
    Errormsg.innerText = "El Fecha Inicio debe:\n " + FechaInicioErrors.join("");
    e.preventDefault();
   }
      const FechaFinErrors = validateFechaFIn(Fecha_Fin.value.trim());
   if (FechaFinErrors.length > 0){
    Errormsg.innerText = "El Fecha Fin debe:\n " + FechaFinErrors.join("");
    e.preventDefault();
   }
});