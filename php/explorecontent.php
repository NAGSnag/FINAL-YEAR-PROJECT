<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fyproject";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$keyword = $_GET['keyword'] ?? '';
$type = $_GET['type'] ?? '';
$exp = $_GET['exp'] ?? 0;
$exp = (int)$exp;
@$posttype = $_GET['posttype'];

$keyword = '%' . $keyword . '%';

$query_filtered = "SELECT * FROM explore WHERE searchtype = ? AND exp <= ? AND type = ? AND description LIKE ?";
$stmt = $conn->prepare($query_filtered);
$stmt->bind_param("siss", $type, $exp, $posttype, $keyword);
$stmt->execute();
$result_filtered = $stmt->get_result();

if ($result_filtered === false) {
    echo "<div>No records found.<br></div>";
} else {
    if ($result_filtered->num_rows > 0) {
        while ($row = $result_filtered->fetch_assoc()) {
            if ($row['type'] === "Job Post") {
                $link = "discription.php?id=" . htmlspecialchars($row['id']) . "&email=" . htmlspecialchars($row['email']);
            } elseif ($row['type'] === "need post") {
                $link = "need-display.php?id=" . htmlspecialchars($row['id']) . "&email=" . htmlspecialchars($row['email']);
            } elseif ($row['type'] === "Skill Post") {
                $link = "skill-display.php?id=" . htmlspecialchars($row['id']) . "&email=" . htmlspecialchars($row['email']);
            }

            echo "<a href=\"$link\" class='container'>
                    <div class=\"card\">
                        <img src=\"data:image/jpeg;base64," . base64_encode($row['banner']) . "\" alt=\"\">
                        <div>
                            <img class=\"dp\" src=\"./images/logo2.png\" alt=\"\">
                            <span style=\"width: 260px;\">" . htmlspecialchars($row['name']) . "</span><span>";

            if ($row['type'] === "Skill Post") {
                $rating = $row['rating'];
                $no_ppl_voted = $row['no_ppl_voted'];

                if ($no_ppl_voted > 0) {
                    $avg_rating = $rating / $no_ppl_voted;
                    $full_stars = floor($avg_rating);
                    $half_star = $avg_rating - $full_stars >= 0.5;

                    for ($i = 0; $i < $full_stars; $i++) {
                        echo "🌟";
                    }

                    if ($half_star) {
                        echo "⭐"; // Adjust this to a half star if you have an icon or specific style
                    }

                    echo "<span style=\"font-size: 10px;\">(" . htmlspecialchars($no_ppl_voted) . ")</span>";
                } else {
                    echo "<span>No ratings yet.</span>";
                }
            }

            echo " </span>   </div>
                        <br>";

            $truncated_description = substr(htmlspecialchars($row['information']), 0, 100) . '...';

            echo "<p>" . htmlspecialchars($row['description']) . "<br><a href=\"$link\"><span style=\"color: grey; font-size: small;\">$truncated_description </span><span style=\"color: green;\">Read More</span></a></p>";

            echo "</div>
                </a>";
        }
    } else {
        echo "No results found<br>";
    }

    echo "_____________________________________________________________________________________________________________________________________________________________<br><br><br><br><br>";

    $query_all = "SELECT * FROM explore";
    $result_all = $conn->query($query_all);

    while ($row = $result_all->fetch_assoc()) {
        if ($row['type'] === "Job Post") {
            $link = "discription.php?id=" . htmlspecialchars($row['id']) . "&email=" . htmlspecialchars($row['email']);
        } elseif ($row['type'] === "need post") {
            $link = "need-display.php?id=" . htmlspecialchars($row['id']) . "&email=" . htmlspecialchars($row['email']);
        } elseif ($row['type'] === "Skill Post") {
            $link = "skill-display.php?id=" . htmlspecialchars($row['id']) . "&email=" . htmlspecialchars($row['email']);
        }

        echo "<a href=\"$link\" class='container'>
                <div class=\"card\">
                    <img src=\"data:image/jpeg;base64," . base64_encode($row['banner']) . "\" alt=\"\">
                    <div>
                        <img class=\"dp\" src=\"./images/logo2.png\" alt=\"\">
                        <span style=\"width: 240px;\">" . htmlspecialchars($row['name']) . "</span> ";

        if ($row['type'] === "Skill Post") {
            $rating = $row['rating'];
            $no_ppl_voted = $row['no_ppl_voted'];

            if ($no_ppl_voted > 0) {
                $avg_rating = $rating / $no_ppl_voted;
                $full_stars = floor($avg_rating);
                $half_star = $avg_rating - $full_stars >= 0.5;

                for ($i = 0; $i < $full_stars; $i++) {
                    echo "🌟";
                }

                if ($half_star) {
                    echo "⭐"; // Adjust this to a half star if you have an icon or specific style
                }

                echo "<span>(" . htmlspecialchars($no_ppl_voted) . ")</span>";
            } else {
                echo "<span>No ratings yet.</span>";
            }
        }

        echo "    </div>
                    <br>";

        $truncated_description = substr(htmlspecialchars($row['information']), 0, 100) . '...';

        echo "<p>" . htmlspecialchars($row['description']) . "<br><a href=\"$link\"><span style=\"color: grey; font-size: small;\">$truncated_description </span><span style=\"color: green;\">Read More</span></a></p>";

        echo "</div>
            </a>";
    }
}

$stmt->close();
$conn->close();
?>
