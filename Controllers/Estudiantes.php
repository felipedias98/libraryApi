<?php
class Estudiantes extends Controller
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url);
        }
        parent::__construct();
        $id_user = $_SESSION['id_usuario'];
        $perm = $this->model->verificarPermisos($id_user, "Estudiantes");
        if (!$perm && $id_user != 1) {
            $this->views->getView($this, "permisos");
            exit;
        }
    }
    public function index()
    {
        $this->views->getView($this, "index");
    }
    public function listar()
    {
        $data = $this->model->getEstudiantes();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Ativo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarEst(' . $data[$i]['id'] . ');"><i class="fa fa-pencil-square-o"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarEst(' . $data[$i]['id'] . ');"><i class="fa fa-trash-o"></i></button>
                <div/>';
            } else {
                $data[$i]['estado'] = '<span class="badge badge-danger">Inativo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarEst(' . $data[$i]['id'] . ');"><i class="fa fa-reply-all"></i></button>
                <div/>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        $codigo = strClean($_POST['codigo']);
        $dni = strClean($_POST['dni']);
        $nombre = strClean($_POST['nombre']);
        $carrera = strClean($_POST['carrera']);
        $direccion = strClean($_POST['direccion']);
        $telefono = strClean($_POST['telefono']);
        $id = strClean($_POST['id']);
        if (empty($codigo) || empty($dni) || empty($nombre) || empty($carrera)) {
            $msg = array('msg' => 'Todo los campos son requeridos', 'icono' => 'warning');
        } else {
            if ($id == "") {
                    $data = $this->model->insertarEstudiante($codigo, $dni, $nombre, $carrera, $direccion, $telefono);
                    if ($data == "ok") {
                        $msg = array('msg' => 'Estudante cadastrado com sucesso!', 'icono' => 'success');
                    } else if ($data == "existe") {
                        $msg = array('msg' => 'Este estudante já existe!', 'icono' => 'warning');
                    } else {
                        $msg = array('msg' => 'Erro ao cadastrar o estudante!', 'icono' => 'error');
                    }
            } else {
                $data = $this->model->actualizarEstudiante($codigo, $dni, $nombre, $carrera, $direccion, $telefono, $id);
                if ($data == "modificado") {
                    $msg = array('msg' => 'Estudante alterado com sucesso!', 'icono' => 'success');
                } else {
                    $msg = array('msg' => 'Erro ao alterar o estudante!', 'icono' => 'error');
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar($id)
    {
        $data = $this->model->editEstudiante($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar($id)
    {
        $data = $this->model->estadoEstudiante(0, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Estudante dado baixa com sucesso!', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Erro ao dar baixa no estudante!', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function reingresar($id)
    {
        $data = $this->model->estadoEstudiante(1, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Estudante reingressado com sucesso!', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Erro ao reingressar estudante!', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function buscarEstudiante()
    {
        if (isset($_GET['est'])) {
            $valor = $_GET['est'];
            $data = $this->model->buscarEstudiante($valor);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
}
