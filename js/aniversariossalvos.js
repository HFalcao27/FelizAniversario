const lista = document.getElementById("listaAniversarios");
const modalEdit = document.getElementById("modalEdit");
const editTitulo = document.getElementById("editTitulo");
const editData = document.getElementById("editData");
const editTelefone = document.getElementById("editTelefone");
const editMensagem = document.getElementById("editMensagem");




let indiceEditando = null;

// LISTAR ANIVERSÁRIOS

function listarAniversarios() {
    lista.innerHTML = "";

    const aniversarios = JSON.parse(localStorage.getItem("aniversarios")) || [];

    if (aniversarios.length === 0) {
        lista.innerHTML = "<li>Nenhum aniversário salvo 🎈</li>";
        return;
    }

    aniversarios.forEach((item, index) => {
        const li = document.createElement("li");

        li.innerHTML = `
    <span>
        <strong>${item.titulo}</strong><br>
        🎂 ${formatarData(item.data)}<br>
        📞 ${item.telefone || "Não informado"}
        💬 ${item.mensagem || "Mensagem padrão"}
    </span>
    <div>
        <button onclick="enviarWhatsApp('${item.titulo}', '${item.telefone}', '${item.mensagem || ""}')">📲</button>
        <button onclick="editarAniversario(${index})">✏️</button>
        <button onclick="removerAniversario(${index})">🗑️</button>
    </div>
`;

        lista.appendChild(li);
    });
}



// FORMATAR DATA

function formatarData(data) {
    const [ano, mes, dia] = data.split("-");
    return `${dia}/${mes}/${ano}`;
}


// REMOVER

function editarAniversario(index) {
    const aniversarios = JSON.parse(localStorage.getItem("aniversarios")) || [];

    indiceEditando = index;
    editTitulo.value = aniversarios[index].titulo;
    editData.value = aniversarios[index].data;
    editTelefone.value = aniversarios[index].telefone;
    editMensagem.value = aniversarios[index].mensagem || "";

    modalEdit.style.display = "flex";
}



// EDITAR

function editarAniversario(index) {
    const aniversarios = JSON.parse(localStorage.getItem("aniversarios")) || [];

    indiceEditando = index;
    editTitulo.value = aniversarios[index].titulo;
    editData.value = aniversarios[index].data;

    modalEdit.style.display = "flex";
}

function salvarEdicao() {
    const aniversarios = JSON.parse(localStorage.getItem("aniversarios")) || [];

    aniversarios[indiceEditando] = {
        titulo: editTitulo.value,
        data: editData.value,
        telefone: editTelefone.value,
        mensagem: editMensagem.value
    };

    localStorage.setItem("aniversarios", JSON.stringify(aniversarios));

    fecharModalEdit();
    listarAniversarios();
}



function fecharModalEdit() {
    modalEdit.style.display = "none";
    indiceEditando = null;
}

//Enivar Mensagem 

function enviarWhatsApp(nome, telefone, mensagemPersonalizada) {
    const numeroLimpo = telefone.replace(/\D/g, "");

    const mensagemPadrao = `🎉 Feliz aniversário, ${nome}! 🎂🥳 Que seu dia seja incrível!`;

    const mensagemFinal = mensagemPersonalizada
        ? mensagemPersonalizada
        : mensagemPadrao;

    const url = `https://wa.me/55${numeroLimpo}?text=${encodeURIComponent(mensagemFinal)}`;

    window.open(url, "_blank");
}


//Testar pra ver se vai da certo



// Iniciar============================
listarAniversarios();