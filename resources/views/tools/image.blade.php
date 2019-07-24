@extends('layouts/main')
@section('content')
    <head>
		<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/slice/demo.css') ?> rel="stylesheet">
		<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/slice/slicebox.css') ?> rel="stylesheet">
		<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/slice/custom.css') ?> rel="stylesheet">
		<style>
		.top-banner {
			background-color: rgba(255, 255, 255, 0.55);
		}
		.top-banner a {
			color: #019135;
		}
		h1 {
			margin-top: 100px;
			font-family: 'Microsoft Yahei';
			font-size: 36px;
			color: #019157;
		}		
		</style>		
	</head>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/jquery-2.1.1.min.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/slice/modernizr.custom.46884.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/slice/jquery.slicebox.js') ?> ></script>
	<body>
		<div class="container">

			<div class="more">
				<ul id="sb-examples">
					<li id = 'title1'  ><a href="/index.php/tools/image?type=1"  "  >效果一</a></li>
					<li id = 'title2'><a href="/index.php/tools/image?type=2" ">效果二</a></li>
					<li id = 'title3'><a href="/index.php/tools/image?type=3" ">效果三</a></li>
					<li id = 'title4'><a href="/index.php/tools/image?type=4" ">效果四</a></li>
				</ul>
				<input type = "hidden"  id = 'checktype' >
			</div>
			<div class="wrapperss">

				<ul id="sb-slider" class="sb-slider">
					<li>
						<a href="#" target="_blank"><img src="/assets/images/1.jpg" alt="test"/></a>
						<div class="sb-description">
							<h3>Creative Lifesaver</h3>
						</div>
					</li>
					<li>
						<a href="#" target="_blank"><img src="/assets/images/2.jpg" alt="image2"/></a>
						<div class="sb-description">
							<h3>Honest Entertainer</h3>
						</div>
					</li>
					<li>
						<a href="#" target="_blank"><img src="/assets/images/3.jpg" alt="image1"/></a>
						<div class="sb-description">
							<h3>Brave Astronaut</h3>
						</div>
					</li>
					<li>
						<a href="#" target="_blank"><img src="/assets/images/4.jpg" alt="image1"/></a>
						<div class="sb-description">
							<h3>Affectionate Decision Maker</h3>
						</div>
					</li>
					<li>
						<a href="#" target="_blank"><img src="/assets/images/5.jpg" alt="image1"/></a>
						<div class="sb-description">
							<h3>Faithful Investor</h3>
						</div>
					</li>
					<li>
						<a href="#" target="_blank"><img src="/assets/images/6.jpg" alt="image1"/></a>
						<div class="sb-description">
							<h3>Groundbreaking Artist</h3>
						</div>
					</li>
					<li>
						<a href="#" target="_blank"><img src="/assets/images/7.jpg" alt="image1"/></a>
						<div class="sb-description">
							<h3>Selfless Philantropist</h3>
						</div>
					</li>
				</ul>

				<div id="shadow" class="shadow"></div>

				<div id="nav-arrows" class="nav-arrows">
					<a href="#">Next</a>
					<a href="#">Previous</a>
				</div>

				<div id="nav-options" class="nav-options">
					<span id="navPlay">Play</span>
					<span id="navPause">Pause</span>
				</div>

			</div><!-- /wrapper -->

			<div class="footer-banner" style="width:728px; margin:30px auto"></div>
		</div>
<script type="text/javascript">

			var typeid = "{{$data['typeid']}}";
			$("#title" + typeid).addClass('selected');
			$(function() {
				    Page1 = (function() {
					var $navArrows = $( '#nav-arrows' ).hide(),
						$navOptions = $( '#nav-options' ).hide(),
						$shadow = $( '#shadow' ).hide(),
						slicebox = $( '#sb-slider' ).slicebox( {
							onReady : function() {

								$navArrows.show();
								$navOptions.show();
							    $shadow.show();
							},
							orientation : 'h',
							cuboidsCount : 3
						} ),
						init = function() {
							initEvents();
						},
						initEvents = function() {
							// add navigation events
							$navArrows.children( ':first' ).on( 'click', function() {
								slicebox.next();
								return false;
							} );
							$navArrows.children( ':last' ).on( 'click', function() {	
								slicebox.previous();
							return false;
							} );
							$( '#navPlay' ).on( 'click', function() {
								slicebox.play();
								return false;
							} );
							$( '#navPause' ).on( 'click', function() {
								slicebox.pause();
								return false;
							} );

						};
						return { init : init };
				})();
				    Page2 = (function() {
					var $navArrows = $( '#nav-arrows' ).hide(),
						$shadow = $( '#shadow' ).hide(),
						slicebox = $( '#sb-slider' ).slicebox( {
							onReady : function() {
								$navArrows.show();
								$shadow.show();
							},
							orientation : 'r',
							cuboidsRandom : true
						} ),
						init = function() {
							initEvents();
						},
						initEvents = function() {
							// add navigation events
							$navArrows.children( ':first' ).on( 'click', function() {
								slicebox.next();
								return false;
							} );
							$navArrows.children( ':last' ).on( 'click', function() {
								slicebox.previous();
								return false;
							} );
						};
						return { init : init };
				})();


				    Page3 = (function() {
					var $navArrows = $( '#nav-arrows' ).hide(),
						$shadow = $( '#shadow' ).hide(),
						slicebox = $( '#sb-slider' ).slicebox( {
							onReady : function() {
								$navArrows.show();
								$shadow.show();
							},
							orientation : 'r',
							cuboidsRandom : true,
							disperseFactor : 30
						} ),
						init = function() {
							initEvents();
						},
						initEvents = function() {
							// add navigation events
							$navArrows.children( ':first' ).on( 'click', function() {
								slicebox.next();
								return false;
							} );
							$navArrows.children( ':last' ).on( 'click', function() {
								slicebox.previous();
								return false;
							} );
						};
						return { init : init };
				})();


				    Page4 = (function() {
					var $navArrows = $( '#nav-arrows' ).hide(),
						$navDots = $( '#nav-dots' ).hide(),
						$nav = $navDots.children( 'span' ),
						$shadow = $( '#shadow' ).hide(),
						slicebox = $( '#sb-slider' ).slicebox( {
							onReady : function() {
								$navArrows.show();
								$navDots.show();
								$shadow.show();
							},
							onBeforeChange : function( pos ) {
								$nav.removeClass( 'nav-dot-current' );
								$nav.eq( pos ).addClass( 'nav-dot-current' );
							}
						} ),
						
						init = function() {
							initEvents();
						},
						initEvents = function() {
							// add navigation events
							$navArrows.children( ':first' ).on( 'click', function() {
								slicebox.next();
								return false;
							} );

							$navArrows.children( ':last' ).on( 'click', function() {	
								slicebox.previous();
								return false;
							} );
							$nav.each( function( i ) {
								$( this ).on( 'click', function( event ) {
									var $dot = $( this );
									if( !slicebox.isActive() ) {
										$nav.removeClass( 'nav-dot-current' );
										$dot.addClass( 'nav-dot-current' );
									}
									slicebox.jump( i + 1 );
									return false;
								} );
							} );
						};
						return { init : init };
				})();


				if(typeid ==1)  Page1.init();
		        if(typeid ==2)  Page2.init();
		        if(typeid ==3)  Page3.init();
		        if(typeid ==4)  Page4.init();


			});


</script>






</body>		

@endsection
