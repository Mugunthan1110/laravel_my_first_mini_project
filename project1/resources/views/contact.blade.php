@extends('layouts.layout')

    @section('content')
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4" 
        style='background-image:url(images/bg01.png);'>
            <div class="container">
                <div class="text-center my-5" style="color:white;">
                    <h1 class="fw-bolder"> Contact Us!</h1>
                    <p class="lead mb-0">If you want know more about us don't hesitate to buzz us</p>
                </div>
                <div style="color:white;">
                    <p>E-mail :📧jaffnamugunthan@gmail.com</p>
                    <p>TP No : 📱 0776247255 (Mon to Fri 9am-6pm)</p>
                </div>
            </div>
        </header>
        <!-- Page content-->

        <!-- Contact Form -->
        <main class="container">
    <section id="contact-us">
        <h2>Get in Touch!</h2>
        
        <!-- contact info -->
        <div class="container">
            <div class="contact-info">
                
                <div class="specific-info">
                  
                    <div>
                        <p class="subtitle">Send us your query anytime!</p>
                    </div>
                </div>
            </div>
            

                    <!-- Contact Form -->
                    <div class="contact-form">
                    <form action="" method="post">
                    @csrf
                    <!-- Name -->
                    <label for="name"><span>Name:</span></label>
                    <input type="text" id="name" name="name" value="{{old('name')}}" />
                    @error('name')
                    <p style="color:red; padding:5px;">{{$message}}</p>
                    @enderror
                    <!-- Email -->
                    <label for="email"><span>Email:</span></label>
                    <input type="text" id="email" name="email" value="{{old('email')}}" />
                    @error('email')
                    <p style="color:red; padding:5px;">{{$message}}</p>
                    @enderror
                    <!-- Subject -->
                    <label for="subject"><span>Subject:</span></label>
                    <input type="text" id="Subject" name="subject" value="{{old('subject')}}" />
                    @error('subject')
                    <p style="color:red; padding:5px;">{{$message}}</p>
                    @enderror
                    <!-- Message -->
                    <label for="message"><span>Message:</span></label>
                    <textarea id="message" name="message">{{old('message')}}</textarea>
                    @error('message')
                    <p style="color:red; padding:5px;">{{$message}}</p>
                    @enderror
                    <!-- Button -->
                    <input type="submit" value="Submit" />
                </form>
            </div>
        </div>
    </section>
</main>
    @endsection
        
