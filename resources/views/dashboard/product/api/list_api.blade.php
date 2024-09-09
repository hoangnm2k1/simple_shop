@extends('dashboard.layout.layout')
@section('main-content')
<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="btn btn-success mb-3" id="btnCreate">Create</div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Product Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center align-middle">
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tb-product">
                            {{-- @foreach ($products as $product)
                            <tr class="text-center align-middle">
                                <th scope="row">{{$product->id}}</th>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td><img src="{{asset('dashboard/uploads/'.$product->img_url)}}" alt=""></td>
                                <td>{{$product->category->name}}</td>
                                <td>
                                    <a href=" {{ route('product.showEditProduct', [$product->id]) }}"
                                        style="text-decoration: none">
                                        <button type="button" class="btn btn-warning">Edit</button>
                                    </a>
                                    <a href=" {{ route('product.deleteProduct', [$product->id]) }}"
                                        onclick="return confirm('Bạn có muốn xóa không?')">
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frmCreateUpdate">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                        Modal title
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <label>Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Enter your name" id="txtName" />
                    <div>
                        <label>Price</label>
                    </div>
                    <input name="price" type="text" class="form-control" id="txtPrice" placeholder="Enter your price" />
                    <div>
                        <label>Image</label>
                    </div>
                    <input type="file" class="form-control" id="txtImage" placeholder="Enter your price" />
                    <label>Category</label>
                    <select id="txtIdCategory" class="form-control">
                    </select>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button id="btnSave" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</html>
<style>
    td img {
        width: 240px;
        height: 240px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let frmCreUpdate = {
            type: "CREATE",
            data: {
                id: -1,
                name: "",
                price: 0,
                img_url: "",
                categoryId: "",
            },
        };

        function getAllProducts() {
            // getAllCategories().then((categories) => {
            fetch("http://127.0.0.1:8000/api/product/")
                .then((res) => res.json())
                .then((data) => {
                    let str = data
                        .map((p) => {
                            // var cate = categories.find((c) => c.id === p.category_id);
                            // console.log(cate);
                            // var categoryName = cate ? cate.name : "";
                            return `
                        <tr class="text-center align-middle product-${p.id}">
                            <th scope="row">${p.id}</th>
                            <td>${p.name}</td>
                            <td>${p.price}</td>
                            <td><img src="/dashboard/uploads/${p.img_url}"></td>
                            <td>${p.category_name}</td>
                            <td>
                                <button type="button" class="btn btn-danger btnUpdate" data-id="${p.id}">Update</button>
                                <button type="button" class="btn btn-warning btnDelete" data-id="${p.id}">Delete</button>
                            </td>
                        </tr>
                    `;
                        })
                        .join("");
                    document.getElementById("tb-product").innerHTML = str;

                    $(document).on("click", ".btnUpdate", function(e) {
                        let id = $(e.target).data("id");
                        handleUpdate(id);
                    });

                    $(".btnDelete").on("click", function(e) {
                        let id = $(e.target).data("id");
                        handleDelete(id);
                    })
                });
            // })
        }
        getAllProducts();

        $("#btnCreate").off("click").on("click", function() {
            handleCreate();
        });


        function handleUpdate(id) {
            $("#myModal").modal("show");
            frmCreUpdate.type = "UPDATE"
            frmCreUpdate.data.id = id
            url = `http://127.0.0.1:8000/api/product/${id}`;

            fetch(`http://127.0.0.1:8000/api/product/${id}`)
                .then((res) => res.json())
                .then((data) => {
                    frmCreUpdate.data.name = data.name;
                    frmCreUpdate.data.price = data.price;
                    frmCreUpdate.data.img_url = data.img_url;
                    $("#txtName").val(frmCreUpdate.data.name);
                    $("#txtPrice").val(frmCreUpdate.data.price);
                });

            fetch("http://127.0.0.1:8000/api/category/")
                .then((res) => res.json())
                .then((data) => {
                    let str = data
                        .map((c) => {
                            return `
                            <option value="${c.id}">${c.name}</option>
                        `;
                        })
                        .join("");
                    document.getElementById("txtIdCategory").innerHTML = str;
                })
                .catch((error) => {
                    console.log(error);
                });
            Creup(id);
        }

        function handleCreate() {
            fetch("http://127.0.0.1:8000/api/category/")
                .then((res) => res.json())
                .then((data) => {
                    let str = data
                        .map((c) => {
                            return `
                        <option value="${c.id}">${c.name}</option>
                    `;
                        })
                        .join("");
                    document.getElementById("txtIdCategory").innerHTML = str;

                })

            $("#myModal").modal('show');
            frmCreUpdate.type = "CREATE";
            frmCreUpdate.data.id = -1;
            Creup();

            $("#txtName").val("");
            $("#txtPrice").val("");
            $("#txtImage").val("");
            $("#txtIdCategory").val("");
        }

        function Creup(id = null) {
            $(document).ready(function() {
                $("#frmCreateUpdate").validate({
                    rules: {
                        name: "required",
                        price: {
                            required: true,
                            min: 10000
                        },
                    },
                    messages: {
                        name: "Vui lòng nhập tên sản phẩm",
                        price: {
                            required: "Vui lòng nhập giá sản phẩm",
                            min: "Giá sản phẩm phải lớn hơn 10000"
                        }
                    },
                    submitHandler: function(form) {
                        let name = $("#txtName").val();
                        let price = $("#txtPrice").val();
                        let idCategory = $("#txtIdCategory").val();
                        let formData = new FormData();
                        let fileInput = $("#txtImage")[0].files[0];
                        if(fileInput){
                            formData.append('img_url', fileInput);
                        }
                        formData.append('name', name);
                        formData.append('price', price);
                        formData.append('category_id', idCategory);

                        let link = frmCreUpdate.data.id != -1 ?
                            `http://127.0.0.1:8000/api/product/${frmCreUpdate.data.id}` :
                            "http://127.0.0.1:8000/api/product";

                        // console.log(frmCreUpdate.type);
                        $.ajax({
                            url: link,
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                $("#myModal").modal("hide");
                                getAllProducts();
                                $("#frmCreateUpdate").validate().resetForm();
                                if(frmCreUpdate.data.id == -1){
                                    alertify.success("Thêm sản phẩm thành công");
                                }
                                else{
                                    alertify.success("Cập nhật thành công");
                                }
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    }
                });
                $("#myModal").on("hidden.bs.modal", function() {
                    $("#frmCreateUpdate").validate().resetForm();
                    $("#txtName").css("color", "black");
                    $("#txtPrice").css("color", "black");
                   });
            });
        }


        function handleDelete(id) {
            let frmConfirm = confirm("Are you sure you want to delete?");
            if (frmConfirm) {
                fetch(`http://127.0.0.1:8000/api/product/${id}`, {
                        method: 'DELETE'
                    })
                    .then((res) => {
                        res.json();
                    })
                    .then(() => {
                        let delProduct = document.querySelector('.text-center.align-middle.product-' + id);
                        if (delProduct) {
                            delProduct.remove();
                            alertify.success("Đã xoá sản phẩm");
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        }
</script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css" />
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/semantic.min.css" />
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css" />

@endsection