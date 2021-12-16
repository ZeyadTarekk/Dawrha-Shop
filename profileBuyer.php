<?php
$pageTitle = 'Profile';
include "init.php";
?>

    <div class="container p-3">
        <div class="row justify-content-around">
            <div class="col-sm-12">
                <section class="row flex-row flex-nowrap p-3 overflow-auto profile_scroll rounded position-static">

                    <div class="col-lg-3 m-0">
                        <div class="card m-md-auto shadow" style="width: 18rem;">
                            <a href="#" class="btn btn-danger rounded-pill position-absolute"
                               style="width: fit-content; top: 0;right: 0">
                                <span class="badge">0</span></a>
                            <img src="<?php echo $imgs . "Login-img.png" ?>" class="card-img-top" alt="Item">
                            <div class="card-body">
                                <h5 class="card-title">Item Name</h5>
                                <h6 class="card-title">Category</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the bulk of the card's
                                    content.</p>
                                <h4 class="card-title">$30</h4>
                                <div class="card-body">
                                    <a href="#" class="btn btn-success">Go 1</a>
                                    <a href="#" class="btn btn-danger">Go 2</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 m-0">
                        <div class="card m-md-auto shadow" style="width: 18rem;">
                            <a href="#" class="btn btn-danger rounded-pill position-absolute"
                               style="width: fit-content; top: 0;right: 0">
                                <span class="badge">0</span></a>
                            <img src="<?php echo $imgs . "Login-img.png" ?>" class="card-img-top" alt="Item">
                            <div class="card-body">
                                <h5 class="card-title">Item Name</h5>
                                <h6 class="card-title">Category</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the bulk of the card's
                                    content.</p>
                                <h4 class="card-title">$30</h4>
                                <div class="card-body">
                                    <a href="#" class="btn btn-success">Go 1</a>
                                    <a href="#" class="btn btn-danger">Go 2</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 m-0">
                        <div class="card m-md-auto shadow" style="width: 18rem;">
                            <a href="#" class="btn btn-danger rounded-pill position-absolute"
                               style="width: fit-content; top: 0;right: 0">
                                <span class="badge">0</span></a>
                            <img src="<?php echo $imgs . "Login-img.png" ?>" class="card-img-top" alt="Item">
                            <div class="card-body">
                                <h5 class="card-title">Item Name</h5>
                                <h6 class="card-title">Category</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the bulk of the card's
                                    content.</p>
                                <h4 class="card-title">$30</h4>
                                <div class="card-body">
                                    <a href="#" class="btn btn-success">Go 1</a>
                                    <a href="#" class="btn btn-danger">Go 2</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 m-0">
                        <div class="card m-md-auto shadow" style="width: 18rem;">
                            <a href="#" class="btn btn-danger rounded-pill position-absolute"
                               style="width: fit-content; top: 0;right: 0">
                                <span class="badge">0</span></a>
                            <img src="<?php echo $imgs . "Login-img.png" ?>" class="card-img-top" alt="Item">
                            <div class="card-body">
                                <h5 class="card-title">Item Name</h5>
                                <h6 class="card-title">Category</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the bulk of the card's
                                    content.</p>
                                <h4 class="card-title">$30</h4>
                                <div class="card-body">
                                    <a href="#" class="btn btn-success">Go 1</a>
                                    <a href="#" class="btn btn-danger">Go 2</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 m-0">
                        <div class="card m-md-auto shadow" style="width: 18rem;">
                            <a href="#" class="btn btn-danger rounded-pill position-absolute"
                               style="width: fit-content; top: 0;right: 0">
                                <span class="badge">0</span></a>
                            <img src="<?php echo $imgs . "Login-img.png" ?>" class="card-img-top" alt="Item">
                            <div class="card-body">
                                <h5 class="card-title">Item Name</h5>
                                <h6 class="card-title">Category</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the bulk of the card's
                                    content.</p>
                                <h4 class="card-title">$30</h4>
                                <div class="card-body">
                                    <a href="#" class="btn btn-success">Go 1</a>
                                    <a href="#" class="btn btn-danger">Go 2</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 m-0" style="position: sticky; right: 0;">
                        <a href="#" class="link-dark">
                            <div class="card m-md-auto shadow" style="width: 18rem;">
                                <div class="m-auto">
                                    <i class="bi bi-plus-circle fa-9x"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Add Item</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?php include $tpl . "footer.php" ?>