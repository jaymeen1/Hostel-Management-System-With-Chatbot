<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "hosteldb";
$con = new mysqli($host, $user, $pass, $db_name);
include('header.php'); ?>
<style>
    *{ padding: 0; margin: 0; border: 0; } 
    body{
        background: silver; 
        } 
    #container{ 
        width: 40%; 
        background: white; 
        margin: 0 auto; 
        padding: 20px; 
        } 
    #chat_box{ 
        width: 90%; 
        height: 400px; 
        } 
    #chat_data{ 
        width: 100%; 
        padding: 5px; 
        margin-bottom: 5px; 
        border-bottom: 1px solid silver; 
        font-weight: bold; 
        } 
    input[type="text"]{
         width: 100%; 
         height: 40px; 
         border: 1px solid grey; 
         border-radius: 5px; 
        } 
    input[type="submit"]{
        width: 100%; 
        height: 40px;
        border: 1px solid grey; 
        border-radius: 5px; 
        }
    textarea{ 
        width: 100%; 
        height: 40px; 
        border: 1px solid grey; 
        border-radius: 5px; 
    }
</style>
    <div id="container" style="width: 100%!important;">
        <div class="chat"  style='overflow:scroll; height:400px;width: 100%!important;' id="chat_box">
            <?php
            $sql = "SELECT CONCAT (admission_form2.firstname,' ', admission_form2.lastname) as name,chat.msg,chat.date   FROM chat left join admission_form2 on chat.name = admission_form2.enrollment_no where chat.type != \"admin\" order  by chat.id desc ";
            $result = $con->query($sql);
            if ($result->num_rows > 0)
            {
            while($row = $result->fetch_assoc()) {
            ?>
                <div id="chat_data">
                    <span style="color:green;"><?php echo $row['name']; ?> : </span>
                    <span style="color:brown;"><?php echo $row['msg']; ?></span>
                    <span style="float:right;"><?php echo $row['date']; ?></span>
                </div>
            <?php }
            } ?>
        </div>
        <form method="post" action="insert_chat.php">
            <input type="text" name="name" value="<?php echo $_SESSION['email']; ?>"  placeholder="Enter Name: " />
            <select name="type" class="selectpicker" style="width: 100%;margin-top: 5px">
                <option value="Group">Group</option>
                <option value="admin">Admin</option>
            </select>
            <textarea name="enter message" placeholder="Enter Message"></textarea>

            <input type="submit" name="submit" value="Send!" />
        </form>

    </div>
<?php include('footer.php'); ?>
<script>
    setInterval(function(){

        $.ajax({
            type: "POST",
            url: 'ajax_chat.php',
            async:true,
            success: function(data)
            {
                $('.chat').html(data);
            },
        });
    }, 5000);

</script>



