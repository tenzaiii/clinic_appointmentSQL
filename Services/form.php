<?php
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyClinic - Find Doctors</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/css/uikit.min.css" />
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
                        url('IMG/hospital_1.jpg') center/cover no-repeat;
            height: 60vh; min-height: 500px;
            display: flex; align-items: center; justify-content: center; color: white;
            text-align: center; position: relative;
        }
        .hero-text { font-size: 4rem; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); }
        .search-section { background: white; padding: 60px 0; }
        .search-card { 
            background: white; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            padding: 50px; max-width: 800px; margin: 0 auto;
        }
        .search-grid { 
            display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
            gap: 20px; margin-bottom: 30px; 
        }
        .day-buttons { 
            display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); 
            gap: 12px; margin-top: 20px;
        }
        .day-btn { 
            padding: 12px 16px; border: 2px solid #e9ecef; border-radius: 10px; 
            background: white; font-weight: 600; cursor: pointer; transition: all 0.3s;
            text-align: center; font-size: 14px;
        }
        .day-btn:hover { 
            background: #f8f9fa; border-color: #667eea;
        }
        .day-btn.uk-active { 
            background: linear-gradient(135deg, #667eea, #764ba2); color: white; border-color: #667eea;
            transform: translateY(-2px); box-shadow: 0 8px 25px rgba(102,126,234,0.3);
        }
        .any-day-btn {
            grid-column: 1 / -1; background: #28a745; color: white; border-color: #28a745;
            font-weight: 700; font-size: 16px;
        }
        .any-day-btn:hover, .any-day-btn.uk-active {
            background: #218838; border-color: #1e7e34; transform: none;
        }
        @media (max-width: 768px) { 
            .hero-text { font-size: 2.5rem; } 
            .search-card { padding: 30px 20px; }
            .day-buttons { grid-template-columns: repeat(2, 1fr); }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="uk-container">
            <h1 class="hero-text uk-margin-remove">FIND A DOCTOR</h1>
            <p class="uk-margin-large-top uk-text-lead">Search specialists by location and availability</p>
        </div>
    </section>

    <!-- Search Form -->
     <section class="search-section">
        <div class="uk-container">
            <div class="search-card uk-text-center">
                <form method="GET" action="doctor-results.php" class="uk-form-stacked">
                    <div class="search-grid uk-margin-large">
                        <!-- Specialization dropdown stays the same -->
                        <div>
                            <label class="uk-form-label uk-margin-small-bottom">Specialization</label>
                            <select class="uk-select uk-form-large" name="specialization">
                                <option value="">All Specialties</option>
                                <option value="General Practitioner" <?php echo ($_GET['specialization'] ?? '') === 'General Practitioner' ? 'selected' : ''; ?>>General Practitioner</option>
 <option value="Dentist" <?php echo ($_GET['specialization'] ?? '') == 'Dentist' ? 'selected' : ''; ?>>Dentist</option>
                                <option value="Pediatrician" <?php echo ($_GET['specialization'] ?? '') == 'Pediatrician' ? 'selected' : ''; ?>>Pediatrician</option>
                                <option value="Obstetrician-Gynecologist" <?php echo ($_GET['specialization'] ?? '') == 'Obstetrician-Gynecologist' ? 'selected' : ''; ?>>OB-GYN</option>
                                <option value="Dermatologist" <?php echo ($_GET['specialization'] ?? '') == 'Dermatologist' ? 'selected' : ''; ?>>Dermatologist</option>
                                <option value="Ophthalmologist" <?php echo ($_GET['specialization'] ?? '') == 'Ophthalmologist' ? 'selected' : ''; ?>>Ophthalmologist</option>
                                <option value="Neurologist" <?php echo ($_GET['specialization'] ?? '') == 'Neurologist' ? 'selected' : ''; ?>>Neurologist</option>
                                <option value="Orthopedic Specialist" <?php echo ($_GET['specialization'] ?? '') == 'Orthopedic Specialist' ? 'selected' : ''; ?>>Orthopedic Specialist</option>
                                <option value="Cardiologist" <?php echo ($_GET['specialization'] ?? '') == 'Cardiologist' ? 'selected' : ''; ?>>Cardiologist</option>                            </select>
                        </div>
                        
                        <!-- Location dropdown stays the same -->
                        <div>
                            <label class="uk-form-label uk-margin-small-bottom">Location</label>
                            <select class="uk-select uk-form-large" name="location">
                                <option value="">All Locations</option>
                                <option value="Quezon City" <?php echo ($_GET['location'] ?? '') === 'Quezon City' ? 'selected' : ''; ?>>Quezon City</option>
 <option value="Makati" <?php echo ($_GET['location'] ?? '') == 'Makati' ? 'selected' : ''; ?>>Makati</option>
                                <option value="Pasig" <?php echo ($_GET['location'] ?? '') == 'Pasig' ? 'selected' : ''; ?>>Pasig</option>
                                <option value="Taguig" <?php echo ($_GET['location'] ?? '') == 'Taguig' ? 'selected' : ''; ?>>Taguig</option>                            </select>
                        </div>
                    </div>

                    <h3 class="uk-heading-line uk-margin-medium-top uk-margin-small-bottom">Available Days <small>(Select multiple or "Any Day")</small></h3>
                    <div class="day-buttons">
                        <!-- ✅ FIXED: Use null coalescing operator -->
                        <?php $selected_days = $_GET['days'] ?? ''; ?>
                        <?php $days_array = $selected_days ? explode(',', $selected_days) : []; ?>
                        
                        <!-- Any Day Button -->
                        <button type="button" class="day-btn uk-button any-day-btn <?php echo empty($selected_days) ? 'uk-active' : ''; ?>" 
                                onclick="selectAnyDay()">
                            ANY DAY
                        </button>
                        
                        <?php
                        $days = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY'];
                        foreach ($days as $day): ?>
                            <label style="cursor: pointer;">
                                <input type="checkbox" name="days[]" value="<?php echo $day; ?>" 
                                       class="uk-hidden" 
                                       <?php echo in_array($day, $days_array) ? 'checked' : ''; ?>
                                       onchange="updateDaySelection()">
                                <button type="button" class="day-btn uk-button <?php echo in_array($day, $days_array) ? 'uk-active' : ''; ?>" 
                                        onclick="toggleDay('<?php echo $day; ?>')">
                                    <?php echo $day; ?>
                                </button>
                            </label>
                        <?php endforeach; ?>
                        <!-- ✅ FIXED: Safe default value -->
                        <input type="hidden" name="days" id="selected-days" value="<?php echo htmlspecialchars($selected_days); ?>">
                    </div>

                    <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1 uk-margin-medium-top">
                        <span uk-icon="icon: search"></span> Find Available Doctors
                    </button>
                </form>
            </div>
        </div>
    </section>

    

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit-icons.min.js"></script>
    
    <script>
        function toggleDay(day) {
            const checkboxes = document.querySelectorAll('input[name="days[]"]');
            const anyDayBtn = document.querySelector('.any-day-btn');
            
            // Toggle checkbox
            const checkbox = Array.from(checkboxes).find(cb => cb.value === day);
            checkbox.checked = !checkbox.checked;
            
            updateDaySelection();
            anyDayBtn.classList.remove('uk-active');
        }
        
        function selectAnyDay() {
            const checkboxes = document.querySelectorAll('input[name="days[]"]');
            const anyDayBtn = document.querySelector('.any-day-btn');
            
            // Uncheck all day checkboxes
            checkboxes.forEach(cb => cb.checked = false);
            
            // Update hidden input
            document.getElementById('selected-days').value = '';
            
            // Update UI
            document.querySelectorAll('.day-btn:not(.any-day-btn)').forEach(btn => 
                btn.classList.remove('uk-active'));
            anyDayBtn.classList.add('uk-active');
        }
        
        function updateDaySelection() {
            const checkboxes = document.querySelectorAll('input[name="days[]"]:checked');
            const selectedDays = Array.from(checkboxes).map(cb => cb.value);
            const anyDayBtn = document.querySelector('.any-day-btn');
            
            // Update hidden input
            document.getElementById('selected-days').value = selectedDays.join(',');
            
            // Update day button styles
            document.querySelectorAll('.day-btn:not(.any-day-btn)').forEach(btn => {
                const day = btn.textContent.trim();
                btn.classList.toggle('uk-active', selectedDays.includes(day));
            });
            
            // Remove any-day active if days selected
            if (selectedDays.length > 0) {
                anyDayBtn.classList.remove('uk-active');
            }
        }
        
        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateDaySelection();
        });
    </script>

<?php include('footer.php'); ?>
</body>
</html>
