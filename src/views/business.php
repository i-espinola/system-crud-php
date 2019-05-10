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
    <link type="text/css" href="./assets/css/skin_blue.min.css" rel="stylesheet">

    <!-- PHP -->
    <?php
    include("assets/php/reservation_list.php");
    include("assets/php/proposal_list.php");
    include("assets/php/sale_list.php");
    ?>

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
                        <li class="nav-item active">
                            <a class="nav-link nav-link-icon" href="#"><span class="nav-link-inner--text">Comercial</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="clients.php"><span class="nav-link-inner--text">Clientes</span></a>
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
                            <div class="nav-wrapper">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="reservation-tab" data-toggle="tab" href="#reservation" role="tab" aria-controls="reservation" aria-selected="true">Reservas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="proposal-tab" data-toggle="tab" href="#proposal" role="tab" aria-controls="proposal" aria-selected="false">Propostas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="sale-tab" data-toggle="tab" href="#sale" role="tab" aria-controls="sale" aria-selected="false">Vendas</a>
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

                            <!-- SECTION RESERVATIONS -->
                            <div class="tab-pane fade show active" id="reservation" role="tabpanel" aria-labelledby="reservation-tab">
                                <div class="card shadow">
                                    <div class="card-top">
                                        <div class="card-header border-0">
                                            <h3 class="mb-0">Lista de reservas</h3>
                                        </div>
                                        <button class="icon icon-shape text-white rounded-circle shadow" data-toggle="modal" data-target="#modal-reservation">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nome</th>
                                                    <th>Data</th>
                                                    <th>ID unidade</th>
                                                    <th>ID cliente</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $reservation = listReservations();
                                                if ($reservation->num_rows > 0) {
                                                    while ($r_row = $reservation->fetch_assoc()) { ?>
                                                        <tr>
                                                            <td><?php echo $r_row['id']; ?></td>
                                                            <td><?php echo $r_row['name']; ?></td>
                                                            <td><?php echo $r_row['date']; ?></td>
                                                            <td><?php echo $r_row['id_unit']; ?></td>
                                                            <td><?php echo $r_row['id_client']; ?></td>
                                                            <td class="table-actions">
                                                                <span class="d-none"><?php echo $r_row['id']; ?></span>
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
                            <!-- SECTION RESERVATIONS -->

                            <!-- SECTION PROPOSAL -->
                            <div class="tab-pane fade" id="proposal" role="tabpanel" aria-labelledby="proposal-tab">
                                <div class="card shadow">
                                    <div class="card-top">
                                        <div class="card-header border-0">
                                            <h3 class="mb-0">Lista de Propostas</h3>
                                        </div>
                                        <button class="icon icon-shape text-white rounded-circle shadow" data-toggle="modal" data-target="#modal-proposal">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nome</th>
                                                    <th>Data</th>
                                                    <th>Forma de pagamento</th>
                                                    <th>Código reserva</th>
                                                    <th>Código cliente</th>
                                                    <th>Código Unidade</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $proposal = listProposals();
                                                if ($proposal->num_rows > 0) {
                                                    while ($p_row = $proposal->fetch_assoc()) { ?>
                                                        <tr>
                                                            <td><?php echo $p_row['id']; ?></td>
                                                            <td><?php echo $p_row['name']; ?></td>
                                                            <td><?php echo $p_row['date']; ?></td>
                                                            <td><?php echo $p_row['payment']; ?></td>
                                                            <td><?php echo $p_row['id_reservation']; ?></td>
                                                            <td><?php echo $p_row['id_client']; ?></td>
                                                            <td><?php echo $p_row['id_unit']; ?></td>
                                                            <td class="table-actions">
                                                                <span class="d-none"><?php echo $p_row['id']; ?></span>
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
                            <!-- SECTION PROPOSAL -->

                            <!-- SECTION SALE -->
                            <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="sale-tab">
                                <div class="card shadow">
                                    <div class="card-top">
                                        <div class="card-header border-0">
                                            <h3 class="mb-0">Lista de Vendas</h3>
                                        </div>
                                        <button class="icon icon-shape text-white rounded-circle shadow" data-toggle="modal" data-target="#modal-sale">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nome</th>
                                                    <th>Data</th>
                                                    <th>Código cliente</th>
                                                    <th>Código unidade</th>
                                                    <th>Valor unidade</th>
                                                    <th>Valor total</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sales = listSales();
                                                if ($sales->num_rows > 0) {
                                                    while ($s_row = $sales->fetch_assoc()) { ?>
                                                        <tr>
                                                            <td><?php echo $s_row['id']; ?></td>
                                                            <td><?php echo $s_row['name']; ?></td>
                                                            <td><?php echo $s_row['date']; ?></td>
                                                            <td><?php echo $s_row['id_client']; ?></td>
                                                            <td><?php echo $s_row['id_unit']; ?></td>
                                                            <td><?php echo $s_row['unit_value']; ?></td>
                                                            <td><?php echo $s_row['full_value']; ?></td>
                                                            <td class="table-actions">
                                                                <span class="d-none"><?php echo $s_row['id']; ?></span>
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
                            <!-- SECTION SALE -->

                            <!-- MODALS -->

                            <!-- RESERVATION -->
                            <div class="modal fade" id="modal-reservation" tabindex="-1" role="dialog" aria-labelledby="modal-reservation" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title">Cadastrar reserva</h1>
                                            <h1 class="modal-title d-none">Editar reserva</h1>
                                        </div>
                                        <div class="modal-body">
                                            <form autocomplete="off" data-id="form-reservation" method="POST">
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="nome-reserva" class="form-control-label">Nome</label>
                                                        <input class="form-control" type="text" id="nome-reserva" name="nome-reserva">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="data-reserva" class="form-control-label">Data da reserva</label>
                                                        <div class="input-group">
                                                            <input class="form-control datepicker" type="text" id="data-reserva" name="data-reserva">
                                                        </div>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="id-unidade" class="form-control-label">Código unidade</label>
                                                        <div class="input-group">
                                                            <input class="form-control find-id" type="tel" id="id-unidade" name="id-unidade">
                                                        </div>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="id-cliente" class="form-control-label">Código cliente</label>
                                                        <div class="input-group">
                                                            <input class="form-control find-id" type="tel" id="id-cliente" name="id-cliente">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button onclick="clean(this);" type="button" class="btn btn-outline" data-dismiss="modal">Cancelar</button>
                                            <button onclick="add(event);" type="button" class="btn btn-primary add ml-auto" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing Order">Cadastrar</button>
                                            <button onclick="edit(this, event);" type="button" class="btn btn-primary ml-auto d-none">Alterar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- RESERVATION -->

                            <!-- PROPOSAL -->
                            <div class="modal fade" id="modal-proposal" tabindex="-1" role="dialog" aria-labelledby="modal-proposal" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title">Cadastrar proposta</h1>
                                            <h1 class="modal-title d-none">Editar proposta</h1>
                                        </div>
                                        <div class="modal-body">
                                            <form autocomplete="off" data-id="form-proposal">
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="nome-proposta" class="form-control-label">Nome</label>
                                                        <input class="form-control" type="text" id="nome-proposta" name="nome-proposta">
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="data-proposta" class="form-control-label">Data da proposta</label>
                                                        <div class="input-group">
                                                            <input class="form-control datepicker" type="text" id="data-proposta" name="data-proposta">
                                                        </div>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="pagamento" class="form-control-label">Forma de pagamento</label>
                                                        <select class="form-control" type="text" id="pagamento" name="pagamento">
                                                            <option selected>Avista</option>
                                                            <option>Financiamento</option>
                                                            <option>Crédito</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="id-reserva" class="form-control-label">Código reserva</label>
                                                        <div class="input-group">
                                                            <input class="form-control find-id" type="tel" id="id-reserva" name="id-reserva">
                                                        </div>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="id-cliente" class="form-control-label">Código cliente</label>
                                                        <div class="input-group">
                                                            <input class="form-control find-id" type="tel" id="id-cliente" name="id-cliente">
                                                        </div>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="id-unidade" class="form-control-label">Código unidade</label>
                                                        <div class="input-group">
                                                            <input class="form-control find-id" type="tel" id="id-unidade" name="id-unidade">
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
                            <!-- PROPOSAL -->

                            <!-- SALE -->
                            <div class="modal fade" id="modal-sale" tabindex="-1" role="dialog" aria-labelledby="modal-sale" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title">Cadastrar venda</h1>
                                            <h1 class="modal-title d-none">Editar venda</h1>
                                        </div>
                                        <div class="modal-body">
                                            <form autocomplete="off" data-id="form-sale">
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="nome-venda" class="form-control-label">Nome</label>
                                                        <input class="form-control" type="text" id="nome-venda" name="nome-venda">
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="data-venda" class="form-control-label">Data da venda</label>
                                                        <div class="input-group">
                                                            <input class="form-control datepicker" type="text" id="data-venda" name="data-venda">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="id-cliente" class="form-control-label">Código cliente</label>
                                                        <div class="input-group">
                                                            <input class="form-control find-id" type="tel" id="id-cliente" name="id-cliente">
                                                        </div>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="id-unidade" class="form-control-label">Código unidade</label>
                                                        <div class="input-group">
                                                            <input class="form-control find-id" type="tel" id="id-unidade" name="id-unidade">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="valor-unidade" class="form-control-label">Valor unidade</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input class="form-control money" type="tel" id="valor-unidade" name="valor-unidade">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">,00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="valor-total" class="form-control-label">Valor total</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input class="form-control money" type="tel" id="valor-total" name="valor-total">
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
                            <!-- SALE -->

                            <!-- SUCCESSS -->
                            <div class="modal fade" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="modal-success" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered w-min" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title">Tudo certo! :)</h1>
                                        </div>
                                        <div class="modal-body">
                                            <h3>Tudo funcionou perfeitamente nesta operação.</h3>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary add ml-auto" data-dismiss="modal">Ok</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- SUCCESSS -->

                            <!-- FAIL -->
                            <div class="modal fade" id="modal-fail" tabindex="-1" role="dialog" aria-labelledby="modal-fail" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered w-min" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title">OPS! :/</h1>
                                        </div>
                                        <div class="modal-body">
                                            <h3>Algo não funcionou como planejamos. Por favor, tente realizar este operação novamente.</h3>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary add ml-auto" data-dismiss="modal">Entendi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FAIL -->

                            <!-- MODALS -->
                        </div>
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
