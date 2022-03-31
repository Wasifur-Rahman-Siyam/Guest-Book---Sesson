<?php
session_start();
include_once ($_SERVER[ 'DOCUMENT_ROOT']."/Pondit_Practice/OOP/guest-book/config.php");

$guest_book_data=[];
if(array_key_exists('guest_book_data', $_SESSION)){
  $guest_book_data = unserialize($_SESSION['guest_book_data']);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <section>
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-8">
                <h3 class="text-center">Guest Book:</h3>

                <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($guest_book_data as $key=>$data){
    ?>
    <tr>
    <td><?= $key;?></td>
      <td><?= $data['full_name'];?></td>
      <td> <a class="btn btn-primary" href="guest_book_show.php?guest_position=<?= $key;?>">Show</a> 
      | 
      <a class="btn btn-secondary" href="guest_book_edit.php?guest_position=<?= $key;?>">Edit </a>
      | 
      <a class="btn btn-danger" href="guest_book_delete.php?guest_position=<?= $key;?>">Delete </a>  
    </td>
    </tr>
    
    <?php
    }
    ?>
  </tbody>
</table>

             
                    <div>
                      <button type="button" class="btn btn-secondary btn-sm"><a href="guest_book_form.php" class="text-white text-decoration-none">Go to Form</a></button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>