/*=============================================
=            Mostrar SideBar Toggle             =
=============================================*/
const showMenu = (headerToggle, navbarId) =>{
    const toggleBtn = document.getElementById(headerToggle),
    nav = document.getElementById(navbarId)
    
    // Validar que las variables existen
    if(headerToggle && navbarId){
        toggleBtn.addEventListener('click', ()=>{
            // Agregamos la clase show-menu a la etiqueta div
            nav.classList.toggle('show-menu')

            // Cambiar icono
            toggleBtn.classList.toggle('bx-x')
        })
    }
}
showMenu('header-toggle','navbar')
// -----------FIN Mostrar SideBar Toggle------------
/*=============================================
=            Enlace Activo             =
=============================================*/


// $(document).ready(function (){
//     var url = window.location;
//     $('.nav__link[href="' + url + '"]').parent().addClass('.active');
//     $('.nav__link').filter(function(){
//         return this.href == url;
//     }).parent().addClass('.active').parent().addClass('.active');
// });

//     $(".nav__link").click(function(e){
//         $(".nav__link").removeClass("active");
//         var $parent = $(this);
//         if (!$parent.hasClass("active")) {
//             $parent.addClass("active");
//             return this.href == url;
//         }
//         // e.preventDefault();
//     });
// });

// const linkColor = document.querySelectorAll('.nav__link')
// function colorLink() {
//     linkColor.forEach(l => l.classList.remove('active'))
//     this.classList.add('active')
// }
// linkColor.forEach(l => l.addEventListener('click', colorLink))
// -----------FIN Enlace Activo------------
/*=============================================
=            Data Table             =
=============================================*/
$(".tablas").DataTable({
    "language": {

        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

    }
});






