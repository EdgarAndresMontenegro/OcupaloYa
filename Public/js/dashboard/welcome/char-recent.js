$(function () {
	$('.min-chart#chart-recent').easyPieChart({
		barColor: "#4285f4",
		onStep: function (from, to, percent) {
			$(this.el).find('.percent').text(Math.round(percent));
		}
	});
});