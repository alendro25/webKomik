<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <div class="container">
        <a class="navbar-brand" href="#">Gerald A. T</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link active" aria-current="page" href="<?= base_url('/'); ?>">Home</a>
                <a class="nav-link" href="/komik">Comics</a>
                <a class="nav-link" href="/pages/about">About</a>
                <a class="nav-link" href="/pages/contact">Contact</a>
                <a class="nav-link" href="/orang">Orang</a>
            </div>
            <?php if (logged_in()) : ?>
                <a class="btn btn-primary tombol" href="/logout">Logout</a>
            <?php else : ?>
                <!-- <a class="nav-item nav-link" href="/login">Login</a> -->
                <a class="btn btn-primary tombol" href="/login">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>