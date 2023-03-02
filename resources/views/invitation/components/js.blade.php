{{-- Bootstrap --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

{{-- JQuery --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function(){
        // $('#navbar').fadeOut('fast');

        var height = $(window).scrollTop();

        if (height == 0){
            $("body").css("overflow", "hidden");
        }

        $('#btnscroll').on('click', function(){
            if (!document.querySelector('body').classList.contains('livecanvas-is-editing') ){
                $("body").css("overflow", "");
                this.closest('section').nextElementSibling.scrollIntoView({ behavior: 'smooth'  });
            }
        });

        $(window).on('scroll touchmove mousewheel', function() {
            var scrolled_val = $(document).scrollTop().valueOf();

            if(scrolled_val > 0){
                $('#navbar').fadeIn(300);
                $('#navbar').removeClass('d-none');
            }else{
                $('#navbar').fadeOut('fast');
            }
        });
    });
</script>
