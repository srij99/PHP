<?php
function get_user_count()
{
    $con = mysqli_connect("localhost", "root", "", "library management system");
    $user_count = "";
    $query = "select count(*) as user_count from users";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $user_count = $row['user_count'];
    }
    return ($user_count);
}
function get_book_count()
{
    $con = mysqli_connect("localhost", "root", "", "library management system");
    $book_count = "";
    $query = "select count(*) as book_count from books";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $book_count = $row['book_count'];
    }
    return ($book_count);
}
function get_author_count()
{
    $con = mysqli_connect("localhost", "root", "", "library management system");
    $author_count = "";
    $query = "select count(*) as author_count from author";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $author_count = $row['author_count'];
    }
    return ($author_count);
}
function get_category_count()
{
    $con = mysqli_connect("localhost", "root", "", "library management system");
    $category_count = "";
    $query = "select count(*) as category_count from category";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $category_count = $row['category_count'];
    }
    return ($category_count);
}
function get_issue_count()
{
    $con = mysqli_connect("localhost", "root", "", "library management system");
    $issue_count = "";
    $query = "select count(*) as issue_count from issued";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $issue_count = $row['issue_count'];
    }
    return ($issue_count);
}

?>