var shop;
if(!shop) shop = {};

shop.Slideshow = function () {

	var items = $(".slideItem");
	var navItems = $(".slideItemNavigation");
	var nextSlide = $(".arrowRight");
	var prevSlide = $(".arrowLeft");
	var counter = 0;
	var timer;

	for (var i = 0; i < items.length; i++) {
		$(items[i]).css("opacity", "0");
	}

	for (var i = 0; i < navItems.length; i++) {
		CreateLink(navItems[i], i);
	};

	$(prevSlide).click(function () {
		var tempCount;
		if (counter > 0) {
			tempCount = counter - 1;
		}

		else {
			tempCount = items.length - 1;
		}

		ChangeSlide(tempCount);
		return false;
	});

	$(nextSlide).click(function () {
		ChangeSlide();
		return false;
	});

	//$(items[counter]).css("opacity", "1");
	ChangeSlide(0);

	SetSlideInterval();

	function SetSlideInterval () {
		clearInterval(timer);
		timer = setInterval(function() {
			console.log("timer");
			ChangeSlide();
		}, 6000);
	}

	function CreateLink (link, count) {
		$(link).click(function () {
			ChangeSlide(count);
			return false;
		});
	}

	function ChangeSlide (count) {
		SetSlideInterval();
		for (var i = 0; i < items.length; i++) {
			$(items[i]).css("opacity", "0");
			$(navItems[i]).removeClass("active");
		};

		if (count != null) {
			counter = count;
		};
		
		if (count == null) {
			counter += 1;
		}

		if (counter === items.length) {
			counter = 0;
			//$(items[counter]).css("opacity", "0");
		}

		$(items[counter]).css("opacity", "1");
		$(navItems[counter]).addClass("active");
	}
};

window.onload = function () {
	var slideshow = new shop.Slideshow();
}