<form action="{{route('search')}}">
    <label>
        <input class="form-control" name="find" required type="text">
    </label>
    <label>
        Новости
        <input  name="news" type="checkbox" checked>
    </label>
    <br>
    <label>
        Вопросы
        <input  name="help" type="checkbox">
    </label>
    <br>
    <label>
        Уроки
        <input name="lessons" type="checkbox">
    </label>
    <br>
    <button class="btn btn-success" type="submit">OK</button>
</form>
