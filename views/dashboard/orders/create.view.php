<?php include_once view_path('dashboard/header.view.php'); ?>

<div class="card">
    <div class="card-header">
        <h3>Create Order</h3>
    </div>
    <div class="card-body">
        <div class="form-container" style="max-width: 1000px">
            <form action="/order-segments" method="POST">
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="input-field" required>
                        <? foreach ($types as $item): ?>
                        <option value="<?= $item->type ?>"><?= $item->type ?></option>
                        <? endforeach; ?>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="type">Size</label>
                    <input type="text" id="size" name="size" class="input-field">
                </div>

                <div class="flex">
                    <div>
                        <h3>From address</h3>
                        <div class="flex">
                            <div class="form-group">
                                <select id="division_from" name="division_from" class="input-field">
                                    <option value="">Select Division</option>
                                    <?php foreach ($divisions as $division): ?>
                                        <option value="<?= $division->id ?>"><?= $division->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <select id="district_from" name="district_from" class="input-field">
                                    <option value="">Select Division first</option>
                                </select>
                            </div>

                            <div class="form-group">
            <!--                    <div class="radio-group" id="areas">-->
            <!--                    </div>-->
                                 <select id="area_from" name="area_from" class="input-field">
                                    <option value="">Select District first</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="full_address_from">Full address</label>
                            <textarea type="text" id="full_address_from" name="full_address_from" class="input-field"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="amount">Sender's Phone no.</label>
                            <input type="text" id="sender_phone" name="sender_phone" class="input-field" placeholder="Sender's Phone no.">
                        </div>
                    </div>
                    <div class="vertical-line"></div>
                    <div>
                        <h3>To address</h3>
                        <div class="flex">
                            <div class="form-group">
                                <select id="division_to" name="division_to" class="input-field">
                                    <option value="">Select Division</option>
                                    <?php foreach ($divisions as $division): ?>
                                        <option value="<?= $division->id ?>"><?= $division->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <select id="district_to" name="district_to" class="input-field">
                                    <option value="">Select Division first</option>
                                </select>
                            </div>

                            <div class="form-group">
                                 <select id="area_to" name="area_to" class="input-field">
                                    <option value="">Select District first</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="full_address_to">Full address</label>
                            <textarea type="text" id="full_address_to" name="full_address_to" class="input-field"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="amount">Receiver's Phone no.</label>
                            <input type="text" id="receiver_phone" name="receiver_phone" class="input-field" placeholder="Receiver's Phone no.">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="text" id="amount" name="amount" class="input-field" placeholder="Click to see amount" readonly style="cursor:pointer;">
                </div>





                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea  id="note" name="note" class="input-field" placeholder="Additional note"></textarea>
                </div>

                <p>
                    Instructions: <br>
                    1. Please provide the correct address and make sure the address is reachable by our delivery agents. <br>
                    2. Package should be ready for pickup. <br>
                    3. Add address and phone number of the receiver in the package <br>
                </p>

                <button type="submit" class="submit-button">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    const divisions = <?= json_encode($divisions) ?>;
    console.log(divisions);
    selectTrigger('from')
    selectTrigger('to')
    function selectTrigger(postfix) {
        const divisionSelect = document.getElementById(`division_${postfix}`);
        const districtSelect = document.getElementById(`district_${postfix}`);
        const areaSelect = document.querySelector(`#area_${postfix}`);
        divisionSelect.addEventListener('change', (e) => {
            console.log(e.target.value);
            const division = divisions[e.target.value];
            districtSelect.innerHTML = '<option value="">Select District</option>';
            // areasCheckbox.innerHTML = '';
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
            areaSelect.innerHTML = '<option value="">Select Area </option>';
            $.get(`/get-areas/${district}`, (data) => {
                data.forEach((area, index) => {
                    const option = document.createElement('option');
                    option.value = area.id;
                    option.textContent = area.name;
                    areaSelect.appendChild(option);
                });
            });
        });
    }

    document.getElementById('full_address_from').addEventListener('click', function(e) {
        if (!e.target.value) {
            if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }


    });

    // Success callback function for geolocation
    function successCallback(position) {
        let lat = position.coords.latitude;
        let lon = position.coords.longitude;
        console.log(lat, lon)

        // Use a reverse geocoding API to get the address from lat and lon
        // For example, using OpenStreetMap's Nominatim service:
        let url = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lon}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                let address = data.display_name;

                // Display the address in the text area
                document.getElementById('full_address_from').value = address;
            })
            .catch(err => {
                console.error(err);
                alert("Unable to get address.");
            });
    }

    // Error callback function for geolocation
    function errorCallback(error) {
        console.error(error);
        alert("Error retrieving location: " + error.message);
    }
</script>

<?php include_once view_path('dashboard/footer.view.php'); ?>