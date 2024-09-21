<?php include_once view_path('dashboard/header.view.php'); ?>
<?php

?>
    <!--<h1>Welcome to the Admin Dashboard</h1>-->

    <div class="card">
        <div class="card-header">
            <h3>Managers</h3>
        </div>
        <div class="card-body">

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Last Login</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($managers as $manager): ?>
                        <tr>
                            <td><?= $manager->id ?>sdasd</td>
                            <td><?= $manager->username ?>sdasd</td>
                            <td><?= $manager->email ?></td>
                            <td><?= $manager->status ?></td>
                            <td><?= $manager->last_login ?></td>
                            <td>
                                <a href="/managers/<?= $manager->id ?>/edit">Edit</a>
                                <a href="/managers/<?= $manager->id ?>/delete">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
        </div>
    </div>


<?php include_once view_path('dashboard/footer.view.php'); ?>