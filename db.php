$DATABASE_URL = getenv("DATABASE_URL");
$parsed_url = parse_url($DATABASE_URL);

$host = $parsed_url["host"];
$dbname = ltrim($parsed_url["path"], '/');
$username = $parsed_url["user"];
$password = $parsed_url["pass"];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
