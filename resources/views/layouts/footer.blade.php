<footer class="footer-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="footer-widget">
                    <!-- <div class="logo">
                        <img src="assets/img/logo-white.png" alt="logo">
                        <h2><?php echo DB::table('sitesettings')->where('id', 1)->first()->websitetittle; ?></h2>
                    </div> -->
                    <h5 class="text-white">Disclaimer</h5>
                    <p>1) The information provided on topatlaw.com is intended for general informational purposes only and should not be considered legal advice. It may not be up to date or applicable to your specific situation. 2) The views expressed on this website are general summaries and do not constitute a legal opinion. For a comprehensive understanding of your legal rights and obligations, it is advisable to seek the advice of a qualified attorney. 3) We hereby disclaim all liability for any actions taken or decisions made based on the content found on topatlaw.com. It is your responsibility to evaluate the information and seek professional legal guidance as needed. 4) If you require assistance with a legal matter, we strongly recommend consulting a qualified attorney. Acting on legal matters without proper legal counsel in the relevant jurisdiction is not advisable. 5) This website may contain links to third-party sites. We do not assume any responsibility or liability for the content, maintenance, or use of these external sites. The decision to access and utilize such sites is at your own discretion.

                    </p>
                     <?php $facebook = DB::table('sitesettings')->where('id', 1)->first()->facebook; $twitter = DB::table('sitesettings')->where('id', 1)->first()->twitter; $instagram = DB::table('sitesettings')->where('id', 1)->first()->instagram; $linkdlin = DB::table('sitesettings')->where('id', 1)->first()->linkdlin; ?>
                    
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6">
                <div class="footer-widget">
                    <h3>Quick Links</h3>
                    <ul class="footer-text">
                        <li>
                            <a href="{{ url('') }}">
                                <i class="las la-angle-right"></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('aboutus') }}">
                                <i class="las la-angle-right"></i>
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('services') }}">
                                <i class="las la-angle-right"></i>
                                Our Services
                            </a>
                        </li>
                        
                        <li>
                            <a href="{{ url('privacypolicy') }}">
                                <i class="las la-angle-right"></i>
                                Privacy Policies
                            </a>
                        </li>
                          <li>
                            <a href="{{ url('terms') }}">
                                <i class="las la-angle-right"></i>
                                Terms of Use
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6">
                <div class="footer-widget pl-50">
                    <h3>Top Lawyers</h3>
                    <ul class="footer-text">
                        <?php foreach(DB::table('categories')->where('status' , 1)->limit(6)->get() as $r){ ?>
                        <li>
                            <a href="{{ url('lawyers/') }}/{{ $r->url }}">
                                <i class="las la-angle-right"></i>
                                {{ $r->tittle }}
                            </a>
                        </li>
                        <?php }  ?>
                    </ul>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3>Contact Info</h3>
                    <ul class="info-list">
                        <li>
                            <i class="las la-phone"></i>
                            <a href="tel:<?php echo DB::table('sitesettings')->where('id', 1)->first()->phoneno; ?>"><?php echo DB::table('sitesettings')->where('id', 1)->first()->phoneno; ?></a>
                        </li>
                        <li>
                            <i class="las la-envelope"></i>
                            <a href="javascript:void(0)"><?php echo DB::table('sitesettings')->where('id', 1)->first()->email; ?></a>
                        </li>

                    </ul>
                    <ul class="footer-socials">
                        @if(!empty($facebook))
                        <li> 
                            <a href="{{ $facebook }}" target="_blank">
                                <i class="lab la-facebook-f"></i>
                            </a>
                        </li>
                        @endif @if(!empty($twitter))
                        <li>
                            <a href="{{ $twitter }}" target="_blank">
                                <i class="lab la-twitter"></i>
                            </a>
                        </li>
                        @endif @if(!empty($instagram))
                        <li>
                            <a href="{{ $instagram }}" target="_blank">
                                <i class="lab la-instagram"></i>
                            </a>
                        </li>
                        @endif @if(!empty($linkdlin))
                        <li>
                            <a href="{{ $linkdlin }}" target="_blank">
                                <i class="lab la-google-plus"></i>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div> -->
        </div>
    </div>
</footer>
<div class="footer-bottom">
    <div class="container">
        <p>Copyright @<script>
            var CurrentYear = new Date().getFullYear()
            document.write(CurrentYear)
        </script> TopAtLaw. All rights reserved</p>
    </div>
</div>
<div class="go-top">
    <i class="las la-angle-up"></i>
</div>