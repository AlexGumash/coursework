<div class="header">
  <div class="container container-header">

    <div class="container-title">
      <span class="title">Formula Student DataBase</span>
    </div>

    <div class="menu-container">
      <ul class="menu">
        <li class="menu-item">
          <a href="../index.php">
            <div class="menu-item-link">
              Сделать запрос
            </div>
          </a>
        </li>
        <?php
        if ($_SESSION['rights'] == 'moder' || $_SESSION['rights'] == 'admin') {
          ?>
          <li class="menu-item">
            <a href="../admin/admin.php">
              <div class="menu-item-link">
                Админинстрирование
              </div>
            </a>
          </li>
          <?php
        } else {
          ?>
          <li class="menu-item">
            <a href="../user/personal.php?content=about">
              <div class="menu-item-link">
                Личный кабинет
              </div>
            </a>
          </li>
          <?php
        }
        ?>
        <li class="menu-item">
          <a href="../entry.php">
            <div class="menu-item-link">
              <?php echo $_SESSION['login'] . "<span style='color: rgb(255, 229, 133); font-weight: bold'> Выход</span>"?>
            </div>
          </a>
        </li>

      </ul>
    </div>

  </div>
</div>
