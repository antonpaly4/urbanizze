<?php
$this->title = 'URBANIZZE | Admin | Events';
?>
<section class="content">
<div class="card event_edit">
<form class="event_edit__form" action="/admin/eventsave" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?=isset($event['id']) ? $event['id'] : ''?>">
<label for="name">Название
    <input name="name" id="name" type="text" class="event_edit__form-input" value="<?=isset($event['name']) ? $event['name'] : ''?>"/>
</label>
<label for="link">Ссылка
    <input name="link" id="link" type="text" class="event_edit__form-input" value="<?=isset($event['link']) ? $event['link'] : ''?>"/>
</label>
<label for="category">Категория
    <select name="category" id="category" class="event_edit__form-select"/>
    <option value="1" <?=isset($event['category']) && $event['category'] == 1 ? 'selected' : ''?>>Category 1</option>
    <option value="2" <?=isset($event['category']) && $event['category'] == 2 ? 'selected' : ''?>>Category 2</option>
    <option value="3" <?=isset($event['category']) && $event['category'] == 3 ? 'selected' : ''?>>Category 3</option>
    </select>
</label>
<div class="event_edit__form-row">
    <textarea name="description" id="description" class="event_edit__form-text"><?=isset($event['description']) ? $event['description'] : ''?></textarea>
    <div class="event_edit__form-label">Описание</div>
</div>
<label for="address">Адрес
    <input name="address" id="address" type="text" class="event_edit__form-input" value="<?=isset($event['address']) ? $event['address'] : ''?>"/>
</label>
<div class="event_edit__form-row">
<div class="event_edit__form-time">
<span class="event_edit__form-time__label event_edit__form-time__label-required">Начало</span>
<div class="event_edit__form-time_pick">
    <select name="startDate">
        <?php for($i = 1; $i < 32; $i++):?>
        <option value="<?=$i?>" <?=(isset($event['startDate']) && $i == date('d', strtotime($event['startDate']))) ? 'selected="selected"' : ''?>><?=$i?></option>
        <?php endfor;?>
    </select>
    <select name="startMonth">
        <option value="1" <?=isset($event['startDate']) && 1 == date('m', strtotime($event['startDate'])) ? 'selected' : ''?>>января</option>
        <option value="2" <?=isset($event['startDate']) && 2 == date('m', strtotime($event['startDate'])) ? 'selected' : ''?>>февраля</option>
        <option value="3" <?=isset($event['startDate']) && 3 == date('m', strtotime($event['startDate'])) ? 'selected' : ''?>>марта</option>
        <option value="4" <?=isset($event['startDate']) && 4 == date('m', strtotime($event['startDate'])) ? 'selected' : ''?>>апреля</option>
        <option value="5" <?=isset($event['startDate']) && 5 == date('m', strtotime($event['startDate'])) ? 'selected' : ''?>>мая</option>
        <option value="6" <?=isset($event['startDate']) && 6 == date('m', strtotime($event['startDate'])) ? 'selected' : ''?>>июня</option>
        <option value="7" <?=isset($event['startDate']) && 7 == date('m', strtotime($event['startDate'])) ? 'selected' : ''?>>июля</option>
        <option value="8" <?=isset($event['startDate']) && 8 == date('m', strtotime($event['startDate'])) ? 'selected' : ''?>>августа</option>
        <option value="9" <?=isset($event['startDate']) && 9 == date('m', strtotime($event['startDate'])) ? 'selected' : ''?>>сентября</option>
        <option value="10" <?=isset($event['startDate']) && 10 == date('m', strtotime($event['startDate'])) ? 'selected' : ''?>>октября</option>
        <option value="11" <?=isset($event['startDate']) && 11 == date('m', strtotime($event['startDate'])) ? 'selected' : ''?>>ноября</option>
        <option value="12" <?=isset($event['startDate']) && 12 == date('m', strtotime($event['startDate'])) ? 'selected' : ''?>>декабря</option>
    </select>
    <select name="startYear">
        <?php for($i = date('Y'); $i < date('Y') + 5; $i++):?>
            <option value="<?=$i?>" <?=isset($event['startDate']) && $i == date('Y', strtotime($event['startDate'])) ? 'selected' : ''?>><?=$i?></option>
        <?php endfor;?>
    </select>
    <span>&mdash;</span>
    <select name="startHour">
        <option value="00" selected>00</option>
        <option value="01" >01</option>
        <option value="02" >02</option>
        <option value="03" >03</option>
        <option value="04" >04</option>
        <option value="05" >05</option>
        <option value="06" >06</option>
        <option value="07" >07</option>
        <option value="08" >08</option>
        <option value="09" >09</option>
        <option value="10" >10</option>
        <option value="11" >11</option>
        <option value="12" >12</option>
        <option value="13" >13</option>
        <option value="14" >14</option>
        <option value="15" >15</option>
        <option value="16" >16</option>
        <option value="17" >17</option>
        <option value="18" >18</option>
        <option value="19" >19</option>
        <option value="20" >20</option>
        <option value="21" >21</option>
        <option value="22" >22</option>
        <option value="23" >23</option>
    </select>
    <span>:</span>
    <select name="startMinutes">
        <option value="00" selected>00</option>
        <option value="05" >05</option>
        <option value="10" >10</option>
        <option value="15" >15</option>
        <option value="20" >20</option>
        <option value="25" >25</option>
        <option value="30" >30</option>
        <option value="35" >35</option>
        <option value="40" >40</option>
        <option value="45" >45</option>
        <option value="50" >50</option>
        <option value="55" >55</option>
    </select>
