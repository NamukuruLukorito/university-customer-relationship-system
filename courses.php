<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>UniCare - University CRM System</title>
    <link rel="stylesheet" href="main.css">
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
         <!-- Course information table section -->
         <section id="course-information" class="course-information-section">
            <div class="course-information-container">
              <h2 class="course-information-heading">Course Information</h2>
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

                // Retrieve all courses;
                $courses = "SELECT * FROM courses";
                $result = mysqli_query($conn, $courses);
                

                // Add course
                if (isset($_POST['submit'])) {
                  $type = mysqli_real_escape_string($conn, $_POST['course_type']);
                  $name = mysqli_real_escape_string($conn, $_POST['course_name']);
                  $fee = mysqli_real_escape_string($conn, $_POST['fee_charge']);
                  $duration = mysqli_real_escape_string($conn, $_POST['duration']);
                  
                  $query = "INSERT INTO courses (course_type, course_name, fee_charge, duration) VALUES ('$type', '$name', '$fee', '$duration')";
                  
                  if (mysqli_query($conn, $query)) {
                      echo "Course added successfully";
                      header("Location: " . $_SERVER['PHP_SELF']);
                      exit();
                  } else {
                      echo "Error adding courses: " . mysqli_error($conn);
                  }
                }


                // Delete course
                if (isset($_POST['delete_course'])) {
                  $id = mysqli_real_escape_string($conn, $_POST['id']);
                  
                  $query = "DELETE FROM courses WHERE id = '$id'";
                  if (mysqli_query($conn, $query)) {
                      echo "Courses deleted successfully";
                      header("Location: " . $_SERVER['PHP_SELF']);
                      exit();
                  } else {
                      echo "Error deleting course: " . mysqli_error($conn);
                  }
                }
                
                mysqli_close($conn);
              ?>
                
                
              <div>
                
                <div style="">
                  <button type="button" class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                    Add Course
                  </button>
                </div>
                
                <table>
                  <thead>
                      <tr>
                          <th>Course Type</th>
                          <th>Course Name</th>
                          <th>Fee Charge</th>
                          <th>Duration</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <?php if (mysqli_num_rows($result) > 0) { ?>
                  <tbody>
                      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                      <tr>
                          <td><?php echo $row['course_type']; ?></td>
                          <td><?php echo $row['course_name']; ?></td>
                          <td><?php echo $row['fee_charge']; ?></td>
                          <td><?php echo $row['duration']; ?></td>
                          <td>
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                              <button style="background-color: lightpink; border: 1px solid lightgray; padding: 3px 13px" type="submit" name="delete_course">Delete</button>
                            </form>
                          </td>
                      </tr>
                      <?php } 
                    }
                    ?>
                  </tbody>
                </table>
                
                <!-- pop-up form to add course -->
                <div class="modal fade" id="addCourseModal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Course Information</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <form method="POST">
                        <label  class="form-label">Course Type</label>
                        <select class="form-select" aria-label="Default select example"  name="course_type">
                          <option selected>Select Course Type</option>
                          <option value="Certificate">Certificate</option>
                          <option value="Diploma">Diploma</option>
                          <option value="Bachelor">Bachelor</option>
                        </select>
                      
                        <label  class="form-label">Course Name</label>
                        <input class="form-control" type="text" id="name" name="course_name"><br>
                      
                        <label  class="form-label">Fee Charge</label>
                        <input class="form-control" type="number" id="fee" name="fee_charge"><br>

                        <label  class="form-label">Duration</label>
                        <input class="form-control" type="text" id="duration" name="duration"><br>
                      
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

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>