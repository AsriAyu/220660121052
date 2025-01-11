<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <style>
        /* Container Utama */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        /* Filter dan Pencarian */
        .filter-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        #search {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        #filter {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Daftar Todo */
        ul#todoList {
            list-style: none;
            padding: 0;
        }

        ul#todoList li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            border-radius: 4px;
            background: #f9f9f9;
        }

        ul#todoList li.completed {
            text-decoration: line-through;
            color: #aaa;
        }

        ul#todoList li div a {
            margin-left: 10px;
            text-decoration: none;
            color: #007bff;
        }

        ul#todoList li div a:hover {
            text-decoration: underline;
        }

        /* Form untuk Menambahkan Todo */
        form {
            display: flex;
            margin-top: 20px;
        }

        form input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #0056b3;
        }

        /* Tombol Hapus Semua */
        .delete-all-btn {
            margin-top: 10px;
            background-color: #dc3545;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .delete-all-btn:hover {
            background-color: #b71c1c;
        }
    </style>
    <script>
        // Konfirmasi sebelum menghapus semua tugas
        document.addEventListener("DOMContentLoaded", function() {
            const deleteAllBtn = document.querySelector(".delete-all-btn");
            if (deleteAllBtn) {
                deleteAllBtn.addEventListener("click", function(e) {
                    if (!confirm("Are you sure you want to delete all tasks?")) {
                        e.preventDefault();
                    }
                });
            }
        });
    </script>
</head>

<body>
    <div class="container">
        <h1>Todo List</h1>
        <!-- Filter dan Pencarian -->
        <div class="filter-container">
            <input type="text" id="search" placeholder="Search tasks...">
            <select id="filter">
                <option value="all">All Tasks</option>
                <option value="completed">Completed Tasks</option>
                <option value="pending">Pending Tasks</option>
            </select>
        </div>

        <!-- Daftar Todo -->
        <ul id="todoList">
            <?php foreach ($todos as $todo): ?>
                <li class="<?php echo $todo['is_completed'] ? 'completed' : ''; ?>">
                    <?php echo htmlspecialchars($todo['task']); ?>
                    <div>
                        <?php if (!$todo['is_completed']): ?>
                            <a href="?action=complete&id=<?php echo $todo['id']; ?>">Mark as Completed</a>
                        <?php endif; ?>
                        <a href="?action=delete&id=<?php echo $todo['id']; ?>" style="color: red;">Delete</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Form untuk Menambahkan Todo -->
        <form method="POST" action="?action=add">
            <input type="text" name="task" placeholder="New Task" required>
            <button type="submit">Add</button>
        </form>
        <form method="POST" action="?action=deleteAll">
            <button type="submit" name="deleteAll" class="delete-all-btn">Delete All</button>
        </form>
    </div>
</body>

</html>