<h1>Task List</h1>
<a href="/project-mvc/TaskController/create">Create New Task</a>
<ul>
    <?php foreach ($tasks as $task): ?>
        <li>
            <?= $task['title']; ?>
            <a href="/project-mvc/TaskController/edit/<?= $task['id']; ?>">Edit</a>
            <a href="/project-mvc/TaskController/delete/<?= $task['id']; ?>">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>