<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <title>IMEL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <style>
        .tb-color {
            color: #cc2105;
        }

        /* From Uiverse.io by OnlyCodeChannel */
        .searchBox {
            display: flex;
            width: 380px;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            background: #2f3640;
            border-radius: 50px;
            position: relative;
            margin: 10px;
        }

        .searchButton {
            color: white;
            position: absolute;
            right: 8px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--gradient-2, linear-gradient(90deg, #cc2105 0%, #009EFD 100%));
            border: 0;
            display: inline-block;
            transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
        }

        /*hover effect*/
        button:hover {
            color: #fff;
            background-color: #1A1A1A;
            box-shadow: rgba(0, 0, 0, 0.5) 0 10px 20px;
            transform: translateY(-3px);
        }

        /*button pressing effect*/
        button:active {
            box-shadow: none;
            transform: translateY(0);
        }

        .searchInput {
            border: none;
            background: none;
            outline: none;
            color: white;
            font-size: 15px;
            padding: 24px 46px 24px 26px;
            width: 100%;
        }
    </style>
    <script src="js/sweetalert2@11.js"></script>
    <!-- CSS principal -->
    <link href="{{ asset('web/css/bootstrap.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('web/css/style.css') }}" type="text/css" rel="stylesheet" media="all">
    <!-- CSS de Apoio -->
    <link rel="stylesheet" href="{{ asset('web/css/owl.theme.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('web/css/owl.carousel.css') }}" type="text/css" media="screen"
        property="" />
    <!-- Link para icons da net -->
    <link href="{{ asset('web/css/fontawesome-all.min.css') }}" rel="stylesheet">

    <style>
        .navbar {
            position: fixed;
            width: 100%;
        }

        .al-center {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
</head>

<body>
    <!-- Cabeçalho Inicio -->
    <div class="banner">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary pt-3">
                <h1><a class="navbar-brand" href="#">IMEL
                    </a></h1>

                <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Início
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Cursos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Inforgest</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Cogest</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">APUB</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Finaças</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Estatistica</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">contablidade</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Gestão Empresarial</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Comunicação Social</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Comércio</a>

                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('comunicado') }}">Comunicados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('recurso') }}">Recurso</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sobre') }}">Sobre</a>
                        </li>
                        <a href="{{ route('login') }}"><button class="v3">Login</button></a>
                    </ul>
                </div>
            </nav>
        </header>
    </div>
    <!-- Cabeçalho Fim -->
    <br>


    <br>
    <br>


    <!--historia Inicio-->
    <section class="history">
        <div>
            <div class="container-xxl py-5">
                <h2>Sobre o IMEL</h2></br>
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('web/images/bg5.jpg')}}"
                                    style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                            <p>Tal como acontece com os demais institutos médios de ensino técnico os cursos técnicos do
                                IMEL têm a duração de <b>quatro anos</b>, indo da 10ª à 13ª classe, fechando com a
                                <b>Prova de Aptidão Profissional (PAP)</b>, que tem como suporte metodológico a
                                disciplina de <b>Projecto Tecnológico</b>.</p></br>

                            <p>A julgar pela típologia de cursos ministrados, é fácil perceber que o IMEL é uma das
                                muitas instituição de ensino médio técnico que trabalham para a materialização da
                                politica do Ministério da Educação orientada para a fomação de técnicos de economia,
                                tendo em vista a satisfação das necessidades do mercado de trabalho</p></br>
                            <p>O Instituto Médio de Economia de Luanda é uma instituição de ensino técnico fundado no
                                ano lectivo de <b>1990</b> resultao da extinção do antigo complexo estudantil Karl
                                Makarenko e tem como vocação a formação de tecnicos médios para o mercado de trabalho no
                                sector da économia.</p>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="history">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('web/images/bg4.jpg')}}"
                            style="object-fit: cover;">
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h3>Missão</h3></br>
                    <p> Formar técnicos médios com capacidade e qualidade tendo em vista a satisfação das necessidades
                        do mercado de trabalho;</p></br>

                    <h3>Visão</h3></br>
                    <p>Ser uma referência a nível local e nacional pelo sucesso academico e profissional dos seus
                        alunos;</p></br>

                    <h3>Valores</h3></br>
                    <p>O pensamento critíco;</p>
                    <p>A igualdade de Oportunidades;</p>
                    <p>O respeito pelo meio Ambiente;</p>
                    <p>Criatividade e outros;</p>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--historia fim-->

    <!-- Rodapé Inicio-->
    <footer class="newsletter_right pymd-5 py-4" id="footer">
        <div class="container">
            <div class="inner-sec py-md-5 py-3">
                <div class="row mb-md-4 mb-md-3">
                    <div class="col-lg-3 col-md-6 social-info text-left">
                        <h3 class="tittle1 foot mb-md-5 mb-4 text-white">Contactos</h3>
                        <p class="my-2"> Luanda, Angola</p>
                        <p class="phone">phone: (+244) 934-278-010 </p>
                        <p class="phone">Email:
                            <a href="#">imel@gmail.com</a>
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6 social-info text-left">
                        <h3 class="tittle1 foot mb-md-5 mb-4 text-white">Localização</h3>
                        <p> 1º de Maio, Av. Deolinda Rodrigues</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--Rodapé FIm-->

    <!------------------------------Javascript------------------------------>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tableBody = document.querySelector('#recursos-table tbody');

            // Obtenha o token CSRF do meta tag no HTML
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            tableBody.addEventListener('click', async (event) => {
                if (event.target.closest('.btn-inscrever')) {
                    const alunoId = event.target.dataset.alunoId;

                    // Solicitar confirmação do slug via SweetAlert
                    const {
                        value: slug
                    } = await Swal.fire({
                        title: 'Confirmação de Inscrição',
                        text: 'Por favor, insira o seu slug para confirmar:',
                        input: 'text',
                        inputPlaceholder: 'Digite seu slug aqui...',
                        showCancelButton: true,
                        confirmButtonText: 'Confirmar',
                        cancelButtonText: 'Cancelar',
                        inputValidator: (value) => {
                            if (!value) {
                                return 'Você precisa digitar o slug!';
                            }
                        }
                    });

                    if (slug) {
                        // Enviar o slug e buscar as disciplinas de recurso
                        try {
                            const response = await fetch(`/api/aluno/${alunoId}/disciplinas`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken // Inclui o token CSRF no cabeçalho
                                },
                                body: JSON.stringify({
                                    slug
                                })
                            });

                            const result = await response.json();

                            if (!response.ok) {
                                // Se a resposta não for ok, mostra o erro no SweetAlert
                                Swal.fire({
                                    title: 'Erro',
                                    text: result.message || 'Algo deu errado. Tente novamente.',
                                    icon: 'error'
                                });
                                return;
                            }

                            // Exibir as disciplinas de recurso
                            let disciplinasHtml = `<ul>`;
                            result.disciplinas.forEach((disciplina) => {
                                disciplinasHtml += `<li>${disciplina.nome_disciplina}</li>`;
                            });
                            disciplinasHtml += `</ul>`;

                            await Swal.fire({
                                title: 'Disciplinas de Recurso',
                                html: disciplinasHtml,
                                confirmButtonText: 'Finalizar Inscrição'
                            });

                            // Atualizar o status do recurso e gerar recibo
                            const finalizeResponse = await fetch(
                                `/api/aluno/${alunoId}/finalizar-inscricao`, {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': csrfToken // Inclui o token CSRF no cabeçalho
                                    },
                                    body: JSON.stringify({
                                        slug
                                    })
                                });

                            const finalizeResult = await finalizeResponse.json();

                            if (!finalizeResponse.ok) {
                                // Se não for bem-sucedido, exibe erro
                                Swal.fire({
                                    title: 'Erro ao Finalizar Inscrição',
                                    text: finalizeResult.message ||
                                        'Não foi possível finalizar a inscrição. Tente novamente.',
                                    icon: 'error'
                                });
                                return;
                            }

                            const pdfUrl = finalizeResult.url; // URL do PDF gerado
                            Swal.fire({
                                title: 'Inscrição Finalizada',
                                text: 'O recibo da sua inscrição foi gerado.',
                                icon: 'success',
                                showCancelButton: true,
                                confirmButtonText: 'Visualizar Recibo',
                                cancelButtonText: 'Baixar Recibo',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Exibir o PDF gerado em uma nova janela ou aba
                                    window.open(pdfUrl, '_blank');
                                } else {
                                    // Baixar o PDF gerado
                                    const link = document.createElement('a');
                                    link.href = pdfUrl;
                                    link.download = 'recibo_inscricao.pdf';
                                    link.click();
                                }
                            });

                        } catch (error) {
                            // Capturar e mostrar qualquer erro inesperado na requisição
                            Swal.fire({
                                title: 'Erro',
                                text: `Ocorreu um erro inesperado: ${error.message}`,
                                icon: 'error'
                            });
                        }
                    }
                }
            });
        });
    </script>
    <!-- javascrip -->
    <script src="{{ asset('web/js/jquery-2.2.3.min.js') }}"></script>
    <!-- //js -->

    <!-- carousel-->
    <script src="{{ asset('web/js/owl.carousel.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 3,
                        nav: true,
                        loop: false,
                        margin: 20
                    }
                }
            })
        })
    </script>

    <!-- //carousel -->
    <!-- estados-->
    <script src="{{ asset('web/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.countup.js') }}"></script>
    <script>
        $('.counter').countUp();
    </script>
    <!-- //estados -->


    <script src="{{ asset('web/js/move-top.js') }}"></script>
    <script src="{{ asset('web/js/easing.js') }}"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>



    <script>
        $(document).ready(function() {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="{{ asset('web/js/SmoothScroll.min.js') }}"></script>
    <script src="{{ asset('web/js/bootstrap.js') }}"></script>
</body>

</html>
