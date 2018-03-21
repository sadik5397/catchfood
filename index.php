<?php  
include_once 'parts/head.php';
include_once 'parts/nav.php';

?>

<body class="index-page bg--secondary">
<div class="page-header header-filter clear-filter purple-filter header-small" data-parallax="true" style="background-image: url('assets/img/kit/bg2.jpg');">
   <div class="container">
      <div class="row">         
         <div class="col-md-6">
            <div class="card card-nav-tabs">                     
                     <div class="card-body">
                        <form>
                           <div class="form-row">
                              <div class="form-group col-md-12">
                                 <label class="bmd-label-floating">Search Keyword</label>                                  
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                           <div class="form-row">
                              <div class="form-group col-md-6">
                                 <select class="form-control">
                                    <option selected>Select a Category</option>
                                    <option>...</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-6">
                                 <select class="form-control">
                                    <option selected>Select An Area</option>
                                    <option>...</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-row">
                              <div class="form-group col-md-6">
                                 <select class="form-control">
                                    <option selected>Select a Category</option>
                                    <option>...</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-6">
                                 <select class="form-control">
                                    <option selected>Select An Area</option>
                                    <option>...</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-row">
                              <div class="form-group col-3">
                                 <button type="submit" class="btn btn-default brown darken-3 ml-auto mr-auto">Search</button>      
                              </div>
                              <div class="form-group col-9">
                                 <p class="form-control-static btn-static capitalize text-gray text-darken-5">Or Click <a href="/restaurant?view=all">here</a> to View all Restaurants</p>
                              </div>
                           </div>
                           
                        </form>
                     </div>
                  </div>
         </div>
         <div class="col-md-6">
            <div class="card card-nav-tabs card-carousel black">
                     <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                           <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                           <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                           <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                           <div class="carousel-item active">
                              <img class="d-block w-100" src="https://picsum.photos/858/427" alt="First slide">
                              <div class="carousel-caption d-none d-md-block">
                                 <h4>
                                    <i class="material-icons">location_on</i>
                                    Yellowstone National Park, United States
                                 </h4>
                              </div>
                           </div>
                           <div class="carousel-item">
                              <img class="d-block w-100" src="https://picsum.photos/858/427" alt="Second slide">
                              <div class="carousel-caption d-none d-md-block">
                                 <h4>
                                    <i class="material-icons">location_on</i>
                                    Somewhere Beyond, United States
                                 </h4>
                              </div>
                           </div>
                           <div class="carousel-item">
                              <img class="d-block w-100" src="https://picsum.photos/858/427" alt="Third slide">
                              <div class="carousel-caption d-none d-md-block">
                                 <h4>
                                    <i class="material-icons">location_on</i>
                                    Yellowstone National Park, United States
                                 </h4>
                              </div>
                           </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <i class="material-icons">keyboard_arrow_left</i>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <i class="material-icons">keyboard_arrow_right</i>
                        <span class="sr-only">Next</span>
                        </a>
                     </div>
                  </div>
                  <!-- End Carousel Card -->
         </div>
      </div>
   </div>
</div>
<!-- three cards -->
<div class="container">
<div class="row main main-raised transparent no-box-shadow has-minus-margin">
   <div class="col">
      <div class="card bg-dark text-white z-depth-3">
         <img class="card-img" src="https://picsum.photos/540/220" alt="Card image">              
      </div>
   </div>
   <div class="col">
      <div class="card bg-dark text-white z-depth-3">
         <img class="card-img" src="https://picsum.photos/540/220" alt="Card image">              
      </div>
   </div>
   <div class="col">
      <div class="card bg-dark text-white z-depth-3">
         <img class="card-img" src="https://picsum.photos/540/220" alt="Card image">              
      </div>
   </div>
</div>

