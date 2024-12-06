<?php include "Views/Templates/header.php"; ?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Estudantes</h1>
    </div>
</div>
<button class="btn btn-primary mb-2" type="button" onclick="frmEstudiante()"><i class="fa fa-plus"></i></button>
<div class="row">
    <div class="col-lg-12">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-light mt-4" id="tblEst">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Número</th>
                                <th>Turma</th>
                                <th>Nome</th>
                                <th>Curso</th>
                                <th>Endereço</th>
                                <th>Telefone</th>
                                <th>Situação</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="nuevoEstudiante" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white" id="title">Cadastrar Estudante</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmEstudiante">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="codigo">Número</label>
                                <input type="hidden" id="id" name="id">
                                <input id="codigo" class="form-control" type="text" name="codigo" required placeholder="Número do estudante">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dni">Turma</label>
                                <input id="dni" class="form-control" type="text" name="dni" required placeholder="Turma do estudante">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nome</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" required placeholder="Nome completo">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="carrera">Curso</label>
                                <input id="carrera" class="form-control" type="text" name="carrera" required placeholder="Curso">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="telefono">Telefone</label>
                                <input id="telefono" class="form-control" type="text" name="telefono" required placeholder="Telefone">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="direccion">Endereço</label>
                                <input id="direccion" class="form-control" type="text" name="direccion" required placeholder="Endereço">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" onclick="registrarEstudiante(event)" id="btnAccion">Cadastrar</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Voltar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>