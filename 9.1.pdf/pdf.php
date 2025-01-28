<?php
    // Incluir los archivos necesarios
    require_once('ranking.php');
    require_once('fpdf.php');

    // Crear una nueva instancia de la clase FPDF
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->addPage();

    // Título del documento
    $pdf->setFont('Arial', 'B', 16);
    $pdf->Cell(200, 10, 'Ranking', 0, 1, 'C');

    // Configurar la fuente para el contenido de la tabla
    $pdf->setFont('Arial', '', 12);
    $pdf->Ln(10); // Salto de línea

    // Encabezado de la tabla
    $pdf->Cell(30, 10, 'Posicion', 1, 0, 'C');
    $pdf->Cell(80, 10, 'Nombre', 1, 0, 'C');
    $pdf->Cell(80, 10, 'Puntuacion', 1, 1, 'C');

    // Inicializar la variable de posición
    $posicion = 1;

    // Verificar si hay datos disponibles para mostrar
    if ($datos) {
        foreach ($datos as $valor) {
            // Mostrar cada fila con los datos de la posición, nombre y puntuación
            $pdf->Cell(30, 10, $posicion, 1, 0, 'C');
            $pdf->Cell(80, 10, $valor['nombreRegistro'], 1, 0, 'C');
            $pdf->Cell(80, 10, $valor['barraPuntuacion'], 1, 1, 'C');
            
            // Incrementar la posición para la siguiente fila
            $posicion++;
        }
    } else {
        // Si no hay datos, mostrar un mensaje
        $pdf->Cell(190, 10, 'No hay puntuacion', 1, 1, 'C');
    }

    // Generar y mostrar el PDF
    $pdf->Output();
?>
