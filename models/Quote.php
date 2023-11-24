<?php
function insertQuote($db)
{
    // On insère le nouveau devis dans la base de données apres vérifications
    $stmt = $db->prepare('INSERT INTO quote (lastname, firstname, mail_address, email_address, phone_number, surface, society, work_type, work_description, submission_date)
    VALUES
    (:lastname, :firstname, :mail_address, :email_address, :phone_number, :surface, :society, :work_type, :work_description, :submission_date)');
    $stmt->bindParam(':lastname', $_POST['lastname'], PDO::PARAM_STR);
    $stmt->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR);
    $stmt->bindParam(':mail_address', $_POST['mail_address'], PDO::PARAM_STR);
    $stmt->bindParam(':email_address', $_POST['email_address'], PDO::PARAM_STR);
    $stmt->bindParam(':phone_number', $_POST['phone_number'], PDO::PARAM_STR);
    $stmt->bindParam(':surface', $_POST['surface'], PDO::PARAM_STR);
    $stmt->bindParam(':society', $_POST['society'], PDO::PARAM_STR);
    $stmt->bindParam(':work_type', $_POST['work_type'], PDO::PARAM_STR);
    $stmt->bindParam(':work_description', $_POST['work_description'], PDO::PARAM_STR);
    $currentDate = date("Y-m-d H:i:s");
    $stmt->bindParam(':submission_date', $currentDate, PDO::PARAM_STR);

    $addQuote = $stmt->execute();
    return $addQuote;

}