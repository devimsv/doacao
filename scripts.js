document.addEventListener('DOMContentLoaded', function () {
    // Código aqui
    const swiper = new Swiper('.galeria', {
        direction: 'horizontal',
        loop: true,
        pagination: {
            el: '.galeria-pagination',
        },
        autoplay: {
            delay: 8000,
        },
    });

    const meta = 55000;
    let arrecadado = 14.539.00;
    let apoiadores = 82;
    let coracoes = 39;

    const arrayDados = [
        { nome: "Doador anônimo", image: "../images/icon.png", apoiador: 1, doado: 40, coracoes: 1 },
        { nome: "Juliana Aparecida", image: "../images/icon.png", apoiador: 1, doado: 30, coracoes: 0 },
        { nome: "Doador anônimo", image: "../images/icon.png", apoiador: 1, doado: 100, coracoes: 1 },
        { nome: "Doador anônimo", image: "../images/icon.png", apoiador: 1, doado: 113.20, coracoes: 0 },
        { nome: "Lucas Fernandes", image: "../images/icon.png", apoiador: 1, doado: 150, coracoes: 1 },
        { nome: "Doador anônimo", image: "../images/icon.png", apoiador: 1, doado: 100, coracoes: 1 },
        { nome: "Fernanda Oliveira", image: "../images/icon.png", apoiador: 1, doado: 200, coracoes: 0 },
        { nome: "Doador anônimo", image: "../images/icon.png", apoiador: 1, doado: 50, coracoes: 1 },
        { nome: "João Castro", image: "../images/icon.png", apoiador: 1, doado: 40, coracoes: 0 },
        { nome: "Doador anônimo", image: "../images/icon.png", apoiador: 1, doado: 100, coracoes: 1 },
        { nome: "Marcela de Moraes", image: "../images/icon.png", apoiador: 1, doado: 50, coracoes: 0 },
        { nome: "Doador anônimo", image: "../images/icon.png", apoiador: 1, doado: 150, coracoes: 1 },
        { nome: "Doador anônimo", image: "../images/icon.png", apoiador: 1, doado: 250, coracoes: 0 },
        { nome: "Marcelo Rodrigues", image: "../images/icon.png", apoiador: 1, doado: 150, coracoes: 1 },
        { nome: "Taís Costa", image: "../images/icon.png", apoiador: 1, doado: 150, coracoes: 1 },
        { nome: "Doador anônimo", image: "../images/icon.png", apoiador: 1, doado: 100, coracoes: 0 },
        { nome: "Doador anônimo", image: "../images/icon.png", apoiador: 1, doado: 40, coracoes: 1 },
        { nome: "Manoel Caetano Santos", image: "../images/icon.png", apoiador: 1, doado: 30, coracoes: 0 }
    ];

    let index = 0;

    function atualizarValores() {
        if (index >= arrayDados.length) return;
        
        let item = arrayDados[index];
        apoiadores += item.apoiador;
        coracoes += item.coracoes;
        animarValor("apoiadores", apoiadores);
        animarValor("coracoes", coracoes);

        let novoValor = arrecadado + item.doado;
        animarValor("doado", novoValor, arrecadado);
        arrecadado = novoValor;
        
        exibirNotificacao(item.nome, item.image, item.doado);
        atualizarBarra();
        index++;
    }

    function atualizarBarra() {
        let porcentagem = (arrecadado / meta) * 100;
        let porcento = Math.round(porcentagem);
        document.getElementById("barra").style.width = porcentagem + "%";
        document.getElementById("barraMobile").style.width = porcentagem + "%";
        document.getElementById("porcentagem").innerHTML = porcento + "%";
    }

    function formatarMoeda(valor) {
        return new Intl.NumberFormat("pt-BR", { style: "currency", currency: "BRL" }).format(valor);
    }

    function animarValor(id, novoValor, valorAntigo = 0) {
        let elementos = document.querySelectorAll(`#${id}, #valorMobile`);
        let inicio = valorAntigo || parseFloat(elementos[0].innerText.replace(/[^0-9.,]/g, "")) || 0;
        let incremento = (novoValor - inicio) / 50;
        let atual = inicio;
        let contador = 0;
        
        let animacao = setInterval(() => {
            atual += incremento;
            elementos.forEach(elemento => {
                elemento.innerText = id === "doado" ? formatarMoeda(atual) : atual.toFixed(0);
            });

            contador++;
            if (contador >= 50) {
                clearInterval(animacao);
                elementos.forEach(elemento => {
                    elemento.innerText = id === "doado" ? formatarMoeda(novoValor) : novoValor;
                });
            }
        }, 20);
    }

    function exibirNotificacao(nome, image, valor) {
        let notificacao = document.createElement("div");
        notificacao.className = "notificacao";
        notificacao.innerHTML = `<div class="avatar"><img src="${image}" alt="${nome}"></div><div class="content"><h4>${nome}</h4> Acabou de doar <strong>${formatarMoeda(valor)}</strong>.</div>`;
        
        document.body.appendChild(notificacao);

        setTimeout(() => {
            let rect = notificacao.getBoundingClientRect();
            // Agora a biblioteca confetti está carregada
            confetti({
                particleCount: 100,
                spread: 70,
                origin: {
                    x: (rect.left + rect.width / 2) / window.innerWidth,
                    y: (rect.top + rect.height / 2) / window.innerHeight
                }
            });
        }, 100);
        
        setTimeout(() => {
            notificacao.style.transform = "translatey(0)";
            notificacao.style.opacity = "0";
            setTimeout(() => notificacao.remove(), 500);
        }, 6000);
    }

    setInterval(atualizarValores, 10000);

    document.addEventListener("DOMContentLoaded", () => {
        atualizarBarra();
    });

    // Carregar a biblioteca confetti apenas uma vez
    let script = document.createElement("script");
    script.src = "https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js";
    script.onload = function () {
        // O script foi carregado com sucesso
        console.log("Confetti library loaded!");
    };
    document.head.appendChild(script);
});
