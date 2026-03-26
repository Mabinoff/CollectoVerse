<?php

namespace App\Helper;

class FileHelper
{

    static public $STORAGE_DIR = __DIR__ . '/../../storage/';

    static public function saveImage(string $tmpName)
    {
        if (!is_dir(FileHelper::$STORAGE_DIR)) {
            mkdir(FileHelper::$STORAGE_DIR, 0755, true);
        }

        $finfo = \finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = \finfo_file($finfo, $tmpName);

        $extensions = [
            'image/jpeg' => '.jpg',
            'image/png'  => '.png',
            'image/webp' => '.webp',
            'image/gif'  => '.gif',
        ];

        if (!isset($extensions[$mimeType])) {
            throw new \Exception('Type de fichier non autorisé : ' . $mimeType);
        }

        $ext = $extensions[$mimeType];

        $filename = uniqid('item_', true) . $ext;
        $targetPath = FileHelper::$STORAGE_DIR . $filename;

        move_uploaded_file($tmpName, $targetPath);

        return $filename;
    }

    static public function getImage(string $filename)
    {
        $safeName = basename($filename);
        $filePath = FileHelper::$STORAGE_DIR . $safeName;

        if (!file_exists($filePath)) {
            http_response_code(404);
            throw new \Exception('Image introuvable');
        }

        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($filePath);

        header('Content-Type: ' . $mimeType);
        header('Content-Length: ' . filesize($filePath));

        readfile($filePath);
        exit;
    }
}

?>