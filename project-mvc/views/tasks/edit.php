<h1>Edit Task</h1>
<form method="POST" action="/project-mvc/TaskController/edit/<?= $task['id']; ?>">
    <input type="text" name="title" value="<?= $task['title']; ?>">
    <button type="submit">Update</button>
</form>