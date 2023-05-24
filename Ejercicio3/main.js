/*     3. Construir el algoritmo para determinar el voltaje de un
circuito a partir de la resistencia y la intensidad de corriente.. */

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
