<!-- ******sticky navbar****** -->
<script>
var navbar = document.querySelector('.navbar');
var origOffsetY = navbar.offsetTop;

function onScroll(e) {
  window.scrollY >= origOffsetY ? navbar.classList.add('fixed') :
                                  navbar.classList.remove('fixed');
}

document.addEventListener('scroll', onScroll);
</script>
