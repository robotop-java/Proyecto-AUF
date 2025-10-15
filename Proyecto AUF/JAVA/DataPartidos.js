const form = document.getElementById("FormPartidos");
const Errormsg = document.getElementById("Error");
const Visitante = document.getElementById("ResultadoVisitante");
const Local = document.getElementById("ResultadoLocal");
const Fecha = document.getElementById("Fecha");

function validateFecha(Fecha){
const errors = [];
if (Fecha.length > 10) {
    errors.push("- No puede pasarse de 00/00/0000 \n");
}
return errors
}
function validateVisitante(ResultadoVisitante){
const errors = [];
if (ResultadoVisitante.length > 2) {
    errors.push("- No mas de 99 Goles\n");
}
return errors
}
function validateLocal(ResultadoLocal){
const errors = [];
if (ResultadoLocal.length > 2) {
    errors.push("- No mas de 99 Goles\n");
}
return errors
}
form.addEventListener('submit', (e) => {
    Errormsg.innerText = "";
    const VIsitanteErrors = validateVisitante(Visitante.value.trim());
   if (VIsitanteErrors.length > 0) {
    Errormsg.innerText = "Los Goles Visitante debe tener:\n" + VIsitanteErrors.join("");
    e.preventDefault();
   }
       const LocalErrors = validateLocal(Local.value.trim());
   if (LocalErrors.length > 0) {
    Errormsg.innerText = "Los Goles Locales debe tener:\n" + LocalErrors.join("");
    e.preventDefault();
   }
        const FechaErrors = validateFecha(Fecha.value.trim());
   if (FechaErrors.length > 0) {
    Errormsg.innerText = "La Fecha debe tener:\n" + FechaErrors.join("");
    e.preventDefault();
   }
});