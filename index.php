<!DOCTYPE HTML>
<html>

<head>
    <title>Document</title>
    <script>
        var ajax = new XMLHttpRequest();

function form1() {
    ajax.onreadystatechange = loadData1;
    var project = document.getElementById("taskProject").value;
    var date = document.getElementById("taskDate").value;
    ajax.open("get", "1.php?taskProject=" + project +"&taskDate=" + date);
    ajax.send();
}
function loadData1(){
    if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                console.dir(ajax.responseText);
                document.getElementById("ajax").innerHTML = ajax.response;
            }
        }
}

function form2() {
    ajax.onreadystatechange = loadData2;
    var project = document.getElementById("allTimeProject").value;
    ajax.open("get", "2.php?allTimeProject=" + project);
    ajax.send();
}
function loadData2(){
    {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                console.dir(ajax);
                let rows = ajax.responseXML.firstChild.children;
                let result = "Workers in project with their spent time <ol>";
                let resultTime = 0;
                for (var i = 0; i < rows.length; i++) {
                    result += "<li>";
                    result += "Time: " + rows[i].children[0].firstChild.nodeValue;
                    result += ", project: " + rows[i].children[1].firstChild.nodeValue + "</td>";
                    result += ", id_worker: " + rows[i].children[2].firstChild.nodeValue + "</td>";
                    result += ", name of worker: " + rows[i].children[3].firstChild.nodeValue + "</td>";
                    result += "</li>";
                    resultTime += parseFloat(rows[i].children[0].firstChild.nodeValue);
                }
                result+="</ol>"
                result+="</ol><p>All spent time is " + resultTime;
                document.getElementById("ajax").innerHTML = result;
            }
        }
    }    
}

function form3() {
    ajax.onreadystatechange = loadData3;
    var chiefValue = document.getElementById("chiefValue").value;
    ajax.open("get", "3.php?chiefValue=" + chiefValue);
    ajax.send();
}

function loadData3() {
    let rows = JSON.parse(ajax.responseText);
    console.dir(rows);
    if (ajax.readyState === 4) {
        if (ajax.status === 200) {
            console.dir(ajax);
            let chief = document.getElementById("chiefValue").value
            let result = "Workers of chief: " + chief;
            let count = 0;
            result += "<ol>";
            for (var i = 0; i < rows.length; i++) {
                result += "<li>";
                result += "Name: " + rows[i].Name;
                result += ", id_worker:" + rows[i].ID_WORKER;
                result += "</li>";
                count++;
            }
            result += "</ol>Value of workers of this chief is: " + count;
            document.getElementById("ajax").innerHTML = result;
        }
    }
}
    </script>
</head>

<p>Finished tasks: <select name="taskProject" id="taskProject">
        <?php
        include 'db.php';
        $sqlSelect = "SELECT DISTINCT $db.projects.name FROM $db.projects";
        foreach ($dbh->query($sqlSelect) as $cell) {
            echo "<option>";
            print "$cell[0]";
            echo "</option>";
        }
        ?>
    </select>
    <select name="taskDate" id="taskDate">
        <?php
        include 'db.php';
        $sqlSelect = "SELECT DISTINCT $db.work.date FROM $db.work";
        foreach ($dbh->query($sqlSelect) as $cell) {
            echo "<option>";
            print "$cell[0]";
            echo "</option>";
        }
        ?>
    </select>
<button onclick="form1()">Get</button></p>


   <p>All time working for project: <select name="allTimeProject" id="allTimeProject">
        <?php
        include 'db.php';
        $sqlSelect = "SELECT DISTINCT $db.projects.name FROM $db.projects";
        foreach ($dbh->query($sqlSelect) as $cell) {
            echo "<option>";
            print "$cell[0]";
            echo "</option>";
        }
        ?>
    </select>
    <button onclick="form2()">Get</button></p>


<p>Value of workers of  <select name="chiefValue" id="chiefValue">
        <?php
        include 'connection.php';
        $sqlSelect = "SELECT DISTINCT $db.department.chief FROM $db.department";
        foreach ($dbh->query($sqlSelect) as $cell) {
            echo "<option>";
            print "$cell[0]";
            echo "</option>";
        }
        ?>
    </select>
    <button onclick="form3()">Get</button></p>

<div id="ajax"></div>
</body>

</html>