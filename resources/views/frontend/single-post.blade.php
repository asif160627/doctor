@extends('layouts.FrontLayout')
@section('content')
<!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-lg-8 col-md-12">
							<div class="blog-view">
								<div class="blog blog-single-post">
									<div class="blog-image">
										<a href="javascript:void(0);"><img alt="" src="{{asset('assets/img/blog/'.$blog->image)}}" class="img-fluid"></a>
									</div>
									<h3 class="blog-title">{{$blog->title}}</h3>
									<div class="blog-info clearfix">
										<div class="post-left">
											<ul>
												<li>
													<div class="post-author">
												<a href="{{route('singleDoctor',[$blog->user->profile->id,$blog->user->name])}}"><img src="{{asset('assets/img/doctors/'.$blog->user->profile->image)}}" alt="Post Author"> <span>Posted By {{$blog->user->name}}</span></a>
											</div>
												</li>
												<li><i class="far fa-calendar"></i>{{date('l,jS-F,Y',strtotime($blog->created_at))}}</li>
												<li><i class="far fa-comments"></i>12 Comments</li>
												<li><i class="fa fa-tags"></i>{{$blog->category->name}}</li>
											</ul>
										</div>
									</div>
									<div class="blog-content">
										{!! $blog->body !!}
									</div>
								</div>
								
								<div class="card blog-share clearfix">
									<div class="card-header">
										<h4 class="card-title">Share the post</h4>
									</div>
									<div class="card-body">
										<ul class="social-share">
											<li><a href="#" title="Facebook"><i class="fab fa-facebook"></i></a></li>
											<li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
											<li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
											<li><a href="#" title="Google Plus"><i class="fab fa-google-plus"></i></a></li>
											<li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="card author-widget clearfix">
								<div class="card-header">
									<h4 class="card-title">About Author</h4>
									</div>
								<div class="card-body">
									<div class="about-author">
										<div class="about-author-img">
											<div class="author-img-wrap">
												

												<a href="{{route('singleDoctor',[$blog->user->profile->id,$blog->user->name])}}"><img class="img-fluid rounded" src="{{asset('assets/img/doctors/'.$blog->user->profile->image)}}" alt="Post Author"></a>
											</div>
										</div>
										<div class="author-details">
											<a href="doctor-profile.html" class="blog-author-name">{{$blog->user->name}}</a>
											<p class="mb-0">{{$blog->user->profile->specialities}}</p>
										</div>
									</div>
								</div>
								</div>
								<div class="card blog-comments clearfix">
									<div class="card-header">
										<h4 class="card-title">Comments (12)</h4>
									</div>
									<div class="card-body pb-0">
									<ul class="comments-list">
										<li>
											<div class="comment">
												<div class="comment-author">
													<img class="avatar" alt="" src="assets/img/patients/patient4.jpg">
												</div>
												<div class="comment-block">
													<span class="comment-by">
														<span class="blog-author-name">Michelle Fairfax</span>
													</span>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
													<p class="blog-date">Dec 6, 2017</p>
													<a class="comment-btn" href="#">
														<i class="fas fa-reply"></i> Reply
													</a>
												</div>
											</div>
											<ul class="comments-list reply">
												<li>
													<div class="comment">
														<div class="comment-author">
															<img class="avatar" alt="" src="assets/img/patients/patient5.jpg">
														</div>
														<div class="comment-block">
															<span class="comment-by">
																<span class="blog-author-name">Gina Moore</span>
															</span>
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
															<p class="blog-date">Dec 6, 2017</p>
													<a class="comment-btn" href="#">
														<i class="fas fa-reply"></i> Reply
													</a>
														</div>
													</div>
												</li>
												<li>
													<div class="comment">
														<div class="comment-author">
															<img class="avatar" alt="" src="assets/img/patients/patient3.jpg">
														</div>
														<div class="comment-block">
															<span class="comment-by">
																<span class="blog-author-name">Carl Kelly</span>
															</span>
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
															<p class="blog-date">December 7, 2017</p>
													<a class="comment-btn" href="#">
														<i class="fas fa-reply"></i> Reply
													</a>
														</div>
													</div>
												</li>
											</ul>
										</li>
										<li>
											<div class="comment">
												<div class="comment-author">
													<img class="avatar" alt="" src="assets/img/patients/patient6.jpg">
												</div>
												<div class="comment-block">
													<span class="comment-by">
														<span class="blog-author-name">Elsie Gilley</span>
													</span>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
													<p class="blog-date">December 11, 2017</p>
												</div>
											</div>
										</li>
										<li>
											<div class="comment">
												<div class="comment-author">
													<img class="avatar" alt="" src="assets/img/patients/patient7.jpg">
												</div>
												<div class="comment-block">
													<span class="comment-by">
														<span class="blog-author-name">Joan Gardner</span>
													</span>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
													<p class="blog-date">December 13, 2017</p>
													<a class="comment-btn" href="#">
														<i class="fas fa-reply"></i> Reply
													</a>
												</div>
											</div>
										</li>
									</ul>
								</div>
								</div>
								
								<div class="card new-comment clearfix">
									<div class="card-header">
										<h4 class="card-title">Leave Comment</h4>
									</div>
									<div class="card-body">
										<form>
											<div class="form-group">
												<label>Name <span class="text-danger">*</span></label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group">
												<label>Your Email Address <span class="text-danger">*</span></label>
												<input type="email" class="form-control">
											</div>
											<div class="form-group">
												<label>Comments</label>
												<textarea rows="4" class="form-control"></textarea>
											</div>
											<div class="submit-section">
												<button class="btn btn-primary submit-btn" type="submit">Submit</button>
											</div>
										</form>
									</div>
								</div>
								
							</div>
						</div>
					
						<!-- Blog Sidebar -->
						<div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">

							<!-- Search -->
							<div class="card search-widget">
								<div class="card-body">
									<form class="search-form">
										<div class="input-group">
											<input type="text" placeholder="Search..." class="form-control">
											<div class="input-group-append">
												<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- /Search -->

							<!-- Latest Posts -->
							<div class="card post-widget">
								<div class="card-header">
									<h4 class="card-title">Latest Posts</h4>
								</div>
								<div class="card-body">
									<ul class="latest-posts">
										@foreach($posts as $value)
										<li>
											<div class="post-thumb">
												<a href="blog-details.html">
													<img class="img-fluid" src="{{asset('assets/img/blog/'.$value->image)}}" alt="">
												</a>
											</div>
											<div class="post-info">
												<h4>
													<a href="{{route('singlePost',[$value->id,str_replace(' ','-',$value->title)])}}">{{$value->title}}</a>
												</h4>
												<p>{{date('l,jS-F,Y',strtotime($value->created_at))}}</p>
											</div>
										</li>
										@endforeach
										
									</ul>
								</div>
							</div>
							<!-- /Latest Posts -->

							<!-- Categories -->
							<div class="card category-widget">
								<div class="card-header">
									<h4 class="card-title">Blog Categories</h4>
								</div>
								<div class="card-body">
									<ul class="categories">
										@foreach($category as $value)
										<li><a href="#">{{$value->name}} <span>({{$value->posts_count}})</span></a></li>
										@endforeach
									</ul>
								</div>
							</div>
							<!-- /Categories -->

							<!-- Tags -->
							<div class="card tags-widget">
								<div class="card-header">
									<h4 class="card-title">Tags</h4>
								</div>
								<div class="card-body">
									<ul class="tags">
										@foreach($tag as $value)

										<li><a href="#" class="tag">{{$value}}</a></li>
										@endforeach
										
									</ul>
								</div>
							</div>
							<!-- /Tags -->
							
						</div>
						<!-- /Blog Sidebar -->
						
                </div>
				</div>

			</div>		
			<!-- /Page Content -->
@endsection