{{-- {{ dd($companyInformation) }} --}}
<footer class="dark-footer footer-style-1 footer-theme-color">
    <section class="section-b-space darken-layout">
        <div class="container">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6 sub-title">
                    <div class="footer-title footer-mobile-title">
                        <h4>about</h4>
                    </div>
                    <div class="footer-contant">
                        <div class="footer-logo"><img src="{{ asset('uploads/logo/'.$companyInformation->logo) }}"
                                alt=""></div>
                        <p>{{ $companyInformation->company_motto ?? 'N/A' }}</p>
                        <ul class="contact-list">
                            <li><i class="fa fa-map-marker"></i>{{ $companyInformation->company_address ?? 'N/A' }}
                            </li>
                            <li><i class="fa fa-phone"></i>Call Us: {{ $companyInformation->mobile ?? 'N/A' }}</li>
                            <li><i class="fa fa-envelope-o"></i>Email Us: <a href="#">{{ $companyInformation->email ??
                                    'N/A'
                                    }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
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
                <div class="col-lg-2 col-md-6">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>information</h4>
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
                <div class="col-lg-4 col-md-6">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>follow us</h4>
                        </div>
                        <div class="footer-contant">
                            <p class="mb-cls-content">{{ $companyInformation->company_address ?? 'N/A' }}</p>
                            <form class="form-inline">
                                <div class="form-group me-sm-3 mb-2">
                                    <label for="inputPassword2" class="sr-only">Password</label>
                                    <input type="password" class="form-control" id="inputPassword2"
                                        placeholder="Enter Your Email">
                                </div>
                                <button type="submit" class="btn btn-solid mb-2">subscribe</button>
                            </form>
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
                </div>
            </div>
        </div>
    </section>
    <div class="sub-footer dark-subfooter">
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
                                <a href="#"><img src="{{ asset('frontend/assets') }}/images/icon/visa.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('frontend/assets') }}/images/icon/mastercard.png"
                                        alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('frontend/assets') }}/images/icon/paypal.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('frontend/assets') }}/images/icon/american-express.png"
                                        alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('frontend/assets') }}/images/icon/discover.png"
                                        alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>