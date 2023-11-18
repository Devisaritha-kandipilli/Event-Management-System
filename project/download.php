<?php
require_once('tcpdf/tcpdf.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve payment details from the form
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $bookingID = $_POST['bookingID'];
    $contact = $_POST['contact'];
    $payment_status = $_POST['payment_status'];
    $added_on = $_POST['added_on'];
    $payment_id = $_POST['payment_id'];

    // Create a new TCPDF instance
    $pdf = new TCPDF();
    $pdf->SetAutoPageBreak(true, 10);

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', 'B', 12);

    $pdf->Cell(0, 10, 'Payment Details', 0, 1, 'C');
    $pdf->Ln(); // Add a line break

    $pdf->SetFont('helvetica', '', 12);
    $data = array(
        array('Name', $name),
        array('Amount', $amount),
        array('Booking ID', $bookingID),
        array('Contact', $contact),
        array('Payment Status', $payment_status),
        array('Added On', $added_on),
        array('Payment ID', $payment_id),
    );

    $colWidth = 60;
    foreach ($data as $row) {
        $pdf->Cell($colWidth, 10, $row[0], 1);
        $pdf->Cell($colWidth, 10, $row[1], 1);
        $pdf->Ln(); // Move to the next row
    }

    // Set the Content-Disposition header to force a download with a specific filename
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename=payment_details.pdf');

    // Output the PDF to the browser
    $pdf->Output('payment_details.pdf', 'D');
    exit;
} else {
    // If the form is not submitted via POST, redirect to the homepage or display an error message
    header('Location: index.php'); // Replace 'index.php' with the actual homepage URL
    exit;
}
?>
