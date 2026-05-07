<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Product Management System - INR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f0f2f5;
            color: #1a1a2e;
        }

        .navbar-modern {
            background: linear-gradient(135deg, #ff9933 0%, #138808 100%);
            padding: 1rem 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .navbar-modern h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
            color: white;
        }

        .navbar-modern p {
            color: rgba(255,255,255,0.9);
            margin: 0;
            font-size: 0.9rem;
        }

        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .form-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-card:hover {
            box-shadow: 0 15px 50px rgba(0,0,0,0.15);
        }

        .card-header-modern {
            background: linear-gradient(135deg, #ff9933 0%, #138808 100%);
            padding: 1.5rem;
            color: white;
        }

        .card-header-modern h3 {
            margin: 0;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .card-header-modern i {
            margin-right: 10px;
        }

        .form-body {
            padding: 2rem;
        }

        .form-label-modern {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #2d3748;
            font-size: 0.9rem;
        }

        .form-control-modern {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control-modern:focus {
            border-color: #ff9933;
            box-shadow: 0 0 0 3px rgba(255, 153, 51, 0.1);
        }

        .btn-modern {
            background: linear-gradient(135deg, #ff9933 0%, #138808 100%);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 153, 51, 0.4);
            color: white;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #ff9933 0%, #138808 100%);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }

        .stat-icon {
            font-size: 2rem;
            color: #ff9933;
            margin-bottom: 1rem;
        }

        .stat-title {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #718096;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
        }

        .table-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        .table-header {
            background: #f7fafc;
            padding: 1.5rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .table-header h4 {
            margin: 0;
            font-weight: 600;
            color: #2d3748;
        }

        .modern-table {
            margin: 0;
        }

        .modern-table thead th {
            background: #f7fafc;
            color: #4a5568;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .modern-table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid #e2e8f0;
        }

        .modern-table tbody tr:hover {
            background: #f7fafc;
        }

        .modern-table td {
            padding: 1rem;
            vertical-align: middle;
            color: #2d3748;
        }

        .btn-edit-modern {
            background: #4299e1;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            margin: 0 0.25rem;
        }

        .btn-edit-modern:hover {
            background: #3182ce;
            transform: translateY(-2px);
        }

        .btn-delete-modern {
            background: #f56565;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            margin: 0 0.25rem;
        }

        .btn-delete-modern:hover {
            background: #e53e3e;
            transform: translateY(-2px);
        }

        .btn-save-modern {
            background: #48bb78;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .btn-save-modern:hover {
            background: #38a169;
            transform: translateY(-2px);
        }

        .btn-cancel-modern {
            background: #a0aec0;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .btn-cancel-modern:hover {
            background: #718096;
            transform: translateY(-2px);
        }

        .total-row {
            background: linear-gradient(135deg, #ff9933 0%, #138808 100%);
            color: white;
            font-weight: 700;
        }

        .total-row td {
            padding: 1rem;
            font-size: 1.1rem;
        }

        .edit-mode {
            background: #fef5e7 !important;
            border-left: 4px solid #ff9933;
        }

        .edit-mode input {
            border: 2px solid #ff9933;
            border-radius: 8px;
            padding: 0.5rem;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-row {
            animation: slideIn 0.3s ease-out;
        }

        .alert-modern {
            border-radius: 12px;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            animation: slideIn 0.3s ease-out;
        }

        .currency-symbol {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 0 1rem;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
            
            .form-body {
                padding: 1rem;
            }
        }

        /* Data attribute for storing raw values */
        .total-value {
            position: relative;
        }
    </style>
</head>
<body>
    <div class="navbar-modern">
        <div class="main-container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1>
                        <i class="fas fa-rupee-sign"></i> 
                        ProductFlow India
                    </h1>
                    <p>Manage your inventory in Indian Rupees (₹)</p>
                </div>
                <div>
                    <i class="fas fa-indian-rupee-sign fa-2x" style="opacity: 0.5;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="main-container">
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="stat-title">Total Products</div>
                <div class="stat-value" id="totalProducts">0</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-title">Total Value</div>
                <div class="stat-value" id="totalValue">
                    <span class="currency-symbol">₹</span>0
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-box"></i>
                </div>
                <div class="stat-title">Total Stock</div>
                <div class="stat-value" id="totalStock">0</div>
            </div>
        </div>

        <div class="form-card">
            <div class="card-header-modern">
                <h3>
                    <i class="fas fa-plus-circle"></i>
                    Add New Product
                </h3>
            </div>
            <div class="form-body">
                <form id="productForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label class="form-label-modern">Product Name</label>
                            <input type="text" class="form-control form-control-modern" id="product_name" name="product_name" placeholder="Enter product name" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label-modern">Quantity in Stock</label>
                            <input type="number" class="form-control form-control-modern" id="quantity" name="quantity" placeholder="0" min="0" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label-modern">Price per Item (₹)</label>
                            <input type="number" step="0.01" class="form-control form-control-modern" id="price" name="price" placeholder="0.00" min="0" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-1 mb-3 d-flex align-items-end">
                            <button type="submit" class="btn-modern">
                                <i class="fas fa-save"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div id="formAlert"></div>
            </div>
        </div>

        <div class="table-container">
            <div class="table-header">
                <h4>
                    <i class="fas fa-list"></i> Product Inventory (₹ Indian Rupees)
                </h4>
            </div>
            <div class="table-responsive">
                <table class="table modern-table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price (₹)</th>
                            <th>Submitted</th>
                            <th>Total Value (₹)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="productsBody">
                        @foreach($products as $product)
                            @php
                                $totalValue = $product->quantity * $product->price;
                            @endphp
                            <tr data-id="{{ $product->id }}" data-total-value="{{ $totalValue }}" class="product-row">
                                <td class="product-name">{{ $product->product_name }}</td>
                                <td class="quantity" data-quantity="{{ $product->quantity }}">{{ $product->quantity }}</td>
                                <td class="price" data-price="{{ $product->price }}">₹{{ number_format($product->price, 2) }}</td>
                                <td class="submitted-at">{{ $product->submitted_at->format('Y-m-d H:i:s') }}</td>
                                <td class="total-value" data-total="{{ $totalValue }}">₹{{ number_format($totalValue, 2) }}</td>
                                <td>
                                    <button class="btn-edit-modern btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="btn-delete-modern btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="total-row">
                            <td colspan="4" class="text-end"><strong>Grand Total:</strong></td>
                            <td id="grandTotal"><strong>₹0.00</strong></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        $(document).ready(function() {
            updateStats();
            updateGrandTotal();
            
            $('#productForm').on('submit', function(e) {
                e.preventDefault();
                
                let formData = $(this).serialize();
                
                $.ajax({
                    url: '/products',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            addProductToTable(response.product);
                            $('#productForm')[0].reset();
                            showAlert('Product added successfully!', 'success');
                            updateStats();
                            updateGrandTotal();
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            displayErrors(errors);
                        } else {
                            showAlert('An error occurred. Please try again.', 'danger');
                        }
                    }
                });
            });
            
            $(document).on('click', '.btn-edit', function() {
                let row = $(this).closest('tr');
                if (!row.hasClass('edit-mode')) {
                    enableEditMode(row);
                }
            });
            
            $(document).on('click', '.btn-delete', function() {
                if (confirm('Are you sure you want to delete this product?')) {
                    let row = $(this).closest('tr');
                    let id = row.data('id');
                    
                    $.ajax({
                        url: '/products/' + id,
                        type: 'DELETE',
                        data: { '_token': '{{ csrf_token() }}' },
                        success: function(response) {
                            if (response.success) {
                                row.fadeOut(300, function() {
                                    $(this).remove();
                                    updateGrandTotal();
                                    updateStats();
                                });
                                showAlert('Product deleted successfully!', 'success');
                            }
                        },
                        error: function() {
                            showAlert('Error deleting product.', 'danger');
                        }
                    });
                }
            });
            
            $(document).on('click', '.btn-save', function() {
                let row = $(this).closest('tr');
                let id = row.data('id');
                let productData = {
                    product_name: row.find('.edit-product-name').val(),
                    quantity: row.find('.edit-quantity').val(),
                    price: row.find('.edit-price').val(),
                    _token: '{{ csrf_token() }}',
                    _method: 'PUT'
                };
                
                $.ajax({
                    url: '/products/' + id,
                    type: 'POST',
                    data: productData,
                    success: function(response) {
                        if (response.success) {
                            disableEditMode(row, productData);
                            updateGrandTotal();
                            updateStats();
                            showAlert('Product updated successfully!', 'success');
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            displayInlineErrors(row, errors);
                        } else {
                            showAlert('Error updating product.', 'danger');
                        }
                    }
                });
            });
            
            $(document).on('click', '.btn-cancel', function() {
                let row = $(this).closest('tr');
                disableEditMode(row);
            });
        });
        
        function addProductToTable(product) {
            let totalValue = product.quantity * product.price;
            let row = `
                <tr data-id="${product.id}" data-total-value="${totalValue}" class="product-row" style="display: none;">
                    <td class="product-name">${escapeHtml(product.product_name)}</td>
                    <td class="quantity" data-quantity="${product.quantity}">${product.quantity}</td>
                    <td class="price" data-price="${product.price}">₹${parseFloat(product.price).toFixed(2)}</td>
                    <td class="submitted-at">${product.submitted_at}</td>
                    <td class="total-value" data-total="${totalValue}">₹${totalValue.toFixed(2)}</td>
                    <td>
                        <button class="btn-edit-modern btn-edit"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn-delete-modern btn-delete"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            `;
            $('#productsBody').prepend(row);
            $('#productsBody tr:first').fadeIn(300);
        }
        
        function enableEditMode(row) {
            let productName = row.find('.product-name').text();
            let quantity = row.find('.quantity').attr('data-quantity') || row.find('.quantity').text();
            let price = row.find('.price').attr('data-price') || row.find('.price').text().replace('₹', '');
            
            row.addClass('edit-mode');
            row.find('.product-name').html(`<input type="text" class="form-control edit-product-name" value="${escapeHtml(productName)}" style="border-color: #ff9933;">`);
            row.find('.quantity').html(`<input type="number" class="form-control edit-quantity" value="${quantity}" style="border-color: #ff9933;">`);
            row.find('.price').html(`<input type="number" step="0.01" class="form-control edit-price" value="${price}" style="border-color: #ff9933;">`);
            row.find('.submitted-at').html('<span class="badge bg-warning text-dark">Editing...</span>');
            row.find('.total-value').html('<span class="badge bg-secondary">Will update</span>');
            row.find('.btn-edit').replaceWith('<button class="btn-save-modern btn-save"><i class="fas fa-save"></i> Save</button>');
            row.find('.btn-delete').after('<button class="btn-cancel-modern btn-cancel"><i class="fas fa-times"></i> Cancel</button>');
        }
        
        function disableEditMode(row, newData = null) {
            row.removeClass('edit-mode');
            
            if (newData) {
                let totalValue = parseFloat(newData.quantity) * parseFloat(newData.price);
                row.find('.product-name').text(newData.product_name);
                row.find('.quantity').attr('data-quantity', newData.quantity).text(newData.quantity);
                row.find('.price').attr('data-price', newData.price).text('₹' + parseFloat(newData.price).toFixed(2));
                row.find('.submitted-at').text(new Date().toLocaleString());
                row.find('.total-value').attr('data-total', totalValue).text('₹' + totalValue.toFixed(2));
                row.attr('data-total-value', totalValue);
            } else {
                let originalProductName = row.find('.edit-product-name').val();
                let originalQuantity = row.find('.edit-quantity').val();
                let originalPrice = row.find('.edit-price').val();
                let totalValue = parseFloat(originalQuantity) * parseFloat(originalPrice);
                
                row.find('.product-name').text(originalProductName);
                row.find('.quantity').attr('data-quantity', originalQuantity).text(originalQuantity);
                row.find('.price').attr('data-price', originalPrice).text('₹' + parseFloat(originalPrice).toFixed(2));
                row.find('.submitted-at').text(new Date().toLocaleString());
                row.find('.total-value').attr('data-total', totalValue).text('₹' + totalValue.toFixed(2));
                row.attr('data-total-value', totalValue);
            }
            
            row.find('.btn-save').replaceWith('<button class="btn-edit-modern btn-edit"><i class="fas fa-edit"></i> Edit</button>');
            row.find('.btn-cancel').remove();
        }
        
        function updateGrandTotal() {
            let total = 0;
            // Use the data-total attribute for accurate calculation
            $('.total-value').each(function() {
                let value = $(this).attr('data-total');
                if (value && !isNaN(value)) {
                    total += parseFloat(value);
                } else {
                    // Fallback: parse the text by removing ₹ and commas
                    let textValue = $(this).text().replace('₹', '').replace(/,/g, '');
                    total += parseFloat(textValue) || 0;
                }
            });
            $('#grandTotal').html('<strong>₹' + total.toFixed(2) + '</strong>');
        }
        
        function updateStats() {
            let totalProducts = $('#productsBody tr').length;
            let totalStock = 0;
            let totalValue = 0;
            
            $('.quantity').each(function() {
                let qty = $(this).attr('data-quantity') || $(this).text();
                totalStock += parseInt(qty) || 0;
            });
            
            $('.total-value').each(function() {
                let val = $(this).attr('data-total');
                if (val && !isNaN(val)) {
                    totalValue += parseFloat(val);
                } else {
                    let textVal = $(this).text().replace('₹', '').replace(/,/g, '');
                    totalValue += parseFloat(textVal) || 0;
                }
            });
            
            $('#totalProducts').text(totalProducts);
            $('#totalStock').text(totalStock);
            $('#totalValue').html('<span class="currency-symbol">₹</span>' + totalValue.toFixed(2));
        }
        
        function displayErrors(errors) {
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').empty();
            
            for (let field in errors) {
                let input = $('#' + field);
                input.addClass('is-invalid');
                input.siblings('.invalid-feedback').text(errors[field][0]);
            }
        }
        
        function displayInlineErrors(row, errors) {
            if (errors.product_name) {
                row.find('.edit-product-name').addClass('is-invalid');
            }
            if (errors.quantity) {
                row.find('.edit-quantity').addClass('is-invalid');
            }
            if (errors.price) {
                row.find('.edit-price').addClass('is-invalid');
            }
        }
        
        function showAlert(message, type) {
            $('#formAlert').html(`
                <div class="alert alert-${type} alert-modern alert-dismissible fade show" role="alert">
                    <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'}"></i>
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `);
            setTimeout(() => {
                $('#formAlert .alert').fadeOut('slow');
            }, 3000);
        }
        
        function escapeHtml(text) {
            return $('<div>').text(text).html();
        }
    </script>
</body>
</html>