@extends('index')
@section( 'content')
<div class="container-fluid">

    <!-- RECENT SALES -->

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="d-md-flex mb-3">
                    <h3 class="box-title mb-0"> {{ trans('messages.YourCourse') }}</h3>
                 
                </div>
                <div class="table-responsive">
                    <div class="list-course">
                    <ul class="flex-card-list">
                        <li>
                          <div class="flex-card">
                            <div class="card-img"><img src="{{ asset('images/large/2.jpg') }}"></div>
                            <div class="card-content">
                              <h3>First</h3>
                              <div class="text">
                                <p>I'm a card and I'm first.</p>
                              </div>
                               
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="flex-card">
                            <div class="card-img"><img src="{{ asset('images/large/3.jpg') }}"></div>
                            <div class="card-content">
                              <h3>First</h3>
                              <div class="text">
                                <p>I'm a card and I'm second.</p>
                                <p>I'm some extra content put here to make life more difficult, because I can.</p>
                              </div>
                               
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="flex-card">
                            <div class="card-img"><img src="{{ asset('images/large/4.jpg') }}"></div>
                            <div class="card-content">
                              <h3>First</h3>
                              <div class="text">
                                <p>I'm a card and I'm second.</p>
                              </div>
                               
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="flex-card">
                            <div class="card-img"><img src="{{ asset('images/large/7.jpg') }}"></div>
                            <div class="card-content">
                              <h3>First</h3>
                              <div class="text">
                                <p>Dreamcatcher PBR iPhone seitan viral, DIY Truffaut biodiesel slow-carb. Health goth twee migas,.</p>
                              </div>
                               
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="flex-card">
                            <div class="card-img"><img src="{{ asset('images/large/6.jpg') }}"></div>
                            <div class="card-content">
                              <h3>First</h3>
                              <div class="text">
                                <p>Shabby chic put a bird on it normcore, irony Shoreditch street art hella p</p>
                              </div>
                               
                            </div>
                          </div>
                        </li>
                      </ul>
                     
                </div>
           
                <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"> {{ trans('messages.Previous') }}</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item active">
                        <a class="page-link" href="#">2 <span class="sr-only"></span></a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#"> {{ trans('messages.Next') }}</a>
                      </li>
                    </ul>
                  </nav>
            </div>
        </div>
    </div>
</div>
@endsection
