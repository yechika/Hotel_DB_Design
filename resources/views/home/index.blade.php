<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        @include('home.header')
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <!-- banner -->
    @include('home.slider')
    <!-- end banner -->
    <!-- about -->
    @include('home.about')
    <!-- end about -->
    <!-- our_room -->
    @include('home.room')
    <!-- end our_room -->
    <!-- gallery -->
    @include('home.gallery')
    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Blog</h2>
                        <p>Experience luxury and comfort—book your room today for an unforgettable stay!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="blog_img">
                            <figure><img src="images/blog1.jpg" alt="#" /></figure>
                        </div>
                        <div class="blog_room">
                            <h3>Unparalleled Luxury & Comfort</h3>
                            <span>Where Elegance Meets Relaxation</span>
                            <p>At AUREVO, we offer a blend of sophistication and comfort, ensuring an unforgettable stay for our guests. From elegantly designed rooms to top-notch amenities, every detail is crafted to provide you with the ultimate relaxation experience. </p>
                        </div>
                    </div>
                </div>  
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="blog_img">
                            <figure><img src="images/blog2.jpg" alt="#" /></figure>
                        </div>
                        <div class="blog_room">
                            <h3>Exceptional Dining Experience</h3>
                            <span>Savor Flavors from Around the World</span>
                            <p>Indulge in a culinary journey with our exquisite dining options. Whether you're craving local delicacies or international cuisine, our award-winning chefs prepare every dish with passion and precision to satisfy your taste buds.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="blog_img">
                            <figure><img src="images/blog3.jpg" alt="#" /></figure>
                        </div>
                        <div class="blog_room">
                            <h3>Prime Location & Easy Access</h3>
                            <span>Stay in the Heart of the City</span>
                            <p>Conveniently located in Jakarta, our hotel offers easy access to popular attractions, business hubs, and shopping districts. Whether you're here for leisure or work, you'll find everything within reach for a seamless and enjoyable stay.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end gallery -->
    <!-- blog -->

    <!-- end blog -->
    <!--  contact -->
    @include('home.contact')
    <!-- end contact -->
    <!--  footer -->
    @include('home.footer')
    <!-- end footer -->
    <!-- Javascript files-->
    <script type="text/javascript">
        $(window).scroll(function() {
            sessionStorage.scrollTop = $(this).scrollTop();
        });
        $(document).ready(function() {
            $(window).scrollTop(sessionStorage.scrollTop);
        });
    </script>
</body>

</html>