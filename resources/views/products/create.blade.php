<!DOCTYPE html>  
<html lang="id">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Manajemen Produk</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">  
    <style>  
        body {  
            background-color: #f4f6f9;  
            font-family: 'Inter', sans-serif;  
        }  
        .card-form {  
            background: white;  
            border-radius: 12px;  
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);  
            padding: 30px;  
            margin-top: 50px;  
        }  
        .form-label {  
            font-weight: 600;  
            color: #495057;  
        }  
        .form-control {  
            border-radius: 8px;  
            padding: 12px 15px;  
        }  
        .btn-primary {  
            background-color: #4a6cf7;  
            border: none;  
            padding: 12px 20px;  
            border-radius: 8px;  
            transition: all 0.3s ease;  
        }  
        .btn-primary:hover {  
            background-color: #3a5af3;  
            transform: translateY(-3px);  
        }  
        .btn-secondary {  
            background-color: #6c757d;  
            border: none;  
            padding: 12px 20px;  
            border-radius: 8px;  
            transition: all 0.3s ease;  
        }  
        .btn-secondary:hover {  
            background-color: #555f66;  
            transform: translateY(-3px);  
        }  
        
    </style>  
</head>  
<body>  
<div class="container">  
    <div class="row justify-content-center">  
        <div class="col-md-6">  
            <div class="card-form">  
                <h2 class="text-center mb-4" style="color: #2c3e50;">  
                    <i class="bi bi-box-seam me-2"></i>Tambah Produk Baru  
                </h2>  
                <form action="{{ route('products.store') }}" method="POST">  
                    @csrf  
                    <div class="mb-3">  
                        <label for="name" class="form-label">Nama Produk</label>  
                        <input type="text" class="form-control" id="name" name="name"   
                               placeholder="Masukkan nama produk" required>  
                    </div>  
                    <div class="mb-3">  
                        <label for="description" class="form-label">Deskripsi</label>  
                        <textarea class="form-control" id="description" name="description"   
                                  rows="3" placeholder="Masukkan deskripsi produk" required></textarea>  
                    </div>  
                    <div class="row">  
                        <div class="col-md-6 mb-3">  
                            <label for="price" class="form-label">Harga</label>  
                            <div class="input-group">  
                                <span class="input-group-text">Rp</span>  
                                <input type="number" class="form-control" id="price"   
                                       name="price" step="1000" placeholder="0" required>  
                            </div>  
                        </div>  
                        <div class="col-md-6 mb-3">  
                            <label for="stock" class="form-label">Stok</label>  
                            <input type="number" class="form-control" id="stock"   
                                   name="stock" placeholder="Jumlah" required>  
                        </div>  
                    </div>  
                    <div class="row">  
                        <div class="col-md-6 mb-3">  
                            <div class="d-grid">  
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">  
                                    <i class="bi bi-arrow-left me-2"></i>Kembali  
                                </a>  
                            </div>  
                        </div>  
                        <div class="col-md-6 mb-3">  
                            <div class="d-grid">  
                                <button type="submit" class="btn btn-primary">  
                                    <i class="bi bi-plus-circle me-2"></i>Tambah Produk  
                                </button>  
                            </div>  
                        </div>  
                    </div>  
                </form>  
            </div>  
        </div>  
    </div>  
</div>  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>  
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">  
</body>  
</html>