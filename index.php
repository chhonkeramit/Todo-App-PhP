<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
  <style>
  body{
    background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(105,105,161,1) 0%, rgba(28,196,174,1) 15%);
  }
  </style>
  </head>


<?php
include 'dbconnect.php';
//check for submit
if(isset($_POST['submit'])){
  $input = mysqli_real_escape_string($conn,$_POST['list_input']);
  //query
  $query = "insert into lists(title) values('$input')";
  if(mysqli_query($conn,$query)){
    header('Location: index.php');
  }else{
    echo "failed";
  }
}

// check for edit
  if (isset($_POST['edit'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
 
    $query = "update student set title='$title' WHERE id= '$id'";
    $data = mysqli_query($conn, $query);
     header('Location: index.php');

  }


//check for delete
if(isset($_POST['delete'])){
  $delete_id = mysqli_real_escape_string($conn,$_POST['delete_id']);
  //query
  $query = "DELETE FROM lists where id={$delete_id}";
  if(mysqli_query($conn,$query)){
    header('Location: index.php');
  }else{
    echo "failed to delete";
  }
}

//get all list
$query = "select *from lists";
//get result
$result = mysqli_query($conn,$query);
//get all list in array
$lists = mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);
//close conn
mysqli_close($conn);

?>

    <div>
    <div class="container">
    <div class="container my-first-container">
      <p class="text-center" style="font-size:25px;">To Do List Web App</p>
      <p class="text-center">Made from PHP and MYSQL</p>
      <?php foreach ($lists as $list) :  ?>
      <ul>
        <li>
          <span style="color:yellow" class="span-class"><?php echo $list['title'] ?></span><br>
        
        <form class="" action="" method="post">
            
            <input id="demo" type="hidden" name="delete_id" value="<?php echo $list['id']; ?>">
            
            <input type="submit" name="delete" value="Remove as Done" class="delete-btn">
            <input type="submit" name="edit" value="Edit" class="edit-btn" onclick="fun()" >
        </form>
        </li>
      </ul>
      <?php endforeach; ?>
      <div class="container myContainer">
        <form method="POST" action="">
          <input type="text" name="list_input" placeholder="Enter a new to do list..." class="text-center myInput" required>
          <input type="submit" class="btn btn-info add-btn" value="Add" name="submit">
        </form>
      </div>
  </div>
</div>

<script>
function fun(){
  document.getElementById("demo").innerHTML = "<input type="text">"
}
</script>
