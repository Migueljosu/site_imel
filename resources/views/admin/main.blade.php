<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin - Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>AdminPanel</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        @auth
                            <h6 class="mb-0">{{ Auth::user()->nome }}</h6>
                        @endauth
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('dashboard') }}" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-file-alt me-2"></i>Cursos</a>
                        <div class="dropdown-menu bg-transparent border-0" id="coursesDropdown">

                        </div>
                    </div>
                    <a href="{{ route('cadastro.index') }}" class="nav-item nav-link">
                        <i class="fa fa-keyboard me-2"></i>Cadastros
                    </a>

                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Relatórios</a>


                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt=""
                                style="width: 40px; height: 40px;">
                            @auth
                                <span class="d-none d-lg-inline-flex">{{ Auth::user()->nome }}</span>
                            @endauth </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ route('cadastro.index') }}" class="dropdown-item">Cadastros</a>
                            <!-- Formulário de Logout -->
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
          

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recursos</h6>
                        <label for="filter-curso" class="form-label">Filtrar por Curso:</label>
                        <select id="filter-curso" class="form-select">
                            <option value="">Todos os Cursos</option>
                            @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}">{{ $curso->nome_curso }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="table-responsive">
                        <table id="recursos-table"
                            class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Nome do Aluno</th>
                                    <th scope="col">Nome do Curso</th>
                                    <th scope="col">Número de Processo</th>
                                    <th scope="col">Classe</th>
                                    <th scope="col">Ano Letivo</th>
                                    <th scope="col">Quantidade de Recursos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Os dados serão carregados dinamicamente -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


           

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // URL da rota no Laravel
            const apiUrl = '/api/cursos';

            // Elemento onde os cursos serão inseridos
            const dropdownMenu = document.getElementById('coursesDropdown');

            // Faz a requisição para a API no Laravel
            fetch(apiUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro ao buscar os cursos.');
                    }
                    return response.json(); // Converte a resposta para JSON
                })
                .then(data => {
                    // Itera pelos cursos e cria os itens da lista
                    data.forEach(curso => {
                        const link = document.createElement('a');
                        link.href = `/curso/${curso.id}`; // Redireciona para a página do curso
                        link.className = 'dropdown-item';
                        link.textContent = curso.nome_curso; // Usa a propriedade nome_curso
                        dropdownMenu.appendChild(link);
                    });
                })
                .catch(error => {
                    console.error('Erro:', error);
                    dropdownMenu.innerHTML = '<p class="text-danger">Não foi possível carregar os cursos.</p>';
                });
        });
    </script>
    <script>
        async function fetchRecursos(cursoId = '') {
            const url = cursoId ? `{{ route('api.recursos') }}?curso_id=${cursoId}` : `{{ route('api.recursos') }}`;
            const response = await fetch(url);
            const recursos = await response.json();

            const tableBody = document.querySelector('#recursos-table tbody');
            tableBody.innerHTML = ''; // Limpa o conteúdo anterior

            if (recursos.length === 0) {
                // Exibe mensagem se não houver recursos
                const noDataRow = document.createElement('tr');
                noDataRow.innerHTML = `
                    <td colspan="7" class="text-center">Não há recursos neste curso.</td>
                `;
                tableBody.appendChild(noDataRow);
                return;
            }

            recursos.forEach(recurso => {
                const row = document.createElement('tr');

                row.innerHTML = `
                    <td>${recurso.nome}</td>
                    <td>${recurso.nome_curso}</td>
                    <td>${recurso.num_processo}</td>
                    <td>${recurso.classe}</td>
                    <td>${recurso.ano_lectivo}</td>
                    <td>${recurso.qtd_recursos}</td>
                `;

                tableBody.appendChild(row);
            });
        }

        // Atualiza a tabela quando o filtro de curso é alterado
        document.getElementById('filter-curso').addEventListener('change', (event) => {
            fetchRecursos(event.target.value);
        });

        // Carrega os dados inicialmente
        fetchRecursos();
    </script>
</body>

</html>
