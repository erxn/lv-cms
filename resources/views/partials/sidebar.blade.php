<!-- Sidebar -->
<div class="col-md-4">
    <div class="sidebar-sticky">
        <!-- categories -->
        <aside class="wrapper__list__article">
            <h4 class="border_section">Topics of Interest</h4>
            <div class="blog-tags p-0">
                <ul class="list-inline">
                    @foreach($categories as $cat)
                    <li class="list-inline-item">
                        <a href="/category/{{ $cat->id }}">#{{  $cat->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </aside>
        <!-- end categories -->

        <!-- social media -->
        <aside class="wrapper__list__article">
            <h4 class="border_section">
                Social Media
            </h4>
            <!-- widget Social media -->
            <div class="wrap__social__media">
                <a href="#" target="_blank">
                    <div class="social__media__widget facebook">
                        <span class="social__media__widget-icon">
                            <i class="fa fa-facebook"></i>
                        </span>
                        <span class="social__media__widget-counter">
                            19,243 fans
                        </span>
                        <span class="social__media__widget-name">
                            like
                        </span>
                    </div>
                </a>
                <a href="#" target="_blank">
                    <div class="social__media__widget twitter">
                        <span class="social__media__widget-icon">
                            <i class="fa fa-twitter"></i>
                        </span>
                        <span class="social__media__widget-counter">
                            2.076 followers
                        </span>
                        <span class="social__media__widget-name">
                            follow
                        </span>
                    </div>
                </a>
                <a href="#" target="_blank">
                    <div class="social__media__widget youtube">
                        <span class="social__media__widget-icon">
                            <i class="fa fa-youtube"></i>
                        </span>
                        <span class="social__media__widget-counter">
                            15,200 followers
                        </span>
                        <span class="social__media__widget-name">
                            subscribe
                        </span>
                    </div>
                </a>
            </div>
        </aside>
        <!-- end social media -->

        <!-- newsletter -->
        <aside class="wrapper__list__article">
            <h4 class="border_section">News In Your Mailbox</h4>
            <!-- Form Subscribe -->
            <div class="widget__form-subscribe bg__card-shadow">
                <h6>
                    The most important world news and events of the day.
                </h6>
                <p>
                    <small>Get daily newsletter on your inbox.</small>
                </p>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Your email address" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            sign up
                        </button>
                    </div>
                </div>
            </div>
        </aside>
        <!-- end newsletter -->
    </div>
</div>
<div class="clearfix"></div>