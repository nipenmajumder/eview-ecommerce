<footer class="footer-light">
    <div class="light-layout">
        <div class="container">
            <section class="small-section border-section border-top-0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subscribe">
                            <div>
                                <h4>KNOW IT ALL FIRST!</h4>
                                <p>Never Miss Anything From Multikart By Signing Up To Our Newsletter.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form
                            action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda"
                            class="form-inline subscribe-form auth-form needs-validation" method="post"
                            id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                            <div class="form-group mx-sm-3">
                                <input type="text" class="form-control" name="EMAIL" id="mce-EMAIL"
                                    placeholder="Enter your email" required="required">
                            </div>
                            <button type="submit" class="btn btn-solid" id="mc-submit">subscribe</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-title footer-mobile-title">
                        <h4>about</h4>
                    </div>
                    <div class="footer-contant">
                        <div class="footer-logo"><img src="{{ asset('uploads/logo/'.$companyInformation->logo) }}"
                                alt="">
                        </div>
                        <p>{{ $companyInformation->company_address ?? 'N/A' }}</p>
                        <div class="footer-social">
                            <ul>
                                <li><a href="{{ $icon->facebook ?? '#' }}"><i class="fa fa-facebook"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="{{ $icon->youtube ?? '#' }}"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="{{ $icon->twitter ?? '#' }}"><i class="fa fa-twitter"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="{{ $icon->linkend ?? '#' }}"><i class="fa fa-linkedin"></i> </a></li>
                                <li><a href="{{ $icon->skype ?? '#' }}"><i class="fa fa-skype"
                                            aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col offset-xl-1">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>my account</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="#">mens</a></li>
                                <li><a href="#">womens</a></li>
                                <li><a href="#">clothing</a></li>
                                <li><a href="#">accessories</a></li>
                                <li><a href="#">featured</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>why we choose</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="{{ url('/about-us') }}">about us</a></li>
                                <li><a href="{{ url('/privacy-policy') }}">privacy policy</a></li>
                                <li><a href="{{ url('/terms-conditions') }}">terms-conditions</a></li>
                                <li><a href="{{ route('blogs') }}">Blogs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Information</h4>
                        </div>
                        <div class="footer-contant">
                            <ul class="contact-list">
                                <li><i class="fa fa-map-marker"></i>{{ $companyInformation->company_address ?? 'N/A' }}
                                </li>
                                <li><i class="fa fa-phone"></i>Call Us: {{ $companyInformation->mobile ?? 'N/A' }}</li>
                                <li><i class="fa fa-envelope-o"></i>Email Us: {{ $companyInformation->email ?? 'N/A' }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="footer-end">
                        <p><i class="fa fa-copyright" aria-hidden="true"></i> 2017-18 themeforest powered by
                            pixelstrap</p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="payment-card-bottom">
                        <ul>
                            <li>
                                <a href="#"><img src="{{asset('frontend')}}/assets/images/icon/visa.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{asset('frontend')}}/assets/images/icon/mastercard.png"
                                        alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{asset('frontend')}}/assets/images/icon/paypal.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{asset('frontend')}}/assets/images/icon/american-express.png"
                                        alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{asset('frontend')}}/assets/images/icon/discover.png" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>