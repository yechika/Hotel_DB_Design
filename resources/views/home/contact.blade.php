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
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.468542591376!2d106.77967977591382!3d-6.201753160755265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6dcc7d2c4ad%3A0x209cb1eef39be168!2sBINUS%20University%2C%20Kampus%20BINUS%20Anggrek!5e0!3m2!1sen!2sid!4v1740490099257!5m2!1sen!2sid"
                            width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen="">
                        </iframe>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>