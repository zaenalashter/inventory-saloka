@extends('dashboard.layout')

@section('page title',' Row Product')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg">

                <div class="card bg-white">
                    <div class="container">
                        <form>
                            <div class="form-row">
                              <div class="col-md-6 mb-3">
                                <label for="validationDefault01">Code</label>
                                <input type="text" class="form-control" id="validationDefault01" placeholder="Code" value="Code" required>
                              </div>
                              <div class="col-md-6 mb-3">
                                <label for="validationDefault02">Unit</label>
                                <input type="text" class="form-control" id="validationDefault02" placeholder="Name" value="Name" required>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-6 mb-3">
                                <label for="validationDefault03">Price</label>
                                <input type="text" class="form-control" id="validationDefault03" placeholder="" required>
                              </div>
                              <div class="col-md-6 mb-3">
                                <label for="validationDefault03">Note</label>
                                <input type="text" class="form-control" id="validationDefault03" placeholder="" required>
                              </div>
                            </div>
                
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-6"></div>
                                    <div class="col-lg-2 mt-2 mt-sm-0">
                
                                    </div>
                                    <div class="col-lg-2 mt-2 mt-sm-0">
                     
                                    </div>
                                    <div class="col-lg-2 mt-2 mt-sm-0">
                                        <button type="button" class="btn btn-block btn-primary" id="btnBaru">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>

                  <div class="card card-primary card-outline">
                    <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header">
                              <h4></h4>
                              <div class="card-header-form">
                                <form>
                                  <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                      <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div class="card-body p-0">
                              <div class="table-responsive">
                                <table class="table table-hover text-center" id="">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Unit</th>
                                            <th>Price</th>
                                            <th>Note</th>
                                            <th>Setting</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Tomat</td>
                                            <td>gram</td>
                                            <td>100</td>
                                            <td></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <button type="button" class="btn btn-block btn-warning" id="btnEdit">Edit</button>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <button type="button" class="btn btn-block btn-danger" id="btnBaru">Delete</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>Kecap</td>
                                            <td>ml</td>
                                            <td>250</td>
                                            <td></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <button type="button" class="btn btn-block btn-warning" id="btnEdit">Edit</button>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <button type="button" class="btn btn-block btn-danger" id="btnBaru">Delete</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
                                <nav class="d-inline-block">
                                    <ul class="pagination mb-0">
                                      <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                      </li>
                                      <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                      <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                      </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
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

        const btnHapus = $('#btnHapus');
        const btnEdit = $('#btnEdit');
        const btnBaru = $('#btnBaru');
        const btnClose = $('#btnClose');

        const cardComponent = $('#cardComponent');

        let groupData = [];

        const dataForm = $('#dataForm');
        const inputType = $('#inputType');
        const iID = $('#idGroup');
        const iNama = $('#nama');
        const iSegment = $('#segment_name');
        const iIcon = $('#icon');
        const iOrder = $('#ord');

        function resetForm() {
            iID.val('');
            iNama.val('');
            iSegment.val('');
            iIcon.val('');
            iOrder.val('');
        }

        const tableIndex = $('#tableIndex').DataTable({
            "ajax": {
                "method": "POST",
                "url": "{{ url('admin/system-utility/menu-group/list') }}",
                "header": {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                },
                "complete": function (xhr,responseText) {
                    if (responseText == 'error') {
                        console.log(xhr);
                        console.log(responseText);
                    }
                }
            },
            "columns": [
                { "data": "name" },
                { "data": "segment_name" },
                { "data": "icon" },
                { "data": "ord" },
            ],
        });
        $('#tableIndex tbody').on( 'click', 'tr', function () {
            let data = tableIndex.row( this ).data();
            iID.val(data.id);
            iNama.val(data.name);
            iSegment.val(data.segment_name);
            iIcon.val(data.icon);
            iOrder.val(data.ord);
            // console.log(data);
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
                btnEdit.attr('disabled','true');
                btnHapus.attr('disabled','true');
            } else {
                tableIndex.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                btnEdit.removeAttr('disabled');
                btnHapus.removeAttr('disabled');
            }
        });

        $(document).ready(function () {
            /*
            Button Action
             */
            btnBaru.click(function (e) {
                e.preventDefault();
                inputType.val('new');
                resetForm();
                cardComponent.removeClass('d-none');
                $('html, body').animate({
                    scrollTop: cardComponent.offset().top
                }, 500);
            });
            btnEdit.click(function (e) {
                e.preventDefault();
                inputType.val('edit');
                cardComponent.removeClass('d-none');
                $('html, body').animate({
                    scrollTop: cardComponent.offset().top
                }, 500);
            });
            btnHapus.click(function (e) {
                e.preventDefault();
                Swal.fire({
                    title: iNama.val()+" akan dihapus",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus Data'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '{{ url('admin/system-utility/menu-group/delete') }}',
                            method: 'post',
                            data: {id: iID.val()},
                            success: function (response) {
                                console.log(response);
                                if (response === 'success') {
                                    Swal.fire({
                                        title: 'Data terhapus!',
                                        type: 'success',
                                        onClose: function () {
                                            tableIndex.ajax.reload();
                                        }
                                    })
                                } else {
                                    Swal.fire({
                                        title: 'Gagal',
                                        text: 'Silahkan coba lagi',
                                        type: 'error',
                                    })
                                }
                            }
                        });
                    }
                });

            });
            btnClose.click(function (e) {
                e.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, 500, function () {
                    resetForm();
                    cardComponent.addClass('d-none');
                    tableIndex.ajax.reload();
                    btnEdit.attr('disabled','true');
                    btnHapus.attr('disabled','true');
                });
            });

            /*
            SUBMIT DATA
            First: Check new or edit data
             */
            dataForm.submit(function (e) {
                e.preventDefault();
                let url;
                if (inputType.val() === 'new') {
                    url = "{{ url('admin/system-utility/menu-group/add') }}";
                } else {
                    url = "{{ url('admin/system-utility/menu-group/edit') }}";
                }
                $.ajax({
                    url: url,
                    method: 'post',
                    data: $(this).serialize(),
                    success: function (response) {
                        console.log(response);
                        if (response === 'success') {
                            Swal.fire({
                                type: 'success',
                                title: 'Data Tersimpan',
                                onClose: function () {
                                    $("html, body").animate({ scrollTop: 0 }, 500, function () {
                                        cardComponent.addClass('d-none');
                                        tableIndex.ajax.reload();
                                    });
                                }
                            })
                        } else {
                            Swal.fire(
                                'Gagal!',
                                'Username atau Password Salah',
                                'warning'
                            )
                        }
                    }
                })
            })
        });
    </script>
@endsection
