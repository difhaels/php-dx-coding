<?php
session_start();
include '../../functions/query.php';

// Ambil data admins dari database
$admins = query("SELECT * FROM admin");

if (isset($_SESSION['message'])) {
    echo '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">'
        . '<span class="block sm:inline">' . $_SESSION['message'] . '</span>'
        . '</div>';
    unset($_SESSION['message']);
}

if (isset($_SESSION['error'])) {
    echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">'
        . '<span class="block sm:inline">' . $_SESSION['error'] . '</span>'
        . '</div>';
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dx Coding - Admin List</title>
    <link rel="stylesheet" href="../../css/output.css">
</head>
<body>
    <nav class="bg-slate-200 flex justify-between items-center px-5">
        <h1 class="text-2xl py-3">Dx Coding</h1>
        <a class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-400 cursor-pointer" href="../hrm.php">Back</a>
    </nav>

    <div class="px-5 mt-5 mb-16">
        <h1 class="text-2xl mb-4">Admin List</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Username</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($admins as $admin) : ?>               
                        <tr>
                            <td class="border px-4 py-2 text-center"><?= $no++; ?></td>
                            <td class="border px-4 py-2"><?= $admin["id_admin"]; ?></td>
                            <td class="border px-4 py-2"><?= $admin["username_admin"]; ?></td>
                            <td class="border px-4 py-2"><?= $admin["name_admin"]; ?></td>
                            <td class="border px-4 py-2 grid grid-cols-1 gap-1">
                                <a href="edit_admin.php?id_admin=<?= $admin["id_admin"]; ?>">
                                    <div class="bg-slate-500 hover:bg-slate-400 shadow-lg rounded-lg px-2 py-1 text-white">
                                        <h1 class="text-center">edit</h1>
                                    </div>
                                </a>
                                <a href="delete_admin.php?id_admin=<?= $admin["id_admin"]; ?>" onclick="return confirm('Are you sure you want to delete this admin?');">
                                    <div class="bg-red-500 hover:bg-red-400 shadow-lg rounded-lg px-2 py-1 text-white">
                                        <h1 class="text-center">delete</h1>
                                    </div>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer class="text-center bg-slate-900 text-white py-10 w-full">
        <h1>Dibuat Agung Saputra dengan <span class="font-bold">php</span> dan <span class="font-bold">tailwind</span></h1>
    </footer>
</body>
</html>
