	<!-- Load scripts -->
    <script src="{{ URL::asset('assets/js/jquery-2.1.1.min.js') }}"></script>
    @if($page_name == "ABOUT")
        <script>
        $(function(){
            $('#logo_image').css({marginTop: '10px'});
        });
        </script>
    @endif
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/main.js') }}"></script>

    <!-- Prism syntax highlighter -->
    <script src="{{ URL::asset('assets/js/prism.js') }}"></script>
  </body>
</html>