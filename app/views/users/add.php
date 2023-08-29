<!-- Form to add a new user. -->
<h1>Add New User</h1>

<form action="/users/store" method="post">
    <label>Name: <input type="text" name="name"></label><br>
    <label>Email: <input type="email" name="email"></label><br>
    <input type="submit" value="Add User">
</form>
