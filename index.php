<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- 
    DataBase information :
     dbName      : attend  ;
     tabel name  : stud  ;
     columas name :  (id,name,s1,s2,s3 ,s4 ,s5 ,s6 ,s7,s8 )
   
 -->

<script src="js/jquery.min.js"> </script>
<script src="js/popper.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="css/style.css"> -->
<link rel="stylesheet" href="style.css">

<?php
session_start();
     
function ifsset($value, $vari)
{
    if (isset($_POST['$value'])) {
        $vari = $_POST['$value'];
    }
}

function isattend($value)
{
    if ($value == "true") {
        echo "<td class='sessions'>  <img  width='20px' src='true.png'>" . "</td>";
    } else {
        echo "<td class='sessions' >  <img width='20px' src='false.png'>" . "</td>";
    }
}
$host = "localhost";
$user = "root";
$pass = "";
$db = "attend";
$conn = mysqli_connect($host, $user, $pass, $db);

$select = "SELECT * FROM stud"; //"select * from emp where empId < 6 and empId > 3 "
$r = mysqli_query($conn, $select);

// $num = "";
// $name = "";
// $nameErr = "";
// $attend = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['no'])) {
        $num = $_POST['no'];
    }
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    ifsset('s1', 's1');
    ifsset('s2', 's2');
    ifsset('s3', 's3');
    ifsset('s4', 's4');
    ifsset('s5', 's5');
    ifsset('s6', 's6');
    ifsset('s7', 's7');
    ifsset('s8', 's8');


    $sqls = "";

    if (isset($_POST['btnadd'])) {
        $sqls = "insert into stud (name,s1,s2,s3 ,s4 ,s5 ,s6 ,s7,s8 ) values ( '$name'  , '$s1','$s2','$s3','$s4','$s5','$s6','$s7','$s8' )";
        mysqli_query($conn, $sqls);
        header("location: index.php");
    }

    if (isset($_POST['btnedit'])) {
        $sql = "SELECT * from stud where id = $num";
        $result = mysqli_query($conn, $sql);
        $query_row = mysqli_fetch_assoc($result);
        $s1 = $query_row['s1'];
        $s2 = $query_row['s2'];
        $s3 = $query_row['s3'];
        $s4 = $query_row['s4'];
        $s5 = $query_row['s5'];
        $s6 = $query_row['s6'];
        $s7 = $query_row['s7'];
        $s8 = $query_row['s8'];
        if (isset($_POST['s1'])) {
            $s1 = $_POST['s1'];
        }
        if (isset($_POST['s2'])) {
            $s2 = $_POST['s2'];
        }
        if (isset($_POST['s3'])) {
            $s3 = $_POST['s3'];
        }
        if (isset($_POST['s4'])) {
            $s4 = $_POST['s4'];
        }
        if (isset($_POST['s5'])) {
            $s5 = $_POST['s5'];
        }
        if (isset($_POST['s6'])) {
            $s6 = $_POST['s6'];
        }
        if (isset($_POST['s7'])) {
            $s7 = $_POST['s7'];
        }
        if (isset($_POST['s8'])) {
            $s8 = $_POST['s8'];
        }
        $sqls = "update stud set name = '$name'  , s1 = '$s1' ,  s2 = '$s2'  , s3 = '$s3',s4 = '$s4',s5 = '$s5' ,s6 = '$s6' , s7 = '$s7' ,s8 = '$s8' where id = $num";
        mysqli_query($conn, $sqls);
        header("location: index.php");
    }


    if (isset($_POST['btndel'])) {
        $sqls = "delete from stud where id=$num";
        mysqli_query($conn, $sqls);
        header("location: index.php");
        echo  "<h1> your record has been deleted</h1> ";
    }
}

?>

<a href="login.php"> click to login</a>

