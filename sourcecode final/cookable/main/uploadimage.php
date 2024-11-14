<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>COOKABLE - NHẬN DIỆN NGUYÊN LIỆU</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/uploadimage.css">
    <link rel="stylesheet" href="../css/chatbot.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="../js/chatbot.js" defer></script>
</head>

        <!--header-->
        <nav class="header navbar navbar-expand-sm bg-dark navbar-dark navbar-inverse">
        <div class="container-fluid">
            <div class="logo0 col-1  ">
                <a class="navbar-brand fa-solid fa-truck-fast" href="../index.php"></a>
            </div>
            <div class="logo1 col-7 pa-y-2 " > 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-left" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " href="../index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../mainphu/sanpham.php">Sản phẩm</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="blog.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lienhe.php">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="calo.php">Tính Calo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="congthuc.php">Công thức nấu ăn</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="logo2 col-1">
                <a class="navbar-brand fa-solid fa-user " href="user.php"></a>
                <a class="navbar-brand fa-solid fa-cart-shopping" href="../mainphu/sanpham.php"></a>
            </div>
        </div>
    </nav>
    
    
    <!--banner-->
    <div class="banner container-fluid">
        <div class="col-xxl-7 box-left">
            <h2>
                <span>NHẬN DIỆN NGUYÊN LIỆU</span>
            </h2>
            <p>Nơi sẻ chia công thức và kinh nghiệm tâm đắc của bạn</p>
            <p>Học hỏi các bí quyết tuyệt vời của người khác</p>
            <a href="blog.php">
            <button> Đăng bài </button>
        </a>
        </div>
        <div class="col-xl-5 box-right">
            <img src="https://github.com/hqteamobi/web_shop_ban_hang/blob/main/assets/img_1.png?raw=true" alt="">
            <img src="https://github.com/hqteamobi/web_shop_ban_hang/blob/main/assets/img_2.png?raw=true" alt="">
            <img src="https://github.com/hqteamobi/web_shop_ban_hang/blob/main/assets/img_3.png?raw=true" alt="">
        </div>
        <div class="to-bottom">
        <a href="banner.php">
                <img src="https://github.com/hqteamobi/web_shop_ban_hang/blob/main/assets/to_bottom.png?raw=true" alt="">
            </a>
        </div>
    </div>
    <div class="blogs container-fluid">    
        <div class="wrap container bg-white">
        <div class="row">
    <h2>NHẬN DIỆN NGUYÊN LIỆU QUA HÌNH ẢNH</h2>
    </div>
    <div class="row">
        <div class="share">
    <form class="search" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <!--<input type="file" name="image" accept="image/*">
        <button type="submit">Nhận diện</button>-->
        <div class="form-container">
        <div class="file-input-wrapper" id="fileWrapper">
            <label for="file-upload">Chọn tệp</label>
            <input type="file" id="file-upload" name="image" accept="image/*">
        </div>
        <button type="submit">Nhận diện</button>
    </div>
    </form>
    <?php

// Hàm dịch từ tiếng Anh sang tiếng Việt bằng Google Translate API
function translateText($text, $apiKey) {
    $url = 'https://translation.googleapis.com/language/translate/v2?key=' . $apiKey;
    $data = array(
        'q' => $text,
        'source' => 'en',
        'target' => 'vi',
        'format' => 'text'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $response = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($response, true);
    return $result['data']['translations'][0]['translatedText'];
}

// Hàm gọi Google Cloud Natural Language API để nhận diện các thực thể
function analyzeEntities($text, $apiKey) {
    $url = 'https://language.googleapis.com/v1/documents:analyzeEntities?key=' . $apiKey;
    $document = array(
        'document' => array(
            'type' => 'PLAIN_TEXT',
            'content' => $text
        ),
        'encodingType' => 'UTF8'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($document));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
    ));
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