</div>
<div class="js-box">
    <div class="event_edit__form-time__label">
        Окончание <a class="event_edit__form-time__delete js-delete-removable" href="#">удалить</a>
    </div>
    <a href="#" class="js-show-hidden">Добавить дату окончания</a>
    <div class="event_edit__form-time_pick invisible js-hidden js-removable">
        <select name="endDate">
            <option selected>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>21</option>
            <option>22</option>
            <option>23</option>
            <option>24</option>
            <option>25</option>
            <option>26</option>
            <option>27</option>
            <option>28</option>
            <option>29</option>
            <option>30</option>
            <option>31</option>
        </select>
        <select name="endMonth">
            <option value="01" selected>января</option>
            <option value="02" >февраля</option>
            <option value="03" >марта</option>
            <option value="04" >апреля</option>
            <option value="05" >мая</option>
            <option value="06" >июня</option>
            <option value="07" >июля</option>
            <option value="08" >августа</option>
            <option value="09" >сентября</option>
            <option value="10" >октября</option>
            <option value="11" >ноября</option>
            <option value="12" >декабря</option>
        </select>
        <select name="endYear">
            <option selected>2015</option>
            <option >2016</option>
            <option >2017</option>
            <option >2018</option>
        </select>
        <span>&mdash;</span>
        <select name="endHour">
            <option value="00" selected>00</option>
            <option value="01" >01</option>
            <option value="02" >02</option>
            <option value="03" >03</option>
            <option value="04" >04</option>
            <option value="05" >05</option>
            <option value="06" >06</option>
            <option value="07" >07</option>
            <option value="08" >08</option>
            <option value="09" >09</option>
            <option value="10" >10</option>
            <option value="11" >11</option>
            <option value="12" >12</option>
            <option value="13" >13</option>
            <option value="14" >14</option>
            <option value="15" >15</option>
            <option value="16" >16</option>
            <option value="17" >17</option>
            <option value="18" >18</option>
            <option value="19" >19</option>
            <option value="20" >20</option>
            <option value="21" >21</option>
            <option value="22" >22</option>
            <option value="23" >23</option>
        </select>
        <span>:</span>
        <select name="endMinutes">
            <option value="00" selected>00</option>
            <option value="05" >05</option>
            <option value="10" >10</option>
            <option value="15" >15</option>
            <option value="20" >20</option>
            <option value="25" >25</option>
            <option value="30" >30</option>
            <option value="35" >35</option>
            <option value="40" >40</option>
            <option value="45" >45</option>
            <option value="50" >50</option>
            <option value="55" >55</option>
        </select>
        <input type="hidden" name="setFinish" value="0">
    </div>
</div>
</div>
</div>
<label for="cost">Стоимость
    <input name="cost" id="cost" type="text" class="event_edit__form-input" value="<?=isset($event['cost']) ? $event['cost'] : ''?>"/>
</label>
<div class="event_edit__form-row">
    <div class="event_edit__form-files">
        <a href="#" class="js-add-files">добавить фотографии</a>
        <input type="file" name="photos" class="js-file-add" multiple="true" />
        <ul class="js-uploader-files-list"></ul>
    </div>
</div>
<label for="phone">Телефон
    <input name="phone" id="phone" type="text" class="event_edit__form-input" value="<?=isset($event['phone']) ? $event['phone'] : ''?>"/>
</label>
<label for="site">Сайт
    <input name="site" id="site" type="text" class="event_edit__form-input" value="<?=isset($event['site']) ? $event['site'] : ''?>"/>
</label>
<label for="vk">Вконтакте
    <input name="vk" id="vk" type="text" class="event_edit__form-input" value="<?=isset($event['vk']) ? $event['vk'] : ''?>"/>
</label>
<label for="fb">Фейсбук
    <input name="fb" id="fb" type="text" class="event_edit__form-input" value="<?=isset($event['fb']) ? $event['fb'] : ''?>"/>
</label>
<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
<div class="event_edit__form-row">
    <div class="event_edit__form-preview">
        <a href="#">предпросмотр</a>
    </div>
</div>
<div class="event_edit__form-row">
    <div class="event_edit__form-actions">
        <input type="submit" class="event_edit__form-btn" value="опубликовать"/>
        <a href="#" class="event_edit__form-btn event_edit__form-btn_negative">в черновик</a>
    </div>
</div>
</form>
</div>
</section>
<script>
    state = {
        page: 'event_add'
    }
</script>
<script src="/public/js/vendor.bundle.js"></script>
<script src="/public/js/app.bundle.js"></script>