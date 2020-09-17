@extends('layouts.FrontLayout')
@section('content')
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Blog</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Blog Grid</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-lg-8 col-md-12">
						
							<div class="row blog-grid-row">
								@foreach($posts as $value)
								<div class="col-md-6 col-sm-12">
								
									<!-- Blog Post -->
									<div class="blog grid-blog">
										<div class="blog-image">
											<a href="blog-details.html"><img class="img-fluid" src="{{asset('assets/img/blog/'.$value->image)}}" alt="Post Image"></a>
										</div>
										<div class="blog-content">
											<ul class="entry-meta meta-item">
												<li>
													<div class="post-author">
												<a href="{{route('singleDoctor',[$value->user->profile->id,$value->user->name])}}"><img src="{{asset('assets/img/doctors/'.$value->user->profile->image)}}" alt="Post Author"> <span>Posted By {{$value->user->name}}</span></a>
											</div>
											</li>
										<li style="min-width: 200px;"><i class="far fa-clock"></i> {{date('l,jS-F,Y',strtotime($value->created_at))}}</li>
									</ul>
									<h3 class="blog-title"><a href="{{route('singlePost',[$value->id,str_replace(' ','-',$value->title)])}}">{{$value->title}}</a></h3>
									<p class="mb-0">{{substr($value->body,0,50)}}...<a href="{{route('singlePost',[$value->id,str_replace(' ','-',$value->title)])}}" style="color: red;">See More</a></p>
										</div>
									</div>
									<!-- /Blog Post -->
									
								</div>
								@endforeach
								
							</div>
							
							<!-- Blog Pagination -->
							<div class="row ">
								<div class="col-md-4"></div>
								<div class="col-md-4">
									{{ $posts->links() }}
								</div>
								<div class="col-md-4"></div>
							</div>
							<!-- /Blog Pagination -->
							
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
										@foreach($latestposts as $count=>$value)
										@if($count < 6)
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
										@endif
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