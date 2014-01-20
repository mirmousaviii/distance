<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>فاصله‌ها</title>
        <meta name="description" content="فاصله شهر‌ها">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="icon" href="icon.jpg" type="image/x-icon" />
    </head>
    <body>

        <div id="frmDistance">
            <form method="post" action="">
                <label>فاصله شهر</label>
				<select name="areaSource" >
					<option>آبادان</option>
					<option>آستارا</option>
					<option>اراک</option>
					<option>اردبیل</option>
					<option>ارومیه</option>
					<option>اصفهان</option>
					<option>اصلاندوز</option>
					<option>اهواز</option>
					<option>ایرانشهر</option>
					<option>ایلام</option>
					<option>بابل</option>
					<option>بابلسر</option>
					<option>باجگیران</option>
					<option>بازرگان</option>
					<option>بجنورد</option>
					<option>بندر امام</option>
					<option>بندر انزلی</option>
					<option>بندر بوشهر</option>
					<option>بندر عباس</option>
					<option>بیرجند</option>
					<option>بیله سوار</option>
					<option>پیرانشهر</option>
					<option>تایباد</option>
					<option>تبریز</option>
					<option selected>تهران</option>
					<option>جلفا</option>
					<option>چابهار</option>
					<option>چالوس</option>
					<option>خرم آباد</option>
					<option>خرمشهر</option>
					<option>خسروی</option>
					<option>داشلی برون</option>
					<option>رامسر</option>
					<option>رشت</option>
					<option>زاهدان</option>
					<option>زنجان</option>
					<option>ساری</option>
					<option>سرخس</option>
					<option>سرو</option>
					<option>سمنان</option>
					<option>سنندج</option>
					<option>شاهرود</option>
					<option>شهرکرد</option>
					<option>شیراز</option>
					<option>قزوین</option>
					<option>قم</option>
					<option>کاشان</option>
					<option>کرمان</option>
					<option>کرمانشاه</option>
					<option>گرگان</option>
					<option>لار</option>
					<option>لطف آباد</option>
					<option>مشهد</option>
					<option>مهاباد</option>
					<option>میرجاوه</option>
					<option>نوردوز</option>
					<option>همدان</option>
				</select> 
				<br/>
                <label>تا شهر</label>
				<select name="areaDestination" >
					<option>آبادان</option>
					<option>آستارا</option>
					<option>اراک</option>
					<option>اردبیل</option>
					<option>ارومیه</option>
					<option>اصفهان</option>
					<option>اصلاندوز</option>
					<option>اهواز</option>
					<option>ایرانشهر</option>
					<option>ایلام</option>
					<option>بابل</option>
					<option>بابلسر</option>
					<option>باجگیران</option>
					<option>بازرگان</option>
					<option>بجنورد</option>
					<option>بندر امام</option>
					<option>بندر انزلی</option>
					<option>بندر بوشهر</option>
					<option selected>بندر عباس</option>
					<option>بیرجند</option>
					<option>بیله سوار</option>
					<option>پیرانشهر</option>
					<option>تایباد</option>
					<option>تبریز</option>
					<option>تهران</option>
					<option>جلفا</option>
					<option>چابهار</option>
					<option>چالوس</option>
					<option>خرم آباد</option>
					<option>خرمشهر</option>
					<option>خسروی</option>
					<option>داشلی برون</option>
					<option>رامسر</option>
					<option>رشت</option>
					<option>زاهدان</option>
					<option>زنجان</option>
					<option>ساری</option>
					<option>سرخس</option>
					<option>سرو</option>
					<option>سمنان</option>
					<option>سنندج</option>
					<option>شاهرود</option>
					<option>شهرکرد</option>
					<option>شیراز</option>
					<option>قزوین</option>
					<option>قم</option>
					<option>کاشان</option>
					<option>کرمان</option>
					<option>کرمانشاه</option>
					<option>گرگان</option>
					<option>لار</option>
					<option>لطف آباد</option>
					<option>مشهد</option>
					<option>مهاباد</option>
					<option>میرجاوه</option>
					<option>نوردوز</option>
					<option>همدان</option>
				</select> 
				<input type="submit" value="چه قدر هست؟">
            </form>
<?php
if( isset($_POST['areaSource']) AND isset($_POST['areaDestination']))
{					 
	$source 	 = $_POST['areaSource'];
	$destination = $_POST['areaDestination'];

    
    $username = "distance";
    $password = "distance";    
    $dbname   = "distance";    
     
	try {
		$conn = new PDO("mysql:host=localhost;dbname={$dbname};charset=UTF8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT `distance` FROM `distance` WHERE `source` = :source AND `destination` = :destination limit 1");
        $stmt->execute(array('source' => $_POST['areaSource'], 'destination' => $_POST['areaDestination']));

        $row = $stmt->fetch();

	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}

    echo "فاصله شهر {$source} تا {$destination}، {$row['distance']} کیلومتر هست.";
}
?>
        </div>
    </body>
</html>
