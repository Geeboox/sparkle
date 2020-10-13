$(document).ready(function () {
  $("#fullpage").fullpage({
    //options here
    autoScrolling: true,
    scrollHorizontally: true,
  });

  //methods
  fullpage_api.setAllowScrolling(false);
});
