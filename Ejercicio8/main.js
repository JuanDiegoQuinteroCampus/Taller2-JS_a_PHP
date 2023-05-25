/*    8. Programa que Ingrese por teclado:
a. el valor del lado de un cuadrado para mostrar por pantalla el
perímetro del mismo
b. la base y la altura de un rectángulo para mostrar el área del
mismo
*/

let myform = document.querySelector("#myFormulario");
let myHeaders = new Headers({ "Content-Type": "application/json" });
let config = {
headers: myHeaders,
};
myform.addEventListener("submit", async (e) => {
e.preventDefault();
config.method = "POST";
let data = Object.fromEntries(new FormData(e.target));
config.body = JSON.stringify(data);
let rta = await (
    await fetch("api.php", config)
).text(); /* puede ser .text en ves de .json */
document.querySelector("pre").innerHTML = rta;
console.log(rta);
});
