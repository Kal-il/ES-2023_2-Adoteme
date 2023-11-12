<header>
    <div id="logo">
        <div id="logo2">
            <a href="/">
                <img class="image" src="/src/view/assets/adoteme.png" alt="Logo Adoteme" width="60" height="60">
            </a>
            <h2 class="adoteme">Adoteme</h2>
        </div>
        <nav>
            <ul class="nav nav-tabs">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(explode('/', $_SERVER['REQUEST_URI'])[1] == 'admin'){
                                                    echo 'active';
                                                } else { 
                                                    echo 'disabled'; 
                                                } ?>" href="/admin">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Profile</a>
                    </li>
                </ul>
        </nav>
    </div>
</header>