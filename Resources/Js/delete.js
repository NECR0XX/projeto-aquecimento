function openModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
}

function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}

function confirmDelete(id) {
    openModal();
    document.getElementById("confirmDeleteBtn").onclick = function() {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../../App/Providers/deletarTrainer.php?id=" + id, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    if (xhr.responseText == "success") {
                        window.location.href = "index.php";
                    } else {
                        alert("Falha ao excluir o treinador: " + xhr.responseText);
                    }
                }
            }
        };
        xhr.send();
    };
}