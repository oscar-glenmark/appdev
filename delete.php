<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    try {
        // Verify student exists
        $stmt = $pdo->prepare("SELECT id FROM students WHERE id = ?");
        $stmt->execute([$id]);
        $student = $stmt->fetch();
        
        if ($student) {
            // Delete the student
            $sql = "DELETE FROM students WHERE id = ?";
            $pdo->prepare($sql)->execute([$id]);
            header("Location: index.php?success=1");
        } else {
            die('Student not found!');
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    header("Location: index.php");
}
exit();
?>
