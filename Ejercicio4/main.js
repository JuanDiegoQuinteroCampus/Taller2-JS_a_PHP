/*     4. Construir el algoritmo que solicite el nombre y edad de 3
personas y determine el nombre de la persona con mayor edad.
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
