<?php
// Template name: inicio
get_header();
?>

<?php if (have_posts()) { while (have_posts()) { the_post(); ?>
<script>
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
</script>
<main>
    <section id="corpo">
        <div class="container">
            <div class="topVakinha">
                <span>SAÚDE / TRATAMENTOS</span>
                <h1>Jujuba tem autismo e doença rara precisa de ajuda urgente para tratar deformidade craniana</h1>
                <span>ID: 5504941</span>
            </div>
            <div class="detailsVakinha d-flex flex-wrap">
                <div class="detalhes">
                    <div class="detalhes-view">
                        <div class="galeria">
                            <div class="swiper-wrapper">
                                <div class="image swiper-slide">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/jhuly.png" alt="Faça o bem ajudando a salvar vidas!">
                                </div>

                                <div class="image swiper-slide">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/jhuly2.png" alt="Faça o bem ajudando a salvar vidas!">
                                </div>
                            </div>
                            <div class="galeria-pagination"></div>
                        </div>
                        <div class="sc-jXbUNg jeWFMw">
                            <ul class="sc-46fe23d1-0 haSOVG">
                                <li class="sc-46fe23d1-1 gNSeDc"><img class="sc-ad44238c-0 bFFsjk sc-46fe23d1-2 lgcmt" src="<?php echo get_template_directory_uri(); ?>/images/avs.svg"></li>
                                <li class="sc-46fe23d1-1 gNSeDc"><img class="sc-ad44238c-0 bFFsjk sc-46fe23d1-2 lgcmt" src="<?php echo get_template_directory_uri(); ?>/images/perfil.png"></li>
                                <li class="sc-46fe23d1-1 gNSeDc"><img class="sc-ad44238c-0 bFFsjk sc-46fe23d1-2 lgcmt" src="<?php echo get_template_directory_uri(); ?>/images/imm.svg"></li>
                                <li class="sc-46fe23d1-1 gNSeDc"><img class="sc-ad44238c-0 bFFsjk sc-46fe23d1-2 lgcmt" src="<?php echo get_template_directory_uri(); ?>/images/lo.webp"></li>
                                <li class="sc-46fe23d1-1 gNSeDc"><img class="sc-ad44238c-0 bFFsjk sc-46fe23d1-2 lgcmt" src="<?php echo get_template_directory_uri(); ?>/images/kc.webp"></li>
                                <li class="sc-46fe23d1-1 gNSeDc"><section class="sc-46fe23d1-3 jLFjnt">+</section></li>
                            </ul>
                            <div class="sc-jXbUNg kaMzRM">
                                <span class="sc-fqkvVR ivmFdA"><span id="coracoes">39</span> corações recebidos</span>
                                <div class="sc-jXbUNg iVMVsL">
                                    <svg id="___SVG_ID__1__31___" data-name="Grupo 1248" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 18.319 15.34">
                                        <defs>
                                            <radialGradient id="___SVG_ID__1__0___" cx="0.298" cy="0.5" r="1.023" gradientTransform="matrix(0.853, 0, 0, -1, 0.003, 2)" gradientUnits="objectBoundingBox">
                                                <stop offset="0" stop-color="#24ca68"></stop>
                                                <stop offset="0.704" stop-color="#0a8f51"></stop>  
                                                <stop offset="1" stop-color="#007a48"></stop>
                                            </radialGradient>
                                            <clipPath id="___SVG_ID__1__2___">
                                                <rect id="___SVG_ID__1__1___" data-name="Retângulo 417" width="3.582" height="2.246" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="___SVG_ID__1__4___">
                                                <path id="___SVG_ID__1__3___" data-name="Caminho 602" d="M13.13,1.456A3.588,3.588,0,0,0,10.768,3.11c-.126.207-.156.412-.086.5s.228.044.461-.078c.341-.18.873-.5,1.368-.75a6.142,6.142,0,0,1,1.03-.419c.953-.257,1-1.187-.41-.9" transform="translate(-10.645 -1.403)" fill="#fff" clip-rule="evenodd"></path>
                                            </clipPath>
                                            <clipPath id="___SVG_ID__1__6___">
                                                <rect id="___SVG_ID__1__5___" data-name="Retângulo 419" width="4.227" height="4.294" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="___SVG_ID__1__8___">
                                                <path id="___SVG_ID__1__7___" data-name="Caminho 603" d="M3.39,1.333A2.985,2.985,0,0,0,1.17,3.154a.537.537,0,0,0,.02.545c.092.088.26.05.489-.086.334-.2.847-.551,1.333-.825a5.4,5.4,0,0,1,1.037-.46c.989-.283.831-1.307-.658-1M.461,4.7c-.072.406.149,1.22.514.7A2.914,2.914,0,0,0,1.3,4.753a.582.582,0,0,0-.167-.631c-.421-.271-.625.3-.675.579" transform="translate(-0.447 -1.275)" fill="#fff" clip-rule="evenodd"></path>
                                            </clipPath>
                                        </defs>
                                        <path id="___SVG_ID__1__13___" data-name="Caminho 597" d="M9.16,2.184A5.647,5.647,0,0,0,3.174.242C.695,1.027-.329,3.754.092,6.165c.667,3.826,4.845,7.644,8.459,9.055a1.678,1.678,0,0,0,.6.12h.032a1.633,1.633,0,0,0,.59-.12c3.649-1.445,7.792-5.229,8.46-9.055a6.259,6.259,0,0,0,.091-1.012V5.048A4.864,4.864,0,0,0,15.145.242,5.119,5.119,0,0,0,13.6,0,5.855,5.855,0,0,0,9.16,2.184" transform="translate(0 0)" fill="url(#___SVG_ID__1__0___)"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="resumo-mobile sticker d-block d-lg-none d-xl-none">
                    <div class="perfil d-flex">
                        <div class="avatar">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/perfil.png" alt="Vakinha do Amor do Amor Pet">
                        </div>

                        <div class="dadosPerfil">
                            <h3>Doe Com Esperanca</h3>
                            <span class="ativo">Ativo(a) no Vakinha desde 18/02/2025</span>
                            <span class="vakinhas">12 vaquinhas criadas <div class="bullet"></div> 1 vaquinha apoiada</span>
                            <a href="#">Leia mais</a>
                        </div>
                    </div>
                    <div class="progresso-mobile d-flex align-items-center">
                        <div class="porcentagem"><span id="porcentagem">26%</span></div>
                        <div class="barra">
                            <div class="barraParcial" id="barra"></div>
                        </div>
                    </div>
                    <div class="arrecadacaoMobile">
                        <strong id="valorMobile">R$ 14.539,00</strong> de <span>R$ 55.000,00</span>
                    </div>
                </div>
                <div class="menu-detalhes">
                    <ul>
                        <li class="active">Sobre</li>
                        <li>Novidades</li>
                        <li>Quem ajudou</li>
                    </ul>
                </div>
                <div class="show-sobre">
                    <span class="inicio">
                    <p><strong>Jhuly</strong>, carinhosamente chamada de <strong>Jujuba</strong>, é uma encantadora menina de 4 anos que nasceu com <strong>autismo</strong> e <strong>Síndrome de Apert</strong>, uma condição rara que afeta seu desenvolvimento físico.</p>

<p>A síndrome provoca deformidades no crânio, rosto, dentes e membros. Além disso, seus dedos das mãos e pés são unidos, e ela possui uma fenda no céu da boca, o que dificulta bastante sua fala.</p>

<p><strong>Marlene</strong>, mãe solo dedicada, luta diariamente com todas as forças para garantir o tratamento adequado para a filha. Vivendo apenas com um salário mínimo e sem um carro próprio, ela enfrenta o desafio semanal de levar a pequena Jujuba para consultas médicas em <strong>Salvador</strong>, a mais de 100 km de sua cidade natal, <strong>Conceição do Jacuípe (BA)</strong>.</p>

<p>O transporte particular custa <strong>R$ 350 por viagem</strong>, já que o transporte público causa crises de agitação em Jujuba. Mesmo diante das dificuldades financeiras e logísticas, Marlene não mede esforços para cuidar da filha com todo o amor e dedicação possível.</p>

<p>A irmã mais velha, <strong>Iza</strong>, é uma grande parceira nessa luta diária. Morando perto, visita frequentemente a pequena Jujuba e registra momentos divertidos e afetuosos, compartilhando vídeos nas redes sociais para ajudar na renda familiar.</p>

<p>Infelizmente, Jujuba enfrenta também o desafio das críticas preconceituosas e comentários desagradáveis. Apesar disso, ela mantém sempre um lindo sorriso no rosto, mostrando a todos sua inteligência, doçura e alegria contagiante.</p>

                </div>
            </div>
        </div>
        <div class="resumo" style="display: none;">
                <div class="sticker-resumo">
                    <div class="progresso">
                        <div class="barra-geral">
                            <div class="barraTotal">
                                <div class="barraParcial" id="barra"></div>
                            </div>
                        </div>
                    </div>
                    <div class="arrecadado">
                        <span>Arrecadado</span>
                        <h2 id="doado">R$ 4.960,00</h2>
                    </div>
                    <div class="meta">
                        <span>Meta</span>
                        <span>R$ 100.000,00</span>
                    </div>
                    <div class="apoiadores">
                        <span>Apoiadores</span>
                        <span id="apoiadores">435</span>
                    </div>
                    <div class="acao">
                        <button type="button" class="btn-ajudar">Quero Ajudar</button>
                    </div>
                    <div class="perfil d-flex">
                        <div class="avatar">
                            <img src="images/perfil.png" alt="Vakinha do Amor do Amor Pet">
                        </div>
                        <div class="dadosPerfil">
                            <h3>Vakinha do Amor</h3>
                            <span class="ativo">Ativo(a) no Vakinha desde 09/02/2025</span>
                            <span class="vakinhas">12 vaquinha criada <div class="bullet"></div> 1 vaquinha apoiada</span>
                            <a href="#">Leia mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <div class="modal modal-doar">
        <div class="fora-modal"></div>
        <div class="content-modal">
            <div class="close-modal">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" x="0" y="0" viewBox="0 0 320.591 320.591" style="enable-background:new 0 0 512 512" xml:space="preserve">
                    <g>
                        <path d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z" fill="#ffffff" opacity="1"></path>
                        <path d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z" fill="#ffffff" opacity="1"></path>
                    </g>
                </svg>
            </div>
            <h2>Qual valor deseja doar?</h2>
            <div class="valores d-flex align-items-center justify-content-between flex-wrap">
                <a href="https://checkout.esperancadoe.shop/checkout?product=b195dea6-ee81-11ef-8446-46da4690ad53" target="_blank">R$ 25,00</a>
                <a href="https://checkout.esperancadoe.shop/checkout?product=d685f7f2-ea63-11ef-be25-46da4690ad53" target="_blank">R$ 40,00</a>
                <a href="https://checkout.esperancadoe.shop/checkout?product=e5aae9a3-ea63-11ef-be25-46da4690ad53" target="_blank">R$ 50,00</a>
                <a href="https://checkout.esperancadoe.shop/checkout?product=ff97390b-ea63-11ef-be25-46da4690ad53" target="_blank">R$ 100,00</a>
                <a href="https://checkout.esperancadoe.shop/checkout?product=0c19abc4-ea64-11ef-be25-46da4690ad53" target="_blank">R$ 150,00</a>
                <a href="https://checkout.esperancadoe.shop/checkout?product=151b154b-ea64-11ef-be25-46da4690ad53" target="_blank">R$ 200,00</a>
                <a href="https://checkout.esperancadoe.shop/checkout?product=560a51b8-ee82-11ef-8446-46da4690ad53" target="_blank">R$ 250,00</a>
                <a href="https://checkout.esperancadoe.shop/checkout?product=20dc8531-ea64-11ef-be25-46da4690ad53" target="_blank">R$ 300,00</a>
                <a href="https://checkout.esperancadoe.shop/checkout?product=2b09d223-ea64-11ef-be25-46da4690ad53" target="_blank">R$ 500,00</a>
                <div class="switch-container">
                    <div class="switch-info">
                        <span>Fazer doação anônima</span>
                        <button class="info-button" aria-label="Informação"></button>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <section id="fixed-mobile" class="d-block d-lg-none d-xl-none">
        <button type="button" class="btn-ajudar">Quero Ajudar</button>
    </section>
</main>
<?php }; }; ?>

<?php get_footer(); ?>