<?php include('header.php'); ?>
<!-- Main Content -->
<main>
    <h1 class="uk-heading-divider uk-text-center">CLINIC DATABASE CRUD</h1>
    
    <!-- Trigger button for modal -->
    <div class="uk-text-center" style="margin: 20px 0;">
        <button class="uk-button uk-button-primary" uk-toggle="target: #modal-sections">ADD USER</button>
    </div>

    <div class="uk-card uk-card-large uk-card-default" style="margin: 50px">
        <?php include('dbcon.php'); ?>

        <table class="uk-table uk-table-hover uk-table-divider">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>EMAIL</th>
                    <th>CONTACT NUMBER</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fixed query - removed semicolon
                $query = "SELECT * FROM clinic_acc";
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die("Query Failed: ". mysqli_error($connection));
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone_no']); ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <?php
        if(isset($_GET['message'])){
           echo"<div class='uk-alert uk-alert-primary'>".$_GET['message']."</div>";
        }
        ?>
    </div>
</main>

<!-- Modal Form - Placed outside main content -->
<form class="uk-form-stacked" action="insert_data.php" method="POST">
    <div id="modal-sections" uk-modal>
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title">Add New User</h2>
            </div>
            <div class="uk-modal-body">
                <div class="uk-margin">
                    <label class="uk-form-label" for="first_name">First Name</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="first_name" name="first_name" type="text" placeholder="First Name" required>
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="last_name">Last Name</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="last_name" name="last_name" type="text" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="email">Email</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="email" name="email" type="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="phone_no">Contact Number</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="phone_no" name="phone_no" type="text" placeholder="Contact Number" required>
                    </div>
                </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button type="submit" class="uk-button uk-button-primary" name="add_users">ADD USER</button>
            </div>
        </div>
    </div>
</form>

<?php include('footer.php'); ?>