<div class="container mt-5">
    <section class="view">
        <div class="row">
            <div class="col-md-6">
                <?php if (isset($_SESSION['login'])) {
                    redirect(base_url('login_c/'));
                } ?>
                <div class="d-flex flex-column justify-content-center align-items-center rgba-purple-light h-100">
                    <h1 class="heading display-3 m-5">Band 4 musicians</h1>
                    <h4 class="subheading font-weight-bold m-5">Unete y encuentra el musico que necesites U'rock</h4>
                    <div class="mr-auto">
                        <a href="<?php echo base_url('login_c/') ?>"
                            class="btn m-5 btn-lily btn-secondary btn-margin btn-rounded">Unete
                            <i class="fas fa-caret-right ml-3"></i>
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="view">
                    <img src="<?php echo base_url('assets/img/inicio.jpg') ?>" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
</div>