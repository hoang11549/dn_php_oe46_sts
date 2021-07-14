@extends('index')
@section( 'content')
<div class="blog-card">
    <div class="meta">
      <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)"></div>
      <ul class="details">
        <li class="author"><a href="#">John Doe</a></li>
        <li class="date">Aug. 24, 2015</li>
        <li class="tags">
          <ul>
            <li><a href="#">HTML</a></li>
            <li><a href="#">CSS</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="description">
      <h1>Learning to Code</h1>
      <h2>Opening a door to the future</h2>
      <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>

    </div>
  </div>
  <div class="row">
    <!-- .col -->
    <div class="col-md-12 col-lg-8 col-sm-12">
        <div class="white-box">
            <h2>{{ trans('messages.CourseSb') }}</h2>
        <!--TEst Line time-------->
    <div class="wrapper">
        <div class="center-line">
            <a href="#" class="scroll-icon"><i class="fas fa-caret-up"></i></a>
        </div>
        <div class="row row-1">
            <section>
                <i class="icon far fa-circle"></i>
                <div class="details">
                <span class="title">Subject 1</span>
                <span>1st Jan 2021</span>
                </div>
                <p>Lorem ipsum dolor sit ameters consectetur adipisicing elit. Sed qui veroes praesentium maiores, sint eos vero sapiente voluptas debitis dicta dolore.</p>
                <div class="bottom">
                <a href="#">Read more</a>

                </div>
            </section>
        </div>
            <div class="row row-2">
            <section>
                <i class="icon far fa-check-circle"></i>
                <div class="details">
                    <span class="title">Subject 2</span>
                    <span>2nd Jan 2021</span>
                </div>
                <p>Lorem ipsum dolor sit ameters consectetur adipisicing elit. Sed qui veroes praesentium maiores, sint eos vero sapiente voluptas debitis dicta dolore.</p>
                <div class="bottom">
                    <a href="#">Read more</a>

                </div>
            </section>
            </div>
            <div class="row row-1">
            <section>
                <i class="icon far fa-check-circle"></i>
                <div class="details">
                    <span class="title">Subject 3</span>
                    <span>3rd Jan 2021</span>
                </div>
                    <p>Lorem ipsum dolor sit ameters consectetur adipisicing elit. Sed qui veroes praesentium maiores, sint eos vero sapiente voluptas debitis dicta dolore.</p>
                <div class="bottom">
                    <a href="#">Read more</a>

                </div>
            </section>
            </div>
            <div class="row row-2">
            <section>
                <i class="icon far fa-check-circle"></i>
                <div class="details">
                    <span class="title">Subject 4</span>
                    <span>4th Jan 2021</span>
                </div>
                    <p>Lorem ipsum dolor sit ameters consectetur adipisicing elit. Sed qui veroes praesentium maiores, sint eos vero sapiente voluptas debitis dicta dolore.</p>
                <div class="bottom">
                    <a href="#">Read more</a>

                </div>
            </section>
            </div>
            <div class="row row-1">
            <section>
                <i class="icon far fa-check-circle"></i>
                <div class="details">
                    <span class="title">Title of Section 5</span>
                    <span>5th Jan 2021</span>
                </div>
                <p>Lorem ipsum dolor sit ameters consectetur adipisicing elit. Sed qui veroes praesentium maiores, sint eos vero sapiente voluptas debitis dicta dolore.</p>
                <div class="bottom">
                    <a href="#">Read more</a>

                </div>
            </section>
            </div>
            <div class="row row-2">
            <section>
                <i class="icon far fa-check-circle"></i>
                <div class="details">
                    <span class="title">Title of Section 6</span>
                    <span>6th Jan 2021</span>
                </div>
                <p>Lorem ipsum dolor sit ameters consectetur adipisicing elit. Sed qui veroes praesentium maiores, sint eos vero sapiente voluptas debitis dicta dolore.</p>
                <div class="bottom">
                    <a href="#">Read more</a>

                </div>
            </section>
            </div>
        </div>
    </div>
</div>
    <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="card white-box p-0">
            <div class="card-heading">
                <h3 class="box-title mb-0"> {{ trans('messages.trainee') }}</h3>
            </div>
            <div class="card-body">
                <ul class="chatonline">
                    <li>  
                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                src="{{ asset('images/users/varun.jpg') }}" alt="user-img" class="img-circle">
                            <div class="ms-2">
                                <span class="text-dark">Varun Dhavan</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                src="{{ asset('images/users/genu.jpg') }}" alt="user-img" class="img-circle">
                            <div class="ms-2">
                                <span class="text-dark">Genelia
                                    Deshmukh </span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                src="{{ asset('images/users/ritesh.jpg') }}" alt="user-img" class="img-circle">
                            <div class="ms-2">
                                <span class="text-dark">Ritesh
                                    Deshmukh </span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                src="{{ asset('images/users/arijit.jpg') }}" alt="user-img" class="img-circle">
                            <div class="ms-2">
                                <span class="text-dark">Arijit
                                    Sinh </span>
                            </div>
                        </a>
                    </li>
                    <li>       
                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                src="{{ asset('images/users/govinda.jpg') }}" alt="user-img"
                                class="img-circle">
                            <div class="ms-2">
                                <span class="text-dark">Govinda
                                    Star</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                src="{{ asset('images/users/hritik.jpg') }}" alt="user-img" class="img-circle">
                            <div class="ms-2">
                                <span class="text-dark">John
                                    Abraham</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /.col -->
</div>

@endsection
