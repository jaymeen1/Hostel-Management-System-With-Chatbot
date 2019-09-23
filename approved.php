<?php session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "hosteldb";
$con = new mysqli($host, $user, $pass, $db_name);
include ('header.php'); ?>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">msg</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT chat.id as id, CONCAT (admission_form2.firstname,' ', admission_form2.lastname) as name,chat.msg,chat.date,chat.approve   FROM chat
inner join admission_form2 on chat.name = admission_form2.enrollment_no where chat.type = \"admin\" and chat.approve is not null order  by date desc ";
        $result = $con->query($sql);
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc()) {
                ?>
                <tr id="<?php echo $row['id']; ?>">
                    <th scope="row">1</th>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['msg']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td <?php if($row['approve'] == "approved"){ echo "bgcolor=\"#7CFC00\"" ;}  ?> ><?php echo $row['approve']; ?></td>
                </tr>
            <?php }
        } ?>



        </tbody>
    </table>

</div>
<?php include ('footer.php'); ?>
<script src="js/sweet.js"></script>

