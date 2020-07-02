<!-- contact us -->
<section id="partner" class="home-section paddingbot-60">
    <div class="container marginbot-50">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
            <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                <div class="section-heading text-center">
                <h2 class="h-bold">Contact Us</h2>
                <p>Take charge of your health today and contact us for our specially designed health packages</p>
                </div>
            </div>
            <div class="divider-short"></div>
            </div>
        </div>
    </div>
    <div class="section" id="contact_us">
        <span class="anchor" id="contact_us_anchor"></span>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="card-body">
                            <form method="POST" action="/contactus">
                                @csrf
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Your Name</label>
                                    <input type="text" required name="name" class="form-control" placeholder="mike">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" required name="email" class="form-control" placeholder=" Your email eg: joraxconsult@gmail.com">
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="08012345678">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" name="company" class="form-control" placeholder="company name">
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label>Message</label>
                                    <textarea type="text" required name="message" class="form-control" placeholder="Hello there!"></textarea>
                                    </div>
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-round float-right" rel="tooltip" data-original-title="Can't wait for your message" data-placement="right">Send text</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end contact us -->
