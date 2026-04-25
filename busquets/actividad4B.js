const fecha = new Date();
const fechaentr = document.getElementById("fechaentrada");
const fechasalid = document.getElementById("fechasalida");

// Obtener el botón de accesibilidad y las hojas de estilos
const botonAccesibilidad = document.querySelector('#boton-accesibilidad');
const hojaEstilosNormal = document.querySelector('#hoja-estilos-normal');
const hojaEstilosAltoContraste = document.querySelector('#hoja-estilos-alto-contraste');


if(fecha.getMonth()+1 >= 10)
{
    fechaentr.setAttribute("min", fecha.getFullYear()+"-"+(fecha.getMonth()+1)+"-"+fecha.getDate());
    fechasalid.setAttribute("min", fecha.getFullYear()+"-"+(fecha.getMonth()+1)+"-"+fecha.getDate());
}
else
{
    fechaentr.setAttribute("min", fecha.getFullYear()+"-0"+(fecha.getMonth()+1)+"-"+fecha.getDate());
    fechasalid.setAttribute("min", fecha.getFullYear()+"-0"+(fecha.getMonth()+1)+"-"+fecha.getDate());
}// Aqui se obtiene el valor de la fecha actual y lo asigna como valor mínimo para el campo de fecha de entrada

function validarFormulario()
{
    var nombre = document.getElementById('nombre').value;
    var email = document.getElementById('emailu').value;
    var contrasena = document.getElementById('password').value;
    var rpassword = document.getElementById('rpassword').value;
    var email = document.getElementById('email').value;
    var fechaentrada = document.getElementById('fechaentrada').value;
    var fechasalida = document.getElementById('fechasalida').value;
    var terminos = document.getElementById('terminos').checked;

    if(nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) || nombre == "")
    {
        alert('ERROR: El campo nombre no debe ir vacío o lleno de solamente espacios en blanco');
        return false;
    }

    if (email == null || email.length == 0 || /^\s+$/.test(email))
    {
        alert('ERROR: Debe escribir un correo electrónico');
        return false;
    }

    if(contrasena == null || contrasena.length == 0 || /^\s+$/.test(contrasena))
    {
        alert('ERROR: El campo contraseña no debe ir vacío o lleno de solamente espacios en blanco');
        return false;
    }

    if(rpassword == null || rpassword.length == 0 || /^\s+$/.test(rpassword) || rpassword != contrasena)
    {
        alert('Las verificación de contraseña deben coincidir');
        return false;
    }

    if(fechaentrada == null || fechaentrada.length == 0 || /^\s+$/.test(fechaentrada))
    {
        alert('ERROR: Debe escribir una fecha de entrada');
        return false;
    }

    if(fechaentrada == new Date())
    {
        alert('ERROR: La fecha de entrada debe ser mayor a la fecha actual');
        return false;
    }

    else if(fechaentrada > fechasalida)
    {
        alert('ERROR: La fecha de salida debe ser mayor a la fecha de entrada');
        return false;
    }

    else if(fechasalida < fechaentrada)
    {
        alert('ERROR: La fecha de entrada debe ser menor a la fecha de salida');
        return false;
    }

    if(terminos == false)
    {
        alert('Debe aceptar los términos y condiciones');
        return false;
    }
}
// La función valida que los campos no estén vacíos y que los datos ingresados sean correctos
// Lo puse al final por orden de scripts, al menos, en los códigos de JS se recomienda que estos
// estén al final del documento HTML y los scripts imports usualmente se citan al principio para su uso.
// Aunque, en este caso, no se importa ningún script externo, por lo que no es necesario que esté al principio.
// Y está siendo llamado en el formulario, por lo que siguiendo las llamadas de scripts, se coloca al final.

function cambioContraste() {
    // Agregar un controlador de eventos al botón de accesibilidad
    // Alternar entre las dos hojas de estilos
    if (hojaEstilosNormal.disabled) {
        hojaEstilosNormal.disabled = false;
        hojaEstilosAltoContraste.disabled = true;
    } else {
        hojaEstilosNormal.disabled = true;
        hojaEstilosAltoContraste.disabled = false;
    };

}