#Clear table categories
DB::table('categories')->truncate();

$json_file = json_decode(file_get_contents("./scripts/9-categories.json"), true);
$categories_data = $json_file['categories'];

#foreach didn't work
for($i = 0; $i<sizeof($categories_data); $i++){
    $category = new App\Category;
    $category->name = $categories_data[$i]['name'];
    $category->parent_id = $categories_data[$i]['parent_id'];
    $category->save();
}

