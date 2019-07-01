<div class="container-fluid pl-120 pr-120 position-relative">
    <div class="row d-flex align-items-center">

        <div class="col-lg-3 col-md-4 col-6">
            <!-- Logo -->
            <div class="logo">
                <a href="#"><img src="{{asset('theme-front/images/logo.png')}}" alt="" class="img-fluid"></a>
            </div>
            <!-- End of Logo -->
        </div>

        <div class="col-lg-9 col-md-8 col-6 d-flex justify-content-end position-static">
            <!-- Nav Menu -->
            <div class="nav-menu-cover">
                <ul class="nav nav-menu">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li class="menu-item-has-children"><a href="#">Blog</a></li>
                        <ul class="sub-menu">
                            <li class="menu-item-has-children"><a href="#">Blog List</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-list-sidebar.html">List Sidebar</a></li>
                                    <li><a href="blog-list-full-width.html">List Full Width</a></li>
                                    <li><a href="blog-grid-sidebar.html">Grid Sidebar</a></li>
                                    <li><a href="blog-grid-2-col.html">Grid v2</a></li>
                                    <li><a href="blog-grid-3-col.html">Grid v3</a></li>
                                    <li><a href="blog-overlay.html">Blog Overlay</a></li>
                                    <li><a href="blog-card-v1.html">Blog Card v1</a></li>
                                    <li><a href="blog-card-v2.html">Blog Card v2</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">Blog Details</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-details.html">Default Style</a></li>
                                    <li><a href="blog-details-full-width.html">Full Width</a></li>
                                    <li><a href="blog-details-video.html">Video Post</a></li>
                                    <li><a href="blog-details-slide.html">Slide Post</a></li>
                                    <li><a href="blog-details-audio.html">Audio Post</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#">Pages </a>
                        <ul class="sub-menu">
                            <li><a href="categories.html">Categories</a></li>
                            <li><a href="search-result.html">Search Results</a></li>
                            <li><a href="404.html">404 Error</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <!-- End of Nav Menu -->

            <!-- Mobile Menu -->
            <div class="mobile-menu-cover">
                <ul class="nav mobile-nav-menu">
                    <li class="search-toggle-open">
                        <img src="{{asset('theme-front/images/search-icon.svg')}}" alt="" class="img-fluid svg">
                    </li>
                    <li class="search-toggle-close hide">
                        <img src="{{asset('theme-front/images/close.svg')}}" alt="" class="img-fluid">
                    </li>
                    <li class="nav-menu-toggle">
                        <img src="{{asset('theme-front/images/menu-toggler.svg')}}" alt="" class="img-fluid svg">
                    </li>
                </ul>
            </div>
            <!-- End of Mobile Menu -->
        </div>
    </div>
</div>