
// $(document).ready(function(){
//     const user_type = document.getElementById('user_type');
// const tipo_docente = document.getElementById('tipo_docente');
// const tipo_alumno = document.getElementById('tipo_alumno');

// user_type.addEventListener('change', () => {
//     if (user_type == tipo_docente) {
//         tipo_docente.setAttribute('class', 'block');
//         tipo_alumno.setAttribute('class','hidden');
//         // document.write('eolo');
//     } else if (user_type == tipo_alumno) {
//         tipo_alumno.setAttribute('class', 'block');
//         tipo_docente.setAttribute('class','hidden');
//     }
// });

// });


// window.onload = function(){

// const user_type = document.getElementById('user_type');
// const tipo_docente = document.getElementById('tipo_docente');
// const tipo_alumno = document.getElementById('tipo_alumno');

// user_type.addEventListener('change', () => {
//     if (user_type == 'tipo_docente') {
//         tipo_docente.setAttribute('class', 'block');
//         tipo_alumno.setAttribute('class','hidden');
//         // document.write('eolo');
//     } else if (user_type == 'tipo_alumno') {
//         tipo_alumno.setAttribute('class', 'block');
//         tipo_docente.setAttribute('class','hidden');
//     }
// });

// }


$(document).ready(()=>{

const user_type = $('#user_type');
const tipo_docente = $('#campo_docente');
const tipo_alumno = $('#campo_alumno');

user_type.on('change',  function(){

    let option_checked = $('#user_type option:checked').val();
    if(option_checked == 'docente'){
        // tipo_alumno.toggleClass('hidden');
        // tipo_docente.toggleClass('block');
        tipo_docente.toggleClass('hidden');
        tipo_alumno.attr('class','hidden');
    }
    else if(option_checked == 'alumno'){
        tipo_alumno.toggleClass('hidden');
        tipo_docente.attr('class','hidden');

        // tipo_alumno.toggleClass('block');
    }
});

});


// window.onload(function(){
//     $('#user_type').on('change', function(){
//         console.log('jajjaja');
//     });
// });

// $(document).ready(()=>{
//     $('#user_type').on('change', ()=>{
//         console.log('jajjaja');
//     });
// });


// window.alert('HOLA Caracola');