<!-- Recent REviews -->
<div class="row main main-raised transparent no-box-shadow">
   <div class="col-md-12">
      <div class="spacing-80"></div>
      <div class="card text-center z-depth-4">
         <div class="card-header white">
            <ul class="nav nav-tabs pull-left">
               <li class="nav-item">
                  <a class="nav-link active" href="#"><i class="material-icons brown-text text-darken-3">comment</i></a>
               </li>
               <li class="nav-item"><a class="nav-link">  </a></li>
               <li class="nav-item">
                  <a class="nav-link no-padding-forced" href="#">
                     <h3 class="title brown-text text-darken-3" style="margin-top: 5px;"> Recent Reviews</h3>
                  </a>
               </li>
            </ul>
            <ul class="nav nav-tabs pull-right brown-text text-darken-3">
               <li class="nav-item">
                  <a class="nav-link z-depth-2 hoverable brown darken-3" href="#"><i class="material-icons">add</i> Add New Review</a>
               </li>
               <li class="nav-item"><a class="nav-link"></a></li>
               <li class="nav-item ">
                  <a class="nav-link z-depth-2 hoverable brown darken-3" href="#">View All</a>
               </li>
            </ul>
         </div>
         <div class="card-body">
            <div class="container">
               <div class="row">                  
                     <div class="col-md-4">
                        <div class="card card-product" data-count="2">
                           <div class="card-image" data-header-animation="true">
                              <a href="#pablo">
                              <img class="img" src="http://demos.creative-tim.com/material-dashboard-pro/assets/img/card-2.jpeg">
                              </a>
                           </div>
                           <div class="card-content">
                              <div class="card-actions">
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                                 <i class="material-icons">art_track</i>
                                 </button>
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Like">
                                 <i class="material-icons">thumb_up</i>
                                 </button>
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Dislike">
                                 <i class="material-icons">thumb_down</i>
                                 </button>
                                 <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Comment">
                                 <i class="material-icons">comment</i>
                                 </button>
                                 <button type="button" class="btn btn-danger dropdown-toggle btn-simple" rel="tooltip" data-toggle="dropdown" data-placement="right" title="" data-original-title="Share">
                                 <i class="material-icons">share</i>
                                 </button>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <h6 class="dropdown-header">Dropdown header</h6>
                                    <a href="#pablo" class="dropdown-item">Me</a>
                                    <a href="#pablo" class="dropdown-item">Settings and other stuff</a>
                                    <a href="#pablo" class="dropdown-item">Sign out</a>
                                 </div>
                              </div>
                              <h4 class="card-title text-left">
                                 <a href="#pablo">Cozy 5 Stars Apartment</a>
                              </h4>
                              <div class="card-descriptiontext-left truncate">
                                 The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
                              </div>
                           </div>
                           <div class="card-footer ">
                              <div class="author">
                                 <a href="#pablo">
                                 <img src="assets/img/kit/pro/faces/marc.jpg" alt="..." class="avatar img-raised">
                                 <span>Mike John</span>
                                 </a>
                              </div>
                              <div class="stats ml-auto">
                                 <i class="material-icons">schedule</i> 5 min read
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card card-product" data-count="2">
                           <div class="card-image" data-header-animation="true">
                              <a href="#pablo">
                              <img class="img" src="http://demos.creative-tim.com/material-dashboard-pro/assets/img/card-2.jpeg">
                              </a>
                           </div>
                           <div class="card-content">
                              <div class="card-actions">
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                                 <i class="material-icons">art_track</i>
                                 </button>
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Like">
                                 <i class="material-icons">thumb_up</i>
                                 </button>
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Dislike">
                                 <i class="material-icons">thumb_down</i>
                                 </button>
                                 <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Comment">
                                 <i class="material-icons">comment</i>
                                 </button>
                                 <button type="button" class="btn btn-danger dropdown-toggle btn-simple" rel="tooltip" data-toggle="dropdown" data-placement="right" title="" data-original-title="Share">
                                 <i class="material-icons">share</i>
                                 </button>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <h6 class="dropdown-header">Dropdown header</h6>
                                    <a href="#pablo" class="dropdown-item">Me</a>
                                    <a href="#pablo" class="dropdown-item">Settings and other stuff</a>
                                    <a href="#pablo" class="dropdown-item">Sign out</a>
                                 </div>
                              </div>
                              <h4 class="card-title text-left">
                                 <a href="#pablo">Cozy 5 Stars Apartment</a>
                              </h4>
                              <div class="card-descriptiontext-left truncate">
                                 The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
                              </div>
                           </div>
                           <div class="card-footer ">
                              <div class="author">
                                 <a href="#pablo">
                                 <img src="assets/img/kit/pro/faces/marc.jpg" alt="..." class="avatar img-raised">
                                 <span>Mike John</span>
                                 </a>
                              </div>
                              <div class="stats ml-auto">
                                 <i class="material-icons">schedule</i> 5 min read
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card card-product" data-count="2">
                           <div class="card-image" data-header-animation="true">
                              <a href="#pablo">
                              <img class="img" src="http://demos.creative-tim.com/material-dashboard-pro/assets/img/card-2.jpeg">
                              </a>
                           </div>
                           <div class="card-content">
                              <div class="card-actions">
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                                 <i class="material-icons">art_track</i>
                                 </button>
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Like">
                                 <i class="material-icons">thumb_up</i>
                                 </button>
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Dislike">
                                 <i class="material-icons">thumb_down</i>
                                 </button>
                                 <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Comment">
                                 <i class="material-icons">comment</i>
                                 </button>
                                 <button type="button" class="btn btn-danger dropdown-toggle btn-simple" rel="tooltip" data-toggle="dropdown" data-placement="right" title="" data-original-title="Share">
                                 <i class="material-icons">share</i>
                                 </button>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <h6 class="dropdown-header">Dropdown header</h6>
                                    <a href="#pablo" class="dropdown-item">Me</a>
                                    <a href="#pablo" class="dropdown-item">Settings and other stuff</a>
                                    <a href="#pablo" class="dropdown-item">Sign out</a>
                                 </div>
                              </div>
                              <h4 class="card-title text-left">
                                 <a href="#pablo">Cozy 5 Stars Apartment</a>
                              </h4>
                              <div class="card-descriptiontext-left truncate">
                                 The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
                              </div>
                           </div>
                           <div class="card-footer ">
                              <div class="author">
                                 <a href="#pablo">
                                 <img src="assets/img/kit/pro/faces/marc.jpg" alt="..." class="avatar img-raised">
                                 <span>Mike John</span>
                                 </a>
                              </div>
                              <div class="stats ml-auto">
                                 <i class="material-icons">schedule</i> 5 min read
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card card-product" data-count="2">
                           <div class="card-image" data-header-animation="true">
                              <a href="#pablo">
                              <img class="img" src="http://demos.creative-tim.com/material-dashboard-pro/assets/img/card-2.jpeg">
                              </a>
                           </div>
                           <div class="card-content">
                              <div class="card-actions">
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                                 <i class="material-icons">art_track</i>
                                 </button>
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Like">
                                 <i class="material-icons">thumb_up</i>
                                 </button>
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Dislike">
                                 <i class="material-icons">thumb_down</i>
                                 </button>
                                 <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Comment">
                                 <i class="material-icons">comment</i>
                                 </button>
                                 <button type="button" class="btn btn-danger dropdown-toggle btn-simple" rel="tooltip" data-toggle="dropdown" data-placement="right" title="" data-original-title="Share">
                                 <i class="material-icons">share</i>
                                 </button>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <h6 class="dropdown-header">Dropdown header</h6>
                                    <a href="#pablo" class="dropdown-item">Me</a>
                                    <a href="#pablo" class="dropdown-item">Settings and other stuff</a>
                                    <a href="#pablo" class="dropdown-item">Sign out</a>
                                 </div>
                              </div>
                              <h4 class="card-title text-left">
                                 <a href="#pablo">Cozy 5 Stars Apartment</a>
                              </h4>
                              <div class="card-descriptiontext-left truncate">
                                 The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
                              </div>
                           </div>
                           <div class="card-footer ">
                              <div class="author">
                                 <a href="#pablo">
                                 <img src="assets/img/kit/pro/faces/marc.jpg" alt="..." class="avatar img-raised">
                                 <span>Mike John</span>
                                 </a>
                              </div>
                              <div class="stats ml-auto">
                                 <i class="material-icons">schedule</i> 5 min read
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card card-product" data-count="2">
                           <div class="card-image" data-header-animation="true">
                              <a href="#pablo">
                              <img class="img" src="http://demos.creative-tim.com/material-dashboard-pro/assets/img/card-2.jpeg">
                              </a>
                           </div>
                           <div class="card-content">
                              <div class="card-actions">
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                                 <i class="material-icons">art_track</i>
                                 </button>
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Like">
                                 <i class="material-icons">thumb_up</i>
                                 </button>
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Dislike">
                                 <i class="material-icons">thumb_down</i>
                                 </button>
                                 <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Comment">
                                 <i class="material-icons">comment</i>
                                 </button>
                                 <button type="button" class="btn btn-danger dropdown-toggle btn-simple" rel="tooltip" data-toggle="dropdown" data-placement="right" title="" data-original-title="Share">
                                 <i class="material-icons">share</i>
                                 </button>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <h6 class="dropdown-header">Dropdown header</h6>
                                    <a href="#pablo" class="dropdown-item">Me</a>
                                    <a href="#pablo" class="dropdown-item">Settings and other stuff</a>
                                    <a href="#pablo" class="dropdown-item">Sign out</a>
                                 </div>
                              </div>
                              <h4 class="card-title text-left">
                                 <a href="#pablo">Cozy 5 Stars Apartment</a>
                              </h4>
                              <div class="card-descriptiontext-left truncate">
                                 The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
                              </div>
                           </div>
                           <div class="card-footer ">
                              <div class="author">
                                 <a href="#pablo">
                                 <img src="assets/img/kit/pro/faces/marc.jpg" alt="..." class="avatar img-raised">
                                 <span>Mike John</span>
                                 </a>
                              </div>
                              <div class="stats ml-auto">
                                 <i class="material-icons">schedule</i> 5 min read
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card card-product" data-count="2">
                           <div class="card-image" data-header-animation="true">
                              <a href="#pablo">
                              <img class="img" src="http://demos.creative-tim.com/material-dashboard-pro/assets/img/card-2.jpeg">
                              </a>
                           </div>
                           <div class="card-content">
                              <div class="card-actions">
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                                 <i class="material-icons">art_track</i>
                                 </button>
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Like">
                                 <i class="material-icons">thumb_up</i>
                                 </button>
                                 <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Dislike">
                                 <i class="material-icons">thumb_down</i>
                                 </button>
                                 <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Comment">
                                 <i class="material-icons">comment</i>
                                 </button>
                                 <button type="button" class="btn btn-danger dropdown-toggle btn-simple" rel="tooltip" data-toggle="dropdown" data-placement="right" title="" data-original-title="Share">
                                 <i class="material-icons">share</i>
                                 </button>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <h6 class="dropdown-header">Dropdown header</h6>
                                    <a href="#pablo" class="dropdown-item">Me</a>
                                    <a href="#pablo" class="dropdown-item">Settings and other stuff</a>
                                    <a href="#pablo" class="dropdown-item">Sign out</a>
                                 </div>
                              </div>
                              <h4 class="card-title text-left">
                                 <a href="#pablo">Cozy 5 Stars Apartment</a>
                              </h4>
                              <div class="card-descriptiontext-left truncate">
                                 The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
                              </div>
                           </div>
                           <div class="card-footer ">
                              <div class="author">
                                 <a href="#pablo">
                                 <img src="assets/img/kit/pro/faces/marc.jpg" alt="..." class="avatar img-raised">
                                 <span>Mike John</span>
                                 </a>
                              </div>
                              <div class="stats ml-auto">
                                 <i class="material-icons">schedule</i> 5 min read
                              </div>
                           </div>
                        </div>
                     </div>                 
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="main main-raised transparent no-box-shadow">
   <div class="card">
      <div class="card card-raised card-carousel">
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="d-block w-100" src="https://picsum.photos/1704/400" alt="First slide">
                  <div class="carousel-caption d-none d-md-block">
                     <h4>
                        <i class="material-icons">location_on</i> Yellowstone National Park, United States
                     </h4>
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="d-block w-100" src="https://picsum.photos/1704/400" alt="First slide">
                  <div class="carousel-caption d-none d-md-block">
                     <h4>
                        <i class="material-icons">location_on</i> Yellowstone National Park, United States
                     </h4>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row main main-raised transparent no-box-shadow">
   <div class="col-md-12">
      <div class="spacing-80"></div>
      <div class="card text-center z-depth-4">
         <div class="card-header white">
            <ul class="nav nav-tabs pull-left">
               <li class="nav-item">
                  <a class="nav-link active" href="#"><i class="material-icons brown-text text-darken-3">restaurant_menu</i></a>
               </li>
               <li class="nav-item"><a class="nav-link">  </a></li>
               <li class="nav-item">
                  <a class="nav-link no-padding-forced" href="#">
                     <h3 class="title brown-text text-darken-3" style="margin-top: 5px;"> Most Popular Restaurants</h3>
                  </a>
               </li>
            </ul>
            <ul class="nav nav-tabs pull-right brown-text text-darken-3">
               <li class="nav-item"><a class="nav-link"></a></li>
               <li class="nav-item ">
                  <a class="nav-link z-depth-2 hoverable brown darken-3" href="#">View All Restaurants</a>
               </li>
            </ul>
         </div>
         <div class="card-body">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-4">
                     <div class="card card-blog text-left">
                          <div class="card-header card-header-image">
                              <a href="#pablo">
                                  <img class="img" src="assets/img/kit/pro/examples/blog8.jpg">
                              </a>
                          <div class="colored-shadow" style="background-image: url(&quot;assets/img/kit/pro/examples/blog8.jpg&quot;); opacity: 1;"></div></div>
                          <div class="card-body ">
                            <h4 class="card-title">
                                  <a href="#pablo">Food Square</a>
                              </h4>
                              <h6 class="card-category brown-text text-darken-3">
                                  Uttara, Dhaka
                              </h6>
                             
                          </div>
                          <div class="card-footer ">
                              <div class="author">
                                  <a href="#pablo">                                      
                                      <span>Burger Shop</span>
                                  </a>
                              </div>
                              <div class="stats ml-auto">
                                  <select class="rating readonly" data-current-rating="4.2" autocomplete="off">
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                    
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                     <div class="card card-blog text-left">
                          <div class="card-header card-header-image">
                              <a href="#pablo">
                                  <img class="img" src="assets/img/kit/pro/examples/blog8.jpg">
                              </a>
                          <div class="colored-shadow" style="background-image: url(&quot;assets/img/kit/pro/examples/blog8.jpg&quot;); opacity: 1;"></div></div>
                          <div class="card-body ">
                            <h4 class="card-title">
                                  <a href="#pablo">Food Square</a>
                              </h4>
                              <h6 class="card-category brown-text text-darken-3">
                                  Uttara, Dhaka
                              </h6>
                             
                          </div>
                          <div class="card-footer ">
                              <div class="author">
                                  <a href="#pablo">                                      
                                      <span>Burger Shop</span>
                                  </a>
                              </div>
                              <div class="stats ml-auto">
                                  <select class="rating readonly" data-current-rating="4.2" autocomplete="off">
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                    
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                     <div class="card card-blog text-left">
                          <div class="card-header card-header-image">
                              <a href="#pablo">
                                  <img class="img" src="assets/img/kit/pro/examples/blog8.jpg">
                              </a>
                          <div class="colored-shadow" style="background-image: url(&quot;assets/img/kit/pro/examples/blog8.jpg&quot;); opacity: 1;"></div></div>
                          <div class="card-body ">
                            <h4 class="card-title">
                                  <a href="#pablo">Food Square</a>
                              </h4>
                              <h6 class="card-category brown-text text-darken-3">
                                  Uttara, Dhaka
                              </h6>
                             
                          </div>
                          <div class="card-footer ">
                              <div class="author">
                                  <a href="#pablo">                                      
                                      <span>Burger Shop</span>
                                  </a>
                              </div>
                              <div class="stats ml-auto">
                                  <select class="rating readonly" data-current-rating="4.2" autocomplete="off">
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                    
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                     <div class="card card-blog text-left">
                          <div class="card-header card-header-image">
                              <a href="#pablo">
                                  <img class="img" src="assets/img/kit/pro/examples/blog8.jpg">
                              </a>
                          <div class="colored-shadow" style="background-image: url(&quot;assets/img/kit/pro/examples/blog8.jpg&quot;); opacity: 1;"></div></div>
                          <div class="card-body ">
                            <h4 class="card-title">
                                  <a href="#pablo">Food Square</a>
                              </h4>
                              <h6 class="card-category brown-text text-darken-3">
                                  Uttara, Dhaka
                              </h6>
                             
                          </div>
                          <div class="card-footer ">
                              <div class="author">
                                  <a href="#pablo">                                      
                                      <span>Burger Shop</span>
                                  </a>
                              </div>
                              <div class="stats ml-auto">
                                  <select class="rating readonly" data-current-rating="4.2" autocomplete="off">
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                    
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                     <div class="card card-blog text-left">
                          <div class="card-header card-header-image">
                              <a href="#pablo">
                                  <img class="img" src="assets/img/kit/pro/examples/blog8.jpg">
                              </a>
                          <div class="colored-shadow" style="background-image: url(&quot;assets/img/kit/pro/examples/blog8.jpg&quot;); opacity: 1;"></div></div>
                          <div class="card-body ">
                            <h4 class="card-title">
                                  <a href="#pablo">Food Square</a>
                              </h4>
                              <h6 class="card-category brown-text text-darken-3">
                                  Uttara, Dhaka
                              </h6>
                             
                          </div>
                          <div class="card-footer ">
                              <div class="author">
                                  <a href="#pablo">                                      
                                      <span>Burger Shop</span>
                                  </a>
                              </div>
                              <div class="stats ml-auto">
                                  <select class="rating readonly" data-current-rating="4.2" autocomplete="off">
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                    
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                     <div class="card card-blog text-left">
                          <div class="card-header card-header-image">
                              <a href="#pablo">
                                  <img class="img" src="assets/img/kit/pro/examples/blog8.jpg">
                              </a>
                          <div class="colored-shadow" style="background-image: url(&quot;assets/img/kit/pro/examples/blog8.jpg&quot;); opacity: 1;"></div></div>
                          <div class="card-body ">
                            <h4 class="card-title">
                                  <a href="#pablo">Food Square</a>
                              </h4>
                              <h6 class="card-category brown-text text-darken-3">
                                  Uttara, Dhaka
                              </h6>
                             
                          </div>
                          <div class="card-footer ">
                              <div class="author">
                                  <a href="#pablo">                                      
                                      <span>Burger Shop</span>
                                  </a>
                              </div>
                              <div class="stats ml-auto">
                                  <select class="rating readonly" data-current-rating="4.2" autocomplete="off">
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                    
                                  </select>
                              </div>
                          </div>
                     </div>
                  </div>
               </div>
               <div class="spacing-40"></div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="main main-raised transparent no-box-shadow">
   <div class="card">
      <div class="card card-raised card-carousel">
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="d-block w-100" src="https://picsum.photos/1704/400" alt="First slide">
                  <div class="carousel-caption d-none d-md-block">
                     <h4>
                        <i class="material-icons">location_on</i> Yellowstone National Park, United States
                     </h4>
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="d-block w-100" src="https://picsum.photos/1704/400" alt="First slide">
                  <div class="carousel-caption d-none d-md-block">
                     <h4>
                        <i class="material-icons">location_on</i> Yellowstone National Park, United States
                     </h4>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<?php include_once 'parts/footer.php'; ?>