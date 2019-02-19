var fill_rotation = 180;
	var fix_rotation = fill_rotation*2;

	var mainTl = new TimelineMax({paused: true});

	$(".step:not(.first) .radial-progress").each(function(i){
		var circle = $(this);
		var line = 	circle.prev('.line').find('.progress');
		var circleFill = circle.find('.fill:not(.fix)');
		var circleMask = circle.find('.mask.full');
		var circleFillMix = circle.find('.fill.fix');

		mainTl.to(line, 0.15, {width: "100%"})
			.to(circle, 0.3, {rotation: "-="+fill_rotation}, "fillCircle-"+i+"")
			.to([circleFill, circleMask], 0.3, {rotation: fill_rotation}, "fillCircle-"+i+"")
			.to(circleFillMix, 0.3, {rotation: fix_rotation}, "fillCircle-"+i+"")
			.set(circleFillMix, {rotation: fix_rotation}, "stopPoint-"+i+"");
	});

	$('.step .radial-progress').click(function(){
		if($(this).hasClass('active')){
			return false;
		}

		animateToDefault(); 

		$('.active').removeClass('active');

		var index = parseInt($(this).attr('data-index'));
		mainTl.tweenTo("stopPoint-"+(index-1)+"", {onComplete: animateToActive, onCompleteParams:[$(this)]});	
	});

	function animateToActive(el) {
		var index = parseInt(el.attr('data-index')) + 1;
		$('.copy-holder').find(".step-"+index+"").addClass('active');
		el.addClass('active');

		var innerCircle = el.find('.inner-circle');
		var inset = el.find('.inset');
		var circle = el.find('.circle');
		var mask = el.find('.mask');
		var fill = el.find('.fill');
		var number = el.next('p');
		var stepsCopy = $('.copy-holder div.active');

		TweenLite.set(number, {color: "rgb(250,250,250)", fontSize: 46})
		TweenLite.to(innerCircle, 0.15, {scale: 0});	
		TweenLite.to(el, 0.3, {scale: 1.3, zIndex: 10, ease: Back.easeOut});
		TweenLite.fromTo(stepsCopy, 0.7, {autoAlpha: 0}, {autoAlpha: 1});
	}

	function animateToDefault(){
		var mainCircle = $('.radial-progress.active');
		var innerCircle = $('.radial-progress.active').find('.inner-circle');
		var inset = $('.radial-progress.active').find('.inset');
		var number = $('.radial-progress.active').next('p');
		var stepsCopy = $('.copy-holder div');

		TweenLite.to(innerCircle, 0.15, {scale: 1})
		TweenLite.set(number, {color: "rgb(119,119,119)", fontSize: 30});
		TweenLite.to(mainCircle, 0.3, {scale: 1, zIndex: 1, ease: Bounce.easeOut});
		TweenLite.to(stepsCopy, 0.7, {autoAlpha: 0});
	}