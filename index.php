<?php include('header.php'); ?>
<!-- Main Content -->
<main>
    <h1 class="uk-heading-divider uk-text-center">CLINIC DATABASE CRUD</h1>
    <a class="uk-button uk-button-default uk-position-center" href="#modal-sections" uk-toggle>ADD USER</a>

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
                $query = "SELECT * FROM `clinic_acc`;";

                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die("Query Failed: ". mysqli_error());
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone_no']; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <?php

        if(isset($_GET['message'])){
           echo"<h6>".$_GET['message']."</h6>";
        }
        ?>
    </div>

    <form class="uk-form-stacked" action="insert_data.php" method="POST">
        <div id="modal-sections" uk-modal>
            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="uk-modal-header">
                    <h2 class="uk-modal-title">Modal Title</h2>
                </div>
                <div class="uk-modal-body">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="first_name">First Name</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="first_name"  type="text"
                                placeholder="First Name">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="last_name">Last Name</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="last_name"  type="text"
                                placeholder="Last Name">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="email">Email</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="email"  type="text" placeholder="Email">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="phone_no">Contact Number</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="phone_no" type="text"
                                placeholder="Contact Number">
                        </div>
                    </div>
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button" data-dismiss="modal-sections">Cancel</button>
                    <input type="submit" class="uk-button uk-button-default" name="add_users" value="ADD">
                </div>
            </div>
        </div>
    </form>

</main>
<?php include('footer.php'); ?>