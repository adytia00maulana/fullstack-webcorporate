
<div class="footer-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="footer-info">
                            <h5><?= !empty($getLogo)? $getLogo[0]['title'] : '' ?></h5>
                            <p>PT. Multi Bestri Indonesia bergerak di bidang Perdagangan dan Distributor Utama Kosmetik dan Ginseng dari Korea yang didistribusikan untuk seluruh wilayah di Indonesia dan beberapa Negara.</p>
                            <br>
                            <p>PT. Multi Bestri Indonesia merupakan PMA Korea di Indonesia dan </p>
                            <p>terdaftar berdasarkan Undang Undang Republik Indonesia dengan AKTA no.07 Tanggal 16 Mei 2002 dengan perubahan akta 07 tanggal 15 Desember 2008</p>
                        </div>
                        <!-- <div class="footer-newsletter">
                            <h4>Our Newsletter</h4>
                            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem.</p>
                            <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                            </form>
                        </div> -->
                    </div>
                    <div class="col-sm-6">
                        <div class="footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><a href="#">Home Page</a></li>
                                <li><a href="#about">About us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>

                        <div class="footer-links">
                            <h4>Contact Us</h4>
                            <p>
                                Grand Wijaya Center <br>
                                Blok H-26, Jl.Wijaya II, Kebayoran Baru, <br>
                                Jakarta Selatan 12160, Indonesia <br>
                                <strong>Fax / Phone 1:</strong> +62 21-720-3639<br>
                                <strong>Phone 2:</strong> +62 821-1616-7126<br>
                            </p>
                        </div>

                        <div class="social-links">
                            <a href="https://www.tiktok.com/@kbshop.official" class="tiktok"><i class="bi bi-tiktok"></i></a>
                            <a href="https://www.facebook.com/kbshopofc" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/kbshopofficial/?hl=id" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="https://www.youtube.com/channel/UCIE8f-jSZ63U1u4zk7IKWgA" class="youtube"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form">
                    <h4>Send us a message</h4>
                    <p>Halo, Selamat Datang Di Korea Best Shop Untuk keterangan lebih lanjut silahkan hubungi admin</p>
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="copyright">
    &copy; Copyright <strong><?= !empty($getLogo)? $getLogo[0]['title'] : '' ?></strong>. All Rights Reserved
    </div>
    <div class="credits">
    Designed by <a href="#">Integrated Genius Solution</a>
    </div>
</div>