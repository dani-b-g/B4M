<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div id="feedback" class="alert alert-success" hidden></div>
            <?php if (isset($_SESSION['flashdata']) && !isset($_SESSION['login'])) : ?>
            <div class=" alert alert-danger" role="alert ">
                <?php echo $_SESSION['flashdata'];
                    unset($_SESSION['flashdata']); ?>
            </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['flashdata']) && $_SESSION['login'] == true) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['flashdata'];
                    unset($_SESSION['flashdata']); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Feed</h5>
            <div class="card-text">
                <div class="jumbotron">
                    <h2 class="display-4">Hello, world!</h2>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
                        attention to featured content or information.</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger
                        container.</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                </div>
            </div>
        </div>
    </div>
</div>