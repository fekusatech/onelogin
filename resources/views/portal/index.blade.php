 @extends('layouts.main')
 @section('container')
 <div class="floating-card">
     <!-- <div class="card-body"> -->
     <div class="row">
         <div class="col-12 text-center">
             <!-- <img src="{{url('assets/logo.png')}}" width="300"><br> -->
             <h3> LOGO DARMA </h3>
             <div class="pt-3"></div>
             <span><strong>Hello, <b>{Nama}</b>.</strong> Silahkan pilih aplikasi yang ini anda akses</span>
             <div class="pt-3"></div>
             <div class="row">
                 <div class="col-4 mb-4">
                     <div class="card mb-4 shadow" style="border-radius: 12px;">
                         <img class="card-img-top" alt="Thumbnail [100%x225]" style="height: 123px; width: 100%; display: block;" src="{{url('assets/feedmill.jpg')}}" data-holder-rendered="true">
                         <div class="card-body">
                             <p class="card-text"><b>Feedmill</b></p>
                         </div>
                     </div>
                 </div>
                 <div class="col-4 mb-4">
                     <div class="card mb-4 shadow" style="border-radius: 12px;">
                         <img class="card-img-top" alt="Thumbnail [100%x225]" style="height: 123px; width: 100%; display: block;" src="{{url('assets/breeding.jpg')}}" data-holder-rendered="true">
                         <div class="card-body">
                             <p class="card-text"><b>Breeding Farm</b></p>
                         </div>
                     </div>
                 </div>
                 <div class="col-4 mb-4">
                     <div class="card mb-4 shadow" style="border-radius: 12px;">
                         <img class="card-img-top" alt="Thumbnail [100%x225]" style="height: 123px; width: 100%; display: block;" src="{{url('assets/hatchery.jpg')}}" data-holder-rendered="true">
                         <div class="card-body">
                             <p class="card-text"><b>Hatchery</b></p>
                         </div>
                     </div>
                 </div>
                 <div class="col-4 mb-4">
                     <div class="card mb-4 shadow" style="border-radius: 12px;">
                         <img class="card-img-top" alt="Thumbnail [100%x225]" style="height: 123px; width: 100%; display: block;" src="{{url('assets/broiler.jpg')}}" data-holder-rendered="true">
                         <div class="card-body">
                             <p class="card-text"><b>Broiler Farm</b></p>
                         </div>
                     </div>
                 </div>
                 <div class="col-4 mb-4">
                     <div class="card mb-4 shadow" style="border-radius: 12px;">
                         <img class="card-img-top" alt="Thumbnail [100%x225]" style="height: 123px; width: 100%; display: block;" src="{{url('assets/rpa.jpeg')}}" data-holder-rendered="true">
                         <div class="card-body">
                             <p class="card-text"><b>RPA</b></p>
                         </div>
                     </div>
                 </div>
                 <div class="col-4 mb-4">
                     <div class="card mb-4 shadow" style="border-radius: 12px;">
                         <img class="card-img-top" alt="Thumbnail [100%x225]" style="height: 123px; width: 100%; display: block;" src="assets/cmms.jpg" data-holder-rendered="true">
                         <div class="card-body">
                             <p class="card-text"><b>Engineer</b></p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- </div> -->
 </div>
 @endsection