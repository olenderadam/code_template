


let draws = new Date('2022-07-11 20:50:00')

setInterval(() => {

    let time_dif = draws.getTime() - Date.now();
    let days = parseInt(time_dif / 1000 / 60 / 60 / 24);
    let hours = parseInt((time_dif / 1000 / 60 / 60) % 24);
    let minutes = parseInt((time_dif / 1000 / 60) % 60);
    let seconds = parseInt((time_dif / 1000) % 60);


    if (seconds >= 0)
        $('#counter_seconds').html(seconds);
    if (minutes >= 0)
        $('#counter_minutes').html(minutes);
    if (hours >= 0)
        $('#counter_hours').html(hours);
    if (days >= 0)
        $('#counter_days').html(days);
    if (days > 0) {
        $('.card-days').show();
        $('.card-seconds').hide();
    } else {
        $('.card-days').hide();
        $('.card-seconds').show();

    }
    $('.divider').hide();
    //$('.body-counter').hide();
    
    setTimeout(() => {
        $('.divider').show();
        //$('.body-counter').show();
    }, 200);

}, 1000)