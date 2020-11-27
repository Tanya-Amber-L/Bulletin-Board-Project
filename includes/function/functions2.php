<?php

function getAnnounce($id) {
    require('includes/connect.php');
    $query = $conn->prepare('SELECT * FROM announce WHERE ann_id = ?');
    $query->execute($query);
    return $query;
}

function getAnn($id) {
    require('includes/connect.php');
$query = $conn->prepare("SELECT * FROM announce WHERE ann_id = ? LIMIT 1");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$GetAnnDATA=$query->fetch();
return $GetAnnDATA;

} 

?>