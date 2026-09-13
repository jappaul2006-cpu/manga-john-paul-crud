<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        
        <!-- Header & Navigation -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Product Management Dashboard</h1>
            <a href="<?= site_url('auth/logout'); ?>" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 text-sm">Logout</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Form Section (Create or Edit) -->
            <div class="bg-gray-50 p-4 rounded border border-gray-200">
                <h2 class="text-lg font-semibold mb-4 text-gray-700">
                    <?= isset($product) ? 'Edit Product' : 'Add New Product'; ?>
                </h2>
                
                <form action="<?= isset($product) ? site_url('products/update/' . $product['id']) : site_url('products/store'); ?>" method="POST" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Product Name</label>
                        <input type="text" name="product_name" value="<?= isset($product) ? $product['product_name'] : ''; ?>" required class="w-full mt-1 p-2 border rounded focus:ring focus:ring-blue-300">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Description</label>
                        <textarea name="description" class="w-full mt-1 p-2 border rounded focus:ring focus:ring-blue-300"><?= isset($product) ? $product['description'] : ''; ?></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Price</label>
                        <input type="number" step="0.01" name="price" value="<?= isset($product) ? $product['price'] : ''; ?>" required class="w-full mt-1 p-2 border rounded focus:ring focus:ring-blue-300">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Quantity</label>
                        <input type="number" name="quantity" value="<?= isset($product) ? (isset($product['quantity']) ? $product['quantity'] : $product['stock']) : ''; ?>" required class="w-full mt-1 p-2 border rounded focus:ring focus:ring-blue-300">
                    </div>
                    <div class="flex space-x-2">
                        <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700 font-medium">
                            <?= isset($product) ? 'Update Product' : 'Save Product'; ?>
                        </button>
                        <?php if(isset($product)): ?>
                            <a href="<?= site_url('products'); ?>" class="w-full bg-gray-400 text-white p-2 rounded hover:bg-gray-500 text-center font-medium">Cancel</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <!-- Table Section -->
            <div class="md:col-span-2 overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700 text-sm">
                            <th class="p-3 border">ID</th>
                            <th class="p-3 border">Name</th>
                            <th class="p-3 border">Description</th>
                            <th class="p-3 border">Price</th>
                            <th class="p-3 border">Quantity</th>
                            <th class="p-3 border text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-600">
                        <?php if (!empty($products)): ?>
                            <?php foreach ($products as $p): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3 border"><?= $p['id']; ?></td>
                                    <td class="p-3 border font-medium text-gray-800"><?= $p['product_name']; ?></td>
                                    <td class="p-3 border"><?= isset($p['description']) ? $p['description'] : ''; ?></td>
                                    <td class="p-3 border">$<?= number_format($p['price'], 2); ?></td>
                                    <td class="p-3 border"><?= isset($p['quantity']) ? $p['quantity'] : $p['stock']; ?></td>
                                    <td class="p-3 border text-center space-x-2">
                                        <a href="<?= site_url('products/' . $p['id']); ?>" class="text-blue-600 hover:underline font-medium">Edit</a>
                                        <a href="<?= site_url('products/delete/' . $p['id']); ?>" onclick="return confirm('Are you sure you want to delete this product?');" class="text-red-600 hover:underline font-medium">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="p-4 text-center text-gray-400 border">No products found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
</html>