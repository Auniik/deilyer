<?php include_once view_path('dashboard/header.view.php'); ?>

<div class="card">
    <div class="card-header">
        <h3>Edit Delivery Men</h3>
    </div>
    <div class="card-body">
        <div class="form-container">
            <form action="/delivery-mens/<?= $deliveryMen->id ?>" method="POST">
                <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" id="username" name="username" value="<?= $deliveryMen->username ?>" class="input-field">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= $deliveryMen->email ?>" class="input-field">
                </div>

                <div class="form-group">
                    <label for="division">Division</label>
                    <select id="division" name="division" class="input-field">
                        <option value="">Select One</option>
                        <?php foreach ($divisions as $division): ?>
                            <option value="<?= $division->id ?>"><?= $division->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="district">District</label>
                    <select id="district" name="district" class="input-field">
                        <option value="">Select Division</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="areas">Area: </label>
                    <div class="checkbox-group" id="areas">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Reset Password</label>
                    <input type="password" id="password" name="password" class="input-field">
                </div>

                <button type="submit" class="submit-button">Submit</button>
            </form>
        </div>
    </div>
</div>

    <script>
        const divisions = <?= json_encode($divisions) ?>;
        const divisionSelect = document.getElementById('division');

        const districtSelect = document.getElementById('district');
        const areasCheckbox = document.querySelector('#areas');
        const selectedAreas = <?= json_encode($selected_areas) ?>;
        console.log(selectedAreas)

        const selectedDivision = undefined
        const selectedDistrict = undefined

        divisionSelect.addEventListener('change', (e) => {
            console.log(e.target.value);
            districtSelect.innerHTML = '<option value="">Select District</option>';
            areasCheckbox.innerHTML = '';
            $.get(`/get-districts/${e.target.value}`, (data) => {
                data.forEach((district, index) => {
                    const option = document.createElement('option');
                    option.value = district.id;
                    option.textContent = district.name;
                    districtSelect.appendChild(option);
                });
                setTimeout(() => {
                    districtSelect.value = "<?= $selected_district->id ?>";
                    // Trigger division change window event
                    const event = new Event('change');
                    districtSelect.dispatchEvent(event);
                }, 0);

            });
        });

        // Trigger division change window event
        setTimeout(() => {
            divisionSelect.value = "<?= $selected_division->id ?>";
            // Trigger division change window event
            const event = new Event('change');
            divisionSelect.dispatchEvent(event);
        }, 0);

        districtSelect.addEventListener('change', (e) => {
            const district = e.target.value;
            $.get(`/get-areas/${district}`, (data) => {
                data.forEach((area, i) => {
                    const label = document.createElement('label');
                    const input = document.createElement('input');
                    input.type = 'checkbox';
                    input.name = `areas[]`;
                    input.value = area.id;
                    label.appendChild(input);
                    label.appendChild(document.createTextNode(area.name));
                    areasCheckbox.appendChild(label);
                })
                 areasCheckbox.querySelectorAll('input').forEach((input) => {
                    if (selectedAreas.find((area) => area.area_id == input.value)) {
                        input.parentElement.click();
                    }
                });
            });
        });
    </script>

<?php include_once view_path('dashboard/footer.view.php'); ?>