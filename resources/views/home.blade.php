@extends('layouts.app')

@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-primary d-flex align-items-center mb-5 py-5" id="home" style="min-height: 100vh;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 px-5 pl-lg-0 pb-5 pb-lg-0">
                    <img 
    class="img-fluid w-100 rounded-circle shadow-sm" 
    src="{{ $user && $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('images/default-profile.png') }}" 
    alt="">
                </div>
                
                
                <div class="col-lg-7 text-center text-lg-left">
                    <h1 class="display-3 text-uppercase text-primary mb-2" style="-webkit-text-stroke: 2px #3a61a1;">{{ $user?->name }}</h1>
                    <h1 class="typed-text-output d-inline font-weight-lighter text-type-color"></h1>
                    <div class="typed-text d-none">
                        @if (Session::has('message'))
                            {{ Session::get('message') }}
                        @elseif ($errors->any())
                            The Form Failed To Submit, Please Try Again
                        @else
                            Professional {{ $user?->job }}, Welcome to my Website
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5" id="about">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">About</h1>
                <h1 class="position-absolute text-uppercase text-primary">About Me</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 pb-4 pb-lg-0">
                    <img class="img-fluid rounded w-100" src="{{ asset("storage/$setting->about_photo") }}" alt="">
                </div>
                <div class="col-lg-7">
                    <h3 class="mb-4">{{ $setting->about_title }}</h3>
                    <p>{{ $setting->about_description }}</p>
                    <div class="row mb-3">
                        <div class="col-sm-6 py-2"><h6>Name: <span class="text-secondary">{{ $user?->name }}</span></h6></div>
                       
                        <div class="col-sm-6 py-2"><h6>Degree: <span class="text-secondary">Bournemouth University</span></h6></div>
                        
                        <div class="col-sm-6 py-2"><h6>Hobbies: <span class="text-secondary">Music, Art, Nature, Food</span></h6></div>
                        
        
                        
                        
                        <div class="col-sm-6 py-2"><h6>Experience: <span class="text-secondary">+10 Years</span></h6></div>
                    
                    
                        <div class="col-sm-6 py-2"><h6>LinkedIn: <a href="https://www.linkedin.com/in/stacey-monet-70a8b182/"><span class="text-secondary">https://www.linkedin.com/in/stacey-monet</span></a></h6></div>
                        
                        <div class="col-sm-6 py-2"><h6>Github: <a href="https://github.com/StaceMonet"><span class="text-secondary">{{ $setting->github_url }}</span></a></h6></div>
                    </div>
                    
                    <div>
                        <a target="_blank" href="{{ asset('storage/downloads/Stacey_Monet_CV.pdf') }}" class="btn btn-outline-primary">My CV</a>
                        <a href="#contact" class="btn btn-outline-primary mr-4">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Qualification Start -->
    <div class="container-fluid py-5" id="qualification">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Quality</h1>
                <h1 class="position-absolute text-uppercase text-primary">Experience</h1>
            </div>
            <div class="row">
               
                <div class="col-lg-6">
                    <h3 class="mb-4">Industry Experience</h3>
                    <div class="border-left border-primary pt-2 pl-4 ml-2">
                        @foreach ($experiences as $experience)
                        <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">{{ $experience->title }}</h5>
                            <p class="mb-2"><strong>{{ $experience->association }}</strong> | <small>{{ $experience->from }} - {{ $experience->to }}</small></p>
                            <p>{{ $experience->description }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                 <div class="col-lg-6">
                    <h3 class="mb-4">Education</h3>
                    <div class="border-left border-primary pt-2 pl-4 ml-2">
                        @foreach ($educations as $education)
                        <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">{{ $education->title }}</h5>
                            <p class="mb-2"><strong>{{ $education->association }}</strong> | <small>{{ $education->from }} - {{ $education->to }}</small></p>
                            <p>{{ $education->description }} </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Qualification End -->


    <!-- Skill Start -->
    <div class="container-fluid py-5" id="skill">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Skills</h1>
                <h1 class="position-absolute text-uppercase text-primary">Programming Languages</h1>
            </div>
            <div class="row align-items-center">
                @foreach($skills->split($skills->count()/3) as $row)
                <div class="col-md-6">
                    @foreach($row as $skill)
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">{{ $skill->name }}</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$skill->percent}}" aria-valuemin="0" aria-valuemax="100" style="background-color: #358e9c"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Skill End -->


    <!-- Services Start -->
    <div class="container-fluid pt-5" id="service">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Skills</h1>
                <h1 class="position-absolute text-uppercase text-primary">Frameworks / Services</h1>
            </div>
            <div class="row pb-3">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <span class="{{ $service->icon }} service-icon text-white mr-3"></span>
                        <h4 class="font-weight-bold m-0">{{ $service->name }}</h4>
                    </div>
                    <p>{{ $service->description }}</p>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Portfolio Start -->
    <div class="container-fluid pt-5 pb-3" id="portfolio">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Gallery</h1>
                <h1 class="position-absolute text-uppercase text-primary">My Portfolio</h1>
            </div>
            
            <div class="row">
                <div class="col-12 text-center mb-2">
                    <!--<li class="btn btn-sm btn-outline-primary m-1 active"  data-filter="*">All</li>-->
                    <ul class="list-inline mb-4" id="portfolio-flters">
                        @foreach ($categories as $category)
                            <li class="btn btn-sm btn-outline-primary m-1 {{ $loop->first ? 'active' : '' }}" data-filter=".{{$category->name}}">
                                {{ $category->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                @foreach ($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6 mb-4 portfolio-item {{$portfolio->category->name }}">
                        <div class="position-relative mb-2">
                            <img class="img-fluid rounded w-100" src="{{ $portfolio && $portfolio->image ? asset('storage/' . $portfolio->image) : asset('images/default-portfolio.png') }}" alt="Portfolio Image">
                            <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                                <a href="{{ asset("storage/$portfolio->image") }}"
                                   data-lightbox="portfolio"
                                   @if(!empty($portfolio->description))
                                       data-title="{{ $portfolio->description }}"
                                   @endif
                                >
                                    <i class="fa fa-plus text-white" style="font-size: 50px;"></i>
                                </a>

                                @if($portfolio->category->name === 'Websites')
                                    <a target="_blank" href="{{ $portfolio->project_url }}">
                                        <i class="fa-solid fa-link text-white" style="margin-left:20px; font-size: 50px;"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <p>Please note any works by current employer cannot be shown here for legal/privacy reasons. If you wish to find out more about recent projects please review CV or send email.</p>
        </div>
    </div>
    <!-- Portfolio End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5" id="testimonial">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Review</h1>
                <h1 class="position-absolute text-uppercase text-primary">References</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                        @foreach ($reviewers as $review)
                            <div class="text-center">
                                <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                                <h4 class="font-weight-light mb-4">{{ $review->description }}</h4>
                                <h5 class="font-weight-bold m-0">{{ $review->name }} </h5>
                                <span>{{ $review->job }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Contact Start -->
    <div class="container-fluid py-5" id="contact">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Contact</h1>
                <h1 class="position-absolute text-uppercase text-primary">Contact Me</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form text-center">
                        @if (Session::has('message'))
                        <div class="alert alert-primary" role="alert">
                          {{ Session::get('message') }}
                        </div>
                        <br>
                        @endif
                        <form id="contactForm" method="POST" action="{{ route('contact') }}">
                            @csrf
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="name" placeholder="Your Name"
                                        required name="name" value="{{old('name')}}"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="email" class="form-control p-4" id="email" placeholder="Your Email" value="{{old('email')}}"
                                        required name="email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control p-4" id="subject" placeholder="Subject" value="{{old('subject_mail')}}"
                                    required name="subject_mail"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control py-3 px-4" rows="5" id="message" placeholder="Message" name="content"
                                    required>{{old('content')}}</textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            
                            
                             <!-- Hidden input for reCAPTCHA token -->
                            <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                            
                            <div>
                                <button class="btn btn-outline-primary" type="submit" id="sendMessageButton">Send
                                    Message</button>
                            </div>
                            @if ($errors->any())
                            <br>
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                             @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Include reCAPTCHA v3 JS -->
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {action: 'submit'}).then(function (token) {
                document.getElementById('recaptcha_token').value = token;
            });
        });
    </script>


    <!-- Footer Start -->
    <div class="container-fluid bg-primary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="container text-center py-5">
            <div class="d-flex justify-content-center mb-4">
            </div>

            <p class="m-0">Website Designed by <a class="text-white font-weight-bold" href="#">Stacey Monet</a>
            </p>
            
            <p class="m-0">Original Laravel Template From <a target="_blank" href="https://github.com/YasserElgammal/Portfolio">Yasser Elgammel</a></p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Scroll to Bottom -->

    @if ($errors->any()) 
        <a href="#contact" class="scroll-to-bottom nav-link">
            <p class="fa fa-2x text-white">Fix</i>
        </a>
    @else
        <a href="#about" class="scroll-to-bottom nav-link text-white">
            <i class="fa fa-2x fa-angle-down text-white"></i>
        </a>
    @endif
    

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
          anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            const targetEl = document.querySelector(targetId);

            if (targetEl) {
              e.preventDefault();
              window.scrollTo({
                top: targetEl.offsetTop,
                behavior: 'smooth'
              });
            }
          });
        });
      });
    </script>

    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-dark px-0 back-to-top"><i class="fa fa-angle-double-up"></i></a>

@endsection
