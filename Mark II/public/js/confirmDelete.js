var shop;
if(!shop) shop = {};

shop.ConfirmDelete = function () {
	var forms = $(".deleteForm");
	var buttons = $(".deleteFormButton");

	for (var i = 0; i < buttons.length; i++) {
		$(buttons[i]).click(function () {
			if (confirm("Är du säker på att du vill ta bort denna produkt?")) {
				return true;
			}

			else {
				return false;
			}
		});
	};
};

window.onload = function () {
	var confirmDelete = new shop.ConfirmDelete();
}