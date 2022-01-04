<!-- jQuery -->
<script src="{{ asset('public/vendor/jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('public/vendor/popper.min.js') }}"></script>
<script src="{{ asset('public/vendor/bootstrap.min.js') }}"></script>

<!-- Perfect Scrollbar -->
<script src="{{ asset('public/vendor/perfect-scrollbar.min.js') }}"></script>

<!-- DOM Factory -->
<script src="{{ asset('public/vendor/dom-factory.js') }}"></script>

<!-- MDK -->
<script src="{{ asset('public/vendor/material-design-kit.js') }}"></script>

<!-- App JS -->
<script src="{{ asset('public/js/app.js') }}"></script>
<script src="{{ asset('public/js/custom.js') }}"></script>

<!-- Preloader -->
<script src="{{ asset('public/js/preloader.js') }}"></script>

<!-- Global Settings -->
<script src="{{ asset('public/js/settings.js') }}"></script>

<!-- Moment.js -->
<script src="{{ asset('public/vendor/moment.min.js') }}"></script>
<script src="{{ asset('public/vendor/moment-range.js') }}"></script>

<!-- Chart.js -->
<script src="{{ asset('public/vendor/Chart.min.js') }}"></script>

<!-- Charts JS -->
<script src="{{ asset('public/js/chartjs.js') }}"></script>

<!-- Chart.js Samples -->
<script src="{{ asset('public/js/page.student-profile.js') }}"></script>

<script src="https://player.vimeo.com/api/player.js"></script>

<script src = "{{ asset('public/vendor/quill.min.js') }}" ></script>
<script src="{{ asset('public/js/quill.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#courseForm").on("submit", function() {
            var hvalue = $('#editor').text();
            $(this).append("<textarea name='description' style='display:none'>" + hvalue +
                "</textarea>");
        });
    });

    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=G-E62VJXTG3M"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-E62VJXTG3M');
</script>

<!-- Select2 -->
<script src="{{ asset('public/vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('public/js/select2.js') }}"></script>

<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
