// Pega o modal pelo ID
const modalEdit = document.getElementById("modalEdit");

// Campos do formulário
const editId = document.getElementById("editId");
const editNome = document.getElementById("editNome");
const editData = document.getElementById("editData");
const editContato = document.getElementById("editContato");
const editMensagem = document.getElementById("editMensagem");

// Função para abrir o modal
function abrirModalEdit(id, nome, data, contato, mensagem) {

    modalEdit.style.display = "flex";

    editId.value = id;
    editNome.value = nome;
    editData.value = data;
    editContato.value = contato;
    editMensagem.value = mensagem;
}

// Função para fechar modal
function fecharModalEdit() {
    modalEdit.style.display = "none";
}

// Fechar clicando fora do modal
window.onclick = function(event) {

    if(event.target == modalEdit) {
        fecharModalEdit();
    }
}

function excluiModal(id, nome) {

    const confirmar = confirm(
        "Deseja realmente excluir o aniversário de " + nome + "?"
    );

    if(confirmar) {

        window.location.href = "backend/exclui.php?id=" + id;

    }
}