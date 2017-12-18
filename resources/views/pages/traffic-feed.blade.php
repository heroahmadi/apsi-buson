@extends('layouts.master')

@section('title', 'Traffic Feed')
	
@section('content')
	<div class="allcontain">
		<div class="grid">
			<div class="row">
				@foreach ($stories as $s)
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="txthover">
							<img src="/image/traffic-feed/{{ $s->photo }}">
							<div class="txtcontent">
								<div class="stars">
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
								</div>
								<div class="simpletxt">
									<h3 class="name">{{ $s->user->name }}</h3>
									<p>{{ $s->caption }}</p>
		 							<div class="wishtxt">
			 							<p class="paragraph1"> Like <span class="glyphicon glyphicon-heart"></span> </p>
			 							<p class="paragraph2">Comment <span class="icon"><img src="image/compicon.png" alt="compicon"></span></p>
			 						</div>
								</div>
								<div class="stars2">
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
								</div>
							</div>
						</div>	 
					</div>
				@endforeach
			</div>
		</div>

		<div class="modal fade" id="postStory" tabindex="-1" role="dialog" aria-labelledby="postStoryLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Post Traffic Feed</h4>
					</div>

                    <form action="/traffic-feed/post" method="post" enctype="multipart/form-data" class="form">
	                    <div class="modal-body">
	                        {{ csrf_field() }}
	                        <div class="form-group">
								<label for="photo">Foto</label>
		                        <input type="file" name="photo" id="photo">
	                        </div>

	                        <div class="form-group">
		                        <label for="caption">Caption</label>
		                        <textarea rows="4" name="caption" class="form-control" id="caption"></textarea>
	                        </div>
	                    </div>

	                    <div class="modal-footer">
	                        <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
	                        <button type="submit" class="btn btn-success">POST</button>
	                    </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
@endsection

@section('includes-scripts')
	@parent

	<script>
		$("#navbarontop").append('<button data-toggle="modal" data-target="#postStory"><span class="postnewcar">POST TRAFFIC FEED</span></button>')
	</script>
@endsection