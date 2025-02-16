<div class="our_room">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Our Room</h2>
               <p>Lorem Ipsum available, but the majority have suffered </p>
            </div>
         </div>
      </div>
      <div class="row">
         @foreach($room as $rooms)
         <div class="col-md-4 col-sm-6">
            <div id="serv_hover" class="room">
               <div class="room_img">
                  <img
                     style="height: 350px; width: auto;"
                     src="room/{{$rooms->image}}" alt="#" />
               </div>
               <div class="bed_room">
                  <h3>{{$rooms->room_title}}</h3>
                  <p style="padding: 10px;">{!! Str::limit($rooms->description)!!}</p>
                  @auth
                  <a href="{{url('room_details', $rooms->id)}}" class="btn btn-primary">Room Details</a>
                  @else
                  <a href="{{url('/login')}}" class="btn btn-primary">Room Details</a>
                  @endauth
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>