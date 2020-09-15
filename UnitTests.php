<?php
include "src/Utils/HtmlTools.php";
include "src/DatabaseControl/DatabaseControl.php";
include "src/FormControl/FormControl.php";

addTestTitle("Form clean and check tests");

tagCleanTest();
regexChecksTest();

addTestTitle("Database tests");
connectToDatabaseTest();

function tagCleanTest()
{
    $tagArray = array("<i>test line</i>", "<b>Second test line</b>", "<script type='javascript'>console.log('test')</script>", "<?php echo 'testing php'?>");
    $stringsToCheckAgainst = array("test line", "Second test line", "console.log('test')", "");

    echo "<h3>Clean tags test</h3>";
    echo "Testing with: '<i>test line</i>' in italic tags, '<b>Second test line</b>' in bold tags, javascript tags and php tags";
    addBreak();
    echo "Results should be: ";
    var_dump($stringsToCheckAgainst);
    addBreak(2);

    $results = removeTags($tagArray);

    if ($results == $stringsToCheckAgainst)
        echo "<span style='color:green'>Test Succeeded</span>";
    else
        echo "<span style='color:red'>Test Failed</span>";

    addBreak(2);
    echo "<hr>";
}

function regexChecksTest()
{
    echo "<h3>Check regex test</h3>";
    echo "Checking with values: John123, John, test_-;Mail123@testing5.nl5, testMail123@testing5.nl,06123456789, 0612345678, 13-12-2021, 50-33-43";
    addBreak();
    echo "All result are false then true";
    addBreak(2);

    echo "<b>Checking names</b><br>";
    var_dump(checkNameInput("John123"));
    addBreak();
    var_dump(checkNameInput("John"));
    addBreak(2);

    echo "<b>Checking mail</b><br>";
    var_dump(checkMailInput("test_-;Mail123@testing5.nl5"));
    addBreak();
    var_dump(checkMailInput("testMail123@testing5.nl"));
    addBreak(2);

    echo "<b>Checking phone input</b><br>";
    var_dump(checkPhoneInput("06123456789"));
    addBreak();
    var_dump(checkPhoneInput("0612345678"));
    addBreak(2);

    echo "<b>Checking date input</b><br>";
    var_dump(checkDateInput("50-33-43"));
    addBreak();
    var_dump(checkDateInput("13-12-2021"));
    addBreak(2);

    echo "<hr>";
}

function connectToDatabaseTest()
{
    setConnectionData("test");

    if (connectToDatabase())
        echoResult("Connection Success", "green");
    else
        echoResult("Connection Failed", "red");
//temp
    closeConnection();
}

function addToDatabaseTest()
{
    insertIntoTableQuery("productlist", array("ID", "Name", "Description", "Price"), array("Test", "This is a unit test entry", "50"));
}

function selectFromDatabaseIDTest()
{

}

function selectFromDatabaseTest()
{

}

function removeFromDataBaseTest()
{

}