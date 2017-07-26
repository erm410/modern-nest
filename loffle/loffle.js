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

		var $categoryToggle = $(".category-toggle");

		$categoryToggle.click(function() {
			var toggle = $(this);
			toggle.toggleClass("active");
			if (toggle.hasClass("active")) {
				toggle.attr("aria-expanded", "true");
			} else {
				toggle.attr("aria-expanded", "false");
			}
			$(".category-images").toggleClass("active");
		});

		var $window = $(window);
		$window.scroll(function() {

			var $masthead = $("#masthead");
			var mastheadBottom = $masthead.offset().top + $masthead.height();
			var $nav = $("#site-navigation");
			navBottom = $nav.offset().top + $nav.height();
			if (navBottom >= mastheadBottom) {
				$categoryToggle.css("position", "fixed");
				$categoryToggle.css("top", navBottom - $window.scrollTop());
			} else {
				$categoryToggle.css("position", "static");
				$categoryToggle.css("top", 0);
			}

		});

		function clearContactForm() {
			$(".contact-form input:not([type='hidden'])").val("");
			$(".contact-form textarea").val("");
		}

		window.loffleContactFormSubmit = function() {

			$feedback = $(".contact-feedback");

			$(".contact-form button").prop("disabled", true);

			$.post({
				url: "/wp-admin/admin-ajax.php",
				data: $(".contact-form").serialize()
			}).done(function() {
				$feedback.removeClass("error");
				$feedback.addClass("success");
				$feedback.text("Message Sent");
				$(".contact-form button").prop("disabled", false);
				clearContactForm();
			}).fail(function() {
				$feedback.addClass("error");
				$feedback.removeClass("success");
				$feedback.text("Message not sent. Please try again.");
				$(".contact-form button").prop("disabled", false);
			});
		};

		$(".contact-form button.reset").click(clearContactForm);

	});
})(jQuery);
