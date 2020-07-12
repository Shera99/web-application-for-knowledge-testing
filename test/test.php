<?php 
require_once "controllers/testController.php";

if ( $_SESSION['test_in'] ) { 
    unset($_SESSION['test_in']);
    header("Location: /test/");
}

if ( empty($_SESSION['userName']) && empty($_SESSION['testName']) ) header("Location: /test/");

if (!empty($_GET['test'])) {
    $testid = (int) trim($_GET['test']);
}

//$test = new TestController();
$result = getAllTestData($testid);

$pagination = pagination($_SESSION['countQues'], $result);

$i = 10000;
$num_ques = 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="/assets/test/css/style.css">
	<!-- Custom styles for this template -->
	<link href="/assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <title>Тестирование</title>
</head>
<body style="background-color: #4D4949;">
    
    <div class="card mb-10">
        <div class="card-header">
            <strong>Тестирование</strong>
            <div id="countdown" class="countdown">
                <div class="countdown-number" data-id="<?php echo $_SESSION['countTime']; ?>">
                    <span class="minutes countdown-time"></span>
                    <span class="seconds countdown-time"></span>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="header-item"><strong>ФИО:</strong></div>
            <div class="header-item"><?php echo $_SESSION['userName']; ?></div>
            <div class="header-item"><strong>Тест:</strong></div>
            <div class="header-item"><?php echo $_SESSION['testName']; ?></div>
            <div class="header-item"><strong>Кол-во вопросов:</strong></div>
            <div class="header-item"><?php echo $_SESSION['countQues']; ?></div>
            <div class="header-item"><strong>Кол-во баллов:</strong></div>
            <div class="header-item"><?php echo $_SESSION['countPoint']; ?></div>
        </div>
        <div id="result-test">
            <hr>
            <div>
                <ul>
                    <li><h1>Результат:</h1></li>
                    <li style="float: right;color:#4CAF50;margin-right: 40px;" id="result-test-point"><h1></h1></li>
                </ul>
            </div>
            <div class="col-lg-12" style="float: right;">
                <button style="float: right;" class="btn btn-primary btn-block" onclick="outInTest();">Вернутся</button>
            </div>
        </div>
        
    </div>
    <div class="card mb-10" id="test-body">
        <div class="card-body">
            <?php foreach ($result as $id_question => $item) { ?>
                <div class="body-card" id="question-<?php echo $id_question; ?>" data-id="<?php echo $id_question; ?>">
                    <div class="grid-body">
                        <?php 
                        $num_ques++;
                        foreach ($item as $id_answer => $answer) { ?>
                            
                            <?php if (!$id_answer) { ?>
                                <div class="grid-header">
                                    <label class="question"><?php echo $num_ques . ".  " . $answer; ?></label>  
                                </div>
                            <?php } else { 
                                    asort($answer);
                                    reset($answer);
                                    $i++;
                                    $answer[$i] = "";
                                    $i++;
                                    $answer[$i] = "";
                                ?>
                                <?php foreach ($answer as $id_answer_item => $answer_item) {
                                    if (!empty($answer_item)) { ?>
                                    <div class="item">
                                        <label for="answer-<?php echo $id_answer_item; ?>">
                                            <input type="radio" name="question-<?php echo $id_question; ?>" id="answer-<?php echo $id_answer_item; ?>" value="<?php echo $id_answer_item; ?>">
                                            <?php echo $answer_item; ?>
                                        </label>
                                    </div>
                                <?php } else { ?>
                                <div class="item">
                                </div>
                                <?php } //else ?>
                            <?php } // 3 - foreach 
                            }//else?>
                            
                        <?php } // 2 - foreach ?>
                    </div>
                </div>
            <?php } // 1 - foreach ?>
        </div>
        <?php echo $pagination; ?>
        <span class="none" id="test-id"><?php echo $testid; ?></span>
        <hr>
        <div class="col-lg-6 test-end">
            <button class="btn btn-primary btn-block" id="btn">Закончить тест</button>
        </div>
    </div>
    <script src="/libraries/axios.min.js"></script>
    <script src="/assets/admin/js/jquery.min.js"></script>
    <script src="/assets/test/js/script.js"></script>
</body>
</html>