// Danh sách các nguyên liệu phổ biến
$ingredientsList = ["fish", "kitten", "dog", "cat", "chicken", "flour", "sugar", "eggs", "egg", "butter", "milk", "salt", "oil", "yeast", "vanilla", "chocolate", "water", "honey", "rice", "garlic", "onion", "tomato", "potato", "carrot", "chicken", "beef", "pork", "fish", "shrimp", "cheese", "cream", "yogurt", "bread", "pasta", "basil", "parsley", "cilantro", "oregano", "thyme", "rosemary", "pepper", "cinnamon", "ginger", "turmeric", "soy sauce", "vinegar", "mustard", "ketchup", "mayonnaise", "olive oil", "vegetable oil", "cornstarch", "baking powder", "baking soda", "cocoa powder", "coconut milk", "peanut butter", "almonds", "walnuts", "cashews", "spinach", "broccoli", "lettuce", "cucumber", "bell pepper", "mushroom", "zucchini", "peas", "corn", "beans", "lentils", "chickpeas", "tofu", "noodles", "sardines", "tuna", "lobster", "crab", "clams", "oysters", "scallops", "lamb", "duck", "turkey", "bacon", "sausage", "ham", "maple syrup", "molasses", "apple", "banana", "grape", "orange", "lemon", "lime", "strawberry", "blueberry", "raspberry", "blackberry", "pineapple", "mango", "peach", "plum", "cherry", "apricot", "kiwi", "pomegranate", "fig", "date", "raisin", "coconut", "avocado", "papaya", "melon", "cantaloupe", "watermelon", "spinach", "cabbage", "kale", "asparagus", "celery", "eggplant", "beet", "radish", "turnip", "pumpkin", "squash", "sweet potato", "yam", "quinoa", "barley", "oats", "wheat", "rye", "spelt", "buckwheat", "millet", "sorghum", "chia seeds", "flax seeds", "sunflower seeds", "pumpkin seeds","dog", "cat", "mouse", "horse", "cow", "pig", "sheep", "goat", "chicken", "duck", "goose", "turkey", "rabbit", "hamster", "guinea pig", "rat", "deer", "elephant", "lion", "tiger", "bear", "wolf", "fox", "monkey", "ape", "gorilla", "chimpanzee", "kangaroo", "koala", "panda", "leopard", "cheetah", "jaguar", "zebra", "giraffe", "rhinoceros", "hippopotamus", "crocodile", "alligator", "snake", "lizard", "turtle", "frog", "toad", "bat", "squirrel", "hedgehog", "badger", "otter", "beaver", "raccoon", "skunk", "opossum", "porcupine", "moose", "buffalo", "bison", "camel", "donkey", "mule", "owl", "eagle", "hawk", "falcon", "sparrow", "pigeon", "dove", "parrot", "penguin", "flamingo", "peacock", "seagull", "swan", "pelican", "stork", "heron", "crane", "robin", "blue jay", "cardinal", "crow", "raven", "magpie", "woodpecker", "hummingbird", "vulture", "ostrich", "emu", "kiwi", "platypus", "whale", "dolphin", "shark", "seal","squid", "sea lion", "walrus", "octopus", "squid", "jellyfish", "starfish", "crab", "lobster"];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // Lưu trữ hình ảnh tạm thời
    $uploadDir = 'uploads/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
    
    $imageData = base64_encode(file_get_contents($uploadFile));
    
    // $visionApiKey = 'AIzaSyCTqYaPNYMzY_48Q1aVu8UdFePIaCuE0F8';
    // $translateApiKey = 'AIzaSyCTqYaPNYMzY_48Q1aVu8UdFePIaCuE0F8';
    // $languageApiKey = 'AIzaSyCTqYaPNYMzY_48Q1aVu8UdFePIaCuE0F8';
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://vision.googleapis.com/v1/images:annotate?key=" . $visionApiKey,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode(array(
            'requests' => array(
                array(
                    'image' => array(
                        'content' => $imageData
                    ),
                    'features' => array(
                        array('type' => 'LABEL_DETECTION')
                    ),
                    'imageContext' => array(
                        'languageHints' => array('vi')
                    )
                )
            )
        )),
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json"
        ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
        echo "Lỗi cURL: " . $err;
    } else {
        $data = json_decode($response, true);
        $labels = $data['responses'][0]['labelAnnotations'];
        
        echo "<div class='center'>";
        echo "<img src='" . $uploadFile . "' alt='Uploaded Image' class='centered-image'><br><br>";
        echo "</div>";
        
        echo "<h3>Nguyên liệu trong ảnh là:</h3>";
        echo "<ul>";
        
        $count = 0; // Khởi tạo biến đếm ở ngoài vòng lặp chính
        foreach ($labels as $label) {
            $description = $label['description'];
            $entities = analyzeEntities($description, $languageApiKey);
            
            foreach ($entities['entities'] as $entity) {
                if ($count >= 1) break;
                if (in_array(strtolower($entity['name']), $ingredientsList)) {
                    $translatedText = translateText($entity['name'], $translateApiKey);
                    echo "<li>" . $translatedText . "</li>";
                    $count++;
                    break;
                }
            }
        }
        
        echo "</ul>";
    }
}
?>
    </div>
    </div>
    <div class="row">
        <h2></h2>
      </div>
      </div>
    </div>
    <!--footer-->
<div class="footer container-fluid" style="background: rgba(0, 0, 0, 0.79); padding: 20px;">
    <div class="row">
        <div class="col-5"  >
            <h3>NỘI DUNG</h3>
            <div class="menu list-group-flush">
                <a href="../index.php" class="list-group-item list-group-item-action">Trang chủ</a>
                <a href="../mainphu/sanpham.php" class="list-group-item list-group-item-action">Sản phẩm</a>
                <a href="blog.php" class="list-group-item list-group-item-action">Blog</a>
                <a href="lienhe.php" class="list-group-item list-group-item-action">Liên hệ</a>
                <a href="calo.php" class="list-group-item list-group-item-action">Tính calo</a>
                <a href="congthuc.php" class="list-group-item list-group-item-action">Công thức nấu ăn</a>
            </div>
        </div> 
        <div class="col-7" >
        <h3>LIÊN HỆ</h3>
        <form action="">
            <input class="border-none" type="text" placeholder="Địa chỉ email"  style="background: transparent; cursor: text;">
            <button class="border-none">Nhận tin</button>
        </form>
        </div>
        <div class="logo">
            <img src="assets/logo.png" alt="">
        </div>
        <p class="text-secondary ">Cung cấp sản phẩm với chất lượng an toàn cho quý khách</p>
    </div>
</div>
        <!-- Thêm vào cuối tệp index.html -->
        <button class="chatbot-toggler">
        <span class="material-symbols-rounded">mode_comment</span>
        <span class="material-symbols-outlined">close</span>
      </button>
      <div class="chatbot">
        <header>
          <h2 style="color:aliceblue; margin-top: 4px; margin-bottom: 8px">ChatBot</h2>
          <span class="close-btn material-symbols-outlined">close</span>
        </header>
        <ul class="chatbox">
          <li class="chat incoming">
            <span class="material-symbols-outlined">smart_toy</span>
            <p>Xin chào,<br>Bạn cần gì?</p>
          </li>
        </ul>
        <div class="chat-input">
          <textarea placeholder="Nhập..." spellcheck="false" required></textarea>
          <span id="send-btn" class="material-symbols-rounded">send</span>
        </div>
      </div>
</body>
</html>
