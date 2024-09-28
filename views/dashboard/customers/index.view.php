<?php include_once view_path('dashboard/header.view.php'); ?>
    <div class="card">
        <div class="card-header">
            <h3>Customers</h3>
        </div>
        <div class="card-body">

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
<!--                        <th>Status</th>-->
                        <th>Last Login</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $manager): ?>
                        <tr>
                            <td><?= $manager->id ?></td>
                            <td><?= $manager->username ?></td>
                            <td><?= $manager->email ?></td>
<!--                            <td>--><?php //= $manager->status ?><!--</td>-->
                            <td><?= $manager->last_login ?></td>
                            <td>
                                <a href="/customers/<?= $manager->id ?>/edit">Edit</a>
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