<?php include('header.php'); ?>
<!-- Main Content -->
<main>
    <h1 class="uk-heading-divider uk-text-center">CLINIC DATABASE CRUD</h1>

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
                    die("Query Failed: " . mysqli_error());
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['first_name'];?></td>
                            <td><?php echo $row['last_name'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['phone_no'];?></td>
                        </tr> 
                        <?php
                    }
                }
                ?>



            </tbody>
        </table>
    </div>
</main>
<?php include('footer.php'); ?>