<!-- Bootstrap core JavaScript-->
 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{ asset('/js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('/js/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="/js/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('/js/demo/chart-pie-demo.js') }}"></script>




@stack('scripts')