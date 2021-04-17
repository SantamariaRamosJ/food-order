<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add'])) //checking wheter the session is set or not
            {
                echo $_SESSION['add']; //display the session message is set
                unset($_SESSION['add']); //remove session
            }

        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" id="" placeholder="Enter your name">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placerholder="Enter your username">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placerholder="Enter your password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>



<?php 
//process the value form form and save it in database
//check wether the buttons is clicked or not

if((isset($_POST['submit'])))
{
    //button clicked
    // echo "buttom clicked";

    //1. get data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //password encryption with MDS

    //2. SQL query to save the data into the database
    $sql = "INSERT INTO admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
    ";

    //3.Execute Query and save data into database
    $res = mysqli_query($conn, $sql) or die(mysqli_error("error"));

    //4. check whether the (Query is executed) data is inserted or not and display an appropiate message
    if($res==TRUE){
        // echo "Data inserted";
        $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    } else {
        // echo "insert data";
        $_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
        header("location:".SITEURL.'admin/add-admin.php');
    }

}



?>