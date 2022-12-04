<style>
.bg-footer{
    background-image: url("/images/home_footer_bg.png");
    background-repeat: no-repeat;
    background-size: 100% 100%;
    height: 550px;
    margin-left: -25px;
}

.spacing-footer{
    padding-top: 225px;
}

.footer-email-position{
    font-size: 1.2rem;
}

@media only screen and (max-width: 780px) {
    .bg-footer{
        height: 650px
    }
}

@media only screen and (min-width: 1200px) {
    .footer-email-position{
        font-size: 1.5rem;
    }

    .spacing-footer{
        padding-top: 300px;
    }
}

</style>

<div class="bg-footer w-100 d-flex justify-content-center align-items-center">
    <div class="row spacing-footer gs-5 gy-3">
     <div class="col-12 col-lg-3 text-center">
        <a href="/" class="text-decoration-none">
           <div class="display-3 fw-bold"><span class="text-warning">CINE</span><span class="text-white">MOV.</span></div>
           <p class="text-white fs-4 fw-bold">Online Cinema.</p>
        </a>
     </div>

      <div class="col-12 col-md-4 col-lg-3 fs-4 d-flex flex-column  justify-content-center align-items-center">
        <a href="/home" class="text-white decoration-none" style="text-decoration: none;">Home</a>
        <a href="#" class="text-white decoration-none" style="text-decoration: none;">Movies</a>
        <a href="#" class="text-white decoration-none" style="text-decoration: none;">Trailer</a>
      </div>

      <div class="col-6 col-md-4 col-lg-3 fs-4 d-flex flex-column justify-content-center align-items-start" style="padding-left:35px;">
        <div class="text-white">Contact us</div>
        <div class="text-white text-nowrap">
            <i class="fa-solid fa-phone p-1 fs-6"></i>+62 8145 8452 778
        </div>
        <div class="text-white text-nowrap">
            <i class="fa-solid fa-envelope p-1 fs-6"></i>cinemov@gmail.com
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-3 d-flex flex-column align-items-start footer-email-position">
        <p class="text-white">Don’t forget to subscribe our mailing list to stay updated.</p>
        <form action="" class="d-flex flex-column text-white">
          <label for="footer-email" class="form-group-label">Email</label>
          <input type="email" name="email" id="footer-email" class="form-group" placeholder="Type your email">
        </form>
      </div>
    </div>
  </div>
