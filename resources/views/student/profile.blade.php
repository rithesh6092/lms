@extends('layouts.master')
@section('title', 'Profile')
@section('content')
    <!-- dashboard banner area start -->
    <div class="dashboard-banner-area-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="dashboard-banner-area-start bg_image  student-dashboard">
                        <div class="rating-area-banner-dashboard">
                            <a href="become-instructor.html" class="create-btn"><i class="fa-regular fa-circle-plus"></i>
                                Become an Instructor</a>
                        </div>
                        <div class="author-profile-image-and-name">
                            <div class="profile-pic">
                                <img src="assets/images/dashboard/04.png" alt="dashboard">
                            </div>
                            <div class="name-desig">
                                <h1 class="title">Jon Adam</h1>
                                <div class="course-vedio">
                                    <div class="single">
                                        <i class="fa-thin fa-book"></i>
                                        <span>5 Course Enrolled</span>
                                    </div>
                                    <div class="single">
                                        <i class="fa-thin fa-file-certificate"></i>
                                        <span>4 Certificate</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- dashboard banner area end -->
    
    <!-- rts dahboard-area-main-wrapper -->
    <div class="dashboard--area-main pt--100">
        <div class="container">
            <div class="row g-5">
                @include('web-includes.side-menu')
                <div class="col-lg-9  rts-sticky-column-item">
                    <div class="right-sidebar-my-profile-dash theiaStickySidebar pt--30">
                        <h5 class="title">My Profile</h5>
                        <!-- single My portfolio start-->
                        <div class="my-single-portfolio-dashed">
                            <div class="name">Registration Date</div>
                            <div class="value">February 25, 2022 6:01 am</div>
                        </div>
                        <!-- single My portfolio end-->
                        <!-- single My portfolio start-->
                        <div class="my-single-portfolio-dashed">
                            <div class="name">First Name:</div>
                            <div class="value">Jon Adam</div>
                        </div>
                        <!-- single My portfolio end-->
                        <!-- single My portfolio start-->
                        <div class="my-single-portfolio-dashed">
                            <div class="name">Last Name:</div>
                            <div class="value">Caster</div>
                        </div>
                        <!-- single My portfolio end-->
                        <!-- single My portfolio start-->
                        <div class="my-single-portfolio-dashed">
                            <div class="name">Username:</div>
                            <div class="value">jonadam</div>
                        </div>
                        <!-- single My portfolio end-->
                        <!-- single My portfolio start-->
                        <div class="my-single-portfolio-dashed">
                            <div class="name">Email:</div>
                            <div class="value">studyhub@ino.com</div>
                        </div>
                        <!-- single My portfolio end-->
                        <!-- single My portfolio start-->
                        <div class="my-single-portfolio-dashed">
                            <div class="name">Phone Number:</div>
                            <div class="value">February 25, 2022 6:01 am</div>
                        </div>
                        <!-- single My portfolio end-->
                        <!-- single My portfolio start-->
                        <div class="my-single-portfolio-dashed">
                            <div class="name">Skill/Occupation</div>
                            <div class="value">Full Stack Developer</div>
                        </div>
                        <!-- single My portfolio end-->
                        <!-- single My portfolio start-->
                        <div class="my-single-portfolio-dashed">
                            <div class="name">Biography</div>
                            <div class="value">I have a degree in Journalism with over 15 years of work experience in
                                the field.
                                Throughout the years, I have worked in several well-known institutions and in published
                                several books on Journalism that are available on Amazon.</div>
                        </div>
                        <!-- single My portfolio end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts dahboard-area-main-wrapper end -->


    <div class="rts-section-gap">
    </div>

    <!-- cart area start -->
    <!-- cart area edn -->

    <!-- header style two -->
    <!-- header style two End -->

    <!-- modal -->
    <div id="myModal-1" class="modal fade" role="dialog">
        <div class="modal-dialog bg_image">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal"><i class="fa-light fa-x"></i></button>
                </div>
                <div class="modal-body text-center">
                    <div class="inner-content">
                        <div class="title-area">
                            <span class="pre">Get Our Courses Free</span>
                            <h4 class="title">Wonderful for Learning</h4>
                        </div>
                        <form action="#">
                            <input type="text" placeholder="Your Mail.." required>
                            <button>Download Now</button>
                            <span>Your information will never be shared with any third party</span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts backto top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>
    <!-- rts backto top end -->

    <!-- offcanvase search -->
    <div class="search-input-area">
        <div class="container">
            <div class="search-input-inner">
                <div class="input-div">
                    <input class="search-input autocomplete" type="text" placeholder="Search by keyword or #">
                    <button><i class="far fa-search"></i></button>
                </div>
            </div>
        </div>
        <div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
    </div>
    <!-- offcanvase search -->
    <div id="anywhere-home" class="">
    </div>
@endsection
