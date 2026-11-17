
<?php

// Student Management System Using JSON

// Step 1: Create student records
$students = [
    [
        "id" => 101,
        "name" => "Arun",
        "age" => 40,
        "department" => "Computer Science",
        "city" => "Bengaluru",
        "marks" => 85
    ],
    [
        "id" => 102,
        "name" => "Rahul",
        "age" => 22,
        "department" => "Information Technology",
        "city" => "Mysuru",
        "marks" => 90
    ],
    [
        "id" => 103,
        "name" => "Priya",
        "age" => 21,
        "department" => "Electronics",
        "city" => "Chennai",
        "marks" => 95
    ],
    [
        "id" => 104,
        "name" => "Sneha",
        "age" => 23,
        "department" => "Computer Science",
        "city" => "Bengaluru",
        "marks" => 78
    ]
];

// Step 2: Convert PHP array into JSON
$jsonData = json_encode($students, JSON_PRETTY_PRINT);

// Step 3: Decode JSON data
$data = json_decode($jsonData);

// Step 4: Validate JSON
if (json_last_error() !== JSON_ERROR_NONE) {
    die("JSON Validation Failed!");
}

// Step 5: Search student by ID
$searchID = 102;
$searchResult = null;

foreach ($data as $student) {
    if ($student->id == $searchID) {
        $searchResult = $student;
        break;
    }
}

// Step 6: Update student marks
foreach ($data as $student) {
    if ($student->id == 101) {
        $student->marks = 95;
        break;
    }
}

// Step 7: Delete student ID 104
$updatedStudents = [];

foreach ($data as $student) {
    if ($student->id != 104) {
        $updatedStudents[] = $student;
    }
}

$data = $updatedStudents;

// Step 8: Convert final records into JSON
$finalJSON = json_encode($data, JSON_PRETTY_PRINT);

// Function to calculate grade
function getGrade($marks) {
    if ($marks >= 90) {
        return "A+";
    } elseif ($marks >= 80) {
        return "A";
    } elseif ($marks >= 70) {
        return "B";
    } else {
        return "C";
    }
}

// Safe HTML output
function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Management System</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #222;
        }

        h2 {
            color: #007bff;
            margin-top: 30px;
        }

        .status {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 5px;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        .grade {
            font-weight: bold;
            color: green;
        }

        .search-box {
            background: #eef4ff;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
        }

        pre {
            background: #222;
            color: #00ff90;
            padding: 20px;
            border-radius: 5px;
            overflow-x: auto;
            font-size: 14px;
        }

        .info {
            background: #fff3cd;
            padding: 15px;
            border-radius: 5px;
            color: #856404;
            margin-top: 20px;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            color: #777;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Student Management System</h1>

    <div class="status">
        JSON Validation: Successful!
    </div>

    <!-- JSON Data -->
    <h2>1. Original JSON Data</h2>

    <pre><?php echo e($jsonData); ?></pre>

    <!-- Search Student -->
    <h2>2. Search Student</h2>

    <div class="search-box">

        <?php if ($searchResult): ?>

            <p><strong>Student Found!</strong></p>

            <p>Student ID: <?php echo e($searchResult->id); ?></p>

            <p>Name: <?php echo e($searchResult->name); ?></p>

            <p>Department: <?php echo e($searchResult->department); ?></p>

            <p>Marks: <?php echo e($searchResult->marks); ?></p>

        <?php else: ?>

            <p>Student Not Found!</p>

        <?php endif; ?>

    </div>

    <!-- All Students -->
    <h2>3. All Student Details</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Department</th>
            <th>City</th>
            <th>Marks</th>
            <th>Grade</th>
        </tr>

        <?php foreach ($students as $student): ?>

        <tr>
            <td><?php echo e($student["id"]); ?></td>
            <td><?php echo e($student["name"]); ?></td>
            <td><?php echo e($student["age"]); ?></td>
            <td><?php echo e($student["department"]); ?></td>
            <td><?php echo e($student["city"]); ?></td>
            <td><?php echo e($student["marks"]); ?></td>
            <td class="grade">
                <?php echo e(getGrade($student["marks"])); ?>
            </td>
        </tr>

        <?php endforeach; ?>

    </table>

    <!-- Update Information -->
    <h2>4. Update Student Marks</h2>

    <div class="status">
        Student ID 101 (Arun): Marks updated from 85 to 95 successfully!
    </div>

    <!-- Delete Information -->
    <h2>5. Delete Student Record</h2>

    <div class="info">
        Student ID 104 (Sneha) deleted successfully!
    </div>

    <!-- Final Records -->
    <h2>6. Final Student Records</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Marks</th>
            <th>Grade</th>
        </tr>

        <?php foreach ($data as $student): ?>

        <tr>
            <td><?php echo e($student->id); ?></td>
            <td><?php echo e($student->name); ?></td>
            <td><?php echo e($student->marks); ?></td>
            <td class="grade">
                <?php echo e(getGrade($student->marks)); ?>
            </td>
        </tr>

        <?php endforeach; ?>

    </table>

    <!-- Final JSON -->
    <h2>7. Final JSON Output</h2>

    <pre><?php echo e($finalJSON); ?></pre>

    <footer>
        Student Management System | PHP and JSON
    </footer>

</div>

</body>
</html>
