<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin - Cadastros</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- SweetAlert2 CDN -->
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
                <a href="{{ route('dashboard') }}" class="navbar-brand mx-4 mb-3">
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
                    <a href="{{ route('dashboard') }}" class="nav-item nav-link"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-file-alt me-2"></i>Cursos</a>
                        <div class="dropdown-menu bg-transparent border-0" id="coursesDropdown">

                        </div>
                    </div>
                    <a href="{{ route('cadastro.index') }}" class="nav-item nav-link active"><i
                            class="fa fa-keyboard me-2"></i>Cadastros</a>

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
                            @endauth

                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ route('cadastro.index') }}" class="dropdown-item">Cadastros</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">

                <div class="row g-4">

                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Tabela de Alunos do Curso de{{ $curso->nome_curso }}</h6>
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Nº</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Sobrenome</th>
                                        <th scope="col">Nº Processo</th>
                                        <th scope="col">Classe</th>
                                    </tr>
                                </thead>
                                @if ($alunos->isEmpty())
                                    <p>Nenhum aluno está inscrito neste curso.</p>
                                @else
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nº</th>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Sobrenome</th>
                                                <th scope="col">Nº Processo</th>
                                                <th scope="col">Classe</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($alunos as $index => $aluno)
                                                <tr>
                                                    <th scope="row">{{ $index + 1 }}</th>
                                                    <td>{{ $aluno->nome }}</td>
                                                    <td>{{ $aluno->sobrenome }}</td>
                                                    <td>{{ $aluno->num_processo }}</td>
                                                    <td>{{ $aluno->classe ?? 'Não especificado' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </table>
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Importar Recursos</h6>
                            <form id="importForm" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Escolha o arquivo XLSX para
                                        importar</label>
                                    <input class="form-control bg-dark" type="file" name="file" id="formFile"
                                        accept=".xlsx" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Importar Recursos</button>
                            </form>
                            <div id="responseMessage" class="mt-3"></div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Form End -->



            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">School Admin Panel</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="#">Miguel Luis</a>
                            <br>
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
    <script src="{{ asset('lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
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
        document.getElementById('cursoForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Impede o envio normal do formulário

            // Coletar dados do formulário
            const nomeCurso = document.getElementById('nome_curso').value;

            // Obter o token CSRF para proteger a requisição
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Realizar a requisição Fetch
            fetch('/api/cursos-store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        nome_curso: nomeCurso
                    })
                })
                .then(response => response.json()) // Espera que a resposta seja em JSON
                .then(data => {
                    if (data.success) {
                        // Exibe mensagem de sucesso usando SweetAlert2
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Curso cadastrado com sucesso!',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        document.getElementById('cursoForm').reset(); // Limpa o formulário
                    } else {
                        // Exibe mensagem de erro usando SweetAlert2
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro ao cadastrar o curso!',
                            text: data.message || 'Tente novamente mais tarde.',
                        });
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Ocorreu um erro!',
                        text: 'Tente novamente mais tarde.',
                    });
                });
        });
    </script>

    <script>
        document.getElementById('disciplinaForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const nomeDisciplina = document.getElementById('nome_disciplina').value.trim();
            const idCurso = document.getElementById('id_curso').value.trim();
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            if (!nomeDisciplina || !idCurso) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Campos obrigatórios!',
                    text: 'Por favor, preencha todos os campos.',
                });
                return;
            }

            fetch('/cadastrar-disciplina', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        nome_disciplina: nomeDisciplina,
                        id_curso: idCurso,
                    }),
                })
                .then(response => {
                    if (!response.ok) {
                        if (response.status === 422) {
                            return response.json().then(data => {
                                const validationErrors = Object.values(data.errors).flat().join('<br>');
                                throw new Error(validationErrors);
                            });
                        }
                        throw new Error('Erro no servidor. Tente novamente mais tarde.');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        document.getElementById('disciplinaForm').reset();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro ao cadastrar disciplina!',
                            text: data.message,
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro ao cadastrar disciplina',
                        html: error.message || 'Tente novamente mais tarde.',
                    });
                });
        });
    </script>


    <script>
        document.getElementById('userForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Impede o envio normal do formulário

            const formData = new FormData(this); // Captura os dados do formulário

            fetch('/api/user', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json', // Certifica que a resposta será JSON
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: formData
                })
                .then(async (response) => {
                    if (!response.ok) {
                        const errorText = await response.text();
                        throw new Error(errorText || 'Erro desconhecido no servidor.');
                    }
                    return response.json();
                })
                .then((data) => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuário cadastrado com sucesso!',
                            timer: 1500
                        });
                        document.getElementById('userForm').reset();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro ao cadastrar!',
                            text: data.message || 'Tente novamente mais tarde.'
                        });
                    }
                })
                .catch((error) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: error.message || 'Erro ao conectar com o servidor.'
                    });
                });
        });
    </script>

    <script>
        document.getElementById('comunicadoForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch('/api/comunicados', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                    },
                    body: formData,
                })
                .then(async (response) => {
                    if (!response.ok) {
                        const errorText = await response.text();
                        throw new Error(errorText || 'Erro desconhecido no servidor.');
                    }
                    return response.json();
                })
                .then((data) => {
                    if (data.success) {
                        alert('Comunicado cadastrado com sucesso!');
                        document.getElementById('comunicadoForm').reset();
                    } else {
                        alert('Erro ao cadastrar comunicado: ' + data.message);
                    }
                })
                .catch((error) => {
                    console.error('Erro:', error);
                    alert('Erro ao conectar com o servidor.');
                });
        });
    </script>

    <script>
        document.getElementById('importForm').addEventListener('submit', async function(event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);
            const responseMessage = document.getElementById('responseMessage');
            responseMessage.innerHTML = '<span class="text-info">Carregando...</span>';

            try {
                const response = await fetch('/api/importar-recursos', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                });

                if (response.ok) {
                    const result = await response.json();
                    responseMessage.innerHTML = `<span class="text-success">${result.message}</span>`;
                } else if (response.status === 422) {
                    const result = await response.json();
                    const errors = result.errors.join('<br>');
                    responseMessage.innerHTML =
                        `<span class="text-warning">Erros encontrados:<br>${errors}</span>`;
                } else {
                    const errorText = await response.text();
                    responseMessage.innerHTML = `<span class="text-danger">Erro: ${errorText}</span>`;
                }
            } catch (error) {
                responseMessage.innerHTML = '<span class="text-danger">Erro ao processar a solicitação.</span>';
                console.error('Erro:', error);
            }
        });
    </script>
</body>

</html>
