(function ($) {
	$(document).ready(function () {
		if ($(window).width() > 1024) {
			$('.main-navigation').find("li").each(function(){
				if($(this).children("ul").length > 0){
					$(this).append("<span class='indicator'></span>");
				}
			});
			$('.main-navigation ul > li.menu-item-has-children .indicator, .main-navigation ul > li.page_item_has_children .indicator').click(function() {
				$(this).parent().find('> ul.sub-menu, > ul.children').toggleClass('yesOpen');
				$(this).toggleClass('yesOpen');
				var $self = $(this).parent();
				if($self.find('> ul.sub-menu, > ul.children').hasClass('yesOpen')) {
					$self.find('> ul.sub-menu, > ul.children').slideDown(300);
				} else {
					$self.find('> ul.sub-menu, > ul.children').slideUp(200);
				}
			});
		}

		$(".search-toggle").click(function() {
			var toggle = $(this);
			toggle.toggleClass("active");
			if (toggle.hasClass("active")) {
				toggle.attr("aria-expanded", "true");
			} else {
				toggle.attr("aria-expanded", "false");
			}
			$(".search-form").toggleClass("active");
		});

		$(".email-toggle").click(function() {
			var toggle = $(this);
			toggle.toggleClass("active");
			if (toggle.hasClass("active")) {
				toggle.attr("aria-expanded", "true");
			} else {
				toggle.attr("aria-expanded", "false");
			}
			$(".signup-dropdown").toggleClass("active");
		});

	});
})(jQuery);
