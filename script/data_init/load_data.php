<?php

//Employee
require 'vendor/autoload.php';
$faker = Faker\Factory::create('en_PH');
$conn = mysqli_connect("localhost:3306", "root", "feb62002", "app_record");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    for ($i = 6; $i <= 200; $i++) {
        
        $lastName = mysqli_real_escape_string($conn, $faker->lastname);
        $firstName = mysqli_real_escape_string($conn, $faker->firstname);
        $office_id= mysqli_real_escape_string($conn, $faker->randomElement(array(1,2,3)));
        $address = mysqli_real_escape_string($conn, $faker->address);

        $query = "INSERT INTO employee (id, lastName, firstName, office_id, address) 
            VALUES ('$i','$lastName', '$firstName', '$office_id', '$address')";

        mysqli_query($conn, $query);

        
    }
}




//Office
    require 'vendor/autoload.php';
    $faker = Faker\Factory::create('en_PH');
    $conn = mysqli_connect("localhost:3306", "root", "feb62002", "app_record");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        for ($i = 6; $i <= 50; $i++) {
            $officename = mysqli_real_escape_string($conn, $faker->randomElement($officename=["Registrar","OSAS","Teacher's Office"]));
            $contactnum = mysqli_real_escape_string($conn, $faker->phoneNumber);
            $email = mysqli_real_escape_string($conn, $faker->email);
            $address = mysqli_real_escape_string($conn, $faker->randomElement($buildingTypes=["IT building","CS Building"]));
            $city= mysqli_real_escape_string($conn, $faker->city);
            $country= mysqli_real_escape_string($conn, $faker->country);
            $postal= mysqli_real_escape_string($conn, $faker->postcode);
    
            $query = "INSERT INTO office (id, name, contactnum, email, address, city, country, postal) 
                VALUES ('$i','$officename','$contactnum','$email', '$address', '$city', '$country','$postal')";
    
            mysqli_query($conn, $query);
    
            
        }
    }
    
    //transactions
    require 'vendor/autoload.php';
    $faker = Faker\Factory::create('en_PH');
    $conn = mysqli_connect("localhost:3306", "root", "feb62002", "app_record");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        for ($i = 8; $i <= 500; $i++) {
            $empId = mysqli_real_escape_string($conn, $faker->randomElement($officename=[1,2,3,4]));
            $office_id= mysqli_real_escape_string($conn, $faker->randomElement($officename=[1,2,3,4]));
            $datelog = mysqli_real_escape_string($conn, $faker->dateTimeThisCentury->format('Y-m-d H:i:s'));
            $action = mysqli_real_escape_string($conn, $faker->randomElement($buildingTypes=["In","Out","Complete"]));
            $remarks= $faker->optional($weight=0.8)->randomElement($actions=["Signed","For Approval","In Queue"]);
            $documentedcode= mysqli_real_escape_string($conn, $faker->randomElement($buildingTypes=[101,100,103,104,105,106]));
            
    
            $query = "INSERT INTO transaction (id, employee_id, office_id, datelog, action, remarks, documentcode) 
                VALUES ('$i','$empId','$office_id','$datelog', '$action', '$remarks', '$documentedcode')";
    
            mysqli_query($conn, $query);
    
            
        }
    }
  



?>