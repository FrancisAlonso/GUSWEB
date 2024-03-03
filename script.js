
const listapersonas = [];

var persona;
function guardaDatos(){
  let emailform = document.getElementById('correo').value;
  persona={
    email: emailform,
    contraseña: document.getElementById('pass').value
    }
  listapersonas.push(persona);
  mostrar();
  window.alert("Usuario registrado");
}

function mostrar(){
  console.log(persona)
}


function insertar(){
  let modelotabla='<div class="cuadro">';
  let numberid = 0;
  listapersonas.forEach(p => {
    modelotabla=modelotabla+numberid;
    modelotabla=modelotabla+'<h1>Email y contraseña</h1>';
    modelotabla=modelotabla+'<h2>'+p.email+'</h2>';
    modelotabla=modelotabla+'<h2>'+p.contraseña+'</h2>';
    numberid = 0 + 1;
  });
  modelotabla = modelotabla + '</div>'
  document.getElementById('tablausuarios').innerHTML=modelotabla;
}

