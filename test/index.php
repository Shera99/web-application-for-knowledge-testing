<?php 
session_start();
unset($_SESSION['test_in']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
	<!-- Custom styles for this template -->
	<link href="/assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
   <title>Регистрация</title>
</head>
<body>
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
										<h1 class="h4 text-gray-900 mb-4">Вход в тестирование</h1>
									</div>
									<div class="alert alert-danger" v-if="errorMsg">{{ errorMsg }}</div>
									<div class="alert alert-success" v-if="successMsg">{{ successMsg }}</div>
									<form onsubmit="return false;">
										<div class="form-group">
											<input type="text" class="form-control" style="font-size: 15px;" v-model="info.fio" placeholder="Введите ФИО..." required minlength="13">
										</div>
										<div class="form-group">
											<select class="form-control custom-select" style="font-size: 15px;" v-model="info.testid">
												<option disabled selected>Выберите тест</option>
												<option v-for="item in items" v-bind:value="item.id">{{item.name}}</option>
											</select>
										</div>
										<button class="btn btn-primary btn-user btn-block" @click="registerUser();">Пройти тест</button>
									</form>
                    		</div>
                		</div>
               	</div>
            	</div>
            </div>
        	</div>
      </div>
   </div>

   <script src="/libraries/axios.min.js"></script>
   <script src="/libraries/vue.js"></script>
   <script src="/assets/test/js/login.js"></script>
</body>
</html>