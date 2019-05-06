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
    <link type="text/css" href="./assets/css/skin_purple.min.css" rel="stylesheet">

    <!-- PHP -->
    <?php
    include("assets/php/enterprise_list.php");
    include("assets/php/block_list.php");
    include("assets/php/storey_list.php");
    include("assets/php/unit_list.php");
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
                        <li class="nav-item active">
                            <a class="nav-link nav-link-icon" href="#"><span class="nav-link-inner--text">Catalogo</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="business.php"><span class="nav-link-inner--text">Comercial</span></a>
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
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="enterprise-tab" data-toggle="tab" href="#enterprise" role="tab" aria-controls="enterprise" aria-selected="true">Empreendimentos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="block-tab" data-toggle="tab" href="#block" role="tab" aria-controls="block" aria-selected="false">Blocos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="storey-tab" data-toggle="tab" href="#storey" role="tab" aria-controls="storey" aria-selected="false">Andares</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="unit-tab" data-toggle="tab" href="#unit" role="tab" aria-controls="unit" aria-selected="false">Unidades</a>
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

                            <!-- SECTION ENTERPRISES -->
                            <div class="tab-pane fade show active" id="enterprise" role="tabpanel" aria-labelledby="enterprise-tab">
                                <div class="card shadow">
                                    <div class="card-top">
                                        <div class="card-header border-0">
                                            <h3 class="mb-0">Lista de empreendimentos</h3>
                                        </div>
                                        <button class="icon icon-shape text-white rounded-circle shadow" data-toggle="modal" data-target="#modal-enterprise">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nome</th>
                                                    <th>Tipo</th>
                                                    <th>Endereço</th>
                                                    <th>Área</th>
                                                    <th>Inicio</th>
                                                    <th>Conclusão</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $enterprise = listEnterprises();
                                                if ($enterprise->num_rows > 0) {
                                                    while ($e_row = $enterprise->fetch_assoc()) { ?>
                                                        <tr>
                                                            <td><?php echo $e_row['id']; ?></td>
                                                            <td><?php echo $e_row['name']; ?></td>
                                                            <td><?php echo $e_row['type']; ?></td>
                                                            <td><?php echo $e_row['address']; ?></td>
                                                            <td><?php echo $e_row['area']; ?> m²</td>
                                                            <td><?php echo $e_row['start']; ?></td>
                                                            <td><?php echo $e_row['end']; ?></td>
                                                            <td class="table-actions">
                                                                <span class="d-none"><?php echo $e_row['id']; ?></span>
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
                            <!-- SECTION ENTERPRISES -->

                            <!-- SECTION BLOCK -->
                            <div class="tab-pane fade" id="block" role="tabpanel" aria-labelledby="block-tab">
                                <div class="card shadow">
                                    <div class="card-top">
                                        <div class="card-header border-0">
                                            <h3 class="mb-0">Lista de Blocos</h3>
                                        </div>
                                        <button class="icon icon-shape text-white rounded-circle shadow" data-toggle="modal" data-target="#modal-block">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nome</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $block = listBlocks();
                                                if ($block->num_rows > 0) {
                                                    while ($b_row = $block->fetch_assoc()) { ?>
                                                        <tr>
                                                            <td><?php echo $b_row['id']; ?></td>
                                                            <td><?php echo $b_row['name']; ?></td>
                                                            <td class="table-actions">
                                                                <span class="d-none"><?php echo $b_row['id']; ?></span>
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
                            <!-- SECTION BLOCK -->

                            <!-- SECTION STOREY -->
                            <div class="tab-pane fade" id="storey" role="tabpanel" aria-labelledby="storey-tab">
                                <div class="card shadow">
                                    <div class="card-top">
                                        <div class="card-header border-0">
                                            <h3 class="mb-0">Lista de Andares</h3>
                                        </div>
                                        <button class="icon icon-shape text-white rounded-circle shadow" data-toggle="modal" data-target="#modal-storey">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nome</th>
                                                    <th>Posição</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $s_storey = listStoreys();
                                                if ($s_storey->num_rows > 0) {
                                                    while ($s_row = $s_storey->fetch_assoc()) { ?>
                                                        <tr>
                                                            <td><?php echo $s_row['id']; ?></td>
                                                            <td><?php echo $s_row['name']; ?></td>
                                                            <td><?php echo $s_row['position']; ?></td>
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
                            <!-- SECTION STOREY -->

                            <!-- SECTION UNIT -->
                            <div class="tab-pane fade" id="unit" role="tabpanel" aria-labelledby="unit-tab">
                                <div class="card shadow">
                                    <div class="card-top">
                                        <div class="card-header border-0">
                                            <h3 class="mb-0">Lista de Unidade</h3>
                                        </div>
                                        <button class="icon icon-shape text-white rounded-circle shadow" data-toggle="modal" data-target="#modal-unit">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nome</th>
                                                    <th>Status</th>
                                                    <th>Vendável</th>
                                                    <th>Área privativa</th>
                                                    <th>Área Comum</th>
                                                    <th>Valor</th>
                                                    <th>Valor mínimo</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $unit = listUnits();
                                                if ($unit->num_rows > 0) {
                                                    while ($u_row = $unit->fetch_assoc()) { ?>
                                                        <tr>
                                                            <td><?php echo $u_row['id']; ?></td>
                                                            <td><?php echo $u_row['name']; ?></td>
                                                            <td><?php echo $u_row['status']; ?></td>
                                                            <td><?php echo $u_row['vendible']; ?></td>
                                                            <td><?php echo $u_row['private_area']; ?></td>
                                                            <td><?php echo $u_row['commom_area']; ?></td>
                                                            <td><?php echo $u_row['value']; ?></td>
                                                            <td><?php echo $u_row['min_value']; ?></td>
                                                            <td class="table-actions">
                                                                <span class="d-none"><?php echo $u_row['id']; ?></span>
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
                            <!-- SECTION UNIT -->

                            <!-- MODALS -->

                            <!-- ENTERPRISE -->
                            <div class="modal fade" id="modal-enterprise" tabindex="-1" role="dialog" aria-labelledby="modal-enterprise" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title">Cadastrar empreendimento</h1>
                                            <h1 class="modal-title d-none">Editar empreendimento</h1>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row align-items-center">
                                                <div class="col-10">
                                                    <div class="nav-wrapper align-items-center">
                                                        <span>É possível adicionar <b>blocos</b> e <b>unidades</b> neste empreendimento</span>
                                                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" role="tablist">
                                                            <li class="nav-item">
                                                                <a onclick="subNavigator(this)" class="nav-link mb-sm-3 mb-md-0 active" data-option="enterprise" data-toggle="tab" href="#" role="tab" aria-selected="true">Empreendimento</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a onclick="subNavigator(this)" class="nav-link mb-sm-3 mb-md-0" data-option="block" data-toggle="tab" href="#" role="tab">Bloco</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a onclick="subNavigator(this)" class="nav-link mb-sm-3 mb-md-0" data-option="unit" data-toggle="tab" href="#" role="tab">Unidade</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <form autocomplete="off" id="form-enterprise" method="POST">
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="nome-empreendimento" class="form-control-label">Nome</label>
                                                        <input class="form-control" type="text" id="nome-empreendimento" name="nome-empreendimento">
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="tipo" class="form-control-label">Tipo</label>
                                                        <select class="form-control" type="text" id="tipo" name="tipo">
                                                            <option selected>Residencial</option>
                                                            <option>Comercial</option>
                                                            <option>Loteamento</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="endereco" class="form-control-label">Endereço</label>
                                                        <input class="form-control" type="text" id="endereco" name="endereco">
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="area-total" class="form-control-label">Área Total</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="tel" maxlength="4" id="area-total" name="area-total">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">m²</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row input-daterange datepicker">
                                                    <div class="col form-group">
                                                        <label for="inicio" class="form-control-label">Data de início</label>
                                                        <div class="input-group">
                                                            <input class="form-control" placeholder="Inicio" type="text" id="inicio" name="inicio">
                                                        </div>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="conclusao" class="form-control-label">Data de conclusão</label>
                                                        <div class="input-group">
                                                            <input class="form-control" placeholder="Conclusão" type="text" id="conclusao" name="conclusao">
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
                            <!-- ENTERPRISE -->

                            <!-- BLOCKS -->
                            <div class="modal fade" id="modal-block" tabindex="-1" role="dialog" aria-labelledby="modal-block" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title">Cadastrar bloco</h1>
                                            <h1 class="modal-title d-none">Editar bloco</h1>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row align-items-center">
                                                <div class="col-10">
                                                    <div class="nav-wrapper align-items-center">
                                                        <span>É possível adicionar <b>Andares</b> e <b>Unidades</b> neste bloco</span>
                                                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" role="tablist">
                                                            <li class="nav-item">
                                                                <a onclick="subNavigator(this)" class="nav-link mb-sm-3 mb-md-0 active" data-option="block" data-toggle="tab" href="#" role="tab" aria-selected="true">Bloco</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a onclick="subNavigator(this)" class="nav-link mb-sm-3 mb-md-0" data-option="storey" data-toggle="tab" href="#" role="tab">Andares</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a onclick="subNavigator(this)" class="nav-link mb-sm-3 mb-md-0" data-option="unit" data-toggle="tab" href="#" role="tab">Unidade</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <form autocomplete="off" id="form-block">
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="nome-bloco" class="form-control-label">Nome</label>
                                                        <input class="form-control" type="text" id="nome-bloco" name="nome-bloco">
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
                            <!-- BLOCKS -->

                            <!-- STOREY -->
                            <div class="modal fade" id="modal-storey" tabindex="-1" role="dialog" aria-labelledby="modal-storey" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title">Cadastrar andar</h1>
                                            <h1 class="modal-title d-none">Editar andar</h1>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row align-items-center">
                                                <div class="col-10">
                                                    <div class="nav-wrapper align-items-center">
                                                        <span>É possível adicionar <b>Unidades</b> neste Andar</span>
                                                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" role="tablist">
                                                            <li class="nav-item">
                                                                <a onclick="subNavigator(this)" class="nav-link mb-sm-3 mb-md-0 active" data-option="storey" data-toggle="tab" href="#" role="tab" aria-selected="true">Andares</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a onclick="subNavigator(this)" class="nav-link mb-sm-3 mb-md-0" data-option="unit" data-toggle="tab" href="#" role="tab">Unidade</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <form autocomplete="off" id="form-storey">
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="nome-andar" class="form-control-label">Nome</label>
                                                        <input class="form-control" type="text" id="nome-andar" name="nome-andar">
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="posicao" class="form-control-label">Posição</label>
                                                        <select class="form-control" type="text" id="posicao" name="posicao">
                                                            <option selected>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
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
                            <!-- STOREY -->

                            <!-- UNITS -->
                            <div class="modal fade" id="modal-unit" tabindex="-1" role="dialog" aria-labelledby="modal-unit" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title">Cadastrar unidade</h1>
                                            <h1 class="modal-title d-none">Editar unidade</h1>
                                        </div>
                                        <div class="modal-body">
                                            <form autocomplete="off" id="form-unit">
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="nome-unidade" class="form-control-label">Nome</label>
                                                        <input class="form-control" type="text" id="nome-unidade" name="nome-unidade">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="status" class="form-control-label">Status</label>
                                                        <select class="form-control" type="text" id="status" name="status">
                                                            <option selected>Disponível</option>
                                                            <option>Indispinível</option>
                                                            <option>Reservada</option>
                                                            <option>Vendida</option>
                                                        </select>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="vendavel" class="form-control-label">Vendável</label>
                                                        <select class="form-control" type="text" id="vendavel" name="vendavel">
                                                            <option>Difícil</option>
                                                            <option>Fácil</option>
                                                            <option selected>Normal</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="area-privativa" class="form-control-label">Área privativa</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="tel" maxlength="4" id="area-privativa" name="area-privativa">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">m²</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="area-comum" class="form-control-label">Área comum</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="tel" maxlength="4" id="area-comum" name="area-comum">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">m²</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="valor" class="form-control-label">Valor</label>
                                                        <div class="input-group ">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input class="form-control money" type="tel" maxlength="8" id="valor" name="valor">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">,00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="valor-minimo" class="form-control-label">Valor</label>
                                                        <div class="input-group ">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input class="form-control money" type="tel" maxlength="8" id="valor-minimo" name="valor-minimo">
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
                            <!-- UNITS -->

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
