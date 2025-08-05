<?php
if (session_status() === PHP_SESSION_NONE) session_start();
class CartController
{
    public function index()
    {
        $cart_items = $_SESSION['cart'] ?? [];
        require_once './views/layouts/header.php';
        require_once './views/carts/cart.php';
        require_once './views/layouts/footer.php';
    }


    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'];
            $size = $_POST['size'];
            $quantity = (int)$_POST['quantity'];

            $productModel = new Product();
            $product = $productModel->getOneProduct($productId);
            

            if (!$product) {
                header("Location: " . BASE_URL);
                exit;
            }
            
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            $key = $productId . '_' . $size;

            if (isset($_SESSION['cart'][$key])) {
                $_SESSION['cart'][$key]['quantity'] += $quantity;
            } else {
                $_SESSION['cart'][$key] = [
                    'product_id' => $productId,
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'image' => $product['image'],
                    'size' => $size,
                    'quantity' => $quantity
                ];
            }

            header("Location: " . BASE_URL );
            exit;
            
        }
    }


    public function remove()
    {
        $index = $_GET['remove'] ?? null;
        if ($index !== null && isset($_SESSION['cart'][$index])) {
            unset($_SESSION['cart'][$index]);
        }
        header("Location: " . BASE_URL . "?act=cart");
        exit;
    }

}
