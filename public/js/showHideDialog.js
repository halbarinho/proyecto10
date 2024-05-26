/**
 *
 * @param {*} id
 * Funciones para mostrar/ocultar los modales para confirmar eliminar
 */

function showDialog(id) {

    const dialog = document.getElementById('dialog');
    dialog.dataset.id = id;
    dialog.classList.remove('hidden');
    setTimeout(() => {
        dialog.classList.remove('opacity-0');
    }, 20);
}

function hideDialog() {
    const dialog = document.getElementById('dialog');
    dialog.classList.add('opacity-0');
    setTimeout(() => {
        dialog.classList.add('hidden');
    }, 500);
}
