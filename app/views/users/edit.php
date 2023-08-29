<!-- Form to edit an existing user. -->
<h1>Edit User</h1>

<form action="/users/update/<?= $data['user']->id ?>" method="post">
    <label>Name: <input type="text" name="name" value="<?= $data['user']->name ?>"></label><br>
    <label>Email: <input type="email" name="email" value="<?= $data['user']->email ?>"></label><br>
    <input type="submit" value="Update User">
</form>
