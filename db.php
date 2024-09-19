<?php
try {
    $mycon = new PDO("mysql:host=localhost;dbname=to_do", "root", "");
    $mycon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
