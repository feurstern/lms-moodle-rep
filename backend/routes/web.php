<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\WishlistController;
use App\Http\Middleware\CheckRoleMiddleware;
use App\Models\Course;
use App\Models\Customer;
use App\Models\Movie;
use App\Models\User;
use App\Models\UserProfile;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', [HomeController::class, "index"]);

// Route::get('/test', function () {
//     return view('test.test');
// });

// defiend the route
Route::get("/product", function () {
    return view("products.index");
});

Route::get("welcome", function () {
    return "welcome to thee page";
});

// routes wtih parameter
// Route::get("/user/{id}", function ($id) {
//     return "hello " . $id;
// });

// routes with the Route name
Route::get("/about", function () {
    return "about the school";
})->name("my.about");


// Route::get("/books/{bookId}/{type}", function ($bookId, $type) {
//     return "you select book index " . $bookId . " " . $type;
// })->name("books");


Route::get("/post/{id}/{content}", function ($id, $content) {
    return  "The post id : " . $id . " with the content: " . $content;
})->name("show-post");


Route::group(["prefix" => "blogs"], function () {
    // crf
    Route::get("/list", [BlogController::class, "index"]);
    Route::post("/create", [BlogController::class, "create"])->name('blog.create');
});

//  route group
// thiis route group below is belong to public one, because it doesn't have the prefix name for the group
Route::group(["prefix" => "course"], function () {

    // Route::get('/{title}', [CourseController::class, "index"]);

    Route::post("/create", [CourseController::class, "create"]);;

    Route::get("/detail/{id}", [CourseController::class, "courseDetail"]);
});


Route::get("/contact", [CourseController::class, "contact"]);


Route::get('/getData', [CourseController::class, "getData"]);

ROute::get('max-price', [CourseController::class, 'maxPrice']);

Route::get("/data", function () {
    $course = Course::all();
    echo json_encode($course);
});

Route::get("/editData/{id}", [CourseController::class, "edit"]);
Route::get("deleteData/{id}", [CourseController::class, "delete"]);
Route::get("/count-course", [CourseController::class, "count"]);
// now I want to group the user auth 
// Route::group(["prefix" => "user",  "as" => "t1."], function () {
//     Route::get("/create/{name}", function ($name) {
//         return "the user named " . $name . " has been created!";
//     })->name('create');

//     Route::get("/delete/{id}", function ($id) {
//         return "The user " . $id . "has been deleted!";
//     })->name('delete');
// });

Route::get("news/{post}", function ($post) {
    return view('welcome');
})->name('news');



Route::group(["prefix" => "user"], function () {
    Route::get("/list", [UserController::class, "index"]);
});

// Route::group(["prefix" => "books"], function () {
//     Route::get("/create", function () {
//         return "The book has been created";
//     })->name('create');

//     Route::get("/detail/{id}", function ($id) {
//         return "the books with " . $id . ' has been displayed';
//     })->name('delete');

//     Route::get("/list", [BookController::class, "index"])->name('books.list'); 
// });

Route::resource("/books", BookController::class);

// fallback routes when the URI is not found(laravel  has default pagee to show 404)

// Route::fallback(function(){
//     return "Ooops, error!";
// });

Route::group(['prefix' => "wishlist"], function () {

    Route::get('/',  [WishlistController::class, ['index']]);

    Route::get("/detail/{id}", function ($id) {
        return view('wishlist.detail');
    });
});


Route::group(["prefix" => "user-profile"], function () {
    Route::get("/list", [UserProfileController::class, "index"]);
    Route::get("/create", [UserProfileController::class, "create"]);
    Route::get("/detail/{id}", [UserProfileController::class, "show"]);
    Route::get("/edit/{id}", [UserProfileController::class, "edit"]);
    Route::get("/delete/{id}", [UserProfileController::class, "delete"]);
    Route::get("/selected-country", [UserProfileController::class, "selectedCountry"]);
});


Route::group(["prefix" => "product"], function () {
    Route::get("/list", [ProductController::class, "index"]);
    Route::get("/delete/{id}", [ProductController::class, "delete"]);
});

Route::group(["prefix" => "file"], function () {
    Route::get("/form", [FileController::class, "index"]);
    // customn name file
    Route::post('/upload', [FileController::class, "store"])->name('file.upload');
    // Default name  file
    Route::post("upload-default", [FileController::class, "upload"])->name("file.uploads");
    Route::post("/list", [FileController::class, "list"]);
    Route::get("download/{id}", [FileController::class, "download"])->name('download');
});

Route::group(["prefix" => "customer"], function () {
    Route::get("home", [CustomerController::class, "index"])->name("customer.index");
    Route::get("/create-form", [CustomerController::class, "createForm"])->name('customer.create');
    Route::post("/insert", [CustomerController::class, "store"])->name("customer.insert");
    Route::get("/delete/{id}", [CustomerController::class, "destroy"])->name('customer.delete');
    Route::get("/detail/{id}", [CustomerController::class, "show"])->name('customer.detail');
    Route::get("edit-form/{id}", [CustomerController::class, "edit"])->name("customer.edit-page");
    Route::post("update/{id}", [CustomerController::class, "update"])->name("customer.update");
});


Route::group(["prefix" => "movie" /* "middleware" => CheckRoleMiddleware::class  */], function () {
    Route::get("/list", [MovieController::class, "index"])->name("movie.index");
    Route::get("create-page", [MovieController::class, "create"])->name("movie.create");
    Route::post("/insert", [MovieController::class, "store"])->name("movie.insert")->middleware(CheckRoleMiddleware::class);
});


Route::group(["prefix" => "order"], function () {
    Route::get("/list", [OrderController::class, "index"]);
});


// implement global middleware group to the specific routess
Route::get("/admin-page", function () {
    return view("admin.page");
})->name('admin.page')->middleware("test");

// implment the middlewaare alias

Route::get("/admin-page2", function () {
    return view("admin.page2");
})->name('admin.page2')->middleware(["checkRole"]);


Route::get("test-admin", function () {
})->middleware("checkRole:admin");


// just addd midleware to prevent the unauthorized access
Route::get("user-dashboard",  [UserController::class, "index"])->middleware(['auth', 'verified'])->name("user.dashboard");
require __DIR__ . '/auth.php';
