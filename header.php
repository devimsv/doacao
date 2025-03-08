<?php $inicio_id = get_page_by_title('inicio')->ID; ?>

<!DOCTYPE html><html lang="pt-BR"><head>
<title>Faça o bem ajudando a salvar vidas! | Vaquinhas Online</title>
<meta name="description" content="Faça o bem ajudando a salvar vidas!">
<meta name="keywords" content="Faça o bem ajudando a salvar vidas!">
<meta name="author" content="Vakinha Online">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="theme-color" content="#FFFFFF">
<meta name="apple-mobile-web-app-status-bar-style" content="#FFFFFF">
<meta name="msapplication-navbutton-color" content="#FFFFFF">
<meta property="og:title" content="Faça o bem ajudando a salvar vidas! | Vaquinhas Online">
<meta property="og:description" content="Faça o bem ajudando a salvar vidas!">
<meta property="og:url" content="#">
<meta property="og:type" content="website">
<meta property="og:image" content="images/img1.webp">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="icon" href="images/favicon.ico" sizes="32x32">
<link rel="icon" href="images/favicon.ico" sizes="192x192">
<link rel="apple-touch-icon" href="images/favicon.ico">
<meta name="msapplication-TileImage" content="images/favicon.ico">

<script src="<?= get_stylesheet_directory_uri(); ?>/jquery.min.js" defer></script>
<script src="<?= get_stylesheet_directory_uri(); ?>/swiper-bundle.min.js" defer></script>
<script src="<?= get_stylesheet_directory_uri(); ?>/bootstrap.min.js" defer></script>
<script src="<?= get_stylesheet_directory_uri(); ?>/scripts.js" defer></script>
<?php wp_head(); ?>
</head>
<body>
<header>
    <div class="container">
        <div class="content-header d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="#">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg." alt="Vakinha Online">
                </a> 
            </div>
            <div class="menu-header d-none d-lg-flex d-xl-flex align-items-center">
                <div class="item-menu"><span>Como ajudar</span><svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium sc-252fa7a3-14 ixtrj css-vubbuv" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="KeyboardArrowDownIcon" width="24" height="24"><path d="M7.41 8.59 12 13.17l4.59-4.58L18 10l-6 6-6-6z"></path></svg></div>
                <div class="item-menu"><span>Descubra</span><svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium sc-252fa7a3-14 ixtrj css-vubbuv" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="KeyboardArrowDownIcon" width="24" height="24"><path d="M7.41 8.59 12 13.17l4.59-4.58L18 10l-6 6-6-6z"></path></svg></div>
                <div class="item-menu"><span>Como funciona</span><svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium sc-252fa7a3-14 ixtrj css-vubbuv" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="KeyboardArrowDownIcon" width="24" height="24"><path d="M7.41 8.59 12 13.17l4.59-4.58L18 10l-6 6-6-6z"></path></svg></div>
                <div class="logArea d-flex align-items-center justify-content-end">
                    <div class="item-menu-busca">
                        <span>Buscar</span>
                        <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium sc-252fa7a3-15 iZaOBt css-vubbuv" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="SearchRoundedIcon"><path d="M15.5 14h-.79l-.28-.27c1.2-1.4 1.82-3.31 1.48-5.34-.47-2.78-2.79-5-5.59-5.34-4.23-.52-7.79 3.04-7.27 7.27.34 2.8 2.56 5.12 5.34 5.59 2.03.34 3.94-.28 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0 .41-.41.41-1.08 0-1.49zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14"></path></svg>
                    </div>
                    <div class="item-menu-account"><span>Minha conta</span></div>
                    <div class="btn-create">
                        <button type="button" class="btn-create-button">Criar vaquinha</button>
                    </div>
                </div>
            </div>
            <div class="menu-mobile d-flex d-lg-none d-xl-none align-items-center">
                <div class="busca-mobile"><svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium css-vubbuv" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="SearchIcon"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14"></path></svg></div>
                <button class="menu-mobile">
                    <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium sc-c5ec013-3 bQLvwO bm-icon css-vubbuv" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="NotesIcon" style="width: 100%; height: 100%;"><path d="M3 18h12v-2H3zM3 6v2h18V6zm0 7h18v-2H3z"></path></svg>
                </button>
            </div>
        </div>
    </div>
</header>