<!DOCTYPE html>
<html lang="en">

<?php require_once INCLUDE_PATH . "css.php"; ?>

<body class="bg-gradient-primary">

  <div class="container" id="app">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Авмторизуйтесь!</h1>
                  </div>
                  <div class="alert alert-danger" v-if="errorMsg">{{ errorMsg }}</div>
                  <div class="alert alert-success" v-if="successMsg">{{ successMsg }}</div>
                  <form class="user" onsubmit="return false;">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="login" v-model="userInfo.login" placeholder="Введите логин..." required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" v-model="userInfo.password" placeholder="Введите пароль..." required>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" @click="auth();">Войти</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <?php require_once INCLUDE_PATH . "js.php"; ?>
  <script src="/libraries/axios.min.js"></script>
  <script src="/libraries/vue.js"></script>
  <script src="/assets/admin/js/vue/login.js"></script>

</body>

</html>
