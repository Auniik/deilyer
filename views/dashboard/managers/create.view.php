<?php include_once view_path('dashboard/header.view.php'); ?>

<div class="card">
    <div class="card-header">
        <h3>Add Manager</h3>
    </div>
    <div class="card-body">
        <div class="form-container">
            <form action="/managers" method="POST">
                <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" id="username" name="username" class="input-field">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="input-field">
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
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" class="input-field">
                </div>

                <button type="submit" class="submit-button">Submit</button>
            </form>
        </div>
    </div>
</div>

    <script>
        const divisions = <?= json_encode($divisions) ?>;
        console.log(divisions);
        const divisionSelect = document.getElementById('division');
        const districtSelect = document.getElementById('district');
        const areasCheckbox = document.querySelector('#areas');
        divisionSelect.addEventListener('change', (e) => {
            console.log(e.target.value);
            const division = divisions[e.target.value];
            districtSelect.innerHTML = '<option value="">Select District</option>';
            areasCheckbox.innerHTML = '';
            $.get(`/get-districts/${e.target.value}`, (data) => {
                data.forEach((district, index) => {
                    const option = document.createElement('option');
                    option.value = district.id;
                    option.textContent = district.name;
                    districtSelect.appendChild(option);
                });
            });
        });
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
                });
            });
        });
    </script>

<?php include_once view_path('dashboard/footer.view.php'); ?>