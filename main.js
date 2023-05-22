/*     1. Construir el algoritmo para un programa que ingrese tres
            notas de un alumno, si el promedio es menor o igual a 3.9
            mostrar un mensaje "Estudie“, de lo contrario un mensaje que
            diga "becado"  */

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
        let res = await (
            await fetch("api.php", config)
        ).text(); /* puede ser .text en ves de .json */
        document.querySelector("pre").innerHTML = res;
        console.log(res);
        });
