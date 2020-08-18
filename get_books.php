<?php
	require_once "config.php";

	$id = $_POST['id'];
  $dep = $_POST['dep'];
  $sem = $_POST['sem'];

	$query = "SELECT title, ISBN, image FROM books WHERE ISBN IN (SELECT ISBN FROM course_books WHERE course_id ='$id')";

	// connect to db
    if(($conn=new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME))->connect_error) die($conn->connect_error);

    if(!($result = $conn->query($query))) die($conn->error);

    $final['result'] = '<form id="bookOptions">';

    for ($i=0; $i < $result->num_rows; $i++) {
      $row = $result->fetch_assoc();

    	$final['result'] .= '<div class="col-xs-3 card-container">
          <div class="card">
            <img class="card-img-top" src="'.$row['image'].'" alt="">
            <div class="card-body">
              <p class="card-text">'.$row['title'].'</p>
            </div>
            <div class="card-footer">
            <input type="hidden" id="sem" name="sem" value="'.$sem.'">
            <input type="radio" id="option" name="isbn" value="'.$row['ISBN'].'" checked>
            </div>
          </div>
        </div>';
    }

    $final['result'] .= '<input type="submit" id="appBtn" value="Προσθήκη Συγγράμματος" /></form>';

    $final['result'].= '<div  class="col-xs-3 card-container">
          <div class="card">
          <img class="card-img-top" src="img/chevron-left.svg" alt="">
      <div class="card-body">
              <p class="card-text">Ολοκλήρωση Δήλωσης</p>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary" onclick="apply()">
            </div>
          </div>
        </div>';

    echo json_encode($final);

    mysqli_close($conn);
?>
