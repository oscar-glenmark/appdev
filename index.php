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

=======
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes pulse-glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(76, 175, 80, 0.5);
            }
            50% {
                box-shadow: 0 0 30px rgba(76, 175, 80, 0.8);
            }
        }
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        .animate-slide-in-right {
            animation: slideInRight 0.5s ease-out;
        }
        .animate-pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }
        .animate-delayed-1 {
            animation-delay: 0.1s;
        }
        .animate-delayed-2 {
            animation-delay: 0.2s;
        }
        .animate-delayed-3 {
            animation-delay: 0.3s;
        }
        tr {
            animation: fadeIn 0.6s ease-out forwards;
            opacity: 0;
        }
        tbody tr:nth-child(1) { animation-delay: 0.1s; }
        tbody tr:nth-child(2) { animation-delay: 0.2s; }
        tbody tr:nth-child(3) { animation-delay: 0.3s; }
        tbody tr:nth-child(4) { animation-delay: 0.4s; }
        tbody tr:nth-child(5) { animation-delay: 0.5s; }
        tbody tr:nth-child(n+6) { animation-delay: 0.6s; }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-100 to-slate-200 min-h-screen py-12 px-4">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8 animate-fade-in">
            <div class="flex items-center justify-between flex-wrap gap-6">
                <div class="animate-slide-in-right">
                    <h1 class="text-4xl font-bold text-gray-800 flex items-center gap-3">
                        <span class="text-5xl animate-bounce">📚</span>
                        Student Management System
                    </h1>
                    <p class="text-gray-600 mt-2">Manage your student records efficiently</p>
                </div>
                <a href="create.php" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition-all duration-300 hover:shadow-xl hover:scale-105 flex items-center gap-2 animate-slide-in-right animate-delayed-1">
                    <span class="text-xl">+</span> Add New Student
                </a>
            </div>
        </div>

        <!-- Success Message -->
        <?php if (isset($_GET['success'])): ?>
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-lg shadow animate-fade-in" style="animation: fadeIn 0.5s ease-out;">
                <div class="flex">
                    <div class="text-green-500 text-2xl mr-4 animate-bounce">✓</div>
                    <div>
                        <p class="text-green-800 font-semibold">Success!</p>
                        <p class="text-green-700">Operation completed successfully!</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Students Table -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden animate-fade-in" style="animation-delay: 0.2s; animation: fadeIn 0.6s ease-out forwards; opacity: 0;">
            <?php if (count($students) > 0): ?>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gradient-to-r from-gray-800 to-gray-900 text-white">
                                <th class="px-6 py-4 text-left font-semibold">ID</th>
                                <th class="px-6 py-4 text-left font-semibold">Name</th>
                                <th class="px-6 py-4 text-left font-semibold">Email</th>
                                <th class="px-6 py-4 text-left font-semibold">Course</th>
                                <th class="px-6 py-4 text-left font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $s): ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-50 transition-all duration-300 hover:shadow-md hover:scale-[1.01]">
                                <td class="px-6 py-4 font-medium text-gray-800"><?= htmlspecialchars($s['id']) ?></td>
                                <td class="px-6 py-4 text-gray-800"><?= htmlspecialchars($s['name']) ?></td>
                                <td class="px-6 py-4 text-gray-600"><?= htmlspecialchars($s['email']) ?></td>
                                <td class="px-6 py-4">
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium transition-all duration-300 hover:bg-blue-200 inline-block">
                                        <?= htmlspecialchars($s['course']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-3">
                                        <a href="edit.php?id=<?= $s['id'] ?>" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300 inline-flex items-center gap-2 hover:shadow-lg hover:scale-110 transform">
                                            <span>✏️</span> Edit
                                        </a>
                                        <a href="delete.php?id=<?= $s['id'] ?>" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300 inline-flex items-center gap-2 hover:shadow-lg hover:scale-110 transform" onclick="return confirm('Are you sure you want to delete this student?')">
                                            <span>🗑️</span> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-12 animate-fade-in">
                    <p class="text-gray-500 text-lg mb-4">No students found.</p>
                    <a href="create.php" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition-all duration-300 hover:shadow-lg hover:scale-105 transform">Add one now!</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>