@extends('layouts.app')

@section('content')

        <font>
        <div id="style">
            <a href="https://content2.rozetka.com.ua/goods/images/big/163399632.jpg" target="_blank">
            <img width="280" height="200" src="https://content2.rozetka.com.ua/goods/images/big/163399632.jpg" class="rounded float-start"></a>
            <h4 align="center">Ноутбук Acer Aspire 3 A315-57G-336G</h4>
            <div style="margin-left: 40%">
                <h6>Описание:</h6>
                <p>
                    Воплощение идеальной формы и функциональности
                    Невероятно тонкий корпус и приятное на ощупь покрытие подчеркивают достоинства устройства.
                </p>
                <p>
                    Приятный на ощупь
                    Изысканное покрытие корпуса с узором из тонких линий обеспечивает приятные тактильные ощущения.
                </p>
                <p>
                    Точность управления
                    Сенсорная панель с технологией Precision Touchpad отличается потрясающей чувствительностью для более эффективной работы за ноутбуком.
                </p>
            </div>


        <br><br>
            <h4 align="center">Оставить отзыв о товаре</h4>

            @guest
            <h6 align="center" style="color: red;">Авторизируйтесь чтобы добавить отзыв</h6>
            <div class="mb-3">
                
            @if (Route::has('register'))
            @endif
            @else

            <form action="createReview" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

    <!--==== Comment ====-->

            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Добавьте комментарий</label>
              <textarea class="form-control" name="comment" id='comment' rows="3"></textarea>
            </div>

    <!--==== Форма для оценки ====-->

            <div>
                <a>Оцените товар</a>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="grade" id="grade" value="1" required />1
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="grade" id="grade" value="2" required />2
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="grade" id="grade" value="3" required />3
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="grade" id="grade" value="4" required />4
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="grade" id="grade" value="5" required />5
                    <div class="invalid-feedback">Выберите один из вариантов</div>
                </div>

    <!--==== image ====-->

                <input style="float: right; width: 265px;" class="btn btn-light" accept="image/*" type="file" id='image' name="image">
            </div>

            <button id='buttonReviews' type="button" class="btn btn-secondary" />Отправить</button>
        @endguest

    <!--======== Отзывы ========-->

        <input type="hidden" id="imagePath" value="<?php echo asset('storage/images/'); ?>">

        <br><p></p>
        <h5 align="center">Отзывы пользователей</h5>
        <hr>

        <div id="reviews">
        </div>       
    </form>
</font>
@endsection

