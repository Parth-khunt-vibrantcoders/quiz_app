<!doctype html>
<html lang="en">
   <head>
      <title>Contact Form 10</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="{{ asset('public/partnerus/css/style.css') }}">
   </head>
   <body>
      <section class="ftco-section" style="background-color: white">
         <div class="container">

            <div class="row justify-content-center">
               <div class="col-lg-12">
                  <div class="wrapper">
                     <div class="row no-gutters justify-content-between">
                        <div class="col-lg-6" style="border: 2px solid #e0e0e0 !important; border-radius: 10px !important">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                               <h3 class="mb-4">Drop your message here</h3>
                               <div id="form-message-warning" class="mb-4"></div>
                               <div id="form-message-success" class="mb-4">
                                  Your message was sent, thank you!
                               </div>
                               <form method="POST" id="contactForm" name="contactForm">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="form-group">
                                           <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                        </div>
                                     </div>
                                     <div class="col-md-12">
                                        <div class="form-group">
                                           <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                        </div>
                                     </div>
                                     <div class="col-md-12">
                                        <div class="form-group">
                                           <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                        </div>
                                     </div>
                                     <div class="col-md-12">
                                        <div class="form-group">
                                           <textarea name="message" class="form-control" id="message" cols="30" rows="5" placeholder="Message"></textarea>
                                        </div>
                                     </div>
                                     <div class="col-md-12">
                                        <div class="form-group">
                                           <input type="submit" value="Send Message" class="btn btn-primary">
                                           <div class="submitting"></div>
                                        </div>
                                     </div>
                                  </div>
                               </form>
                            </div>
                        </div>

                        <div class="col-lg-6 d-flex align-items-stretch">
                           <div class="info-wrap w-100 p-5">
                                <div class="desktop">
                                    <div class="desktop-inner text-center">
                                        <div class="text-center">
                                            <img src="{{ asset('public/frontend/images/man-getting.jpg') }}">
                                        </div>
                                        <div class="desktop-logo" >
                                            <img src="{{ asset('public/frontend/images/desktop-logo.png') }}" style="width: 210px !important;">
                                            <p>Play Quiz, <b>Win Coins !</b></p>
                                        </div>
                                    </div>
                                </div>
                              <div class="dbox w-100 d-flex align-items-start text-center" style="color: black !important;padding-top: 20px !important">
                                 <div class="text pl-4">
                                    <p><span style="color: black !important">Address:</span> 198 West 21th Street, <br> Suite 721 New York NY 10016</p>
                                 </div>
                              </div>
                              <div class="dbox w-100 d-flex align-items-start text-center" style="color: black !important;padding-top: 20px !important">

                                 <div class="text pl-4">
                                    <a href="www.google.com" style="margin-top: 10px">View on Google Map <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <script src="{{ asset('public/partnerus/js/jquery.min.js') }}"></script>
      <script src="{{ asset('public/partnerus/js/popper.js') }}"></script>
      <script src="{{ asset('public/partnerus/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('public/partnerus/js/jquery.validate.min.js') }}"></script>
      <script src="{{ asset('public/partnerus/js/main.js') }}"></script>
   </body>
</html>
