<!DOCTYPE html>
<html>
  <head>
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
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
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
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
  </body>
</html>
