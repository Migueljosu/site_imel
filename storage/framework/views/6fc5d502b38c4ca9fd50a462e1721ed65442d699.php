<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <title>IMEL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- CSS principal -->
    <link href="<?php echo e(asset('web/css/bootstrap.css')); ?>" type="text/css" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('web/css/style.css')); ?>" type="text/css" rel="stylesheet" media="all">
	<!-- CSS de Apoio -->
	<link rel="stylesheet" href="<?php echo e(asset('web/css/owl.theme.css')); ?>" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo e(asset('web/css/owl.carousel.css')); ?>" type="text/css" media="screen" property="" />
    <!-- Link para icons da net -->
    <link href="<?php echo e(asset('web/css/fontawesome-all.min.css')); ?>" rel="stylesheet">

    <style>
       .navbar{
            position: fixed;
            width: 100%;
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

                <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
								<li class="nav-item active">
									<a class="nav-link" href="<?php echo e(route('home')); ?>">Início
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
									    aria-expanded="false">
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
									<a class="nav-link" href="<?php echo e(route('comunicado')); ?>">Comunicados</a>
								</li>
                                <li class="nav-item">
									<a class="nav-link" href="<?php echo e(route('recurso')); ?>">Recurso</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo e(route('sobre')); ?>">Sobre</a>
								</li>
                                    <a href="<?php echo e(route('login')); ?>"><button class="v3">Login</button></a>
					</ul>
				</div>
			</nav>
        </header>
        <!-- Texto da imagem de fundo Inicio -->
        <div class="container">
            <div class="banner-text">
                <div class="slider-info">
                    <h3>O teu Futuro, começa aqui!</h3>
					<a href="#" class="banner-button btn mt-md-5 mt-4">Saiba mais</a>
				</div>
            </div>
        </div>
         <!-- Texto da imagem de fundo Fim -->
    </div>
    <!-- Cabeçalho Fim -->

    <!--O que temos à ofecer Inicio-->
    <section class="banner-bottom-wthree py-lg-5 py-md-5 py-3">
        <div class="container">
            <div class="inner-sec-w3ls py-lg-5 py-3">
               <h3 class="heading-agileinfo text-center">O que  Oferecemos?</h3>
                <div class="row middle-grids mt-md-5 pt-4">
                    <div class="col-lg-4 about-in-w3ls middle-grid-info text-center">
                        <div class="card">
                            <div class="card-body">
                                <i class="fas fa-graduation-cap mb-2"></i>
                                <h5 class="card-title text-uppercase my-3">
                                  Ensino de Qualidade</h5>
                                <p class="card-text">Professores qualificados, com metodologias de ensino dinâmicas e com um ambiente de estudo propício.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 about-in-w3ls middle-grid-info active text-center">
                        <div class="card">
                            <div class="card-body">
                                <i class="fas fa-book mb-2"></i>
                                <h5 class="card-title text-uppercase my-3">Conforto</h5>
                                <p class="card-text">Ambiente limpo e agradável que proporciona um clima satisfatório que por sua vez contribui no bem estar dos estudantes e professores.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 about-in-w3ls middle-grid-info text-center">
                        <div class="card">
                            <div class="card-body">
                                <i class="fas fa-globe mb-2"></i>
                                <h5 class="card-title text-uppercase my-3">Equipamento de Topo</h5>
                                <p class="card-text">Laboratórios equipados com dispositos tecnologicos de alta perfomance, que permitem um estudo moderno aos alunos.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--O que temos à ofecer Fim-->
    
    <!--------Feira do IMEL Inicio-->
    <div class="agileits-services py-sm-5">
        <div class="container py-lg-5 pt-3 pb-5"> 
            <div class="w3ls_gallery_grids pt-md-5">
            <h2 class="heading-agileinfo text-center  mb-4">Feira do IMEL</h2>      
                <div class="row agileits_w3layouts_gallery_grid">
                    <div class="col-sm-4  agileits_w3layouts_gallery_grid1  w3layouts_gallery_grid1 hover14">
                        <div class="w3_agile_gallery_effect">
                                <figure>
                                    <img src="web/images/feira3.jpg" alt=" " class="img-fluid" />
                                </figure>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4  agileits_w3layouts_gallery_grid1 hover14 my-sm-0 my-4">
                        <div class="w3_agile_gallery_effect">
                                <figure>
                                    <img src="web/images/contabilidade.jpg" alt=" " class="img-fluid" />
                                </figure>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4  agileits_w3layouts_gallery_grid1 hover14">
                        <div class="w3_agile_gallery_effect">
                                <figure>
                                    <img src="web/images/feira4.jpg" alt=" " class="img-fluid" />
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row agileits_w3layouts_gallery_grid my-4">
                    <div class="col-sm-4 agileits_w3layouts_gallery_grid1 hover14 mt-sm-0 mt-4">
                        <div class="w3_agile_gallery_effect">
                                <figure>
                                    <img src="web/images/transporte.jpg" alt=" " width="300" class="img-fluid" />
                                </figure>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4 agileits_w3layouts_gallery_grid1 hover14 mt-sm-0 mt-4">
                        <div class="w3_agile_gallery_effect">
                                <figure>
                                    <img src="web/images/feira.jpg" alt=" " class="img-fluid" />
                                </figure>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4 agileits_w3layouts_gallery_grid1 hover14 mt-sm-0 mt-4">
                        <div class="w3_agile_gallery_effect">
                                <figure>
                                <img src="web/images/inforgest.jpg" alt=" " width="300" class="img-fluid" />
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!--------Feira do IMEL Inicio-->

    <!-- Sobre o IMEL Inicio -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="web/images/bg5.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">Sobre o IMEL</h1>
                    <p class="mb-4">O Instituto Médio de Economia de Luanda é uma instituição pública de ensino técnico adstrita ao Ministério da Educação, e tendo por vocação a formação de tecnicos médios para o sector da economia e como base os serviços públicos e a empresa.</p>
                    <p class="mb-4">O IMEL foi fundado no ano lectivo de 1990, na sequência da extinção do antigo complexo estudantil Karl Max-Makarenko, da qual viria a resultar a criação de dois novos instituto médio: o IMEL(para o sector da economia) e o IMIL (para o sector da industria).</p>

                    <div class="form-group d-flex">
                        <a href="#"><button class="v">Ler Mais</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sobre o IMEL Fim-->
    
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

    <!-- javascrip -->
        <script src="<?php echo e(asset('web/js/jquery-2.2.3.min.js')); ?>"></script>
    <!-- //js -->

    <!-- carousel-->
	<script src="<?php echo e(asset('web/js/owl.carousel.js')); ?>"></script>
	<script>
		$(document).ready(function () {
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
	<script src="<?php echo e(asset('web/js/jquery.waypoints.min.js')); ?>"></script>
	<script src="<?php echo e(asset('web/js/jquery.countup.js')); ?>"></script>
		<script>
			$('.counter').countUp();
		</script>
    <!-- //estados -->

   
    <script src="<?php echo e(asset('web/js/move-top.js')); ?>"></script>
    <script src="<?php echo e(asset('web/js/easing.js')); ?>"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
   


    <script>
        $(document).ready(function () {
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
    <script src="<?php echo e(asset('web/js/SmoothScroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('web/js/bootstrap.js')); ?>"></script>
</body>
</html><?php /**PATH C:\Users\user\OneDrive\Ambiente de Trabalho\site_imel\resources\views/welcome.blade.php ENDPATH**/ ?>