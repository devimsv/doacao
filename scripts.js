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
let arrecadado = 14589.00;
let apoiadores = 82;
let coracoes = 154;

let themePath = "https://todospelajhuly.site/wp-content/themes/doacao";

const arrayDados = [
    { nome: "Doador anônimo", apoiador: 1, doado: 40, coracoes: 1 },
    { nome: "Juliana Aparecida", apoiador: 1, doado: 30, coracoes: 0 },
    { nome: "Doador anônimo", apoiador: 1, doado: 100, coracoes: 1 },
    { nome: "Doador anônimo", apoiador: 1, doado: 113.20, coracoes: 0 },
    { nome: "Lucas Fernandes", apoiador: 1, doado: 150, coracoes: 1 },
    { nome: "Doador anônimo", apoiador: 1, doado: 100, coracoes: 1 },
    { nome: "Fernanda Oliveira", apoiador: 1, doado: 200, coracoes: 0 },
    { nome: "Doador anônimo", apoiador: 1, doado: 50, coracoes: 1 },
    { nome: "João Castro", apoiador: 1, doado: 40, coracoes: 0 },
    { nome: "Doador anônimo", apoiador: 1, doado: 100, coracoes: 1 },
    { nome: "Marcela de Moraes", apoiador: 1, doado: 50, coracoes: 0 },
    { nome: "Doador anônimo", apoiador: 1, doado: 150, coracoes: 1 },
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
    
    exibirNotificacao(item.nome, item.doado);
    atualizarBarra();
    index++;
}

function atualizarBarra() {
    let porcentagem = (arrecadado / meta) * 100;
    let porcento = Math.round(porcentagem );
    document.getElementById("barra").style.width = porcentagem + "%";
    document.getElementById("barraMobile").style.width = porcentagem + "%";
    document.getElementById("porcentagem").innerHTML = porcento + "%";
}

function exibirNotificacao(nome, valor) {
    let notificacao = document.createElement("div");
    notificacao.className = "notificacao";
    notificacao.innerHTML = `<div class="content"><h4>${nome}</h4> Acabou de doar <strong>${formatarMoeda(valor)}</strong>.</div>`;
    
    document.body.appendChild(notificacao);

    setTimeout(() => {
        notificacao.style.transform = "translatey(0)";
        notificacao.style.opacity = "0";
        setTimeout(() => notificacao.remove(), 500);
    }, 6000);
}

setInterval(atualizarValores, 30000);

document.addEventListener("DOMContentLoaded", () => {
    atualizarBarra();

    let script = document.createElement("script");
    script.src = "https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js";
    document.head.appendChild(script);
});

jQuery(function($){
    $(document).ready(function() {
        $('a[href^="#"]').on('click', function(e) {
          e.preventDefault();
          var id = $(this).attr('href'),
              targetOffset = $(id).offset().top;
          $('html, body').animate({ 
              scrollTop: targetOffset - 60
          }, 1000);
        });

        $('.menu-mobile, .close-menu').click(function(){
            $('.nav-mobile').toggleClass('active');
        });
    });

    $('.btn-ajudar, .fora-modal, .close-modal').click(function(){
        $('.modal-doar').toggleClass('open');
    });
});
