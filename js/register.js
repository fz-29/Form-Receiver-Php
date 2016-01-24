function toggleFields(mems) {

	mems = parseInt(mems);
	for (var i = 0; i < mems; i++) {
		$($("section")[i]).show();
	}
	for (var i = mems; i < 5; i++) {
		$($("section")[i]).hide();
	}
};
$(window).load(function () {
	toggleFields(localStorage.getItem("strength"));
	$("select").on("change", function() {
		toggleFields($(this).val());
	});
});