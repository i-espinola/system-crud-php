<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- CSS -->
    <link type="text/css" href="./assets/css/core.min.css" rel="stylesheet">
    <link type="text/css" href="./assets/css/main.min.css" rel="stylesheet">
    <link type="text/css" href="./assets/css/skin_green.min.css" rel="stylesheet">

    <!-- PHP -->
    <?php include("assets/php/client_list.php"); ?>

    <title>Koper - Painel</title>
</head>

<body>

    <!-- MAIN -->
    <div class="main-content">

        <!-- NAV -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="assets/img/brand/logo.png">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-default">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="#">
                                    <img src="assets/img/brand/logo.png">
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="catalog.php"><span class="nav-link-inner--text">Catalogo</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="business.php"><span class="nav-link-inner--text">Comercial</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link nav-link-icon" href="#"><span class="nav-link-inner--text">Clientes</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="index.php"><i class="fas fa-home"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- NAV -->

        <!-- HEADER -->
        <div class="header pb-8 pt-5 pt-md-8">
            <div class="container align-items-center">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col-xl-10">
                            <div class="nav-wrapper invisible">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="client-tab" data-toggle="tab" href="#client" role="tab" aria-controls="client" aria-selected="true">clientes</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- HEADER -->

        <!-- CONTENT -->
        <div class="container mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="tab-content">

                            <!-- SECTION CLIENTS -->
                            <div class="tab-pane fade show active" id="client" role="tabpanel" aria-labelledby="client-tab">
                                <div class="card shadow">
                                    <div class="card-top">
                                        <div class="card-header border-0">
                                            <h3 class="mb-0">Lista de clientes</h3>
                                        </div>
                                        <button class="icon icon-shape text-white rounded-circle shadow" data-toggle="modal" data-target="#modal-client">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>CFP</th>
                                                    <th>Endereço</th>
                                                    <th>Data nascimento</th>
                                                    <th>Renda</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $client = listClients();
                                                if ($client->num_rows > 0) {
                                                    while ($c_row = $client->fetch_assoc()) { ?>
                                                        <tr>
                                                            <td><?php echo $c_row['name']; ?></td>
                                                            <td><?php echo $c_row['cpf']; ?></td>
                                                            <td><?php echo $c_row['address']; ?></td>
                                                            <td><?php echo $c_row['birth']; ?></td>
                                                            <td><?php echo $c_row['income']; ?></td>
                                                            <td class="table-actions">
                                                                <span class="d-none"><?php echo $c_row['id']; ?></span>
                                                                <a href="javascript:void(0)" onclick="modalEdit(this)" class="nav-link nav-link-icon btn-edit" data-toggle="tooltip" data-original-title="Editar"><i class="far fa-edit"></i></a>
                                                                <a href="javascript:void(0)" onclick="del(this)" class="nav-link nav-link-icon btn-del" data-toggle="tooltip" data-original-title="Apagar"><i class="fas fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- SECTION CLIENTS -->

                            <!-- MODALS -->
                            <div class="modal fade" id="modal-client" tabindex="-1" role="dialog" aria-labelledby="modal-client" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title">Cadastrar cliente</h1>
                                            <h1 class="modal-title d-none">Editar cliente</h1>
                                        </div>
                                        <div class="modal-body">
                                            <form autocomplete="off" class="form-client" method="POST">
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="nome-cliente" class="form-control-label">Nome</label>
                                                        <input class="form-control" type="text" id="nome-cliente" name="nome-cliente">
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="cpf" class="form-control-label">CPF</label>
                                                        <input class="form-control cpf" type="tel" maxlength="11" id="cpf" name="cpf">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="endereco" class="form-control-label">Endereço</label>
                                                        <input class="form-control" type="text" id="endereco" name="endereco">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="nascimento" class="form-control-label">Data de nascimento</label>
                                                        <div class="input-group">
                                                            <input class="form-control datepicker" type="text" id="nascimento" name="nascimento">
                                                        </div>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="renda" class="form-control-label">Renda</label>
                                                        <div class="input-group ">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input class="form-control money" type="tel" maxlength="8" id="renda" name="renda">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">,00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button onclick="clean(this);" type="button" class="btn btn-outline" data-dismiss="modal">Cancelar</button>
                                            <button onclick="add(event);" type="button" class="btn btn-primary add ml-auto">Cadastrar</button>
                                            <button onclick="edit(this, event);" type="button" class="btn btn-primary ml-auto d-none">Alterar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- MODALS -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- CONTENT -->
    </div>

    <!-- Core -->
    <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="./assets/vendor/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
    <script src="./assets/js/core.min.js"></script>

    <!-- JS -->

    <script src="./assets/js/main.min.js"></script>

</body>

</html>
