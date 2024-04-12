
function showDialog(event, id) {
    event.stopPropagation();

    let dialog = document.getElementById('dialog-' + id);
    dialog.classList.remove('hidden');
    setTimeout(() => {
        dialog.classList.remove('opacity-0');
    }, 20);
}

function hideDialog(event, id) {
    event.stopPropagation();
    let dialog = document.getElementById('dialog-' + id);
    dialog.classList.add('opacity-0');
    setTimeout(() => {
        dialog.classList.add('hidden');
    }, 500);
}

function deleteActivity(event, id) {
    event.stopPropagation();
    fetch(`/activity/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            // Recarga la página o actualiza la lista de recursos
            location.reload(); // O cualquier otra acción necesaria
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });
}
