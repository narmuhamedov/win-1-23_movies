<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top"
     style="background: linear-gradient(to right, #1a1919, #100f0f);">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://lh5.googleusercontent.com/yzWtzlXIlHfLjcFkr0S7UgmoX9HFoJ6VRszWZyEt-G85Gl5ID_XxoLX6Ji6E223S-EU2UUt2Y89uOwkm0tr8KkLQbM4Su17ln5HVBLaLHfxFIqm4DDpwmzPhfeAg1mja2Xdz7JkCvJqbpoEOT0CX8Cg"
                 alt="Logo" style="width: 40px; height: 40px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/" style="color: yellow;">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list_movies_tags.php" style="color: yellow;">Список фильмов с тэгами</a>
                    <a class="nav-link" href="add_movie.php" style="color: yellow;">Добавить фильм</a>
                    <a class="nav-link" href="add_movie_hastags.php" style="color: yellow;">Добавть хэштег</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false" style="color: yellow;">
                        CRUD SYSTEM
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Добавить</a></li>
                        <li><a class="dropdown-item" href="#">Удалить</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Изменить</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link enable" href="" style="color: yellow;">Регистрация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link enable" href="" style="color: yellow;">Другие фильмы</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">
                <button class="btn btn-outline-success" type="submit" style="color: yellow; border-color: yellow;">
                    Поиск
                </button>
            </form>
        </div>
    </div>
</nav>

