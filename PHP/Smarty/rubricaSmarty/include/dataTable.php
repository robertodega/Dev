<?php
$action = $_GET['action'] ?? 'show';
$formAction = $_POST['formAction'] ?? '';
$addedResult = "";
$deletedResult = "";
$updateResult = "";
$resultTable = "";

if($formAction == 'update') {
    $updateSubject = $_POST['updateSubject'] ?? '';
    $updateUsername = $_POST['updateUsername'] ?? '';
    $updatePassword = $_POST['updatePassword'] ?? '';
    $updateNote = $_POST['updateNote'] ?? '';
    $refId = $_POST['refId'] ?? '';
    try {
        if ($manager->updateData(RUBRICA_TBL, $refId, [
            'subject' => htmlspecialchars($updateSubject, ENT_QUOTES, 'UTF-8'),
            'username' => htmlspecialchars($updateUsername, ENT_QUOTES, 'UTF-8'),
            'password' => htmlspecialchars($updatePassword, ENT_QUOTES, 'UTF-8'),
            'note' => htmlspecialchars($updateNote, ENT_QUOTES, 'UTF-8')
        ])) {
            $updateResult = "Data updated successfully.";
        } else {
            $updateResult = "Failed to update data.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return;
    }
}

if ($action == 'add') {
    $resultTable = "
        <div class='formDiv' id='addFormDiv'>
            <form method='post' action='#'>
                <input type='hidden' name='formAction' value='addRecord'>
                <div class='formFieldDiv'>
                    <div class='formField' id='subjectLblField'><label for='subject'>Subject:</label></div>
                    <div class='formField' id='subjectValueField'><input type='text' name='subject' id='subject' required></div>
                    <div class='clearDiv'></div>
                </div>
                <div class='formFieldDiv'>
                    <div class='formField' id='usernameLblField'><label for='username'>Username:</label></div>
                    <div class='formField' id='usernameValueField'><input type='text' name='username' id='username' required></div>
                    <div class='clearDiv'></div>
                </div>
                <div class='formFieldDiv'>
                    <div class='formField' id='passwordLblField'><label for='password'>Password:</label></div>
                    <div class='formField' id='passwordValueField'><input type='password' name='password' id='password' required></div>
                    <div class='clearDiv'></div>
                </div>
                <div class='formFieldDiv'>
                    <div class='formField' id='noteLblField'><label for='note'>Note:</label></div>
                    <div class='formField' id='noteValueField'><textarea name='note' id='note'></textarea></div>
                    <div class='clearDiv'></div>
                </div>
                <input class='formFieldBtn' type='submit' value='Add Data'>
            </form>
        </div>
    ";
    if($formAction == 'addRecord'){include_once 'include/addData.php';}
    $resultTable .= "<div class='addedResult'>$addedResult</div>";
    return;
}

elseif($action == 'delete') {
    $refId = $_GET['refId'] ?? '';
    if ($refId) {
        try {
            if ($manager->deleteData(RUBRICA_TBL, $refId)) {
                $deletedResult = "Data with ID <strong>$refId</strong> deleted successfully.";
            } else {
                $deletedResult = "Failed to delete data with ID <strong>$refId</strong>.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return;
        }
    } else {
        $deletedResult = "No ID provided for deletion.";
    }
    $resultTable .= "<div class='deletedResult'>$deletedResult</div>";
    return;
}

$searchText = $_POST['searchText'] ?? '';
$searchText = trim($searchText);
$searchText = htmlspecialchars($searchText, ENT_QUOTES, 'UTF-8');
if($action == 'showAll'){$searchText = 'everything';}
if ($searchText) {
    $data = $manager->getData(RUBRICA_TBL, $searchText);
}

$noDataAvailableMsg = "No data available for the given search criteria.";
$noDataMsg = "No data found.";
$noArrayData = "Data is not in array format.";
$tooManyRecordsMsg = "Too many records found. Please refine your search.";
$noRecordsFoundMsg = "No records found for the given search criteria.";

$searchTextString = $searchText ? ($searchText == 'everything' ? "<strong>Search for all data</strong>" : "Searched Text: <strong>$searchText</strong>") : "No search text provided.";
$resultTable .= "
    <div class='searchedTermDiv'>$searchTextString</div>
    <div class='dataTable'>
        <div class='dataTableHeader'>
            <div class='datatd datatdTitle dataLastRow'>Subject</div>
            <div class='datatd datatdTitle dataLastRow'>Username</div>
            <div class='datatd datatdTitle dataLastRow'>Password</div>
            <div class='datatd datatdTitle dataLastRow dataLastTd'>Note</div>
        </div>
        <div class='clearDiv'></div>
    </div>
    <div class='dataTableDiv'>
    ";
if (empty($data)) {
    $resultTable .= "<div class='dataTableRow'><div class='datatd' datatdErr>" . $noDataAvailableMsg . "</div></div>";
    return;
}
if (!is_array($data)) {
    $resultTable .= "<div class='dataTableRow'><div class='datatd datatdErr'>" . $noArrayData . "</div></div>";
    return;
}
if (count($data) == 0) {
    $resultTable .= "<div class='dataTableRow'><div class='datatd' datatdErr>" . $noDataMsg . "</div></div>";
    return;
}
if (count($data) > 1000) {
    $resultTable .= "<div class='dataTableRow'><div class='datatd' datatdErr>" . $tooManyRecordsMsg . "</div></div>";
    return;
}
if (count($data) < 1) {
    $resultTable .= "<div class='dataTableRow'><div class='datatd' datatdErr>" . $noRecordsFoundMsg . "</div></div>";
    return;
}
foreach ($data as $k => $row) {
    $dataLastRow = "";
    $deleteBtn = "<div class='deleteBtn' refId='".$row['id']."'><a href=\"javascript:deleteRow('".$row['id']."')\" class='btn btn-primary'>Delete</a></div>";
    $lastRow = ($k == count($data) - 1);
    if ($lastRow) {
        $dataLastRow = "dataLastRow";
    }
    $resultTable .= "<div class='dataTableRow'>";
    $resultTable .= "<div class='datatd $dataLastRow'><span class='editableData' title='Click to update'>" . htmlspecialchars($row['subject']) . "</span>" . $deleteBtn ."</div>";
    $resultTable .= "<div class='datatd $dataLastRow'><span class='editableData' title='Click to update'>" . htmlspecialchars($row['username']) . "</span></div>";
    $resultTable .= "<div class='datatd $dataLastRow'><span class='editableData' title='Click to update'>" . htmlspecialchars($row['password']) . "</span></div>";
    $resultTable .= "<div class='datatd dataLastTd $dataLastRow'><span class='editableData' title='Click to update'>" . htmlspecialchars($row['note'] ?? '') . "</span></div>";
    $resultTable .= "</div><div class='clearDiv'></div>";
}
$resultTable .= "</div>";

$resultTable .= "
    <form class='updateForm' id='updateRowForm' method='POST' action='./?action=\"\"'>
        <input type='hidden' name='formAction' id='formAction' placeholder='formAction' value='update'>
        <input type='hidden' name='updateSubject' id='updateSubject' placeholder='updateSubject' value=''>
        <input type='hidden' name='updateUsername' id='updateUsername' placeholder='updateUsername' value=''>
        <input type='hidden' name='updatePassword' id='updatePassword' placeholder='updatePassword' value=''>
        <input type='hidden' name='updateNote' id='updateNote' placeholder='updateNote' value=''>
    </form>
";

$resultTable .= "<div class='addedResult'>$updateResult</div>";