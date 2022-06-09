/* Paginado puro JS */
var st = document.getElementById("estud");
st.addEventListener("click", pagEst);
function pagEst() {
    var dash = document.getElementById('dash');
    var estudiant = document.getElementById('estudiante');
    var book = document.getElementById('libros');
    var entrega = document.getElementById('entrega');
    var venta = document.getElementById('ventaB');
    entrega.style.display = 'none'; 
    venta.style.display = 'none';         
    dash.style.display = 'none';
    estudiant.style.display = 'contents';
    book.style.display = 'none';
};


var dash = document.getElementById("panel");
dash.addEventListener("click", pagDash);
function pagDash() {
    var dash = document.getElementById('dash');
    var estudiant = document.getElementById('estudiante');
    var book = document.getElementById('libros');
    var entrega = document.getElementById('entrega');
    var venta = document.getElementById('ventaB');
    entrega.style.display = 'none'; 
    venta.style.display = 'none'; 
    dash.style.display = 'contents';
    estudiant.style.display = 'none';
    book.style.display = 'none';      
};

var libro = document.getElementById("book");
libro.addEventListener("click", pagBook);
function pagBook() {
    var dash = document.getElementById('dash');
    var estudiant = document.getElementById('estudiante');
    var book = document.getElementById('libros');
    var entrega = document.getElementById('entrega');
    var venta = document.getElementById('ventaB');
    entrega.style.display = 'none'; 
    venta.style.display = 'none'; 
    book.style.display = 'contents';
    estudiant.style.display = 'none';
    dash.style.display = 'none';     
};

var prestamos = document.getElementById("prestamo");
prestamos.addEventListener("click", pagPrestamo);
function pagPrestamo() {
    var dash = document.getElementById('dash');
    var estudiant = document.getElementById('estudiante');
    var book = document.getElementById('libros');
    var entrega = document.getElementById('entrega');
    var venta = document.getElementById('ventaB');
    entrega.style.display = 'contents'; 
    venta.style.display = 'none'; 
    book.style.display = 'none';
    estudiant.style.display = 'none';
    dash.style.display = 'none';     
};

var ventas = document.getElementById("venta");
ventas.addEventListener("click", pagVenta);
function pagVenta() {
    var dash = document.getElementById('dash');
    var estudiant = document.getElementById('estudiante');
    var book = document.getElementById('libros');
    var entrega = document.getElementById('entrega');
    var venta = document.getElementById('ventaB');
    entrega.style.display = 'none'; 
    venta.style.display = 'contents'; 
    book.style.display = 'none';
    estudiant.style.display = 'none';
    dash.style.display = 'none';     
};

/* Paginado con Jquery */
/*$("#estud").on('click', function () {
    var dash = document.getElementById('dash');
    var estudiant = document.getElementById('estudiante');
    var book = document.getElementById('libros');
    dash.style.display = 'none';
    estudiant.style.display = 'contents';
    book.style.display = 'none';
});

$("#panel").on('click', function () {
    var dash = document.getElementById('dash');
    var estudiant = document.getElementById('estudiante');
    var book = document.getElementById('libros');
    dash.style.display = 'contents';
    estudiant.style.display = 'none';
    book.style.display = 'none';
});

$("#book").on('click', function () {
    var dash = document.getElementById('dash');
    var estudiant = document.getElementById('estudiante');
    var book = document.getElementById('libros');
    book.style.display = 'contents';
    estudiant.style.display = 'none';
    dash.style.display = 'none';
});
//dash.style.display = 'none';
//console.log(dash);*/