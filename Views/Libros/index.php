<?php include "Views/Templates/header.php"; ?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Livros</h1>
    </div>
</div>
<button class="btn btn-primary mb-2" onclick="frmLibros()"><i class="fa fa-plus"></i></button>
<div class="row">
    <div class="col-lg-12">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-light mt-4" id="tblLibros">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Título</th>
                                <th>Quant.</th>
                                <th>Autor</th>
                                <th>Editora</th>
                                <th>Matéria</th>
                                <th>Foto</th>
                                <th>Descrição</th>
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

<div id="nuevoLibro" class="modal fade" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="title">Cadastrar Livro</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmLibro" class="row" onsubmit="registrarLibro(event)">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="hidden" id="id" name="id">
                            <input id="titulo" class="form-control" type="text" name="titulo" placeholder="Título do livro" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="autor">Autor</label><br>
                            <select id="autor" class="form-control autor" name="autor" required style="width: 100%;">
                                
                            </select>
                        </div>
                      
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="editorial">Editora</label><br>
                            <select id="editorial" class="form-control editorial" name="editorial" required style="width: 100%;">
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="materia">Matéria</label><br>
                            <select id="materia" class="form-control materia" name="materia" required style="width: 100%;">
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cantidad">Quantidade</label>
                            <input id="cantidad" class="form-control" type="text" name="cantidad" placeholder="Quantidade" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="num_pagina">Quantidade de páginas</label>
                            <input id="num_pagina" class="form-control" type="number" name="num_pagina" placeholder="Quantidade de páginas" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="anio_edicion">Ano de edição</label>
                            <input id="anio_edicion" class="form-control" type="date" name="anio_edicion" value="<?php echo date("Y-m-d"); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="descripcion">Descrição</label>
                                <textarea id="descripcion" class="form-control" name="descripcion" rows="2" placeholder="Descrição"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Logo</label>
                            <div class="card border-primary">
                                <div class="card-body">
                                    <input type="hidden" id="foto_actual" name="foto_actual">
                                    <label for="imagen" id="icon-image" class="btn btn-primary"><i class="fa fa-cloud-upload"></i></label>
                                    <span id="icon-cerrar"></span>
                                    <input id="imagen" class="d-none" type="file" name="imagen" onchange="preview(event)">
                                    <img class="img-thumbnail" id="img-preview" src="" width="150">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" id="btnAccion">Cadastrar</button>
                            <button class="btn btn-danger" data-dismiss="modal" type="button">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>