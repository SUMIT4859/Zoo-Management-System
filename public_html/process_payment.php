<?php
session_start();
require_once '../db/db_connect.php';
require_once '../classes/table.php';

if (isset($_POST['razorpay_payment_id'])) {
    $ticketTable = new Table('tickets');

    $data = [
        'visitor_id' => $_SESSION['visitor_id'],
        'book_name' => $_POST['book_name'],
        'regular_num' => $_POST['regular_num'],
        'student_num' => $_POST['student_num'],
        'child_num' => $_POST['child_num'],
        't_date' => $_POST['t_date'],
        'payment_id' => $_POST['razorpay_payment_id']
    ];

    $ticketTable->insertInDatabase($data);
    echo "Success";
}
?>
