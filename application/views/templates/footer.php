  <footer>
    Copyright &copy; Hanjae Lee. 2024 All Rights Reserved.
  </footer>

  <script src="https://kit.fontawesome.com/bacab07d7b.js" crossorigin="anonymous"></script>
  <script type="module" src="/static/js/constants.js"></script>
  <script type="module" src="/static/js/utils.js"></script>
  <script type="module" src="/static/js/user/logout.js"></script>
  <?php
  $path = explode('/', $_SERVER['REQUEST_URI'])[1]
  ?>
  <?php
  if ($path === 'register') {
  ?>
  <script type="module" src="/static/js/user/register.js"></script>
  <?php
  }
  ?>
  <?php
  if ($path === 'login') {
  ?>
  <script type="module" src="/static/js/user/login.js"></script>
  <?php
  }
  ?>
  </body>

  </html>