<?php include_once view_path('dashboard/header.view.php'); ?>
<?php
    
?>
    <!--<h1>Welcome to the Admin Dashboard</h1>-->

    <div class="card">
        <div class="card-header">
            <h3>Card Title</h3>
        </div>
        <div class="card-body">
            <div class="form-container">
                <form action="#">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" class="input-field">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="input-field">
                    </div>

                    <div class="form-group">
                        <label for="comments">Comments</label>
                        <textarea id="comments" class="textarea-field"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <div class="radio-group">
                            <label><input type="radio" name="gender" value="male"> Male</label>
                            <label><input type="radio" name="gender" value="female"> Female</label>
                            <label><input type="radio" name="gender" value="other"> Other</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hobbies">Hobbies</label>
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="hobbies" value="reading"> Reading</label>
                            <label><input type="checkbox" name="hobbies" value="traveling"> Traveling</label>
                            <label><input type="checkbox" name="hobbies" value="sports"> Sports</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="country">Country</label>
                        <select id="country" class="input-field">
                            <option value="usa">USA</option>
                            <option value="canada">Canada</option>
                            <option value="uk">UK</option>
                            <option value="australia">Australia</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="languages">Languages Known</label>
                        <select id="languages" class="input-field" multiple>
                            <option value="english">English</option>
                            <option value="spanish">Spanish</option>
                            <option value="french">French</option>
                            <option value="german">German</option>
                            <option value="chinese">Chinese</option>
                        </select>
                    </div>

                    <button type="submit" class="submit-button">Submit</button>
                </form>
            </div>
        </div>
        <div class="card-footer">
            <button class="card-button">Action</button>
        </div>
    </div>


<?php include_once view_path('dashboard/footer.view.php'); ?>