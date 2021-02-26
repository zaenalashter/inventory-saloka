@php
$segments = request()->segments();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    @include('dashboard._partials.head')
    @yield('style')
</head>
<body class="">
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('dashboard._partials.navbar')

            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    @include('dashboard._partials.sidebar')
                </aside>
            </div>
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('page title')</h1>
                        <div class="section-header-breadcrumb">
                            @if(count($segments) > 1)
                                <div class="breadcrumb-item"><a href="{{ url('/') }}">home</a></div>
                                <div class="breadcrumb-item"><p>{{ $segments[0] }}</p></div>
                                <div class="breadcrumb-item"><p>{{ $segments[1] }}</p></div>
                                <div class="breadcrumb-item active"><p>{{ $segments[2] }}</p></div>
                            @endif
                        </div>
                    </div>

                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
        </div>
    </div>
        

{{-- MODAL Logout --}}
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Silahkan klik tombol logout dibawah untuk mengakhiri sesi ini.</div>
            <div class="modal-footer">
                <button class="btn btn-outline-dark" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" type="button" id="btnLogout">Logout</button>
            </div>
        </div>
    </div>
</div>
{{-- ./MODAL Logout --}}

<!-- REQUIRED SCRIPTS -->
@include('dashboard._partials.footer-script')
<script>
    const btnLogout = $('#btnLogout');
    btnLogout.click(function (e) {
        e.preventDefault();
        $.ajax({
            url: "{{ url('admin/session-flush') }}",
            method: "get",
            success: function(result) {
                console.log(result);
                if (result === 'success') {
                    window.location.href = '{{ url('/') }}';
                } else {
                    Swal.fire({
                        type: 'info',
                        title: 'Gagal Logout',
                    });
                }
            }
        });
    })
</script>
@yield('script')
</body>
</html>
