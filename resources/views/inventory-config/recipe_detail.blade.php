@extends('dashboard.layout')

@section('page title','Recipe Detail')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg">

                  <div class="card card-primary card-outline">
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4">
                                {{-- <div class="form-group row">
                                    <label for="inputNama" class="col-sm-2 col-form-label"><h6>Nama :</h6></label>
                                    <div class="col-sm-6">
                                      <input type="text" class="form-control" id="inputPassword" placeholder="Saus BBQ">
                                    </div>
                                  </div> --}}
                                  
                                <form>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Saus BBQ">
                                </div>
                                </form>

                            </div>
                            <div class="col-lg-4"></div>
                            <div class="col-lg-2 mt-2 mt-sm-0">
                                <button type="button" class="btn btn-block btn-warning" id="btnEdit" >Edit</button>
                            </div>
                            <div class="col-lg-2 mt-2 mt-sm-0">
                                <button type="button" class="btn btn-block btn-danger" id="btndelete">Delete</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-body p-0">
                              <div class="table-responsive">
                                <table class="table table-hover text-center" id="">
                                    <thead>
                                        <tr>
                                            <th>Ingredient</th>
                                            <th>Gross Weight</th>
                                            <th>Nett Weight</th>
                                            <th>Unit</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Cost/Portion</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Kentang</td>
                                            <td>1000</td>
                                            <td>1000</td>
                                            <td>gr</td>
                                            <td>Rp 17,000</td>
                                            <td>1000</td>
                                            <td>Rp 17,000</td>
                                        </tr>
                                        <tr>
                                            <td>Bawang Merah Goreng</td>
                                            <td>1000</td>
                                            <td>1000</td>
                                            <td>gr</td>
                                            <td>Rp 100,000</td>
                                            <td>5</td>
                                            <td>Rp, 5000</td>
                                        </tr>
                                    <tfoot class="bg-secondary">
                                        <tr>
                                            <td><input type="text" class="form-control" id="exampleInput" placeholder="Ingredient" ></td>
                                            <td><input type="text" class="form-control" id="exampleInput" placeholder="Gross Weight"></td>
                                            <td><input type="text" class="form-control" id="exampleInput" placeholder="Nett Weight"></td>
                                            <td>
                                                <div class="input-group">
                                                    <select class="custom-select" id="inputGroupSelect01" style="width:auto">
                                                      <option selected>Unit</option>
                                                      <option value="1">Gram</option>
                                                      <option value="2">Ons</option>
                                                      <option value="3">Kilo Gram</option>
                                                    </select>
                                                  </div>
                                            </td>
                                            <td><input type="text" class="form-control" id="exampleInput" placeholder="Price"></td>
                                            <td><input type="text" class="form-control" id="exampleInput" placeholder="Qty"></td>
                                            <td><input type="text" class="form-control" id="exampleInput" placeholder="Cost/Portion"></td>
                                            <td>                                                    
                                                <button type="button" class="btn btn-outline-success"><i class="fas fa-plus-circle"></i></button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    </tbody>
                                </table>

                                {{-- Batas Atas --}}
                                <div class="row container-fluid">
                                    <div class="col-9"></div>
                                    <div class="col-3">
                                        <div>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>SubTotal:</td>
                                                        <td></td>
                                                        <td>4763</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Q factor 5%:</td>
                                                        <td></td>
                                                        <td>467</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Food Cost:</td>
                                                        <td></td>
                                                        <td>5140</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <button type="button" class="btn btn-block btn-primary" id="btnBaru">Save</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- Batas Bawah --}}
                              </div>
                            </div>
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
