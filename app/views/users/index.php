<!-- Displays a list of all users. -->
<h1>All Users</h1>

<ul>
    <?php foreach ($data['users'] as $user): ?>
        <li><a href="/users/show/<?= $user->id ?>"><?= $user->name ?></a></li>
    <?php endforeach; ?>
</ul>
