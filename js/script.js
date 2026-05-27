// VARIÁVEIS 

const daysContainer = document.getElementById("days");
const monthYear = document.getElementById("meseano");
const modal = document.getElementById("modal");
const tituloInput = document.getElementById("nome");
const dataInput = document.getElementById("data");
const telefoneInput = document.getElementById("telefone");
const mensagemInput = document.getElementById("mensagem");



let dataAtual = new Date();
let mesAtual = dataAtual.getMonth();
let anoAtual = dataAtual.getFullYear();
let diaSelecionado = null;

const meses = [
    "Janeiro", "Fevereiro", "Março", "Abril",
    "Maio", "Junho", "Julho", "Agosto",
    "Setembro", "Outubro", "Novembro", "Dezembro"
];

// CARREGAR CALENDÁRIO

function renderCalendario() {
    daysContainer.innerHTML = "";

    monthYear.textContent = `${meses[mesAtual]} ${anoAtual}`;

    const primeiroDia = new Date(anoAtual, mesAtual, 1).getDay();
    const ultimoDia = new Date(anoAtual, mesAtual + 1, 0).getDate();

    // Espaços vazios antes do dia 1
    for (let i = 0; i < primeiroDia; i++) {
        const vazio = document.createElement("div");
        daysContainer.appendChild(vazio);
    }

    // Criar dias
    for (let dia = 1; dia <= ultimoDia; dia++) {
        const diaEl = document.createElement("div");
        diaEl.textContent = dia;

        const hoje = new Date();
        if (
            dia === hoje.getDate() &&
            mesAtual === hoje.getMonth() &&
            anoAtual === hoje.getFullYear()
        ) {
            diaEl.classList.add("today");
        }

        diaEl.addEventListener("click", () => abrirModal(dia));
        daysContainer.appendChild(diaEl);
    }

    marcarAniversarios();
}


// MUDAR MÊS

function prevMonth() {
    mesAtual--;
    if (mesAtual < 0) {
        mesAtual = 11;
        anoAtual--;
    }
    renderCalendario();
}

function nextMonth() {
    mesAtual++;
    if (mesAtual > 11) {
        mesAtual = 0;
        anoAtual++;
    }
    renderCalendario();
}


// MODAL

function abrirModal(dia) {
    diaSelecionado = dia;
    modal.style.display = "flex";

    const dataFormatada = `${anoAtual}-${String(mesAtual + 1).padStart(2, "0")}-${String(dia).padStart(2, "0")}`;
    dataInput.value = dataFormatada;
}

function fecharModal() {
    modal.style.display = "none";
    tituloInput.value = "";
    dataInput.value = "";
    telefoneInput.value = "";
    mensagemInput.value = "";
}




// SALVAR EVENTO

function salvarEvento() {
    const nome = tituloInput.value;
    const data = dataInput.value;
    const telefone = telefoneInput.value;
    const mensagem = mensagemInput.value;

    if (!nome || !data || !telefone) {
        alert("Preencha nome, data e telefone!");
        return;
    }

    const eventos = JSON.parse(localStorage.getItem("aniversarios")) || [];

    eventos.push({
        nome,
        data,
        telefone,
        mensagem
    });

    localStorage.setItem("aniversarios", JSON.stringify(eventos));

    fetch("salvar.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
    },
    body: `nome=${encodeURIComponent(nome)}
    &data_niver=${encodeURIComponent(data)}
    &contato=${encodeURIComponent(telefone)}
    &mensagem=${encodeURIComponent(mensagem)}`
})
.then(res => res.text())
.then(resposta => {
    console.log(resposta);
});

    fecharModal();
    renderCalendario();
}


// MARCAR ANIVERSÁRIOS

function marcarAniversarios() {
    const eventos = JSON.parse(localStorage.getItem("aniversarios")) || [];
    const dias = document.querySelectorAll(".days div");

    eventos.forEach(evento => {
        const [ano, mes, dia] = evento.data.split("-").map(Number);

        if (mes - 1 === mesAtual && ano === anoAtual) {
            dias.forEach(el => {
                if (Number(el.textContent) === dia) {
                    el.style.backgroundColor = "#ffcc00";
                    el.style.color = "#000";
                    el.title = evento.nome;
                }
            });
        }
    });
}

// TESTAR PARA VER SE DA CERTO.

renderCalendario();