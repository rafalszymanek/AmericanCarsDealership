#Clear table products
DB::table('products')->truncate();

$json_file = json_decode(file_get_contents("./scripts/15-products.json"), true);
$product_data = $json_file['products'];

#foreach didn't work
for($i = 0; $i<sizeof($product_data); $i++){
    $product = new App\Product;
    $product->name = $product_data[$i]['name'];
    $product->description = $product_data[$i]['description'];
    $product->image_src = $product_data[$i]['image_src'];
    $product->price = $product_data[$i]['price'];
    $product->category_id = $product_data[$i]['category_id'];
    $product->year = $product_data[$i]['year'];
    $product->is_available = $product_data[$i]['is_available'];
    $product->retailer_id = $product_data[$i]['retailer_id'];
    $product->color = $product_data[$i]['color'];
    $product->body_type = $product_data[$i]['body_type'];
    $product->engine = $product_data[$i]['engine'];
    $product->gearbox = $product_data[$i]['gearbox'];
    $product->save();
}