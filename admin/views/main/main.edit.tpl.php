<div id="overlay" v-if="showEdit">
   <div class="modal-dialog">
     	<div class="modal-content">
        	<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Изменить данный тест</h5>
				<button class="close" type="button" aria-label="Close" v-on:click="showEdit = false">
					<span aria-hidden="true">×</span>
				</button>
        	</div>
        	<form v-on:submit.prevent="updateTestById();">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" style="font-size: 15px;" v-model:trim="arrUpdateTest.name" placeholder="Название теста..." required minlength="3">
					</div>
					<div class="form-group">
						<input type="number" class="form-control" style="font-size: 15px;" v-model:number="arrUpdateTest.count_question" placeholder="Кол-во вопросов..." required min="10" max="500">
					</div>
					<div class="form-group">
						<input type="number" class="form-control" style="font-size: 15px;" v-model:number="arrUpdateTest.count_point" placeholder="Кол-во баллов..." required min="5" max="250">
					</div>
					<div class="form-group">
						<input type="number" class="form-control" style="font-size: 15px;" v-model:number="arrUpdateTest.count_time" placeholder="Время в мин...." required min="10" max="99">
					</div>
					<div class="form-group">
						<label for="time-start">Дата и время начала теста</label>
						<input type="datetime-local" class="form-control" v-model="arrUpdateTest.date_start_test" id="time-start" required>
					</div>
					<div class="form-group">
						<label for="time-end">Дата и время конца теста</label>
						<input type="datetime" class="form-control" v-model="arrUpdateTest.date_end_test" id="time-end" required>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary btn-user btn-block">Добавить</button>
				</div>
			</form>
      	</div>
   	</div>
</div>