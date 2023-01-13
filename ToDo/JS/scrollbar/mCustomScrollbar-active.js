(function ($) {
	"use strict";

	$(window).on("load", function () {
		$(".toDo-scrollbar").mCustomScrollbar({
			axis: "y",
			autoHideScrollbar: false,
			scrollbarPosition: "outside",
			theme: "light-1",
			scrollInertia: 900
		});
	});

})(jQuery);