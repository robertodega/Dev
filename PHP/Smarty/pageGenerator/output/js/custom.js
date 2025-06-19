$(".menulink").width($(window).width() * 0.1);
$(".menulink").each(function () {
  $(this).on("click", function () {
    document.location.href = $(this).attr("ref");
  });
});
