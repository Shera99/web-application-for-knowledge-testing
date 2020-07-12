$(function(){
    $('.card-body').find('div:first').show();

    var countPage = $('#quesNext').attr('class');
    for (let i = 6; i <= countPage; i++){
        $('#'+i).css("display", "none");
        $('#'+i).addClass("none");
    }

    var endTestTimeMin = 0;
    var endTestTimeSec = 0;
//----------------------------------- Конец теста -------------------------------------//

    function endTest() {
        var test = +$('#test-id').text();
        var res = {'test':test};

        $('.body-card').each(function(){
            var id = $(this).data('id');
            res[id] = $('input[name=question-'+id+']:checked').val();
        });

        res['testTime'] = endTestTimeMin + ' мин : ' + endTestTimeSec + ' сек';

        var formData = toFormData(res);

        axios
            .post("http://test/test/controllers/testController.php", formData)
            .then(function(response){
                if(response.data.error){
                    alert(response.data.message);
                } else {
                    console.log(response.data);
                    $('#test-body').fadeOut(100, function(){
                        $('#result-test').show();
                    });
                    $('#test-body').remove();
                    $('#countdown').remove();
                    var result = response.data.count_point + " балл";
                    $('#result-test-point > h1').html(result);
                }
            })
            .catch(error => console.log(error));
    }

    function toFormData(obj){
        var fd = new FormData();
        for (var i in obj) {
            fd.append(i, obj[i]);
        }
        return fd;
    }

    $('#btn').click(function(){
        endTest();
    });

//----------------------------------- Конец теста -------------------------------------//

//------------------------------------ Таймер -----------------------------------------//
    function getTimeRemaining(endtime) { // функция для инициализации времени
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        if (endTestTimeSec == 60) {
            endTestTimeMin++;
            endTestTimeSec = 0;
        } else endTestTimeSec++;
        return {
          'total': t,
          'minutes': minutes,
          'seconds': seconds
        };
    }
     
    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() { // функция для обновления счетчика в HTML
            var t = getTimeRemaining(endtime);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
            if (t.total <= 0) {
                clearInterval(timeinterval);
                endTest();
            }
        }  

        updateClock();
        var timeinterval = setInterval(updateClock, 1000); // вызов функции каждую 1-секунду 
    }

    var time = $('.countdown-number').attr('data-id');
    time = parseInt(time);
    var deadline = new Date(Date.parse(new Date()) + time * 60 * 1000); // Задаем время для обратного отсчета
    initializeClock('countdown', deadline); // вызов функции для инициализации
//------------------------------------ Таймер -----------------------------------------//
    function fade(page, linkpage) {
        $(page).fadeOut(200, function(){
            $(linkpage).show();
        });
    }
    // Функция для перехода на следующую страницу через >> <<
    function nextPrev(page) {
        var pageActive = $('.pagination > a.active').attr('href');
        var linked = $('#'+page).attr('href');
        //var linked = $('.pagination > a:contains("'+page+'")').attr('href');
        if (linked) {
            $('.pagination > a.active').removeClass('active');
            $('#'+page).addClass('active');

            fade(pageActive, linked);
        }
        return false;
    }
    // Функция для отображения и скрытия кнопок пагинации
    function paginationBlockNone(page, display1, display2, p){
        if( page == 5 || page == 9 || page == 13 || page == 17 || page == 21 || page == 25 || page == 29 || page == 33 || page == 37 || page == 41 ){
            var pageNum = parseInt(page);
            var numPagePrev = pageNum - 4;
            for (let i = numPagePrev; i <= pageNum; i++) {
                $('#'+i).css("display", display1);
                $('#'+i).removeClass(display2);
                $('#'+i).addClass(display1);
            }
            var numPageNext = pageNum + 4;
            var pagePrev = pageNum + p;
            for (let i = pagePrev; i <= numPageNext; i++) {
                $('#'+i).css("display", display2);
                $('#'+i).removeClass(display1);
                $('#'+i).addClass(display2);
            }
        }
    }

    $('.pagination a').on('click', function(){ // при нажатии на номер страницы
        if ( $(this).attr('class') == 'active' ) return false;
        if ( $(this).attr('id') == 'quesNext') return false;
        if ( $(this).attr('id') == 'quesPrev') return false;

        var numPage = $(this).attr('id');
        if( numPage == 5 || numPage == 9 || numPage == 13 || numPage == 17 || numPage == 21 || numPage == 25 || numPage == 29 || numPage == 33 || numPage == 37 || numPage == 41 ){
            var checkPage = parseInt(numPage);
            checkPage++;
            if ( $(this).attr('class') == 'block active' ) {
                return false;
            } else {
                if ( $('.pagination a#'+checkPage).attr('class') == 'none' ){
                    var prew = 'none';
                    var next = 'block';
                    paginationBlockNone(numPage, prew, next, 0);
                } else {
                    if ( numPage >= 1) {
                        var prew = 'block';
                        var next = 'none';
                        paginationBlockNone(numPage, prew, next, 1);
                    }
                }
            }
        }

        var link = $(this).attr('href');
        var pageActive = $('.pagination > a.active').attr('href'); // ссылка на id активной вкладки
        
        $('.pagination > a.active').removeClass('active');
        $(this).addClass('active');

        fade(pageActive, link);

        return false;
    });

    $('#quesNext').on('click', function(){
        var prew = 'none';
        var next = 'block';
        var numPage = $('.pagination > a.active').attr('id');
        var vremPer = parseInt(numPage) + 1;
        if( numPage == 5 || numPage == 9 || numPage == 13 || numPage == 17 || numPage == 21 || numPage == 25 || numPage == 29 || numPage == 33 || numPage == 37 || numPage == 41 ){
            if ($('.pagination a#'+vremPer).attr('class') == 'none') paginationBlockNone(numPage, prew, next, 0);
            numPage++;
        } else {
            numPage++;
            paginationBlockNone(numPage, prew, next, 0);
        }
        nextPrev(numPage);
    });

    $('#quesPrev').on('click', function(){
        var prew = 'block';
        var next = 'none';
        var numPage = $('.pagination > a.active').attr('id');
        var vremPer = numPage - 1;
        if ( numPage == 0) return false;

        if( numPage == 5 || numPage == 9 || numPage == 13 || numPage == 17 || numPage == 21 || numPage == 25 || numPage == 29 || numPage == 33 || numPage == 37 || numPage == 41 ){
            if ($('.pagination a#'+vremPer).attr('class') == 'none') paginationBlockNone(numPage, prew, next, 1);
            numPage--;
        } else {
            numPage--;
            paginationBlockNone(numPage, prew, next, 1);
        }
        nextPrev(numPage);
    });
});

function outInTest(){
    location.href = "http://test/test/";
}