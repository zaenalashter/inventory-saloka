@extends('dashboard.layout')

@section('page title','MASTER DATA Edit Profil User')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">

                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3 mt-2 mt-sm-0 font-weight-bold">Username</div>
                                <div class="col-sm-9">
                                    {{ \Illuminate\Support\Facades\Session::get('username') }}
                                </div>

                                <div class="col-sm-3 mt-2 mt-sm-0 font-weight-bold">Nama Lengkap</div>
                                <div class="col-sm-9" id="vNamaLengkap"></div>

                                <div class="col-sm-3 mt-2 mt-sm-0 font-weight-bold">e-Mail</div>
                                <div class="col-sm-9" id="vEmail"></div>

                                <div class="col-sm-3 mt-2 mt-sm-0 font-weight-bold">No Telp</div>
                                <div class="col-sm-9" id="vNoTelp"></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-10"></div>
                                <div class="col-lg-2 mt-2 mt-sm-0">
                                    <button type="button" class="btn btn-block btn-warning" id="btnEdit">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="cardComponent" class="card card-success card-outline d-none">
                        <div class="card-header">
                            <h3 class="card-title">Tambah data baru</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-sm btn-light" id="btnClose">
                                    <i class="fas fa-times" style="color: red;"></i>
                                </button>
                            </div>
                        </div>
                        <form id="dataForm">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="username" value="{{ \Illuminate\Support\Facades\Session::get('username') }}" readonly>

                                <div class="form-group">
                                    <label for="iPassLama">Password Lama</label>
                                    <input type="text" class="form-control" id="iPassLama" name="password_lama" onkeyup="checkOldPassword()">
                                </div>

                                <div class="form-group">
                                    <label for="iPassBaru">Password Baru</label>
                                    <input type="text" class="form-control" id="iPassBaru" name="password_baru" onkeyup="checkNewPassword()">
                                </div>

                                <div class="form-group">
                                    <label for="iPassRepeat">Repeat Password Baru</label>
                                    <input type="text" class="form-control" id="iPassRepeat" name="password" onkeyup="checkNewPassword()">
                                </div>

                                <div class="form-group">
                                    <label for="iNamaLengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="iNamaLengkap" name="nama_lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="iEmail">Alamat e-Mail</label>
                                    <input type="text" class="form-control" id="iEmail" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="iNoTelp">Nomor Telp</label>
                                    <input type="text" class="form-control" id="iNoTelp" name="no_telp">
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-10"></div>
                                    <div class="col-lg-2 mt-2 mt-sm-0">
                                        <button type="submit" class="btn btn-block btn-success">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const btnEdit = $('#btnEdit');
        const btnClose = $('#btnClose');

        const vNamaLengkap = $('#vNamaLengkap');
        const vEmail = $('#vEmail');
        const vNoTelp = $('#vNoTelp');

        const cardComponent = $('#cardComponent');
        const dataForm = $('#dataForm');
        const iNamaLengkap = $('#iNamaLengkap');
        const iEmail = $('#iEmail');
        const iNoTelp = $('#iNoTelp');

        let namaLengkap, email, noTelp;

        function checkOldPassword() {
            let oldPass = $('#iPassLama');
            let newPass = $('#iPassBaru');
            let repPass = $('#iPassRepeat');

            if (oldPass.val() !== '') {
                newPass.addClass('is-invalid');
                repPass.addClass('is-invalid');
            } else {
                newPass.removeClass('is-invalid');
                repPass.removeClass('is-invalid');
            }
        }

        function checkNewPassword() {
            let newPass = $('#iPassBaru');
            let repPass = $('#iPassRepeat');

            if (newPass.val() !== '') {
                newPass.removeClass('is-invalid');
                if (newPass.val() !== repPass.val()) {
                    repPass.addClass('is-invalid');
                } else {
                    repPass.removeClass('is-invalid');
                }
            }
        }

        function reloadForm() {
            iNamaLengkap.val(namaLengkap);
            iEmail.val(email);
            iNoTelp.val(noTelp);

            vNamaLengkap.html(namaLengkap);
            vEmail.html(email);
            vNoTelp.html(noTelp);
        }

        function reloadData() {
            $.ajax({
                url: '{{ url('admin/user-profile/edit/list') }}',
                method: 'post',
                success: function (response) {
                    // console.log(response);
                    if (response !== 'null') {
                        let data = JSON.parse(response);
                        namaLengkap = data.full_name;
                        email = data.email;
                        noTelp = data.phone;
                        reloadForm();
                    }
                }
            })
        }

        $(document).ready(function () {
            reloadData();
            btnEdit.click(function (e) {
                e.preventDefault();
                cardComponent.removeClass('d-none');
                $('html, body').animate({
                    scrollTop: cardComponent.offset().top
                }, 500);
            });
            btnClose.click(function (e) {
                e.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, 500, function () {
                    reloadForm();
                    cardComponent.addClass('d-none');
                });
            });

            /*
            SUBMIT DATA
            First: Check new or edit data
             */
            dataForm.submit(function (e) {
                e.preventDefault();
                let oldPass = $('#iPassLama');
                let newPass = $('#iPassBaru');
                let repPass = $('#iPassRepeat');
                let status = '';

                if (oldPass.val() !== '') {
                    if (newPass.val() === '' || repPass.val() === '') {
                        Swal.fire(
                            'Gagal!',
                            'Seluruh input password harus terisi',
                            'warning'
                        )
                    } else {
                        status = 'lanjut';
                    }
                } else {
                    status = 'lanjut';
                }

                if (status === 'lanjut') {
                    $.ajax({
                        url: "{{ url('admin/user-profile/edit/edit') }}",
                        method: 'post',
                        data: $(this).serialize(),
                        success: function (response) {
                            console.log(response);
                            let data = JSON.parse(response);
                            if (data[0] === 'success') {
                                Swal.fire({
                                    type: 'success',
                                    title: 'Data Tersimpan',
                                    onClose: function () {
                                        $("html, body").animate({ scrollTop: 0 }, 500, function () {
                                            cardComponent.addClass('d-none');
                                            reloadData();
                                        });
                                    }
                                })
                            } else {
                                Swal.fire(
                                    'Gagal!',
                                    data[0],
                                    'error'
                                )
                            }
                        }
                    })
                }
            })
        });
    </script>
@endsection
