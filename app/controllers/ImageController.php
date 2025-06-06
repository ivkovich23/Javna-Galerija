<?php

require_once __DIR__ . '/../models/Image.php';

class ImageController {
    public function index() {
        session_start();

        $images = Image::getAll();
        include __DIR__ . '/../views/images/index.php';
    }

    public function upload() {
        session_start();

        if (!isset($_SESSION['user'])) {
            header("Location: index.php?controller=user&action=login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
            $file = $_FILES['image'];
            $uploadDir = __DIR__ . '/../../public/uploads/';
            $filename = uniqid() . '_' . basename($file['name']);
            $targetFile = $uploadDir . $filename;

            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

            if (!in_array($fileType, $allowedTypes)) {
                $_SESSION['upload_error'] = "Dozvoljeni su samo JPG, PNG, GIF i WEBP fajlovi.";
                include __DIR__ . '/../views/images/upload.php';
                return;
            }

            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                $image = new Image();
                $image->save($filename, $_SESSION['user']['id']);
                header("Location: index.php?controller=image&action=index");
                exit;
            } else {
                $_SESSION['upload_error'] = "Greška prilikom upload-a fajla.";
                include __DIR__ . '/../views/images/upload.php';
                return;
            }
        }

        include __DIR__ . '/../views/images/upload.php';
    }

    public function delete() {
        session_start();

        if (!isset($_SESSION['user'])) {
            header("Location: index.php?controller=user&action=login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['image_id'])) {
            $imageId = intval($_POST['image_id']);
            $userId = $_SESSION['user']['id'];

            Image::delete($imageId, $userId);
        }

        header("Location: index.php?controller=image&action=index");
        exit;
    }
}
