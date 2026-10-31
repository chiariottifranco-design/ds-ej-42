<?php require_once '../../modelo/recital.php'; 
$Id = $_GET['id'] ?? null;
$recital = $Id ? Recital::obtenerPorId($Id) : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Recital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Detalle de Recital</h1>

                <?php if ($recital): ?>
                <div class="card">
                    <div class="card-body">
                        <p><strong>ID:</strong> <?php echo $recital->Id; ?></p>
                        <p><strong>Nombre:</strong> <?php echo $recital->Nombre; ?></p>
                        <p><strong>Lugar:</strong> <?php echo $recital->Lugar; ?></p>
                        <p><strong>Fecha:</strong> <?php echo $recital->Fecha; ?></p>
                        <p><strong>Hora:</strong> <?php echo $recital->Hora; ?></p>
                        <p><strong>Capacidad:</strong> <?php echo $recital->Capacidad; ?></p>
                        <p><strong>PrecioEntrada:</strong> <?php echo $recital->PrecioEntrada; ?></p>
                    </div>
                </div>

                <div class="mt-3">
                    <a href="listar.php" class="btn btn-secondary">Volver</a>
                    <a href="editar.php?id=<?php echo $recital->Id; ?>" class="btn btn-warning">Editar</a>
                </div>
                <?php else: ?>
                <div class="alert alert-danger">Recital no encontrado</div>
                <a href="listar.php" class="btn btn-secondary">Volver</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
