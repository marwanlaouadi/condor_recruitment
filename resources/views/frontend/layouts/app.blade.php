<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description')">
    <meta property="og:image" content="@yield('og:image')">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" /> --}}
    <title>@yield('title') - {{ config('app.name') }}</title>

    @yield('ld-data')

       

        {{-- Style --}}
        @include('frontend.partials.analytics')
        @include('frontend.partials.styles')
        @include('frontend.partials.preloader') <!-- Include the preloader -->
        @yield('css')

        {{-- Custome css and js  --}}
        {!! $setting->header_css !!}
        {!! $setting->header_script !!}

    {{-- Custome css and js  --}}
    {!! $setting->header_css !!}
    {!! $setting->header_script !!}

</head>

<body dir="{{ langDirection() }}">
    <input type="hidden" value="{{ current_country_code() }}" id="current_country_code">
    <input type="hidden" id="auth_user" value="{{ auth()->check() ? 1:0 }}">
    <input type="hidden" id="auth_user_id" value="{{ auth()->check() ? auth()->id():0 }}">

    <x-admin.app-mode-alert />
    {{-- Header --}}
    @include('frontend.partials.header')

    {{-- Main --}}
    @yield('main')

    {{-- footer --}}
    @if (!Route::is('candidate.*') && !Route::is('company.*'))
        @include('frontend.partials.footer')
    @endif

    <!-- PWA Button Start -->
    <button class="pwa-install-btn bg-white position-fixed d-none" id="installApp">
        <img src="{{ asset('pwa-btn.png') }}" alt="Install App">
    </button>
    <!-- PWA Button End -->

    <!-- Theme Switcher -->
    @themeSwitcherWidget()

    <!-- scripts -->
    @include('frontend.partials.scripts')

    <!-- Custom js -->
    {!! $setting->body_script !!}

    <x-frontend.cookies-allowance :cookies="$cookies" />
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (shouldShowPopup()) {
                setTimeout(function() {
                    document.getElementById("popup").classList.add("active");
                    document.getElementsByTagName("body")[0].style.overflow = "hidden";
                }, 30000);
            }
        });

        document.getElementById("close-popup").addEventListener("click", function() {

            document.getElementById("popup").classList.remove("active");
            document.getElementsByTagName("body")[0].style.overflow = "auto";

            setPopupClosedFlag();
        });

        document.getElementsByClassName("form-btn")[0].addEventListener("click", function() {
            setFormSubmittedFlag();
        });

        function shouldShowPopup() {
            const now = Date.now();
            const lastClosed = localStorage.getItem("popupLastClosed");
            const formSubmitted = localStorage.getItem("formSubmitted");

            if (!formSubmitted && (!lastClosed || now - lastClosed > 3600000)) {
                return true;
            }
            return false;
        }

        function setPopupClosedFlag() {
            const now = Date.now();
            localStorage.setItem("popupLastClosed", now);
        }

        function setFormSubmittedFlag() {
            localStorage.setItem("formSubmitted", "true");
        }
    </script>
    <script type="text/javascript" src="https://pbj887.infusionsoft.app/app/webTracking/getTrackingCode"></script>
    <script type="text/javascript"
        src="https://pbj887.infusionsoft.com/resources/external/recaptcha/production/recaptcha.js?b=1.70.0.599909"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadInfusionRecaptchaCallback&render=explicit"
        async="async" defer="defer"></script>
    <script  type="text/javascript"
        src="https://pbj887.infusionsoft.com/app/timezone/timezoneInputJs?xid=86d6318cd6b32c5421941abb0c4ac7cb"></script>
    <script type="text/javascript" src="https://pbj887.infusionsoft.com/js/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://pbj887.infusionsoft.app/app/webform/overwriteRefererJs"></script>
    <script>
        window.onload = function() {
            document.querySelector('.preloader').style.display = 'none';
        };
    </script>

    <!-- PWA Script Start -->
    @if ($setting->pwa_enable)
        <script src="{{ asset('/sw.js') }}"></script>
        <script>
            if (!navigator.serviceWorker) {
                navigator.serviceWorker.register("/sw.js").then(function(reg) {
                    console.log("Service worker has been registered for scope: " + reg);
                });
            }

            let deferredPrompt;
            window.addEventListener('beforeinstallprompt', (e) => {
                $('#installApp').removeClass('d-none');
                deferredPrompt = e;
            });

            const installApp = document.getElementById('installApp');
            installApp.addEventListener('click', async () => {
                if (deferredPrompt !== null) {
                    deferredPrompt.prompt();
                    const {
                        outcome
                    } = await deferredPrompt.userChoice;
                    if (outcome === 'accepted') {
                        deferredPrompt = null;
                    }
                }
            });
        </script>
    @endif
    <!-- PWA Script End -->

</body>

</html>
