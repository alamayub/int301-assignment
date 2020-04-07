<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ThoughtsMaker - Users</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <div class="main-container">
    <header>
      <h1>ThoughtsMaker Users Details</h1>
    </header>
    <section>
      <?php
        if(isset($_SESSION['message'])) {
          echo "<div class='alert'>";
          echo $_SESSION['message'];
          echo "</div>";
          unset($_SESSION['message']);
        }
      ?>
      <div class="data">
        <button class="tablinks" id="s" onclick="openCity(event, 'Show')">Show Data</button>
        <button class="tablinks" id="a" onclick="openCity(event, 'Add')">Add Data</button>
      </div>

      <div id="Show" class="tabcontent">
        <table>
          <tr>
            <th>ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Email</th>
            <th>Image</th>
          </tr>

          <?php 
            $conn = mysqli_connect('localhost', 'root', '', 'int301') or die('Database error');
            $sql = "select * from data order by last_name desc";
            $result = mysqli_query($conn, $sql);
            $i = 1;
            while($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?php echo $i; ?>.</td>
            <td><?php echo $row['last_name']; ?></td>
            
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><img src="<?php echo 'uploaded_image/'.$row['image']; ?>"></td>
          </tr>
          <?php $i += 1;} mysqli_close($conn); ?>

        </table>
      </div>

      <div id="Add" class="tabcontent" style="max-width: 800px; margin: auto;">

        <form class="needs-validation" novalidate method="post" action="action.php" enctype="multipart/form-data">

              <div class="form-row mb-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="fn_icon">
                      <i class="fa fa-user icon"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="first_name" placeholder="Firste Name" aria-describedby="fn_icon" required>
                  <div class="invalid-feedback">Please enter first name.</div>
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>

              <div class="form-row mb-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="fn_icon">
                      <i class="fa fa-user icon"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="last_name" placeholder="Last Name" aria-describedby="fn_icon" required>
                  <div class="invalid-feedback">Please enter first name.</div>
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>

              <div class="form-row">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="fn_icon">
                      <i class="fa fa-envelope icon"></i>
                    </span>
                  </div>
                  <input type="email" class="form-control" name="email" placeholder="Email" aria-describedby="fn_icon" required>
                  <div class="invalid-feedback">Please enter email name.</div>
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>

              

              

              <div class="custom-file mt-3">
                <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" accept="image/*" required>
                <label class="custom-file-label" for="validatedCustomFile">Choose image file...</label>
                <div class="invalid-feedback">Please choose an image file.</div>
                <div class="valid-feedback">Looks good!</div>
              </div>
              <button class="btn sbtn mt-3" type="submit" name="submit">Add Member</button>
        </form>

      </div>

    </section>
    <footer>
      <p>All rights reserved. @ThoughtsMaker 2020</p>
    </footer>
  </div>

  <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

  <script type="text/javascript">

    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body>
</html>