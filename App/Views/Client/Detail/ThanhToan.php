</header>
        <div class="page-wrapper">
            <div class="top-links">
                <div class="container">
                    <ul class="row links">

                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose
                                Restaurant</a></li>
                        <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick Your favorite food</a>
                        </li>
                        <li class="col-xs-12 col-sm-4 link-item active"><span>3</span><a href="checkout.php">Order and
                                Pay online</a></li>
                    </ul>
                </div>
            </div>

            <div class="container">

                <span style="color:green;">
                </span>

            </div>




            <div class="container m-t-30">
                <form action="" method="post">
                    <div class="widget clearfix">

                        <div class="widget-body">

                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4>Cart Summary</h4>
                                        </div>
                                        <div class="cart-totals-fields">

                                            <table class="table">
                                                <tbody>



                                                    <tr>
                                                        <td>Cart Subtotal</td>
                                                        <td> $133.66</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shipping &amp; Handling</td>
                                                        <td>free shipping</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>Total</strong></td>
                                                        <td class="text-color"><strong> $133.66</strong></td>
                                                    </tr>
                                                </tbody>




                                            </table>
                                        </div>
                                    </div>
                                    <!--cart summary-->
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input name="mod" id="radioStacked1" checked="" value="COD"
                                                        type="radio" class="custom-control-input"> <span
                                                        class="custom-control-indicator"></span> <span
                                                        class="custom-control-description">Payment on delivery</span>
                                                    <br> <span>Please send your cheque to Store Name, Store Street,
                                                        Store Town, Store State / County, Store Postcode.</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <input name="mod" type="radio" value="paypal" disabled=""
                                                        class="custom-control-input"> <span
                                                        class="custom-control-indicator"></span> <span
                                                        class="custom-control-description">Paypal <img
                                                            src="images/paypal.jpg" alt="" width="90"></span> </label>
                                            </li>
                                        </ul>
                                        <p class="text-xs-center"> <input type="submit"
                                                onclick="return confirm('Are you sure?');" name="submit"
                                                class="btn btn-outline-success btn-block" value="Order now"> </p>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </form>

            </div>

        </div>
        <!-- end:page wrapper -->