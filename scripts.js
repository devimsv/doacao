const swiper = new Swiper('.galeria', {
    direction: 'horizontal',
    loop: true,
    pagination: { el: '.galeria-pagination' },
    autoplay: { delay: 8000 },
});

const meta = 55000;
let arrecadado = 14589.00;
let apoiadores = 82;
let coracoes = 154;

const arrayDados = [
    { nome: "Doador anônimo", image: "https://todospelajhuly.site/wp-content/themes/doacao/images/icon.png", apoiador: 1, doado: 40, coracoes: 1 },
    { nome: "Juliana Aparecida", image: "https://todospelajhuly.site/wp-content/themes/doacao/images/icon.png", apoiador: 1, doado: 30, coracoes: 0 },
    { nome: "Lucas Fernandes", image: "https://todospelajhuly.site/wp-content/themes/doacao/images/icon.png", apoiador: 1, doado: 150, coracoes: 1 }
];

let index = 0;

function atualizarValores() {
    if (index >= arrayDados.length) return;

    let item = arrayDados[index];
    apoiadores += item.apoiador;
    coracoes += item.coracoes;

    let novoValor = arrecadado + item.doado;
    arrecadado = novoValor; // Atualiza primeiro

    animarValor("apoiadores", apoiadores);
    animarValor("coracoes", coracoes);
    animarValor("doado", novoValor, arrecadado);

    exibirNotificacao(item.nome, item.image, item.doado);
    atualizarBarra();
    index++;
}

document.addEventListener("DOMContentLoaded", () => {
    atualizarBarra();

    let script = document.createElement("script");
    script.src = "https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js";
    document.head.appendChild(script);
});

let intervalo = setInterval(() => {
    if (index < arrayDados.length) {
        atualizarValores();
    } else {
        clearInterval(intervalo);
    }
}, 30000);
