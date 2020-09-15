<?php
$servername = "";
$username = "";
$password = "";
$databaseName = "";

$table = "";

$conn = null;
$query = "";

function setConnectionData($_databaseName, $_servername = "localhost", $_username = "root", $_password = "12345")
{
    global $servername,$username,$password,$databaseName;

    $servername = $_servername;
    $username = $_username;
    $password = $_password;
    $databaseName = $_databaseName;
}

function connectToDatabase() : bool{
    // Create connection
    global $conn,$servername,$username,$password,$databaseName;

    $conn = new mysqli($servername, $username, $password, $databaseName);

// Check connection
    if ($conn->connect_error) {
        return false;
    }

    return true;
}

function isConnected(): bool
{
    global $conn;

    $conn->ping();
}

function sendQuery() : bool
{
    if (!isConnected())
        if(!connectToDatabase())
            return false;

    global $conn;
    global $query;

    echo $query;

    $result = $conn->query($query);

    if ($result === TRUE)
        clearQuery();


    if ($result === FALSE){
        echo "Error: " . $conn->error();
        closeConnection();
        return false;
    }

    closeConnection();
}

function insertIntoTableQuery($table, $valueNames, $values)
{
    global $query;
    //base of insert
    $query = "INSERT INTO {$table} (ID";
    //add value names to query
    foreach ($valueNames as $valueName)
        $query .= "," . $valueName;

    $query .= ") VALUES (null";
    //add values to query
    foreach ($values as $value)
        $query .= ", '" . $value . "'";

    $query .= ")";

    return sendQuery();
}

function deleteFromTableByIDQuery($table, $id)
{
    global $query;

    if (checkTableExist($table))
        $query = "DELETE FROM {$table} WHERE ID =  {$id}";

    sendQuery();
}

function deleteFromTableQuery($table, $column, $value)
{
    global $query;
    $query = "";
    if (!checkTableExists($table))
        return;
    if (!checkColumnExists($table, $column))
        return;
    $query = "DELETE FROM {$table} WHERE {$column} =  {$value}";

    sendQuery();
}

function updateTableQuery($table, $valueNames, $values, $id)
{
    if (count($valueNames) === 0 || count($values) === 0)
        return;

    if (!checkTableExist($table))
        return;

    global $query;

    $query = "UPDATE {$table} SET ";

    for ($i = 0; $i < count($valueNames); $i++) {
        $query .= ", {$valueNames[$i]} = '{$values[$i]}'";
    }

    $query .= " WHERE ProductID = '{$id}'";

    sendQuery();
}

function selectAllFromTableQuery($table)
{
    global $query;

    $query = "SELECT * FROM {$table}";

    sendQuery();
}

function selectFromTableQuery($table, $columns)
{
    global $query;

    $query = "SELECT ";

    foreach ($columns as $column)
        $query .= ", " . $column;

    $query .= " FROM {$table}";

    sendQuery();
}

function checkTableExists($table): bool
{
    if (!isConnected()) return false;
    global $conn;

    $result = $conn->query("SHOW TABLES LIKE {$table}");

    return (mysqli_num_rows($result) > 0);
}

function checkColumnExists($table, $column): bool
{
    if (!isConnected()) return false;
    global $conn;

    $result = $conn->query("SHOW COLUMNS FROM {$table} LIKE {$column}");

    return (mysqli_num_rows($result)) ? TRUE : FALSE;
}

function clearQuery()
{
    global $query;

    $query = "";
}

function closeConnection()
{
    global $conn;
    clearQuery();
    $conn->close();
    $conn = null;
}



