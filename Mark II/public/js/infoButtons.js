var shop;
if(!shop) shop = {};

shop.InfoButtons = function () {
	var shippingInfoButton = $("#showShippingInfoButton");
	var paymentInfoButton = $("#showPaymentInfoButton");

	var shippingInfoText = $("#shippingInfo");
	var paymentInfoText = $("#paymentInfo");

	$(shippingInfoButton).click(function () {
		if ($(shippingInfoText).hasClass("hidden")) {
			$(shippingInfoText).removeClass("hidden");
		}

		else {
			$(shippingInfoText).addClass("hidden");
		}
		
		return false;
	});

	$(paymentInfoButton).click(function () {
		if ($(paymentInfoText).hasClass("hidden")) {
			$(paymentInfoText).removeClass("hidden");
		}

		else {
			$(paymentInfoText).addClass("hidden");
		}

		return false;
	});
};

window.onload = function () {
	var infoButtons = new shop.InfoButtons();
}