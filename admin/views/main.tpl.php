<!DOCTYPE html>
<html lang="en">

<?php require_once INCLUDE_PATH . "css.php"; ?>

<body id="page-top">
  <div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">

        <?php require_once INCLUDE_PATH . "header_top.php"; ?>

        <div class="container-fluid" id="app">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $pageData['title']; ?></h1>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="float: left;">Таблица тестов</h6>
              <a href="#" style="float: right;" data-toggle="modal" data-target="#addNewTest">
                <h6 class="font-weight-bold text-primary">Добавить тест</h6>
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Название теста</th>
                      <th>Кол-во вопросов</th>
                      <th>Кол-во баллов</th>
                      <th>Время в мин.</th>
                      <th>Начало теста</th>
                      <th>Конец теста</th>
                      <th>Действие</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Название теста</th>
                      <th>Кол-во вопросов</th>
                      <th>Кол-во баллов</th>
                      <th>Время в мин.</th>
                      <th>Начало теста</th>
                      <th>Конец теста</th>
                      <th>Действие</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr v-for="item in arrTests">
                      <td><a href="/admin/cabinet/questions?id=">{{ item.name }}</a></td>
                      <td>{{ item.count_question }}</td>
                      <td>{{ item.count_point }}</td>
                      <td>{{ item.count_time }}</td>
                      <td>{{ item.date_start_test  }}</td>
                      <td>{{ item.date_end_test  }}</td>
                      <td>
                        <button class="btn btn-success" v-on:click="showEditForm(item.id);">Изменить</button> | 
                        <button class="btn btn-danger" v-on:click="showDelForm(item.id);">Удалить</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <?php 
          require_once VIEW_PATH . "main/main.add.tpl.php";
          require_once VIEW_PATH . "main/main.edit.tpl.php"; 
          ?>
        </div>
      </div>
    </div>
  </div>

  <?php require_once INCLUDE_PATH . "modal_logout.php"; ?>
  <?php require_once INCLUDE_PATH . "js.php"; ?>
  <script src="/libraries/axios.min.js"></script>
  <script src="/libraries/vue.js"></script>
  <script src="/assets/admin/js/vue/tests.js"></script>

</body>

</html>