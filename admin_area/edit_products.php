<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" id="product_description" name="product_description" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-label">Product Category</label>
            <select name="product_category" class="form-select">
                <option value="Chocolate"></option>
                <option value="Shoes"></option>
                <option value="Clothes"></option>
            </select>
            <label for="product_brand" class="form-label">Product Brand</label>
            <select name="product_brands" class="form-select">
                <option value="Nike"></option>
                <option value="Zara"></option>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required>
            <img src="./product_images/" alt="" class="prouct_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required>
            <img src="./product_images/" alt="" class="prouct_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image1</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto" required>
            <img src="./product_images/" alt="" class="prouct_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" class="form-control" required>
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" value="Update Product"class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>