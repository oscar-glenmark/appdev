<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM students ORDER BY id DESC");
$students = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen py-10 px-4">

<div class="max-w-6xl mx-auto">

    <!-- Header -->
    <div class="bg-white border border-indigo-100 rounded-xl shadow-md p-8 mb-8 fade-in">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h1 class="text-4xl font-bold text-indigo-900">
                    🎓 Student Management System
                </h1>
                <p class="text-gray-600 mt-2">
                    Academic records and student information
                </p>
            </div>

            <a href="create.php"
               class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg shadow transition duration-300">
                + Add Student
            </a>
        </div>
    </div>

    <!-- Stats Card -->
    <div class="bg-white border border-indigo-100 rounded-lg p-5 mb-6 shadow-sm fade-in">
        <p class="text-gray-600">Total Students</p>
        <h2 class="text-3xl font-bold text-indigo-700"><?= count($students) ?></h2>
    </div>

    <!-- Success Message -->
    <?php if (isset($_GET['success'])): ?>
        <div class="bg-green-50 border border-green-200 text-green-700 p-4 mb-6 rounded-lg fade-in">
            ✅ Operation completed successfully!
        </div>
    <?php endif; ?>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden fade-in">

        <?php if (count($students) > 0): ?>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    
                    <thead>
                        <tr class="bg-indigo-700 text-white">
                            <th class="px-6 py-4">ID</th>
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">Email</th>
                            <th class="px-6 py-4">Course</th>
                            <th class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($students as $s): ?>
                        <tr class="border-b hover:bg-indigo-50 transition">

                            <td class="px-6 py-4 font-medium text-gray-800">
                                <?= htmlspecialchars($s['id']) ?>
                            </td>

                            <td class="px-6 py-4 text-gray-800">
                                <?= htmlspecialchars($s['name']) ?>
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                <?= htmlspecialchars($s['email']) ?>
                            </td>

                            <td class="px-6 py-4">
                                <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    <?= htmlspecialchars($s['course']) ?>
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex gap-2">

                                    <a href="edit.php?id=<?= $s['id'] ?>"
                                       class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg">
                                        ✏️ Edit
                                    </a>

                                    <a href="delete.php?id=<?= $s['id'] ?>"
                                       onclick="return confirm('Are you sure?')"
                                       class="bg-red-500 hover:bg-red-600 text-white text-sm px-4 py-2 rounded-lg">
                                        🗑️ Delete
                                    </a>

                                </div>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>

        <?php else: ?>
            <div class="text-center py-12">
                <p class="text-gray-500 mb-4">No students found.</p>
                <a href="create.php"
                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg">
                    Add Student
                </a>
            </div>
        <?php endif; ?>

    </div>

</div>

</body>
</html>