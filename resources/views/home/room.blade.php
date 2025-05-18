<style>
   .room_img {
        position: relative;
        overflow: hidden;
   }

   .room-type-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: #dc3545;
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 0.85rem;
        font-weight: bold;
        z-index: 2;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
   }
</style>

<div class="our_room">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Our Room</h2>
               <p>Experience luxury and comfort—book your room today for an unforgettable stay!</p>
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
                  <span class="room-type-badge">{{$rooms->room_type}}</span>
               </div>
               <div class="bed_room">
                  <h3>{{$rooms->room_title}}</h3>
                  <p style="padding: 10px;">{!! Str::limit($rooms->description)!!}</p>
                  @auth
                  <a href="{{url('room_details', $rooms->id)}}" class="btn btn-danger">Room Details</a>
                  @else
                  <a href="{{url('/login')}}" class="btn btn-danger">Room Details</a>
                  @endauth
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>