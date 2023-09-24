<?php
require('fpdf186/fpdf.php'); // Asegúrate de descargar e incluir la librería FPDF en tu servidor

// Datos del formulario
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : "";
$empresa = isset($_GET['empresa']) ? $_GET['empresa'] : "";
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : "";
$cvEnlace = isset($_GET['cv']) ? $_GET['cv'] : "";
$linkedin = isset($_GET['linkedin']) ? $_GET['linkedin'] : "";
$imagenPerfil = isset($_GET['foto_perfil']) ? $_GET['foto_perfil'] : "";

// Crea un objeto PDF
$pdf = new FPDF();
$pdf->AddPage();

// Configura la fuente a Helvetica con codificación UTF-8
$pdf->AddFont('Helvetica', '', 'helvetica.php');
$pdf->SetFont('Helvetica', 'B', 16);

// Agregar la imagen de perfil
if (!empty($imagenPerfil)) {
    $pdf->Image($imagenPerfil, 160, 25, 30, 40); // Parámetros: ruta, coordenada X, coordenada Y, ancho
}

// Encabezado de la carta
$pdf->SetFillColor(255,166, 0); 
$pdf->Cell(0, 10, 'Carta de Presentación', 0, 1, 'C',true);
$pdf->Ln(10);

$pdf->SetFont('Helvetica', '', 12);
// Destinatario
$pdf->Cell(0, 10, 'Fecha: ' . $fecha, 0, 1, 'L');
$pdf->Cell(0, 10, 'Empresa: ' . $empresa, 0, 1, 'L');
$pdf->Ln(10);

// Saludo inicial
$pdf->MultiCell(0, 10, "Estimado/a empresario/a,", 0, 'L');
$pdf->Ln(10);

// Introducción
$pdf->MultiCell(0, 10, "Me entusiasmó enterarme del cargo de Programador Fullstack en Grupo Corporativo Caliche ofertado en el sitio web de su empresa, y agradecería enormemente que valoraran mi candidatura. Habiendo revisado los requisitos del cargo, los cuales están estrechamente relacionados con mis cualificaciones, creo que podré contribuir de manera notable a los objetivos de su organización.", 0, 'L');
$pdf->Ln(5);

// Cuerpo de la carta
$texto = "Durante mi formación académica, tuve la oportunidad de desarrollar mis habilidades de programación en varios lenguajes y tecnologías, incluyendo HTML, CSS, JavaScript, Python y más. Soy capaz de gestionar cargas de trabajo y priorizar tareas para cumplir los plazos con diligencia y atención.";
$pdf->MultiCell(0, 10, $texto, 0, 'L');
$pdf->Ln(5);

// Cierre
$pdf->MultiCell(0, 10, "Agradezco sinceramente su consideración de mi solicitud y espero tener la oportunidad de discutir cómo puedo contribuir al crecimiento y éxito de la empresa. ", 0, 'L');
$pdf->Ln(5);

// Despedida
$pdf->MultiCell(0, 10, "Atentamente,", 0, 'L');
$pdf->MultiCell(0, 10, $nombre, 0, 'L');
$pdf->Ln(10);

// Enlace al CV adjunto
if (!empty($cvEnlace)) {
    $pdf->SetTextColor(0, 0, 255); // Establecer el color del texto en azul
    $pdf->SetFont('Times', 'U', 12); // Configurar el estilo de texto subrayado
    $pdf->Cell(0, 10, "CV", 0, 1, 'L', false, $cvEnlace, '_blank');
}

// Enlace LinkedIn
if (!empty($linkedin)) {
    $pdf->SetTextColor(0, 0, 255); // Establecer el color del texto en azul
    $pdf->SetFont('Times', 'U', 12); // Configurar el estilo de texto subrayado
    $pdf->Cell(0, 10, "LinkedIn", 0, 1, 'L', false, $linkedin, '_blank');
}

// Salida de PDF
$pdf->Output();
?>
//ancho celda , altura celda, contenido, borde , siguiente celda, posición, relleno false, enlace URL