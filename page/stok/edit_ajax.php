<?php  
      // create database connectivity  
      include('db_con.php');  
      if (isset($_POST['editId'])) {  
           $editId = $_POST['editId'];  
      }  
      // fetch data from student table..  
      $sql = mysqli_query($dbconnect, "SELECT * FROM stok_brg WHERE kode_brg = {$editId}");  
    //   $query = $con->query($sql);  
      if ($sql->num_rows > 0) {  
      $output = "";  
      while ($row = mysqli_fetch_all($sql)) {  
      $output .= "<form>  
            <div class='modal-body'>  
                 <input type='hidden' class='form-control' id='editId' value='{$row['id']}'>  
             <div class='form-group'>  
               <input type='text' class='form-control' id='editName' value='{$row['name']}'>  
             </div>  
             <div class='form-group'>  
               <input type='text' class='form-control' id='editEmail' value='{$row['email']}'>  
             </div>  
             <div class='form-group'>  
               <input type='text' class='form-control' id='editPassword' value='{$row['password']}'>  
             </div>  
            </div>  
            <div class='modal-footer'>  
             <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>  
             <button type='button' class='btn btn-info' id='editSubmit'>Save changes</button>  
            </div>  
          </form>";            
        }  
      }  
      echo $output;  
 ?>  