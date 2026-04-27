<?php
require 'db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $course = trim($_POST['course']);

    if (empty($name) || empty($email) || empty($course)) {
        $error = "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address!";
    } else {
        try {
            $sql = "INSERT INTO students (name, email, course) VALUES (:name, :email, :course)";
            $stmt = $pdo->prepare($sql);
            
            if ($stmt->execute(['name' => $name, 'email' => $email, 'course' => $course])) {
                header('Location: index.php?success=1');
                exit();
            }
        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes pulse-ring {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.7);
            }
            50% {
                box-shadow: 0 0 0 10px rgba(76, 175, 80, 0);
            }
        }
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        .animate-slide-up {
            animation: slideUp 0.5s ease-out;
        }
        .animate-pulse-ring {
            animation: pulse-ring 2s infinite;
        }
        input:focus {
            animation: slideUp 0.3s ease-out;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-100 to-slate-200 min-h-screen flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-lg p-8 animate-fade-in">
            <div class="flex items-center justify-center mb-6 animate-slide-up">
                <span class="text-4xl mr-3 animate-bounce">➕</span>
                <h1 class="text-3xl font-bold text-gray-800">Add Student</h1>
            </div>
            <p class="text-gray-600 text-center mb-8 animate-slide-up" style="animation-delay: 0.1s; animation: slideUp 0.5s ease-out forwards; opacity: 0;">Fill in the details to add a new student</p>
            
            <?php if ($error): ?>
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-lg animate-slide-up" style="animation-delay: 0.15s;">
                    <div class="flex">
                        <div class="text-red-500 text-xl mr-3 animate-bounce">⚠️</div>
                        <div>
                            <p class="text-red-800 font-semibold">Error</p>
                            <p class="text-red-700 text-sm"><?= htmlspecialchars($error) ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <form method="POST" class="space-y-4">
                <div class="animate-slide-up" style="animation-delay: 0.2s; animation: slideUp 0.5s ease-out forwards; opacity: 0;">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="John Doe" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" />
                </div>
                
                <div class="animate-slide-up" style="animation-delay: 0.3s; animation: slideUp 0.5s ease-out forwards; opacity: 0;">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="john@example.com" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" />
                </div>
                
                <div class="animate-slide-up" style="animation-delay: 0.4s; animation: slideUp 0.5s ease-out forwards; opacity: 0;">
                    <label for="course" class="block text-gray-700 font-semibold mb-2">Course</label>
                    <input type="text" id="course" name="course" placeholder="Computer Science" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" />
                </div>
                
                <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-3 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg hover:scale-105 mt-6 transform animate-slide-up" style="animation-delay: 0.5s; animation: slideUp 0.5s ease-out forwards; opacity: 0;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    Add Student
                </button>
                
                <a href="index.php" class="block text-center bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 rounded-lg transition-all duration-300 hover:scale-105 transform animate-slide-up" style="animation-delay: 0.6s; animation: slideUp 0.5s ease-out forwards; opacity: 0;">
                    Back to List
                </a>
            </form>
        </div>
    </div>
</body>
</html>