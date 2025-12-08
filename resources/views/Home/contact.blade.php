@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Contact Us</h1>

    <div class="card p-4 shadow-sm">

        <form action="#" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Your Name</label>
                <input 
                    type="text" 
                    class="form-control" 
                    name="name" 
                    placeholder="Enter your name"
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Your Email</label>
                <input 
                    type="email" 
                    class="form-control" 
                    name="email" 
                    placeholder="Enter your email"
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea 
                    class="form-control" 
                    name="message" 
                    rows="4" 
                    placeholder="Write your message..."
                ></textarea>
            </div>

            <button class="btn btn-primary">
                Send Message
            </button>
        </form>

    </div>
</div>
@endsection
