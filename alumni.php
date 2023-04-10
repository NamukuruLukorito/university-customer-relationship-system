<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>UniCare - University CRM System</title>
    <link rel="stylesheet" href="main.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>

  <body>
      <!-- Navigation bar -->
      <nav>
        <div class="nav-container">
          <h1 class="logo"><a href="homepage.html">UniCare</a></h1>
          <ul class="nav-links">
            <li><a href="dashboard.html">Dashboard</a></li>
            <li><a href="contacts.html">Contacts</a></li>
            <li><a href="http://localhost/virginia%20namukuru%20school%20project,css,html/courses.php">Courses</a></li>
            <!-- <li><a href="#communication">Jobs opportunities</a></li>
            <li><a href="#reporting">News</a></li>
            <li><a href="#integration">Meetings</a></li> -->
          </ul>
        </div>
      </nav>
      <section class="alumni">
<!-- 
        <div class="toggle-button">
          <button class="pl-3">Events</button>
          <button>Alumni</button>
        </div> -->

            <?php
              // Connect to the database
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "crm_project";

              $conn = mysqli_connect($servername, $username, $password, $dbname);

              // Check connection
              if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              }

              // Retrieve all alumni;
              $alumni = "SELECT * FROM alumni";
              $result = mysqli_query($conn, $alumni);
              

              // Add alumni
              if (isset($_POST['submit'])) {
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $admNo = mysqli_real_escape_string($conn, $_POST['adm_no']);
                $gradDate = mysqli_real_escape_string($conn, $_POST['graduation_date']);
                
                $query = "INSERT INTO alumni (name, adm_no, graduation_date) VALUES ('$name', '$admNo', '$gradDate')";
                if (mysqli_query($conn, $query)) {
                    echo "Alumni added successfully";
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                } else {
                    echo "Error adding alumni: " . mysqli_error($conn);
                }
              }

              // Delete alumni
              if (isset($_POST['delete_alumni'])) {
                $id = mysqli_real_escape_string($conn, $_POST['id']);
                
                $query = "DELETE FROM alumni WHERE id = '$id'";
                if (mysqli_query($conn, $query)) {
                    echo "Alumni deleted successfully";
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                } else {
                    echo "Error deleting alumni: " . mysqli_error($conn);
                }
              }
              
              mysqli_close($conn);
            ?>
              
              
            <div class="mt-3">
              <h2>Alumni Registry</h2>
              
              <div style="">
                <button type="button" class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#addAlumniModal">
                  Add Alumni
                </button>
              </div>
              
              <table>
                <thead>
                    <tr>
                        <th>ADM No.</th>
                        <th>Full Name</th>
                        <th>Graduation Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php if (mysqli_num_rows($result) > 0) { ?>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['adm_no']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['graduation_date']; ?></td>
                        <td>
                          <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button style="background-color: lightpink; border: 1px solid lightgray; padding: 3px 13px" type="submit" name="delete_alumni">Delete</button>
                          </form>
                        </td>
                    </tr>
                    <?php } 
                  }
                  ?>
                </tbody>
              </table>
              
              <div class="modal fade" id="addAlumniModal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Alumni Information</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="POST">
                      <label  class="form-label" for="name">Name</label>
                      <input class="form-control" type="text" id="name" name="name"><br>
                    
                      <label  class="form-label" for="adm_no">Admission Number</label>
                      <input class="form-control" type="text" id="adm_no" name="adm_no"><br>
                    
                      <label  class="form-label" for="graduation_date">Graduation Dates</label>
                      <input class="form-control" type="date" id="graduation_date" name="graduation_date"><br>
                    
                      <input type="submit" name="submit" value="Submit">
                    </form>         
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        <div class="mt-5">
          <h2>University Courses Alumni Events</h2>
          <table>
            <thead>
              <tr>
                <th style="background-color: lightpink;">Date</th>
                <th style="background-color: lightpink;">Event</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>January 12, 2023</td>
                <td>Networking Night</td>
              </tr>
              <tr>
                <td>February 14, 2023</td>
                <td>Valentine's Day Mixer</td>
              </tr>
              <tr>
                <td>March 17, 2023</td>
                <td>St. Patrick's Day Social</td>
              </tr>
              <tr>
                <td>April 22, 2023</td>
                <td>Earth Day Celebration</td>
              </tr>
              <tr>
                <td>May 20, 2023</td>
                <td>Spring Fling BBQ</td>
              </tr>
              <tr>
                  <td>May 21, 2023</td>
                  <td>Spring Fling BBQ 2</td>
                </tr>
              <tr>
                <td>June 18, 2023</td>
                <td>Alumni Golf Tournament</td>
              </tr>
              <tr>
                <td>July 4, 2023</td>
                <td>Independence Day Picnic</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
   <!-- Footer -->
   <footer>
    <div class="footer-container">
      <ul class="footer-links">
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms of Use</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </div>
  </footer>

  
  <script>
  
  </script> 

  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>


