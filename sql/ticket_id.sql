select
    t.id
from
    lotteries l
    inner join draws d on l.id = d.lottery_id
    inner join tickets t on t.draw_id = d.id
where
    l.name = 'GG World X'
    and d.won_number = t.number


    -- id (12, 14, 17)