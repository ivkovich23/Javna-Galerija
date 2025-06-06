<?php

require_once __DIR__ . '/../core/Database.php';

class Image {
    public static function getAll() {
        $db = Database::getInstance();
        $stmt = $db->prepare("
            SELECT images.*, users.username 
            FROM iv_images AS images
            LEFT JOIN iv_users AS users ON images.user_id = users.id
            ORDER BY images.created_at DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save($filename, $user_id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO iv_images (filename, user_id, created_at) VALUES (?, ?, NOW())");
        $stmt->execute([$filename, $user_id]);
    }

    public static function delete($id, $user_id) {
        $db = Database::getInstance();

        // Provera da li slika pripada korisniku
        $stmt = $db->prepare("SELECT filename FROM iv_images WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $user_id]);
        $image = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($image) {
            // Obriši fajl sa diska
            $filePath = __DIR__ . '/../../public/uploads/' . $image['filename'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Obriši iz baze
            $stmt = $db->prepare("DELETE FROM iv_images WHERE id = ? AND user_id = ?");
            $stmt->execute([$id, $user_id]);
        }
    }
}
