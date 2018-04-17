(function($) {
	$.fn.numKey = function(options) {
		var defaults = {
			limit: 100,
			disorder: false
		}
		var options = $.extend({}, defaults, options);
		var input = $(this);
		var nums = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
		if(options.disorder) {
			nums.sort(function() {
				return 0.5 - Math.random();
			});
		}
		var html = '\
		<div class="fuzy-numKey">\
		<div class="fuzy-numKey-active">﹀</div>\
		<table>\
		<tr>\
		<td class="fuzy-numKey-lightgray fuzy-numKey-active">' + nums[7] + '</td>\
		<td class="fuzy-numKey-lightgray fuzy-numKey-active">' + nums[8] + '</td>\
		<td class="fuzy-numKey-lightgray fuzy-numKey-active">' + nums[9] + '</td>\
		</tr>\
		<tr>\
		<td class="fuzy-numKey-lightgray fuzy-numKey-active">' + nums[4] + '</td>\
		<td class="fuzy-numKey-lightgray fuzy-numKey-active">' + nums[5] + '</td>\
		<td class="fuzy-numKey-lightgray fuzy-numKey-active">' + nums[6] + '</td>\
		</tr>\
		<tr>\
		<td class="fuzy-numKey-lightgray fuzy-numKey-active">' + nums[1] + '</td>\
		<td class="fuzy-numKey-lightgray fuzy-numKey-active">' + nums[2] + '</td>\
		<td class="fuzy-numKey-lightgray fuzy-numKey-active">' + nums[3] + '</td>\
		</tr>\
		<tr>\
		<td class="fuzy-numKey-darkgray fuzy-numKey-active">Clear</td>\
		<td class="fuzy-numKey-lightgray fuzy-numKey-active">' + nums[0] + '</td>\
		<td class="fuzy-numKey-darkgray fuzy-numKey-active">&larr;</td>\
		</tr>\
		</table>\
		<style type="text/css">\
		* {\
			padding: 0 0;\
			margin: 0 0;\
		}\
		.fuzy-numKey {\
			width: 94%;\
			position: absolute;\
			bottom: 0;\
			display: none;\
			background-color: #333;\
			text-align: center;\
			padding: 3%;\
			height: 40%;\
			z-index: 999;\
		}\
		.fuzy-numKey div {\
			height: 10%;\
			width: 100%;\
			font-weight: bold;\
			font-family: "Roboto";\
			background-color: #b1b1b1;\
			color: #fff;\
			margin-bottom: 2%;\
			border-radius: 12px;\
			line-height: 200%;\
		}\
		.fuzy-numKey table {\
			width: 100%;\
			height: 88%;\
		}\
		.fuzy-numKey td {\
			font-weight: bold;\
			font-family: "Roboto";\
			width: 33%;\
			color: #fff;\
			border-radius: 12px;\
		}\
		.fuzy-numKey-darkgray{\
			background: #666;\
		}\
		.fuzy-numKey-lightgray{\
			background: #b1b1b1;\
		}\
		.fuzy-numKey-active:active {\
			background: deepskyblue;\
		}\
		</style>\
		</div>';
		input.on("click", function() {
			$(this).attr('readonly', 'readonly');
			$(".fuzy-numKey").remove();
			$('body').append(html);
			$(".fuzy-numKey").show(100);
			$(".fuzy-numKey table tr td").on("click", function() {
				if(isNaN($(this).text())) {
					if($(this).text() == 'Clear') {
						input.val('');
					} else {
						input.val(input.val().substring(0, input.val().length - 1));
					}
				} else {
					input.val(input.val() + $(this).text());
					if(input.val().length >= options.limit) {
						input.val(input.val().substring(0, options.limit));
						remove();
					}
				}
			});
			$(".fuzy-numKey div").on("click", function() {
				remove();
			});
		});

		function remove() {
			$(".fuzy-numKey").hide(100, function() {
				$(".fuzy-numKey").remove();
			});
			input.removeAttr('readonly');
		}
	}
})(jQuery)