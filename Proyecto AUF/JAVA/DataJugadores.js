const form = document.getElementById("FormJugador");
const CI = document.getElementById("CI");
const Nombre = document.getElementById("Nombre");
const Apellido = document.getElementById("Apellido");
const Telefono = document.getElementById("Telefono");
const Numero = document.getElementById("Numero");
const Goles = document.getElementById("Goles");
const Tarjetas = document.getElementById("Tarjetas");
const Partidos = document.getElementById("Partidos");
const Errormsg = document.getElementById("Error");

function validateCI(CI) {
    const errors = [];
    if (!/^\d{8}$/.test(CI)) {
        errors.push("- La Cedula tiene que ser de 8 digitos.\n")
    }

    return errors;
}
function validateNumero(Numero) {
    const errors = [];
    if (!/^\d{2}$/.test(Numero)) {
        errors.push("- Tiene que ser de 2 digitos.\n - Ejemplo: 01 o 10\n")
    }

    return errors;
}
function validateGoles(Goles) {
    const errors = [];
    if (Goles.length > 60) {
        errors.push("- No ser mas de 60 Numeros.\n ")
    }

    return errors;
}
function validateTarjetas(Tarjetas) {
    const errors = [];
    if (Tarjetas.length > 60) {
        errors.push("- No ser mas de 60 Numeros.\n ")
    }

    return errors;
}
function validatePartidos(Partidos) {
    const errors = [];
    if (Partidos.length > 60) {
        errors.push("- No ser mas de 60 Numeros.\n ")
    }

    return errors;
}
function validateTelefono(Telefono) {
    const errors = [];
    if (!/^\d{9}$/.test(Telefono)) {
        errors.push("- Tiene que ser de 9 digitos.\n")
    }
    return errors;
}
function validateNombre(Nombre) {
    const errors = [];
    if (Nombre.length > 255) {
        errors.push("- No ser mas de 255 Letras")
    }
    if (!/[a-z]/.test(Nombre)) {
        errors.push("- Al menos una letra minúscula.\n");
    }
    if (!/[A-Z]/.test(Nombre)) {
        errors.push("- Al menos una letra mayúscula.\n");
    }
    if (/\d/.test(Nombre)) {
        errors.push("- No llevar Numeros")
    }
    return errors;
}
function validateApellido(Apellido) {
    const errors = [];
    if (Apellido.length > 255) {
        errors.push("- No ser mas de 255 Letras")
    }
    if (!/[a-z]/.test(Apellido)) {
        errors.push("- Al menos una letra minúscula.\n");
    }
    if (!/[A-Z]/.test(Apellido)) {
        errors.push("- Al menos una letra mayúscula.\n");
    }
    if (/\d/.test(Apellido)) {
        errors.push("- No llevar Numeros")
    }
    return errors;
}
form.addEventListener('submit', (e) => {
    Errormsg.innerText = "";
    const CIErrors = validateCI(CI.value.trim());
   if (CIErrors.length > 0) {
    Errormsg.innerText = "La CI debe tener:\n" + CIErrors.join("");
    e.preventDefault();
   }
       const NumeroErrors = validateNumero(Numero.value.trim());
   if (NumeroErrors.length > 0) {
    Errormsg.innerText = "El Numero del Jugador debe tener:\n" + NumeroErrors.join("");
    e.preventDefault();
   }
   const NombreErrors = validateNombre(Nombre.value.trim());
   if (NombreErrors.length > 0){
    Errormsg.innerText = "El Nombre debe:\n " + NombreErrors.join("");
    e.preventDefault();
   }
     const ApellidoErrors = validateApellido(Apellido.value.trim());
   if (ApellidoErrors.length > 0){
    Errormsg.innerText = "El Apellido debe:\n " + ApellidoErrors.join("");
    e.preventDefault();
   }
    const TelefonoErrors = validateTelefono(Telefono.value.trim());
   if (TelefonoErrors.length > 0){
    Errormsg.innerText = "El Telefono debe tener:\n" + TelefonoErrors.join("");
    e.preventDefault();
   }
   const GolesErrors = validateGoles(Goles.value.trim());
   if (GolesErrors.length > 0) {
    Errormsg.innerText = "Los Goles:\n" + GolesErrors.join("");
    e.preventDefault();
   }
   const TarjetasErrors = validateTarjetas(Tarjetas.value.trim());
   if (TarjetasErrors.length > 0){
    Errormsg.innerText = "Las Tarjetas\n" + TarjetasErrors.join("");
    e.preventDefault();
   }
   const PartidosErrors = validatePartidos(Partidos.value.trim());
   if (PartidosErrors.length > 0) {
    Errormsg.innerText = "Los Partidos\n" + PartidosErrors.join("");
    e.preventDefault();
   }
});

