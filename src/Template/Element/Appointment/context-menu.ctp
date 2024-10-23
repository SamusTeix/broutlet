<style>
    /* Estilos para o menu */
    .context-menu {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        /* Garante que o menu fique acima de outros elementos */
    }

    .context-menu a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .context-menu a:hover {
        background-color: #f1f1f1;
    }
</style>

<div class="context-menu" id="contextMenu">
    <a href="#" onclick="createAppointment()">Adicionar apontamento</a>
    <a href="#">Adicionar tarefa</a>
</div>

<script>
    let showContextMenu = false;
    window.onclick = function(event) {
        const contextMenu = document.getElementById("contextMenu");
        if (!contextMenu.contains(event.target) && showContextMenu) {
            contextMenu.style.display = "none";
            showContextMenu = false;
        }
    }

    function showOptions(event) {
        event.preventDefault();
        mainDate.setDate(event.target.innerText);

        let menuWidth = $(document.getElementById('actions-sidebar')).width();
        const contextMenu = document.getElementById("contextMenu");
        contextMenu.style.display = "block";
        contextMenu.style.left = (event.pageX - menuWidth - 60) + "px";
        contextMenu.style.top = (event.pageY - 60) + "px";

        setTimeout(function() {
            showContextMenu = true;
        }, 500);
    }
</script>