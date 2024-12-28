<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
    integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    < script src = "https://kit.fontawesome.com/a2e5a25eb0.js"
    crossorigin = "anonymous" >
</script>
<script>
    new WOW().init();
</script>
</script>
<script ></script>
<link rel="stylesheet" href="{{ asset('website/assets/css/bootstrap.min.js') }}">
<link rel="stylesheet" href="{{ asset('website/assets/css/main.css') }}">
<script>
    $(function() {
        $('#language-select').on('change', function() {
            if ($(this).val() == 'en') {
                var url = "{{ url('/en') }}"; // get
            } else {
                var url = "{{ url('ar') }}"; // get
            }
            console.log('oooo', url);
            if (url) { // require a URL
                window.location = url; // redirect
            }
            return false;
        });
    });
</script>
<script>
    function showOverlay() {
        const overlay = document.getElementById('overlay');
        overlay.style.display = 'flex'; // Show overlay
        setTimeout(() => {
            overlay.style.display = 'none'; // Hide overlay after 1.5 seconds
        }, 2000);
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="{{ asset('website/assets/js/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('website/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('website/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('website/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('website/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('website/assets/js/main.js') }}"></script>
