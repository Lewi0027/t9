window.addEventListener('resize', function() {
  var width = window.innerWidth;
  var element = document.querySelector('.pageheight,#indexheight');

  if (width > 1199) {
    element.style.height = 'calc(100vh - 334px)';
  } else {
    element.style.height = 'calc(100vh - 351px)';
  }
});