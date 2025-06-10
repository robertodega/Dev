<?php
$action = $_GET['action'] ?? 'show';
$formAction = $_POST['formAction'] ?? '';
$addedResult = "";
$deletedResult = "";
$resultTable = "";

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
    #   return;
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
    $deleteBtn = "<div class='deleteBtn' refId='".$row['id']."'><a href='./?action=delete&refId=".$row['id']."' class='btn btn-primary'>Delete</a></div>";
    $lastRow = ($k == count($data) - 1);
    if ($lastRow) {
        $dataLastRow = "dataLastRow";
    }
    $resultTable .= "<div class='dataTableRow'>";
    $resultTable .= "<div class='datatd $dataLastRow'>" . htmlspecialchars($row['subject']) . $deleteBtn ."</div>";
    $resultTable .= "<div class='datatd $dataLastRow'>" . htmlspecialchars($row['username']) . "</div>";
    $resultTable .= "<div class='datatd $dataLastRow'>" . htmlspecialchars($row['password']) . "</div>";
    $resultTable .= "<div class='datatd dataLastTd $dataLastRow'>" . htmlspecialchars($row['note'] ?? '') . "</div>";
    $resultTable .= "</div><div class='clearDiv'></div>";
}
$resultTable .= "</div>";
