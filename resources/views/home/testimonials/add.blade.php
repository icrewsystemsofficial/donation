@extends('layouts.layouts')
@section('css')
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
  />

  <style media="screen">
    .heading3{
      padding-left: 8%;
    }
  </style>
@endsection

@section('js')
<!-- Axios JS, for client side API calls. -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  function verifyTestimonialEmail() {
    var inputEmail = document.getElementById('input_email').value;
    if(inputEmail == '') {
      swal.fire({
        icon: 'warning',
        text: 'Please fill in your email address that you used while donating'
      });
    } else {
      var apiURL = "{{ url('/api/verify') }}";
      axios.post(apiURL, {
        email: inputEmail
      })
      .then(function (response) {
        if(response.data.status == 200) {
          swal.fire({
            icon: 'success',
            text: response.data.message
          });

          //Hiding the first container, and showing the second container.
          var testimonialContainer = document.getElementById('testimonialContainer');
          var verifyContainer = document.getElementById('verifyContainer');
          testimonialContainer.style.display = 'block';
          verifyContainer.style.display = 'none';

          //Filling up the next form from the data retrived from the API
          document.getElementById('full_name_disp').value = response.data.name;
          document.getElementById('full_name').value = response.data.name;
          document.getElementById('email_disp').value = response.data.email;
          document.getElementById('email').value = response.data.email;

        } else {
          swal.fire({
            icon: 'error',
            text: response.data.message
          });
        }
      })
      .catch(function (error) {
        console.log(error);
      });
    }
  }
</script>
@endsection

@section('content')

<section class="slice slice-xl bg-secondary">
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-12">
        <p class="lead mt-3 lh-180 animated" data-animation-in="fadeInUp" data-animation-delay="2500">
        <span style="font-size: 2.2rem;">
          What's on your mind about
        <strong>#feedThePoor</strong> ?
        </span> <br />
          Tell us all about your experience with us
        </p>
      </div>
    </div>
  </div>
</section>


