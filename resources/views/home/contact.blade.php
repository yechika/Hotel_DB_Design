<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Contact Us</h2>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @if(Auth::check())
                    <form id="request" class="main_form" action="{{ url('contact') }}" method="POST">
                        @csrf
                        <div class="row">
                            <style>
                                .contactus[readonly] {
                                    cursor: not-allowed;
                                    background-color: #f5f5f5;
                                }
                            </style>

                            <div class="col-md-12">
                                <input class="contactus" type="text" name="name" value="{{ Auth::user()->name }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <input class="contactus" type="email" name="email" value="{{ Auth::user()->email }}"
                                    readonly>
                            </div>
                            <div class="col-md-12">
                                <input class="contactus" type="number" name="phone" value="{{ Auth::user()->phone ?? '' }}"
                                    readonly>
                            </div>
                            <div class="col-md-12">
                                <textarea class="textarea" name="message" placeholder=".  .  ."></textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="send_btn">Send</button>
                            </div>
                        </div>
                    </form>
                @else
                    <p style="font-size: 20px;">
                        Please <a style="color: red;" href="{{ route('login') }}">login</a> to send a message.
                    </p>
                @endif
            </div>
            <div class="col-md-6">
                <div class="map_main">
                    <div class="map-responsive">
                        <iframe
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France"
                            width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen="">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>