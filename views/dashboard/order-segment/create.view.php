<?php include_once view_path('dashboard/header.view.php'); ?>

    <div class="card">
        <div class="card-header">
            <h3>Order Segments</h3>
        </div>
        <div class="card-body">
            <div class="form-container" style="max-width: fit-content">
                <form action="/order-segments" method="POST">
                    <div class="flex">
                        <input type="hidden" name="id" value="">

                        <div class="form-group">
                            <!--                        <label for="destination_type_-->
                            <?php //= $key ?><!--">Destination type </label>-->
                            <label for="">Destination type</label>
                            <select name="destination_type" id="destination_type" class="input-field" required>
                                <option value="inside_city">Inside City</option>
                                <option value="outside_city">Outside City</option>
                            </select>
                        </div>

                        <div class="form-group">
<!--                        <label for="destination_type_-->
                            <?php //= $key ?><!--">Destination type </label>-->
                            <label for="">Type</label>
                            <input type="text" id="type"
                                   name="type" min="1" max="20"
                                   placeholder="Parcel / document / Food"
                                   value="" class="input-field" >
                        </div>

                        <div class="form-group">
                            <label for="">Min Size (KG)</label>
                            <input type="text" id="min_size" name="min_size" min="1" max="20"
                                   class="input-field" placeholder="Min size (KG)">
                        </div>
                        <div class="form-group">
                            <label for="max_size">Max Size (KG) </label>
                            <input type="text" id="max_size" name="max_size" min="1" max="20"
                                   class="input-field" placeholder="Max size (KG)">
                        </div>
                        <div class="form-group">
                            <label for="price">Price </label>
                            <input type="number" id="price" name="price" placeholder="Price" class="input-field">
                        </div>

                        <div class="form-group">
                            <label for="discount">Discount </label>
                            <input type="number" id="discount" name="discount" placeholder="Discount" class="input-field">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="submit-button">Submit</button>
                </form>
            </div>

            <hr>
             <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Destination type</th>
                        <th>Type</th>
                        <th>Min Size (KG)</th>
                        <th>Max Size (KG)</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderSegments ?? [] as $order): ?>
                        <tr>
                            <td><?= $order->id ?></td>
                            <td><?= $order->destination_type ?></td>
                            <td><?= $order->type ?></td>
                            <td><?= $order->min_size ?></td>
                            <td><?= $order->max_size ?></td>
                            <td><?= $order->price ?></td>
                            <td><?= $order->discount ?></td>
                            <td>
                                <a href="/order-segments/<?= $order->id ?>/delete">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>

    </script>

<?php include_once view_path('dashboard/footer.view.php'); ?>