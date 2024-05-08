<!-- Footer -->
<footer class="footer container-fluid pl-30 pr-30">
    <div class="row">
        <div class="col-sm-5">
            <a href="/dashboard" class="brand mr-30"><img src="{{ asset('dist/img/logo-sm.png') }}" style="width: 110px" alt="logo"/></a>
        </div>
        <div class="col-sm-7 text-right">
            <p>{{ date('Y') }} &copy; Buahatiku. Version {{ config('app.version') }}</p>
        </div>
    </div>
</footer>
<!-- /Footer -->