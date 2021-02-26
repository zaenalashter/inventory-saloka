@extends('dashboard.layout')

@section('page title','Role Management')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg">

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
                                            <th>Url</th>
                                            <th>Code</th>
                                            <th>Setting</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data_role as $role)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$role->name}}</td>
                                            <td>{{$role->url}}</td>
                                            <td>{{$role->code}}</td>
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
                                    @endforeach
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

        <div class="card bg-white">
            <div class="container">
                <form>
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationDefault01">Name</label>
                        <input type="text" class="form-control" id="validationDefault01" placeholder="Name" value="Saloka" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="validationDefault02">Code</label>
                        <input type="text" class="form-control" id="validationDefault02" placeholder="Code" value="SL-0001" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="container-fluid">
                        <label for="validationDefault03">Menu :</label>
                        <div class="chechbox">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                          Role
                                        </label>
                                      </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                          Menu
                                        </label>
                                      </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                          Supplier
                                        </label>
                                      </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                          Storehouse
                                        </label>
                                      </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                          Purchase Order
                                        </label>
                                      </div>
                                </div>
                            </div>
                        </div>
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
        const group = new SlimSelect({
            select: '#group'
        });
        let groupData = [];

        const dataForm = $('#dataForm');
        const inputType = $('#inputType');
        const iID = $('#idMenu');
        const iGroup = $('#group');
        const iNama = $('#nama');
        const iUrl = $('#url');
        const iSegment = $('#segment_name');
        const iOrder = $('#ord');

        let selectedData;

        function resetForm() {
            iID.val('');
            iNama.val('');
            iUrl.val('');
            iSegment.val('');
            iOrder.val('');
        }

        const tableIndex = $('#tableIndex').DataTable({
            "ajax": {
                "method": "POST",
                "url": "{{ url('admin/system-utility/menu/list') }}",
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
                { "data": "group" },
                { "data": "name" },
                { "data": "url" },
                { "data": "segment_name" },
                { "data": "ord" },
            ],
            order: [
                [0,'asc'],
                [4,'asc'],
            ]
        });
        $('#tableIndex tbody').on( 'click', 'tr', function () {
            let data = tableIndex.row( this ).data();
            iID.val(data.id);
            iGroup.val(data.id_group);
            iNama.val(data.name);
            iUrl.val(data.url);
            iSegment.val(data.segment_name);
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
            Menu Group List
             */
            $.ajax({
                url: "{{ url('admin/system-utility/menu/group') }}",
                method: "post",
                success: function (response) {
                    // console.log(response);
                    let data = JSON.parse(response);
                    data.forEach(function(v,i) {
                        groupData.push(
                            {text: v.name, value: v.id}
                        )
                    });
                    group.setData(groupData);
                }
            });

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
                            url: '{{ url('admin/system-utility/menu/delete') }}',
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
                    url = "{{ url('admin/system-utility/menu/add') }}";
                } else {
                    url = "{{ url('admin/system-utility/menu/edit') }}";
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