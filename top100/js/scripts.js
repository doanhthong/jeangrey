jQuery(document).ready(function() {
    function startTimer(nextDay, display, callback) {
        var timeInterval = setInterval(function() {
            var now = moment();
            var diff = moment.duration(nextDay - now);
            var diffAsSeconds = Math.floor(diff.asSeconds());
            $(display).html(renderTimebox(diff.days(), 'DAYS') + renderTimebox(diff.hours(), 'HOURS') + renderTimebox(diff.minutes(), 'MINUTES') + renderTimebox(diff.seconds(), 'SECONDS'));

            if (diffAsSeconds <= 0) {
                clearInterval(timeInterval);
                callback();
            }
        }, 1000);
    }

    var nextDay = moment('2017/12/10 02:57:59');
    var display = $('#time-countdown');
    
    startTimer(nextDay, display, function() {
        alert('Go!');
    });

    function renderTimebox(number, text) {
        var numberInString = number.toString();
        numberInString = number < 10 ? '0' + numberInString : numberInString;
        var digits = numberInString.split("");
        var html = '';
        for (var index = 0; index < digits.length; index++) {
            html += '<span>' + digits[index] + '</span>';
        }
        html += '<div>' + text + '</div>';
        return '<div class="timebox">' + html + '</div>';
    }

    var viz = false;

    $(document).click(function(e) {
        if (viz) {
            if (!$(event.target).closest('.location-detail').length) {
                $('.location-detail').fadeOut(500);
                viz = false;
            }
        }
    });

    $('.location').click(function(e) {
        $('.location-detail').fadeIn(500, function() { viz = true; });
    })
});