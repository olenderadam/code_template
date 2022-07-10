select
    name,
    sum(l.ticket_price) przychod,
    sum(
        case
            when d.draw_date >= t.bought_date then l.ticket_price
        end
    ) zysk
from
    lotteries l
    inner join draws d on l.id = d.lottery_id
    inner join tickets t on t.draw_id = d.id
where
    l.name = 'GG World X'
    and d.won_number = t.number -- and draw_date>=bought_date
group by
    l.name;

    /*
    name, przychod, zysk
    'GG World X', '38.97', '25.98'
    */