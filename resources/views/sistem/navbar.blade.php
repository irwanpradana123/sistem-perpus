<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/app" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <div class="btn-group">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                Hi, {{ auth()->user()->name ?? 'Noname' }}
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="user" class="dropdown-item" type="button"><i class="fa-solid fa-user"></i>
                    Profile</a>
                <button class="dropdown-item" type="button">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"><i
                                class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                    </form>
                </button>
            </div>
        </div>

    </ul>
</nav>

<script></script>
