  <footer>
    Copyright &copy; Hanjae Lee. 2024 All Rights Reserved.
  </footer>

  <script src="https://kit.fontawesome.com/bacab07d7b.js" crossorigin="anonymous"></script>
  <?php
  $path = explode('/', $_SERVER['REQUEST_URI'])[1];
  if ($path === 'register' || $path === 'login') {
  ?>
    <script src="/static/js/user.js"></script>
  <?php
  }
  ?>
  </body>

  </html>