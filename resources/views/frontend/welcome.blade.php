@extends('layouts.frontend.app')
@section('meta')
<title>
   {{ config('app.name') }} | Donate Transparently
</title>
@endsection
@section('css')
<style>
   .hero-section{
   height: calc(100vh - 5rem);
   width: 100vw;
   }
</style>
@endsection
@section('js')
<script>
   var notify = {
   timeout: "5000",
   animatedIn: "bounceInRight",
   animatedOut: "bounceOutRight",
   position: "bottom-right"
   }

   var stepper = document.getElementById("stepper");

   function toggleVisibility(element) {
   var x = document.getElementById(element);
   if (x.style.display === "none") {
   x.style.display = "block";
   } else {
   x.style.display = "none";
   }
   }


   setInterval(function() {
   if(stepper.classList.contains('step1')) {

   stepper.classList.remove('step1');
   stepper.classList.add('step2');
   toggleVisibility('step1-p');
   toggleVisibility('step2-p');
   } else if(stepper.classList.contains('step2')) {
   stepper.classList.remove('step2');
   stepper.classList.add('step3');
   toggleVisibility('step2-p');
   toggleVisibility('step3-p');
   } else if(stepper.classList.contains('step3')) {

   stepper.classList.remove('step3');
   stepper.classList.add('step1');
   toggleVisibility('step3-p');
   toggleVisibility('step1-p');
   }
   }, 5000);
