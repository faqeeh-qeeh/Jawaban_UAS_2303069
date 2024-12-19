<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Manajemen Produk</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">  
    <style>  
        :root {  
            --primary-color: #6a11cb;  
            --secondary-color: #2575fc;  
            --bg-light: #f4f6f9;  
            --text-dark: #333;  
        }  
        
        body {  
            background-color: var(--bg-light);  
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;  
            color: var(--text-dark);  
        }  
        
        .gradient-header {  
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));  
            color: white;  
            padding: 20px;  
            border-radius: 10px;  
            margin-bottom: 20px;  
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);  
        }  
        
        .card {  
            border: none;  
            border-radius: 12px;  
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);  
        }  
        
        .table {  
            border-radius: 12px;  
            overflow: hidden;  
        }  
        
        .table thead {  
            background-color: #f8f9fa;  
        }  
        
        .table-hover tbody tr:hover {  
            background-color: rgba(106, 17, 203, 0.05);  
            transition: background-color 0.3s ease;  
        }  
        
        .btn-primary {  
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));  
            border: none;  
            transition: transform 0.3s ease;  
        }  
        
        .btn-primary:hover {  
            transform: scale(1.05);  
        }  
        
        .actions-column .btn {  
            margin: 0 4px;  
        }  
        
        .stock-badge {  
            font-size: 0.8rem;  
            padding: 0.3rem 0.6rem;  
        }  
        
        @keyframes fadeIn {  
            from { opacity: 0; }  
            to { opacity: 1; }  
        }  
        
        .toast-container {  
            animation: fadeIn 0.5s ease-out;  
        }  
        .empty-state {  
            background-color: #f8f9fa;  
            border-radius: 12px;  
            transition: background-color 0.3s ease;  
        }  
        
        .empty-state:hover {  
            background-color: #e9ecef;  
        }  
        
        .empty-state i {  
            transition: transform 0.3s ease;  
        }  
        
        .empty-state:hover i {  
            transform: scale(1.1);  
        }
    </style>  
</head>  
<body>  
    <div class="container-fluid px-4 py-4">  
        <div class="gradient-header d-flex justify-content-between align-items-center">  
            <div>  
                <h1 class="mb-2">🖥 Toko Online</h1>  
                <p class="text-white-50 mb-0">Sistem Manajemen Produk Modern</p>  
            </div>  
            <a href="{{ route('products.create') }}" class="btn btn-primary">  
                <i class="bi bi-plus-circle me-2"></i>Tambah Produk Baru  
            </a>  
        </div>  

        <div class="toast-container position-fixed top-0 end-0 p-3">  
            @if ($message = Session::get('success'))  
            <div class="toast align-items-center text-bg-success border-0" role="alert">  
                <div class="d-flex">  
                    <div class="toast-body">{{ $message }}</div>  
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>  
                </div>  
            </div>  
            @endif  

            @if ($message = Session::get('error'))  
            <div class="toast align-items-center text-bg-danger border-0" role="alert">  
                <div class="d-flex">  
                    <div class="toast-body">{{ $message }}</div>  
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>  
                </div>  
            </div>  
            @endif  
        </div>  

        <div class="card">  
            <div class="card-body">  
                <div class="table-responsive">  
                    <table class="table table-hover">  
                        <thead>  
                            <tr>  
                                <th>ID</th>  
                                <th>Nama Produk</th>  
                                <th>Deskripsi</th>  
                                <th>Harga</th>  
                                <th>Stok</th>  
                                <th class="text-center">Aksi</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                            @if($products->isEmpty())  
                            <tr>  
                                <td colspan="6" class="text-center py-5">  
                                    <div class="d-flex flex-column align-items-center justify-content-center">  
                                        <i class="bi bi-box-seam text-muted" style="font-size: 4rem;"></i>  
                                        <h4 class="mt-3 text-muted">Produk Belum Diinputkan</h4>  
                                        <p class="text-secondary">Silakan tambahkan produk pertama Anda</p>  
                                        <a href="{{ route('products.create') }}" class="btn btn-primary mt-3">  
                                            <i class="bi bi-plus-circle me-2"></i>Tambah Produk Sekarang  
                                        </a>  
                                    </div>  
                                </td>  
                            </tr>  
                            @else  
                                @foreach ($products as $product)  
                                <tr>  
                                    <td>{{ $product->id }}</td>  
                                    <td>{{ $product->name }}</td>  
                                    <td>{{ Str::limit($product->description, 50) }}</td>  
                                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>  
                                    <td>  
                                        <span class="badge {{ $product->stock > 10 ? 'bg-success' : 'bg-warning' }} stock-badge">  
                                            {{ $product->stock }}  
                                        </span>  
                                    </td>  
                                    <td class="actions-column text-center">  
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">  
                                            <i class="bi bi-pencil me-1"></i>Ubah  
                                        </a>  
                                        <form action="{{ route('products.destroy', $product->id) }}"   
                                            method="POST"   
                                            style="display:inline;">  
                                          @csrf  
                                          @method('DELETE')  
                                          <button type="submit" class="btn btn-danger btn-sm">  
                                              <i class="bi bi-trash me-1"></i>Hapus  
                                          </button>  
                                      </form> 
                                    </td>  
                                </tr>  
                                @endforeach  
                            @endif  
                        </tbody>
                    </table>  
                </div>  
            </div>  
        </div>  
    </div>  
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">  
        <div class="modal-dialog">  
            <div class="modal-content">  
                <div class="modal-header">  
                    <h5 class="modal-title" id="deleteConfirmModalLabel">Konfirmasi Hapus</h5>  
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
                </div>  
                <div class="modal-body">  
                    Apakah Anda yakin ingin menghapus produk ini?  
                </div>  
                <div class="modal-footer">  
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>  
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Hapus</button>  
                </div>  
            </div>  
        </div>  
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>  
    <script>  
        document.addEventListener('DOMContentLoaded', function() {  
            var toastElList = [].slice.call(document.querySelectorAll('.toast'))  
            var toastList = toastElList.map(function(toastEl) {  
                return new bootstrap.Toast(toastEl, {  
                    delay: 3000   
                }).show();  
            });  
            const deleteConfirmModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));  
            const deleteModalBody = document.querySelector('#deleteConfirmModal .modal-body');   
            const deleteButtons = document.querySelectorAll('.actions-column .btn-danger');  
            let currentDeleteForm = null;  
        
            deleteButtons.forEach(button => {  
                button.addEventListener('click', function(e) {  
                    e.preventDefault();
                    const productName = this.closest('tr').querySelector('td:nth-child(2)').textContent;  
                    deleteModalBody.textContent = `Apakah Anda yakin ingin menghapus produk "${productName}"?`;  
                    currentDeleteForm = this.closest('form');  
                    deleteConfirmModal.show();  
                });  
            });  
        
            // Konfirmasi penghapusan  
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');  
            confirmDeleteBtn.addEventListener('click', function() {  
                if (currentDeleteForm) {  
                    currentDeleteForm.submit();  
                    deleteConfirmModal.hide();
                }  
            });  
            const actionButtons = document.querySelectorAll('.actions-column .btn');  
            actionButtons.forEach(button => {  
                button.addEventListener('mouseenter', function() {  
                    this.style.transform = 'scale(1.05)';  
                });  
                button.addEventListener('mouseleave', function() {  
                    this.style.transform = 'scale(1)';  
                });  
            });  
        });  
    </script>
</body>  
</html>