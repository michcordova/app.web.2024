//este es un comentario de JS de una linea

/*Este es un cometario
de  varias lineas de codigo*/

//variables
var nombre = "Michelle Corodva Torres";
var nombre2 = "Michelleeee";
let nombre3 = "Cordova";
let edad = 20;
let estatura = 1.80;
let logico = true;

//Alertas
//alert("Soy una alerta: "+nombre)

//Mostrar contenido de variables
console.log("Hola soy consola y tu nombre es: " + nombre3);
document.write("Hola soy consola y tu nombre es: " + nombre3)
document.write("<hr><h2>Hola soy consola y tu nombre es: " + nombre3 + "</h2>");


//Mostrar contenido getElementByID

let datos = document.getElementById("informacion");
datos.innerHTML = "<hr><h2>Hola soy un contenido ninnerHTML <br></h2>";
datos.innerHTML += "<hr><h2>Hola soy otro contenido ninnerHTML</h2>";

datos.innerHTML += `
    <hr>
    <h2>Mi edad es: ${edad}</h2>
     <h2>Mi nombre es: ${nombre}</h2>
    <hr>
`

//Condiciones //pendiente
if (edad >= 18)
    datos.innerHTML += ` <hr><h2>Mi edad es: ${edad}</h2><h2>Mi nombre es: ${nombre}</h2><hr>`;
else
    datos.innerHTML = +"<hr><h2>Soy mayor de edad</h2><hr></hr>";

//Ciclos
for (let i = 1; i <= 5; i++) {
    datos.innerHTML += `<hr><h2>For: soy el número: ${i}</h2>`;
}

let i = 1;
while (i <= 5) {
    datos.innerHTML += `<hr><h2>While: soy el número: ${i}</h2>`;
    i++;
}

i = 1;
do {
    datos.innerHTML += `<hr><h2>DoWhile: soy el número: ${i}</h2>`;
    i++;
} while (i <= 5);

//funciones

//1.-Funciones que no reciben parametros y no regresan valor

function suma1() {
    let n1 = 2;
    let n2 = 3;
    let suma = n1 + n2;
    datos.innerHTML += `<hr><h2>El resultado de la suma 1 es ${suma}</h2>`;
}

suma1();
//2.-Funciones que no reciben parametros y si regresan valor

function suma2() {
    let n1 = 2;
    let n2 = 3;
    let suma = n1 + n2;
    return suma;
}

let sum = suma2();
datos.innerHTML += `<hr><h2>El resultado de la suma 2 es ${sum}</h2>`;
//3.-Funciones que si reciben parametros y no regresan valor

function suma3(numero1, numero2) {
    let n1 = numero1;
    let n2 = numero2;
    let suma = n1 + n2;
    datos.innerHTML += `<hr><h2>El resultado de la suma 3 es ${suma}</h2>`;
}

suma3(3, 4);
//4.-Funciones que si reciben parametros y si regresan valor

function suma4(numero1, numero2) {
    let n1 = numero1;
    let n2 = numero2;
    let suma = n1 + n2;
    return suma;
}

sum = suma4(8, 5);
datos.innerHTML += `<hr><h2>El resultado de la suma 4 es ${sum}</h2>`;


//Arreglos

let animales = [];
animales[0] = "Perro";
animales[1] = "Gallina";
animales[2] = "Perico";

let animales2 = ["Leon", "Togre", "Elefante"]

for (let i = 0; i < animales.length; i++) {
    datos.innerHTML += `<hr><h2>El animal es ${animales[i]}</h2>`;
}
animales2.forEach(element => {
    datos.innerHTML += `<hr><h2>El animal es ${animales[i]}</h2>`;
})