</script>
@endsection
@section('content')
   <section class="spotlight C-parallax bg-cover bg-size--cover" data-spotlight="fullscreen">
      <span class="mask bg-tertiary alpha-5"></span>
      <div class="spotlight-holder py-lg pt-lg-xl" style="height: 722px;">
         <div class="container d-flex align-items-center no-padding">
            <div class="col">
               <div class="row cols-xs-space align-items-center text-center text-md-left justify-content-start">
                  <div class="col-7">
                     <div class="text-left mt-5">
                        <!-- <h2 class="heading display-4 font-weight-400 text-white mt-5 animated" data-animation-in="fadeInUp" data-animation-delay="2000">
                           <span class="font-weight-700">812</span> hungry mouths fed today
                           </h2> -->
                        <p class="lead text-white mt-3 lh-180 c-white animated" data-animation-in="fadeInUp" data-animation-delay="2500">
                           <span style="font-size: 2.2rem;"><strong>#FeedThePoor</strong> Initiative</span> <br>
                           "Feeding the hungry is greater work than raising the dead"
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="slice-lg">
      <div class="container">
         <div class="row align-items-center cols-xs-space cols-sm-space cols-md-space">
            <div class="col-lg-6">
               <div class="d-flex align-items-center">
                  <h3 class="heading">
                     What's the reason behind <strong>#feedThePoor</strong>?
                  </h3>
               </div>
            </div>
            <div class="col-md-6">
               <p>
                  India is home to the largest undernourished population in the world
               </p>
               <ul>
                  <li>194.4 million people i.e. 14.5% of our population is undernourished</li>
                  <li>20.8% of children under 5 are underweight</li>
                  <li>37.9% of children under 5 years of age are stunted</li>
                  <li>51.4% women in the reproductive age (15-49 years) are anaemic</li>
               </ul>
               <small>source <a href="https://www.indiafoodbanking.org/hunger" target="_blank">indiafoodbanking.org</a></small>
               <br><br><br>
               There are always people who strive to help. There are people who deep down "want" to help, but they're
               haunted by one burning question inside their minds
               <p></p>
            </div>
         </div>
      </div>
   </section>
   <section class="bg-gradient-lighter slice-lg">
      <div class="container">
         <div class="row">
            <div class="col-lg-6">
               <div class="d-flex">
                  <div class="icon-text">
                     <h2 class="heading h2 text-muted">"I want to help..., but who knows my money is
                        actually being used to feed the poor?"
                     </h2>
                     <p>
                     </p>
                     <h1>- This is what we are solving</h1>
                     The first thing that haunts the mind of every good soul that wants to help, is the doubt, the grey area, and lack of <strong>"Transparency"</strong>
                     <br><br>
                     <h4>Seeing is beliving.</h4>
                     #feedThePoor initiative is all about transparency. With the help of our NGO partners, we are able to show our donors who they've fed, and how every penny of their donation is putting a smile across
                     thousands of faces. <strong><i>Transparency.</i></strong>
                     <p></p>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="block block-image">
                  <img style="height: auto; width: 100%;" src="https://feedthepoor.online/en/public/images/donate_trandparently.png" class="img-center img-fluid rounded z-depth-3" alt="">
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="slice-lg">
      <div class="container align-items-center">
         <div class="row py-5 align-items-center cols-xs-space cols-sm-space cols-md-space">
            <div class="col-md-12">
               <h1 class="heading">How does it work?</h1>
               <p>
                  It might seem like a herculean task, but it's not. We've simplified it using <strong>technology</strong>
               </p>
            </div>
            <div class="col-md-12">
               <div class="d-flex">
                  <div class="stepper-div">
                     <div class="step3" id="stepper">
                        <ul class="stepper">
                           <li><span>Donate</span></li>
                           <li><span>Food</span></li>
                           <li><span>Proof</span></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="card z-depth-3">
                  <div class="card-body">
                     <!-- <div class="">Example</div> -->
                     <div id="step1-p" class="animate__animated animate__fadeIn" style="display: none;">
                        <h3>You make your donation</h3>
                        You donate to our NGO partner via Razorpay payment gateway. The payment is automatically verified and accepted by our website. We immediately place the order for the food to donate the next day. You will recieve a recipt within the next 5 - 10 minutes.
                     </div>
                     <div id="step2-p" class="animate__animated animate__fadeIn" style="display: none;">
                        <h3>We distribute the food </h3>
                        With the help of our Voulenteers, we distribute the food which was arranged by your donation to the underprivileged people in certain locations.
                     </div>
                     <div id="step3-p" class="animate__animated animate__fadeIn" style="display: block;">
                        <h3>You get happy pictures</h3>
                        While we distribute the food, we take a quick moment to click a picture of your donation, along with your name with the person who is receiving it and mail it to you. We post the same
                        on our NGO partner's instagram account. If you have provided instagram handle, we'll tag you.
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="container d-flex align-items-center no-padding">
         <div class="col">
            <div class="row">
               <div class="col-lg-12 py-5 pr-5">
                  <div style="z-depth-3" class="rounded p-2">
                     <div id="carouselExampleIndicators" class="carousel slide rounded" data-ride="carousel">
                        <ol class="carousel-indicators">
                           <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                           <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                           <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
                           <li data-target="#carouselExampleIndicators" data-slide-to="3" class=""></li>
                           <li data-target="#carouselExampleIndicators" data-slide-to="4" class=""></li>
                           <li data-target="#carouselExampleIndicators" data-slide-to="5" class=""></li>
                           <li data-target="#carouselExampleIndicators" data-slide-to="6" class=""></li>
                           <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
                        </ol>
                        <div class="carousel-inner">
                           <div class="carousel-item">
                              <img style="height: auto; width: 100%;" src="https://b.zmtcdn.com/feeding-india/a0216293d82df205e7d6e19a56d1a1661585293269.png" class="img-center img-fluid" alt="">
                           </div>
                           <div class="carousel-item">
                              <img style="height: auto; width: 100%;" src="https://cdn.discordapp.com/attachments/694578470772146237/744470487404380170/icrew_feed_the_poor_2.jpg" class="img-center img-fluid" alt="">
                           </div>
                           <div class="carousel-item active">
                              <img style="height: auto; width: 100%;" src="https://cdn.discordapp.com/attachments/694578470772146237/744471075697721454/icrew_feeding_india_3.jpg" class="img-center img-fluid" alt="">
                           </div>
                           <div class="carousel-item">
                              <img style="height: auto; width: 100%;" src="https://cdn.discordapp.com/attachments/694578470772146237/744472013044973589/icrew_feeding_india_4.jpg" class="img-center img-fluid" alt="">
                           </div>
                           <div class="carousel-item">
                              <img style="height: auto; width: 100%;" src="https://cdn.discordapp.com/attachments/694578470772146237/744472703897174036/icrew_feeding_the_poor_5.jpg" class="img-center img-fluid" alt="">
                           </div>
                           <div class="carousel-item">
                              <img style="height: auto; width: 100%;" src="https://cdn.discordapp.com/attachments/694578470772146237/744473611909201990/icrew_6.jpg" class="img-center img-fluid" alt="">
                           </div>
                           <div class="carousel-item">
                              <img style="height: auto; width: 100%;" src="https://cdn.discordapp.com/attachments/694578470772146237/744474193516822590/icrew_7.jpg" class="img-center img-fluid" alt="">
                           </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 py-5">
                  <p class="lead text-dark">
                  </p>
                  <h1>Do you see that smile? <br>
                     <small>Thanks to our donors, partners &amp; volenteers we've rescued <strong>1,82,109
                     people</strong> so far
                     from <strong><i>hunger</i></strong> and put a <i><strong>smile</strong></i> on their
                     face</small>
                  </h1>
                  * All numbers mentioned here are for representation purposes
                  <p></p>
               </div>
               <div class="col-lg-12 py-5">
                  <ul class="C-donate-nav nav nav-pills nav-fill flex-column flex-sm-row" id="myTab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link mb-sm-3 active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">
                           <img src="https://www.pngrepo.com/png/31041/180/rupee.png" style="width: 50px; height: auto;">
                           <br><br>
                           <h3>Donate Money</h3>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link mb-sm-3 " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">
                           <img src="https://www.iconbunny.com/icons/media/catalog/product/1/9/1956.9-fruits-vegetables-icon-iconbunny.jpg" style="width: 50px; height: auto;">
                           <br><br>
                           <h3>Donate Food</h3>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link mb-sm-3" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                           <img src="https://image.flaticon.com/icons/svg/1305/1305723.svg" style="width: 50px; height: auto;">
                           <br><br>
                           <h3>Volunteer</h3>
                        </a>
                     </li>
                  </ul>
                  <div class="C-tab-cont mt-5 tab-content" id="myTabContent">
                     <div class="C-tab-item tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <p>
                           It Only costs INR 60 to feed an underprivileged a day. It's easier than you think.
                           The very decision you make now, will defenitely rescue someone from hunger. You will
                           instantly
                           receive a recipt of donation, and a picture of the whom you're helping to feed will be
                           published within 48 hours.
                           <br>
                           All donations are tax-exempted as eligible under section 80G of the the Income Tax Act,
                           1961. (Yet to register)
                        </p>
                        <center>
                           <a href="http://feedthepoor.online/en/money" class="btn btn-md bg-success text-white btn-animated btn-animated-y">
                              <span class="btn-inner--visible">Donate Money</span>
                              <span class="btn-inner--hidden">
                                 <svg class="svg-inline--fa fa-arrow-right fa-w-14" aria-hidden="true" data-prefix="fas" data-icon="arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path>
                                 </svg>
                                 <!-- <i class="fas fa-arrow-right"></i> -->
                              </span>
                           </a>
                        </center>
                        <p></p>
                     </div>
                     <div class="C-tab-item tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <p>
                           It Only costs INR 60 to feed an underpriviledged a day. It's easier than you think.
                           The very decision you make now, will defenitely rescue someone from hunger.
                        </p>
                        <center>
                           <a href="http://feedthepoor.online/en/coming-soon" class="btn btn-md bg-secondary text-white btn-animated btn-animated-y">
                              <span class="btn-inner--visible">Donate Money</span>
                              <span class="btn-inner--hidden">
                                 <svg class="svg-inline--fa fa-arrow-right fa-w-14" aria-hidden="true" data-prefix="fas" data-icon="arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path>
                                 </svg>
                                 <!-- <i class="fas fa-arrow-right"></i> -->
                              </span>
                           </a>
                        </center>
                        <p></p>
                     </div>
                     <div class="C-tab-item tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <p>
                           It Only costs INR 60 to feed an underpriviledged a day. It's easier than you think.
                           The very decision you make now, will defenitely rescue someone from hunger.
                        </p>
                        <center>
                           <a href="http://feedthepoor.online/en/voulenteer" class="btn btn-md bg-success text-white btn-animated btn-animated-y">
                              <span class="btn-inner--visible">Sign Up</span>
                              <span class="btn-inner--hidden">
                                 <svg class="svg-inline--fa fa-arrow-right fa-w-14" aria-hidden="true" data-prefix="fas" data-icon="arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path>
                                 </svg>
                                 <!-- <i class="fas fa-arrow-right"></i> -->
                              </span>
                           </a>
                        </center>
                        <p></p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-md-12 pr-5">
                     <img style="height: auto; width: 100%;" src="https://feedthepoor.online/en/public/images/sponsor_a_meal.png" class="img-center img-fluid rounded z-depth-3" alt="">
                  </div>
                  <div class="col-lg-4 col-md-12">
                     <div class="card bg-primary text-white">
                        <div class="card-body">
                           <h4 class="heading h3 text-white pt-3 pb-5">Hello There,<br>
                              Fill in credentials to view details
                           </h4>
                           <form class="form-primary">
                              <div class="form-group">
                                 <div class="row align-items-center">
                                    <div class="col-md-2" style="padding: 0px; margin: 0px;">
                                       <a class="btn btn-sm donate-plus-button text-dark btn-secondary">
                                          <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" data-prefix="fa" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                             <path fill="currentColor" d="M448 294.2v-76.4c0-13.3-10.7-24-24-24H286.2V56c0-13.3-10.7-24-24-24h-76.4c-13.3 0-24 10.7-24 24v137.8H24c-13.3 0-24 10.7-24 24v76.4c0 13.3 10.7 24 24 24h137.8V456c0 13.3 10.7 24 24 24h76.4c13.3 0 24-10.7 24-24V318.2H424c13.3 0 24-10.7 24-24z"></path>
                                          </svg>
                                          <!-- <i class="fa fa-plus"></i> -->
                                       </a>
                                    </div>
                                    <div class="col-md-8">
                                       <input type="text" class="form-control donate-meal-display" id="input_email" placeholder="Meals" required="">
                                    </div>
                                    <div class="col-md-2" style="padding: 0px; margin: 0px;">
                                       <a class="btn btn-sm text-dark donate-minus-button btn-secondary">
                                          <svg class="svg-inline--fa fa-minus fa-w-14" aria-hidden="true" data-prefix="fa" data-icon="minus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                             <path fill="currentColor" d="M424 318.2c13.3 0 24-10.7 24-24v-76.4c0-13.3-10.7-24-24-24H24c-13.3 0-24 10.7-24 24v76.4c0 13.3 10.7 24 24 24h400z"></path>
                                          </svg>
                                          <!-- <i class="fa fa-minus"></i> -->
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <button type="submit" class="btn btn-block donate-meal-button btn-lg bg-white mt-4 btn-animated btn-animated-x">
                                 <span class="btn-inner--visible donate-meal-button-span">Donate 60 INR</span>
                                 <span class="btn-inner--hidden">
                                    <svg class="svg-inline--fa fa-credit-card fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="credit-card" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                       <path fill="currentColor" d="M0 432c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V256H0v176zm192-68c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H204c-6.6 0-12-5.4-12-12v-40zm-128 0c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM576 80v48H0V80c0-26.5 21.5-48 48-48h480c26.5 0 48 21.5 48 48z"></path>
                                    </svg>
                                    <!-- <i class="fas fa-credit-card"></i> -->
                                 </span>
                              </button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="slice-lg">
      <div class="container">
         <div class="row py-5 align-items-center cols-xs-space cols-sm-space cols-md-space">
            <div class="col-md-12">
               <div class="campaign custom--card">
                  <div class="wrapper" style="background: url('https://cdn.discordapp.com/attachments/546410461193699334/745487084713672825/mission_daily_meal_website.png') center/cover no-repeat;">
                     <div class="custom--header">
                        <div class="date">
                           <span class="text-light">14,239.00 INR Raised</span>
                        </div>
                     </div>
                     <div class="data">
                        <div class="content">
                           <span class="author">Campaigns</span>
                           <h1 class="title"><a href="#">Mission: <i> Daily Meal</i></a></h1>
                           <p class="text py-5">This Campaign was launched by icrewsystems to raise donations to serve daily meals to all the underprivledged</p>
                           <a href="http://feedthepoor.online/en/mission" class="btn btn-primary btn-sm">Take part in this campaign</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- <section class="py-xl">
      <span class="mask bg-primary alpha-6"></span>
      <div class="container d-flex align-items-center no-padding">
          <div class="col">
              <div class="row">

              </div>
          </div>
      </div>
      </section> -->
@endsection
