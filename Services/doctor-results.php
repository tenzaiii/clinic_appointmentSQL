<?php
include("header.php");
include('dbcon.php');

$search_results = [];
$search_params = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET' && (!empty($_GET['specialization']) || !empty($_GET['location']) || !empty($_GET['day']))) {
    $specialization = mysqli_real_escape_string($connection, trim($_GET['specialization'] ?? ''));
    $location = mysqli_real_escape_string($connection, trim($_GET['location'] ?? ''));
    $day = mysqli_real_escape_string($connection, trim($_GET['day'] ?? ''));

    // Build dynamic query
    $where_conditions = [];

    if (!empty($specialization)) {
        $where_conditions[] = "specialization = '$specialization'";
        $search_params['specialization'] = $specialization;
    }
    if (!empty($location)) {
        $where_conditions[] = "location = '$location'";
        $search_params['location'] = $location;
    }
    // In doctor-results.php, replace the day condition with:
    $days = $_GET['days'] ?? '';
    $specialization = $_GET['specialization'] ?? '';
    $location = $_GET['location'] ?? '';

    // Rest of your query logic...
    if (!empty($days)) {
        $day_conditions = [];
        foreach (explode(',', $days) as $day) {
            if (!empty(trim($day))) {  // ✅ Extra safety check
                $day_conditions[] = "available_days LIKE '%" . mysqli_real_escape_string($connection, trim($day)) . "%'";
            }
        }
        if (!empty($day_conditions)) {
            $where_conditions[] = "(" . implode(' OR ', $day_conditions) . ")";
            $search_params['days'] = $days;
        }
    }


    $where_clause = !empty($where_conditions) ? 'WHERE ' . implode(' AND ', $where_conditions) : '';

    $query = "SELECT id, first_name, last_name, specialization, location, phone_no, available_days 
              FROM doctors $where_clause ORDER BY last_name ASC LIMIT 20";

    $result = mysqli_query($connection, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $search_results[] = $row;
        }
    }
    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Search Results - EasyClinic</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/css/uikit.min.css" />
    <style>
        .results-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .results-section {
            padding: 60px 0;
            background: #f8f9fa;
        }

        .doctor-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .doctor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .no-results {
            text-align: center;
            padding: 100px 20px;
            color: #6c757d;
        }

        .search-summary {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 40px;
        }
    </style>
</head>

<body>
    <?php if (empty($search_results)): ?>
        <!-- No Results -->
        <section class="results-hero">
            <div class="uk-container">
                <h1 class="uk-heading-xlarge uk-margin-remove">No Doctors Found</h1>
                <p class="uk-text-lead uk-margin-large-top">Try adjusting your search criteria</p>
                <a href="form.php" class="uk-button uk-button-primary uk-button-large uk-margin-medium-top">
                    <span uk-icon="icon: arrow-left"></span> New Search
                </a>
            </div>
        </section>
    <?php else: ?>
        <!-- Results Header -->
        <section class="results-hero">
            <div class="uk-container">
                <h1 class="uk-heading-large uk-margin-remove"><?php echo count($search_results); ?>
                    Doctor<?php echo count($search_results) > 1 ? 's' : ''; ?> Found</h1>
                <p class="uk-text-lead uk-margin-large-top">Available specialists matching your criteria</p>
                <a href="form.php" class="uk-button uk-button-default uk-button-large uk-margin-medium-top">
                    <span uk-icon="icon: search"></span> New Search
                </a>
            </div>
        </section>

        <!-- Results Grid -->
        <section class="results-section">
            <div class="uk-container">
                <?php if (!empty($search_params)): ?>
                    <div class="search-summary uk-text-center">
                        <h4>Search Criteria:</h4>
                        <ul class="uk-list uk-list-divider uk-width-1-2@m uk-margin-auto">
                            <?php foreach ($search_params as $key => $value): ?>
                                <li><?php echo ucfirst(str_replace('_', ' ', $key)); ?>:
                                    <strong><?php echo htmlspecialchars($value); ?></strong>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="uk-grid uk-child-width-1-3@m uk-child-width-1-2@s" uk-grid>
                    <?php foreach ($search_results as $doctor): ?>
                        <div>
                            <div class="doctor-card uk-card uk-card-default uk-card-body">
                                <div class="uk-flex uk-flex-middle uk-margin-bottom">
                                    <div class="uk-width-1-6">
                                        <div
                                            style="width: 60px; height: 60px; background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 18px;">
                                            <?php echo strtoupper(substr($doctor['first_name'], 0, 1) . substr($doctor['last_name'], 0, 1)); ?>
                                        </div>
                                    </div>
                                    <div class="uk-width-expand uk-margin-left">
                                        <h3 class="uk-margin-remove ">
                                            Dr.
                                            <?php echo htmlspecialchars($doctor['first_name'] . ' ' . $doctor['last_name']); ?>
                                        </h3>
                                        <p class="uk-margin-remove uk-text-muted">
                                            <?php echo htmlspecialchars($doctor['specialization']); ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="uk-margin-medium-top">
                                    <p class="uk-margin-remove uk-text-bold uk-text-primary">
                                        <?php echo htmlspecialchars($doctor['location']); ?>
                                    </p>
                                    <p class="uk-margin-small-top"><span uk-icon="receiver"
                                            class="uk-margin-small-right"></span><?php echo htmlspecialchars($doctor['phone_no']); ?>
                                    </p>
                                    <p class="uk-margin-small-top uk-text-small uk-text-muted">
                                        <span uk-icon="calendar" class="uk-margin-small-right"></span>
                                        Available:
                                        <?php echo htmlspecialchars(str_replace(',', ', ', $doctor['available_days'])); ?>
                                    </p>

                                    <a href="book-appointment.php?id=<?php echo $doctor['id']; ?>"
                                        class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-top">
                                        Book Appointment
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit-icons.min.js"></script>

    <?php include('footer.php'); ?>
</body>

</html>