<?php
$pageTitle = 'Profile';
include "init.php";
?>


    <div class="container p-3">

        <div class="row shadow rounded p-2 m-5 text-lg-start text-md-center text-sm-center border-start border-5 border-success">
            <div class="col-lg-3 m-auto">
                <h1 class="card-title">UserName</h1>
            </div>
            <div class="col-lg-7 m-auto">
                <h4 class="d-inline-block">Email: </h4>
                <a href="mailto:a.m.hamza156@gmail.com" class="mb-2 link-dark fa-1x "><h5
                            class="text-muted d-inline-block">
                        a.m.hamza156@gmail.com
                    </h5></a>
                <br>
                <h4 class="d-inline-block">Mobil: </h4>
                <h5 class="mb-2 text-muted d-inline-block ">0123456789</h5>
                <br>
                <h4 class="d-inline-block">Join date: </h4>
                <h5 class=" mb-2 text-muted d-inline-block">11-22-2022</h5>

            </div>
            <div class="col-lg-2">
                <a href="#" class="link-dark"><i class="bi bi-pencil fa-3x m-auto"></i></a>
            </div>
        </div>







        <!------------------------------------------------>
        <!--   For sale   -->
        <!------------------------------------------------>
        <div class="row justify-content-around" id="forSale">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="#forSale" class="btn btn-success m-2 rounded-pill">For sale</a>
                <a href="#sold" class="btn btn-success m-2 rounded-pill">Sold</a>
                <a href="#deleted" class="btn btn-success m-2 rounded-pill">Deleted</a>
            </div>
            <div class="jumbotron jumbotron-fluid m-3">
                <div class="container  border-start border-5 border-success">
                    <h1 class="display-4">For sale</h1>
                    <hr class="my-4">

                    <p class="lead">List of all items that are offered for sale.</p>
                </div>
            </div>
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
                        <a href="add_item.php" class="link-dark">
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






        <!------------------------------------------------>
        <!--   Sold   -->
        <!------------------------------------------------>
        <div class="row justify-content-around" id="sold">
            <div class="jumbotron jumbotron-fluid m-3">
                <div class="container  border-start border-5 border-success">
                    <h1 class="display-4">Sold</h1>
                    <hr class="my-4">
                    <p class="lead">List of all Sold items.</p>
                </div>
            </div>
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
                        <a href="add_item.php" class="link-dark">
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






        <!------------------------------------------------>
        <!--   Deleted   -->
        <!------------------------------------------------>
        <div class="row justify-content-around" id="deleted">
            <div class="col-sm-12">
                <div class="jumbotron jumbotron-fluid m-3">
                    <div class="container  border-start border-5 border-success">
                        <h1 class="display-4">Deleted</h1>
                        <hr class="my-4">
                        <p class="lead">List of all deleted items.</p>
                    </div>
                </div>
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
                        <a href="add_item.php" class="link-dark">
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