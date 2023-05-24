/* 5. Construir el algoritmo que lea por teclado dos números,
si el primero es mayor al segundo informar su suma y
diferencia, en caso contrario, informar el producto y la
división del primero respecto al segundo. */

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
