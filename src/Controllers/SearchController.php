<?php
class SearchController {
    public static function search(PDO $pdo, string $term): array {
        $stmt = $pdo->prepare("SELECT * FROM businesses WHERE name LIKE :term LIMIT 25");
        $stmt->execute([':term' => "%$term%"]);
        return $stmt->fetchAll();
    }
}
