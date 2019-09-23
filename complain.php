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
        <th scope="col">Option</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT chat.id as id, CONCAT (admission_form2.firstname,' ', admission_form2.lastname) as name,chat.msg,chat.date   FROM chat
inner join admission_form2 on chat.name = admission_form2.enrollment_no where chat.type = \"admin\" and approve is null order  by date desc ";
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
                <td><a ><img onclick="approve(this,<?php echo $row['id']; ?>,'approve')" height="40px" width="40px" src="images/app.jpg"></a>  <a ><img onclick="approve(this,<?php echo $row['id']; ?>,'decline')" height="40px" width="40px" src="images/dec.png"></a>    </td>
            </tr>
        <?php }
    } ?>



    </tbody>
</table>

</div>
<?php include ('footer.php'); ?>
<script src="js/sweet.js"></script>
<script>
    function approve(e,id,type) {
        $.ajax({
            type: "POST",
            url: 'ajax.php',
            data:{'id':id,'type':type},
            success: function(data)
            {
                if(data == "approve")
                {
                    swal('success','Approved From Admin','success');
                    $(e).parent().parent().parent().remove();
                }
                if(data == "decline")
                {
                    swal('warning','Deleted Request','warning');
                    $(e).parent().parent().parent().remove();
                }
            },
        });
    }
</script>