<section class="slice">
  @if(!session()->has('success') && $errors->isEmpty())
  <div id="verifyContainer" class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Attention</strong> You need to donate first in-order for us to publish your testimonial.

          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      @if(isset($testimonials) && $testimonials->count()>0)
      <div class="col-md-8">
        <div class="px-5 my-5">
          <div class="testimonial-slider">
            <div class="testimonial-slider__wrp swiper-wrapper">
              @foreach($testimonials as $testimonial)
              <div class="testimonial-slider__item swiper-slide">
                <div class="testimonial-slider__img">
                    <img src="https://cdn.discordapp.com/attachments/720604361310470146/769171117696483328/testimonials-icon.png" alt="">
                </div>
                <div class="testimonial-slider__content">
                    <span class="testimonial-slider__code">{{ $testimonial->created_at->format('j M Y') }}</span>
                    <div class="testimonial-slider__title">{{ $testimonial->name }}</div>
                    <div class="testimonial-slider__text">
                      {{ \Illuminate\Support\Str::limit($testimonial->message,50) }}<br><br>
                      <a class="btn btn-primary text-white" href="{{ url('/testimonials/view/'.$testimonial->slug) }}"> View </a>
                    </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="testimonial-slider__pagination"></div>
          </div>

        </div>
      </div>
      <div class="col-md-4">
      @else
      <div class="col-md-12">
      @endif
        <div class="card bg-tertiary text-white">
          <div class="card-body">
            <p class="text-light">
              <ol>
                <li>
                  You need to donate before you could share your experience.
                </li>
                <li>
                  We will publish your only your name & testimonial. Other details can remain anonymous
                </li>
                <li>
                  We will need to verify your email ID against our donation database
                </li>
                <li>
                  If you wish to make a general testimonial, get in touch with us via email
                </li>
              </ol>

              <p class="text-right">
                <label class="d-block">I understand</label>
                <label class="toggle-switch">
                  <input type="checkbox">
                  <span class="toggle-switch-slider rounded-circle"></span>
                </label>
              </p>
            </p>
            <h4 class="heading h3 text-white">
              Are you ready?
              <small><br />
                Let's get you started 😇
              </small>
            </h4>
            <form class="form py-5">
              <div class="form-group">
                <input type="email" class="form-control" id="input_email" name="email" placeholder="Your email" required>
              </div>
              <button onclick="verifyTestimonialEmail();" type="button" class="btn btn-block btn-lg bg-success text-white mt-4">Verify</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  <div class="container d-flex align-items-center no-padding">

    <div class="col">
      @error('general')
      <div class="row">
        <div class="col-md-12">
          <div class="card bg-danger text-white">
            <div class="card-body">
              @error('general_title')
              <h2 class="heading pt-3 pb-2 text-white">
                {{ $message }}<br />
              </h2>
              @enderror
              @error('general_msg')
              <p class="mb-5">
                {{ $message }}
              </p>
              @enderror
              @error('btn_link')
              <a class="btn btn-block btn-sm bg-white text-blue btn-animated btn-animated-y" href="{{ $message }}">
                <span class="btn-inner--visible">@error('btn_text') {{ $message }} @enderror</span>
                <span class="btn-inner--hidden"><i class="fas fa-arrow-right"></i></span>
              </a>
              @enderror
            </div>
          </div>
        </div>
      </div>
      <br><br>
      @enderror
      @if(session()->has('success'))
      <div class="row">
        <div class="col-md-12">
          <div class="card bg-success text-white">
            <div class="card-body">
              <h2 class="heading pt-3 pb-2 text-white">
                Thank you for your testimonial!<br />
              </h2>
              <p class="mb-5">
                Your testimonial has been submitted succesfully! Each testimonial goes a long way in reaching more people who can make a change! Thank you for taking the time to submit a testimonial! We'll inform you when the testimonial goes live on our website!
              </p>
            </div>
          </div>
        </div>
      </div>
      <br><br>
      @else
      <div class="row" id="testimonialContainer"  @if($errors->isEmpty()) style="display: none;" @endif>
        <div class="col-md-12">
            <div class="card bg-tertiary text-white">
              <div class="card-body">
                <h2 class="heading pt-3 pb-2 text-white">
                  How was your experience with <strong>#feed</strong>ThePoor?<br />
                </h2>
                <p class="mb-5">
                  Please note that testimonials can only be submitted after you've donated. To donate now, <strong><a href="{{ url('/money') }}">click here</a></strong>. All fields are required.
                </p>
                <form method="POST" action="{{ url('/testimonialsuccess') }}">
                  <div class="form-row">
                    @csrf
                    <div class="col-md-12 mb-3">
                      <label for="full_name">Full Name</label>
                      <input type="text" value="{{ old('full_name') }}" class="form-control @error('full_name') is-invalid @enderror" id="full_name_disp" disabled placeholder="What do we call you?" name="full_name_disp" required>
                      <input type="hidden" {{ old('full_name') }} class="form-control" id="full_name" placeholder="What do we call you?" name="full_name" required>
                      @error('full_name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div><br>
                  <div class="form-row">
                    <div class="col-lg-12 mb-3">
                      <label for="email">Email ID: (which was used while donation)</label>
                      <input type="email" value="{{ old('email') }}" autocomplete="on" class="form-control @error('email') is-invalid @enderror" disabled id="email_disp" name="email_disp" placeholder="Email ID">
                      <input type="hidden" value="{{ old('email') }}" autocomplete="on" class="form-control" id="email" name="email" placeholder="Email ID" required>
                      @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div><br>
                  <div class="form-row">
                    <div class="col-lg-12 mb-3">
                      <label for="message">Testimonial:</label>
                      <textarea name="message" id="message" rows="8" cols="125" class="form-control @error('message') is-invalid @enderror" placeholder="Express your thoughts here...">{{ old('message') }}</textarea>
                      @error('message')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                  <button class="btn btn-primary" type="submit">Submit form</button> &nbsp;&nbsp;&nbsp;&nbsp;
                  <button class="btn btn-warning" type="reset">Reset</button>
                </form>
              </div><br>
            </div>
        </div>
      </div>
    </div>
  </div>
  @endif
</section>
<section class="slice bg-primary">
  <div class="container">
    <div class="row align-items-center cols-xs-space cols-sm-space cols-md-space text-center text-lg-left">
      <div class="col-lg-12">
        <h1 class="heading h2 text-white strong-500">
            We're more than thrilled
        </h1>
        <p class="text-white">
          It's absolutely amazing for the team to hear what you feel about <strong>#feed</strong>ThePoor! And the best part is, you would help us reach even more changemakers!
        </p>
        <p class="lead text-white mb-0"></p>
      </div>
    </div>
  </div>
</section>

@endsection
