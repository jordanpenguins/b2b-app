<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $this->fetch('title') ?></title>
    <!-- Favicon-->
    <?= $this->Html->meta('icon') ?>
    <!-- Bootstrap icons-->
    <?= $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css') ?>
    <?= $this->Html->css('https://cdn.jsdelivr.net/npm/choices.js@11.0.2/public/assets/styles/choices.min.css') ?>
    <?= $this->Html->css('styles') ?>
    <!-- Core theme CSS (includes Bootstrap)-->

</head>
<body class="d-flex flex-column h-100">
<main class="flex-shrink-0">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'info']) ?>">Nathan's B2B</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'info']) ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'about']) ?>">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'portfolio_overview']) ?>">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'contact']) ?>">Contact</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Register</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                            <li><a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'register_organisation']) ?>">As Organisation</a></li>
                            <li><a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'register_contractor']) ?>">As Contractor</a></li>
                        </ul>
                    </li>
                    <!-- add a login button -->
                    <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page content-->
    <?= $this->fetch('content') ?>

</main>

<!-- Footer-->
<footer class="bg-dark py-4 mt-auto">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Nathan's B2B 2024</div></div>
            <div class="col-auto">
                <a class="link-light small" href="#!">Privacy</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Terms</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Contact</a>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js') ?>
<script src="
https://cdn.jsdelivr.net/npm/choices.js@11.0.2/public/assets/scripts/choices.min.js
"></script>
</body>
</html>

