<?php
require_once '../../modelo/recital.php'; 
$Id = $_GET['id'] ?? null;
$Recital = $Id ? recital::obtenerPorId($Id) : null;
$Titulo = $Recital ? 'Editar Recital' : 'Agregar Recital';
$Accion = $Recital ? 'editar' : 'agregar';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Titulo; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1><?php echo $Titulo; ?></h1>

                <form method="POST" action="../acciones.php">
                    <input type="hidden" name="accion" value="<?php echo $Accion; ?>">
                    <?php if ($Recital): ?>
                    <input type="hidden" name="id" value="<?php echo $Recital->Id; ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $Recital ? $Recital->Nombre : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lugar</label>
                        <input type="text" class="form-control" name="lugar" value="<?php echo $Recital ? $Recital->Lugar : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="text" class="form-control" name="fecha" value="<?php echo $Recital ? $Recital->Fecha : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hora</label>
                        <input type="text" class="form-control" name="hora" value="<?php echo $Recital ? $Recital->Hora : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Capacidad</label>
                        <input type="text" class="form-control" name="capacidad" value="<?php echo $Recital ? $Recital->Capacidad : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">PrecioEntrada</label>
                        <input type="text" class="form-control" name="precioEntrada" value="<?php echo $Recital ? $Recital->PrecioEntrada : ''; ?>" required>
                    </div>

                    <div class="d-grid gap-2 d-sm-flex">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="listar.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