<form method="POST">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-12 m-auto">
                <div class=" text-center  inputs mt-5">
                    <div class="form-group " style="display: none;">
                        <label for="exampleInputEmail1">Student ID</label> <input class="form-control" type="text" id="no" name="no">
                    </div>
                    <div class="form-group "  >
                        <label for="exampleInputEmail1">delegate Name</label> <input  class="form-control" type="text" id="name" name="name">
                    </div>
                    <!-- sessions -->
                    <table class="table table-striped text-center">
    <tr>
        <th>S1 </th>
        <th>S2 </th>
        <th>S3 </th>
        <th>S4 </th>
        <th>S5 </th>
        <th>S6 </th>
        <th>S7 </th>
        <th>S8 </th>
    </tr>
    <tr>
        <td> <input style="height: 25px; width : 25px ; margin:10px ;  padding:50px" id="s1" type="checkbox" value="true" name="s1">
        </td>
        <td> <input style="height: 25px; width : 25px ; margin:10px ;  padding:50px" id="s2" type="checkbox" value="true" name="s2">
        </td>
        <td> <input style="height: 25px; width : 25px ; margin:10px ;  padding:50px" id="f" type="checkbox" value="true" name="s3">
        </td>
        <td> <input style="height: 25px; width : 25px ; margin:10px ;  padding:50px" id="f" type="checkbox" value="true" name="s4">
        </td>
        <td> <input style="height: 25px; width : 25px ; margin:10px ;  padding:50px" id="f" type="checkbox" value="true" name="s5">
        </td>
        <td> <input style="height: 25px; width : 25px ; margin:10px ;  padding:50px" id="f" type="checkbox" value="true" name="s6">
        </td>
        <td> <input style="height: 25px; width : 25px ; margin:10px ;  padding:50px" id="f" type="checkbox" value="true" name="s7">
        </td>
        <td> <input style="height: 25px; width : 25px ; margin:10px ;  padding:50px" id="f" type="checkbox" value="true" name="s8">
        </td>
    </tr>
</table>
                    <!-- ====== end sesions -->

                   <button name="btnadd" class="btn btn-primary">ADD </button>
                     <button name="btnedit" class="btn btn-primary"> Edit</button>
                    <button name="btndel" class="btn btn-primary"> Delete</button> 
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12  m-auto">
                <div class="input-group m-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@</span>
                    </div>
                    <input type="text" name="sarch" placeholder="Search About Your delegate" id="sarch" class="form-control">
                </div>
                <table class="table  text-center" id="emp">
                    <thead class="thead-dark">
                        <tr>
                            <th >delegate ID </th>
                            <th >delegate Name </th>
                            <th>S1 </th>
                            <th>S2 </th>
                            <th>S3 </th>
                            <th>S4 </th>
                            <th>S5 </th>
                            <th>S6 </th>
                            <th>S7 </th>
                            <th>S8 </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    while ($row =  mysqli_fetch_array($r)) {
                        echo '<tr class="rows">';
                        echo '<td> ' . $row['id'] . "</td>";
                        echo "<td class='names'> " . $row['name'] . "</td>";

                        isattend($row['s1']);
                        isattend($row['s2']);
                        isattend($row['s3']);
                        isattend($row['s4']);
                        isattend($row['s5']);
                        isattend($row['s6']);
                        isattend($row['s7']);
                        isattend($row['s8']);
                        echo " <td>  <button name='btnedit' class='btn btn-primary'> Edit</button> 
                               <button name='btndel' class='btn btn-primary'> Delete</button> </td>";
                        echo "</tr>";
                    }

                    ?>
                </table>
            </div>
        </div>
    </div>
    <script>
        var tbl = document.getElementById("emp");
        for (var x = 1; x < tbl.rows.length; x++) {
            tbl.rows[x].onclick = function() {
                document.getElementById("no").value = this.cells[0].innerHTML;
                document.getElementById("name").value = this.cells[1].innerHTML;
            }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#sarch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#emp tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
                $("#emp tr:first").show();
            });
        });
    </script>
</form>