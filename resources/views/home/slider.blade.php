<style>
   .banner_main {
    padding: 0; /* Remove any padding */
    margin: 0;  /* Remove any margin */
    width: 100%;
}

.carousel,
.carousel-inner,
.carousel-item,
.carousel-item img {
    width: 100%;
    height: 950px; /* Optional: make carousel height full viewport height */
    object-fit: cover; /* Make images cover the container */
}
.book_room {
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
   text-align: center;
   color: white;
   z-index: 10;
   background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
   padding: 50px;
   border-radius: 10px;
   box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

.book_room h1 {
   font-size: 3rem;
   font-weight: bold;
   margin-bottom: 15px;
}

.book_room p {
   font-size: 1.2rem;
   margin-bottom: 20px;
}

.book_btn {
   display: inline-block;
   padding: 10px 20px;
   font-size: 1.2rem;
   color: white;
   border: none;
   border-radius: 5px;
   text-decoration: none;
   transition: background-color 0.3s ease;
}
</style>
<section class="banner_main">
   <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
      <ol class="carousel-indicators">
         <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
         <li data-target="#myCarousel" data-slide-to="1"></li>
         <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
         <div class="carousel-item active">
            <img class="first-slide" src="images/banner1.jpg" alt="First slide">
            <div class="container">
            </div>
         </div>
         <div class="carousel-item">
            <img class="second-slide" src="images/banner2.jpg" alt="Second slide">
         </div>
         <div class="carousel-item">
            <img class="third-slide" src="images/banner3.jpg" alt="Third slide">
         </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
      </a>
   </div>
   <div class="booking_ocline"></div>
   <div class="book_room">
      <h1>Welcome to AUREVO</h1>
      <p>Book a Room Online</p>
      <a href="/our_rooms" class="book_btn">Book Now</a>
   </div>
</section>