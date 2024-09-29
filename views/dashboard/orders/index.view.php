<?php include_once view_path('dashboard/header.view.php'); ?>
<?php

?>

    <div class="card">
        <div class="card-header">
            <h3>Orders</h3>
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
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= $order->id ?></td>
                            <td><?= $order->username ?></td>
                            <td><?= $order->email ?></td>
<!--                            <td>--><?php //= $manager->status ?><!--</td>-->
                            <td><?= $order->last_login ?></td>
                            <td>
                                <a href="/orders/<?= $order->id ?>/edit">Edit</a>
                                <a href="/orders/<?= $order->id ?>/delete">Delete</a>
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