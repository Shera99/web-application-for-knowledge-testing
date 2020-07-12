<div class="modal fade" id="addNewTest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     	<div class="modal-content">
        	<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Добавить новый тест</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
        	</div>
        	<form v-on:submit.prevent="setNewTest();">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" style="font-size: 15px;" v-model:trim="arrNewTest.testName" placeholder="Название теста..." required minlength="3">
					</div>
					<div class="form-group">
						<input type="number" class="form-control" style="font-size: 15px;" v-model:number="arrNewTest.countQuesTest" placeholder="Кол-во вопросов..." required min="10" max="500">
					</div>
					<div class="form-group">
						<input type="number" class="form-control" style="font-size: 15px;" v-model:number="arrNewTest.countPointTest" placeholder="Кол-во баллов..." required min="5" max="250">
					</div>
					<div class="form-group">
						<input type="number" class="form-control" style="font-size: 15px;" v-model:number="arrNewTest.timeTest" placeholder="Время в мин...." required min="10" max="99">
					</div>
					<div class="form-group">
						<label for="time-start">Дата и время начала теста</label>
						<input type="datetime-local" class="form-control" v-model="arrNewTest.dateStartTest" id="time-start" required>
					</div>
					<div class="form-group">
						<label for="time-end">Дата и время конца теста</label>
						<input type="datetime-local" class="form-control" v-model="arrNewTest.dateEndTest" id="time-end" required>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary btn-user btn-block">Добавить</button>
				</div>
			</form>
      	</div>
   	</div>
</div>
