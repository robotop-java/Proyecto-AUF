const form = document.getElementById("FromCategoria");
const Errormsg = document.getElementById("Error");
const Nombre_Categoria = document.getElementById("Nombre_Categoria");
const Descripcion = document.getElementById("Descripcion");

function validateNombre_Categoria(Nombre_Categoria) {
const errors = [];
if (Nombre_Categoria.length > 60){
    errors.length("- No ser mas de 60 Letras\n");
}

if (!/[a-z]/.test(Nombre_Categoria)){
    errors.push("- Al menos minusculas\n");
}
if (!/[A-Z]/.test(Nombre_Categoria)){
    errors.push("- Mayuscula al principio de el Nombre\n");
}
    return errors;
}

function validateDescripcion(Descripcion) {
const errors = [];
if (Descripcion.length > 60){
    errors.length("- No ser mas de 60 Letras\n");
}
if (!/[a-z]/.test(Descripcion)){
    errors.push("- Al menos minusculasn\n");
}
if (!/[A-Z]/.test(Descripcion)){
    errors.push("- Mayuscula al principio de la Descripcion\n");
}
    return errors;
}
form.addEventListener('submit', (e) => {
 Errormsg.innerText = "";  
 const Nombre_CategoriaErrors = validateNombre_Categoria(Nombre_Categoria.value.trim());
 if (Nombre_CategoriaErrors.length > 0) {
    Errormsg.innerText = "El Nombre debe tener:\n" + Nombre_CategoriaErrors.join("");
    e.preventDefault();
 }
const DescripcionErrors = validateDescripcion(Descripcion.value.trim());
if (DescripcionErrors.length > 0) {
    Errormsg.innerText = "La Descripcion debe tener:\n" + DescripcionErrors.join("");
    e.preventDefault();
}














});
