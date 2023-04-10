<!DOCTYPE html>
<html>
  <head>
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  </head>

  <body>
    <nav>
        <div class="nav-container">
          <h1 class="logo">UniCare</h1>
          <ul class="nav-links">
            <li><a href="dashboard.html">Dashboard</a></li>
            <li><a href="contacts.html">Contacts</a></li>
            <li><a href="#tasks">Courses</a></li>
            <!-- <li><a href="#communication">Jobs opportunities</a></li>
            <li><a href="#reporting">News</a></li>
            <li><a href="#integration">Meetings</a></li> -->
          </ul>
        </div>
      </nav>
      <div class="form-container">
        <h1>Sign up</h1>

        <form action="process-signup.php" method="POST">
          <label class="form-label" >Name:</label>
          <input class="form-control" type="text" name="name" required><br><br>
          <label class="form-label" >Email:</label>
          <input class="form-control" type="email" name="email" required><br><br>
          <label class="form-label" >Password:</label>
          <input class="form-control" type="password" name="password" required><br><br>

          <button type="submit">Sign up</button>
        </form>
      </div>


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
