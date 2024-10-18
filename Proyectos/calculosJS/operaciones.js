function operacion(){
    let n1, n2, tipoop, ope, resultado;
    n1=parseFloat(document.getElementById("n1").value);
    n2=parseFloat(document.getElementById("n2").value);    
    tipoop = (document.getElementById("tipo").value);
    if (isnumber(n1) && isnumber(n2)){
        switch(tipoop){
            case "+":
                ope=n1 + n2;break;
            case "-":
                ope=n1 - n2;break;
            case "*":
                ope=n1 * n2;break;
            case "/":
                ope=n1 / n2;break;
        }
        resultado = document.getElementById("resultado").innerHTML = `<h2> ${n1} ${tipoop} ${n2} = ${ope} </h2>`
    }
    else{
        resultado = document.getElementById("resultado");
        resultado.innerHTML = `<h2>Ingrese solo números por favor...</h2>`;
        alert("Ingrese solo números por favor...")
    }
}
function isnumber(n){
    return !isNaN(parseFloat(n) &&isFinite(n))
}
