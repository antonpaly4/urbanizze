<?php
$this->title = 'URBANIZZE | Admin | Events';
?>
<section class="content">
    <div class="card events_list">
        <div class="events_list__add">
            <a class="events_list__add-btn" href="/admin/event">добавить</a>
        </div>
        <?php foreach($events as $event):?>
        <div class="events_list__event">
            <div class="events_list__event-image">
                <img src="../public/img/label-ea.jpg" alt="Event Name"/>
            </div>
            <div class="events_list__event-title">
                <a href="/events/<?=$event['id']?>"><?=$event['name']?></a>
            </div>
            <div class="events_list__event-date"><?=date('d.m.Y', strtotime($event['startDate']))?></div>
            <div class="events_list__event-stats">
                <span class="events_list__event-stats__item events_list__event-stats__item-views">100</span><br/>
                <span class="events_list__event-stats__item events_list__event-stats__item-likes">100</span>
            </div>
            <div class="events_list__event-actions">
                <a class="events_list__event-actions__btn events_list__event-actions__btn-statistic" href="#"></a>
                <a class="events_list__event-actions__btn events_list__event-actions__btn-edit" href="/admin/event/<?=$event['id']?>"></a>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</section>