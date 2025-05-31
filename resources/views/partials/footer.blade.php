<!--====== Start Footer ======-->
<footer class="footer-area-v1">
    <div class="footer-widget main-bg pt-80 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="widget about-widget mb-40">
                        <img src="{{ asset('assets/images/dealsintel-white.png') }}" alt="Image">
                        <p>Empowering businesses to grow through smarter deals and meaningful partnerships.</p>
                        <ul class="social-link">
                            <li><a href="" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                            <li><a href="https://x.com/dealsintel" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://pinterest.com/dealsintel" target="_blank"><i class="fab fa-pinterest"></i>
                            <li><a href="https://linkedin.com/company/dealsintel" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="widget useful-link-widget mb-40">
                        <h4 class="widget-title">DealsIntel</h4>
                        <ul class="widget-link">
                            <li><a href="{{ route('deals',['category' => 'ai-tools']) }}">AI Tools</a></li>
                            <li><a href="{{ route('deals',['category' => 'crm']) }}">CRM</a></li>
                            <li><a href="{{ route('deals',['category' => 'social-media']) }}">Social Media</a></li>
                            <li><a href="{{ route('deals',['category' => 'productivity']) }}">Productivity</a></li>
                            <li><a href="{{ route('deals') }}">All Deals</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget contact-widget mb-40">
                        <h4 class="widget-title">Contact</h4>
                        <ul class="contact-list">
                            
                            <li class="list">
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="info">
                                    <p><a href="mailto:hello@dealsintel.com">hello@dealsintel.com</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget useful-link-widget mb-40">
                        <h4 class="widget-title">More Links</h4>
                        <ul class="widget-link">
                            <li><a href="{{ route('privacy') }}">Privacy</a></li>
                            <li><a href="{{ route('tos') }}">Terms of Use</a></li>
                            <li><a href="{{ route('register') }}">Sign Up</a></li>
                            <li><a href="{{ route('login') }}">Sign In</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright-text">
                        <p>&copy; DealsIntel {{ date('Y') }} | All Rights Reserved</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="copyright-link">
                        <ul>
                            <li><a href="{{ route('privacy') }}">Privacy</a></li>
                            <li><a href="{{ route('tos') }}">Terms</a></li>
                            <li><a href="{{ route('sitemap') }}">Sitemap</a></li>
                            <li><a href="">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--====== End Footer ======-->
</div>
<!--====== Start Main-wrapper ======-->

<!--====== Search From ======-->
<div class="modal fade show" id="search-modal" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <form>
            <div class="form_group">
                <input type="text" class="form_control" placeholder="Search here...">
                <button class="search_btn"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
</div>
</div>
<!--====== Search From ======-->

<!--====== back-to-top ======-->
<span class="back-to-top"><i class="far fa-chevron-up"></i></span>